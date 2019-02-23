<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<p>
    <label for="<?php echo $widget->get_field_id('title'); ?>"><?php esc_html_e('Title', 'cardealer') ?>:</label>
    <input class="widefat" type="text" id="<?php echo $widget->get_field_id('title'); ?>" name="<?php echo $widget->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
</p>

<p>
    <label for="<?php echo $widget->get_field_id('twitter_links'); ?>"><?php esc_html_e('Twitter Link', 'cardealer') ?>:</label>
    <input class="widefat" type="text" id="<?php echo $widget->get_field_id('twitter_links'); ?>" name="<?php echo $widget->get_field_name('twitter_links'); ?>" value="<?php echo $instance['twitter_links']; ?>" />
</p>

<p>
    <label for="<?php echo $widget->get_field_id('twitter_tooltip'); ?>"><?php esc_html_e('Twitter Tooltip', 'cardealer') ?>:</label>
    <input class="widefat" type="text" id="<?php echo $widget->get_field_id('twitter_tooltip'); ?>" name="<?php echo $widget->get_field_name('twitter_tooltip'); ?>" value="<?php echo $instance['twitter_tooltip']; ?>" />
</p>

<p>
    <label for="<?php echo $widget->get_field_id('facebook_links'); ?>"><?php esc_html_e('Facebook Link', 'cardealer') ?>:</label>
    <input class="widefat" type="text" id="<?php echo $widget->get_field_id('facebook_links'); ?>" name="<?php echo $widget->get_field_name('facebook_links'); ?>" value="<?php echo $instance['facebook_links']; ?>" />
</p>

<p>
    <label for="<?php echo $widget->get_field_id('facebook_tooltip'); ?>"><?php esc_html_e('Facebook Tooltip', 'cardealer') ?>:</label>
    <input class="widefat" type="text" id="<?php echo $widget->get_field_id('facebook_tooltip'); ?>" name="<?php echo $widget->get_field_name('facebook_tooltip'); ?>" value="<?php echo $instance['facebook_tooltip']; ?>" />
</p>

<p>
    <label for="<?php echo $widget->get_field_id('instagram_links'); ?>"><?php esc_html_e('Instagram Link', 'cardealer') ?>:</label>
    <input class="widefat" type="text" id="<?php echo $widget->get_field_id('instagram_links'); ?>" name="<?php echo $widget->get_field_name('instagram_links'); ?>" value="<?php echo $instance['instagram_links']; ?>" />
</p>

<p>
    <label for="<?php echo $widget->get_field_id('instagram_tooltip'); ?>"><?php esc_html_e('Instagram Tooltip', 'cardealer') ?>:</label>
    <input class="widefat" type="text" id="<?php echo $widget->get_field_id('instagram_tooltip'); ?>" name="<?php echo $widget->get_field_name('instagram_tooltip'); ?>" value="<?php echo $instance['instagram_tooltip']; ?>" />
</p>

<p>
    <label for="<?php echo $widget->get_field_id('dribble_links'); ?>"><?php esc_html_e('Dribble Link', 'cardealer') ?>:</label>
    <input class="widefat" type="text" id="<?php echo $widget->get_field_id('dribble_links'); ?>" name="<?php echo $widget->get_field_name('dribble_links'); ?>" value="<?php echo $instance['dribble_links']; ?>" />
</p>

<p>
    <label for="<?php echo $widget->get_field_id('dribble_tooltip'); ?>"><?php esc_html_e('Dribble Tooltip', 'cardealer') ?>:</label>
    <input class="widefat" type="text" id="<?php echo $widget->get_field_id('dribble_tooltip'); ?>" name="<?php echo $widget->get_field_name('dribble_tooltip'); ?>" value="<?php echo $instance['dribble_tooltip']; ?>" />
</p>

<p>
    <label for="<?php echo $widget->get_field_id('vimeo_links'); ?>"><?php esc_html_e('Vimeo Link', 'cardealer') ?>:</label>
    <input class="widefat" type="text" id="<?php echo $widget->get_field_id('vimeo_links'); ?>" name="<?php echo $widget->get_field_name('vimeo_links'); ?>" value="<?php echo $instance['vimeo_links']; ?>" />
</p>

<p>
    <label for="<?php echo $widget->get_field_id('vimeo_tooltip'); ?>"><?php esc_html_e('Vimeo Tooltip', 'cardealer') ?>:</label>
    <input class="widefat" type="text" id="<?php echo $widget->get_field_id('vimeo_tooltip'); ?>" name="<?php echo $widget->get_field_name('vimeo_tooltip'); ?>" value="<?php echo $instance['vimeo_tooltip']; ?>" />
</p>


<p>
	<?php
	$checked = "";
	if ($instance['show_rss_tooltip'] == 'true') {
		$checked = 'checked="checked"';
	}
	?>
    <input type="checkbox" id="<?php echo $widget->get_field_id('show_rss_tooltip'); ?>" name="<?php echo $widget->get_field_name('show_rss_tooltip'); ?>" value="true" <?php echo $checked; ?> />
    <label for="<?php echo $widget->get_field_id('show_rss_tooltip'); ?>"><?php esc_html_e('Show RSS Link', 'cardealer') ?>:</label>
</p>


<p>
    <label for="<?php echo $widget->get_field_id('rss_tooltip'); ?>"><?php esc_html_e('RSS Tooltip', 'cardealer') ?>:</label>
    <input class="widefat" type="text" id="<?php echo $widget->get_field_id('rss_tooltip'); ?>" name="<?php echo $widget->get_field_name('rss_tooltip'); ?>" value="<?php echo $instance['rss_tooltip']; ?>" />
</p>



