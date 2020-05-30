<?php
class Route {

   
    function __construct(){
               
        $this->app_path = "application";
        $this->controller_path = "controllers";
        $this->model_path = "models";
        $this->view_path = "views";
         
    }
    function Init() {
        ob_start();
        session_start();
        
        // Gọi kết nối CSDL
        require_once('application/config/database.php');
        Database::connect();
        
        /**
         * [$URL description] Lấy controller và action từ đường dẫn
         */
        $URL = isset($_GET['url']) ? $_GET['url'] : null;
        $URL = rtrim($URL, '/\\');
        
        /**
         * [$url description] Thực hiện cắt $URL thành controller và action. $url sẽ là 1 mảng chứa controller và action
         */
        
        $url = explode('/', $URL);
        
        /**
         * [$controller description]  Lấy controller, action, tham số action từ mảng $url
         */
        $controller = !empty($url[0]) ? $url[0] : "home";
        $action = isset($url[1]) ? $url[1] : "index";
        $param = isset($url[2]) ? $url[2] : null;
        
        
        /**
         * [$fileName description] Lưu đường dẫn tới file controller
         */
        $fileName =  "$this->app_path/$this->controller_path/$controller.php";
        
        /**
         * Kiểm tra tồn tại của file controller. Nếu tồn tại thì gọi controller và action(nếu có). Không tồn tại thì trả về 404 error
         */
        if(file_exists($fileName)){
            include($fileName);
            
            // Chuyển tên controller sang trùng với tên class có trong controller để sử dụng
            $className = ucfirst($controller);
            
            // Khởi tạo đối tượng mới trong controller
            $object = new $className;
            
            // Gọi hàm action tương ứng trong controller
            if(!method_exists($object, $action)){
                require('404.php');
            }
            else{
                if(!empty($param)){
                    $object -> $action($param);
                }
                else{
                    if(!empty($keySearch)){
                        $object->$action($keySearch);
                    }
                    else{
                        $object -> $action(NULL);
                    }
                }
            }
        }
        else{
            require('404.php');
        }
        
                              
     }
  }
