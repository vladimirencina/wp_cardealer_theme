<?php if (!defined('ABSPATH')) exit();

TMM_OptionsHelper::draw_theme_option(array(
	'name' => 'blog_archive_show_title_bar',
	'type' => 'checkbox',
	'title'=> esc_html__('Display Title Bar', 'cardealer'),
	'description' => '',
	'default_value' => 0,
	'css_class' => '',
	'is_reset' => true,
	'hide' => TMM::get_option('blog_archive_header_type') === 'alternate' ? false : true,
));
?>

<div id="blog_archive_title_bar_content"<?php echo TMM::get_option('blog_archive_show_title_bar') ? '' : ' style="display:none"' ?>>

	<?php
	TMM_OptionsHelper::draw_theme_option(array(
		'name' => 'blog_archive_alt_title',
		'type' => 'text',
		'title'=> esc_html__('Alternate Title', 'cardealer'),
		'description' => esc_html__('Leave blank to use native page namings.', 'cardealer'),
		'default_value' => '',
	));
	?>

	<?php
	TMM_OptionsHelper::draw_theme_option(array(
		'name' => 'blog_archive_subtitle',
		'type' => 'text',
		'title'=> esc_html__('Subtitle', 'cardealer'),
		'description' => esc_html__('Leave blank to not use or Fill it in if you want to add a second level heading underneath main page title.', 'cardealer'),
		'default_value' => '',
	));
	?>

	<?php
	TMM_OptionsHelper::draw_theme_option(array(
		'name' => 'blog_archive_title_bar_bg_type',
		'css_class' => 'blog_archive_title_bar_bg_type',
		'type' => 'select',
		'title'=> esc_html__('Title Bar Background', 'cardealer'),
		'description' => esc_html__('Choose an option for background filling.', 'cardealer'),
		'default_value' => 'color',
		'values' => array(
			'color' => esc_html__("Color", 'cardealer'),
			'image' => esc_html__("Image", 'cardealer'),
		),

	));
	?>

	<?php
	TMM_OptionsHelper::draw_theme_option(array(
		'name' => 'blog_archive_title_bar_bg_color',
		'css_class' => 'blog_archive_title_bar_bg_color',
		'title'=>__('Background Color', 'cardealer'),
		'type' => 'color',
		'default_value' => '',
		'description' => esc_html__('Set a background color using HEX code format or use a colorpicker.', 'cardealer'),
		'css_class' => '',
		'is_reset' => true,
		'hide' => TMM::get_option('blog_archive_title_bar_bg_type') !== 'image' ? 0 : 1
	));
	?>

	<?php
	TMM_OptionsHelper::draw_theme_option(array(
		'name' => 'blog_archive_title_bar_bg_image',
		'id' => 'blog_archive_title_bar_bg_image',
		'title'=>__('Background Image', 'cardealer'),
		'type' => 'upload',
		'default_value' => '',
		'description' => esc_html__('Set a background image by typing in an absolute path to your image or chose one from your media library.', 'cardealer'),
		'css_class' => '',
		'is_reset' => true,
		'hide' => TMM::get_option('blog_archive_title_bar_bg_type') === 'image' ? 0 : 1
	));
	?>

	<?php
	TMM_OptionsHelper::draw_theme_option(array(
		'name' => 'blog_archive_title_bar_bg_image_option',
		'css_class' => 'blog_archive_title_bar_bg_image_option',
		'type' => 'select',
		'title'=> esc_html__('Background image options', 'cardealer'),
		'description' => esc_html__('Set a background repetition type or make it fixed to have like a parallax effect.', 'cardealer'),
		'default_value' => 'repeat',
		'values' => array(
			"repeat" => esc_html__("Repeat", 'cardealer'),
			"repeat-x" => esc_html__("Repeat-X", 'cardealer'),
			"fixed" => esc_html__("Fixed", 'cardealer'),
		),
		'hide' => TMM::get_option('blog_archive_title_bar_bg_type') === 'image' ? 0 : 1
	));
	?>

</div>