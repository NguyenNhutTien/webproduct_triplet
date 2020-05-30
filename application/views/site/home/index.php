<!-- lay slide -->


<script src="<?php echo public_url() ?>site/royalslider/jquery.royalslider.min.js"></script>
<link type="text/css" href="<?php echo public_url() ?>site/royalslider/royalslider.css" rel="stylesheet">
<link type="text/css" href="<?php echo public_url() ?>site/royalslider/skins/minimal-white/rs-minimal-white.css" rel="stylesheet">


<script type="text/javascript">
	(function($) {
		$(document).ready(function() {
			$("#HomeSlide").royalSlider({
				arrowsNav: true,
				loop: false,
				keyboardNavEnabled: true,
				controlsInside: false,
				imageScaleMode: "fill",
				arrowsNavAutoHide: false,
				autoScaleSlider: true,
				autoScaleSliderWidth: 580, //chiều rộng slide
				autoScaleSliderHeight: 205, //chiều cao slide
				controlNavigation: "bullets",
				thumbsFitInViewport: false,
				navigateByClick: true,
				startSlideId: 0,
				autoPlay: {
					enabled: true,
					stopAtAction: false,
					pauseOnHover: true,
					delay: 5000
				},
				transitionType: "move",
				slideshowEnabled: true,
				slideshowDelay: 5000,
				slideshowPauseOnHover: true,
				slideshowAutoStart: true,
				globalCaption: false
			});
		});
	})(jQuery);
</script>


<style>
	#HomeSlide.royalSlider {
		width: 580px;
		height: 205px;
		overflow: hidden;
	}
</style>

<div id='slide'>
	<div id="img-slide" class="sliderContainer" style='width: 580px'>
		<div id="HomeSlide" class="royalSlider rsMinW">
			<a href="http://dantri.com.vn/" target='_blank'><img src="<?php echo base_url() ?>upload/slide/31.jpg" /> </a> <a href="http://dantri.com.vn/" target='_blank'><img src="<?php echo base_url() ?>upload/slide/21.jpg" /> </a> <a href="http://dantri.com.vn/" target='_blank'><img src="<?php echo base_url() ?>upload/slide/11.jpg" /> </a>
		</div>
	</div>
	<div class="clear"></div>
</div>
<div class="clear pb20"></div>

<!-- lay san pham moi nhat -->
<div class="box-center">
	<!-- The box-center product-->
	<div class="tittle-box-center">
		<h2>Sản phẩm mới</h2>

	</div>
	<div class="box-content-center product">
		<!-- The box-content-center -->
		<?php foreach ($product_newest as $row) : ?>
			<div class="product_item">
				<h3>
					<a href="<?php echo base_url('product/view_product/' . $row['id']) ?>" title="<?php echo $row['name'] ?>"> <?php echo $row['name'] ?> </a>
				</h3>
				<div class="product_img">
					<a href="<?php echo base_url('product/view_product/' . $row['id']) ?>" title="<?php echo $row['name'] ?>"> <img src="<?php echo base_url('upload/product/' . $row['image_link']) ?>" alt="<?php echo $row['name'] ?>" />
					</a>
				</div>
				<p class="price">
					<?php if ($row['discount'] > 0) : ?>
						<?php $price_new = $row['price'] - $row['discount']; ?>
						<?php echo number_format($price_new); ?> đ <span class="price_old"><?php echo number_format($row['price']) ?> đ</span>
					<?php else : ?>
						<?php echo number_format($row['price']); ?> đ
					<?php endif; ?>
				</p>
				<center>
					<div class='raty' style='margin: 10px 0px' id='1' data-score='<?php echo ($row['rate_count'] != 0) ?  round($row['rate_total'] / $row['rate_count']) :  round($row['rate_total'])?>'></div>
				</center>
				<div class='action'>
					<p style='float: left; margin-left: 10px'>Lượt xem: <b><?php echo $row['view'] ?></b>
					</p>
					<a class='button addToCart' title='Mua ngay' id="addToCart_<?php echo $row['id'] ?>" data-key=<?php echo $row['id'] ?>>
						Mua ngay</a>
					<div class='clear'></div>
				</div>
			</div>
		<?php endforeach; ?>
		<div class='clear'></div>
	</div>
	<!-- End box-content-center -->
</div>
<!-- End box-center product-->
<!-- lay san pham dang giam gia -->
<div class="box-center">
	<!-- The box-center product-->
	<div class="tittle-box-center">
		<h2>Sản phẩm giảm giá</h2>
	</div>
	<div class="box-content-center product">
		<!-- The box-content-center -->
		<?php foreach ($product_discount as $row) : ?>
			<div class='product_item'>
				<h3>
					<a href="<?php echo base_url('product/view_product/' . $row['id']) ?>" title="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></a>
				</h3>
				<div class='product_img'>
					<a href="<?php echo base_url('product/view_product/' . $row['id']) ?>" title="<?php echo $row['name'] ?>"> <img src="<?php echo base_url('upload/product/' . $row['image_link']) ?>" alt='<?php echo $row['name'] ?>' />
					</a>
				</div>
				<p class='price'>
					<?php if ($row['discount'] > 0) : ?>
						<?php $price_new = $row['price'] - $row['discount']; ?>
						<?php echo number_format($price_new); ?> đ <span class="price_old"><?php echo number_format($row['price']) ?> đ</span>
					<?php else : ?>
						<?php echo number_format($row['price']); ?> đ
					<?php endif; ?>
				</p>
				<center>
				<div class='raty' style='margin: 10px 0px' id='2' data-score='<?php echo ($row['rate_count'] != 0) ?  round($row['rate_total'] / $row['rate_count']) :  round($row['rate_total'])?>'></div>
				</center>
				<div class='action'>
					<p style='float: left; margin-left: 10px'>
						Lượt xem: <b><?php echo $row['view'] ?></b>
					</p>
					<a class='button addToCart' title='Mua ngay' id="addToCart_<?php echo $row['id'] ?>" data-key=<?php echo $row['id'] ?>>Mua
						ngay</a>
					<div class='clear'></div>
				</div>
			</div>
		<?php endforeach; ?>
		<div class='clear'></div>
	</div>
	<!-- End box-content-center -->
</div>
<!-- End box-center product-->
<!-- lay san pham xem nhieu -->
<div class="box-center">
	<!-- The box-center product-->
	<div class="tittle-box-center">
		<h2>Sản phẩm xem nhiều</h2>
	</div>
	<div class="box-content-center product">
		<!-- The box-content-center -->
		<?php foreach ($product_viewest as $row) : ?>
			<div class='product_item'>
				<h3>
					<a href="<?php echo base_url('product/view_product/' . $row['id']) ?>" title="<?php echo $row['name'] ?>"> <?php echo $row['name'] ?> </a>
				</h3>
				<div class='product_img'>
					<a href="<?php echo base_url('product/view_product/' . $row['id']) ?>" title="<?php echo $row['name'] ?>"> <img src="<?php echo base_url('upload/product/' . $row['image_link']) ?>" alt='' />
					</a>
				</div>
				<p class='price'>
					<?php if ($row['discount'] > 0) : ?>
						<?php $price_new = $row['price'] - $row['discount']; ?>
						<?php echo number_format($price_new); ?> đ <span class="price_old"><?php echo number_format($row['price']) ?> đ</span>
					<?php else : ?>
						<?php echo number_format($row['price']); ?> đ
					<?php endif; ?>
				</p>
				<center>
				<div class='raty' style='margin: 10px 0px' id='3' data-score='<?php echo ($row['rate_count'] != 0) ?  round($row['rate_total'] / $row['rate_count']) :  round($row['rate_total'])?>'></div>
				</center>
				<div class='action'>
					<p style='float: left; margin-left: 10px'>
						Lượt xem: <b><?php echo $row['view'] ?></b>
					</p>
					<a class='button addToCart' title='Mua ngay' id="addToCart_<?php echo $row['id'] ?>" data-key=<?php echo $row['id'] ?>>Mua
						ngay</a>
					<div class='clear'></div>
				</div>
			</div>
		<?php endforeach; ?>
		<div class='clear'></div>
	</div>
	<!-- End box-content-center -->
</div>
<!-- End box-center product-->