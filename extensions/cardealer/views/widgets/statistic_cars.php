<?php if (!defined('ABSPATH')) die('No direct access allowed');

if(isset($GLOBALS['current_page']) && $GLOBALS['current_page'] === 'user-cars'){
	
$user_id = get_current_user_id();

$all_cars = TMM_Helper::get_filtered_user_cars($user_id, 'all', false);
$featured_cars = TMM_Helper::get_filtered_user_cars($user_id, 'featured', false);
$sold_cars = TMM_Helper::get_filtered_user_cars($user_id, 'sold', false);
$draft_cars = TMM_Helper::get_filtered_user_cars($user_id, 'draft', false);
$damaged_cars = TMM_Helper::get_filtered_user_cars($user_id, 'damaged', false);
$new_cars = TMM_Helper::get_filtered_user_cars($user_id, 'new', false);
$used_cars = TMM_Helper::get_filtered_user_cars($user_id, 'used', false);

$condition_list = tmm_get_car_condition_list();
?>

<div class="widget widget_statistic">

	<div class="boxed-widget">
		<?php if ($instance['title'] != '') { ?>
			<h3 class="widget-title"><?php esc_html_e( $instance['title'], 'cardealer' ) ?></h3>
		<?php } ?>

		<section class="boxed-entry clearfix">
			<input type="hidden" id="current_user_id" data-id="<?php echo esc_attr( $user_id ) ?>" data-posts-per-page="10" data-template="<?php if (!empty($_POST['template_user_cars']) && ($_POST['template_user_cars'] == true)) { echo 'template_user_cars'; } ?>">
			<ul>
				<li>
					<input class="js_filt_cars" id="filt_all_cars" type="checkbox" value="1" checked="" >
					<label for="filt_all_cars">
						<?php esc_html_e('All cars', 'cardealer'); ?> <span>(<?php echo esc_html( $all_cars ) ?>)</span>
					</label>
				</li>
				<li>
					<input class="js_filt_cars" id="filt_featured_cars" type="checkbox" >
					<label for="filt_featured_cars">
						<?php esc_html_e('Featured cars', 'cardealer'); ?> <span>(<?php echo esc_html( $featured_cars ) ?>)</span>
					</label>
				</li>
				<li>
					<input class="js_filt_cars" id="filt_sold_cars" type="checkbox" >
					<label for="filt_sold_cars">
						<?php esc_html_e('Sold cars', 'cardealer'); ?> <span>(<?php echo esc_html( $sold_cars ) ?>)</span>
					</label>
				</li>
				<li>
					<input class="js_filt_cars" id="filt_draft_cars" type="checkbox" >
					<label for="filt_draft_cars">
						<?php esc_html_e('Draft cars', 'cardealer'); ?> <span>(<?php echo esc_html( $draft_cars ) ?>)</span>
					</label>
				</li>

				<?php if ( array_key_exists( "car_is_damaged", $condition_list ) ) { ?>
				<li>
					<input class="js_filt_cars" id="filt_damaged_cars" type="checkbox" >
					<label for="filt_damaged_cars">
						<?php esc_html_e('Damaged cars', 'cardealer'); ?> <span>(<?php echo esc_html( $damaged_cars ) ?>)</span>
					</label>
				</li>
				<?php } ?>

				<?php if ( array_key_exists( "car_is_new", $condition_list ) ) { ?>
				<li>
					<input class="js_filt_cars" id="filt_new_cars" type="checkbox" >
					<label for="filt_new_cars">
						<?php esc_html_e('New cars', 'cardealer'); ?> <span>(<?php echo esc_html( $new_cars ) ?>)</span>
					</label>
				</li>
				<?php } ?>

				<?php if ( array_key_exists( "car_is_used", $condition_list ) ) { ?>
				<li>
					<input class="js_filt_cars" id="filt_used_cars" type="checkbox" >
					<label for="filt_used_cars">
						<?php esc_html_e('Used cars', 'cardealer'); ?> <span>(<?php echo esc_html( $used_cars ) ?>)</span>
					</label>
				</li>
				<?php } ?>
			</ul>
		</section><!--/ .filter-items-->

	</div><!--/ .boxed-widget-->

</div><!--/ .widget-->

<?php } ?>