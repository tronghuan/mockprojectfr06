<?php
/**
 * Created by PhpStorm.
 * User: TrongHuan
 * Date: 8/18/14
 * Time: 1:55 PM
 */
class Brand_model extends CI_Model{
    protected $_table = 'tbl_brand';
    protected $_primary = 'brand_id';
    public function __construct(){
        parent::__construct();
    }
    public function getAll(){

    }
    public function getOnce($id){
        $this->db->where("brand_id = $id");
        return $this->db->get($this->_table)->row_array();
    }

    public function delete($id){
        $this->db->where($this->_primary,$id);
        $this->db->delete($this->_table);
    }
    public function update($data, $id){
        $this->db->where($this->_primary,$id);
        $this->db->update($this->_table, $data);
    }


}