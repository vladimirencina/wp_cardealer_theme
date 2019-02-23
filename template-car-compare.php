<?php if (!defined('ABSPATH')) exit();

/**
 * Template Name: Car Compare
 */

get_header();
wp_enqueue_script('tmm_carousel');
$car_compare_list = TMM_Ext_PostType_Car::get_compare_list();
$mileage_unit = ( ! empty( tmm_get_car_mileage_unit() ) ? tmm_get_car_mileage_unit() : 'miles' );
?>

<?php if (!empty($car_compare_list)): ?>

	<?php get_template_part('content', 'header'); ?>

	<div class="compare-table clearfix">

		<div class="col features">

			<div class="heading">
				<h3 class="widget-title"><?php esc_html_e('Compare Listings', 'cardealer'); ?></h3>
			</div>

			<div class="viewport align-center">

				<a id="carou_prev" class="button orange"><?php esc_html_e('Prev', 'cardealer'); ?></a>
				<a id="carou_next" class="button orange"><?php esc_html_e('Next', 'cardealer'); ?></a>

			</div>
			<!--/ .viewport-->

			<ul class="data-feature">
				<li><?php esc_html_e('Price', 'cardealer'); ?></li>
				<li><?php esc_html_e('Condition', 'cardealer'); ?></li>
				<li><?php esc_html_e('Body Type', 'cardealer'); ?></li>
				<li><?php esc_html_e('Engine', 'cardealer'); ?></li>
				<li><?php esc_html_e('Fuel Type', 'cardealer'); ?></li>
				<li><?php esc_html_e('Gearbox', 'cardealer'); ?></li>
				<li><?php ($mileage_unit == 'km') ? esc_html_e('Kilometer', 'cardealer') : esc_html_e('Mileage', 'cardealer') ?></li>
				<li><?php esc_html_e('Year', 'cardealer'); ?></li>
				<li><?php esc_html_e('Owners', 'cardealer'); ?></li>
				<?php if (!empty(TMM_Ext_PostType_Car::$specifications_array)): ?>

					<?php foreach (TMM_Ext_PostType_Car::$specifications_array as $specification_key => $value) : ?>
						<?php $attributes_array = TMM_Ext_PostType_Car::get_attribute_constructors($specification_key); ?>

						<?php foreach ($attributes_array as $featured_key => $featured_value): ?>
							<li><?php _e($featured_value['name'], 'cardealer'); ?></li>
						<?php endforeach; ?>

					<?php endforeach; ?>

				<?php endif; ?>
			</ul>

		</div><!--/ .col-->

		<div class="col-scroll-wrap">

            <ul class="col-scroll clearfix">

                <?php foreach ($car_compare_list as $key => $post_id): ?>

                    <li class="col" id="car_col_<?php echo $post_id ?>">

                        <?php
                        $car_data = TMM_Ext_PostType_Car::get_car_data($post_id);
                        ?>

                        <div class="heading">

                            <a href="#" class="js_remove_car_from_compare_list button orange big"
                               data-post-id="<?php echo $post_id ?>">
                                <?php esc_html_e('Remove', 'cardealer'); ?>
                            </a>

                        </div>
                        <!--/ .heading-->

                        <div class="viewport">

                            <figure>

                                <a href="<?php echo get_permalink($post_id) ?>">
                                    <img alt=""
                                         src="<?php echo tmm_get_car_cover_image($post_id, 'thumb') ?>">
                                </a>

                                <figcaption>
                                    <a href="<?php echo get_post_permalink($post_id) ?>">
	                                    <?php tmm_get_car_title($post_id, 1); ?>
                                    </a>
                                    <div>
                                    <?php
                                    if (!empty($car_data['car_carlocation'][0])) {
                                        $car_carlocation = TMM_Ext_PostType_Car::get_location_string($car_data['car_carlocation']);
                                        echo $car_carlocation;
                                    }
                                    ?>
                                    </div>
                                </figcaption>

                            </figure>

                            <?php if (TMM::get_option('show_button_details', TMM_APP_CARDEALER_PREFIX)): ?>
                                <a target="_blank" class="button orange"
                                   href="<?php echo get_post_permalink($post_id) ?>"><?php esc_html_e('Details', 'cardealer'); ?></a>
                            <?php endif; ?>

                        </div>
                        <!--/ .viewport-->

                        <ul class="data-feature">
                            <li data-feature="<?php esc_html_e('Price', 'cardealer'); ?>">
	                            <?php echo esc_html( tmm_get_car_price($post_id) ); ?>
                            </li>
                            <li data-feature="<?php esc_html_e('Condition', 'cardealer'); ?>">
	                            <?php echo esc_html( tmm_get_car_condition($post_id) ); ?>
                            </li>
                            <li data-feature="<?php esc_html_e('Body Type', 'cardealer'); ?>">
	                            <?php echo esc_html( tmm_get_car_option('body', $post_id) ); ?>
                            </li>
                            <li data-feature="<?php esc_html_e('Engine', 'cardealer'); ?>">
	                            <?php echo tmm_get_car_engine($post_id, '', true); ?>
                            </li>
                            <li data-feature="<?php esc_html_e('Fuel Type', 'cardealer'); ?>">
	                            <?php echo esc_html( tmm_get_car_option('fuel_type', $post_id) ); ?>
                            </li>
                            <li data-feature="<?php esc_html_e('Gearbox', 'cardealer'); ?>">
	                            <?php echo esc_html( tmm_get_car_option('transmission', $post_id) ); ?>
                            </li>
                            <li data-feature="<?php ($mileage_unit == 'km') ? esc_html_e('Kilometer', 'cardealer') : esc_html_e('Mileage', 'cardealer') ?>">
	                            <?php echo esc_html( tmm_get_car_mileage($post_id) ); ?>
                            </li>
                            <li data-feature="<?php esc_html_e('Year', 'cardealer'); ?>">
	                            <?php echo esc_html( tmm_get_car_option('year', $post_id) ); ?>
                            </li>
                            <li data-feature="<?php esc_html_e('Owners', 'cardealer'); ?>">
	                            <?php echo esc_html( tmm_get_car_option('owner_number', $post_id) ); ?>
                            </li>

                            <?php if (!empty(TMM_Ext_PostType_Car::$specifications_array)) { ?>
                                <?php foreach (TMM_Ext_PostType_Car::$specifications_array as $specification_key => $value) { ?>
                                    <?php $attributes_array = TMM_Ext_PostType_Car::get_attribute_constructors($specification_key); ?>

                                    <?php foreach ($attributes_array as $featured_key => $featured_value) {
			                            $o_value = '-';

			                            if ( isset($car_data['advanced'][$specification_key][$featured_key]) ) {
				                            $o_key = $car_data['advanced'][$specification_key][$featured_key];

				                            if ( $featured_value['type'] === 'checkbox' ) {
				                                $o_value =  format_empty_data($o_key);
				                            } else if ( $featured_value['type'] === 'select' && isset($featured_value['values'][$o_key]) ) {
					                            $o_value =  format_empty_data($featured_value['values'][$o_key]);
				                            }

			                            }

			                            ?>
                                        <li data-feature="<?php echo $featured_value['name'] ?>"><?php echo($o_value) ?></li>
                                    <?php } ?>

                                <?php } ?>
                            <?php } ?>
                        </ul>

                    </li>

                <?php endforeach; ?>

            </ul><!--/ .col-scroll-->

		</div><!--/ .col-scroll-wrap-->

	</div><!--/ .compare-table-->

<?php else: ?>

    <section class="viewport-50 padding-top-80 padding-bottom-80 clearfix">

        <?php esc_html_e('Sorry, your comparison list is empty!', 'cardealer'); ?>

    </section>

<?php endif; ?>

<?php

function format_empty_data($value)
{
    if ( $value === 0 || $value === '0' ) {
        $value = esc_html__( 'No', 'cardealer' );
    } else if ( $value === 1 || $value === '1' ) {
        $value = esc_html__( 'Yes', 'cardealer' );
    } else {
        $value = esc_html__( $value, 'cardealer' );
    }

	return $value;
}

?>

<?php get_footer(); ?>