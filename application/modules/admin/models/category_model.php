<?php

class Category_model extends CI_Model{
    protected $_table = 'category';
    protected $_primary = 'category_id';
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function getall($id){
            $this->db->select('*');
            $this->db->from('category');
            $this->db->where('category_id !=', $id);
            $query = $this->db->get();
            $result = $query->result_array();
            return $result;
     }

   public function getOnce($id){
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('category_id', $id);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    /** public function delete($id){

    }*/
   public function update($data, $id){
        $this->db->where($this->_primary,$id);
        $this->db->update($this->_table, $data);
   }
} 