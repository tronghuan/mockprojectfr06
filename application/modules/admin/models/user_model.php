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
        $this->load->database();
    }
    public function getAll(){

    }
    public function getOnce(){

    }
    public function getUserUpdate($id){
        
        $this->db->select('user_name, user_email, user_address, user_phone, user_level, user_gender');
    	$this->db->where("user_id", $id);
    	return $this->db->get($this->_table)->row_array();
    }
    public function checkUserName($usr_name){

    }
    public function checkEmail($usr_email){

    }
    public function count_all(){

    }
    public function get_order($column, $sortType = '', $limit = '', $start = ''){

    }
    public function deleteUser($id){}
    
    
    
    public function updateUser($data, $usr_id = ''){
            if ($usr_id !== ''){
                $this->db->where("user_id",$usr_id);
                $this->db->update($this->_table, $data);
            } else{
                $this->db->insert($this->_table,$data);
            }  
        
    }
    public function is_Validate($dataUser){}
    
    public function edit($id = '')
    {
        if ($id !== '') echo $id;
    }
}