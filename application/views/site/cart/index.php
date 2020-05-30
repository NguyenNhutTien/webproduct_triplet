<!-- --------- -->
<div class="box-center">
	<div class="tittle-box-center">
		<h2>Thông tin giỏ hàng (Có <?php echo $total_items ?> sản phẩm)</h2>
	</div>
	<?php if (isset($_SESSION['message'])) : ?>
		<div class="alert alert-success" style="margin-top: 30px;">
			<strong style="color: #3c763d">Success!</strong> <?php echo $_SESSION['message'];
																unset($_SESSION['message']) ?>
		</div>
	<?php endif; ?>
	<form action="<?php
					?>" method="post">
		<table id="cart" class="table table-hover table-condensed">
			<thead>
				<tr>
					<th style="width: 50%">Tên sản phẩm</th>
					<th style="width: 10%">Giá</th>
					<th style="width: 8%">Số lượng</th>
					<th style="width: 22%" class="text-center">Thành tiền</th>
					<th style="width: 10%"></th>
				</tr>
			</thead>
			<tbody>
				<?php $user_id = $_SESSION['user']['id']; ?>
				<?php if (isset($_SESSION['cart'][$user_id])) : ?>
					<?php foreach ($_SESSION['cart'][$user_id] as $key => $row) : ?>
						<tr>
							<td data-th="Product">

								<div class="col-sm-5 hidden-xs">
									<img src="<?php echo base_url('upload/product/' . $row['image_link']) ?>" alt="<?php echo $row['name'] ?>" class="img-responsive">
								</div>
								<div class="col-sm-5">
									<h5 class="nomargin"><?php echo $row['name'] ?></h5>
								</div>

							</td>
							<td data-th="Price"><?php echo number_format($row['price']) ?> </td>
							<td data-th="Quantity"><input id="qty" type="number" name="qty" class="form-control text-center" min="1" value="<?php echo $row['qty'] ?>"></td>
							<td data-th="Subtotal" class="text-center">
								<?php
								echo number_format($row['sub_total']);
								?>
							</td>
							<td class="actions" data-th="">
								<a class="btn btn-info btn-sm updateCart" data-key=<?php echo $key ?>>
									<i class="fa fa-edit"></i>
								</a>
								<a class="btn btn-danger btn-sm" href="<?php echo base_url("cart/delete/" . $key) ?>"> <i class="fa fa-trash-o"></i>
								</a></td>
						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
			</tbody>
			<tfoot>
				<tr>
					<td><a href="<?php echo base_url('home/index') ?>" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục
							mua hàng</a></td>
					<td colspan="3" class="hidden-xs"></td>
					<td><a class="btn btn-success btn-block checkout">Thanh toán <i class="fa fa-angle-right"></i></td>
				</tr>
			</tfoot>
		</table>

		<div class="col-md-5 pull right" id="order-info">
			<ul class="list-group">
				<li class="list-group-item list-group-item-info">
					<h4>Thông tin đơn hàng</h4>
				</li>
				<li class="list-group-item"><span class="badge"> <?php echo  number_format($total_amount_temp)  ?> đ </span>
					Số tiền</li>
				<li class="list-group-item"><span class="badge"> 10% </span> Thuế
					VAT</li>
				<li class="list-group-item list-group-item-warning" style="color: red"><span class="badge">
						<?php
						echo  number_format($total_amount)  ?> đ </span>
					Tổng tiền thanh toán</li>
			</ul>
		</div>
		<div class="clear"></div>

		<div style="width: 19%; margin-left: 80%">
			<a class="btn btn-success btn-block checkout">Thanh toán <i class="fa fa-angle-right"></i>
			</a>
		</div>

	</form>
</div>


<!-- Nút thanh toán -->
<script type="text/javascript">
	$(".checkout").click(function(){
		
		<?php
		if ($total_items == 0) {
			echo "alert('Không có sản phẩm nào trong giỏ hàng, hãy mua hàng nào!');";
		} else echo "location.href = '" . base_url('order/index/'.$total_amount)  . "'";
		?>
	
	});
</script>

<!-- Cập nhật giỏ hàng, gửi dữ liệu sang controller cart/update -->
<script type="text/javascript">
	$(function() {
		$updateCart = $(".updateCart");
		$updateCart.click(function(e) {
			e.preventDefault();
			$qty = $(this).parents("tr").find("#qty").val();

			$key = $(this).attr("data-key");

			console.log($key);
			$.ajax({
				url: "<?php echo base_url('cart/update') ?>",
				type: 'GET',
				data: {
					'qty': $qty,
					'key': $key
				},
				success: function(data) {
					if (data == 1) {
						alert('Bạn đã cập nhật giỏ hàng thành công!');
						location.href = "<?php echo base_url('cart/index') ?>";
					} else {
						//                         alert('Xin lỗi! Số lượng bạn mua vượt quá số lượng hàng có trong kho!');
						//                         location.href='gio-hang.php';
					}
				}
			});

		})
	})
</script>