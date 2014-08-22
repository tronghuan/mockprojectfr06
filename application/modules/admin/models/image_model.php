<?php
/**
 * Created by PhpStorm.
 * User: TrongHuan
 * Date: 8/18/14
 * Time: 1:56 PM
 */ 
class image_model extends CI_Model{
	protected $_table = "image";
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function getAllImage(){
		return $this->db->get($this->_table)->result_array();
	}
	public function getImageById($imageId){
		$this->db->where('image_id', $imageId);
		return $this->db->get($this->_table)->row_array();
	}
}