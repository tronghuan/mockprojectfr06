<?php
class Category extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model("category_model");
    }
    public function delete_cate(){
        $id = $this->uri->segment(4);
        
        //lay ra tat ca cac category trong csdl
        $all_cate = $this->category_model->get_all_category();
        
        //khoi tao mang de luu id cua tat ca cac category
        $all_cate_id = array();
        
        foreach ($all_cate as $value){
            $all_cate_id = $value['category_id'];
        }
        
        //$parent_id = $this->category_model->detail($id)['category_parentld'];
        
        
        $this->category_model->delete_category($id);
        
        echo 'xoa category thanh cong';
    }
}