<div class="tml-login" id="theme-my-login<?php $template->the_instance(); ?>">
	<?php $template->the_action_template_message( 'login' ); ?>
	<?php $template->the_errors(); ?>
	<form name="loginform" id="loginform<?php $template->the_instance(); ?>" action="<?php $template->the_action_url( 'login', 'login_post' ); ?>" method="post">
		<div class="tml-user-login-wrap form-group">
			<label for="user_login<?php $template->the_instance(); ?>"><?php
				if ( 'username' == $theme_my_login->get_option( 'login_type' ) ) {
					_e( 'Username');
				} elseif ( 'email' == $theme_my_login->get_option( 'login_type' ) ) {
					_e( 'E-mail');
				} else {
					_e( 'Username or E-mail', 'theme-my-login');
				}
			?></label>
			<input type="text" name="log" id="user_login<?php $template->the_instance(); ?>" class="input form-control" value="<?php $template->the_posted_value( 'log' ); ?>" size="20" />
		</div>

		<div class="tml-user-pass-wrap form-group">
			<label for="user_pass<?php $template->the_instance(); ?>"><?php _e( 'Password'); ?></label>
			<input type="password" name="pwd" id="user_pass<?php $template->the_instance(); ?>" class="input form-control" value="" size="20" autocomplete="off" />
		</div>

		<?php do_action( 'login_form' ); ?>

		<div class="form-group">
				<input name="rememberme" type="checkbox" id="rememberme<?php $template->the_instance(); ?>" value="forever" />
				<label for="rememberme<?php $template->the_instance(); ?>"><?php esc_attr_e( 'Remember Me'); ?></label>
		</div>
		<p class="text-center">
			<input type="submit" name="wp-submit" class="form_button" id="wp-submit<?php $template->the_instance(); ?>" value="<?php esc_attr_e( 'Log In'); ?>" />
			<input type="hidden" name="redirect_to" value="<?php $template->the_redirect_url( 'login' ); ?>" />
			<input type="hidden" name="instance" value="<?php $template->the_instance(); ?>" />
			<input type="hidden" name="action" value="login" />
		</p>

	</form>
	<?php $template->the_action_links( array( 'login' => false ) ); ?>
</div>
