<!-- The box-center product-->
<div class="box-center">
	<div class="tittle-box-center">
		<h2><?php echo $catalog['name'] ?> (Có <?php echo $total_product ?> sản phẩm)</h2>
	</div>
	<?php if (isset($product_list)) : ?>
		<div class="box-content-center product">
			<!-- The box-content-center -->
			<?php foreach ($product_list as $row) : ?>
				<div class="product_item">
					<h3>
						<a title="<?php echo $row['name'] ?>" href="<?php echo base_url('product/view_product/' . $row['id']) ?>">
							<?php echo $row['name'] ?>
						</a>
					</h3>
					<div class="product_img">
						<a title="<?php echo $row['name'] ?>" href="<?php echo base_url('product/view_product/' . $row['id']) ?>"> <img alt="<?php echo $row['name'] ?>" src="<?php echo base_url('upload/product/') . $row['image_link'] ?>">
						</a>
					</div>

					<p class="price">
						<?php if ($row['discount'] > 0) : ?>
							<?php $price_new = $row['price'] - $row['discount']; ?>
							<?php echo number_format($price_new) ?> đ <span class="price_old"><?php echo number_format($row['price']) ?> đ</span>
						<?php else : ?>
							<?php echo number_format($row['price']) ?> đ
						<?php endif; ?>
					</p>

					<center>
						<div class='raty' style='margin: 10px 0px' id='9' data-score='<?php echo round($row['rate_total'] / $row['rate_count']) ?>'></div>
					</center>

					<div class="action">
						<p style="float: left; margin-left: 10px">
							Lượt xem: <b><?php echo $row['view'] ?></b>
						</p>
						<a title="Mua ngay" class="button addToCart" id="addToCart_<?php echo $row['id'] ?>" data-key=<?php echo $row['id'] ?>>Mua ngay</a>
						<div class="clear"></div>
					</div>
				</div>
			<?php endforeach; ?>
			<div class="clear"></div>
		</div>
	<?php endif; ?>
	<!-- End box-content-center -->

	<div class="pagination"></div>
</div>




