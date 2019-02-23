<?php if ( !defined('ABSPATH') ) exit; ?>

<p>
    <label for="<?php echo $widget->get_field_id('title'); ?>"><?php esc_html_e('Title', 'cardealer') ?>:</label>
    <input class="widefat" type="text" id="<?php echo $widget->get_field_id('title'); ?>" name="<?php echo $widget->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
</p>

<p>
    <label for="<?php echo $widget->get_field_id('user_number'); ?>"><?php esc_html_e('User Number', 'cardealer') ?>:</label>
    <input class="widefat" type="text" id="<?php echo $widget->get_field_id('user_number'); ?>" name="<?php echo $widget->get_field_name('user_number'); ?>" value="<?php echo $instance['user_number']; ?>" />
</p>

<p>
    <label for="<?php echo $widget->get_field_id('order'); ?>"><?php esc_html_e('Display Order', 'cardealer') ?>:</label>
    <select id="<?php echo $widget->get_field_id('order'); ?>" name="<?php echo $widget->get_field_name('order'); ?>" class="widefat">
		<?php
		$order = array(
			'latest' => esc_html__('Latest', 'cardealer'),
			'random' => esc_html__('Random', 'cardealer')
		);
		?>
		<?php foreach ($order as $key => $type) : ?>
			<option <?php echo($key == $instance['order'] ? "selected" : "") ?> value="<?php echo $key ?>"><?php echo $type ?></option>
		<?php endforeach; ?>
    </select>
</p>

<p>
	<?php
	$packets = TMM_Cardealer_User::get_user_roles();
	$packets = array_merge($packets, array('administrator' => array('name' => esc_html__('Administrator', 'cardealer'))));
	?>
    <label for="<?php echo $widget->get_field_id('packet'); ?>"><?php esc_html_e('Account Status', 'cardealer') ?>:</label>
    <select id="<?php echo $widget->get_field_id('packet'); ?>" name="<?php echo $widget->get_field_name('packet'); ?>" class="widefat">
		<option value="0"><?php esc_html_e('All', 'cardealer') ?></option>
		<?php foreach ($packets as $key => $value) : ?>
			<option <?php echo($key == $instance['packet'] ? "selected" : "") ?> value="<?php echo $key ?>"><?php echo $value['name'] ?></option>
		<?php endforeach; ?>
    </select>
</p>
