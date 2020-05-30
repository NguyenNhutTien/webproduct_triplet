<?php

class User extends My_Controller
{

    public $user_model = null;

    function __construct()
    {
        parent::__construct();
        require 'application/models/User_model.php';
        $this->user_model = new User_model();
    }

    /*
     * Thông tin thành viên
     */
    function index()
    {

        if (!isset($_SESSION['user'])) {
            redirect(base_url('home/index'));
        }

        $this->data['user'] = $_SESSION['user'];

        // hiển thị ra view
        $_SESSION['page'] = 'ThanhVien';
        $this->data['temp'] = 'site/user/index.php';
        $this->view('site/layout.php', $this->data);
    }

    /*
     * Sửa thông tin thành viên
     */
    function edit()
    {
        if (!isset($_SESSION['user'])) {
            redirect(base_url('user/login'));
        }
        //lấy thông tin thành viên 
        $user = $_SESSION['user'];
        $this->data['user'] = $user;

        if (!empty($_POST)) {
            if ($_POST['password'] == NULL) {
                $this->data['error_password'] = "Vui lòng nhập vào mật khẩu của bạn!";
            } else {
                $input = array();
                $input['email'] = $user['email'];
                $input['password'] = md5($_POST['password']);
                if ($this->user_model->check_login($input) == false) {
                    $this->data['error_password'] = "Mật khẩu không chính xác";
                } else {
                    $this->data['unlock'] = true;
                    if ($_POST['new_password'] != NULL && ($_POST['re_password'] != $_POST['password'])) {
                        $this->data['error_re_password'] = "Mật khẩu không giống nhau";
                    } else {
                        if ($_POST['password'] == NULL) {
                            $data = array(
                                'name' => $_POST['name'],
                                'phone' => $_POST['phone'],
                                'address' => $_POST['address']
                            );
                        } else {
                            $data = array(
                                'name' => $_POST['name'],
                                'phone' => $_POST['phone'],
                                'address' => $_POST['address'],
                                'password' => md5($_POST['password'])
                            );
                        }

                        $where = "email = '" . $user['email'] . "'";

                        $update = $this->user_model->update($data, $where);
                        if ($update == true) {
                            echo "<script>alert('Cập nhật thành công')</script>";
                            $option['where'] = $where;
                            $user_new = $this->user_model->get_all_from($option);
                            $_SESSION['user'] = $user_new[0];
                        } else echo "<script>alert('Cập nhật thất bại')</script>";

                        redirect(base_url('user/index'));
                    }
                }
            }
        }

        $this->data['temp'] = "site/user/edit.php";
        $this->view('site/layout.php', $this->data);
    }

    function register()
    {
        $data = array();

        $user = array(
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'address' => $_POST['address'] . ' , ' .   $_POST['countyName'] . ' , ' . $_POST['cityName'],
            'password' => md5($_POST['password']),
            'created' => time()
        );
        $check = $this->user_model->checkUserIsExist($user);
        if ($check == true) {  // tồn tại email này rồi
            $data['check_register'] = 'exist';
        } else {
            if ($this->user_model->insert($user)) {
                $data['check_register'] = true;
            } else $data['check_register'] = false;
        }

        echo json_encode($data);
    }

    public function login()
    {
        $data = array();

        $user = array(
            'email' => $_POST['email'],
            'password' => md5($_POST['password'])
        );

        $check = $this->user_model->check_login($user);

        if ($check == false) {
            $data['check_login'] =  false;
        } else {
            $_SESSION['user'] = $check[0]; // lưu user đăng nhập vào SESSION    
            $data['check_login'] =  true;
        }

        echo json_encode($data);
    }

    public function logout()
    {
        unset($_SESSION['user']);
        redirect(base_url('home'));
    }

    function forgot_password()
    {
       
        $data = array();

        if(confirm_recaptcha() == true){
                             
            $email = $_POST['email'];
            $option['where'] = "email = '" . $email . "'";
            $result = $this->user_model->get_all_from($option);
            if (count($result) != 0) {
                $user = $result[0];
                $mTo = $user['email'];
                $nTo = $user['name'];
                $subject  = 'Nhan mat khau moi';
                $content = 'Đây là mật khẩu mới  ' ; 

                $sendMail = sendMail($mTo, $nTo, $subject,$content);
                if($sendMail == true){
                    $data['sendMail'] = true;                    
                } else $data['sendMail'] = false;                    
            } else $data['check_email'] = false;
    
        }
        else $data['check_recaptcha'] = false;
                

        echo json_encode($data);
    }
   
    function get_donViHanhChinh()
    {
        $mtp = $_POST['id'];
        $quanHuyen_model = null;
        require 'application/models/QuanHuyen_model.php';
        $quanHuyen_model = new QuanHuyen_model();

        $option['where'] = 'matp = ' . $mtp;
        $result = $quanHuyen_model->get_all_from($option);

        foreach ($result as $row) { ?>

        <option value="<?php echo $row['maqh'] ?>"><?php echo $row['name'] ?></option>

    <?php }
}
}
