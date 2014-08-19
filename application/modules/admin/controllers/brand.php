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
    }
    public function update(){
        $id = $this->uri->segment(4);
        if($this->input->post('submit') != NULL){
        $name = $this->input->post('txt_name');
        $desc = $this->input->post('txt_desc');
        $data = array(
            'name' => $name,
            'desc' => $desc
        );
        $this->brand_model->update($data,$id);
        redirect(base_url()."admin/brand/listbrand");
    }
        $this->load->view('layout/header.php');
        $this->load->view('brand/update.php');
        $this->load->view('layout/footer.php');
    }

}