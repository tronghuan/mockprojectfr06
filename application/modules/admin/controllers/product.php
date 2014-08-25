<?php

class product  extends  CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("product_model");
        $this->load->model("images_model");
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
    }
    public function index(){
        $this->load->view('product_update');
    }

   public function update(){
        $id = $this->uri->segment(3);
        $data['single_product'] = $this->product_model->getOnce($id);
        $data['list_category']=$this->product_model->getAllCategory();
        $data['list_brand']=$this->product_model->getAllBrand();
        $data['check_cate']=$this->product_model->getProduct_Cate($id);

        foreach ($data['single_product'] as $product);
        $image_id = $product['product_mainImageId'];
        $data['image_all'] = $this->images_model->get_images_other($id);
        $data['count']= $this->images_model->count_image($id);
        if($image_id !== NULL){
            $data['image_main'] = $this->images_model->get_images($id,$image_id);
        }
        if($data['image_all'] == NULL){
            unset($data['image_all']);
        }else{
            $data['image_all'] = $this->images_model->get_images_other($id);
        }

       if($this->input->post("Upload")){


          $this->images_model->do_upload($id);
           redirect(base_url().'index.php/product/update/'.$id);


       }
       if($this->input->post('update') != NULL){
           $name= $this->input->post('txt_name');
           $price= $this->input->post('txt_price');
           $sale= $this->input->post('txt_sale');
           $brand= $this->input->post('Brand');
           $desc = $this->input->post('txt_desc');
           $images= $this->input->post('img_box');
           $data_product = array(
               'product_name' => $name,
               'product_desc' => $desc,
               'product_price' => $price,
               'product_sale' => $sale,
               'brand_id' => $brand,
               'product_mainImageId' => $images
            );

            $category_id = $this->input->post('checkbox');
                foreach($category_id as $categoryid){
            $category[] = array(
                'category_id' => $categoryid,
                'product_id' => $id);
                }
            $this->product_model->delete_re($id);
            foreach($category as $value){
            $this->product_model->update_category_product($value);
            }
            $this->product_model->update($data_product,$id);

           echo "<script>alert('bạn đã update thành công')</script>";
           redirect(base_url().'index.php/product/update/'.$id);

       }else{

       }
             $this->load->view('product_update',$data);

    }

   public function delete_images(){
        $image_id = $this->uri->segment(3);
        $data['images'] = $this->images_model->getMainImages($image_id);

        foreach($data['images'] as $value);
                $name = $value['image_path'];
                   $product_id = $value['product_id'];
                $this->images_model->del_image($name,$product_id);
                $this->images_model->del_id($image_id);
       redirect(base_url().'index.php/product/update/'.$product_id);
   }



} 