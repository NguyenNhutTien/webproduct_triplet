<?php

class Product extends My_Controller
{

    public $product_model = null;

    function __construct()
    {
        parent::__construct();
        require 'application/models/Product_model.php';
        $this->product_model = new Product_model();
    }

    function index()
    {
        $this->data['page'] = 'SanPham';
        $this->data['temp'] = "site/product/index.php";
        $this->view('site/layout.php', $this->data);
    }

    /*
     * Hien thi danh sach san pham theo danh muc san pham
     * $id : id cua danh muc
     */
    function catalog($id)
    {
        // Da require file Catalog_model.php o constructor cua class My_controller roi!
        $catalog_model = new Catalog_model();

        $catalog = $catalog_model->get_a_record_by_id($id);
        if (!$catalog) {
            // Khong co danh muc, redirect();
        }
        $this->data['catalog'] = $catalog;

        // lay san pham thuoc danh muc da chon
        $option = array();
        $option['where'] = 'catalog_id = ' . $catalog['id'];
        $product_list = $this->product_model->get_all_from($option);
        $total_product = count($product_list);
        $this->data['product_list'] = $product_list;
        $this->data['total_product'] = $total_product;

        // hien thi ra view
        $this->data['temp'] = 'site/product/catalog.php';
        $this->view('site/layout.php', $this->data);
    }

    /*
     * Tim kiem theo ten san pham
     */
    function search_name($isAuto)
    {
        if ($isAuto == 1) {
            $keys = $_GET['term'];
        } else {
            $keys = $_GET['key-search'];
        }

        $this->data['keys'] = trim($keys);
        $option = array();
        $option['where'] = "name LIKE N'%" . $keys . "%'";
        $product_list = $this->product_model->get_all_from($option);
        $this->data['product_list'] = $product_list;

        if ($isAuto == 1) {
            // xu ly autocomplete
            $result = array();
            foreach ($product_list as $row) {
                $item = array();
                $item['id'] = $row['id'];
                $item['label'] = $row['name'];
                $item['value'] = $row['name'];
                $result[] = $item;
            }
            // du lieu tra ve duoi dang json
            die(json_encode($result));
        } else {

            // load view
            $this->data['temp'] = 'site/product/search_name.php';
            $this->view('site/layout.php', $this->data);
        }
    }

    /*
     * Tim kiem theo gia san pham
     */
    function search_price()
    {
        $price_from = intval($_GET['price_from']);
        $price_to = intval($_GET['price_to']);

        $this->data['price_from'] = $price_from;
        $this->data['price_to'] = $price_to;

        // loc theo gia
        $option = array();
        $option['where'] = 'price >= ' . $price_from . ' AND price <=' . $price_to;
        $product_list = $this->product_model->get_all_from($option);
        $this->data['product_list'] = $product_list;

        // load view
        $this->data['temp'] = 'site/product/search_price.php';
        $this->view('site/layout.php', $this->data);
    }

    /*
     * Xem chi tiết sản phẩm
     * $id : id cua san pham muon xem
     */
    function view_product($id)
    {
        $product = $this->product_model->get_a_record_by_id($id);
        if (count($product) == 0) { // khong co san pham nao
            // chuyen huong
        }
        $this->data['product'] = $product;

        // lấy danh sách ảnh sản phẩm kèm theo
        // $image_list = @json_decode($product->image_list);
        // $this->data['image_list'] = $image_list;

        // cap nhat lai luot xem cua san pham
        $data = array();
        $data['view'] = $product['view'] + 1;
        $where = 'id = ' . $product['id'];
        $this->product_model->update($data, $where);

        // lay thong tin cua danh muc san pham
        $catalog_model = new Catalog_model();
        $catalog = $catalog_model->get_a_record_by_id($product['catalog_id']);
        $this->data['catalog'] = $catalog;

        // hiển thị ra view
        $this->data['temp'] = 'site/product/view.php';
        $this->view('site/layout.php', $this->data);
    }

    /*
     * Đánh giá sản phẩm
     */
    function raty()
    {
        $data_ajax = array();
        if (!isset($_SESSION['user'])) {
            $data_ajax['check_login'] = false;
        } else {
            $id_product = intval($_POST['id']);
            $score = $_POST['score'];

            $result = $this->product_model->update_raty($score, $id_product);
            if ($result) {
                $data_ajax['mess'] = true; //đánh giá thành công       
            } else $data_ajax['mess'] = fasle;
        }

        echo json_encode($data_ajax);
    }

    function post_comment($product_id)
    {
        $data = array();
        if (!isset($_SESSION['user'])) {
            $data['check_login'] = false;
        } else {
            $user_id = $_SESSION['user']['id'];
            $user_name = $_SESSION['user']['name'];
            $commentId = isset($_POST['comment_id']) ? $_POST['comment_id'] : "";
            $content = isset($_POST['comment']) ? $_POST['comment'] : "";
            $created =  date('Y-m-d H:i:s');

            $InsertArr = array(
                'parent_comment_id' => $commentId,
                'product_id' => $product_id,
                'user_id' => $user_id,
                'user_name' => $user_name,
                'content' => $content,
                'created' => $created
            );

            // Insert comment lên csdl
            require 'application/models/Comment_model.php';
            $comment_model = new Comment_model();
            $insert =  $comment_model->insert($InsertArr);
            if ($insert == true) {
                $data['result_post_comment'] = true;
            } else $data['result_post_comment'] = false;
        }


        echo json_encode($data);
    }

    function getListComment($product_id)
    {

        require 'application/models/Comment_model.php';
        $comment_model = new Comment_model();
        $comment_list = $comment_model->getList($product_id);

        echo json_encode($comment_list);
    }
}
