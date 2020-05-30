<?php
class Home extends My_Controller
{    
    function __construct(){
        parent::__construct();
       
    }
    function index()
    {       
            //khai bao mot object product_model
            $product_model = null;
            require 'application/models/Product_model.php';
            $product_model = new Product_model();
            
           //Lấy danh sách sản phẩm mới
           $option = array();
           $option['offset'] = 0;
           $option['limit'] = 3;
           $option['order_by'] = 'id';
           $product_newest = $product_model->get_all_from($option);
           $this->data['product_newest'] = $product_newest;
         
           //Lấy danh sách sản phẩm giảm giá
           $option = array();
           $option['offset'] = 0;
           $option['limit'] = 3;
           $option['order_by'] = 'id';
           $option['where'] = 'discount > 0 ';
           $product_discount = $product_model->get_all_from($option);
           $this->data['product_discount'] = $product_discount;
          
           //Lấy danh sách sản phẩm xem nhiều
           $option = array();
           $option['offset'] = 0;
           $option['limit'] = 3;
           $option['order_by'] = 'view';          
           $product_viewest = $product_model->get_all_from($option);
           $this->data['product_viewest'] = $product_viewest;
                                    
           //load view
           $_SESSION['page'] = 'TrangChu';
           $this->data['temp'] = "site/home/index.php";
           $this->view('site/layout.php',$this->data);
    }
    
 
}
?>
	
	
