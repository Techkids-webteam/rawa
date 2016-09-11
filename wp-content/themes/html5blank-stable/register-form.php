<div class="tml-register" id="theme-my-login<?php $template->the_instance(); ?>">
	<?php $template->the_errors(); ?>

	<form name="registerform" id="registerform<?php $template->the_instance(); ?>" action="<?php $template->the_action_url( 'register', 'login_post' ); ?>" method="post">
		<div class="form-group">
			<label for="nickname<?php $template->the_instance(); ?>">Họ và tên</label>
			<input type="text" class="form-control" name="nickname" id="nickname<?php $template->the_instance(); ?>" value="<?php $template->the_posted_value( 'nickname' ); ?>">
		</div>
		<div class="form-group">
			<select class="form-control" required="" name="student_year" id="student_year<?php $template->the_instance(); ?>">
	      <option value="">Khóa học</option>
	      <option value="155D">53</option>
	      <option value="145D">52</option>
	      <option value="135D">51</option>
	      <option value="125D">50</option>
	    </select>
		</div>
		<div class="form-group">
			<select class="form-control" required="" name="khoa" id="khoa<?php $template->the_instance(); ?>">
		      <option value="">Chọn khoa</option>
		      <option value="340201">Tài chính &ndash; Ngân hàng</option>
		      <option value="340301">Kế toán</option>
		      <option value="340101">Quản trị kinh doanh </option>
		      <option value="340405">Hệ thống thông tin quản lý</option>
		      <option value="310101">Kinh tế</option>
		      <option value="220201">Ngôn ngữ Anh</option>
		    </select>
		</div>
		<div class="form-group">
			<label for="sid">4 SỐ CUỐI MSV</label>
			<input type="text" class="form-control" name="sid" id="sid" value="<?php $template->the_posted_value( 'sid' ); ?>">
		</div>
		<div class="form-group tml-user-email-wrap">
			<label for="email<?php $template->the_instance(); ?>">Email</label>
			<input type="email" class="form-control" name="user_email" id="user_email<?php $template->the_instance(); ?>" value="<?php $template->the_posted_value( 'user_email' ); ?>">
		</div>

		<?php do_action( 'register_form' ); ?>

		<p class="tml-registration-confirmation" id="reg_passmail<?php $template->the_instance(); ?>"><?php echo apply_filters( 'tml_register_passmail_template_message', __( 'Registration confirmation will be e-mailed to you.', 'theme-my-login' ) ); ?></p>

		<p class="tml-submit-wrap text-center">
			<input type="submit" class="form_button" name="wp-submit" id="wp-submit<?php $template->the_instance(); ?>" value="<?php esc_attr_e( 'Register', 'theme-my-login' ); ?>" />
			<input type="hidden" name="redirect_to" value="<?php $template->the_redirect_url( 'register' ); ?>" />
			<input type="hidden" name="instance" value="<?php $template->the_instance(); ?>" />
			<input type="hidden" name="action" value="register" />
		</p>
	</form>
	<?php $template->the_action_links( array( 'register' => false ) ); ?>
</div>
