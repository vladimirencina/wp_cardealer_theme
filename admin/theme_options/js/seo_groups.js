jQuery(document).ready(function() {
	jQuery(".add_seo_group").click(function() {
		var group_name = jQuery("#seo_group_name").val();
		jQuery("#seo_group_name").val("");
		var seo_group_id = get_time_miliseconds();
		if (group_name.length > 0) {
			var data = {
				group_name: group_name,
				seo_group_id: seo_group_id,
				action: "add_seo_group"
			};
			jQuery.post(ajaxurl, data, function(response) {
				response = jQuery.parseJSON(response);
				jQuery(".seo_groups_list .js_no_one_item_else").remove();
				jQuery("#seo_groups_list").append("<li style='display:none;' id='seo_group_" + seo_group_id + "'>" + response['html'] + "</li>");
				//***
				jQuery(".seo_groups_list").append('<li><a data-id="seo_group_' + seo_group_id + '" class="js_edit_seo_group" href="#">' + group_name + '</a><input type="hidden" value="' + group_name + '" name="seo_group[' + seo_group_id + '][name]"><a href="#" title="' + tmm_l10n.lang_delete + '" class="remove js_remove_seo_group" data-id="seo_group_' + seo_group_id + '"></a><a data-id="seo_group_' + seo_group_id + '" href="#" title="' + tmm_l10n.lang_edit + '" class="edit js_edit_seo_group"></a></li>');
				jQuery(".seo_groups_list").sortable();
			});
		}
	});


	jQuery(document.body).on('click', '.js_edit_seo_group', function() {
		var id = jQuery(this).data('id');
		jQuery('#js_seo_groups_panel').animate({
			opacity: 0,
			height: "toggle"
		}, 777, function() {
			jQuery('#' + id).fadeIn(555);
		});
	});


	jQuery(document.body).on('click', '.js_back_to_seo_list', function() {
		jQuery(this).parent('li').animate({
			opacity: 0,
			height: "toggle"
		}, 777, function() {
			jQuery(this).css('opacity', 100);
			jQuery('#js_seo_groups_panel').css('opacity', 100).show(333);
		});
	});



	jQuery(document.body).on('click', '.js_remove_seo_group', function() {
		var id = jQuery(this).data('id');
		jQuery(this).parent().hide(hide_delay, function() {
			jQuery(this).remove();
			jQuery("#" + id).remove();
		});
		return false;
	});


	//***************************************************************************************

	var stop_add_new_cat = false;
	jQuery(document.body).on('click', '.add_seo_group_category', function() {
		if (stop_add_new_cat) {
			return;
		}
		stop_add_new_cat = true;
		var self = this;
		var group_id = jQuery(self).attr("group-id");
		var data = {
			group_id: group_id,
			cat_id: jQuery("#" + group_id).find(".tmk_row").length + 1,
			action: "add_seo_group_category"
		};
		jQuery.post(ajaxurl, data, function(html) {
			jQuery(self).parent().append(html);
			stop_add_new_cat = false;
		});
	});

	//for categories
	jQuery(document.body).on('click', '.remove_seo_group_category', function() {
		jQuery(this).parents(".tmk_row").hide(hide_delay, function() {
			jQuery(this).remove();
		});
	});

});