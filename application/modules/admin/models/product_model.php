<?php
/**
 * Created by PhpStorm.
 * User: TrongHuan
 * Date: 8/18/14
 * Time: 1:55 PM
 */
class Product_model extends CI_Model{
    protected $_table = "product";
    public  function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function getAllProduct(){
        return $this->db->get($this->_table)->result_array();
    }
    public function countAllProduct(){
        return $this->db->count_all_results($this->_table);
    }
    public function fetch_product($limit, $start){
        $this->db->limit($limit, $start);
        return $this->db->get($this->_table, $limit, $start)->result_array();
//        if($query->num_rows() > 0);{
//            foreach($query->result() as $row){
//                $data[] = $row;
//            }
//            return $data;
//        }
//        return false;
    }
}