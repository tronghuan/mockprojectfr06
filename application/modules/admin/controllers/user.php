<?php
/**
 * Created by PhpStorm.
 * User: TrongHuan
 * Date: 8/18/14
 * Time: 1:54 PM
 */
class User extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper("url", "form");
        $this->load->library("form_validation");
        $this->load->model("user_model");
        $this->load->library('pagination');
        //$this->load->model("config_model");

    }
    public function index(){
        redirect(base_url("admin/user/listuser"));
    }
    public function listuser(){
        $sortType = ($this->uri->segment(5)) ? $this->uri->segment(5) : 'asc';
        $column = ($this->uri->segment(4)) ? $this->uri->segment(4) : 'user_id';

        //$config['per_page'] = $this->config_model->getPerpage();
        $page = ($this->uri->segment(6)) ? $this->uri->segment(6) : 1;
        //$config['base_url']   = base_url("admin/user/listuser/$column/$sortType/");

        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 6;
        $config['next_link'] = "Sau";
        $config['prev_link'] = "Trước";
        //$this->pagination->initialize($config); 

        //$start = ($page - 1) * $config['per_page'];

        //$data['listuser'] = $this->user_model->get_order($column,$sortType,$start,$config['per_page']);

        //$data['link'] = $this->pagination->create_links();
        //$data['per'] = $config['per_page'];
        $data['sortType'] = $sortType;
        // $data['show_all'] = $_SESSION['show_all'];
        $data['column'] = $column;

        $data['template'] = "user/listuser";
        $this->load->view("layout/layout",$data);

    }
    public function insertUser(){

    }
    public function editUser(){

    }
    public function delete(){

    }
    public function update(){
        $user_id = $this->uri->segment(4);
        $data['userInfo'] = $this->user_model->getUserUpdate($user_id);

        if($this->input->post("ok")){

            $this->checkFormInput();

            $this->form_validation->set_error_delimiters("<span class='error'>", "</span>");
            //echo "1";
            //if($this->form_validation->run()){
            	//$pass = $this->input->post("user_password");
            	//if($pass != null){
            		
            	//$this->form_validation->set_rules('user_password','Password', 'min_length[6]');
            	//if($this->form_validation->run()){
                 $dataUser = array(
                                "user_name"     =>$this->input->post("user_name"),
                                "user_password" =>md5($this->input->post("user_password")),
                                "user_email"    =>$this->input->post("user_email"),
                                "user_address"  =>$this->input->post("user_address"),
                                "user_phone"    =>$this->input->post("user_phone"),
                                "user_gender"   =>$this->input->post("user_gender"),
                                "user_level"    =>$this->input->post("user_level")
                            );
                        
                 $this->user_model->updateUser($dataUser,$user_id);
                 //redirect(base_url("index.php/admin/user/listuser"));
                 echo "update thanh cong";
            	
//                redirect(base_url("index.php/admin/user/listuser"));
            //}
        }
        
        $data['template'] = "user/update";
        $this->load->view("layout/header");
        $this->load->view("user/update", $data);
        $this->load->view("layout/footer");
  }

    public function login(){

    }
    public function logout(){

    }
    public function checkFormInput(){

    }
}