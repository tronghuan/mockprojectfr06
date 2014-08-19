<?php
/**
 * Created by PhpStorm.
 * User: TrongHuan
 * Date: 8/18/14
 * Time: 1:55 PM
 */
class Brand_model extends CI_Model{
    protected $_table = 'brand';
    protected $_primary = 'brand_id';
    public function __construct(){
        parent::__construct();
    }
    public function getAll(){

    }
    public function getOnce($id){
        $this->db->select('*');
        $this->db->from('brand');
        $this->db->where('brand_id', $data);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function delete($id){

    }
    public function update($id, $data){
        $this->db->where($this->_primary,$id);
        $this->db->update($this->_table, $data);
    }


}