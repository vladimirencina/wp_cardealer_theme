<?php if (!defined('ABSPATH')) die('No direct access allowed');

$child_sections = array();
$tab_key = basename(__FILE__, '.php');
$pagepath = TMM_THEME_PATH . '/admin/theme_options/sections/' . $tab_key . '/custom_html/';

//***

$content = array(
	
	'copyright_text' => array(
		'title' => esc_html__('Copyrights', 'cardealer'),
		'type' => 'textarea',
		'default_value' => sprintf( esc_html__('Copyright &copy; %d. ThemeMakers. All rights reserved', 'cardealer'), date('Y')),
		'description' => '',
		'custom_html' => ''
	),
	'hide_footer' => array(
		'title' => esc_html__('Disable Footer Widget Area', 'cardealer'),
		'type' => 'checkbox',
		'default_value' => 0,
		'description' => esc_html__('If checked all the footer widgets would not appear in the bottom of each page.', 'cardealer'),
		'custom_html' => ''
	),
	'footer_columns' => array(
		'title' => esc_html__('Footer Columns Number', 'cardealer'),
		'type' => 'select',
		'default_value' => 4,
		'values'        => array(
			1 => 1,
			2 => 2,
			3 => 3,
			4 => 4,
		),
		'description' => esc_html__('Number of columns with widgets in footer area.', 'cardealer'),
		'custom_html' => ''
	)
);


$sections = array(
	'name' => esc_html__("Footer", 'cardealer'),
	'css_class' => 'shortcut-footer',
	'show_general_page' => true,
	'content' => $content,
	'child_sections' => $child_sections,
	'menu_icon' => 'dashicons-editor-kitchensink'
);

TMM_OptionsHelper::$sections[$tab_key] = $sections;

