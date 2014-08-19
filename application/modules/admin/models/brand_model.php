<?php
/**
 * Created by PhpStorm.
 * User: TrongHuan
 * Date: 8/18/14
 * Time: 1:55 PM
 */
class brand_model extends CI_Model{
    protected $_table = "tbl_brand";
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get_all_brand(){
        $this->db->select("*");
        $query = $this->db->get($this->_table);
        $result = array();
        foreach($query->result_array() as $value){
            $result[] = array(
                "brand_id" => $value['bran_id'],
                "brand_name" => $value['bran_name'],
            );
        }
        return $result;
    }
}