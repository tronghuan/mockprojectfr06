<?php
/**
 * Created by PhpStorm.
 * User: TrongHuan
 * Date: 8/18/14
 * Time: 1:55 PM
 */
class User_model extends CI_Model{
    protected $_table = 'user';
    protected $_primary = 'user_id';

    public function __construct(){
        parent::__construct();
    }
    public function getAll(){

    }
    public function getOnce($id){
        $this->db->where("user_id = $id");
        return $this->db->get($this->_table)->row_array();
    }
    public function getUserUpdate($id){

    }
    public function checkUserName($usr_name){

    }
    public function checkEmail($usr_email){

    }
    public function count_all(){

    }
    public function get_order($column, $sortType = '', $limit = '', $start = ''){

    }
    public function deleteUser($id){

        $this->db->where($this->_primary,$id);
        $this->db->delete($this->_table);
    }
    public function updateUser($data, $user_id = ''){

    }
    public function isValidate($dataUser){
        $data = $this->db->select()->where('user_name',$dataUser['username'])->where('user_password',$dataUser['password'])
            ->get($this->_table)->row_array();
        // echo $data;
        if(count($data)>0){
            return $dataUser;
        }else{
            return false;
        }
    }
}