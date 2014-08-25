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
        $this->load->model('brand_model');
        $this->load->model('country_model');
        $this->load->model('image_model');
        $this->load->library('pagination');
    }
    public function listproduct(){
        $data = array();
        $data['listproduct'] = $this->product_model->getAllProduct();
        $data['country'] = $this->country_model->getAllCountry();
        $data['brand'] = $this->brand_model->getAllBrand();
        $data['image'] = $this->image_model->getAllImage();
        $config['base_url'] = base_url().'index.php/admin/product/listproduct/page';
        $config['total_rows'] = $this->product_model->countAllProduct();
        $config['per_page'] = 1;
        $config['uri_segment'] = 5;
//        echo "<pre>";
//        print_r($config);die();

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(5)) ? $this->uri->segment(5):0;

        $data['results'] = $this->product_model->fetch_product($config['per_page'], $page);
        foreach($data['results'] as $key => $rs){
            foreach($data['country'] as $ct){
                if($rs['country_id'] == $ct['country_id']){
                    $data['results'][$key]['country_name'] = $ct['country_name'];
                }
            }
        }
        foreach($data['results'] as $key => $rs){
            foreach($data['brand'] as $br){
                if($rs['brand_id'] == $br['brand_id']){
                    $data['results'][$key]['brand_name'] = $br['brand_name'];
                }
            }
        }
        foreach($data['results'] as $key => $rs){
            foreach($data['image'] as $img){
                if($rs['product_mainImageId'] == $img['image_id']){
                    $data['results'][$key]['image_name'] = $img['image_name'];
                }
            }
        }
       // echo "<pre>";
       // print_r($data['results']);die();
        $data['links'] = $this->pagination->create_links();
        $this->load->view("layout/header");
        $this->load->view("product/listproduct", $data);
        $this->load->view("layout/footer");
    }
}