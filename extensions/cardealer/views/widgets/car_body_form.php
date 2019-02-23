<?php if ( !defined('ABSPATH') ) exit; ?>

<p>
    <label for="<?php echo $widget->get_field_id('title'); ?>"><?php esc_html_e('Title', 'cardealer') ?>:</label>
    <input class="widefat" type="text" id="<?php echo $widget->get_field_id('title'); ?>" name="<?php echo $widget->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
</p>

<p>
	<input type="checkbox" id="<?php echo $widget->get_field_id('show_name'); ?>"
	       name="<?php echo $widget->get_field_name('show_name'); ?>" value="true" <?php checked($instance['show_name'], 'true'); ?> />
	<label for="<?php echo $widget->get_field_id('show_name'); ?>"><?php esc_html_e('Display Body Type Name', 'cardealer') ?></label>
</p>

<p>
	<input type="checkbox" id="<?php echo $widget->get_field_id('show_count'); ?>"
	       name="<?php echo $widget->get_field_name('show_count'); ?>" value="true" <?php checked($instance['show_count'], 'true'); ?> />
	<label for="<?php echo $widget->get_field_id('show_count'); ?>"><?php esc_html_e('Display Count of Cars Related to Body Type', 'cardealer') ?></label>
</p>

<p>
	<input type="checkbox" id="<?php echo $widget->get_field_id('enable_link'); ?>"
	       name="<?php echo $widget->get_field_name('enable_link'); ?>" value="true" <?php checked($instance['enable_link'], 'true'); ?> />
	<label for="<?php echo $widget->get_field_id('enable_link'); ?>"><?php esc_html_e('Enable Link to Car Listing', 'cardealer') ?></label>
</p>