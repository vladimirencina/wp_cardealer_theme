<?php if (!defined('ABSPATH')) die('No direct access allowed');

$form_index = 0;
if (isset($contact_form['inique_id'])) {
	$form_index = $contact_form['inique_id'];
} else {
	$form_index = uniqid();
}
?>

<a href="#"
   class="admin-button button-gray js_back_to_forms_list"><?php esc_html_e('Back to forms list', 'cardealer'); ?></a>

<br/>

<input type="hidden" name="contact_form[<?php echo $form_index; ?>][inique_id]" value="<?php echo $form_index ?>"/>

<div class="section">

	<div class="form-holder">

		<div class="form-group-title">
			<input type="text" class="form_name" value="<?php echo $contact_form['title'] ?>"
				   name="contact_form[<?php echo $form_index; ?>][title]">
		</div>
		<!--/ .form-group-title-->

		<div class="option">

			<div class="switch">
				<input type="hidden" name="contact_form[<?php echo $form_index; ?>][has_capture]"
					   value="<?php echo($contact_form['has_capture'] ? 1 : 0) ?>"/>
				<input type="checkbox" id="form-captcha" <?php echo($contact_form['has_capture'] ? "checked" : "") ?>
					   class="form_captcha option_checkbox"/>
				<label for="form-captcha"><span></span><?php esc_html_e('Enable Captcha', 'cardealer'); ?></label>
				<input type="hidden" name="contact_form_index" value="<?php echo $form_index; ?>"/>
			</div>
			<!--/ .switch-->

		</div>

		<a href="#" class="add-drag-holder add-button add_contact_field_button" form-id="<?php echo $form_index ?>"></a>

		<div class="admin-drag-holder clearfix">

			<div class="option option-select">

				<?php
				TMM_OptionsHelper::draw_theme_option(array(
					'name' => "contact_form[" . $form_index . "][submit_button]",
					'title' => esc_html__('Select Submit Button Color', 'cardealer'),
					'type' => 'select',
					'values' => TMM_OptionsHelper::get_theme_buttons(),
					'value' => @$contact_form['submit_button'],
					'show_title' => true,
					'css_class' => '',
					'description' => ''
				));
				?>

			</div>
			<!--/ .option-->

			<div class="option option-text">

				<?php
				TMM_OptionsHelper::draw_theme_option(array(
					'name' => "contact_form[" . $form_index . "][recepient_email]",
					'title' => esc_html__('Recipient\'s E-mail Field:', 'cardealer'),
					'type' => 'text',
					'value' => @$contact_form['recepient_email'],
					'css_class' => '',
					'description' => esc_html__('Leave this field blank to use default admin email address.', 'cardealer')
				));
				?>

			</div>
			<!--/ .option-->

			<div class="option option-text">

				<?php
				TMM_OptionsHelper::draw_theme_option(array(
					'name' => "contact_form[" . $form_index . "][submit_button_text]",
					'title' => esc_html__('Submit Button Text', 'cardealer'),
					'type' => 'text',
					'value' => @$contact_form['submit_button_text'],
					'css_class' => '',
					'description' => ''
				));
				?>

			</div>
			<!--/ .option-->

		</div>

		<ul class="drag_contact_form_list">

			<?php if (!empty($contact_form['inputs'])) : ?>
				<?php foreach ($contact_form['inputs'] as $key_input => $input) : ?>
					<?php $key_input = uniqid(); ?>

					<li class="admin-drag-holder clearfix">

						<a href="#" class="delete_contact_field_button close"></a>

						<?php
						TMM_OptionsHelper::draw_theme_option(array(
							'name' => "contact_form[$form_index][inputs][$key_input][type]",
							'title' => esc_html__('Choose Field Type', 'cardealer'),
							'type' => 'select',
							'values' => TMM_Contact_Form::$types,
							'value' => $input['type'],
							'css_class' => 'options_type_select',
							'show_title' => true,
							'description' => ''
						));
						?>

						<?php
						TMM_OptionsHelper::draw_theme_option(array(
							'name' => "contact_form[" . $form_index . "][inputs][" . $key_input . "][label]",
							'title' => esc_html__('Field Label', 'cardealer'),
							'type' => 'text',
							'value' => $input['label'],
							'css_class' => 'label',
							'description' => ""
						));
						?>

						<div class="select_options"
							 style="display: <?php echo($input['type'] == "select" ? "block" : "none") ?>;">

							<?php
							TMM_OptionsHelper::draw_theme_option(array(
								'name' => "contact_form[" . $form_index . "][inputs][" . $key_input . "][options]",
								'title' => esc_html__('Options (comma separated)', 'cardealer'),
								'type' => 'text',
								'value' => $input['options'],
								'css_class' => 'options',
								'description' => ""
							));
							?>

						</div>

						<label class="with-check">

							<?php
							TMM_OptionsHelper::draw_theme_option(array(
								'name' => "contact_form[" . $form_index . "][inputs][" . $key_input . "][is_required]",
								'title' => esc_html__('Additional Options', 'cardealer'),
								'type' => 'checkbox',
								'default_value' => 0,
								'title' => esc_html__('Required Field', 'cardealer'),
								'description' => '',
								'css_class' => 'form_required',
								'value' => $input['is_required'],
								'id' => ''
							));
							?>

						</label>

					</li><!--/ .admin-drag-holder-->

				<?php endforeach; ?>
			<?php endif; ?>

		</ul>

	</div>
	<!--/ .form-holder-->

</div><!--/ .section-->



