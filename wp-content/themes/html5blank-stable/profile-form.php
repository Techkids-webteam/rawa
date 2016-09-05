<?php
/*
If you would like to edit this file, copy it to your current theme's directory and edit it there.
Theme My Login will always look in your theme's directory first, before using this default template.
*/
?>
<div class="tml tml-profile" id="theme-my-login<?php $template->the_instance(); ?>">
	<?php $template->the_action_template_message( 'profile' ); ?>
	<?php $template->the_errors(); ?>
	<form id="your-profile" action="<?php $template->the_action_url( 'profile', 'login_post' ); ?>" method="post">
		<?php wp_nonce_field( 'update-user_' . $current_user->ID ); ?>
		<p>
			<input type="hidden" name="from" value="profile" />
			<input type="hidden" name="checkuser_id" value="<?php echo $current_user->ID; ?>" />
		</p>
		<div class="row">
			<div class="col-sm-4">
				<div class="form-group">
					<label for="user_login">Mã số sinh viên</label>
					<input type="text" name="user_login" id="user_login" value="<?php echo esc_attr( $profileuser->user_login ); ?>" disabled="disabled" class="regular-text form-control" />
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="nickname">Họ và Tên<i class="required-marker"></i></label>
					<input type="text" name="nickname" id="nickname" value="<?php echo esc_attr( $profileuser->nickname ); ?>" class="regular-text form-control" />
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="nickname">Email<i class="required-marker"></i></label>
					<input type="text" name="email" id="email" value="<?php echo esc_attr( $profileuser->user_email ); ?>" class="regular-text form-control" />
					<?php
					$new_email = get_option( $current_user->ID . '_new_email' );
					if ( $new_email && $new_email['newemail'] != $current_user->user_email ) : ?>
					<p class="help-block">
					<?php
						printf(
							__( 'Tài khoản của bạn đang chờ thay đổi sang địa chỉ email mới %1$s. <a href="%2$s">Hủy thay đổi</a>', 'theme-my-login' ),
							'<code>' . $new_email['newemail'] . '</code>',
							esc_url( self_admin_url( 'profile.php?dismiss=' . $current_user->ID . '_new_email' ) )
					); ?>
					</p>
					<?php endif; ?>
				</div>
			</div>
		</div>

		<div class="form-group">
			<label for="description">Thành tích</label>
			<textarea class="form-control" name="description" id="description" rows="5" cols="30"><?php echo esc_html( $profileuser->description ); ?></textarea>
		</div>

		<?php
		$show_password_fields = apply_filters( 'show_password_fields', true, $profileuser );
		if ( $show_password_fields ) :
		?>
		<?php echo get_avatar( $profileuser->ID, 300); ?>
		<h3>Quản lý tài khoản</h3>
		<table class="tml-form-table">
		<tr id="password" class="user-pass1-wrap">
			<th><label for="pass1">Mật khẩu</label></th>
			<td>
				<input class="hidden" value=" " /><!-- #24364 workaround -->
				<button type="button" class="button button-secondary wp-generate-pw hide-if-no-js">Chọn mật khẩu mới</button>
				<div class="wp-pwd hide-if-js">
					<span class="password-input-wrapper">
						<input type="password" name="pass1" id="pass1" class="regular-text" value="" autocomplete="off" data-pw="<?php echo esc_attr( wp_generate_password( 24 ) ); ?>" aria-describedby="pass-strength-result" />
					</span>
					<div style="display:none" id="pass-strength-result" aria-live="polite"></div>
					<button type="button" class="button button-secondary wp-hide-pw hide-if-no-js" data-toggle="0" aria-label="<?php esc_attr_e( 'Hide password', 'theme-my-login' ); ?>">
						<span class="dashicons dashicons-hidden"></span>
						<span class="text"><?php _e( 'Hide'); ?></span>
					</button>
					<button type="button" class="button button-secondary wp-cancel-pw hide-if-no-js" data-toggle="0" aria-label="<?php esc_attr_e( 'Cancel password change', 'theme-my-login' ); ?>">
						<span class="text"><?php _e( 'Cancel'); ?></span>
					</button>
				</div>
			</td>
		</tr>
		<tr class="user-pass2-wrap hide-if-js">
			<th scope="row"><label for="pass2"><?php _e( 'Repeat New Password' ); ?></label></th>
			<td>
			<input name="pass2" type="password" id="pass2" class="regular-text" value="" autocomplete="off" />
			<p class="description"><?php _e( 'Type your new password again.' ); ?></p>
			</td>
		</tr>
		<tr class="pw-weak">
			<td>
				<label>
					<input type="checkbox" name="pw_weak" class="pw-checkbox" />
					<?php _e( 'Confirm use of weak password'); ?>
				</label>
			</td>
		</tr>
		<?php endif; ?>

		</table>

		<?php do_action( 'show_user_profile', $profileuser ); ?>
		
		<p class="tml-submit-wrap">
			<input type="hidden" name="action" value="profile" />
			<input type="hidden" name="instance" value="<?php $template->the_instance(); ?>" />
			<input type="hidden" name="user_id" id="user_id" value="<?php echo esc_attr( $current_user->ID ); ?>" />
			<input type="submit" class="btn btn-primary" value="Cập nhật hồ sơ" name="submit" id="submit" />
		</p>
	</form>
</div>
