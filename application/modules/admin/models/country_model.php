<?php
/**
 * Created by PhpStorm.
 * User: TrongHuan
 * Date: 8/18/14
 * Time: 1:56 PM
 */ 
class country_model extends CI_Model{
	protected $_table = "country";
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function getAllCountry(){
		return $this->db->get($this->_table)->result_array();
	}
}