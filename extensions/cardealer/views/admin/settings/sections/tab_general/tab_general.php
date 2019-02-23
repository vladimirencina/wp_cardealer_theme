<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php

$content = array();
$child_sections = array();
$tab_key = basename(__FILE__, '.php');
$pagepath = TMM_THEME_PATH . '/extensions/cardealer/views/admin/settings/sections/' . $tab_key . '/custom_html/';

$child_sections_required_fature = array();
$features = array(
	'required_car_features[car_adv_desc]' => array('title' => esc_html__('Description', 'cardealer'), 'desc' => esc_html__('Set Description field as required', 'cardealer'), 'default' => '', 'disable' => ''),
	'required_car_features[car_state]' => array('title' => esc_html__('Car Condition', 'cardealer'), 'desc' => esc_html__('Set Car Condition field as required', 'cardealer'), 'default' => '1', 'disable' => ''),
	'required_car_features[car_carlocation]' => array('title' => esc_html__('Car Location', 'cardealer'), 'desc' => esc_html__('Set Car Location field as required', 'cardealer'), 'default' => '1', 'disable' => ''),
	'required_car_features[car_taxonomies]' => array('title' => esc_html__('Car Producer', 'cardealer'), 'desc' => esc_html__('Set Car Producer field as required', 'cardealer'), 'default' => '1', 'disable' => '1'),
	'required_car_features[car_model]' => array('title' => esc_html__('Car Model', 'cardealer'), 'desc' => esc_html__('Set Car Model field as required', 'cardealer'), 'default' => '0', 'disable' => ''),
	//'required_car_features[car_price]' => array('title' => esc_html__('Car Price', 'cardealer'), 'desc' => esc_html__('Set Car Price field as required', 'cardealer'), 'default' => '1', 'disable' => ''),
	'required_car_features[car_year]' => array('title' => esc_html__('Car Year', 'cardealer'), 'desc' => esc_html__('Set Car Year field as required', 'cardealer'), 'default' => '1', 'disable' => ''),
	'required_car_features[car_mileage]' => array('title' => esc_html__('Car Mileage', 'cardealer'), 'desc' => esc_html__('Set Car Mileage field as required', 'cardealer'), 'default' => '1', 'disable' => ''),
	'required_car_features[car_vin]' => array('title' => esc_html__('Car Vin', 'cardealer'), 'desc' => esc_html__('Set Car Vin field as required', 'cardealer'), 'default' => '', 'disable' => ''),
	'required_car_features[car_engine_size]' => array('title' => esc_html__('Car Engine Size', 'cardealer'), 'desc' => esc_html__('Set Car Engine Size field as required', 'cardealer'), 'default' => '1', 'disable' => ''),
	'required_car_features[car_engine_additional]' => array('title' => esc_html__('Car Engine Additional', 'cardealer'), 'desc' => esc_html__('Set Car Engine Additional field as required', 'cardealer'), 'default' => '', 'disable' => ''),
	'required_car_features[car_owner_number]' => array('title' => esc_html__('Car Owner Number', 'cardealer'), 'desc' => esc_html__('Set Car Owner Number field as required', 'cardealer'), 'default' => '', 'disable' => ''),
	'required_car_features[car_transmission]' => array('title' => esc_html__('Car Gearbox', 'cardealer'), 'desc' => esc_html__('Set Car Gearbox field as required', 'cardealer'), 'default' => '1', 'disable' => ''),
	'required_car_features[car_fuel_type]' => array('title' => esc_html__('Car Fuel Type', 'cardealer'), 'desc' => esc_html__('Set Car Fuel Type field as required', 'cardealer'), 'default' => '1', 'disable' => ''),
	'required_car_features[car_body]' => array('title' => esc_html__('Car Body', 'cardealer'), 'desc' => esc_html__('Set Car Body field as required', 'cardealer'), 'default' => '1', 'disable' => ''),
	'required_car_features[car_interrior_color]' => array('title' => esc_html__('Car Interior Color', 'cardealer'), 'desc' => esc_html__('Set Car Interior Color field as required', 'cardealer'), 'default' => '1', 'disable' => ''),
	'required_car_features[car_exterior_color]' => array('title' => esc_html__('Car Exterior Color', 'cardealer'), 'desc' => esc_html__('Set Car Exterior Color field as required', 'cardealer'), 'default' => '1', 'disable' => ''),
	'required_car_features[car_doors_count]' => array('title' => esc_html__('Car Doors Count', 'cardealer'), 'desc' => esc_html__('Set Car Doors Count field as required', 'cardealer'), 'default' => '', 'disable' => '')
);
foreach ($features as $key => $feature) {
	$child_sections_required_fature[$key] = array(

		'name_type' => 'array',
		'type' => 'checkbox',
		'default_value' => $feature['default'],
		'title' => $feature['title'],
		'description' => $feature['desc'],
		'disable' => $feature['disable'],
		'css_class' => '',
		'show_title' => true
	);
}
$contact_forms = array();
$contact_forms[] = 'Choose contact form';
$contact_forms += TMM_Contact_Form::get_forms_names();
unset($contact_forms['__FORM_NAME__']);

$currencies_list = TMM_Ext_Car_Dealer::$currencies_list;
$currencies = array();

foreach ($currencies_list as $key => $value) {
	$currency_slug = strtolower($value['name']);
	$currencies["convert_currency_to[{$currency_slug}]"] = array(
		'name_type' => 'array',
		'type' => 'checkbox',
		'default_value' => ($value['name'] == 'EUR' || $value['name'] == 'GBP' || $value['name'] == 'CHF') ? 1 : 0,
		'title' => __($value['name'], 'cardealer'),
		'description' => esc_html__("Convert default currency to {$value['name']}", 'cardealer'),
		'css_class' => '',
		'show_title' => true
	);
}

$tmp = array();
foreach ($currencies_list as $key => $value) {
	$tmp[$key] = $key . " " . $value['symbol'];
}
$currencies_list = $tmp;


$child_sections['default_settings'] = array(
	'name' => esc_html__('Default Settings', 'cardealer'),
	'sections' => array(
		'block00' => array(
			'title' => esc_html__('Enable Login/Profile Panel', 'cardealer'),
			'type' => 'items_block',
			'items' => array(
				'show_auth_panel' => array(
					'type' => 'checkbox',
					'default_value' => 1,
					'title' => esc_html__('Enable Login/Profile Panel', 'cardealer'),
					'description' => esc_html__("Show Login/Profile panel", 'cardealer'),
					'css_class' => '',
					'show_title' => true
				)

			)
		),
		'block01' => array(
			'title' => esc_html__('Price Settings', 'cardealer'),
			'type' => 'items_block',
			'items' => array(
				'car_price_symbol_pos' => array(
					'type' => 'select',
					'default_value' => 'left',
					'values' => array(
						'left' => esc_html__('Left', 'cardealer'),
						'right' => esc_html__('Right', 'cardealer'),
						'left_space' => esc_html__('Left with space', 'cardealer'),
						'right_space' => esc_html__('Right with space', 'cardealer'),
					),
					'title' => esc_html__('Currency Symbol Position', 'cardealer'),
					'description' => esc_html__("Set currency symbol position in a price", 'cardealer'),
					'css_class' => '',
					'show_title' => true
				),
				'car_price_thousand_separator' => array(
					'type' => 'select',
					'default_value' => 'comma',
					'values' => array(
						'comma' => esc_html__('American', 'cardealer'),
						'dot' => esc_html__('Europenian', 'cardealer'),
					),
					'title' => esc_html__('Currency Format', 'cardealer'),
					'description' => esc_html__("According to the style guide used by international institutions", 'cardealer'),
					'css_class' => '',
					'show_title' => true
				),
				'show_float_format' => array(
					'type' => 'checkbox',
					'default_value' => 0,
					'title' => esc_html__('Enable float price format', 'cardealer'),
					'description' => esc_html__("Display all prices in float format", 'cardealer'),
					'css_class' => '',
					'show_title' => true
				)
			)
		),
		'block0' => array(
			'title' => esc_html__('Currency Converter Settings', 'cardealer'),
			'type' => 'items_block',
			'items' => array(
				'show_currency_converter' => array(
					'type' => 'checkbox',
					'default_value' => 1,
					'title' => esc_html__('Enable Currency Converter', 'cardealer'),
					'description' => esc_html__("Display currency converter when user clicks the price", 'cardealer'),
					'css_class' => '',
					'show_title' => true
				),
				'default_currency' => array(
					'type' => 'select',
					'default_value' => 'USD',
					'values' => $currencies_list,
					'title' => esc_html__('Set Default Currency', 'cardealer'),
					'description' => esc_html__("Set default currency for website", 'cardealer'),
					'css_class' => '',
					'show_title' => true
				)

			)
		),
		'block2' => array(
			'title' => esc_html__('Convert Default Currency to:', 'cardealer'),
			'type' => 'items_block',
			'items' => $currencies
		),
		'block3' => array(
			'title' => esc_html__('File Upload Settings', 'cardealer'),
			'type' => 'items_block',
			'items' => array(
				'file_ext[jpeg]' => array(
					'name_type' => 'array',
					'type' => 'checkbox',
					'default_value' => 1,
					'title' => esc_html__('JPG, JPEG', 'cardealer'),
					'description' => esc_html__("Enable JPG, JPEG file types uploading", 'cardealer'),
					'css_class' => '',
					'show_title' => true
				),
				'file_ext[png]' => array(
					'name_type' => 'array',
					'type' => 'checkbox',
					'default_value' => 1,
					'title' => esc_html__('PNG', 'cardealer'),
					'description' => esc_html__("Enable PNG file type uploading", 'cardealer'),
					'css_class' => '',
					'show_title' => true
				)
			)
		),
		'block4' => array(
			'title' => esc_html__('Distance Units', 'cardealer'),
			'type' => 'items_block',
			'items' => array(
				'distance_unit' => array(
					'type' => 'select',
					'default_value' => 'miles',
					'values' => TMM_Ext_PostType_Car::$car_options['distance_units'],
					'title' => esc_html__('Distance', 'cardealer'),
					'description' => esc_html__("Default distance unit", 'cardealer'),
					'css_class' => '',
					'show_title' => false
				)
			)
		),
		'block5' => array(
			'title' => esc_html__('Engine Units', 'cardealer'),
			'type' => 'items_block',
			'items' => array(
				'engine_capacity_unit' => array(
					'type' => 'select',
					'default_value' => '',
					'values' => TMM_Ext_PostType_Car::$car_options['engine_capacity_units'],
					'title' => esc_html__('Engine Size', 'cardealer'),
					'description' => esc_html__("Default engine size unit", 'cardealer'),
					'css_class' => '',
					'show_title' => false
				)
			)
		),
		'block6' => array(
			'title' => esc_html__('Watch List Settings', 'cardealer'),
			'type' => 'items_block',
			'items' => array(
				'watchlist_is_for_loggedin' => array(
					'type' => 'checkbox',
					'default_value' => 1,
					'title' => esc_html__('Enable Watch Lists for only registered users', 'cardealer'),
					'description' => esc_html__('Allow only registered users to create their car Watch Lists', 'cardealer'),
					'css_class' => '',
					'show_title' => true
				)
			)
		),
		'block7' => array(
			'title' => esc_html__('Images Storage Capacity', 'cardealer'),
			'type' => 'items_block',
			'items' => array(
				'cardealer_max_images_size' => array(
					'type' => 'slider',
					'default_value' => 5,
					'min' => 1,
					'max' => 99,
					'title' => esc_html__('Set storage capacity per dealer', 'cardealer'),
					'description' => esc_html__("Default storage capacity per dealer in megabytes for car images", 'cardealer'),
					'css_class' => '',
				)
			)
		),
		'block8' => array(
			'title' => esc_html__('Days to Keep Sold Car Before Sending to Draft', 'cardealer'),
			'type' => 'items_block',
			'items' => array(
				'time_to_draft_sold_cars' => array(
					'type' => 'slider',
					'default_value' => 7,
					'min' => 1,
					'max' => 99,
					'title' => esc_html__('Days to keep sold car before sending to draft', 'cardealer'),
					'description' => esc_html__('Sold car displays on the website till it gets sent to draft', 'cardealer'),
					'css_class' => '',
				)
			)
		),
		'block9' => array(
			'title' => esc_html__('Locations Length', 'cardealer'),
			'type' => 'items_block',
			'items' => array(
				'locations_captions_on_search_widget' => array(
					'type' => 'text',
					'default_value' => 'Country,State,City',
					'title' => esc_html__('Locations captions in search widget', 'cardealer'),
					'description' => esc_html__("Locations lenght in search widget", 'cardealer'),
					'css_class' => '',
					'show_title' => false
				)
			)
		),
		'block10' => array(
			'title' => esc_html__('Locations Settings', 'cardealer'),
			'type' => 'items_block',
			'items' => array(
				'locations_show_empty_search_widget' => array(
					'type' => 'checkbox',
					'default_value' => 0,
					'title' => esc_html__('Enable empty locations', 'cardealer'),
					'description' => esc_html__('Display empty locations in search widget', 'cardealer'),
					'css_class' => '',
					'show_title' => true
				)
			)
		),
		'block11' => array(
			'title' => esc_html__('Car Make Settings', 'cardealer'),
			'type' => 'items_block',
			'items' => array(
				'producers_show_empty_search_widget' => array(
					'type' => 'checkbox',
					'default_value' => 0,
					'title' => esc_html__('Enable empty car makes', 'cardealer'),
					'description' => esc_html__('Display empty car makes in search widget', 'cardealer'),
					'css_class' => '',
					'show_title' => true
				)
			)
		),
		'block12' => array(
			'title' => esc_html__('Statistic Settings', 'cardealer'),
			'type' => 'items_block',
			'items' => array(
				'cars_show_statistic_dealer_page' => array(
					'type' => 'checkbox',
					'default_value' => 1,
					'title' => esc_html__('Enable car statistic', 'cardealer'),
					'description' => esc_html__('Display dealer statistic on Dealer\'s page', 'cardealer'),
					'css_class' => '',
					'show_title' => true
				)
			)
		)
	)
);
$pages = new WP_Query(array(
	'post_type' => 'page',
	'posts_per_page' => '-1',
	'orderby' => 'name',
	'order' => 'ASC',
	'suppress_filters' => true,
	'meta_query' => array(
		'relation' => 'AND',
		array(
			'key' => '_wp_page_template',
			'value' => '',
			'compare' => '!='
		),
		array(
			'key' => '_wp_page_template',
			'value' => 'default',
			'compare' => '!='
		),
		array(
			'key' => '_icl_lang_duplicate_of',
			'value' => '',
			'compare' => 'NOT EXISTS'
		)
	),
));
$t_pages = array(
	-1 => ''
);
foreach($pages->posts as $page){
	$t_pages[$page->ID] = $page->post_title;
}
asort($t_pages);
$t_pages[-1] = 'none';

$child_sections['default_page_links'] = array(
	'name' => esc_html__('Default Page Links', 'cardealer'),
	'sections' => array(
		'block1' => array(
			'title' => esc_html__('Please link required theme pages below', 'cardealer'),
			'type' => 'items_block',
			'items' => array(
				'user_login_page' => array(
					'type' => 'select',
					'default_value' => '',
					'values' => $t_pages,
					'title' => esc_html__('User login page', 'cardealer'),
					'description' => esc_html__("User login page link", 'cardealer'),
					'css_class' => '',
					'show_title' => true
				),
				'user_profile_page' => array(
					'type' => 'select',
					'default_value' => '',
					'values' => $t_pages,
					'title' => esc_html__('User profile page', 'cardealer'),
					'description' => esc_html__("User profile page link", 'cardealer'),
					'css_class' => '',
					'show_title' => true
				),
				'user_cars_page' => array(
					'type' => 'select',
					'default_value' => '',
					'values' => $t_pages,
					'title' => esc_html__('Users cars page', 'cardealer'),
					'description' => esc_html__("Users cars page link", 'cardealer'),
					'css_class' => '',
					'show_title' => true
				),
				'user_add_new_car' => array(
					'type' => 'select',
					'default_value' => '',
					'values' => $t_pages,
					'title' => esc_html__('Add new car page', 'cardealer'),
					'description' => esc_html__("Add new car page link", 'cardealer'),
					'css_class' => '',
					'show_title' => true
				),
				'edit_page' => array(
					'type' => 'select',
					'default_value' => '',
					'values' => $t_pages,
					'title' => esc_html__('Car edit page', 'cardealer'),
					'description' => esc_html__("Car edit page link", 'cardealer'),
					'css_class' => '',
					'show_title' => true
				),
				'searching_page' => array(
					'type' => 'select',
					'default_value' => '',
					'values' => $t_pages,
					'title' => esc_html__('Car listings page', 'cardealer'),
					'description' => esc_html__("Car listings page link", 'cardealer'),
					'css_class' => '',
					'show_title' => true
				),
				'dealers_page' => array(
					'type' => 'select',
					'default_value' => '',
					'values' => $t_pages,
					'title' => esc_html__('Dealers page', 'cardealer'),
					'description' => esc_html__("Dealers page link", 'cardealer'),
					'css_class' => '',
					'show_title' => true
				),
				'upgrade_status_page' => array(
					'type' => 'select',
					'default_value' => '',
					'values' => $t_pages,
					'title' => esc_html__('Upgrade account status page', 'cardealer'),
					'description' => esc_html__("Upgrade account status page link", 'cardealer'),
					'css_class' => '',
					'show_title' => true
				),
			)
		)
	)
);


$thumbnail_size = !empty(TMM::$app_options[TMM_APP_CARDEALER_PREFIX]['car_listing_thumbnail_size']) ? TMM::$app_options[TMM_APP_CARDEALER_PREFIX]['car_listing_thumbnail_size'] : 'large';
$pagination_options = array();
$pagination_values = array(
	'small' => array(6, 12, 18, 24, 30),
	'middle' => array(4, 8, 12, 16, 20, 24, 36),
	'large' => array(3, 6, 9, 12, 15, 30, 45, 60),
);

if (!empty($pagination_values[$thumbnail_size])) {
	foreach ($pagination_values[$thumbnail_size] as $v) {
		$pagination_options[$v] = $v;
	}
}

$child_sections['listing_page'] = array(
	'name' => esc_html__('Listings Page', 'cardealer'),
	'sections' => array(
		'block1' => array(
			'title' => esc_html__('Show Details Button', 'cardealer'),
			'type' => 'items_block',
			'items' => array(
				'show_button_details' => array(
					'type' => 'checkbox',
					'default_value' => 1,
					'title' => esc_html__('Show/Hide details button', 'cardealer'),
					'description' => '',
					'css_class' => '',
					'show_title' => true
				)
			)
		),
		'block2' => array(
			'title' => esc_html__('Show Layout Switcher', 'cardealer'),
			'type' => 'items_block',
			'items' => array(
				'show_layout_switcher' => array(
					'type' => 'checkbox',
					'default_value' => 1,
					'title' => esc_html__('Show/Hide layout switcher', 'cardealer'),
					'description' => '',
					'css_class' => '',
					'show_title' => true
				)

			)
		),
		'block21' => array(
			'title' => esc_html__('View Mode', 'cardealer'),
			'type' => 'items_block',
			'items' => array(
				'car_listing_layout_mode' => array(
					'type' => 'select',
					'default_value' => 'grid',
					'title' => '',
					'values' => array(
						'grid' => esc_html__('Grid View', 'cardealer'),
						'list' => esc_html__('List View', 'cardealer'),
					),
					'description' => '',
					'css_class' => '',
					'show_title' => true,
				)

			),
			'hide' => !empty(TMM::$app_options[TMM_APP_CARDEALER_PREFIX]['show_layout_switcher']) ? true : false,
		),
		'block3' => array(
			'title' => esc_html__('Slide Featured Cars Images', 'cardealer'),
			'type' => 'items_block',
			'items' => array(
				'autoslide_featured_cars' => array(
					'type' => 'checkbox',
					'default_value' => 1,
					'title' => esc_html__('Slide featured cars images on hover', 'cardealer'),
					'description' => '',
					'css_class' => '',
					'show_title' => true
				)
			)
		),
		'block4' => array(
			'title' => esc_html__('Thumbnail size', 'cardealer'),
			'type' => 'items_block',
			'items' => array(
				'car_listing_thumbnail_size' => array(
					'type' => 'select',
					'default_value' => 'large',
					'title' => '',
					'values' => array(
						'small' => esc_html__('Small', 'cardealer'),
						'middle' => esc_html__('Middle', 'cardealer'),
						'large' => esc_html__('Large', 'cardealer'),
					),
					'description' => '',
					'css_class' => '',
					'show_title' => true
				)
			)
		),
		'block5' => array(
			'title' => esc_html__('Items per page', 'cardealer'),
			'type' => 'items_block',
			'items' => array(
				'car_listing_items_per_page' => array(
					'type' => 'select',
					'default_value' => $pagination_values[$thumbnail_size][0],
					'title' => '',
					'values' => $pagination_options,
					'description' => '',
					'css_class' => '',
					'show_title' => true
				)
			)
		),
		'block6' => array(
			'title' => esc_html__('Cars Archive page', 'cardealer'),
			'type' => 'items_block',
			'items' => array(
				'car_archive_header_type' => array(
					'title' => esc_html__('Header Type', 'cardealer'),
					'show_title' => true,
					'css_class' => 'car_archive_header_type',
					'type' => 'select',
					'default_value' => '0',
					'values' => array(
						0 => esc_html__('Default', 'cardealer'),
						'classic' => esc_html__('Classic', 'cardealer'),
						'alternate' => esc_html__('Alternate', 'cardealer')
					),
					'description' => esc_html__('If set to default, this page will inherit general header type (check Genaral tab). Either Classic or Alternate will take a unique header type for this page.', 'cardealer'),
					'custom_html' => TMM::draw_free_page($pagepath . 'car_archive_header.php')
				),
				'car_archive_hide_title' => array(
					'title' => esc_html__('Hide Default Title', 'cardealer'),
					'show_title' => true,
					'type' => 'checkbox',
					'default_value' => 0,
					'description' => '',
					'custom_html' => ''
				),
			)
		),
		'block7' => array(
			'title' => esc_html__('Car Producers Taxonomy page', 'cardealer'),
			'type' => 'items_block',
			'items' => array(
				'car_producer_tax_header_type' => array(
					'title' => esc_html__('Header Type', 'cardealer'),
					'show_title' => true,
					'css_class' => 'car_producer_tax_header_type',
					'type' => 'select',
					'default_value' => '0',
					'values' => array(
						0 => esc_html__('Default', 'cardealer'),
						'classic' => esc_html__('Classic', 'cardealer'),
						'alternate' => esc_html__('Alternate', 'cardealer')
					),
					'description' => esc_html__('If set to default, this page will inherit general header type (check Genaral tab). Either Classic or Alternate will take a unique header type for this page.', 'cardealer'),
					'custom_html' => TMM::draw_free_page($pagepath . 'car_producer_tax_header.php')
				),
				'car_producer_tax_hide_title' => array(
					'title' => esc_html__('Hide Default Title', 'cardealer'),
					'show_title' => true,
					'type' => 'checkbox',
					'default_value' => 0,
					'description' => '',
					'custom_html' => ''
				),
			)
		),
	)
);

$child_sections['add_new_page'] = array(
	'name' => esc_html__('Add New Car Page', 'cardealer'),
	'sections' => array(
		'car_title_url' => array(
			'title' => esc_html__('Car Link and Title Options', 'cardealer'),
			'type' => 'items_block',
			'items' => array(
				'allow_custom_title' => array(
					'type' => 'checkbox',
					'default_value' => 0,
					'title' => esc_html__('Allow custom title naming', 'cardealer'),
					'description' => '',
					'css_class' => '',
					'show_title' => true
				),
				'car_title_symbols_limit' => array(
					'type' => 'slider',
					'default_value' => 50,
					'min' => 1,
					'max' => 200,
					'title' => '',
					'description' => esc_html__('Number of letters allowed to use in title while adding car from the front end', 'cardealer'),
					'css_class' => '',
					'show_title' => false,
					'hide' => !empty(TMM::$app_options[TMM_APP_CARDEALER_PREFIX]['allow_custom_title']) ? false : true,
				),
				'car_link_type' => array(
					'type' => 'select',
					'default_value' => 'automatic',
					'values' => array(
						'automatic' => 'Automatic',
						'custom' => 'Custom',
					),
					'title' => esc_html__('Car link type', 'cardealer'),
					'description' => esc_html__("Generate link automatically (.../make-model-year-{index}) or use custom title", 'cardealer'),
					'css_class' => '',
					'show_title' => true,
					'hide' => !empty(TMM::$app_options[TMM_APP_CARDEALER_PREFIX]['allow_custom_title']) ? false : true,
				),
			)
		),
		'moderation' => array(
			'title' => esc_html__('Moderation settings', 'cardealer'),
			'type' => 'items_block',
			'items' => array(
				'approve_new_car' => array(
					'type' => 'checkbox',
					'default_value' => 0,
					'title' => esc_html__('New car must be manually approved by Administrator', 'cardealer'),
					'description' => '',
					'css_class' => '',
					'show_title' => true
				),
				'approve_new_car_email' => array(
					'type' => 'checkbox',
					'default_value' => 0,
					'title' => esc_html__('E-mail Administrator when a new car is held for moderation', 'cardealer'),
					'description' => '',
					'css_class' => '',
					'show_title' => true
				),
			)
		),
		'block1' => array(
			'title' => esc_html__('Number of characters in description', 'cardealer'),
			'type' => 'items_block',
			'items' => array(
				'car_adv_desc_signs_count' => array(
					'type' => 'slider',
					'default_value' => 512,
					'min' => 1,
					'max' => 2000,
					'title' => '',
					'description' => esc_html__('Number of letters allowed to use in description while adding car from the front end', 'cardealer'),
					'css_class' => '',
					'show_title' => false
				)
			)
		),
		'block2' => array(
			'title' => esc_html__('Required Fields', 'cardealer'),
			'type' => 'items_block',
			'items' => $child_sections_required_fature
		),
		'block3' => array(
			'title' => esc_html__('Licence Text', 'cardealer'),
			'type' => 'items_block',
			'items' => array(
				'licence_text' => array(
					'type' => 'textarea',
					'default_value' => "By accessing or using  Car Dealer services, such as posting your car advertisement with your personal information on our website you agree to the collection, use and disclosure of your personal information in the legal proper manner",
					'title' => esc_html__('Licence text', 'cardealer'),
					'description' => esc_html__("Licence text", 'cardealer'),
					'css_class' => 'wide',
					'show_title' => false
				)
			)
		),
	)
);

$child_sections['single_car_page'] = array(
	'name' => esc_html__('Single Car Page', 'cardealer'),
	'sections' => array(

		'block1' => array(
			'title' => esc_html__('Public Info', 'cardealer'),
			'type' => 'items_block',
			'items' => array(
				'show_car_public_info' => array(
					'type' => 'checkbox',
					'default_value' => 1,
					'title' => esc_html__('Show / Hide Public Info', 'cardealer'),
					'description' => esc_html__('Show / Hide Public Info on single-car page', 'cardealer'),
					'css_class' => '',
					'show_title' => false
				)
			)
		),
		'block2' => array(
			'title' => esc_html__('Contact Form', 'cardealer'),
			'type' => 'items_block',
			'items' => array(
				'show_car_seller_form' => array(
					'type' => 'checkbox',
					'default_value' => 1,
					'title' => esc_html__('Show / Hide Contact Form', 'cardealer'),
					'description' => esc_html__('Show / Hide Contact Form on single-car page', 'cardealer'),
					'css_class' => '',
					'show_title' => false
				),
				'contact_seller_form' => array(
					'type' => 'select',
					'default_value' => '',
					'values' => $contact_forms,
					'title' => esc_html__('Display Contact Form', 'cardealer'),
					'description' => esc_html__("For displaying form, please add new contact form in Theme Options, and then select needed one.", 'cardealer'),
					'css_class' => '',
					'show_title' => false
				),
				'contact_send_to_admin' => array(
					'type' => 'checkbox',
					'default_value' => 0,
					'title' => esc_html__('Duplicate to admin mailbox', 'cardealer'),
					'description' => esc_html__('Duplicate all private messages for dealers to admins mailbox.', 'cardealer'),
					'css_class' => '',
					'show_title' => false
				),
			)
		),
		'block3' => array(
			'title' => esc_html__('Sidebar Position', 'cardealer'),
			'type' => 'items_block',
			'items' => array(
				'single_car_sidebar_position' => array(
					'title' => esc_html__('Sidebar Position', 'cardealer'),
					'type' => 'custom',
					'default_value' => 'no_sidebar',
					'description' => '',
					'custom_html' => TMM::draw_free_page($pagepath . 'sidebar_position.php')
				)
			)
		),
		'block6' => array(
			'title' => esc_html__('Similar Vehicles', 'cardealer'),
			'type' => 'items_block',
			'items' => array(
				'show_car_similar_vehicles' => array(
					'type' => 'checkbox',
					'default_value' => 1,
					'title' => esc_html__('Show / Hide Similar Vehicles', 'cardealer'),
					'description' => esc_html__('Show / Hide Similar Vehicles on single-car page', 'cardealer'),
					'css_class' => '',
					'show_title' => false
				)
			)
		),
		'block4' => array(
			'title' => esc_html__('Parameters Order for Similar Vehicles', 'cardealer'),
			'type' => 'items_block',
			'items' => array(
				'similar_cars_params' => array(
					'title' => esc_html__('Parameters Order for Similar Vehicles', 'cardealer'),
					'type' => 'custom',
					'default_value' => '',
					'description' => esc_html__('Set the order for displaying similar cars on single page by these parameters.', 'cardealer'),
					'custom_html' => TMM::draw_free_page($pagepath . 'similar_cars_params.php')
				)
			)
		),
		'block5' => array(
			'title' => esc_html__('Contact Person Info', 'cardealer'),
			'type' => 'items_block',
			'items' => array(
				'show_car_contact_person' => array(
					'type' => 'checkbox',
					'default_value' => 1,
					'title' => esc_html__('Show / Hide Contact Person Info', 'cardealer'),
					'description' => esc_html__('Show / Hide Contact Person Info on single-car page', 'cardealer'),
					'css_class' => '',
					'show_title' => false
				),
				'show_contact_person_rss' => array(
					'type' => 'checkbox',
					'default_value' => 1,
					'title' => esc_html__('Show / Hide Contact Person RSS Link', 'cardealer'),
					'description' => esc_html__('Show / Hide Contact Person  RSS link on single-car page', 'cardealer'),
					'css_class' => '',
					'show_title' => false
				),
			)
		),
		'block7' => array(
			'title' => esc_html__('Comments', 'cardealer'),
			'type' => 'items_block',
			'items' => array(
				'show_car_comments' => array(
					'type' => 'checkbox',
					'default_value' => 1,
					'title' => esc_html__('Show / Hide Comments', 'cardealer'),
					'description' => esc_html__('Show / Hide Comments on single-car page', 'cardealer'),
					'css_class' => '',
					'show_title' => false
				)
			)
		)
	)
);

$sections = array(
	'name' => esc_html__("Default Settings", 'cardealer'),
	'css_class' => 'shortcut-options',
	'show_general_page' => false,
	'content' => $content,
	'child_sections' => $child_sections,
	'menu_icon' => 'dashicons-admin-settings'
);

TMM_CarSettingsHelper::$sections[$tab_key] = $sections;
