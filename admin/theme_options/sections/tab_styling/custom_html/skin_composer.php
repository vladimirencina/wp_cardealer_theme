<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
		
<div class="option option-add-form">

	<h4 classs="option-title"><?php esc_html_e('Create a new skin', 'cardealer'); ?></h4>
	
	<div class="controls">
		
		<input type="text" id="new_color_scheme_name" class="middle" placeholder="<?php esc_html_e('Type here new skin name', 'cardealer'); ?>" />
		<a href="#" class="add-button" id="save_current_color_scheme" title="<?php esc_html_e('Create new skin', 'cardealer'); ?>"></a>
		
	</div>	
	
	<div class="explain"></div>
	
</div><!--/ .option-->

<div class="option option-select">
			
	<h4 class="option-title"><?php esc_html_e('Load Skin From', 'cardealer'); ?></h4>
	
	<div class="controls">
		
		<?php $theme_schemes = TMM_Ext_Demo::get_theme_schemes(); ?>
		
		<label class="sel">
			<select id="color_schemes_select">
				<option value=""></option>
				<?php if (!empty($theme_schemes)): ?>
					<?php foreach ($theme_schemes as $value) : ?>
						<option style="color: <?php echo $value['color'] ?>;" value="<?php echo $value['key'] ?>" data-color="<?php echo $value['color'] ?>"><?php echo $value['name'] ?></option>
					<?php endforeach; ?>
				<?php endif; ?>
			</select>
		</label>
		
	</div>
	
	<div class="explain"></div>
	
</div><!--/ .option-->	

<?php
TMM_OptionsHelper::draw_theme_option(array(
	'name' => '',
	'title' => esc_html__('Color Mark', 'cardealer'),
	'type' => 'color',
	'default_value' => '',
	'description' => esc_html__('New skin name', 'cardealer'),
	'css_class' => 'new_color_scheme_color',
	'hide_item_html' => 1,
	'placeholder' => '#ffffff'
));
?>

<a href="#" class="admin-button button-gray button-medium" id="upload_color_scheme"><?php esc_html_e('Load', 'cardealer'); ?></a>
&nbsp;
<a href="#" class="admin-button button-gray button-medium" id="edit_color_scheme"><?php esc_html_e('Modify', 'cardealer'); ?></a>
&nbsp;
<a href="#" class="admin-button button-gray button-medium" id="delete_color_scheme"><?php esc_html_e('Delete', 'cardealer'); ?></a>

<div class="clearfix">
<?php
TMM_OptionsHelper::draw_theme_option(array(
    'name' => 'hide_layout_front_popup',
    'type' => 'checkbox',
    'default_value' => 0,
    'title' => esc_html__('Hide Options panel', 'cardealer'),
    'description' => esc_html__('Hide Theme Options sliding panel from Front End', 'cardealer'),
    'css_class' => '',
));
?>
</div>