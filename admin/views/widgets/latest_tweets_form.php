<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<p>
    <label for="<?php echo esc_attr($widget->get_field_id('title')) ?>"><?php esc_html_e('Title', 'cardealer') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr($widget->get_field_id('title')) ?>" name="<?php echo esc_attr($widget->get_field_name('title')) ?>" value="<?php echo esc_attr($instance['title']) ?>" />
</p>

<p>
    <label for="<?php echo esc_attr($widget->get_field_id('twitter_screen_name')); ?>"><?php esc_html_e('Twitter Screen Name', 'cardealer') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr($widget->get_field_id('twitter_screen_name')); ?>" name="<?php echo esc_attr($widget->get_field_name('twitter_screen_name')); ?>" value="<?php echo esc_attr($instance['twitter_screen_name']); ?>" />
</p>

<p>
    <label for="<?php echo esc_attr($widget->get_field_id('postcount')) ?>"><?php esc_html_e('Number of tweets', 'cardealer') ?>:</label>
    <input class="widefat" type="text" id="<?php echo esc_attr($widget->get_field_id('postcount')) ?>" name="<?php echo esc_attr($widget->get_field_name('postcount')) ?>" value="<?php echo esc_attr($instance['postcount']) ?>" />
</p>