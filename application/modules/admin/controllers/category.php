<?php
/**
 * Created by PhpStorm.
 * User: CITA
 * Date: 20/08/14
 * Time: 09:20
 */

class Category  extends  CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("Category_model");
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));

    }
    public function index(){
      //Blank

    }
    public function listall(){
        $data['category_list'] = $this->Category_model->listall();
        $this->load->view('Category_view', $data);

    }
    public function update(){
        $id = $this->uri->segment(3);
        $data['single_category'] = $this->Category_model->getOnce($id);
        $data['all_category']=$this->Category_model->getall($id);


        if($this->input->post('submit') != NULL){
            $name = $this->input->post('txt_category');
            $parent = $this->input->post('Parent');
            $this->form_validation->set_rules("txt_category","Name", "required");
            $this->form_validation->set_message("required", "%s Không được bỏ trống");
            $this->form_validation->set_message("is_unique", "%s Đã trùng");
            if ($this->form_validation->run() == FALSE){


            }else{

                if($parent == 0){

                    $data = array(
                    'category_name' => $name,
                    'category_parentId' => NULL
                    );
                }else{
                $data = array(
                'category_name' => $name,
                'category_parentId' => $parent
            );
                }
            $this->Category_model->update($data,$id);
                echo "Đã upadte thành công";
        }
            }

        $this->load->view('Category_update', $data);

    }

} 