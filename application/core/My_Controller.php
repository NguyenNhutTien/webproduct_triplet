<?php
class My_Controller{
    //Bien gui du lieu sang ben view
    public $data = array();
   
    function __construct(){
        //xu li du lieu o trang home
        //lay danh muc san pham, quang vo phan left =))
        $catalog_model = null;
        require 'application/models/Catalog_model.php';    
        $catalog_model = new Catalog_model();
     
        $option = array();
        $option['where'] = 'parent_id = 0';
        $catalog_list = $catalog_model->get_all_from($option);
        //lay danh muc con        
        for ($i = 0; $i < count($catalog_list); $i++) {
            $option = array();
            $option['where'] = 'parent_id = ' . $catalog_list[$i]['id'];
            $subs = $catalog_model->get_all_from($option);     
            $catalog_list[$i]['subs'] = $subs;
        }  
        $this->data['catalog_list'] = $catalog_list;
        
    }
    function view($viewName, $data = null){     
        if ($data!=null) {
            foreach ($data as $key => $value) {
                $$key = $value;
            }
        }
        require "application/views/$viewName";
    }
    
}
