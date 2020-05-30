
<div class="box-center">
	<!-- The box-center product-->
	<div>
		<h1>Thành viên đăng nhập</h1>
	</div>
	<div class="box-content-center product">
		<!-- The box-content-center -->
		<form class="t-form form_action" method="post" action="<?php echo base_url('user/login') ?>"
			enctype="multipart/form-data">
			<h3 style="color: red"></h3>
			<div class="form-row">
				<label for="param_email" class="form-label">Email:<span class="req">*</span></label>
				<div class="form-item">
					<input type="text" class="input" id="email" name="email" >
					<div class="clear"></div>
					<div class="error" id="email_error"><?php echo (isset($error_email))? $error_email:''?></div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="form-row">
				<label for="param_password" class="form-label">Mật khẩu:<span
					class="req">*</span></label>
				<div class="form-item">
					<input type="password" class="input" id="password" name="password">
					<div class="clear"></div>
					<div class="error" id="password_error"><?php echo (isset($error_password))? $error_password:''?></div>
					<div class="error" id="login_error"><?php echo (isset($error_login))? $error_login:''?></div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="form-row">
				<label class="form-label">&nbsp;</label>
				<div class="form-item">
					<input type="submit" class="button" value="Đăng nhập" name="submit">
				</div>
			</div>
		</form>
		<div class="clear"></div>
	</div>
	<!-- End box-content-center -->

</div>
