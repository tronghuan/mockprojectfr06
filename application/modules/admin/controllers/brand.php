<?php
/**
 * Created by PhpStorm.
 * User: TrongHuan
 * Date: 8/18/14
 * Time: 1:54 PM
 */
class Brand extends AdminBaseController{
    function __construct(){
        parent::__construct();
        $this->load->helper("url");

    }
    public function index(){

    }
    public function delete(){
        $id = $this->uri->segment(4);
        $this->brand_model->del($id);
        redirect(base_url()."admin/user/listbrand");
        exit();
    }
    public function update(){

    }

}