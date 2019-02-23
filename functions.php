<?php if ( !defined('ABSPATH') ) exit;

define('THEMEMAKERS_THEME_NAME', 'CarDealer');
define('THEMEMAKERS_THEME_DOMAIN', 'cardealer');
define('TMM_THEME_PREFIX', 'thememakers_');
define('THEMEMAKERS_FRAMEWORK_VERSION', '2.0.7');
define('TMM_THEME_URI', get_template_directory_uri());
define('TMM_THEME_PATH', get_template_directory());
define('TMM_EXT_URI', TMM_THEME_URI . "/extensions");
define('TMM_EXT_PATH', TMM_THEME_PATH . "/extensions");
define('THEMEMAKERS_LINK', 'http://webtemplatemasters.com/');
define('THEMEMAKERS_THEME_LINK', 'http://cardealer.webtemplatemasters.com/help/');
define('THEMEMAKERS_THEME_FORUM_LINK', 'http://forums.webtemplatemasters.com/');

include_once TMM_THEME_PATH . '/classes/thememakers.php';

TMM::register();

include_once TMM_THEME_PATH . '/helper/aq_resizer.php';
include_once TMM_THEME_PATH . '/helper/helper.php';
include_once TMM_THEME_PATH . '/helper/helper_fonts.php';
include_once TMM_THEME_PATH . '/admin/theme_options/helper.php';
include_once TMM_THEME_PATH . '/extensions/cardealer/views/admin/settings/helper.php';
include_once TMM_THEME_PATH . '/classes/staff.php';
include_once TMM_THEME_PATH . '/classes/page.php';
include_once TMM_THEME_PATH . '/classes/contact_form.php';
include_once TMM_THEME_PATH . '/classes/custom_sidebars.php';
include_once TMM_THEME_PATH . '/classes/seo_group.php';

include_once TMM_THEME_PATH . '/admin/options.php';
/* Widgets */
include_once TMM_THEME_PATH . '/admin/theme_widgets.php';
/* Extensions Including */
include_once TMM_EXT_PATH . '/includer.php';


/* Woocommerce */
if (class_exists('woocommerce')) {
	include_once TMM_THEME_PATH . '/woocommerce/functions.php';
}

/* WPML */
if (class_exists('SitePress')) {
	include_once TMM_EXT_PATH . '/wpml/functions.php';
}

function tmm_theme_setup(){
	add_theme_support('post-thumbnails');
	add_theme_support('automatic-feed-links');
	add_theme_support('custom-header', array());
	add_theme_support('custom-background', array());

	register_nav_menu('primary', 'Primary Menu');

	load_theme_textdomain('cardealer', TMM_THEME_PATH . '/languages');
}

add_action('after_setup_theme', 'tmm_theme_setup');

add_filter('widget_text', 'do_shortcode');

remove_action('wp_head', 'wp_generator');

add_action('init', array('TMM_Staff', 'register'), 2);
add_action('init', array('TMM_Page', 'register'), 2);
add_action("admin_init", "thememakers_admin_init");
add_action('save_post', 'thememakers_save_details');


function thememakers_admin_init()
{
	TMM_Staff::init_meta_boxes();
	TMM_Page::init_meta_boxes();
}

function thememakers_save_details()
{
	if (is_admin()) {
		if (!empty($_POST)) {
			if (isset($_POST['tmm_meta_saving'])) {
				global $post;
				$post_type = get_post_type($post->ID);
				switch ($post_type) {
					case TMM_Staff::$slug:
						TMM_Staff::save($post->ID);
						break;
					default:
						TMM_Page::save($post->ID); //for all types
						break;
				}
			}
		}
	}
}

//**************************************************************

if (isset($_REQUEST['action'])) {
	if ($_REQUEST['action'] == 'add_sidebar') {
		$_REQUEST = TMM_Helper::db_quotes_shield($_REQUEST);
	}
}

//static attributes
$before_widget = '<div id="%1$s" class="widget %2$s">';
$after_widget = '</div>';
$before_title = '<h3 class="widget-title">';
$after_title = '</h3>';

if (!function_exists('tmm_widgets_init')) {
	function tmm_widgets_init() {
		//static attributes
		$before_widget = '<div id="%1$s" class="widget %2$s">';
		$after_widget = '</div>';
		$before_title = '<h3 class="widget-title">';
		$after_title = '</h3>';
		//default widget areas
		register_sidebar(array(
			'name' => esc_html__('Thememakers Default Sidebar', 'cardealer'),
			'id' => 'thememakers_default_sidebar',
			'before_widget' => $before_widget,
			'after_widget' => $after_widget,
			'before_title' => $before_title,
			'after_title' => $after_title
		));

		register_sidebar(array(
			'name' => esc_html__('Single Car Sidebar', 'cardealer'),
			'id' => 'thememakers_single_car_sidebar',
			'before_widget' => $before_widget,
			'after_widget' => $after_widget,
			'before_title' => $before_title,
			'after_title' => $after_title
		));

		register_sidebar(array(
			'name' => esc_html__('User Cars Sidebar', 'cardealer'),
			'id' => 'thememakers_single_user_cars',
			'before_widget' => $before_widget,
			'after_widget' => $after_widget,
			'before_title' => $before_title,
			'after_title' => $after_title
		));

		register_sidebar(array(
			'name' => esc_html__('Cars Slider Sidebar', 'cardealer'),
			'id' => 'cars_slider_sidebar',
			'before_widget' => $before_widget,
			'after_widget' => $after_widget,
			'before_title' => $before_title,
			'after_title' => $after_title
		));

		register_sidebar(array(
			'name' => esc_html__('Top Sidebar', 'cardealer'),
			'id' => 'top_sidebar',
			'before_widget' => $before_widget,
			'after_widget' => $after_widget,
			'before_title' => $before_title,
			'after_title' => $after_title
		));

		register_sidebar(array(
			'name' => esc_html__('Header Sidebar', 'cardealer'),
			'id' => 'header_sidebar',
			'before_widget' => $before_widget,
			'after_widget' => $after_widget,
			'before_title' => $before_title,
			'after_title' => $after_title
		));

		register_sidebar(array(
			'name' => esc_html__('Footer Sidebar 1', 'cardealer'),
			'id' => 'footer_sidebar_1',
			'before_widget' => $before_widget,
			'after_widget' => $after_widget,
			'before_title' => $before_title,
			'after_title' => $after_title
		));

		register_sidebar(array(
			'name' => esc_html__('Footer Sidebar 2', 'cardealer'),
			'id' => 'footer_sidebar_2',
			'before_widget' => $before_widget,
			'after_widget' => $after_widget,
			'before_title' => $before_title,
			'after_title' => $after_title
		));

		register_sidebar(array(
			'name' => esc_html__('Footer Sidebar 3', 'cardealer'),
			'id' => 'footer_sidebar_3',
			'before_widget' => $before_widget,
			'after_widget' => $after_widget,
			'before_title' => $before_title,
			'after_title' => $after_title
		));


		register_sidebar(array(
			'name' => esc_html__('Footer Sidebar 4', 'cardealer'),
			'id' => 'footer_sidebar_4',
			'before_widget' => $before_widget,
			'after_widget' => $after_widget,
			'before_title' => $before_title,
			'after_title' => $after_title
		));
	}
}

add_action( 'widgets_init', 'tmm_widgets_init' );

//custom widget areas
TMM_Custom_Sidebars::register_custom_sidebars($before_widget, $after_widget, $before_title, $after_title);

/* ---------------------------------------------------------------------- */
/* 	Facebook Open Graph
/* ---------------------------------------------------------------------- */

add_action('wp_head', 'add_fb_open_graph_tags');
function add_fb_open_graph_tags() {
	if (is_single()) {
		global $post;
		if(get_the_post_thumbnail($post->ID, 'thumbnail')) {
			$thumbnail_id = get_post_thumbnail_id($post->ID);
			$thumbnail_object = get_post($thumbnail_id);
			$image = $thumbnail_object->guid;
		} else {
			$image = ''; // Change this to the URL of the logo you want beside your links shown on Facebook
		}
		//$description = get_bloginfo('description');
		$description = my_excerpt( $post->post_content, $post->post_excerpt );
		$description = strip_tags($description);
		$description = str_replace("\"", "'", $description);
		?>
		<meta property="og:title" content="<?php the_title(); ?>" />
		<meta property="og:type" content="article" />
		<meta property="og:image" content="<?php echo $image; ?>" />
		<meta property="og:url" content="<?php the_permalink(); ?>" />
		<meta property="og:description" content="<?php echo $description ?>" />
		<meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>" />

	<?php 	}
}

function my_excerpt($text, $excerpt){

	if ($excerpt) return $excerpt;

	$text = strip_shortcodes( $text );

	$text = apply_filters('the_content', $text);
	$text = str_replace(']]>', ']]>', $text);
	$text = strip_tags($text);
	$excerpt_length = apply_filters('excerpt_length', 55);
	$excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
	$words = preg_split("/[\n
	 ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
	if ( count($words) > $excerpt_length ) {
		array_pop($words);
		$text = implode(' ', $words);
		$text = $text . $excerpt_more;
	} else {
		$text = implode(' ', $words);
	}

	return apply_filters('wp_trim_excerpt', $text, $excerpt);
}

/* ---------------------------------------------------------------------- */
/* 	Filter Image Sizes
/* ---------------------------------------------------------------------- */

//*****
add_action('init', 'thememakers_do_filter');

function thememakers_do_filter()
{
	if (!current_user_can('administrator')) {
		add_filter('show_admin_bar', '__return_false');
	}
}

/* ---------------------------------------------------------------------- */
/* 	Allow redirection, even if the theme starts to send output to the browser
/* ---------------------------------------------------------------------- */

add_action('init', 'do_output_buffer');
function do_output_buffer() {
	ob_start();
}

/* ---------------------------------------------------------------------- */
/* 	Fonts Functions
/* ---------------------------------------------------------------------- */

if ( !function_exists('tmm_enqueue_fonts') ) {
    function tmm_enqueue_fonts(){
        $fonts = array(
            'Open Sans' => 1,
            'Oswald' => 1,
            'Roboto Condensed' => 1,
            'Raleway' => 1,
            'Mrs Saint Delafield' => 1
        );

        if (TMM::get_option('logo_font') && (TMM::get_option('logo_font') != 'default_font') && !isset($fonts[ TMM::get_option('logo_font') ])) {
            $fonts[ TMM::get_option('logo_font') ] = 1;
        }
        if (TMM::get_option('general_font_family') && (TMM::get_option('general_font_family') != 'default_font') && !isset($fonts[ TMM::get_option('general_font_family') ])) {
            $fonts[ TMM::get_option('general_font_family') ] = 1;
        }
        if (TMM::get_option('main_nav_font') && (TMM::get_option('main_nav_font') != 'default_font') && !isset($fonts[ TMM::get_option('main_nav_font') ])) {
            $fonts[ TMM::get_option('main_nav_font') ] = 1;
        }
        if (TMM::get_option('h1_font_family') && (TMM::get_option('h1_font_family') != 'default_font') && !isset($fonts[ TMM::get_option('h1_font_family') ])) {
            $fonts[ TMM::get_option('h1_font_family') ] = 1;
        }
        if (TMM::get_option('h2_font_family') && (TMM::get_option('h2_font_family') != 'default_font') && !isset($fonts[ TMM::get_option('h2_font_family') ])) {
            $fonts[ TMM::get_option('h2_font_family') ] = 1;
        }
        if (TMM::get_option('h3_font_family') && (TMM::get_option('h3_font_family') != 'default_font') && !isset($fonts[ TMM::get_option('h3_font_family') ])) {
            $fonts[ TMM::get_option('h3_font_family') ] = 1;
        }
        if (TMM::get_option('h4_font_family') && (TMM::get_option('h4_font_family') != 'default_font') && !isset($fonts[ TMM::get_option('h4_font_family') ])) {
            $fonts[ TMM::get_option('h4_font_family') ] = 1;
        }
        if (TMM::get_option('h5_font_family') && (TMM::get_option('h5_font_family') != 'default_font') && !isset($fonts[ TMM::get_option('h5_font_family') ])) {
            $fonts[ TMM::get_option('h5_font_family') ] = 1;
        }
        if (TMM::get_option('h6_font_family') && (TMM::get_option('h6_font_family') != 'default_font') && !isset($fonts[ TMM::get_option('h6_font_family') ])) {
            $fonts[ TMM::get_option('h6_font_family') ] = 1;
        }
        if (TMM::get_option('content_font_family') && (TMM::get_option('content_font_family') != 'default_font') && !isset($fonts[ TMM::get_option('content_font_family') ])) {
            $fonts[ TMM::get_option('content_font_family') ] = 1;
        }
        if (TMM::get_option('buttons_font_family') && (TMM::get_option('buttons_font_family') != 'default_font') && !isset($fonts[ TMM::get_option('buttons_font_family') ])) {
            $fonts[ TMM::get_option('buttons_font_family') ] = 1;
        }

        if (is_single() OR is_page()){
            $post_fonts = get_post_meta(get_the_ID(), 'tmm_google_fonts', 1);
            if(!empty($post_fonts) && is_serialized($post_fonts)){
                $post_fonts = unserialize($post_fonts);
                foreach($post_fonts as $value){
                    $fonts[$value] = 1;
                }
            }
        }

        $link = TMM_HelperFonts::get_google_fonts_link($fonts);
        if(!empty($link)){
            wp_enqueue_style('tmm_google_fonts', $link, null, false);
        }
    }
}

add_action('wp_enqueue_scripts', 'tmm_enqueue_fonts', 1);

if ( !function_exists('tmm_get_fonts_array') ) {
    function tmm_get_fonts_array() {
        return TMM_HelperFonts::get_fonts_array();
    }
}

/* ---------------------------------------------------------------------- */
/* 	Enqueue Theme Scripts and Styles
/* ---------------------------------------------------------------------- */

if (!function_exists('tmm_enqueue_scripts')) {
	function tmm_enqueue_scripts() {

		/* General styles */
		wp_enqueue_style('tmm_theme_style', TMM_THEME_URI . '/css/style.css', null, false);

		if (is_child_theme()) {
			wp_enqueue_style( 'theme_child_style', get_stylesheet_uri() );
		}

		wp_enqueue_style('tmm_custom1', TMM_THEME_URI . '/css/custom1.css', null, false);

		if (is_rtl()) {
			wp_enqueue_style("bootstrap_rtl", 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.2.0-rc2/css/bootstrap-rtl.min.css');
			wp_enqueue_style("tmm_rtl", TMM_THEME_URI . '/css/rtl.css');
		}

		$custom_css = TMM::get_option("custom_css");

		if (!empty($custom_css)) {
			wp_enqueue_style('tmm_custom2', TMM_THEME_URI . '/css/custom2.css', null, false);
		}

		wp_register_script('tmm_flexslider', TMM_Ext_Car_Dealer::get_application_uri() . '/js/jquery.flexslider-min.js', array('jquery'), false, 1);
		wp_register_script('tmm_selectivizr', TMM_THEME_URI . '/js/jquery.selectivizr.min.js', array('jquery'), false, 1);
		wp_register_script('tmm_carousel', TMM_THEME_URI . '/js/jquery.carouFredSel-6.2.1.min.js', array('jquery'), false, 1);
		wp_register_script('tmm_sudoSlider', TMM_THEME_URI . '/js/jquery.sudoSlider.min.js', array('jquery'), false, 1);

		global $post;
		if ( is_single() && $post->post_type == TMM_Ext_PostType_Car::$slug ) {
			wp_enqueue_script('tmm_sudoSlider');
		}

		/* General scripts */
		wp_enqueue_script('tmm_modernizr', TMM_THEME_URI . '/js/jquery.modernizr.min.js', array('jquery'), false, 0);

		global $is_IE;
		if ($is_IE) {
			wp_enqueue_script('tmm_selectivizr');
		}

		wp_enqueue_script('tmm_theme', TMM_THEME_URI . '/js/vendor-min.js', array('jquery'), false, 1);

		$theme_was_activated = TMM::get_option('theme_was_activated');

		$featured_packet_duration = $theme_was_activated ? TMM_Cardealer_User::get_featured_packet_life_period() : 0;
		if ($featured_packet_duration > 0) {
			$featured_packet_duration = round($featured_packet_duration / 60 / 60 / 24);
		} else {
			$featured_packet_duration = "\u221E";
		}

		$translation_array = array(
			'site_url' => home_url(),
			'allow_watch_list' => (TMM::get_option('watchlist_is_for_loggedin', TMM_APP_CARDEALER_PREFIX) == 0 || is_user_logged_in()) ? 1 : 0,
			'sticky_nav_mobile' => (TMM::get_option('sticky_nav_mobile') === '0') ? 0 : 1,
			'any' => esc_html__('Any', 'cardealer'),
			'added_to_compare' => esc_html__('Selected car was successfully added to your compare list.', 'cardealer'),
			'removed_from_compare' => esc_html__('Selected car was successfully removed from your compare list.', 'cardealer'),
			'added_to_watch' => esc_html__('Selected car was successfully added to your watch list.', 'cardealer'),
			'removed_from_watch' => esc_html__('Selected car was successfully removed from your watch list.', 'cardealer'),
			'wait' => esc_html__('Wait a moment ...', 'cardealer'),
			'add_to_watch_notice' => esc_html__('Only registered users can add cars to Watchlist', 'cardealer'),
			'car_is_featured' => esc_html__('Car is featured from now', 'cardealer'),
			'car_is_unfeatured' => esc_html__('Car is unfeatured from now', 'cardealer'),
			'required_fields' => esc_html__('Please fill all required fields!', 'cardealer'),
			'wrong_username' => esc_html__('Invalid username.', 'cardealer'),
			'wrong_pass' => esc_html__('The password you entered for chosen username is incorrect.', 'cardealer'),
			'currency_converter' => esc_html__('Currency Converter', 'cardealer'),
			'terms_notice' => esc_html__('Please check our website terms of use before posting your car advertisement on the website. Thanks!', 'cardealer'),
			'delete_car_notice' => esc_html__('Do you really want to delete this car?', 'cardealer'),
			'loan_rate_updated' => esc_html__('Your loan rate was updated!', 'cardealer'),
			'current_user_can_delete' => (int) current_user_can('delete_posts'),
			'auth_enter_username' => esc_html__('Enter a username or e-mail address.', 'cardealer'),
			'auth_lostpass_email_sent' => esc_html__('Check your e-mail for the confirmation link.', 'cardealer'),
			'unfeatured_confirm' => esc_html__('Please confirm, that you want to unfeature this vehicle!', 'cardealer'),
			'empty_fields' => esc_html__('Fill in all the fields please!', 'cardealer'),
			'server_error' => esc_html__('Server error!', 'cardealer'),
			'print_this_ad' => esc_html__('Print this Ad', 'cardealer'),
			'lang_edit' => esc_html__('Edit', 'cardealer'),
			'lang_updated' => esc_html__('Updated', 'cardealer'),
			'lang_delete' => esc_html__('Delete', 'cardealer'),
			'lang_cancel' => esc_html__('Cancel', 'cardealer'),
			'lang_sure' => esc_html__('Sure?', 'cardealer'),
			'lang_one_moment' => esc_html__('One moment', 'cardealer'),
			'cardealer_slug' => TMM_Ext_PostType_Car::$slug,
			'lang_loading' => esc_html__('Loading', 'cardealer'),
			'lang_add_location_error1' => esc_html__('Please enter location name!', 'cardealer'),
			'lang_add_location_error2' => esc_html__('Please select country!', 'cardealer'),
			'lang_add_location_error3' => esc_html__('Please select state!', 'cardealer'),
			'lang_popup_close' => esc_html__('Close', 'cardealer'),
			'lang_popup_apply' => esc_html__('Apply', 'cardealer'),
			'lang_thememakers_cardealer_featured_car_set' => esc_html__("You have marked this car as featured", 'cardealer'),
            'lang_thememakers_cardealer_featured_car_unset' => esc_html__("You have unmarked this car as featured", 'cardealer'),
            'lang_tmm_cardealer_draft_car_set' => esc_html__("You have marked this car as draft", 'cardealer'),
            'lang_tmm_cardealer_sold_car_set' => esc_html__("You have marked this car as sold", 'cardealer'),
            'lang_tmm_cardealer_draft_car_unset' => esc_html__("You have unmarked this car as draft", 'cardealer'),
            'lang_tmm_cardealer_sold_car_unset' => esc_html__("You have unmarked this car as sold", 'cardealer'),
            'lang_tmm_enter_data_right' => esc_html__("Please enter the correct data accordingly!", 'cardealer'),
            'lang_have_data_saved' => esc_html__("Pleae make sure you saved the data!", 'cardealer'),
            'lang_sure2' => esc_html__("You do not need this. Right?", 'cardealer'),
		);

		if (current_user_can('manage_options')) {
			$translation_array['featured_confirm'] = esc_html__('Please confirm, that you want to mark this vehicle as "Featured"?', 'cardealer');
		} else {
			$translation_array['featured_confirm'] = esc_html__('This is to confirm that you\'re setting this car as \"featured\". That means, you will not be able to re-use this feature to any other car during the period of ' . $featured_packet_duration . ' day(s). One point of \"Featured car\" will be automatically deducted from your account after your confirmation.', 'cardealer');
		}

		wp_localize_script('tmm_theme', 'tmm_l10n', $translation_array);
		wp_localize_script('tmm_theme', 'ajaxurl', admin_url('admin-ajax.php', 'relative'));

	}
}

add_action('wp_enqueue_scripts', 'tmm_enqueue_scripts', 1);

/* ---------------------------------------------------------------------- */
/* 	Filter Hooks for Form
/* ---------------------------------------------------------------------- */

if (!function_exists('tmm_comments_form_defaults')) {
	// Modity comments form fields
	function tmm_comments_form_defaults($defaults)
	{

		$commenter = wp_get_current_commenter();

		$req = get_option('require_name_email');

		$aria_req = ($req ? " required" : '');

		$defaults['fields']['author'] = '<p class="input-block"><label for="author">' . esc_html__('Your Name', 'cardealer') . ($req ? ': <span class="required">*</span>' : '') . '</label> ' .
		                                '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' /></p>';
		$defaults['fields']['email'] = '<p class="input-block"><label for="email">' . esc_html__('Email', 'cardealer') . ($req ? ': <span class="required">*</span>' : '') . '</label> ' .
		                               '<input id="email" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' /></p>';
		$defaults['fields']['url'] = '<p class="input-block"><label for="url">' . esc_html__('Website', 'cardealer') . '</label> ' .
		                             '<input id="url" name="url" type="url" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></p>';
		$defaults['comment_field'] = '<p class="input-block">' .
		                             '<label for="comment">' . esc_html__('Your Message', 'cardealer') . ($req ? ': <span class="required">*</span>' : '') . '</label>' .
		                             '<textarea ' . $aria_req . ' id="comment" name="comment"></textarea></p>';

		$defaults['comment_notes_before'] = '';
		$defaults['comment_notes_after'] = '';

		$defaults['cancel_reply_link'] = ' - ' . esc_html__('Cancel reply', 'cardealer');

		$defaults['title_reply'] = esc_html__('Leave a Comment', 'cardealer');

		$defaults['label_submit'] = esc_html__('Submit', 'cardealer');

		return $defaults;
	}
}

add_filter('comment_form_defaults', 'tmm_comments_form_defaults');
add_filter('pre_comment_content','wp_kses_data');

/* escape excerpt and title */
add_filter('get_the_excerpt','wp_kses_post');
add_filter('the_title','wp_kses_data');

if (!function_exists('tmm_comments')) {
	function tmm_comments($comment, $args, $depth)
	{
		$GLOBALS['comment'] = $comment;
		?>

		<li class="comment" id="comment-<?php echo comment_ID() ?>" comment-id="<?php echo comment_ID() ?>">

			<article>

				<?php echo get_avatar($comment, $size = '60', TMM_THEME_URI . '/images/gravatar.png'); ?>

				<div class="comment-body">

					<?php if ('0' == $comment->comment_approved) { ?>
						<p class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'cardealer'); ?></p>
					<?php } else { ?>
						<div class="comment-meta clearfix">

							<div class="comment-date">
								<b><?php esc_html_e('Date', 'cardealer'); ?>:</b>&nbsp;<span><?php comment_date(); ?></span> <?php esc_html_e('at', 'cardealer'); ?> <?php comment_date('H:i'); ?>
							</div>
							<div class="comment-author">
								<b><?php esc_html_e('Author', 'cardealer'); ?>:</b>&nbsp;<span><?php echo get_comment_author_link(); ?></span></div>

						</div><!--/ .comment-meta -->

						<p>
							<?php comment_text(); ?>
							<?php echo get_comment_reply_link(array_merge(array('reply_text' => esc_html__('Reply', 'cardealer')), array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
						</p>
					<?php } ?>

				</div>
				<!--/ .comment-body -->

			</article>

		</li><!--/ .comment-->

	<?php
	}
}

function tmm_wysiwyg_editor($mce_buttons)
{
	$pos = array_search('wp_more', $mce_buttons, true);
	if ($pos !== false) {
		$tmp_buttons = array_slice($mce_buttons, 0, $pos + 1);
		$tmp_buttons[] = 'wp_page';
		$mce_buttons = array_merge($tmp_buttons, array_slice($mce_buttons, $pos + 1));
	}
	return $mce_buttons;
}

add_filter('mce_buttons', 'tmm_wysiwyg_editor');


function increase_upload_size_limit($bytes)
{
	return 131072000; // 128 megabytes
}

add_filter('upload_size_limit', 'increase_upload_size_limit');

/**
 * Page and post links handlers (wp_link_pages)
 */

if (!function_exists('tmm_link_pages_add_prevnext')) {
	/* Add prev and next links to a numbered link list */
	function tmm_link_pages_add_prevnext($args) {
		global $page, $numpages, $more;

		if (!$more || $args['next_or_number'] !== 'add_prevnext')
			return $args;

		$args['next_or_number'] = 'number';

		/*  Previous page */
		if ($page - 1){
			$args['before'] .= str_replace('<a ', '<a class="prev page-numbers" ', _wp_link_page($page - 1))
			                   . $args['link_before'] . $args['previouspagelink'] . $args['link_after'] . '</a>';
		}
		/* Next page */
		if ($page < $numpages){
			$args['after'] = str_replace('<a ', '<a class="next page-numbers" ', _wp_link_page($page + 1))
			                 . $args['link_before'] . $args['nextpagelink'] . $args['link_after'] . '</a>'
			                 . $args['after'];
		}
		return $args;
	}
}
add_filter('wp_link_pages_args', 'tmm_link_pages_add_prevnext');

if (!function_exists('tmm_link_pages_current_link')) {
	/* Wrap current page by span */
	function tmm_link_pages_current_link( $link ) {
		if ( ctype_digit( $link ) ) {
			return '<span class="page-numbers current">' . $link . '</span>';
		}
		return $link;
	}
}
add_filter( 'wp_link_pages_link', 'tmm_link_pages_current_link' );

if (!function_exists('tmm_link_pages')) {
	function tmm_link_pages() {
		$args = array(
			'before' =>'<div class="wp-pagenavi">',
			'after'  =>'</div>',
			'link_before'  =>'',
			'link_after'  =>'',
			'separator' => '',
			'nextpagelink' => '',
			'previouspagelink' => '',
			'next_or_number' => 'add_prevnext',
			'echo' => 1,
		);
		wp_link_pages($args);
	}
}

if (!function_exists('tmm_wp_page_menu')) {
	function tmm_wp_page_menu( $args = array() ) {
		$defaults = array('sort_column' => 'menu_order, post_title', 'menu_class' => 'menu', 'echo' => true, 'link_before' => '', 'link_after' => '');
		$args = wp_parse_args( $args, $defaults );

		$args = apply_filters( 'wp_page_menu_args', $args );

		$menu = '';

		$list_args = $args;

		if ( ! empty($args['show_home']) ) {
			if ( true === $args['show_home'] || '1' === $args['show_home'] || 1 === $args['show_home'] )
				$text = esc_html__('Home', 'cardealer');
			else
				$text = $args['show_home'];
			$class = '';
			if ( is_front_page() && !is_paged() )
				$class = 'class="current_page_item"';
			$menu .= '<li ' . $class . '><a href="' . home_url( '/' ) . '">' . $args['link_before'] . $text . $args['link_after'] . '</a></li>';

			if (get_option('show_on_front') == 'page') {
				if ( !empty( $list_args['exclude'] ) ) {
					$list_args['exclude'] .= ',';
				} else {
					$list_args['exclude'] = '';
				}
				$list_args['exclude'] .= get_option('page_on_front');
			}
		}

		$list_args['echo'] = false;
		$list_args['title_li'] = '';
		$menu .= str_replace( array( "\r", "\n", "\t" ), '', wp_list_pages($list_args) );

		if ( $menu )
			$menu = '<ul>' . $menu . '</ul>';

		$menu = '' . $menu . "\n";

		$menu = apply_filters( 'wp_page_menu', $menu, $args );
		if ( $args['echo'] )
			echo $menu;
		else
			return $menu;
	}
}

/* ---------------------------------------------------------------------- */
/* 	Get Page Sidebar Position
/* ---------------------------------------------------------------------- */

if ( !function_exists('tmm_get_sidebar_position') ) {
	function tmm_get_sidebar_position() {
		if (!TMM_Page::$sidebar_position) {
			TMM_Page::set_sidebar_position();
		}

		return TMM_Page::$sidebar_position;
	}
}

/* ---------------------------------------------------------------------- */
/* 	Display Page Slider
/* ---------------------------------------------------------------------- */

if ( !function_exists('tmm_page_slider') ) {
	function tmm_page_slider($post_id) {
		echo '<div class="container">
				<div class="row">
					<div class="col-xs-12">';
		echo TMM_Ext_Sliders::draw_page_slider($post_id);
		echo '</div>
			</div><!--/ .row-->
			</div><!--/ .container-->';
	}
}

/* ---------------------------------------------------------------------- */
/* 	Display Layout Content
/* ---------------------------------------------------------------------- */

if ( !function_exists('tmm_layout_content') ) {
	function tmm_layout_content($post_id, $row_type = 'default') {
		if (class_exists('TMM_Content_Composer')) {
			TMM_Content_Composer::the_layout_content($post_id, $row_type);
		} else if(class_exists('TMM_Ext_LayoutConstructor')){
			TMM_Ext_LayoutConstructor::draw_front($post_id);
		}
	}
}

/* ---------------------------------------------------------------------- */
/* 	Display Breadcrumbs
/* ---------------------------------------------------------------------- */

if ( !function_exists('tmm_breadcrumbs') ) {
	function tmm_breadcrumbs() {
		if (TMM::get_option("breadcrumbs") && !is_404()) {
			echo '<div class="breadcrumbs">';
			TMM_Helper::draw_breadcrumbs();
			echo '</div>';
		}
	}
}

/* ---------------------------------------------------------------------- */
/* 	Remove empty tags from content
/* ---------------------------------------------------------------------- */

if ( !function_exists('tmm_remove_empty_tags') ) {
	function tmm_remove_empty_tags($content) {
		$tags = array(
			'<p>[' => '[',
			']</p>' => ']',
			']<br>' => ']',
			']<br />' => ']'
		);

		$content = strtr($content, $tags);
		return $content;
	}
}

add_filter('the_content', 'tmm_remove_empty_tags');


/* ---------------------------------------------------------------------- */
/* 	Define is the blog archive page
/* ---------------------------------------------------------------------- */

if ( !function_exists('tmm_is_blog_archive') ) {
	function tmm_is_blog_archive() {

		if (is_category() || is_tag() || is_author() || is_date() || is_tax( 'post_format' ) || ( is_home() && get_option( 'show_on_front') === 'posts' )) {
			return true;
		}

		return false;
	}
}

/* ---------------------------------------------------------------------- */
/* 	Install and Activate Required Plugins
/* ---------------------------------------------------------------------- */

if ( !function_exists('tmm_get_plugins') ) {
	function tmm_get_plugins() {
		/**
		 * Array of plugin arrays. Required keys are name and slug.
		 * If the source is NOT from the .org repo, then source is also required.
		 */
		return array(

			/* This is an example of how to include a plugin pre-packaged with a theme.
			array(
				'name'               => 'TGM Example Plugin', // The plugin name.
				'slug'               => 'tgm-example-plugin', // The plugin slug (typically the folder name).
				'source'             => get_stylesheet_directory() . '/lib/plugins/tgm-example-plugin.zip', // The plugin source.
				'required'           => true, // If false, the plugin is only 'recommended' instead of required.
				'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
				'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			),
			*/

			array(
				'name'                  => esc_html__( 'ThemeMakers AddThis', 'cardealer' ),
				'slug'                  => 'tmm_addthis',
				'source'                => 'https://github.com/ThemeMakers/tmm_addthis/archive/cardealer_v1.1.0.zip',
				'required'              => false,
				'version'               => '1.1.0',
			),
			array(
				'name'                  => esc_html__( 'ThemeMakers Cardealer Features', 'cardealer' ),
				'slug'                  => 'tmm_theme_features',
				'source'                => 'https://github.com/ThemeMakers/tmm_theme_features/archive/cardealer_v1.0.9.zip',
				'required'              => true,
				'force_activation'      => true,
				'force_deactivation'    => true,
				'version'               => '1.0.9',
			),
			array(
				'name'                  => esc_html__( 'ThemeMakers DB Migrate', 'cardealer' ),
				'slug'                  => 'tmm_db_migrate',
				'source'                => 'https://github.com/ThemeMakers/tmm_db_migrate/archive/cardealer_v2.0.8.zip',
				'required'              => false,
				'version'               => '2.0.8',
			),
			array(
				'name'                  => esc_html__( 'ThemeMakers Visual Content Composer', 'cardealer' ),
				'slug'                  => 'tmm_content_composer',
				'source'                => 'https://github.com/ThemeMakers/tmm_content_composer/archive/cardealer_v1.4.2.zip',
				'required'              => true,
				'version'               => '1.4.2',
			),
			array(
				'name'                  => esc_html__( 'ThemeMakers PayPal Express Checkout', 'cardealer' ),
				'slug'                  => 'tmm_paypal_checkout',
				'source'                => 'https://github.com/ThemeMakers/tmm_paypal_checkout/archive/cardealer_v1.1.7.zip',
				'required'              => false,
				'version'               => '1.1.7',
			),
			array(
				'name'                  => esc_html__( 'LayerSlider', 'cardealer' ),
				'slug'                  => 'LayerSlider',
				'source'                => TMM_THEME_URI . '/install/layersliderwp-6.7.6.zip',
				'required'              => false,
				'version'               => '6.7.6',
			),
			array(
				'name'                  => esc_html__( 'WooCommerce', 'cardealer' ),
				'slug'                  => 'woocommerce',
				'source'                => 'https://downloads.wordpress.org/plugin/woocommerce.3.5.2.zip',
				'required'              => false,
				'version'               => '3.5.2',
			),
			array(
				'name'                  => esc_html__( 'WooSidebars', 'cardealer' ),
				'slug'                  => 'woowidebars',
				'source'                => 'https://downloads.wordpress.org/plugin/woosidebars.1.4.3.zip',
				'required'              => false,
				'version'               => '1.4.3',
			),
			array(
				'name'                  => esc_html__( 'Envato Market', 'cardealer' ),
				'slug'                  => 'envato-market',
				'source'                => 'https://github.com/envato/wp-envato-market/releases/download/v2.0.1/envato-market-2.0.1.zip',
				'required'              => false,
				'version'               => '2.0.1',
			),
			array(
				'name'                  => esc_html__( 'Classic Editor', 'cardealer' ),
				'slug'                  => 'classic-editor',
				'source'                => 'https://downloads.wordpress.org/plugin/classic-editor.1.3.zip',
				'required'              => true,
				'force_activation'      => true,
				'force_deactivation'    => true,
			)

		);

	}
}

/**
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */

function tmm_register_required_plugins() {

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'default_path' => '',                      // Default absolute path to pre-packaged plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
		'strings'      => array(
			'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
		)
	);

	$plugins = tmm_get_plugins();
	tgmpa( $plugins, $config );

}

if ( !function_exists('tmm_check_plugin_updates') ) {
	function tmm_check_plugin_updates() {
		$plugins = tmm_get_plugins();
		TMM_Plugin_Update_Checker::init($plugins);
	}
}

add_action( 'tgmpa_register', 'tmm_register_required_plugins', 10 );
add_action( 'admin_init', 'tmm_check_plugin_updates', 10 );

// WP Multilingual plugin configs for correct widget data saving
add_filter ( 'wpm_widgets_config', '__return_null');
add_filter ( 'wpm_widget_thememakers_app_cardealer_quicksearch_config', '__return_null');

// Disable Gutenberg
if (version_compare($GLOBALS['wp_version'], '5.0', '>')) {

	// WP > 5
	add_filter('use_block_editor_for_post_type', '__return_false', 100);

} else {

	// WP < 5
	add_filter('gutenberg_can_edit_post_type', '__return_false');

}