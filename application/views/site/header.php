<!-- Header -->
<!-- The box-header-->

<link type="text/css" href="<?php echo public_url() ?>js/jquery/autocomplete/css/smoothness/jquery-ui-1.8.16.custom.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo public_url() ?>js/jquery/autocomplete/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript">
	$(function() {
		$("#text-search").autocomplete({
			source: "<?php echo base_url('product/search_name/1') ?>",
		});
	});
</script>

<div class="top">
	<!-- The top -->
	<div id="logo">
		<!-- the logo -->
		<a href="<?php echo base_url() ?>" title="Điện máy triplet"> <img src="<?php echo public_url() ?>site/images/tripletElectronics.png" alt="Học lập trình website với PHP và MYSQL">
		</a>
	</div>
	<!-- End logo -->

	<!--  load gio hàng -->
	<div id="cart_expand" class="cart">
		<a class="cart_link">
			Giỏ hàng <span id="in_cart">
				<?php
				if (isset($_SESSION['user'])) {
					$user_id = $_SESSION['user']['id'];
					if (isset($_SESSION['cart'][$user_id]))
						echo count($_SESSION['cart'][$user_id]);
					else echo "0";
				} else echo "0";
				?>
			</span> sản phẩm
		</a> <img alt="cart bnc" src="<?php echo public_url() ?>site/images/cart.png">
	</div>

	<div id="search">
		<!-- the search -->
		<form method="get" action="<?php echo base_url('product/search_name') ?>">
			<input type="text" id="text-search" name="key-search" placeholder="Tìm kiếm sản phẩm..." aria-haspopup="true" aria-autocomplete="list" role="textbox" autocomplete="on" value="<?php echo isset($keys) ? $keys : '' ?>">
			<input type="submit" id="but" name="but" value="">
		</form>
	</div>
	<!-- End search -->

	<div class="clear"></div>
	<!-- clear float -->

	<!-- Dropdown cart -->
	<div id="id03" class="container_cart">
		<div class="shopping-cart">
			<div class="shopping-cart-header">
				<i class="fa fa-shopping-cart cart-icon"></i><span class="badge  drc_total_items"></span>
				<div class="shopping-cart-total">
					<span class="lighter-text drc_total_amount"></span>
					<span class="main-color-text"></span>
				</div>
			</div>
			<!--end shopping-cart-header -->

			<ul class="shopping-cart-items">
				<!-- info items -->
				
			</ul>
			<a href="<?php echo base_url('cart/index') ?>" class="button visit_cart">Ghé giỏ hàng</a>
			<a class="button checkout_cart">Thanh toán</a>
		</div>
	</div>
	<!--end shopping-cart -->
	<!-- end dropdown cart-->
</div>

<!-- End top -->
<!-- End box-header  -->

<!-- The box-header-->
<script type="text/javascript">
	$(document).ready(function() {
		$('#menu li').click(function() {
			$('#menu li.active').removeClass('active');
			$(this).addClass('active');
		});
	});
</script>
<div id="menu">
	<!-- the menu -->
	<ul class="menu_top">
		<li class="<?php if ($_SESSION['page'] == 'TrangChu') echo 'active' ?> index-li"><a href="<?php echo base_url('home/index') ?>">Trang chủ </a></li>
		<li class="<?php if ($_SESSION['page'] == 'GioiThieu') echo 'active' ?>"><a href="<?php echo base_url('introduce/index') ?>">Giới thiệu</a></li>
		<li class="<?php if ($_SESSION['page'] == 'HuongDan') echo 'active' ?>"><a href="<?php echo base_url('guide/index') ?>">Hướng dẫn</a></li>
		<li class="<?php if ($_SESSION['page'] == 'TinTuc') echo 'active' ?>"><a href="<?php echo base_url('news/index') ?>">Tin tức</a></li>
		<li class="<?php if ($_SESSION['page'] == 'LienHe') echo 'active' ?>"><a href="">Liên hệ</a></li>

		<?php if (!isset($_SESSION['user'])) { ?>
			<li class="<?php if ($_SESSION['page'] == 'DangKy') echo 'active' ?>"><a onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Đăng ký</a></li>
			<li class="<?php if ($_SESSION['page'] == 'DangNhap') echo 'active' ?>"><a onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Đăng nhập</a></li>
		<?php } else { ?>
			<li class="<?php if ($_SESSION['page'] == 'ThanhVien') echo 'active' ?>"><a href="<?php echo base_url('user/index') ?>"><?php echo $_SESSION['user']['name'] ?></a></li>
			<li class="<?php if ($_SESSION['page'] == 'DangXuat') echo 'active' ?>"><a href="<?php echo base_url('user/logout') ?>">Đăng xuất</a></li>
		<?php } ?>

	</ul>
</div>
<!-- End menu -->

<!-- Login -->
<div id="id01" class="login_modal">
	<div class="login">
		<div class="titulo">Thành viên đăng nhập</div>
		<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
		<form id="form_login" action="" method="post" enctype="application/x-www-form-urlencoded">
			<div class="form-row iconBg">
				<label for="param_email" class="form-label">Email:<span class="req">*</span></label>
				<div class="form-item">
					<input type="text" id="email" name="email" required title="Email (bắt buộc)" placeholder="Email" data-icon="U">
					<i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
					<div class="error" id="email_error"></div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="form-row iconBg">
				<label for="param_password" class="form-label">Mật khẩu:<span class="req">*</span></label>
				<div class="form-item">
					<input type="password" id="password" name="password" required title="Mật khẩu (bắt buộc)" placeholder="Mật khẩu" data-icon="x">
					<i class="fa fa-lock fa-lg fa-fw" aria-hidden="true"></i>
					<div class="error" id="password_error"></div>
					<div class="error" id="login_error"></div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="olvido">
				<div class="col"><a onclick="document.getElementById('id02').style.display='block'" title="Đăng ký">Đăng ký</a></div>
				<div class="col"><a onclick="document.getElementById('id04').style.display='block'; grecaptcha.reset();	" title="Quên mật khẩu">Quên mật khẩu?</a></div>
			</div>
			<input type="submit" class="enviar" value="Đăng nhập" name="submit">
		</form>
	</div>
</div>
<!-- End login -->

<!-- Register -->
<div id="id02" class="register_modal">
	<div class="register">
		<div class="titulo">Đăng ký thành viên</div>
		<span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
		<form id="form_register" action="" method="post" enctype="application/x-www-form-urlencoded">
			<div class="register_left">
				<div class="form-row iconBg">
					<label for="param_email" class="form-label">Email:<span class="req">*</span></label>
					<div class="form-item">
						<input type="text" id="email" name="email" required title="Email (bắt buộc)" placeholder="Email" data-icon="U">
						<i class="fa fa-envelope-square fa-lg fa-fw" aria-hidden="true"></i>
						<div class="error" id="email_error"></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="form-row iconBg">
					<label for="param_password" class="form-label">Mật khẩu:<span class="req">*</span></label>
					<div class="form-item">
						<input type="password" id="password" name="password" required title="Mật khẩu (bắt buộc)" placeholder="Mật khẩu" data-icon="x">
						<i class="fa fa-lock fa-lg fa-fw" aria-hidden="true"></i>
						<div class="error" id="password_error"></div>
					</div>
					<div class="clear"></div>
				</div>


				<div class="form-row iconBg">
					<label class="form-label" for="param_re_password">Nhập lại mật khẩu:<span class="req">*</span></label>
					<div class="form-item">
						<input type="password" name="re_password" id="re_password" required title="Nhập lại mật khẩu (bắt buộc)" placeholder="Nhập lại mật khẩu">
						<i class="fa fa-lock fa-lg fa-fw" aria-hidden="true"></i>
						<div id="re_password_error" class="error"></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="form-row iconBg">
					<label class="form-label" for="param_name">Họ và tên:<span class="req">*</span></label>
					<div class="form-item">
						<input type="text" name="name" id="name" required title="Nhập họ và tên (bắt buộc)" placeholder="Họ và tên">
						<i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
						<div id="name_error" class="error"></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="form-row iconBg">
					<label class="form-label" for="param_phone">Số điện thoại:<span class="req">*</span></label>
					<div class="form-item">
						<input type="text" name="phone" id="phone" required title="Nhập số điện thoại (bắt buộc)" placeholder="Số điện thoại">
						<i class="fa fa-phone fa-lg fa-fw" aria-hidden="true"></i>
						<div id="phone_error" class="error"></div>
					</div>
					<div class="clear"></div>
				</div>
			</div>

			<div class="register_right">
				<div class="form-row iconBg">
					<label class="form-label" for="param_address">Địa chỉ:<span class="req">*</span></label>
					<div class="form-item">
						<textarea name="address" id="address" required title="Nhập địa chỉ (bắt buộc)" placeholder="Địa chỉ"></textarea>
						<i class="fa fa-map-marker fa-lg fa-fw" aria-hidden="true"></i>
						<div id="address_error" class="error"></div>
						<div id="register_error" class="error"></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="form-row iconBg">
					<label class="form-label" for="param_city">Thành phố/tỉnh:<span class="req">*</span></label>
					<div class="form-item">
						<select name="cityName" class="cityName" id="">
							<option value="0">--Chọn Tỉnh/Thành phố--</option>
							<?php
							$tinhThanh_model = null;
							require 'application/models/TinhThanh_model.php';
							$tinhThanh_model = new TinhThanh_model();

							$result = $tinhThanh_model->get_all_from();

							foreach ($result as $row) { ?>
								<option value="<?php echo $row['matp'] ?>"><?php echo $row['name'] ?></option>
							<?php	} ?>

						</select>
						<div id="city_error" class="error"></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="form-row iconBg">
					<label class="form-label" for="param_county">Quận/Huyện:<span class="req">*</span></label>
					<div class="form-item">
						<select name="countyName" class="countyName" id="">
							<option value="0">--Chọn Quận/Huyện--</option>
						</select>
						<div id="county_error" class="error"></div>
					</div>
					<div class="clear"></div>
				</div>

			</div>
			<div class="clear"></div>

			<input type="submit" class="enviar" value="Đăng ký" name="submit">
		</form>
	</div>
</div>

<!-- End register -->

<!-- Forgot password -->
<div id="id04" class="forgot_password_modal">
	<div class="forgot_password">
		<div class="titulo">Quên mật khẩu</div>
		<span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">&times;</span>
		<form id="form_forgot_password" action="" method="post" enctype="application/x-www-form-urlencoded">
			<div class="form-row iconBg">
				<label for="param_email" class="form-label">Nhập Email đăng nhập của bạn, chúng tôi sẽ gửi mật khẩu mới cho bạn:<span class="req">*</span></label>
				<div class="form-item">
					<input type="text" id="email" name="email" required title="Nhập email" data-icon="U">
					<i class="fa fa-envelope-square fa-lg fa-fw" aria-hidden="true"></i>
					<div class="error" id="email_error"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI" style="margin-top: 10px"></div>
			<!-- 6LfKFagUAAAAALCSz-Fd3_F8sL7zEBZCCfVtWvHT -->
			<input type="submit" class="enviar" value="Gửi" name="submit">
		</form>
	</div>
</div>
<!-- End forgot password -->
<!-- End box-header  -->
<!-- End header -->



<script type="text/javascript">
	// Get the modal
	var modal_1 = document.getElementById('id01');
	var modal_2 = document.getElementById('id02');
	var modal_3 = document.getElementById('id03');
	var modal_4 = document.getElementById('id04');

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == modal_1) {
			modal_1.style.display = "none";
		}
		if (event.target == modal_2) {
			modal_2.style.display = "none";
		}
		if (event.target == modal_3) {
			modal_3.style.display = "none";
		}
		if (event.target == modal_4) {
			modal_4.style.display = "none";
		}
	}
</script>



<script type="text/javascript">
	(function() {
		$("#cart_link").on("click", function() {
			$(".container_cart").fadeToggle("fast");
		});

	})();
</script>

<!-- jQuery ajax để thực hiện kiểm tra dữ liệu trong form đăng nhập và gửi dữ liệu trong form lên server -->
<script type="text/javascript">
	$(document).ready(function() {
		//khai báo nút submit form
		var submit = $(".login_modal input[type='submit']");
		//khi thực hiện kích vào nút Login
		submit.click(function() {
			//khai báo các biến
			var email = $(".login_modal input[name='email']").val(); //lấy giá trị input tài khoản
			var password = $(".login_modal input[name='password']").val(); //lấy giá trị input mật khẩu
			//kiem tra xem da nhap tai khoan chua
			if (email == '') {
				alert('Vui lòng nhập email đăng nhập');
				return false;
			}
			//kiem tra xem da nhap mat khau chua
			if (password == '') {
				alert('Vui lòng nhập mật khẩu');
				return false;
			}

			//lay tat ca du lieu trong form login
			var data = $('form#form_login').serialize();
			//su dung ham $.ajax()
			$.ajax({
				type: 'POST', //kiểu post
				url: '<?php echo base_url('user/login') ?>', //gửi dữ liệu sang trang user/login
				data: data,
				success: function(data) {
					if (jQuery.parseJSON(data).check_login == false) {
						alert('Sai email hoặc mật khẩu');
					} else {
						alert('Đăng nhập thành công!');
						location.reload();
					}
				}
			});
			return false;
		});
	});
</script>

<!-- jQuery ajax để thực hiện kiểm tra dữ liệu trong form đăng ký và gửi dữ liệu trong form lên server -->
<script type="text/javascript">
	$(document).ready(function() {
		//khai báo nút submit form
		var submit = $(".register_modal input[type='submit']");
		//khi thực hiện kích vào nút Login
		submit.click(function() {
			//khai báo các biến
			var email = $.trim($(".register_modal input[name='email']").val()); //lấy giá trị input tài khoản
			var password = $.trim($(".register_modal input[name='password']").val()); //lấy giá trị input mật khẩu
			var re_password = $.trim($(".register_modal input[name='re_password']").val()); //lấy giá trị input nhập lại mật khẩu
			var name = $.trim($(".register_modal input[name='name']").val()); //lấy giá trị input họ tên
			var phone = $.trim($(".register_modal input[name='phone']").val()); //lấy giá trị input số điện thoại
			var address = $.trim($(".register_modal textarea[name='address']").val()); //lấy giá trị textarea địa chỉ
			var city = $(".cityName").val();
			var cityName = $(".cityName option:selected").text();
			var county = $(".countyName").val();
			var countyName = $(".countyName option:selected").text();
			//kiem tra xem da nhap email chua
			if (email == '') {
				$("#form_register #email_error").text('Vui lòng nhập email');
				return false;
			} else $("#form_register #email_error").text('');
			//kiem tra xem da nhap mat khau chua
			if (password == '') {
				$("#form_register #password_error").text('Vui lòng nhập mật khẩu');
				return false;
			} else $("#form_register #password_error").text('');
			//kiem tra xem da nhap lai mat khau chua
			if (re_password == '') {
				$("#form_register #re_password_error").text('Vui lòng nhập lại mật khẩu');
				return false;
			} else $("#form_register #re_password_error").text('');
			//kiem tra xem da nhap ho ten chua
			if (name == '') {
				$("#form_register #name_error").text('Vui lòng nhập họ và tên');
				return false;
			} else $("#form_register #name_error").text('');
			//kiem tra xem da nhap so dien thoai chua
			if (phone == '') {
				$("#form_register #phone_error").text('Vui lòng nhập số điện thoại');
				return false;
			} else $("#form_register #phone_error").text('');
			//kiem tra xem da nhap dia chi chua
			if (address == '') {
				$("#form_register #address_error").text('Vui lòng nhập địa chỉ');
				return false;
			} else $("#form_register #address_error").text('');
			//kiem tra xem da chon tinh/TP chua
			if (city == 0) {
				$("#form_register #city_error").text('Vui lòng chọn tỉnh / thành phố');
				return false;
			} else $("#form_register #city_error").text('');
			//kiem tra xem da chon quan/huyen chua
			if (county == 0) {
				$("#form_register #county_error").text('Vui lòng chọn quận / huyện');
				return false;
			} else $("#form_register #county_error").text('');
			//kiem tra co email co dung dinh dang ko ?
			var regex_email = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if (!regex_email.test(email)) {
				$("#form_register #email_error").text('Email không đúng định dạng');
				return false;
			} else $("#form_register #email_error").text('');
			//kiem tra xem mat khau va nhap lai mat khau co giong nhau khong
			if (password != re_password) {
				$("#form_register #re_password_error").text('Nhập lại mật khẩu không giống nhau');
				return false;
			} else $("#form_register #re_password_error").text('');
			//kiem tra so dien thoai co dung dinh dang ko ?
			var regex_phone = /((09|03|07|08|05)+([0-9]{8})\b)/g;
			if (!regex_phone.test(phone)) {
				$("#form_register #phone_error").text('Số điện thoại không đúng định dạng');
				return false;
			} else $("#form_register #phone_error").text('');
			//lay tat ca du lieu trong form register
			var data = $('form#form_register').serialize() + '&cityName=' + cityName + '&countyName=' + countyName;
			//su dung ham $.ajax()
			$.ajax({
				type: 'POST', //kiểu post
				url: '<?php echo base_url('user/register') ?>', //gửi dữ liệu sang trang user/register
				data: data,
				success: function(data) {
					if (jQuery.parseJSON(data).check_register == "exist") {
						alert('Email này đã tồn tại rồi, vui lòng chọn email khác!');
					} else if (jQuery.parseJSON(data).check_register == false) {
						alert('Đăng ký thất bại');
					} else {
						alert('Đăng ký thành công');
						document.getElementById("id02").style.display = "none";
					}
				}
			});
			return false;
		});
	});
</script>

<!-- jQuery ajax để thực hiện kiểm tra dữ liệu trong form quên mật khẩu -->
<script type="text/javascript">
	$(document).ready(function() {
		//khai báo nút submit form
		var submit = $(".forgot_password_modal input[type='submit']");
		//khi thực hiện kích vào nút gửi 
		submit.click(function() {
			//khai báo các biến
			var email = $.trim($(".forgot_password_modal input[name='email']").val()); //lấy giá trị input email			
			//kiem tra xem da nhap email chua
			if (email == '') {
				$("#form_forgot_password #email_error").text('Vui lòng nhập email');
				return false;
			} else $("#form_forgot_password #email_error").text('');
			//kiem tra co email co dung dinh dang ko ?
			var regex_email = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if (!regex_email.test(email)) {
				$("#form_forgot_password #email_error").text('Email không đúng định dạng');
				return false;
			} else $("#form_forgot_password #email_error").text('');
			var data = $('form#form_forgot_password').serialize(); // lấy toàn bộ dữ liệu từ form
			//su dung ham $.ajax()
			$.ajax({
				type: 'POST', //kiểu post
				url: '<?php echo base_url('user/forgot_password') ?>', //gửi dữ liệu sang trang user/login
				data: data,
				success: function(data) {
					if (jQuery.parseJSON(data).check_recaptcha == false) {
						alert('Vui lòng nhập captcha! ');
					} else if (jQuery.parseJSON(data).check_email == false) {
						alert('Không có tài khoản này! ');
						grecaptcha.reset();
					} else if (jQuery.parseJSON(data).sendMail == false) {
						alert('Gửi mail thất bại!');
					} else {
						alert('Gửi mail thành công! Vui lòng kiểm tra email của bạn!')
						document.getElementById("id04").style.display = "none";
					}
				}
			});
			return false;
		});
	});
</script>

<!-- Khi click vào giỏ hàng, kiểm tra đã đăng nhập hay chưa ? -->
<script type="text/javascript">
	$(document).ready(function() {
		var cart = $('.cart_link');
		cart.click(function() {
			$.ajax({
				'async': false,
				'global': false,
				url: '<?php echo base_url('cart/index_for_dropdownCart') ?>',
				success: function(data) {
					if (jQuery.parseJSON(data).is_logged == false) {
						alert('Bạn cần đăng nhập để thực hiện chức năng này!');
						document.getElementById("id01").style.display = "block";
					} else {

						$(".drc_total_amount").text('Tổng: ' + jQuery.parseJSON(data).total_amount + ' đ (+ VAT)');
						$(".drc_total_items").text(jQuery.parseJSON(data).total_items);

						$('.shopping-cart-items').html(jQuery.parseJSON(data).items_info);
						document.getElementById("id03").style.display = "block";
					}
				}
			});
			return false;
		});
	});
</script>

<!-- Lấy đơn vị hành chính-->
<script type="text/javascript">
	$(document).ready(function() {
		$(".cityName").change(function() {
			var id = $(".cityName").val();
			$.post("<?php echo base_url('user/get_donViHanhChinh') ?>", {
				id: id
			}, function(data) {
				$(".countyName").html(data);

			})
		})
	})
</script>

<!-- Khi click vào nút thanh toán của dropdown cart-->
<script type="text/javascript">
	$(document).ready(function() {
		var checkout = $('.checkout_cart');
		checkout.click(function() {
			$.ajax({
				'async': false,
				'global': false,
				url: '<?php echo base_url('cart/index_for_dropdownCart') ?>',
				success: function(data) {
					if (jQuery.parseJSON(data).total_items == 0) {
						alert('Không có sản phẩm nào trong giỏ hàng, hãy mua hàng nào!');
					} else {
						location.href = "<?php echo base_url('order/index/') ?>" + jQuery.parseJSON(data).total_amount;
					}
				}
			});
			return false;
		});
	});
</script>