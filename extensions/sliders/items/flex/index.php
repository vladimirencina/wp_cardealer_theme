<?php if (!defined('ABSPATH')) die('No direct access allowed');

class TMM_Ext_Slider_Flex extends TMM_Ext_Sliders {

	public static $slider_options = array();
	public static $slider_js_options = array();

	public static function init() {
		parent::$sliders_classes_array[] = __CLASS__;
		//***
		self::$slider_options = array(
			'key' => "flex",
			'name' => "Flexslider",
			'fields' => array(
				'title' => array(
					'name' => esc_html__('Slide Title', 'cardealer'),
					'type' => 'textinput',
					'field_options' => array(
						'font_family' => esc_html__('Font family', 'cardealer'),
						'font_size' => esc_html__('Font size', 'cardealer'),
						'font_color' => esc_html__('Font color', 'cardealer')
					),
					'field_options_defaults' => array(
						'font_family' => 'Arial',
						'font_size' => 22,
						'font_color' => '#585757'
					)
				),
				'subtitle' => array(
					'name' => esc_html__('Slide Subtitle', 'cardealer'),
					'type' => 'textinput',
					'field_options' => array(
						'font_family' => esc_html__('Font family', 'cardealer'),
						'font_size' => esc_html__('Font size', 'cardealer'),
						'font_color' => esc_html__('Font color', 'cardealer')
					),
					'field_options_defaults' => array(
						'font_family' => 'Arial',
						'font_size' => 12,
						'font_color' => '#7d7d7d'
					)
				),
				'caption_default_styling' => array(
					'name' => esc_html__('Keep default title and subtitle styling', 'cardealer'),
					'type' => 'checkbox',
					'field_options' => array()
				),
				'show_button' => array(
					'name' => esc_html__('Show Button', 'cardealer'),
					'type' => 'checkbox',
					'field_options' => array()
				),
				'url' => array(
					'name' => esc_html__('Button\'s URL', 'cardealer'),
					'type' => 'textinput',
					'field_options' => array()
				),
			),
		);
		parent::$slider_options[self::$slider_options['key']] = self::$slider_options;
		//***
		self::$slider_js_options = array(
			'enable_caption' => array(
				'title' => esc_html__('Enable caption', 'cardealer'),
				'type' => 'checkbox',
				'description' => "",
				'default' => 1,
			),
			'animation_loop' => array(
				'title' => esc_html__('Animation loop', 'cardealer'),
				'type' => 'checkbox',
				'description' => esc_html__("Should the animation loop? If false, directionNav will received 'disable' classes at either end", 'cardealer'),
				'default' => 0,
			),
			'slideshow' => array(
				'title' => esc_html__('Slideshow', 'cardealer'),
				'type' => 'checkbox',
				'description' => esc_html__("Animate slider automatically", 'cardealer'),
				'default' => 1,
			),
			'init_delay' => array(
				'title' => esc_html__('initDelay', 'cardealer'),
				'type' => 'text',
				'show_title' => 1,
				'description' => esc_html__("Integer: Set an initialization delay, in milliseconds", 'cardealer'),
				'default' => 0,
				'max' => 500
			),
			'animation_speed' => array(
				'title' => esc_html__('Animation Speed', 'cardealer'),
				'type' => 'text',
				'show_title' => 1,
				'description' => esc_html__("Set the speed of animations, in milliseconds", 'cardealer'),
				'default' => 600,
				'max' => 2000
			),
			'slideshow_speed' => array(
				'title' => esc_html__('Slideshow Speed', 'cardealer'),
				'type' => 'text',
				'show_title' => 1,
				'description' => esc_html__("Set the speed of the slideshow cycling, in milliseconds", 'cardealer'),
				'default' => 7000,
				'max' => 20000
			),
			'animation' => array(
				'title' => esc_html__('Animation', 'cardealer'),
				'type' => 'select',
				'show_title' => 1,
				'values_list' => array(
					'fade' => esc_html__('Fade', 'cardealer'),
					'slide' => esc_html__('Slide', 'cardealer'),
				),
				'description' => esc_html__('Select your animation type, "fade" or "slide"', 'cardealer'),
				'default' => 'fade',
			),
			'randomize' => array(
				'title' => esc_html__('Randomize', 'cardealer'),
				'type' => 'checkbox',
				'description' => esc_html__("Randomize slide order", 'cardealer'),
				'default' => 1,
			),
			'reverse' => array(
				'title' => esc_html__('Reverse', 'cardealer'),
				'type' => 'checkbox',
				'description' => esc_html__("Reverse the animation direction", 'cardealer'),
				'default' => 1,
			),
		);
		parent::$slider_js_options[self::$slider_options['key']] = self::$slider_js_options;
	}

}

