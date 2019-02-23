<?php if (!defined('ABSPATH')) die('No direct access allowed');

/*
  Template Name: Login Page
 */

$mycars_page_link = get_permalink(TMM::get_option('user_cars_page', TMM_APP_CARDEALER_PREFIX));
$redirect_url = !empty($mycars_page_link) ? $mycars_page_link : home_url();
if (is_user_logged_in()) {
	wp_redirect($redirect_url, 302);
	return;
}

get_header();
global $post;
global $wp;
$lost_pass = false;

if ( isset($wp->query_vars['lost-password']) ) {
	$lost_pass = 'lost_password';
}

?>

<section class="viewport-50 padding-top-40 padding-bottom-80 clearfix">

<?php
if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php if (!is_front_page() && !TMM_Helper::is_front_lang_page()): ?>

			<?php if (!($hide_single_page_title = get_post_meta($post->ID, 'hide_single_page_title', true))): ?>
				<h2 class="section-title"><?php $lost_pass ? esc_html_e('Lost Password', 'cardealer') : the_title() ?></h2>
			<?php endif; ?>
		<?php endif; ?>

		<?php
		the_content();
		tmm_link_pages();
		tmm_layout_content(get_the_ID());
	endwhile;
endif;

if ($lost_pass) {
	$key = '';
	$login = '';
	$login_page_id = TMM::get_option('user_login_page', TMM_APP_CARDEALER_PREFIX);

	if ( !empty($_GET['key']) && !empty($_GET['login']) ) {

		$user = TMM_Ext_Authentication::check_password_reset_key( $_GET['key'], $_GET['login'] );
		$lost_pass = 'reset_password';

		if( is_object( $user ) ) {
			$key = esc_attr($_GET['key']);
			$login = esc_attr($_GET['login']);
		}

	} elseif ( isset( $_GET['reset'] ) ) {
		?>

		<div class="info"><?php echo __( 'Your password has been reset.', 'cardealer' ) . ' <a href="' . TMM_Helper::get_permalink_by_lang( $login_page_id, array(), true ) . '">' . __( 'Log in', 'cardealer' ) . '</a>'; ?></div>

		<?php
	}
	?>

<!-- Lost Password Form -->
<div class="row">

	<div class="col-md-6 col-md-push-3">

		<form class="form-account" method="post" name="lostpasswordform" id="lostpasswordform">

			<?php if ($lost_pass === 'lost_password') { ?>

				<div class="form-heading">
					<h3><?php esc_html_e('Restore Password', 'cardealer'); ?></h3>
				</div><!--/ .form-heading-->

				<div class="form-entry">

					<p><?php esc_html_e( 'Please enter your username or email address. You will receive a link to create a new password via email.', 'cardealer' ); ?></p>

					<p>
						<label for="user_login"><?php esc_html_e( 'Username or email', 'cardealer' ); ?></label>
						<input class="input" type="text" size="20" value="" name="user_login" id="user_login" />
					</p>

					<p>
						<input id="lostPassBtn" type="submit" class="button orange" value="<?php esc_html_e( 'Reset Password', 'cardealer' ); ?>" />
						<i class="preloader icon-spin3"></i>
					</p>

					<div class="info-box"></div>

					<?php wp_nonce_field( $lost_pass ); ?>

				</div><!--/ .form-entry-->

			<?php } else if ($lost_pass === 'reset_password') { ?>

				<div class="form-heading">
					<h3><?php esc_html_e('Enter your new password below.', 'cardealer'); ?></h3>
				</div><!--/ .form-heading-->

				<div class="form-entry">

				<?php if( is_object( $user ) ) { ?>

					<p>
						<label for="password_1"><?php esc_html_e( 'New password', 'cardealer' ); ?> <span class="required">*</span></label>
						<input type="password" size="20" value="" name="password_1" id="password_1" />
					</p>

					<p>
						<label for="password_2"><?php esc_html_e( 'Re-enter new password', 'cardealer' ); ?> <span class="required">*</span></label>
						<input type="password" size="20" value="" name="password_2" id="password_2" />
					</p>

					<input type="hidden" name="reset_key" value="<?php echo $key; ?>" />
					<input type="hidden" name="reset_login" value="<?php echo $login; ?>" />

					<p>
						<input type="submit" class="button orange" value="<?php esc_html_e( 'Reset Password', 'cardealer' ); ?>" />
					</p>

					<?php wp_nonce_field( $lost_pass ); ?>

					<?php do_action('tmm_notice'); ?>

				<?php } else { ?>

					<div class="error"><?php echo (string) $user; ?></div>

				<?php } ?>

				</div><!--/ .form-entry-->

			<?php } ?>

		</form><!--/ .form-account-->

	</div>

</div><!--/ .row-->

	<?php
} else {

$users_can_register = get_option('users_can_register');

if (isset($_GET['redirect']) AND ! empty($_GET['redirect'])) {
	$redirect_to = $_GET['redirect'];
} else {
	$redirect_to = $redirect_url;
}
?>

<!-- User Registration Form -->
<div class="row">

	<?php if ($users_can_register): ?>

		<div class="col-md-6">

	        <form class="form-account" id="user_register_form">

	            <div class="form-heading">
	                <h3><?php esc_html_e('Register now for', 'cardealer'); ?> <?php echo bloginfo() ?></h3>
	            </div><!--/ .form-heading-->

	            <div class="form-entry">

	                <p>
	                    <label for="user_name2"><?php esc_html_e('Username', 'cardealer'); ?>:</label>
	                    <input required type="text" size="20" value="" class="input" id="user_name2" name="user_login" oninvalid="this.setCustomValidity('<?php esc_html_e('Please fill out this field.', 'cardealer'); ?>')" oninput="setCustomValidity('')">
	                </p>

	                <p>
	                    <label for="user_email2"><?php esc_html_e('Your Email', 'cardealer'); ?>:</label>
	                    <input required type="email" size="25" value="" class="input" id="user_email2" name="user_email" oninvalid="this.setCustomValidity('<?php esc_html_e('Please Enter valid email.', 'cardealer'); ?>')" oninput="setCustomValidity('')">
			            <span class="requirements">
			                <?php esc_html_e('Must be a valid email address.', 'cardealer'); ?>
			            </span>
	                </p>

	                <p class="line_height_plus">
		                <?php esc_html_e('Registration confirmation will be emailed to you.', 'cardealer'); ?>
	                </p>

		            <p>
			            <input id="user_register_button2" type="submit" class="button dark enter-btn" value="<?php esc_html_e('Register', 'cardealer'); ?>"/>
			            <i class="preloader icon-spin3"></i>
		            </p>

	                <div class="info-box"></div>

	            </div><!--/ .form-entry-->

	        </form><!--/ .form-account-->

	    </div>

	<?php endif; ?>

	<div class="col-md-6<?php if (!$users_can_register): ?> col-md-push-3<?php endif; ?>">

		<form class="form-account" method="post" action="<?php echo wp_login_url(esc_url($redirect_to)); ?>" id="loginform" name="loginform">

			<div class="form-heading">
				<h3><?php esc_html_e('Log In', 'cardealer'); ?></h3>
			</div><!--/ .form-heading-->

			<div class="form-entry">

				<p>
					<label for="user_login"><?php esc_html_e('Username', 'cardealer'); ?>:</label>
					<input type="text" size="20" value="" class="input" id="user_login" name="log">
				</p>

				<p>
					<label for="user_pass"><?php esc_html_e('Password', 'cardealer'); ?>:</label>
					<input type="password" size="20" value="" class="input" id="user_pass" name="pwd">
				</p>

				<p class="line_height_plus">
					<input type="checkbox" value="forever" id="rememberme" name="rememberme">
					<label for="rememberme"><?php esc_html_e('Remember Me', 'cardealer'); ?></label>
				</p>

				<p>
					<input type="submit" class="button orange" value="<?php esc_html_e('Log In', 'cardealer'); ?>" id="wp-submit" name="wp-submit">
					<i class="preloader icon-spin3"></i>

					<a class="reset-pass" href="<?php echo wp_lostpassword_url(); ?>"><?php esc_html_e("Forgot your password?", 'cardealer') ?></a>

					<input type="hidden" value="<?php echo esc_url($redirect_to); ?>" name="redirect_to">
				</p>

				<div class="info-box"></div>

			</div><!--/ .form-entry-->

		</form><!--/ .form-account-->

	</div>
	
</div><!--/ .row-->

<?php
} ?>

</section>

<?php get_footer(); ?>