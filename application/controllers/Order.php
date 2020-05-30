<?php
class Order extends My_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index($total_amount)
    {
      
        //-------
        //Lay thong tin cua user
        $user = $_SESSION['user'];
        $this->data['user'] = $user;
        $user_id = $user['id'];

        $this->data['total_amount'] = $total_amount;

        $this->data['temp'] = 'site/order/index.php';
        $this->view('site/layout.php', $this->data);
    }

    // Hàm thanh toán
    function checkout($total_amount)
    {
      
        //-----------
        //Lay thong tin cua thanh vien da dang nhap
        $user = $_SESSION['user'];
        $this->data['user'] = $user;
        $user_id = $user['id'];

        //Them du lieu vao csdl, bang transaction
        require 'application/models/Transaction_model.php';
        $transaction_model = new Transaction_model();
        $data = array(
            'status'   => 0, //trang thai chua thanh toan
            'user_id'  => $user['id'], //id thanh vien mua hang da dang nhap
            'user_email'    => $user['email'],
            'user_name'     => $user['name'],
            'user_phone'    => $user['phone'],
            'user_address'  => $user['address'],
            'message'       => (isset($_POST['message'])) ? $_POST['message'] : '', //ghi chú khi mua hàng
            'amount'        => $total_amount, //tong so tien can thanh toan
            //             'payment'       => $payment, //cổng thanh toán,
            'created'       => time()  //  ngày tạo giao dịch
        );
        $transaction_id = $transaction_model->insert_id($data);  // lấy ra id của giao dịch vừa thêm vào

        if ($transaction_id == false) {
            echo "<script>alert('Thêm giao dịch thất bại')</script>";
            redirect(base_url('cart/index'));  // trở về trang giỏ hàng
            return;
        }
        // thêm vào bảng order (chi tiết đơn hàng)
        require 'application/models/Order_model.php';
        $order_model = new Order_model();
        foreach ($_SESSION['cart'][$user_id] as $key => $value) {
            $data = array(
                'transaction_id' => $transaction_id,
                'product_id'     => $key,
                'qty'            => $value['qty'],
                'amount'         => $value['sub_total'],
                'status'         => '0',  // 0 : chưa giao, 1: giao thành công, 2 : bị huỷ
            );
            $result = $order_model->insert($data);

            // ROLLBACK KHI 1 DÒNG INSERT BỊ LỖI........
        }
        // NẾU INSERT VÀO BẢNG ORDER THÀNH CÔNG HẾT THÌ LÀM CHUYỆN NÀY :     
        //Xoá toàn bộ giỏ hàng của user đó
        unset($_SESSION['cart'][$user_id]);

        $_SESSION['message'] = 'Bạn đã đặt hàng thành công, chúng tôi sẽ kiểm tra và gửi hàng cho bạn';
        redirect(base_url('cart/index'));  // trở về trang giỏ hàng

    }  
}
