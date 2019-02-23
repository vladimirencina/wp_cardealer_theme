<?php if (!defined('ABSPATH')) die('No direct access allowed');

$child_sections = array();
$tab_key = basename(__FILE__, '.php');
$pagepath = TMM_THEME_PATH . '/admin/theme_options/sections/' . $tab_key . '/custom_html/';                                                                            

//*************************************

$content = array(
    
    'flexslider' => array(
            'title' => 'Flexslider',
            'type' => 'custom',
            'default_value' => '',
            'description' => '',
            'custom_html' => TMM::draw_free_page($pagepath . 'flexslider.php')
    )     
);

$sections = array(
	'name' => esc_html__('Sliders Settings', 'cardealer'),
	'css_class' => 'shortcut-slider',
	'show_general_page' => true,
	'content' => $content,
	'child_sections' => $child_sections,
	'menu_icon' => 'dashicons-images-alt2'
);

TMM_OptionsHelper::$sections[$tab_key] = $sections;

