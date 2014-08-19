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
        $this->load->model("brand_model");
    }
    public function index(){

    }
    function show_brand_id() {
        $id = $this->uri->segment(4);
        $data['single_brand'] = $this->brand_model->getOnce($id);
        $this->load->view('update', $data);
    }
    public function delete(){

    }
    public function update(){
        if($this->input->post('submit') != NULL){
        $name = $this->input->post('txt_name');
        $desc = $this->input->post('txt_desc');
        $data = array(
            'brand_name' => $name,
            'brand_desc' => $desc
        );
        $this->brand_model->update($id,$data);
        redirect(base_url()."admin/brand/listbrand");
    }

    }

}