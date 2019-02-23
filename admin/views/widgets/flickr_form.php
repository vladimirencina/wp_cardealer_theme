<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<p>
    <label for="<?php echo $widget->get_field_id('title'); ?>"><?php esc_html_e('Title', 'cardealer') ?>:</label>
    <input class="widefat" type="text" id="<?php echo $widget->get_field_id('title'); ?>" name="<?php echo $widget->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
</p>

<p>
    <label for="<?php echo $widget->get_field_id('username'); ?>"><?php esc_html_e('Flickr Username', 'cardealer') ?>:</label>
    <input class="widefat" type="text" id="<?php echo $widget->get_field_id('username'); ?>" name="<?php echo $widget->get_field_name('username'); ?>" value="<?php echo $instance['username']; ?>" />
</p>

<p>
    <label for="<?php echo $widget->get_field_id('imagescount'); ?>"><?php esc_html_e('Number of images', 'cardealer') ?>:</label>
    <input class="widefat" type="text" id="<?php echo @$widget->get_field_id('imagescount'); ?>" name="<?php echo @$widget->get_field_name('imagescount'); ?>" value="<?php echo @$instance['imagescount']; ?>" />
</p>


<p>
    <label for="<?php echo $widget->get_field_id('order'); ?>"><?php esc_html_e('Display Order', 'cardealer') ?>:</label>
</p>


