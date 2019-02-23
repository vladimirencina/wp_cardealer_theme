<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<a href="#" class="admin-button button-gray button-medium js_back_to_user_roles_list"><?php esc_html_e('Back to roles list', 'cardealer'); ?></a>

<h2 class="option-title"><?php echo esc_html__("Edit ", 'cardealer') . $user_role['name']; ?></h2>

<br /><br />

<?php
TMM_OptionsHelper::draw_theme_option(array(
	'name' => 'user_roles[' . $user_role_id . '][name]',
	'type' => 'text',
	'default_value' => $user_role['name'],
	'title' => esc_html__("Account Status Name", 'cardealer'),
	'description' => esc_html__("Account status name", 'cardealer'),
	'css_class' => 'user_role_name_input',
	'data-id' => 'user_role_' . $user_role_id
		), TMM_APP_CARDEALER_PREFIX);
?>

<hr class="sep-divider" />

<?php
TMM_OptionsHelper::draw_theme_option(array(
	'name' => 'user_roles[' . $user_role_id . '][life_period]',
	'type' => 'text',
	'default_value' => $user_role['life_period'],
	'title' => esc_html__('Account Life Period', 'cardealer'),
	'description' => esc_html__('Account life period (days). Leave 0 if you do not need any fixed life time for this status', 'cardealer'),
	'css_class' => '',
		), TMM_APP_CARDEALER_PREFIX);
?>

<hr class="sep-divider" />

<?php
TMM_OptionsHelper::draw_theme_option(array(
	'name' => 'user_roles[' . $user_role_id . '][packet_price]',
	'type' => 'text',
	'default_value' => $user_role['packet_price'],
    'data_typecheck' => 'number',
	'title' => esc_html__('Account Price', 'cardealer'),
	'description' => esc_html__('Account price', 'cardealer') . ' (<b>' . TMM_Ext_Car_Dealer::$default_currency['symbol'] . '</b>)',
	'css_class' => '',
		), TMM_APP_CARDEALER_PREFIX);
?>

<hr class="sep-divider" />

<?php
TMM_OptionsHelper::draw_theme_option(array(
	'name' => 'user_roles[' . $user_role_id . '][max_cars]',
	'type' => 'text',
	'default_value' => $user_role['max_cars'],
	'title' => esc_html__('Max Count of Cars', 'cardealer'),
	'description' => esc_html__('Max count of cars', 'cardealer'),
	'css_class' => '',
		), TMM_APP_CARDEALER_PREFIX);
?>

<hr class="sep-divider" />

<?php
TMM_OptionsHelper::draw_theme_option(array(
	'name' => 'user_roles[' . $user_role_id . '][max_images_size]',
	'type' => 'text',
	'default_value' => $user_role['max_images_size'],
	'title' => esc_html__('Disk Storage for Images (MB)', 'cardealer'),
	'description' => esc_html__('Disk Storage for images (MB)', 'cardealer'),
	'css_class' => '',
		), TMM_APP_CARDEALER_PREFIX);
?>

<hr class="sep-divider" />

<?php
TMM_OptionsHelper::draw_theme_option(array(
	'name' => 'user_roles[' . $user_role_id . '][max_desc_count]',
	'type' => 'text',
	'default_value' => isset($user_role['max_desc_count']) ? $user_role['max_desc_count'] : '',
	'title' => esc_html__('Number of characters in description', 'cardealer'),
	'description' => esc_html__('The amount of letters allowed to use in description', 'cardealer'),
	'css_class' => '',
), TMM_APP_CARDEALER_PREFIX);
?>

<hr class="sep-divider" />

<?php
TMM_OptionsHelper::draw_theme_option(array(
	'name' => 'user_roles[' . $user_role_id . '][features_cars_count]',
	'type' => 'text',
	'default_value' => $user_role['features_cars_count'],
	'title' => esc_html__('Featured Cars Count', 'cardealer'),
	'description' => esc_html__('Featured cars count', 'cardealer'),
	'css_class' => '',
		), TMM_APP_CARDEALER_PREFIX);
?>

<hr class="sep-divider" />

<?php
TMM_OptionsHelper::draw_theme_option(array(
	'name' => 'user_roles[' . $user_role_id . '][feature_car_life_time]',
	'type' => 'text',
	'default_value' => $user_role['feature_car_life_time'],
	'title' => esc_html__('Featured Cars Lifetime', 'cardealer'),
	'description' => esc_html__('Featured cars lifetime (days)', 'cardealer'),
	'css_class' => '',
		), TMM_APP_CARDEALER_PREFIX);
?>

<hr class="sep-divider" />


<?php
TMM_OptionsHelper::draw_theme_option(array(
	'name' => 'user_roles[' . $user_role_id . '][enable_video]',
	'type' => 'checkbox',
	'default_value' => $user_role['enable_video'],
	'title' => esc_html__('Enable Video in Car Posts', 'cardealer'),
	'description' => esc_html__('Enable/disable video in car posts', 'cardealer'),
	'css_class' => '',
), TMM_APP_CARDEALER_PREFIX);
?>
