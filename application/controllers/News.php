<?php
class News extends My_Controller{
    
    function __construct(){
        parent::__construct();
    }
    
    function index(){
        $_SESSION['page'] = 'TinTuc';
        $this->data['temp'] = 'site/news/index.php';
        $this->view('site/layout.php', $this->data);
    }
}