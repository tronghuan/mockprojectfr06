<?php
    class bran_model extends CI_Model{
        protected $_table = "brand";
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }
        
        public function delete($id){
            $this->db->where('brand_id', $id);
            $this->db->delete($this->_table);
        }
    }