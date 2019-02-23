<?php if (!defined('ABSPATH')) die('No direct access allowed');

class TMM_Contact_Form {

    public static $types = array(
        'textinput' => 'Textinput',
        'email' => 'Email',
        'website' => 'Url',
        'messagebody' => 'Message',
        'select' => 'Select'
    );
    public $set_name, $options_description = array(), $contacts_form_titles = array(), $forms_count = 1;

    function __construct($set_name) {
        $this->set_name = $set_name;
    }

    public static function draw_forms_templates() {
        $data = array("form_constructor" => new TMM_Contact_Form('contacts_form'));
        echo TMM::draw_html("contact_form/draw_forms_templates", $data);
    }

    public function draw_forms() {
        $this->options_description = array(
            "form_title" => array(esc_html__("Form Title", 'cardealer'), "input"),
            "field_type" => array(esc_html__("Field Type", 'cardealer'), "select"),
            "form_label" => array(esc_html__("Field Label", 'cardealer'), "input"),
            "enable_captcha" => array(esc_html__("Enable Captcha", 'cardealer'), "checkbox")
        );

        $data['contact_forms'] = TMM::get_option('contact_form');
        $data['form_constructor'] = $this;
        echo TMM::draw_html("contact_form/draw_forms", $data);
    }

    public static function save($data) {
        TMM::update_option('contact_form', $data);
    }

    public static function get_form($form_name) {
        $contact_forms = TMM::get_option('contact_form');
        if (!empty($contact_forms)) {
            //after import
            if (!empty($contact_forms) AND is_string($contact_forms)) {
                $contact_forms = unserialize($contact_forms);
            }
            foreach ($contact_forms as $form) {
                if ($form['title'] == $form_name) {
                    return $form;
                }
            }
        }

        return array();
    }

    public static function get_forms_names() {
        $contact_forms = TMM::get_option('contact_form');
        $result = array();

        if (!empty($contact_forms)) {
            //after import
            if (!empty($contact_forms) AND is_string($contact_forms)) {
                $contact_forms = unserialize($contact_forms);
            }

            foreach ($contact_forms as $form) {
                $result[@$form['title']] = @$form['title'];
            }
        }

        return $result;
    }

    public static function contact_form_request() {
        $data = array();
        parse_str($_REQUEST['values'], $data);
        $errors = array();
        $form = self::get_form($data['contact_form_name']);
	    $url = get_option('siteurl');
	    $email = "";
	    $headers = 'From: '. $url . "\r\n";
        $subject = "";
        $messagebody = "";
        $pre_messagebody_info = "";
	    $headers = '';
	    $result = array(
		    "is_errors" => 0,
		    "info" => ""
	    );


        if (!empty($form['inputs'])) {
            foreach ($form['inputs'] as $key => $input) {
                $name = $input['type'] . $key;

                if ($input['is_required'] && empty($data[$name])) {
                    $errors[$name] = trim($input['label']);
                }

                if ($input['type'] == 'email') {
                    if (!is_email(@$data[$name])) {
                        $errors[$name] = trim($input['label']);
                    }else{
	                    $email = $data[$name];
                    }
                }

                if ($input['type'] == 'messagebody') {
                    $messagebody = @$data[$name];
                }

                if ($input['type'] == 'subject') {
                    $subject = @$data[$name];
                }

                if ($input['type'] != 'subject' && $input['type'] != 'messagebody') {
                    $pre_messagebody_info.="<strong>" . $input['label'] . "</strong>" . ": " . @$data[$name] . "<br /><br />";
                }
            }
        }

        /* check capcha */
        if ( @$form['has_capture'] && substr($data['verify_code'], 7, 5) != $data['verify'] ) {
            $errors["verify"] = esc_html__("Captcha", 'cardealer');
        }

	    /* check errors */
        if (!empty($errors)) {
            $result['is_errors'] = 1;
            $result['hash'] = md5(time());
            $result['info'] = $errors;
            echo json_encode($result);
            exit;
        }

	    /* check subject */
        if (empty($subject)) {
            $subject = esc_html__("Email from contact form", 'cardealer');
        }

	    /* set message */
        if (!isset($data['car_id'])) {
            $after_message = "\r\n<br />--------------------------------------------------------------------------------------------------\r\n<br /> " . esc_html__('This mail was sent via', 'cardealer') . " " . site_url() . " " . esc_html__('contact form', 'cardealer');
        } else {
            $after_message = "\r\n<br />--------------------------------------------------------------------------------------------------\r\n<br /> " . esc_html__('This mail was sent via', 'cardealer') . " " . get_the_permalink($data['car_id']) . " " . esc_html__('contact form', 'cardealer');
        }
	    $messagebody = $pre_messagebody_info . nl2br($messagebody) . $after_message;

	    /* set recipient email  */
	    if (empty($form['recepient_email'])) {
		    $recepient_mail = get_bloginfo('admin_email');
	    } else {
		    $recepient_mail = $form['recepient_email'];
	    }

        if (isset($data['car_id'])) {

            $author_id = get_post_field('post_author', $data['car_id']);
            $dealer_email = get_the_author_meta('user_email', $author_id);
	        $send_to_admin = TMM::get_option( 'contact_send_to_admin', TMM_APP_CARDEALER_PREFIX );

	        if($send_to_admin === '1'){
		        $recepient_mail = array(
			        $dealer_email,
			        $recepient_mail,
		        );
	        }else{
		        $recepient_mail = $dealer_email;
	        }
        }

	    /* set headers */
	    if($email) {
		    $headers .= 'Reply-To: '. $email . "\r\n";
	    }

	    add_filter('wp_mail_content_type', array(__CLASS__, 'set_html_content_type'));
	    add_filter('wp_mail_from_name', array(__CLASS__, 'set_mail_from_name'));

		/* send email */
        if (wp_mail($recepient_mail, $subject, $messagebody, $headers)) {
            $result["info"] = "succsess";
        } else {
            $result["info"] = "server_fail";
        }

	    remove_filter('wp_mail_content_type', array(__CLASS__, 'set_html_content_type'));
	    remove_filter('wp_mail_from_name', array(__CLASS__, 'set_mail_from_name'));

        $result['hash'] = md5(time());

        echo json_encode($result);
        exit;
    }

	public static function set_mail_from_name($name) {
		return get_option('blogname');
	}

	public static function set_html_content_type() {
		return 'text/html';
	}

}
