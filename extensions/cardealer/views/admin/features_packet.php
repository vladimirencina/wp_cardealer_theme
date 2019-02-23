<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<a href="#" class="admin-button button-gray button-medium js_back_to_user_roles_list"><?php esc_html_e('Back to list', 'cardealer'); ?></a>

<h2 class="option-title"><?php echo esc_html__("Edit ", 'cardealer') . $features_packet['name']; ?></h2>

<br /><br />

<?php
TMM_OptionsHelper::draw_theme_option(array(
	'name' => 'features_packets[' . $features_packet_id . '][name]',
	'type' => 'text',
	'default_value' => $features_packet['name'],
	'title' => esc_html__("Featured Cars Bundle Name", 'cardealer'),
	'description' => esc_html__("Featured cars bundle name", 'cardealer'),
	'css_class' => 'features_packet_name_input',
	'data-id' => 'features_packet_' . $features_packet_id
		), TMM_APP_CARDEALER_PREFIX);
?>

<hr class="sep-divider" />

<?php
TMM_OptionsHelper::draw_theme_option(array(
	'name' => 'features_packets[' . $features_packet_id . '][featured]',
	'type' => 'checkbox',
	'default_value' => $features_packet['featured'],
	'title' => esc_html__('Feature Bundle', 'cardealer'),
	'description' => esc_html__('Feature this bundle on account status upgrade page', 'cardealer'),
	'css_class' => '',
		), TMM_APP_CARDEALER_PREFIX);
?>

<hr class="sep-divider" />

<?php
TMM_OptionsHelper::draw_theme_option(array(
	'name' => 'features_packets[' . $features_packet_id . '][count]',
	'type' => 'text',
	'default_value' => $features_packet['count'],
	'title' => esc_html__('Featured Cars Count', 'cardealer'),
	'description' => esc_html__('Max featured cars count in packet', 'cardealer'),
	'css_class' => '',
		), TMM_APP_CARDEALER_PREFIX);
?>

<hr class="sep-divider" />

<?php
TMM_OptionsHelper::draw_theme_option(array(
	'name' => 'features_packets[' . $features_packet_id . '][life_period]',
	'type' => 'text',
	'default_value' => $features_packet['life_period'],
	'title' => esc_html__('One Featured Car Lifetime', 'cardealer'),
	'description' => esc_html__('One featured car lifetime (days).  <br>Leave 0 if you don\'t need any fixed life time', 'cardealer'),
	'css_class' => '',
		), TMM_APP_CARDEALER_PREFIX);
?>

<hr class="sep-divider" />

<?php
TMM_OptionsHelper::draw_theme_option(array(
	'name' => 'features_packets[' . $features_packet_id . '][packet_price]',
	'type' => 'text',
	'default_value' => $features_packet['packet_price'],
	'title' => esc_html__('Bundle Price', 'cardealer'),
	'data_typecheck' => 'number',
	'description' => esc_html__('Bundle price', 'cardealer') . ' (<b>' . TMM_Ext_Car_Dealer::$default_currency['symbol'] . '</b>)',
	'css_class' => '',
		), TMM_APP_CARDEALER_PREFIX);
?>



