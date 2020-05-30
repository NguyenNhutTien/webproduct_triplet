<?php

class Cart extends My_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
      
        $user_id = $_SESSION['user']['id'];

        // echo "<pre>";
        // print_r($_SESSION['cart'][$user_id]);
        // echo "</pre>";

        // unset($_SESSION['cart']);

        if (isset($_SESSION['cart'][$user_id])) {
            $total_items = count($_SESSION['cart'][$user_id]);

            $total_amount = 0;
            foreach ($_SESSION['cart'][$user_id] as $item) {
                $total_amount += $item['sub_total'];
            }
            $total_amount_temp = $total_amount;
            $total_amount += $total_amount_temp * 0.1; // + 10% thuế VAT
           
        } else{
            $total_items = 0;
            $total_amount_temp = 0;
            $total_amount = 0;
        }

        $this->data['total_items'] = $total_items;      
        $this->data['total_amount_temp'] = $total_amount_temp;
        $this->data['total_amount'] = $total_amount;
        
        $this->data['temp'] = "site/cart/index.php";
        $this->view('site/layout.php', $this->data);

    }

    /*
     * Thêm sản phẩm vào giỏ hàng
     */
    function add()
    {       
       
        $data = array();

        if (!isset($_SESSION['user'])) {
            $data['status'] = "notLogin";
        } else {
            $product_id = intval($_GET['id_product']);

            require 'application/models/Product_model.php';
            $product_model = new Product_model();
            $product = $product_model->get_a_record_by_id($product_id);

            if (count($product) == 0) {
                redirect(base_url());
            }

            $user_id = $_SESSION['user']['id']; //lấy id user        

            // Kiểm tra nếu tồn tại giỏ hàng thì cập nhật giỏ hàng
            // ngược lại thì tạo mới
            if (!isset($_SESSION['cart'][$user_id][$product_id])) {
                // Tạo mới giỏ hàng             
                $_SESSION['cart'][$user_id][$product_id]['name'] = $product["name"];
                $_SESSION['cart'][$user_id][$product_id]['image_link'] = $product["image_link"];
                $_SESSION['cart'][$user_id][$product_id]['price'] = $product["price"] - $product['discount']; // đơn giá
                $_SESSION['cart'][$user_id][$product_id]['qty'] = 1;
                $_SESSION['cart'][$user_id][$product_id]['sub_total'] = ($_SESSION['cart'][$user_id][$product_id]['price']) * ($_SESSION['cart'][$user_id][$product_id]['qty']); // thành tiền = đơn giá * số lượng
            } else {
                // Cập nhật giỏ hàng
                $_SESSION['cart'][$user_id][$product_id]['qty'] += 1;
                $_SESSION['cart'][$user_id][$product_id]['sub_total'] = ($_SESSION['cart'][$user_id][$product_id]['price']) * ($_SESSION['cart'][$user_id][$product_id]['qty']); // thành tiền = đơn giá * số lượng
            }
            $data['status'] = "success";
            $data['countItemsInCart'] = count($_SESSION['cart'][$user_id]);
        }

        echo json_encode($data);
    }

    /*
     * Cập nhật giỏ hàng
     */
    function update()
    {
   
        $key = intval($_GET['key']);
        $qty = intval($_GET['qty']);

        // KIỂM TRA SỐ LƯỢNG NGƯỜI DÙNG MUA CÓ LỚN HƠN SỐ LƯỢNG SẢN PHẨM ?
        $user_id = $_SESSION['user']['id'];
        $_SESSION['cart'][$user_id][$key]['qty'] = $qty;
        $_SESSION['cart'][$user_id][$key]['sub_total'] = ($_SESSION['cart'][$user_id][$key]['price']) * ($_SESSION['cart'][$user_id][$key]['qty']); // thành tiền = đơn giá * số lượng

        echo 1;
    }

    /*
     * Xoá sản phẩm trong giỏ hàng
     */
    function delete($key)
    {
  
        $user_id = $_SESSION['user']['id'];
        unset($_SESSION['cart'][$user_id][$key]);

        $_SESSION['message'] = "Xoá sản phẩm trong giỏ hàng thành công !";
        redirect(base_url('cart/index'));
    }

    function index_for_dropdownCart()
    {
        $data = array();  // lưu dữ liệu, gửi qua trang home cho dropdown cart
        if(!isset($_SESSION['user'])){
            $data['is_logged']= false;
        }
        else {
            $user_id = $_SESSION['user']['id'];

            if (isset($_SESSION['cart'][$user_id])) {
                $total_items = count($_SESSION['cart'][$user_id]);
    
                $total_amount = 0;
                foreach ($_SESSION['cart'][$user_id] as $item) {
                    $total_amount += $item['sub_total'];
                }
                $total_amount += $total_amount * 0.1; // + 10% thuế VAT

                //---------------------
                     $data['items_info'] = '';
 					 foreach ($_SESSION['cart'][$user_id] as $key => $row) {
                        $data['items_info'] .=   '<li class="clearfix">
                        <img src="'.base_url("upload/product/" . $row["image_link"]).'" alt="'.$row["name"].'" />
                        <span class="item-name">'.$row["name"].'</span>
                        <span class="item-price">'.number_format($row["price"]).'  đ</span>
                        <span class="item-quantity"> Số lượng: '.$row["qty"].'</span>
                        </li>' ;
                           
                      }
                    
                //----------------------
               
            } else{
                $total_items = 0;
                $total_amount = 0;
            }
            $data['total_amount'] = $total_amount;
            $data['total_items'] = $total_items;                 
            
        }        
        echo json_encode($data);
    }
  
}
