<?php if ( !defined('ABSPATH') ) exit; ?>
<noscript><link rel="stylesheet" href="<?php echo TMM_EXT_URI . '/cardealer/js/jquery-file-upload/'; ?>css/jquery.fileupload-noscript.css"></noscript>
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
<!--[if (gte IE 8)&(lt IE 10)]>
<script src="<?php echo TMM_EXT_URI . '/cardealer/js/jquery-file-upload/'; ?>js/cors/jquery.xdr-transport.js"></script>
<![endif]-->

<div id="tmm_fileupload" class="tmm-fileupload">

    <div class="row fileupload-buttonbar">
	    <div class="col-md-12">
		    <!-- The fileinput-button span is used to style the file input field as button -->
            <span class="button orange btn btn-success fileinput-button">
	            <i class="fa icon-plus-squared"></i>
		        <span><?php esc_html_e('Browse Logo ...', 'cardealer'); ?></span>
	            <input type="file" name="files[]" />
			</span>
		    <span class="button orange btn btn-primary start">
			    <i class="fa icon-upload"></i>
			    <?php esc_html_e('Upload', 'cardealer'); ?>
		    </span>
		    <!-- The global file processing state -->
		    <span class="fileupload-process"></span>
	    </div>
	    <!-- The global progress state -->
	    <div class="col-md-12 fileupload-progress fade">
		    <!-- The global progress bar -->
		    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
			    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
		    </div>
		    <!-- The extended global progress state -->
		    <div class="progress-extended">&nbsp;</div>
	    </div>
    </div>

    <!-- The table listing the files available for upload/download -->
    <table role="presentation" class="fileupload_presentation">
	    <tbody class="files"></tbody>
    </table>

</div>

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
		</td>
		<td>
			{% if (!i && !o.options.autoUpload) { %}
			<button class="btn btn-primary start" style="display:none!important;">
				<i class="fa icon-upload"></i>
				<?php esc_html_e('Start', 'cardealer'); ?>
			</button>
		    {% } %}
		    {% if (!i) { %}
			<button class="cancel button orange">
				<i class="fa icon-minus-squared"></i>
				<?php esc_html_e('Cancel', 'cardealer'); ?>
			</button>
		    {% } %}
		</td>
	</tr>
	{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
	    <td>
		    <span class="preview">
		    {% if (file.thumbnailUrl) { %}
		    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}" alt=""></a>
		    {% } %}
		    </span>
	    </td>
	    <td>
		    <p class="name"></p>
		    {% if (file.error) { %}
		    <div><span class="error"><?php esc_html_e('Error', 'cardealer'); ?></span> {%=file.error%}</div>
		    {% } %}
	    </td>
	    <td>
	        <span class="size">{%=o.formatFileSize(file.size)%}</span>
	    </td>
	    <td>
	        <button class="delete button orange" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
	            <i class="fa icon-trash"></i>
		        <span><?php esc_html_e('Remove', 'cardealer'); ?></span>
		    </button>
	    </td>
    </tr>
    {% } %}
</script>

<script type="text/javascript">
	(function($) {
		$(function() {

			/* Initialize the jQuery File Upload widget */
			$('.tmm-fileupload').fileupload({
				url: ajaxurl + '?action=app_cardealer_upload_cardealer_logo',
				messages: {
					maxNumberOfFiles: '<?php echo esc_js( esc_html__("Maximum number of files exceeded", 'cardealer') ); ?>',
					acceptFileTypes: '<?php echo esc_js( esc_html__("File type not allowed", 'cardealer') ); ?>',
					maxFileSize: '<?php echo esc_js( esc_html__("File is too large", 'cardealer') ); ?>',
					minFileSize: '<?php echo esc_js( esc_html__("File is too small", 'cardealer') ); ?>',
					uploadedBytes: '<?php echo esc_js( esc_html__("Uploaded bytes exceed file size", 'cardealer') ); ?>'
				}
			}).on("fileuploaddone", function(e, data) {
				$(".fileupload_presentation tr").remove();
				$(this).fileupload('option', 'done').call(this, $.Event('done'), {result: data._response.result});
			}).addClass('fileupload-processing');

			/* Load existing files */
			$.ajax({
				url: $('.tmm-fileupload').fileupload('option', 'url'),
				dataType: 'json',
				context: $('.tmm-fileupload')[0]
			}).always(function() {
				$(this).removeClass('fileupload-processing');
			}).done(function(result) {
				$(this).fileupload('option', 'done').call(this, $.Event('done'), {result: result});
			});

		});
	}(jQuery));

</script>
