<?php
/**
 * Created by PhpStorm.
 * User: TrongHuan
 * Date: 8/18/14
 * Time: 1:55 PM
 */
class brand_model extends CI_Model{
    protected $_table = "brand";
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function getAllBrand(){
        $this->db->select("*");
        return $this->db->get($this->_table)->result_array();
        // $query = $this->db->get($this->_table);
        // $result = array();
        // foreach($query->result_array() as $value){
        //     $result[] = array(
        //         "brand_id" => $value['brand_id'],
        //         "brand_name" => $value['brand_name'],
        //     );
        // }
        // return $result;
    }
}