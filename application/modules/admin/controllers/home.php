<?php
class home extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }
    public function index()
    {
        $data = array();
        $this->load->view('layout/header');
        //$this->load->view('home/home', $data);
        $this->load->view('layout/footer');
    }
}