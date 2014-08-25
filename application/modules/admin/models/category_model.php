<?php
/**
 * Created by PhpStorm.
 * User: TrongHuan
 * Date: 8/18/14
 * Time: 1:55 PM
 */
class Category_model extends CI_Model{
    protected $_table = "category";
    protected $_category_id = "category_id";

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get_all_category(){
        $this->db->select("*");
        $query = $this->db->get($this->_table);
        return $query->result_array();
    }
    public function move_category($data){
        if(!empty($data)){
            $this->db->update_batch($this->_table, $data, $this->_category_id);
        }
    }
    public function set_order($data){
        if(!empty($data)){
            $this->db->update_batch($this->_table, $data, $this->_category_id);
        }
    }

    //ThinhLD
    public function getall($id){
            $this->db->select('*');
            $this->db->from($this->_table);
            $this->db->where($this->_category_id . '!=', $id);
            $query = $this->db->get();
            $result = $query->result_array();
            return $result;
     }

   public function getOnce($id){
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where($this->_category_id, $id);
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
    // END ThinhLD
}