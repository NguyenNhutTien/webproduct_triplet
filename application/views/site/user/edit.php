
<div class="box-center">
	<!-- The box-center product-->
	<div>
		<h2>Chỉnh sửa thông tin thành viên</h2>
	</div>
	<div class="box-content-center product">
		<!-- The box-content-center -->
		<form class="t-form form_action" method="post"
			action="<?php //echo site_url('user/edit')?>"
			enctype="multipart/form-data">
			<div class="form-row">
				<label for="param_email" class="form-label">Email:</label>
				<div class="form-item">
        							 <?php echo $user['email']?>
        						</div>
				<div class="clear"></div>
			</div>

			<div class="form-row">
				<label for="param_password" class="form-label">Mật khẩu:</label>
				<div class="form-item">
					<input type="password" class="input" id="password" name="password" placeholder="Nhập mật khẩu của bạn">				
					<div class="clear"></div>					
					<div class="error" id="password_error"><?php echo  (isset($error_password))? $error_password  : ''?></div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="form-row">
				<label for="param_new_password" class="form-label">Nhập mật khẩu mới:</label>
				<div class="form-item">
					<input type="password" class="input" id="new_password" name="new_password">
					<div class="clear"></div>
					<div class="error" id="new_password_error"><?php echo (isset($error_new_password))? $error_new_password  : ''?></div>
				</div>
				<div class="clear"></div>
			</div>
			
			<div class="form-row">
				<label for="param_re_password" class="form-label">Gõ lại mật khẩu:</label>
				<div class="form-item">
					<input type="password" class="input" id="re_password"
						name="re_password">
					<div class="clear"></div>
					<div class="error" id="re_password_error"><?php echo (isset($error_re_password))? $error_re_password  : ''?></div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="form-row">
				<label for="param_name" class="form-label">Họ và tên:<span
					class="req">*</span></label>
				<div class="form-item">
					<input type="text" class="input" id="name" name="name"
						value="<?php echo $user['name']?>">
					<div class="clear"></div>
					<div class="error" id="name_error"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="form-row">
				<label for="param_phone" class="form-label">Số điện thoại:<span
					class="req">*</span></label>
				<div class="form-item">
					<input type="text" class="input" id="phone" name="phone"
						value="<?php echo $user['phone']?>">
					<div class="clear"></div>
					<div class="error" id="phone_error"></div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="form-row">
				<label for="param_address" class="form-label">Địa chỉ:<span
					class="req">*</span></label>
				<div class="form-item">
					<textarea class="input" id="address" name="address"><?php echo $user['address']?></textarea>
					<div class="clear"></div>
					<div class="error" id="address_error"></div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="form-row">
				<label class="form-label">&nbsp;</label>
				<div class="form-item">
					<input type="submit" class="button" value="Chỉnh sửa thông tin"
						name="submit">
				</div>
			</div>
		</form>
		<div class="clear"></div>
	</div>
	<!-- End box-content-center -->

</div>

