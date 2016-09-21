<div class="tml-profile" id="theme-my-login<?php $template->the_instance(); ?>">
	<form id="your-profile" class="form-horizontal" action="<?php $template->the_action_url( 'profile', 'login_post' ); ?>" method="post">
		<?php wp_nonce_field( 'update-user_' . $current_user->ID ); ?>
		<p>
			<input type="hidden" name="from" value="profile" />
			<input type="hidden" name="checkuser_id" value="<?php echo $current_user->ID; ?>" />
		</p>
		<div class="row">
			<div class="col-sm-8">
				<div class="profile_block">
					<h1 class="profile_title">HỒ SƠ</h1>
					<div class="profile_content_wrapper">
						<?php $template->the_action_template_message( 'profile' ); ?>
						<?php $template->the_errors(); ?>
						<div class="form-group">
					    <label class="col-md-3 col-sm-4 control-label">Mã sinh viên</label>
					    <div class="col-md-9 col-sm-8">
					      <p class="form-control-static"><?php echo esc_attr( $profileuser->user_login ); ?></p>
					    </div>
					  </div>
						<div class="form-group">
					    <label for="nickname" class="col-md-3 col-sm-4 control-label">Họ và Tên<i class="required-marker"></i></label>
					    <div class="col-md-9 col-sm-8">
					      <input type="text" name="nickname" id="nickname" value="<?php echo esc_attr( $profileuser->nickname ); ?>" class="form-control" />
					    </div>
					  </div>
						<div class="form-group">
					    <label for="email" class="col-md-3 col-sm-4 control-label">Email<i class="required-marker"></i></label>
					    <div class="col-md-9 col-sm-8">
					      <input type="text" name="email" id="email" value="<?php echo esc_attr( $profileuser->user_email ); ?>" class="form-control" />
								<?php
								$new_email = get_option( $current_user->ID . '_new_email' );
								if ( $new_email && $new_email['newemail'] != $current_user->user_email ) : ?>
								<p class="help-block">
								<?php
									printf(
										__( 'Tài khoản của bạn đang chờ thay đổi sang địa chỉ email mới %1$s. <a href="%2$s">Hủy thay đổi</a>', 'theme-my-login' ),
										'<code>' . $new_email['newemail'] . '</code>',
										esc_url( self_admin_url( 'profile.php?dismiss=' . $current_user->ID . '_new_email' ) )
								);
								?>
								</p>
								<?php endif; ?>

								<?php
								if (in_array( 'pending', (array) $current_user->roles ))  : ?>
								<p class="help-block bg-error">
								<?php
									printf(
									__( '<span class="glyphicon glyphicon-alert" aria-hidden="true"> Tài khoản của bạn chưa xác nhận địa chỉ email. <a href="%s">Gửi lại thư kích hoạt</a>?', 'theme-my-login' ),
									Theme_My_Login::get_page_link( 'login', array( 'action' => 'sendactivation', 'login' => $current_user->user_login ) )
								);
								?>
								</p>
								<?php endif; ?>
					    </div>
					  </div>
						<?php if(!in_array( 'pending', (array) $current_user->roles ) 
								&& !in_array( 'administrator', (array) $current_user->roles ))  : ?>
							<hr>
							<div class="form-group">
								<label for="description" class="col-md-3 col-sm-4 control-label">Giới thiệu bản thân</label>
								<div class="col-md-9 col-sm-8">
									<textarea class="form-control" name="description" id="description" rows="5" cols="30"><?php echo esc_html( get_user_meta($profileuser->ID, 'description', true) ); ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="description" class="col-md-3 col-sm-4 control-label">Thành tích ngoài trường</label>
								<div class="col-md-9 col-sm-8">
									<textarea class="form-control" name="achievements" id="description" rows="5" cols="30"><?php echo esc_html( get_user_meta($profileuser->ID, 'achievements', true) ); ?></textarea>
									<?php if(get_user_meta($profileuser->ID, 'need_approval', true) == true) : ?>
										<p class="bg-warning"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Thành tích của bạn đang trong quá trình chờ xét duyệt.</p>
									<?php endif; ?>
								</div>
							</div>
						<?php endif; ?>
						<div class="form-group">
							<p class="tml-submit-wrap col-md-9 col-md-offset-3 col-sm-8 col-sm-offset-4">
								<input type="hidden" name="action" value="profile" />
								<input type="hidden" name="instance" value="<?php $template->the_instance(); ?>" />
								<input type="hidden" name="user_id" id="user_id" value="<?php echo esc_attr( $current_user->ID ); ?>" />
								<input type="submit" class="btn btn-default" value="Lưu" name="submit" id="submit" />
								<input type="submit" class="btn btn-primary" value="Lưu và gửi BQT" name="submit" id="submit" />
							</p>
						</div>

						<hr>
						<div>
							<a class="btn btn-danger" href="<?php echo wp_logout_url(); ?> ">Đăng xuất</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="profile_block">
					<div class="profile_content_wrapper row">
						<div class="col-lg-6">
							<?php do_action( 'show_user_profile', $profileuser ); ?>
						</div>
						<div class="col-lg-6">
							<?php
								$show_password_fields = apply_filters( 'show_password_fields', true, $profileuser );
								if ($show_password_fields) :
							?>
							<table class="tml-form-table">
							<tr id="password" class="user-pass1-wrap">
								<th><label for="pass1">Mật khẩu</label></th>
								<td>
									<input class="hidden" value=" " /><!-- #24364 workaround -->
									<button type="button" class="btn btn-default wp-generate-pw hide-if-no-js">Đổi mật khẩu</button>
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
							</table>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	<p></p>
</div>
