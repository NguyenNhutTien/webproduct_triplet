
(function ($) {
    $(document).ready(function () {
        $('.addToCart').on("custom", function bayVaoGioHang() {
            var cart = $('.cart');
            
            var imgtofly = $(this).parents('div.product_item').find('div.product_img a img').eq(0); // lấy hình ảnh ở product_item
            if (imgtofly.length == 0){  
                var imgtofly = $(this).parents('div.product').find('div.product_view_img a img').eq(0);  // lấy hình ảnh ở chi tiết sản phẩm
            }

            if (imgtofly) {

                var imgclone = imgtofly.clone()

                    .offset({
                        top: imgtofly.offset().top,
                        left: imgtofly.offset().left
                    })

                    .css({
                        'opacity': '0.7',
                        'position': 'absolute',
                        'height': '150px',
                        'width': '150px',
                        'z-index': '1000'
                    })

                    .appendTo($('body'))

                    .animate({

                        'top': cart.offset().top + 10,

                        'left': cart.offset().left + 30,

                        'width': 55,

                        'height': 55

                    }, 1500, 'easeInElastic');

                imgclone.animate({
                    'width': 0,
                    'height': 0
                }, function () {
                    $(this).detach()
                });

            }

            return false;

        });


        // Thêm sản phẩm vào giỏ hàng không cần load lại trang 
        $(".addToCart").click(function (e) {  // 
            e.preventDefault();
            $id_product = $(this).attr("data-key");
            $id_tag_product = $(this).attr("id");

            console.log($id_product);
            $.ajax({
                type: 'GET',
                url: "http://localhost/webproduct_triplet/cart/add",
                data: {
                    'id_product': $id_product
                },
                success: function (data) {
                    if (jQuery.parseJSON(data).status == 'notLogin') {
                        alert("Bạn phải đăng nhập để thực hiện chức năng này!");
                        document.getElementById("id01").style.display = "block";
                    } else if (jQuery.parseJSON(data).status == 'success') {
                        alert("Thêm sản phẩm vào giỏ hàng thành công!");
                        $("#in_cart").text(jQuery.parseJSON(data).countItemsInCart); // cập nhật lại số lượng sản phẩm trong cart trên header
                        $("#" + $id_tag_product).trigger("custom"); // Gọi tới hàm bayVaoGioHang()
                      //  $("#id03").load(" #id03 > *");  // tự động load lại thẻ  div có id = #id03
            
                    }

                }
            });

        });

        //--------

    });
})(jQuery);