<?php
/**
 * Created by PhpStorm.
 * User: TrongHuan
 * Date: 8/18/14
 * Time: 1:56 PM
 */ 
class Image_model extends CI_Model{
	protected $_table = "image";
	public function __construct(){

	}
	public function getAllImage(){
		$this->db->select("*");
        $query = $this->db->get($this->_table);
        $result = array();
        foreach($query->result_array() as $value){
            $result[] = array(
                "image_id" => $value['image_id'],
                "image_name" => $value['image_path'],
            );
        }
        return $result;
	}
}