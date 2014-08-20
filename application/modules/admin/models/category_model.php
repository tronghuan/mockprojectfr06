<?php
class Category_model extends CI_Model{
    protected $_table = "category";
    protected $_cate_id = "category_id";
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_all_category(){
        $this->db->select("*");
        $query = $this->db->get($this->_table);
        return $query->result_array();
    }
    
    public function delete_category($id){
        $this->db->where($this->_cate_id,$id);
        $this->db->delete($this->_table);
    }
}