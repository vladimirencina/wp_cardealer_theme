var THEMEMAKERS_APP_AUTHENTICATION = function () {
	var self = {
		init: function () {

			var hiddenPanel = jQuery('.register-hidden-panel'),
				is_hidden_panel_active = false;

			//*****

			jQuery(document.body).on('click', '#user_logout_button', function () {
				var data = {
					action: "app_authentication_user_logout"
				};
				//send data to server
				jQuery.post(ajaxurl, data, function (response) {
					window.location.reload();
				});

				return false;
			});

			jQuery(document.body).on('click', '#user_login_button', function () {
				self.login();
				return false;
			});

			if (jQuery('#tmm_user_pass').length && jQuery('#tmm_user_login').length) {
				jQuery('#tmm_user_pass').add('#tmm_user_login').on('focus', function () {
					jQuery(window).on('keyup', function (e) {
						e.preventDefault();
						if (e.keyCode === 13) {
							self.login();
						}
					});
				});
			}

			jQuery(document.body).on('click', '#user_register_button', function () {

				if (is_hidden_panel_active === true) {
					hiddenPanel.delay(350).animate({
						marginTop: '0'
					}, 450);
					is_hidden_panel_active = false;
					return false;
				}

				var user_name = jQuery("#user_name").val();
				var user_email = jQuery("#user_email").val();

				if (user_name == "" || user_email == "") {
					alert(tmm_l10n.empty_fields);
					return false;
				}

				var data = {
					action: "app_authentication_user_register",
					user_name: user_name,
					user_email: user_email
				};

				//send data to server
				jQuery.post(ajaxurl, data, function (response) {

					var userEntry = jQuery('.register-user-entry');
					userEntry.height(userEntry.height());

					if (response == 0) {
						response = tmm_l10n.server_error;
					}

					jQuery('.error-register').html(response);
					jQuery('.error-register').slideDown(400);

					is_hidden_panel_active = true;

				});

				return false;
			});

			// User register form
			jQuery("#user_register_form").on('submit', function (e) {
				e.preventDefault();

				var form = jQuery(this),
					submit = jQuery("#user_register_button2"),
					preloader = submit.next('.preloader'),
					message = form.find('.info-box'),
					user_name = jQuery("#user_name2").val(),
					user_email = jQuery("#user_email2").val();

				// disable button onsubmit to avoid double submision
				submit.attr("disabled", "disabled").addClass('disabled');

				// Display our pre-loading
				preloader.css({'visibility':'visible'});

				var data = {
					action: "app_authentication_user_register",
					user_name: user_name,
					user_email: user_email
				};

				jQuery.ajax({
					url: ajaxurl,
					type: "post",
					data: data
				}).done(function(response) {
					message.html(response).addClass('info');
					form.trigger("reset");
					submit.removeAttr("disabled").removeClass('disabled');
					preloader.css({'visibility':'hidden'});
				}).fail(function(jqXHR, textStatus) {
					console.log( "Request failed: " + textStatus );
				});

				return false;
			});

			// Lost password form
			var lostpasswordform = jQuery('#lostpasswordform');

			if (lostpasswordform.length && jQuery('#user_login').length) {

				lostpasswordform.on('submit', function (e) {
					e.preventDefault();

					var user_login = jQuery("#user_login").val(),
						submit = jQuery("#lostPassBtn"),
						preloader = submit.next('.preloader'),
						message = lostpasswordform.find('.info-box'),
						active = lostpasswordform.data('active');

					// disable button onsubmit to avoid double submision
					submit.attr("disabled", "disabled").addClass('disabled');

					// Display our pre-loading
					preloader.css({'visibility':'visible'});

					if (active) {
						return false;
					}

					lostpasswordform.data('active', true);

					if (!user_login) {
						message.html(tmm_l10n.auth_enter_username).addClass('error');
						lostpasswordform.data('active', false);
						submit.removeAttr("disabled").removeClass('disabled');
						preloader.css({'visibility':'hidden'});
						lostpasswordform.trigger("reset");
						return false;
					}

					var data = {
						action: "tmm_auth_lostpass",
						user_login: user_login
					};

					jQuery.ajax({
						url: ajaxurl,
						type: "post",
						data: data
					}).done(function(response) {
						message.html(tmm_l10n.auth_lostpass_email_sent).addClass('success');
						lostpasswordform.trigger("reset");
						submit.removeAttr("disabled").removeClass('disabled');
						preloader.css({'visibility':'hidden'});
					}).fail(function(jqXHR, textStatus) {
						message.html(textStatus).addClass('error');
						console.log( "Request failed: " + textStatus );
						return false;
					});

					return false;
				});

			}


		},
		login: function () {

			var user_login = jQuery("#tmm_user_login").val();
			var user_pass = jQuery("#tmm_user_pass").val();


			if (user_login == "" || user_pass == "") {
				jQuery(".error-login").slideDown(400);
				return false;
			}


			var data = {
				action: "app_authentication_user_login",
				user_login: user_login,
				user_pass: user_pass
			};

			//send data to server
			jQuery.post(ajaxurl, data, function (response) {
				if (parseInt(response, 10) == 1) {
					window.location.reload();
				} else {
					jQuery(".error-login").slideDown(400);
				}
			});

			return false;
		}
	};

	return self;
};
//*****

var thememakers_app_authentication = null;
jQuery(document).ready(function () {
	thememakers_app_authentication = new THEMEMAKERS_APP_AUTHENTICATION();
	thememakers_app_authentication.init();
});
