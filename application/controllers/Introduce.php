<?php
class Introduce extends My_Controller{
    
    function __construct(){
        parent::__construct();
    }
    
    function index(){
        $_SESSION['page'] = 'GioiThieu';
        $this->data['temp'] = 'site/introduce/index.php';
        $this->view('site/layout.php', $this->data);
    }
}