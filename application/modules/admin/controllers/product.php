<?php
/**
 * Created by PhpStorm.
 * User: TrongHuan
 * Date: 8/18/14
 * Time: 1:54 PM
 */
class Product extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('product_model');
        $this->load->model('image_model');
        $this->load->model('brand_model');
        $this->load->model('country_model');
        $this->load->library('pagination');
    }

    public function listproduct(){
        $data = array();
        $data['listproduct'] = $this->product_model->getAllProduct();

        // if ($page < 0 || ! is_numeric($page)) {
        //     //redirect (base_url() . 'index.php/admin/product/listproduct');
        // }
        $config['base_url'] = base_url().'index.php/admin/product/listproduct/page';
        $config['total_rows'] = $this->product_model->countAllProduct();
        $config['per_page'] = 1;
        $config['uri_segment'] = 5;
//        echo "<pre>";
//        print_r($config);die();

        $this->pagination->initialize($config);
        $temp = $this->uri->segment(5);
        if((isset($temp) && $temp < 0) || !is_numeric($temp)){
            redirect(base_url("index.php/admin/product/listproduct/page/0"));
            exit();
        }else {
            $page = $this->uri->segment(5);
        }

        // $page = ($this->uri->segment(5)) ? $this->uri->segment(5):0;
        $data['results'] = $this->product_model->fetch_product($config['per_page'], $page);
        $data['images'] = $this->image_model->getAllImage();
        $brands = $this->brand_model->getAllBrand();
        $countrys = $this->country_model->getAllCountry();
        // echo "<pre>";print_r($data['images']);die();
        foreach ($data['results'] as $key => $rs) {
            foreach ($data['images'] as $img) {
                if(in_array($rs['product_mainImageId'], $img)){
                    // echo $value['product_mainImageId'];print_r($data['images']);die();
                    $data['results'][$key]['image'] = $img['image_path'];
                }
            }
            foreach($brands as $br){
                if(in_array($rs['brand_id'], $br)){
                    $data['results'][$key]['brand'] = $br['brand_name'];
                }
            }
            foreach($countrys as $ctr){
                if(in_array($rs['product_countryId'], $ctr)){
                    $data['results'][$key]['country'] = $ctr['name'];
                }
            }
            
        }
       // echo "<pre>";
       // print_r($countrys);
       // print_r($data['results']);die();
        $data['links'] = $this->pagination->create_links();
        $this->load->view("layout/header");
        $this->load->view("product/listproduct", $data);
        $this->load->view("layout/footer");
    }
}