<?php
class Brand extends CI_Controller{
    function __construct() {
        parent::__construct();
        //$this->load->helper("url");
        $this->load->model("bran_model");
//        $this->load->model("config_model");
    }
    
    function delete(){
        $brand_id = $this->uri->segment(4);
//        echo $brand_id;die();
        $this->bran_model->delete($brand_id);
        redirect(base_url("index.php/admin/brand/listbran"));
    }
    
    public function listbran(){
//        $data['template']= 'bran/listbran';
//        $this->load->view("layout/layout",$data);
    }
}