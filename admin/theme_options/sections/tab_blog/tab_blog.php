<?php if (!defined('ABSPATH')) die('No direct access allowed');

$child_sections = array();
$tab_key = basename(__FILE__, '.php');
$pagepath = TMM_THEME_PATH . '/admin/theme_options/sections/' . $tab_key . '/custom_html/';
//*************************************

$content = array(
	'block1' => array(
		'title' => esc_html__('Listing Page', 'cardealer'),
		'type' => 'items_block',
		'items' => array(
			'excerpt_symbols_count' => array(
				'title' => esc_html__('Excerpt Symbols Count', 'cardealer'),
				'type' => 'slider',
				'default_value' => 120,
				'min' => 10,
				'max' => 900,
				'description' => esc_html__('This option will excerpt full article content with a necessary amount of symbols on the blog listing page.', 'cardealer'),
				'show_title' => true,
				'custom_html' => ''
			),
			'blog_listing_show_all_metadata' => array(
				'title' => esc_html__('Show/Hide All Meta Info', 'cardealer'),
				'type' => 'checkbox',
				'default_value' => 1,
				'description' => esc_html__('If checked, all the meta info appears above article title such as date, author, tags etc. This option will override the next separate four options.', 'cardealer'),
				'custom_html' => ''
			),
			'blog_listing_show_date' => array(
				'title' => esc_html__('Show/Hide Date Info', 'cardealer'),
				'type' => 'checkbox',
				'default_value' => 1,
				'description' => esc_html__('If checked, the date info appears above article title.', 'cardealer'),
				'custom_html' => ''
			),
			'blog_listing_show_author' => array(
				'title' => esc_html__('Show/Hide Author Info', 'cardealer'),
				'type' => 'checkbox',
				'default_value' => 1,
				'description' => esc_html__('If checked, the author info appears above article title.', 'cardealer'),
				'custom_html' => ''
			),
			'blog_listing_show_tags' => array(
				'title' => esc_html__('Show/Hide Tags Info', 'cardealer'),
				'type' => 'checkbox',
				'default_value' => 1,
				'description' => esc_html__('If checked, the tags info appears above article title.', 'cardealer'),
				'custom_html' => ''
			),
			'blog_listing_show_category' => array(
				'title' => esc_html__('Show/Hide Category Info', 'cardealer'),
				'type' => 'checkbox',
				'default_value' => 1,
				'description' => esc_html__('If checked, the category info appears above article title.', 'cardealer'),
				'custom_html' => ''
			),
			'blog_archive_header_type' => array(
				'title' => esc_html__('Header Type for Blog Archive Pages', 'cardealer'),
				'show_title' => true,
				'css_class' => 'blog_archive_header_type',
				'type' => 'select',
				'default_value' => '0',
				'values' => array(
					0 => esc_html__('Default', 'cardealer'),
					'classic' => esc_html__('Classic', 'cardealer'),
					'alternate' => esc_html__('Alternate', 'cardealer')
				),
				'description' => esc_html__('This option responds for all blog listing pages(i.e. Front page with latest posts, Category archive, Tag archive, Date archive). If set to default, all that pages will inherit general header type (check Genaral tab). Either Classic or Alternate will take a unique header type for certain pages.', 'cardealer'),
				'custom_html' => TMM::draw_free_page($pagepath . 'blog_archive_header.php')
			),
			'blog_archive_hide_title' => array(
				'title' => esc_html__('Hide Default Title', 'cardealer'),
				'type' => 'checkbox',
				'default_value' => 0,
				'description' => '',
				'custom_html' => ''
			),
		)
	),
	'block2' => array(
		'title' => esc_html__('Single Page', 'cardealer'),
		'type' => 'items_block',
		'items' => array(
			'blog_single_show_comments' => array(
				'title' => esc_html__('Show/Hide Comments', 'cardealer'),
				'type' => 'checkbox',
				'default_value' => 1,
				'description' => esc_html__('If checked, all the visitors are allowed to post their comments to articles.', 'cardealer'),
				'custom_html' => ''
			),
			'blog_single_show_fb_comments' => array(
				'title' => esc_html__('Show/Hide Facebook Comments', 'cardealer'),
				'type' => 'checkbox',
				'default_value' => 0,
				'description' => esc_html__('If checked, all the visitors are allowed to post their comments to articles with faceebok.', 'cardealer'),
				'custom_html' => ''
			),
			'blog_single_show_all_metadata' => array(
				'title' => esc_html__('Show/Hide All Meta Info', 'cardealer'),
				'type' => 'checkbox',
				'default_value' => 1,
				'description' => esc_html__('If checked, all the meta info appears below article title such as date, author, tags etc. This option will override the next separate four options.', 'cardealer'),
				'custom_html' => ''
			),
			'blog_single_show_date' => array(
				'title' => esc_html__('Show/Hide Date Info', 'cardealer'),
				'type' => 'checkbox',
				'default_value' => 1,
				'description' => esc_html__('If checked, the date info appears below article title.', 'cardealer'),
				'custom_html' => ''
			),
			'blog_single_show_author' => array(
				'title' => esc_html__('Show/Hide Author Info', 'cardealer'),
				'type' => 'checkbox',
				'default_value' => 1,
				'description' => esc_html__('If checked, the author info appears below article title.', 'cardealer'),
				'custom_html' => ''
			),
			'blog_single_show_tags' => array(
				'title' => esc_html__('Show/Hide Tags Info', 'cardealer'),
				'type' => 'checkbox',
				'default_value' => 1,
				'description' => esc_html__('If checked, the tags info appears below article title.', 'cardealer'),
				'custom_html' => ''
			),
			'blog_single_show_category' => array(
				'title' => esc_html__('Show/Hide Category Info', 'cardealer'),
				'type' => 'checkbox',
				'default_value' => 1,
				'description' => esc_html__('If checked, the category info appears below article title.', 'cardealer'),
				'custom_html' => ''
			),
		)
	),
);




//*************************************
//*************************************
$sections = array(
	'name' => esc_html__('Blog/News', 'cardealer'),
	'css_class' => 'shortcut-blog',
	'show_general_page' => true,
	'content' => $content,
	'child_sections' => $child_sections,
	'menu_icon' => 'dashicons-format-standard'
);

TMM_OptionsHelper::$sections[$tab_key] = $sections;

