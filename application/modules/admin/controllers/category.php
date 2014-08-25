<meta charset="utf-8" />
<?php
/**
 * Created by PhpStorm.
 * User: TrongHuan
 * Date: 8/18/14
 * Time: 1:54 PM
 */
class Category extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model("category_model");
        $this->load->helper("url");
    }
    //HuanDT Account1
    public function move(){
        $result = array();
//        if($this->input->post("submit")){
//            $data = $_POST['data'];
//            $result['datasent'] = json_decode($data);
//        }
        $result['info'] = $this->category_model->get_all_category();
        $result['listitem'] = $this->listCat($result['info']);
        $result['title'] = "Move categories";
        // $result['template'] = "category/category_move";//++++++++++
        $this->load->view("layout/header");
        $this->load->view("category/category_move", $result);
        $this->load->view("layout/footer");
    }
    public function listCat($data, $parent = 0, $lvl = 1){
        $ret = "<ol class='dd-list'>";
        $temp = array();
        foreach($data as $d){
            foreach($d as $key => $value){
                if(!isset($temp[$key])){
                    $temp[$key] = array();
                }
                $temp[$key][] = $value;
            }
        }
        $orderby = "category_order";
        array_multisort($temp[$orderby], SORT_ASC, $data);
        foreach($data as $key=>$value){
            if($parent == $value['category_parentId']){
                $ret .= "<li class='dd-item' data-id='".
                    $value['category_id']."'><div class='dd-handle'>".
                    $value['category_name']."</div>";
                $sub = $this->listCat($data, $value['category_id'], $lvl+1);
                if($sub != "<ol class='dd-list'></ol>"){
                    $ret .= $sub;
                }
                $ret .= "</li>";
            }
        }
        return $ret."</ol>";
    }
    public function test(){
        $cate = $this->category_model->get_all_category();
        $ret = $this->listCat($cate);
        echo $ret; die();
    }
    public function move_process(){
        $all = $this->category_model->get_all_category();
        $update = $_POST['data'];
        $o = 1;
        $order = array();
        $parent = array();
        foreach($update as $key => $value){
            foreach($all as $a => $b){
                $key = filter_var($key, FILTER_SANITIZE_NUMBER_INT);
                if($key == $b['category_id']){
                    if($value != $b['category_parentId']){
                        $parent[] = array(
                            "category_id" => $key,
                            "category_parentId" => $value,
                        );
                    }
                    $order[] = array(
                        "category_id" => $key,
                        "cate_orderby" => $o++,
                    );
                    continue;
                }
            }
        }
        $this->category_model->move_category($parent);
        $this->category_model->set_order($order);
    }
    // END HuanDT
    // Start ThinhLD
    public function update(){
        $id = $this->uri->segment(3);
        $data['single_category'] = $this->Category_model->getOnce($id);
        $data['all_category']=$this->Category_model->getall($id);


        if($this->input->post('submit') != NULL){
            $name = $this->input->post('txt_category');
            $parent = $this->input->post('Parent');
            $this->form_validation->set_rules("txt_category","Name", "required");
            $this->form_validation->set_message("required", "%s Không được bỏ trống");
            $this->form_validation->set_message("is_unique", "%s Đã trùng");
            if ($this->form_validation->run() == FALSE){


            }else{

                if($parent == 0){

                    $data = array(
                    'category_name' => $name,
                    'category_parentId' => NULL
                    );
                }else{
                    $data = array(
                        'category_name' => $name,
                        'category_parentId' => $parent
                    );
                }
                $this->Category_model->update($data,$id);
                echo "Đã upadte thành công";
            }
        }
        $data['title'] = "Update category";
        $this->load->view("layout/header", $data);
        $this->load->view('category/category_update', $data);
        $this->load->view("layout/footer", $data);
    }
    // END ThinhLD
}