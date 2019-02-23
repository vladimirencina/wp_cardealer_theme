<?php if ( !defined('ABSPATH') ) exit; ?>

<div class="option">
    <div class="controls">
        <ul class="groups similar_cars_params">
            <?php
            $similar_cars_params = array(
                'dealer_cars' => esc_html__('Dealer cars', 'cardealer'),
                'make' => esc_html__('Make', 'cardealer'),
                'year' => esc_html__('Year', 'cardealer'),
                'location' => esc_html__('Location', 'cardealer'),
                'engine_size' => esc_html__('Engine size', 'cardealer'),
            );
            $similar_cars_params_saved = TMM::get_option('similar_cars_params', TMM_APP_CARDEALER_PREFIX);
            if (!empty($similar_cars_params_saved)) {
	            foreach ($similar_cars_params as $k => $v) {
		            if (!isset($similar_cars_params_saved[$k])) {
			            $similar_cars_params_saved[$k] = $v;
		            }
	            }
                $similar_cars_params = $similar_cars_params_saved;
            }

            foreach ($similar_cars_params as $key => $param) {
                ?>
                <li>
                    <input type="hidden" value="<?php echo $param ?>" name="similar_cars_params[<?php echo $key ?>]"/>
                    <span data-id="similar_cars_param_<?php echo $key; ?>"><?php echo $param; ?></span>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
    <div class="explain"><?php esc_html_e('Set parameters order to define which cars are similar to current vehicle.', 'cardealer'); ?></div>
</div>