<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php

class ThemeMakers_App_Cardealer_QuickSearch extends WP_Widget
{
	public $defaults;

	function __construct() {
		$settings = array('classname' => __CLASS__, 'description' => esc_html__('CarDealer\'s search widget, helps to find cars', 'cardealer'));
		parent::__construct(__CLASS__, esc_html__('TMM CarDealer Search', 'cardealer'), $settings);
		$this->defaults = array(
			'title' => esc_html__('Buscador de vendedores', 'cardealer'),
			'show_location0' => 'true',
			'show_location1' => 'true',
			'show_location2' => 'true',
			'selected_location0' => 0,
			'selected_location1' => 0,
			'show_producers_and_models' => 'true',
			'show_min_max_price' => 'true',
			'show_years' => 'true',
			'show_mileage' => 'true',
			'show_fuel_type' => 'false',
			'show_transmission' => 'false',
			'show_body_type' => 'false',
			'show_doors_count' => 'false',
			'show_colors' => 'false',
			'show_search_new_cars' => 'true',
			'show_search_damaged_cars' => 'true',
			'show_search_state_cars' => 'true',
			'show_advanced_options' => 'false',
		);
	}

	function widget($args, $instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_free_page(TMM_Ext_Car_Dealer::get_application_path() . '/views/widgets/quicksearch.php', $args);
	}

	function form($instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_free_page(TMM_Ext_Car_Dealer::get_application_path() . '/views/widgets/quicksearch_form.php', $args);
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		foreach ($this->defaults as $k => $v) {
			$instance[$k] = $new_instance[$k];
		}
		if (isset($instance['title'])) {
			$instance['title'] = strip_tags($instance['title']);
		}
		return $instance;
	}

}

class ThemeMakers_App_Cardealer_RecentCars extends WP_Widget
{
	public $defaults;

	function __construct() {
		$settings = array('classname' => __CLASS__, 'description' => esc_html__('Despliega los vehículos recien agregados', 'cardealer'));
		parent::__construct(__CLASS__, esc_html__('Recientemente agregados', 'cardealer'), $settings);
		$this->defaults = array(
			'title' => esc_html__('Vehículos recientes', 'cardealer'),
			'post_number' => 3,
			'show_see_all_button' => 'true'
		);
	}

	function widget($args, $instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_free_page(TMM_Ext_Car_Dealer::get_application_path() . '/views/widgets/recent_cars.php', $args);
	}

	function form($instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_free_page(TMM_Ext_Car_Dealer::get_application_path() . '/views/widgets/recent_cars_form.php', $args);
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		foreach ($this->defaults as $k => $v) {
			$instance[$k] = $new_instance[$k];
		}
		if (isset($instance['title'])) {
			$instance['title'] = strip_tags($instance['title']);
		}
		return $instance;
	}

}

class ThemeMakers_App_Cardealer_FeaturedCars extends WP_Widget
{
	public $defaults;

	function __construct() {
		$settings = array('classname' => __CLASS__, 'description' => esc_html__('Mostrar vehículos', 'cardealer'));
		parent::__construct(__CLASS__, esc_html__('TMM Featured Cars', 'cardealer'), $settings);
		$this->defaults = array(
			'title' => esc_html__('Vehículos', 'cardealer'),
			'post_number' => 3,
			'show_see_all_button' => 'true',
			'order' => 'latest'
		);
	}

	function widget($args, $instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_free_page(TMM_Ext_Car_Dealer::get_application_path() . '/views/widgets/featured_cars.php', $args);
	}

	function form($instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_free_page(TMM_Ext_Car_Dealer::get_application_path() . '/views/widgets/featured_cars_form.php', $args);
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		foreach ($this->defaults as $k => $v) {
			$instance[$k] = $new_instance[$k];
		}
		if (isset($instance['title'])) {
			$instance['title'] = strip_tags($instance['title']);
		}
		return $instance;
	}

}

//only for single car
class ThemeMakers_App_Cardealer_DealerMap extends WP_Widget
{
	public $defaults;

	function __construct() {
		$settings = array('classname' => __CLASS__, 'description' => esc_html__('Displays current dealer location on map. Only for single car page.', 'cardealer'));
		parent::__construct(__CLASS__, esc_html__('TMM Car Dealers Map', 'cardealer'), $settings);
		$this->defaults = array(
			'title' => esc_html__('Dealers map', 'cardealer'),
		);
	}

	function widget($args, $instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_free_page(TMM_Ext_Car_Dealer::get_application_path() . '/views/widgets/dealer_map.php', $args);
	}

	function form($instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_free_page(TMM_Ext_Car_Dealer::get_application_path() . '/views/widgets/dealer_map_form.php', $args);
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		foreach ($this->defaults as $k => $v) {
			$instance[$k] = $new_instance[$k];
		}
		if (isset($instance['title'])) {
			$instance['title'] = strip_tags($instance['title']);
		}
		return $instance;
	}

}

//only for users cars
class ThemeMakers_App_Cardealer_CarStatistic extends WP_Widget
{
	public $defaults;

	function __construct() {
		$settings = array('classname' => __CLASS__, 'description' => esc_html__('Despliega los vehículos del usuario', 'cardealer'));
		parent::__construct(__CLASS__, esc_html__('Estadisticas', 'cardealer'), $settings);
		$this->defaults = array(
			'title' => esc_html__('Mis vehículos', 'cardealer'),
		);
	}

	function widget($args, $instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_free_page(TMM_Ext_Car_Dealer::get_application_path() . '/views/widgets/statistic_cars.php', $args);
	}

	function form($instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_free_page(TMM_Ext_Car_Dealer::get_application_path() . '/views/widgets/statistic_cars_form.php', $args);
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		foreach ($this->defaults as $k => $v) {
			$instance[$k] = $new_instance[$k];
		}
		if (isset($instance['title'])) {
			$instance['title'] = strip_tags($instance['title']);
		}
		return $instance;
	}

}

//only for users cars
class ThemeMakers_App_Cardealer_DriveMyCars extends WP_Widget
{
	public $defaults;

	function __construct() {
		$settings = array('classname' => __CLASS__, 'description' => esc_html__('Displays links to pages for managing cars added by user. Only for user cars page.', 'cardealer'));
		parent::__construct(__CLASS__, esc_html__('Mi perfil', 'cardealer'), $settings);
		$this->defaults = array(
			'show_links' => 'true',
			'show_quick_statistic' => 'true',
			'show_dealer_status' => 'true',
			'show_loan_rate' => 'true',
		);
	}

	function widget($args, $instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_free_page(TMM_Ext_Car_Dealer::get_application_path() . '/views/widgets/drive_my_cars.php', $args);
	}

	function form($instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_free_page(TMM_Ext_Car_Dealer::get_application_path() . '/views/widgets/drive_my_cars_form.php', $args);
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		foreach ($this->defaults as $k => $v) {
			$instance[$k] = $new_instance[$k];
		}
		if (isset($instance['title'])) {
			$instance['title'] = strip_tags($instance['title']);
		}
		return $instance;
	}

}

class ThemeMakers_App_Cardealer_CarsCounter extends WP_Widget
{
	public $defaults;

	function __construct() {
		$settings = array('classname' => __CLASS__, 'description' => esc_html__('Displays amount recently added cars.', 'cardealer'));
		parent::__construct(__CLASS__, esc_html__('Contador de vehículos', 'cardealer'), $settings);
		$this->defaults = array(
			'title' => esc_html__('Recently Added Cars', 'cardealer'),
			'show_last_hour_cell' => 'true',
			'show_last_day_cell' => 'true',
			'show_cars_total_cell' => 'true'
		);
	}

	function widget($args, $instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_free_page(TMM_Ext_Car_Dealer::get_application_path() . '/views/widgets/car_counter.php', $args);
	}

	function form($instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_free_page(TMM_Ext_Car_Dealer::get_application_path() . '/views/widgets/car_counter_form.php', $args);
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		foreach ($this->defaults as $k => $v) {
			$instance[$k] = $new_instance[$k];
		}
		if (isset($instance['title'])) {
			$instance['title'] = strip_tags($instance['title']);
		}
		return $instance;
	}

}


//only for single car
class ThemeMakers_App_Cardealer_DealerContacts extends WP_Widget
{
	public $defaults;

	function __construct() {
		$settings = array('classname' => __CLASS__, 'description' => esc_html__('Displays current dealer contact info. Only for single car page.', 'cardealer'));
		parent::__construct(__CLASS__, esc_html__('Contacto vendedores', 'cardealer'), $settings);
		$this->defaults = array(
			'title' => esc_html__('Dealers Contacts', 'cardealer'),
			'show_dealers_name' => 'true',
			'show_contact_person' => 'true',
			'show_address' => 'true',
			'show_phone' => 'true',
			'show_mobile' => 'true',
			'show_fax' => 'true',
			'show_email' => 'false',
			'show_skype' => 'true',
			'show_url' => 'false',
		);
	}

	function widget($args, $instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_free_page(TMM_Ext_Car_Dealer::get_application_path() . '/views/widgets/dealer_contacts.php', $args);
	}

	function form($instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_free_page(TMM_Ext_Car_Dealer::get_application_path() . '/views/widgets/dealer_contacts_form.php', $args);
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		foreach ($this->defaults as $k => $v) {
			$instance[$k] = $new_instance[$k];
		}
		if (isset($instance['title'])) {
			$instance['title'] = strip_tags($instance['title']);
		}
		return $instance;
	}

}

class ThemeMakers_App_Cardealer_DealersCars extends WP_Widget
{
	public $defaults;

	function __construct() {
		$settings = array('classname' => __CLASS__, 'description' => esc_html__('Vehículos vendedores', 'cardealer'));
		parent::__construct(__CLASS__, esc_html__('TMM Car Dealers Cars', 'cardealer'), $settings);
		$this->defaults = array(
			'title' => esc_html__('Vehículos vendedores', 'cardealer'),
			'order' => 'random',
			'user_number' => 5,
			'packet' => 0
		);
	}

	function widget($args, $instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_free_page(TMM_Ext_Car_Dealer::get_application_path() . '/views/widgets/dealers_cars.php', $args);
	}

	function form($instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_free_page(TMM_Ext_Car_Dealer::get_application_path() . '/views/widgets/dealers_cars_form.php', $args);
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		foreach ($this->defaults as $k => $v) {
			$instance[$k] = $new_instance[$k];
		}
		if (isset($instance['title'])) {
			$instance['title'] = strip_tags($instance['title']);
		}
		return $instance;
	}

}

class ThemeMakers_App_Cardealer_Dealers extends WP_Widget
{
	public $defaults;

	function __construct() {
		$settings = array('classname' => __CLASS__, 'description' => esc_html__('Desplegar listado de vendedores', 'cardealer'));
		parent::__construct(__CLASS__, esc_html__('Vehículos vendedores', 'cardealer'), $settings);
		$this->defaults = array(
			'title' => esc_html__('Vendedores', 'cardealer'),
			'order' => 'random',
			'user_number' => 5,
			'dealer_type' => 0,
			'specific_dealer' => 0,
			'show_dealer_logo' => 1,
			'show_dealer_bio' => 0,
			'dealer_bio_symbols_count' => 45,
			'show_phone' => 1,
			'show_mobile' => 1,
			'show_fax' => 1,
			'show_email' => 1,
			'show_skype' => 1,
			'show_site' => 1,
			'show_address' => 1,
			'show_map' => 1,
			'show_see_all_button' => 0,
		);
	}

	function widget($args, $instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_free_page(TMM_Ext_Car_Dealer::get_application_path() . '/views/widgets/dealers.php', $args);
	}

	function form($instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_free_page(TMM_Ext_Car_Dealer::get_application_path() . '/views/widgets/dealers_form.php', $args);
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		foreach ($this->defaults as $k => $v) {
			$instance[$k] = $new_instance[$k];
		}
		if (isset($instance['title'])) {
			$instance['title'] = strip_tags($instance['title']);
		}
		return $instance;
	}

}

class ThemeMakers_App_Cars extends WP_Widget {
	public $defaults;

	function __construct() {
		$settings = array('classname' => __CLASS__, 'description' => esc_html__('Extended Car Widget displays cars by different options.', 'cardealer'));
		parent::__construct(__CLASS__, esc_html__('Vehículos', 'cardealer'), $settings);
		$this->defaults = array(
			'title' => esc_html__('Vehículos', 'cardealer'),
			'post_number' => 3,
			'show_only_featured_cars' => 'false',
			'order' => 'DESC',
			'dealer_type' => 0,
			'specific_dealer' => '',
			'show_see_all_button' => 0,
		);
	}

	function widget($args, $instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_free_page(TMM_Ext_Car_Dealer::get_application_path() . '/views/widgets/cars.php', $args);
	}

	function form($instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_free_page(TMM_Ext_Car_Dealer::get_application_path() . '/views/widgets/cars_form.php', $args);
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		foreach ($this->defaults as $k => $v) {
			$instance[$k] = $new_instance[$k];
		}
		if (isset($instance['title'])) {
			$instance['title'] = strip_tags($instance['title']);
		}
		return $instance;
	}

}

class ThemeMakers_LoanCalculator_Widget extends WP_Widget {
	public $defaults;

	function __construct() {
		$settings = array('classname' => __CLASS__, 'description' => esc_html__('Calculadora de credito widget', 'cardealer'));
		parent::__construct(__CLASS__, esc_html__('Calculadora de crédito', 'cardealer'), $settings);
		$this->defaults = array(
			'title' => 'Calculadora de crédito',
			'loan_amount' => 2000000,
			'interest_rate' => 3,
			'num_format' => 'true',
			'number_of_years' => 4,
		);
	}

	function widget($args, $instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_free_page(TMM_Ext_Car_Dealer::get_application_path() . '/views/widgets/loan_calculator.php', $args);
	}

	function form($instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_free_page(TMM_Ext_Car_Dealer::get_application_path() . '/views/widgets/loan_calculator_form.php', $args);
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		foreach ($this->defaults as $k => $v) {
			$instance[$k] = $new_instance[$k];
		}
		if (isset($instance['title'])) {
			$instance['title'] = strip_tags($instance['title']);
		}
		return $instance;
	}

}

class ThemeMakers_CarBody_Widget extends WP_Widget {
	public $defaults;

	function __construct() {
		$settings = array('classname' => __CLASS__, 'description' => esc_html__('A list of car body icons.', 'cardealer'));
		parent::__construct(__CLASS__, esc_html__('TMM Search by Car Body', 'cardealer'), $settings);
		$this->defaults = array(
			'title' => esc_html__('Search by Car Body', 'cardealer'),
			'show_name' => 'true',
			'show_count' => 0,
			'enable_link' => 'true'
		);
	}

	function widget($args, $instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_free_page(TMM_Ext_Car_Dealer::get_application_path() . '/views/widgets/car_body.php', $args);
	}

	function form($instance) {
		$args['instance'] = wp_parse_args((array) $instance, $this->defaults);
		$args['widget'] = $this;
		echo TMM::draw_free_page(TMM_Ext_Car_Dealer::get_application_path() . '/views/widgets/car_body_form.php', $args);
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		foreach ($this->defaults as $k => $v) {
			$instance[$k] = $new_instance[$k];
		}
		if (isset($instance['title'])) {
			$instance['title'] = strip_tags($instance['title']);
		}
		return $instance;
	}

}

function tmm_cardealer_register_widgets() {
	register_widget('ThemeMakers_App_Cardealer_QuickSearch');
	register_widget('ThemeMakers_App_Cars');
	register_widget('ThemeMakers_App_Cardealer_RecentCars');
	register_widget('ThemeMakers_App_Cardealer_FeaturedCars');
	register_widget('ThemeMakers_App_Cardealer_DealerMap');
	register_widget('ThemeMakers_App_Cardealer_DriveMyCars');
	register_widget('ThemeMakers_App_Cardealer_CarStatistic');
	register_widget('ThemeMakers_App_Cardealer_DealerContacts');
	register_widget('ThemeMakers_App_Cardealer_DealersCars');
	register_widget('ThemeMakers_App_Cardealer_Dealers');
	register_widget('ThemeMakers_App_Cardealer_CarsCounter');
	register_widget('ThemeMakers_LoanCalculator_Widget');
	register_widget('ThemeMakers_CarBody_Widget');
}

add_action( 'widgets_init', 'tmm_cardealer_register_widgets' );

include_once(ABSPATH . 'wp-admin/includes/plugin.php');
