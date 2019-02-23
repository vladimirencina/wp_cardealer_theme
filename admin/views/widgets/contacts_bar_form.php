<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<p>
    <label for="<?php echo $widget->get_field_id('title'); ?>"><?php esc_html_e('Title', 'cardealer') ?>:</label>
    <input class="widefat" type="text" id="<?php echo $widget->get_field_id('title'); ?>" name="<?php echo $widget->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
</p>

<p>
    <label for="<?php echo $widget->get_field_id('address'); ?>"><?php esc_html_e('Address', 'cardealer') ?>:</label>
    <textarea name="<?php echo $widget->get_field_name('address'); ?>" id="<?php echo $widget->get_field_id('address'); ?>" class="widefat"><?php echo $instance['address']; ?></textarea>
</p>

<p>
    <label for="<?php echo $widget->get_field_id('phone'); ?>"><?php esc_html_e('Phone', 'cardealer') ?>:</label>
    <input class="widefat" type="text" id="<?php echo $widget->get_field_id('phone'); ?>" name="<?php echo $widget->get_field_name('phone'); ?>" value="<?php echo $instance['phone']; ?>" />
</p>

<p>
    <label for="<?php echo $widget->get_field_id('fax'); ?>"><?php esc_html_e('FAX', 'cardealer') ?>:</label>
    <input class="widefat" type="text" id="<?php echo $widget->get_field_id('fax'); ?>" name="<?php echo $widget->get_field_name('fax'); ?>" value="<?php echo $instance['fax']; ?>" />
</p>

<p>
    <label for="<?php echo $widget->get_field_id('email'); ?>"><?php esc_html_e('Email', 'cardealer') ?>:</label>
    <input class="widefat" type="text" id="<?php echo $widget->get_field_id('email'); ?>" name="<?php echo $widget->get_field_name('email'); ?>" value="<?php echo $instance['email']; ?>" />
</p>

<p>
    <label for="<?php echo $widget->get_field_id('twitter'); ?>"><?php esc_html_e('Twitter Username', 'cardealer') ?>:</label>
    <input class="widefat" type="text" id="<?php echo $widget->get_field_id('twitter'); ?>" name="<?php echo $widget->get_field_name('twitter'); ?>" value="<?php echo $instance['twitter']; ?>" />
</p>


<p>
    <label for="<?php echo $widget->get_field_id('facebook'); ?>"><?php esc_html_e('Facebook Username', 'cardealer') ?>:</label>
    <input class="widefat" type="text" id="<?php echo $widget->get_field_id('facebook'); ?>" name="<?php echo $widget->get_field_name('facebook'); ?>" value="<?php echo $instance['facebook']; ?>" />
</p>

<p>
	<?php
	$checked = "";
	if ($instance['show_rss'] == 'true') {
		$checked = 'checked="checked"';
	}
	?>
    <input type="checkbox" id="<?php echo $widget->get_field_id('show_rss'); ?>" name="<?php echo $widget->get_field_name('show_rss'); ?>" value="true" <?php echo $checked; ?> />
    <label for="<?php echo $widget->get_field_id('show_rss'); ?>"><?php esc_html_e('Show RSS', 'cardealer') ?>:</label>
</p>

