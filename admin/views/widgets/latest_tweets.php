<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<div class="widget widget_latest_tweets">

	<?php if (!empty($instance['title'])): ?>
		<h3 class="widget-title"><?php esc_html_e($instance['title'], 'cardealer'); ?></h3>
	<?php endif; ?>

		<?php
			$title = $instance['title'];
			$limit = isset($instance['postcount']) ? $instance['postcount'] : 5;
			$twitter_screen_name =  isset($instance['twitter_screen_name']) ? $instance['twitter_screen_name'] : 'ThemeMakers';
			$hash = md5(rand(1, 999));
		?>

		<script type="text/javascript">
			jQuery(function() {
				var config = {
					"profile": {"screenName": '<?php echo esc_js($twitter_screen_name); ?>'},
					"domId": 'tweets_<?php echo esc_js($hash); ?>',
					"maxTweets": <?php echo esc_attr((int) $limit) ?>,
					"enableLinks": true,
					"showTime": true,
					"showUser": false,
					"showRetweet": false,
					"showInteraction": false
				};
				twitterFetcher.fetch(config);
			});
		</script>

		<div class="tweets-container" id="tweets_<?php echo esc_attr($hash) ?>"></div>

</div><!--/ .widget-->