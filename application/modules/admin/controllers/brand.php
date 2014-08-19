<meta charset="utf-8" />
<?php
/**
 * Created by PhpStorm.
 * User: TrongHuan
 * Date: 8/18/14
 * Time: 1:54 PM
 */
class brand extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model("brand_model");
        $this->load->helper('url', 'form');
    }
    public function index(){

    }
    public function search(){
        $brands = $this->brand_model->get_all_brand();
        $result = array();
        if ($this->input->post("submit")){
            $keywords = $this->input->post("search");
            $type = $this->input->post("type");

            if (!empty($keywords) || $keywords!=""){
                if ($type == 1) {
                    foreach ($brands as $brand){
                        if (preg_match("/$keywords/i",$brand['brand_name'])){
                            $result['brand'][] = $brand;
                        }
                        else $result['not_found'] = "No result found";
                    }
                }
                else if ($type == 0){
                    foreach ($brands as $brand){
                        if (preg_match("/\b$keywords\b/i",$brand['brand_id'])){
                            $result['brand'][] = $brand;
                        }
                        $result['not_found'] = "No result found";
                    }
                }
            }
            else {
                $result['no_query'] = "Enter a keyword to search";
            }
        }
        $this->load->view("layout/header");
        $this->load->view("brand/search_brand",$result);
        $this->load->view("layout/footer");
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
            'brand_name' => $name,
            'brand_desc' => $desc
        );
        $this->brand_model->update($data,$id);
        redirect(base_url()."admin/brand/listbrand");
    }
        $this->load->view('layout/header');
        $this->load->view('brand/update');
        $this->load->view('layout/footer');
    }
}