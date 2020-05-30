<div class="box-center">
	<div class="tittle-box-center">
		<h2>Thông tin thanh toán</h2>
	</div>
	<form action="<?php echo base_url('order/checkout/'.$total_amount)?>" method="post" style="margin-top: 50px">
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Email:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" readonly="readonly" value="<?php echo $user['email']?>">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Tên thành viên:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" readonly="readonly" value="<?php echo $user['name']?>"  >
			</div>
		</div>
		<div class="form-group row">
			<label  class="col-sm-2 col-form-label">Số điện thoại:</label>
			<div class="col-sm-10">
				<input  type="text" class="form-control" readonly="readonly" value="<?php echo $user['phone']?>" >
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Địa chỉ:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" readonly="readonly" value="<?php echo $user['address']?>" >
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Số tiền thanh toán:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" readonly="readonly" value="<?php echo number_format($total_amount)?> đ">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Ghi chú:</label>
			<div class="col-sm-10">
				<textarea type="text" class="form-control" name="message"> </textarea>
			</div>
		</div>		
		<a class="btn btn-warning" onclick = "site_back();">Quay về trang trước</a>
		<button type="submit" class="btn btn-success mb-2" style="margin-left: 40%">Xác nhận thanh toán</button>
	</form>
</div>