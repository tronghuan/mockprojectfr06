<?php
/**
 * Created by PhpStorm.
 * User: TrongHuan
 * Date: 8/18/14
 * Time: 1:54 PM
 */
class User extends AdminBaseController{
    function __construct(){
        parent::__construct();
        $this->load->helper("url");
        $this->load->library("form_validation");
        $this->load->model("user_model");
    }
    public function index(){

    }
    public function listuser(){

    }
    public function insertUser(){

    }
    public function editUser(){

    }
    public function delete(){
        $id = $this->uri->segment(4);
        $this->user_model->deleteUser($id);
        redirect(base_url()."admin/user/listuser");
        exit();
    }
    public function update(){

    }
    public function login(){
        if($this->input->post("btnLogin")){
            $this->form_validation->set_rules('txtUser', 'Username', 'trim|requuired');
            $this->form_validation->set_rules('txtPass', 'Password', 'trim|required|min_length[5]|max_length[12]');
            $this->form_validation->set_message("required", "%s không được bỏ trống");
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run()){
                $dataUser = array(
                    "username" => $this->input->post("txtUser"),
                    "password" => md5($this->input->post("txtPass")),
                );
                $check = $this->user_model->isValidate($dataUser);
                if($check){
                    $_SESSION['user'] = $check;
                    redirect(base_url('index.php/admin/home/index'));
                }else {
//                    $this->_check = false;
                    echo "That bai";
                }

            }
        }
        $this->load->view("user/loginview");
    }
    public function logout(){
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
        }
        redirect(base_url('admin/user/index'));
    }
    public function checkFormInput(){
        $this->form_validation->set_rules('usr_name','Username', 'required|min_length[6]');
        //$this->form_validation->set_rules('usr_password','Password', 'required|min_length[6]');
        //$this->form_validation->set_rules('usr_retype_password','Retype-Password', 'required|matches[usr_retype_password]');
        $this->form_validation->set_rules('usr_email','Email', 'required|valid_email');
        $this->form_validation->set_rules('usr_address','Address', 'required');
        $this->form_validation->set_rules('usr_phone','Phone', 'required|numeric|min_length[9]|max_length[11]');
        $this->form_validation->set_rules('usr_gender','Gender', 'required');

        $this->form_validation->set_message("required","%s không được bỏ trống");
        $this->form_validation->set_message("alpha_numeric","%s chỉ được chứa chữ cái và số");
        $this->form_validation->set_message("min_length","%s không được nhỏ hơn %d ký tự");
        $this->form_validation->set_message("max_length","%s không được lớn hơn %d ký tự");
        $this->form_validation->set_message("matches","%s không khớp");
        $this->form_validation->set_message("valid_email","%s không đúng định dạng");
        $this->form_validation->set_message("numeric","%s phải là số");
        $this->form_validation->set_error_delimiters("<span class='error'>","</span>");
    }
}