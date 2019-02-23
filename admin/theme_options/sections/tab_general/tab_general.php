<?php if (!defined('ABSPATH')) die('No direct access allowed');

$child_sections = array();
$tab_key = basename(__FILE__, '.php');
$pagepath = TMM_THEME_PATH . '/admin/theme_options/sections/' . $tab_key . '/custom_html/';

$list_pages = get_posts(array(
	'post_type' => 'page',
	'numberposts'     => -1
));

$list_pages_array = array('' => 'Select Page');

if (!empty($list_pages)) {
	foreach($list_pages as $id => $page) {
		$list_pages_array[$page->ID] = $page->post_title;
	}
}

$content = array(

	'boxed_layout' => array(
		'title' => esc_html__('Enable Boxed Layout', 'cardealer'),
		'type' => 'checkbox',
		'default_value' => 0,
		'description' => '',
		'custom_html' => ''
	),

	'header_type' => array(
		'title' => esc_html__('Header Type', 'cardealer'),
		'type' => 'select',
		'default_value' => 'classic',
		'values' => array(
			'classic' => esc_html__('Classic', 'cardealer'),
			'alternate' => esc_html__('Alternate', 'cardealer')
		),
		'description' => esc_html__('This option responds for all website pages. Either Classic or Alternate will take a unique header type for every page.', 'cardealer'),
		'custom_html' => ''
	),

	'sticky_nav' => array(
		'title' => esc_html__('Enable Sticky Navigation', 'cardealer'),
		'type' => 'checkbox',
		'default_value' => 0,
		'description' => esc_html__('Enable sticky navigation bar', 'cardealer'),
		'custom_html' => ''
	),

	'sticky_nav_mobile' => array(
		'title' => esc_html__('Enable Sticky Navigation on Mobiles', 'cardealer'),
		'type' => 'checkbox',
		'default_value' => 1,
		'description' => esc_html__('Enable sticky navigation bar on mobiles', 'cardealer'),
		'custom_html' => ''
	),

	'breadcrumbs' => array(
		'title' => esc_html__('Enable Breadcrumbs', 'cardealer'),
		'type' => 'checkbox',
		'default_value' => 0,
		'description' => esc_html__('Enable breadcrumbs', 'cardealer'),
		'custom_html' => ''
	),
	
	'favicon_img' => array(
		'title' => esc_html__('Website Favicon', 'cardealer'),
		'type' => 'upload',
		'default_value' => TMM_THEME_URI . '/favicon.ico',
		'description' => esc_html__('Upload your favicon here. It will appear in your browser\'s address bar as per example below. Recommended dimensions: 32x32. Recommended image types: png', 'cardealer'),
		'custom_html' => TMM::draw_free_page($pagepath . 'favicon_img.php')
	),	
	
	'logo' => array(
		'title' => esc_html__('Website Logo', 'cardealer'),
		'type' => 'custom',
		'default_value' => '',
		'description' => '',
		'custom_html' => TMM::draw_free_page($pagepath . 'logo.php')
	),
	'sidebar_position' => array(
		'title' => esc_html__('Default Sidebar Position', 'cardealer'),
		'type' => 'custom',
		'default_value' => 'no_sidebar',
		'description' => '',
		'custom_html' => TMM::draw_free_page($pagepath . 'sidebar_position.php')
	)
	
);

$sections = array(
	'name' => esc_html__("General", 'cardealer'),
	'css_class' => 'shortcut-options',
	'show_general_page' => true,
	'content' => $content,
	'child_sections' => $child_sections,
	'menu_icon' => 'dashicons-admin-settings'
);

TMM_OptionsHelper::$sections[$tab_key] = $sections;

