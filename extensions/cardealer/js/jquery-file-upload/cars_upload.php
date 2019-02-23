<?php if ( !defined('ABSPATH') ) exit;

$car_cover_image_info = pathinfo($car_cover_image);

global $user_ID;
$user_file_space_info = TMM_Ext_PostType_Car::get_user_file_space($user_ID);
$user_file_space = (int) $user_file_space_info['user_file_space'];
$user_file_space_left = $user_file_space_info['size_left'] > 0 ? (int) $user_file_space_info['size_left'] : 0;
$user_file_max_space = (int) $user_file_space_info['user_file_max_space'];
$is_admin = current_user_can('manage_options') ? 1 : 0;
$acceptable_file_ext = TMM::get_option('file_ext', TMM_APP_CARDEALER_PREFIX);
$user_file_ext = array();

if(is_array($acceptable_file_ext)){
	foreach($acceptable_file_ext as $k => $v){
		if($v == 1 && $k != 'gif'){
			$user_file_ext[] = $k;
		}
	}
}

$no_free_space = ($user_file_space >= $user_file_max_space && !$is_admin && !$is_new_car) ? true : false;
$upgrade_status_page = TMM_Helper::get_permalink_by_lang( TMM::get_option('upgrade_status_page', TMM_APP_CARDEALER_PREFIX) );
$upgrade_status_page_link = 'upgrade';
if($upgrade_status_page !== ''){
	$upgrade_status_page_link = '<a href="' . $upgrade_status_page . '" target="_top">' . esc_html__('upgrade', 'cardealer') . '</a>';
}
?>

<noscript><link rel="stylesheet" href="<?php echo TMM_EXT_URI . '/cardealer/js/jquery-file-upload/'; ?>css/jquery.fileupload-noscript.css"></noscript>
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
<!--[if (gte IE 8)&(lt IE 10)]>
<script src="<?php echo TMM_EXT_URI . '/cardealer/js/jquery-file-upload/'; ?>js/cors/jquery.xdr-transport.js"></script>
<![endif]-->

<div class="ad edit-form">

	<div class="edit-form__title">
		<h3><?php esc_html_e('Edit Vehicle Pictures', 'cardealer'); ?></h3>
	</div><!-- .edit-form__title -->

	<div class="edit-form__entry">

		<div id="tmm_fileupload" class="tmm-fileupload">

			<p>
				<?php if ( ! current_user_can( 'manage_options' ) ) {	echo __( 'Your file space (now/max)', 'cardealer' ) . ': '; ?>
					<span id="user_file_space"<?php if ( $user_file_space >= $user_file_max_space ): ?> class="error"<?php endif; ?>>
						<?php echo size_format( wp_convert_hr_to_bytes( $user_file_space ), 2 ); ?>
					</span> /
					<span id="user_file_max_space">
						<?php echo size_format( wp_convert_hr_to_bytes( $user_file_max_space ), 2 ) . '. &nbsp;'; ?>
					</span>
					<?php
				}
				if ( ! empty( $user_file_ext ) ) {
					echo ' ' . __( 'Acceptable image extensions', 'cardealer' ) . ': ' . implode( ', ', $user_file_ext );
				}
				?>
			</p>

			<p class="free_space_error" <?php if ( ! $no_free_space ) { echo 'style="display:none"'; } ?>>
				<?php _e( 'Oops! It seems you have reached your image storage maximum limit. Please try uploading image in lower quality or ' . $upgrade_status_page_link . ' your account to improve  your storage limit.', 'cardealer' ); ?>
			</p>

			<div class="row fileupload-buttonbar"<?php if ( $no_free_space ) { echo ' style="display:none"'; } ?>>
				<div class="col-lg-6 col-md-6">
					<!-- The fileinput-button span is used to style the file input field as button -->
	                <span class="button orange btn btn-success fileinput-button">
	                    <i class="fa icon-plus-squared"></i>
	                    <span><?php esc_html_e('Add files...', 'cardealer'); ?></span>
	                    <input type="file" name="files[]" multiple>
	                </span>

					<button type="submit" class="button orange btn btn-primary start">
						<i class="fa icon-upload"></i>
						<span><?php esc_html_e('Upload all', 'cardealer'); ?></span>
					</button>

					<button type="reset" class="button orange btn btn-warning cancel">
						<i class="fa icon-minus-squared"></i>
						<span><?php esc_html_e('Cancel upload', 'cardealer'); ?></span>
					</button>

					<!-- The global file processing state -->
					<span class="fileupload-process"></span>
				</div>
				<!-- The global progress state -->
				<div class="col-lg-6 col-md-6 fileupload-progress fade">
					<!-- The global progress bar -->
					<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
						<div class="progress-bar progress-bar-success" style="width:0%;"></div>
					</div>
					<!-- The extended global progress state -->
					<div class="progress-extended">&nbsp;</div>
				</div>
			</div>

			<!-- The table listing the files available for upload/download -->
			<table role="presentation" class="table table-striped fileupload_presentation"><tbody class="files"></tbody></table>

		</div>

	</div><!-- .edit-form__entry -->

</div><!-- .edit-form -->

<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
	{% for (var i=0, file; file=o.files[i]; i++) { %}
	<tr class="template-upload fade">
		<td>
	        <span class="preview"></span>
		</td>
		<td>
	        <p class="name"></p>
	        <strong class="error-msg text-danger"></strong>
		</td>
		<td>
	        <p class="size"><?php esc_html_e('Processing...', 'cardealer'); ?></p>
	        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
		</td>
		<td>
		    {% if (!i && !o.options.autoUpload) { %}
			<button class="btn btn-primary start">
				<i class="fa icon-upload"></i>
				<?php esc_html_e('Upload', 'cardealer'); ?>
			</button>
		    {% } %}
		    {% if (!i) { %}
			<button class="btn btn-warning cancel">
                <i class="fa icon-minus-squared"></i>
                <span><?php esc_html_e('Cancel', 'cardealer'); ?></span>
            </button>
		    {% } %}
		</td>
	</tr>
	{% } %}
</script>

<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
	{% for (var i=0, file; file=o.files[i]; i++) { %}
    {% if(i==0 && o.files.length > 0){ %}
    <tr>
        <td></td>
        <td>{% if (!file.error) { %}<span class="set_main_image"><?php esc_html_e('Set main image', 'cardealer'); ?></span>{% } %}</td>
        <td></td>
        <td></td>
    </tr>
    {% } %}
	<tr class="template-download fade">
		<td>
		    <span class="preview">
			{% if (file.thumbnailUrl) { %}
				<img src="{%=file.thumbnailUrl%}" alt="" />
			{% } %}
		    </span>
		</td>
		<td>
		    <p class="name">
				<?php if($is_new_car == 0){ ?>
					<input {% if(file.thumbnailUrl == "<?php echo $car_cover_image_info['basename']; ?>"){ %} checked="checked" {% } %} type="radio" onclick="set_car_cover('{%=file.name%}')" name="car_cover_image" class="car_cover_image" value="{%=file.name%}" />
				<?php }else{ ?>
					<input type="radio" name="car_cover_image" class="car_cover_image" value="{%=file.name%}" />
				<?php } ?>
				<label>{%=file.name%}</label>
			</p>
		    {% if (file.error) { %}
				<div><span class="label label-danger"><?php esc_html_e('Error', 'cardealer'); ?></span> {%=file.error%}</div>
		    {% } %}
		</td>
		<td>
	        <span class="size">{%=o.formatFileSize(file.size)%}</span>
		</td>
		<td>
			{% if (file.deleteUrl) { %}
		        <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
		            <i class="fa icon-trash"></i>
		            <span><?php esc_html_e('Remove', 'cardealer'); ?></span>
	            </button>
            {% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="fa icon-minus-squared"></i>
                    <span><?php esc_html_e('Cancel', 'cardealer'); ?></span>
                </button>
            {% } %}
		</td>
	</tr>
	{% } %}
</script>

<script type="text/javascript">

	function set_car_cover(image_name) {

		var data = {
			action: "app_cardealer_set_car_cover_image",
			post_id: '<?php echo $photo_set_hash; ?>',//can set this only while car editing
			image_name: image_name
		};
		jQuery.post(ajaxurl, data);

	}

	(function ($) {

		$(function () {
			var counter = 0;
			window.uniqueId = function () {
				return 'id-0' + counter++;
			};
		});

		$(function () {

			var acceptFileTypes = /(\.|\/)(<?php echo implode( '|', $user_file_ext ); ?>)$/i;
			var maxFileSpace = parseInt(<?php echo( $user_file_space_left ); ?>);
			var is_admin = parseInt(<?php echo( $is_admin ); ?>);

			/* Initialize the jQuery File Upload widget */
			$('.tmm-fileupload').fileupload({
				//xhrFields: {withCredentials: true}, // Uncomment the following to send cross-domain cookies:
				url: ajaxurl + "?action=app_cardealer_upload_car_image&photo_set_hash=<?php echo $photo_set_hash; ?>&is_new_car=<?php echo $is_new_car; ?>",
				basic: true,
				formData: function (form) {
					return form;
				},
				singleFileUploads: true, // By default, each file of a selection is uploaded using an individual request for XHR type uploads. Set to false to upload file selections in one request each:
				limitMultiFileUploads: 1, // To limit the number of files uploaded with one XHR request, set the following option to an integer greater than 0:
				sequentialUploads: true, // Set the following option to true to issue all file upload requests in a sequential order:
				acceptFileTypes: acceptFileTypes,
				maxFileSize: maxFileSpace,
				messages: {
					maxNumberOfFiles: '<?php echo esc_js( __( "Maximum number of files exceeded", 'cardealer' ) ); ?>',
					acceptFileTypes: '<?php echo esc_js( __( "File type not allowed", 'cardealer' ) ); ?>',
					maxFileSize: '<?php echo esc_js( __( "File is too large", 'cardealer' ) ); ?>',
					minFileSize: '<?php echo esc_js( __( "File is too small", 'cardealer' ) ); ?>',
					uploadedBytes: '<?php echo esc_js( __( "Uploaded bytes exceed file size", 'cardealer' ) ); ?>'
				}
			}).on("fileuploaddestroy", function (e, data) {
				$.ajax({
					url: $('.tmm-fileupload').fileupload('option', 'url') + '&get_user_info=filespace',
					dataType: 'json'
				}).done(function (data) {
					if (!is_admin) {
						maxFileSpace = parseInt(data.size_left);
						var user_file_space = parseInt(data.user_file_space) / 1000000;
						user_file_space = user_file_space.toFixed(2);
						$('#user_file_space').text(user_file_space);
						if (user_file_space < maxFileSpace) {
							$('#user_file_space').removeClass('error');
							$('.fileupload-buttonbar').show();
							$('.free_space_error').hide();
						}
						$('.tmm-fileupload').fileupload('option', {maxFileSize: maxFileSpace});
					}
				});
			}).on("fileuploadsend", function (e, data) {
				var type = data.files[0].type.toLowerCase(),
					size = data.files[0].size;
				if (acceptFileTypes.test(type) == false) {
					return false;
				}
				if (!is_admin && size > maxFileSpace) {
					return false;
				}
			}).on("fileuploadsubmit", function (e, data) {
				var type = data.files[0].type.toLowerCase(),
					size = data.files[0].size;
				if (acceptFileTypes.test(type) == false) {
					return false;
				}
				if (!is_admin && size > maxFileSpace) {
					return false;
				}
			}).on("fileuploaddone", function (e, data) {
				if (!is_admin) {
					maxFileSpace = parseInt(data._response.result.user_file_space.size_left);
					var user_file_space = parseInt(data._response.result.user_file_space.user_file_space) / 1000000;
					user_file_space = user_file_space.toFixed(2);
					$('#user_file_space').text(user_file_space);
					if (user_file_space > maxFileSpace) {
						$('#user_file_space').addClass('error');
						$('.fileupload-buttonbar').hide();
						$('.free_space_error').show();
					}
					$(this).fileupload('option', {maxFileSize: maxFileSpace});
				}
				$(".fileupload_presentation tr").remove();
				$(this).fileupload('option', 'done').call(this, $.Event('done'), {result: data._response.result});
				$('input:radio[value="<?php echo basename( $car_cover_image ) ?>"]').prop('checked', true);

				// Set unique id's per each radio button
				$('.template-download').each(function (i, e) {
					var name = uniqueId();
					$(e).find(':radio').each(function (j, f) {
						var id = uniqueId();
						$(f).attr('id', id)
							.next()
							.attr('for', id);
					});
				});
			}).addClass('fileupload-processing');

			/* Load existing files */
			$.ajax({
				url: $('.tmm-fileupload').fileupload('option', 'url'),
				dataType: 'json',
				context: $('.tmm-fileupload')[0]
			}).always(function () {
				$(this).removeClass('fileupload-processing');

				// Set unique id's per each radio button
				$('.template-download').each(function (i, e) {
					var name = uniqueId();
					$(e).find(':radio').each(function (j, f) {
						var id = uniqueId();
						$(f).attr('id', id)
							.next()
							.attr('for', id);
					});
				});
			}).done(function (result) {
				$(this).fileupload('option', 'done').call(this, $.Event('done'), {result: result});
				$('input:radio[value="<?php echo basename( $car_cover_image ) ?>"]').prop('checked', true);

				// Set unique id's per each radio button
				$('.template-download').each(function (i, e) {
					var name = uniqueId();
					$(e).find(':radio').each(function (j, f) {
						var id = uniqueId();
						$(f).attr('id', id)
							.next()
							.attr('for', id);
					});
				});
			});

		});
	}(jQuery));

</script>