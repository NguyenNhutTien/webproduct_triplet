<?php
class Guide extends My_Controller{   
    
    function __construct(){
        parent::__construct();               
    }
    
    function index(){
        $_SESSION['page'] = 'HuongDan';
        $this->data['temp'] = 'site/guide/index.php';
        $this->view('site/layout.php', $this->data);
    }
}