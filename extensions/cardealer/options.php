<?php if ( !defined('ABSPATH') ) exit;

$options = array(
	
	'condition' => array(
		'car_is_new' => esc_html__('New', 'cardealer'),
		'car_is_used' => esc_html__('Used', 'cardealer'),
		'car_is_damaged' => esc_html__('Damaged', 'cardealer'),
	),

	'transmission' => array(
		'automatic' => esc_html__("Automatic", 'cardealer'),
		'manual' => esc_html__("Manual", 'cardealer'),
		'semiautomatic' => esc_html__("Semi-automatic", 'cardealer'),
	),

	'fuel_type' => array(
		'diesel' => esc_html__("Diesel", 'cardealer'),
		'electronic' => esc_html__("Electric", 'cardealer'),
		'ethanol' => esc_html__("Ethanol (FFV, E-85, etc.)", 'cardealer'),
		'gas' => esc_html__("Gas (LPG, Natural Gas)", 'cardealer'),
		'hybrid' => esc_html__("Hybrid", 'cardealer'),
		'hydrogen' => esc_html__("Hydrogen", 'cardealer'),
		'petrol' => esc_html__("Petrol", 'cardealer'),
		'other' => esc_html__("Other", 'cardealer'),
	),
				
	'body' => array(
		'sedan' => esc_html__("Sedan", 'cardealer'),
		'hatchback' => esc_html__("Hatchback", 'cardealer'),
		'wagon' => esc_html__("Wagon", 'cardealer'),
		'suv' => esc_html__("SUV", 'cardealer'),
		'minivan' => esc_html__("Minivan", 'cardealer'),
		'coupe' => esc_html__("Coupe", 'cardealer'),
		'convertible' => esc_html__("Convertible", 'cardealer'),
		'pickup_truck' => esc_html__("Pickup truck", 'cardealer'),
		'full_size_van' => esc_html__("Full Size Van", 'cardealer'),
	),

	'interior_color' => array(
		'white' => esc_html__("White", 'cardealer'),
		'black' => esc_html__("Black", 'cardealer'),
		'lime' => esc_html__("Lime", 'cardealer'),
		'silver' => esc_html__("Silver", 'cardealer'),
		'red' => esc_html__("Red", 'cardealer'),
		'blue' => esc_html__("Blue", 'cardealer'),
	),

	'exterior_color' => array(
		'white' => esc_html__("White", 'cardealer'),
		'black' => esc_html__("Black", 'cardealer'),
		'lime' => esc_html__("Lime", 'cardealer'),
		'silver' => esc_html__("Silver", 'cardealer'),
		'red' => esc_html__("Red", 'cardealer'),
		'blue' => esc_html__("Blue", 'cardealer'),
	),

	'currency' => array(
		'USD' => "&#36;",
		'EUR' => "&euro;",
		'GBP' => "&#163;",
		'JPY' => "&#165;",
		'CHF' => "&#67;&#72;&#70;",
		'AUD' => "&#36;",
		'CAD' => "&#36;",
		'SEK' => "&#107;&#114;",
		'CZK' => "&#75;&#269;",
		'NOK' => "&#107;&#114;",
		'RUB' => "&#1088;&#1091;&#1073;",
	),
	
);
