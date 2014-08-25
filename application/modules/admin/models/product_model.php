<?php

class product_model extends CI_Model{
    protected $_table = 'product';
    protected $_primary = 'product_id';
    protected $_secondary = 'image_id';
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function getAllCategory(){
        $this->db->select('*');
        $this->db->from('category');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    public function getAllBrand(){
        $this->db->select('*');
        $this->db->from('brand');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    public function getProduct_Cate($id){
        $this->db->select('*');
        $this->db->from('productcategory');
        $this->db->where('product_id', $id);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    public function getOnce($id){
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('product_id', $id);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    public function update($data_product,$id){

        $this->db->where($this->_primary,$id);
        $this->db->update($this->_table, $data_product);
    }
    public function delete_re($id){
        $this->db->where($this->_primary,$id);
        $this->db->delete('productcategory');
    }
    public function update_category_product($value){
        $this->db->insert('productcategory',$value);
    }
} 