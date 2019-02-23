<?php if ( !defined('ABSPATH') ) exit; ?>
<h4><?php esc_html_e('Sidebar Position', 'cardealer'); ?></h4>
<input type="hidden" value="<?php echo (!$page_sidebar_position ? "sbr" : $page_sidebar_position) ?>" name="page_sidebar_position" />

<ul class="admin-page-choice-sidebar clearfix">
	<li class="lside <?php echo ($page_sidebar_position == "sbl" ? "current-item" : "") ?>"><a href="sbl" data-val="sbl"><?php esc_html_e('Left Sidebar', 'cardealer'); ?></a></li>
	<li class="wside <?php echo ($page_sidebar_position == "no_sidebar" ? "current-item" : "") ?>"><a href="no_sidebar" data-val="no_sidebar"><?php esc_html_e('Without Sidebar', 'cardealer'); ?></a></li>
	<li class="rside <?php echo ($page_sidebar_position == "sbr" ? "current-item" : "") ?>"><a href="sbr" data-val="sbr"><?php esc_html_e('Right Sidebar', 'cardealer'); ?></a></li>
</ul>
<div class="clear"></div>
