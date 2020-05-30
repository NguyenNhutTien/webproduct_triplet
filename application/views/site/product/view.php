<!-- video -->
<!-- <script type='text/javascript' src='<?php echo public_url() ?>/site/tivi/jwplayer.js'>
</script>
<script type='text/javascript'>
	jQuery('document').ready(function() {
		jwplayer('mediaspace').setup({
			'flashplayer': '<?php echo public_url() ?>/site/tivi/player.swf',
			'file': 'https://www.youtube.com/watch?v=zAEYQ6FDO5U',
			'controlbar': 'bottom',
			'width': '560',
			'height': '315',
			'autoplay': true
		});
	})
</script> -->

<script type="text/javascript">
	$(document).ready(function() {
		$('a.tab').click(function() {
			var an_di = $('a.selected').attr('rel'); //lấy title của thẻ <a class='active'>
			$('div#' + an_di).hide(); //ẩn thẻ <div id='an_di'>
			$('a.selected').removeClass('selected');
			$(this).addClass('selected');
			var hien_thi = $(this).attr('rel'); //lấy title của thẻ <a> khi ta kick vào nó
			$('div#' + hien_thi).show(); //hiện lên thẻ <div id='hien_thi'>
		});
	});
</script>

<!-- zoom image -->
<script src="<?php echo public_url() ?>/site/jqzoom_ev/js/jquery.jqzoom-core.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo public_url() ?>/site/jqzoom_ev/css/jquery.jqzoom.css" type="text/css">
<script type="text/javascript">
	$(document).ready(function() {
		$('.jqzoom').jqzoom({
			zoomType: 'standard',
		});
	});
</script>
<!-- end zoom image -->

<!-- Raty -->
<script type="text/javascript">
	$(document).ready(function() {
		//raty
		$('.raty_detailt').raty({
			score: function() {
				return $(this).attr('data-score');
			},
			half: false, // không cho đánh giá nửa sao
			click: function(score, evt) {
				var rate_count = $('.rate_count');
				var rate_count_total = rate_count.text(); // số lượt đánh giá
				$id_product = $(this).attr("data-key");
				$.ajax({
					url: '<?php echo base_url('product/raty') ?>',
					type: 'POST',
					data: {
						'id': $id_product,
						'score': score
					},
					dataType: 'json',
					success: function(data) {
						if (data.check_login == false) {
							alert('Bạn phải đăng nhập để thực hiện chức năng này!');
							$("#id01").css("display", "block");
						} else
						if (data.mess == true) {
							var total = parseInt(rate_count_total) + 1;
							rate_count.html(parseInt(total));
							alert("Bạn đã đánh giá cho sản phẩm này thành công!");
						}

					}
				});
			}
		});
	});
</script>
<!--End Raty -->

<div class="box-center">
	<!-- The box-center product-->
	<div class="tittle-box-center">
		<h2>Chi tiết sản phẩm</h2>
	</div>
	<div class="box-content-center product">
		<!-- The box-content-center -->
		<div class='product_view_img'>
			<a href="<?php echo base_url('upload/product/' . $product['image_link']) ?>" class="jqzoom" rel='gal1' title="triumph"> <img src="<?php echo base_url('upload/product/' . $product['image_link']) ?>" alt='<?php echo $product['name'] ?>' style="width: 280px !important">
			</a>
			<div class='clear' style='height: 10px'></div>
			<div class="clearfix">
				<ul id="thumblist">
					<li>
						<a class="zoomThumbActive" href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: '<?php echo base_url('upload/product/' . $product['image_link']) ?>',largeimage: '<?php echo base_url('upload/product/' . $product['image_link']) ?>'}">
							<img src='<?php echo base_url('upload/product/' . $product['image_link']) ?>'>
						</a>
					</li>
					<?php if (isset($image_list)) : ?>
						<?php if (is_array($image_list)) : ?>
							<?php foreach ($image_list as $img) : ?>
								<li>
									<a href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: '<?php echo base_url('upload/product/' . $img) ?>',largeimage: '<?php echo base_url('upload/product/' . $img) ?>'}">
										<img src='<?php echo base_url('upload/product/' . $img) ?>'>
									</a>
								</li>
							<?php endforeach; ?>
						<?php endif; ?>
					<?php endif; ?>
				</ul>
			</div>
		</div>

		<div class='product_view_content'>
			<h1><?php echo $product['name'] ?></h1>
			<p class='option'>
				Giá:
				<?php if ($product['discount'] > 0) : ?>
					<?php $price_new = $product['price'] - $product['discount']; ?>
					<span class='product_price'><?php echo number_format($price_new) ?> đ</span>
					<span class="price_old"><?php echo number_format($product['price']) ?> đ</span>
				<?php else : ?>
					<span class='product_price'><?php echo number_format($product['price']) ?> đ</span>
				<?php endif; ?>
			</p>

			<p class='option'>
				Danh mục:
				<a href="<?php echo base_url('product/catalog/' . $catalog['id']) ?>" title="<?php echo $catalog['name'] ?>">
					<b><?php echo $catalog['name'] ?></b>
				</a>
			</p>

			<p class='option'>
				Lượt xem: <b><?php echo $product['view'] ?></b>
			</p>

			<?php if ($product['warranty'] != '') : ?>
				<p class='option'>
					Bảo hành: <b><?php echo $product['warranty'] ?></b>
				</p>
			<?php endif; ?>

			<?php if ($product['gifts'] != '') : ?>
				<p class='option'>
					Tặng quà: <b><?php echo $product['gifts'] ?></b>
				</p>
			<?php endif; ?>

			Đánh giá &nbsp; <span class='raty_detailt' style='margin: 5px' data-key=<?php echo $product['id'] ?> data-score='4'></span> | Tổng số: <b class='rate_count'><?php echo $product['rate_count'] ?></b>

			<div class='action'>
				<a class='button addToCart' style='float: left; padding: 8px 15px; font-size: 16px' title='Mua ngay' id="addToCart_<?php echo $product['id'] ?>" data-key=<?php echo $product['id'] ?>>Thêm vào giỏ hàng</a>
				<div class='clear'></div>
			</div>

		</div>
		<div class='clear' style='height: 15px'></div>
		<center>
			<!-- AddThis Button BEGIN -->
			<script type="text/javascript">
				var switchTo5x = true;
			</script>
			<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
			<script type="text/javascript">
				stLight.options({
					publisher: "19a4ed9e-bb0c-4fd0-8791-eea32fb55964",
					doNotHash: false,
					doNotCopy: false,
					hashAddressBar: false
				});
			</script>
			<span class='st_facebook_hcount' displayText='Facebook'></span> <span class='st_fblike_hcount' displayText='Facebook Like'></span> <span class='st_googleplus_hcount' displayText='Google +'></span> <span class='st_twitter_hcount' displayText='Tweet'></span>
			<!-- AddThis Button END -->
		</center>
		<div class='clear' style='height: 10px'></div>
		<table width="100%" cellspacing="0" cellpadding="3" border="0" class="tbsicons">
			<tbody>
				<tr>
					<td width="25%"><img alt="Phục vụ chu đáo" src="<?php echo public_url('site') ?>/images/icon-services.png">
						<div>Phục vụ chu đáo</div>
					</td>
					<td width="25%"><img alt="Giao hàng đúng hẹn" src="<?php echo public_url('site') ?>/images/icon-shipping.png">
						<div>Giao hàng đúng hẹn</div>
					</td>
					<td width="25%"><img alt="Đổi hàng trong 24h" src="<?php echo public_url('site') ?>/images/icon-delivery.png">
						<div>Đổi hàng trong 24h</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>



<div class="usual" id="usual1">
	<ul>
		<li><a title="Chi tiết sản phẩm" rel='tab2' href='javascript:void(0)' class="tab selected">Mô tả sản phẩm</a></li>
		<li><a title="Video" rel='tab3' href='javascript:void(0)' class="tab">Video</a></li>
		<?php
		/*
           * ?>
		* <li><a title="Hỏi đáp về sản phẩm" rel='tab4' href='javascript:void(0)' class="tab">Hỏi đáp về sản phẩm</a></li>
		* <?php
           */
		?>
	</ul>
</div>
<!-- end  <div class="usual" id="usual1">-->

<div class="usual-content">
	<div id="tab2">
		<?php echo $product['content'] ?>
		<!-- comment facebook -->
		<div class="comment-product">
			<h1>Bình luận sản phẩm</h1>
			<div class="comment-form-container">
				<form id="frm-comment">
					<div class="input-row">
						<input type="hidden" name="comment_id" id="commentId" />
					</div>
					<div class="input-row">
						<textarea class="input-field" type="text" name="comment" id="comment" placeholder='Nhập bình luận của bạn tại đây'>  </textarea>
					</div>
					<div>
						<input type="button" class="btn-submit" id="submitButton" value="Gửi bình luận" />
						<div id="comment-message">Thêm bình luận thành công!</div>
					</div>

				</form>
			</div>
			<div id="output"></div>
		</div>
	</div>
	<div id="tab3" style="display: none">
		<!-- the div chay video -->
		<!-- <div id='mediaspace' style="margin: 5px;"> 
		
		</div> -->
		<iframe width="560" height="315" src="<?php echo $product['video']?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


	</div>
</div>


<!-- comment product -->
<script type="text/javascript">
	function postReply(commentId) {
		//$("#frm-comment #commentId").val(commentId);
		//	$("#frm-comment #comment").focus();
		$("#form_reply_" + commentId + "").fadeIn(1000);

		$("#form_reply_" + commentId + " #submitButtonReply").on('click', function(event) {
			event.stopPropagation();
			event.stopImmediatePropagation();
			//(... rest of your JS code)
			$("#frm-comment #comment-message").css('display', 'none');
			var str = $("#form_reply_" + commentId + "").serialize() + "&comment_id=" + commentId;

			$.ajax({
				url: "<?php echo base_url('product/post_comment/' . $product['id']) ?>",
				data: str,
				type: 'post',
				success: function(data) {
					if (jQuery.parseJSON(data).check_login == false) {
						alert('Bạn cần phải đăng nhập để thực hiện chức năng này!');
						$("#id01").css('display', 'block'); // hiển thị form đăng nhập
					} else
					if (jQuery.parseJSON(data).result_post_comment == true) {
						$("#frm-comment #comment-message").css('display', 'inline-block');
						$("#form_reply_" + commentId + " #comment").val("");
						$("#frm-comment #commentId").val("");
						listComment();
						$("#form_reply_" + commentId + "").css('display', 'none');
					} else {
						alert("Thêm bình luận thất bại !");
						$("#form_reply_" + commentId + "").css('display', 'none');
						return false;
					}
				}
			});

		});

	}


	$("#frm-comment #submitButton").click(function() {
		$("#frm-comment #comment-message").css('display', 'none');
		var str = $("#frm-comment").serialize();
		$.ajax({
			url: "<?php echo base_url('product/post_comment/' . $product['id']) ?>",
			data: str,
			type: 'post',
			success: function(data) {
				if (jQuery.parseJSON(data).check_login == false) {
					alert('Bạn cần phải đăng nhập để thực hiện chức năng này!');
					$("#id01").css('display', 'block'); // hiển thị form đăng nhập
				} else
				if (jQuery.parseJSON(data).result_post_comment == true) {
					$("#frm-comment #comment-message").css('display', 'inline-block');
					$("#frm-comment #comment").val("");
					$("#frm-comment #commentId").val("");
					listComment();
					//alert("Thêm bình luận thành công!");
				} else {
					alert("Thêm bình luận thất bại !");
					return false;
				}
			}
		});
	});


	$(document).ready(function() {
		listComment();
	});

	function listComment() {
		$.post("<?php echo base_url('product/getListComment/' . $product['id']) ?>",
			function(data) {
				var data = JSON.parse(data);
				var comments = "";
				var replies = "";
				var item = "";
				var parent = -1;
				var results = new Array();

				var list = $("<ul class='outer-comment'>");
				var item = $("<li>").html(comments);

				for (var i = 0; i < data.length; i++) {
					var commentId = data[i]['id'];
					parent = data[i]['parent_comment_id'];

					if (parent == "0") {
						comments = "<div class='comment-row'>" +
							"<div class='comment-info'><span class='commet-row-label'>from</span> <span class='posted-by'>" + data[i]['user_name'] + " </span> <span class='commet-row-label'>at</span> <span class='posted-at'>" + data[i]['created'] + "</span></div>" +
							"<div class='comment-text'>" + data[i]['content'] + "</div>" +
							"<div><a class='btn-reply' onClick='postReply(" + commentId + ")'>Reply</a></div>" +

							"<form id='form_reply_" + commentId + "'  style='display:none'>" +
							"<div class='input-row'><textarea class='input-field' type='text' name='comment' id='commentReply' placeholder='Nhập bình luận của bạn tại đây'></textarea></div>" +
							"<div class='input-row'><input type='button' class='btn-submit' id='submitButtonReply' value='Gửi bình luận' /></div>" +
							"</form>"
						"</div>";

						var item = $("<li>").html(comments);
						list.append(item);
						var reply_list = $('<ul>');
						item.append(reply_list);
						listReplies(commentId, data, reply_list);
					}
				}
				$(".comment-product #output").html(list);
			});
	}

	function listReplies(commentId, data, list) {
		for (var i = 0; i < data.length; i++) {
			if (commentId == data[i].parent_comment_id) {
				var comments = "<div class='comment-row'>" +
					" <div class='comment-info'><span class='commet-row-label'>from</span> <span class='posted-by'>" + data[i]['user_name'] + " </span> <span class='commet-row-label'>at</span> <span class='posted-at'>" + data[i]['created'] + "</span></div>" +
					"<div class='comment-text'>" + data[i]['content'] + "</div>" +
					"</div>";
				var item = $("<li>").html(comments);
				var reply_list = $('<ul>');
				list.append(item);
			}
		}
	}
</script>