<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rbac_menu extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->auth->check_login();
        
        if(!$this->auth->hasPrivilege("ViewMenu")){
            redirect('home','refresh');
        }

        $data['ico'] = '<i class="fa fa-fw fa-lock"></i>';
        $data['title'] = 'Master Menu';
        $data['sub_title'] = 'role based access control';
        
        $data['content']="admin-rbac/rbac_menu";
        $data['form_id']="form-input-rbac-menu";
        $data['table_id']="table-rbac-menu";
        
        $data['url_add']=base_url()."admin-rbac/rbac_menu/add_menu";
        $data['url_edit']=base_url()."admin-rbac/rbac_menu/edit_menu";
        $data['url_sorting_menu']=base_url()."admin-rbac/rbac_menu/sorting_menu";
        $data['url_delete']=base_url()."admin-rbac/rbac_menu/delete_menu";
        $data['url_load_table']=base_url()."admin-rbac/rbac_menu/list_menu";
        $data['url_show_data']=base_url()."admin-rbac/rbac_menu/show_menu";
        $this->load->view('template-admin/template',$data);
    }

    function gen_menu(){
        $arrs = $this->rbac_model->load_menu();
        echo $this->rbac_model->build_menu1($arrs);
    }

    function get_list_header_menu(){
        $list_header = $this->rbac_model->get_header();
        echo "
            <option></option>
            <option value='header'>Header</option>";
        foreach ($list_header as $row) {
            echo "<option value=".$row->id_menu.">".$row->text."</option>";
        }
    }

    function get_list_parent_menu(){
        $header = $this->input->post('header');
        if ($header=='header') {
            echo "<option value='0'>Header</option>";
        }
        else{
            $list_header_menu = $this->rbac_model->load_menu();
            $data['id_menu'] = $header;
            $data_menu = $this->rbac_model->get_menu_byid($data);
            echo "<option></option>";
            // echo "<option value='0'>Header</option>";
            echo "<option value='".$data_menu->id_menu."'>".$data_menu->text."</option>";
            echo $this->build_header_menu($list_header_menu,$header);
        }
    }

    function build_header_menu($arrs, $parent=0, $level=0){
        $init = "";
        foreach ($arrs as $arr) {
            if ($arr['parent'] == $parent) {
                $init .= '<option value="'.$arr['id_menu'].'">'.$arr['text'].'</option>';
                $init .= $this->build_header_menu($arrs, $arr['id_menu'], $level+1);
            }
        }
        return $init;
    }

    function show_mmenu($id_menu){
        $data['id_menu'] = $id_menu;
        $data_menu = $this->rbac_model->get_menu_byid($data);
        $list_header_menu = $this->rbac_model->load_menu();
        $bapaknya = $this->menu_model->find_pat($list_header_menu,$id_menu);
        $arr = array(
            'text'          => $data_menu->text,
            'header'        => ($data_menu->parent==0?'header':$bapaknya[0]['id_menu']),
            'id_parent'     => $data_menu->parent,
            'id_menu'       => $data_menu->id_menu,
            'link'          => $data_menu->link,
            'icon'          => $data_menu->icon,
        );
        echo json_encode($arr);
    }

    function edit_menu($id){
        $this->auth->restrict_ajax_login();

        $data1['id_menu'] = $id;
        $data_menu = $this->rbac_model->get_menu_byid($data1);
        $list_header_menu = $this->rbac_model->load_menu();
        $bapaknya = $this->menu_model->find_pat($list_header_menu,$id);

        $data_post = array(
            'text' => $this->input->post('text'),
            'link' => $this->input->post('link'),
            'icon' => $this->input->post('icon'),
            // 'depth' => 0,
            // 'weight' => 0,
        );
        
        if (($this->input->post('header') != $bapaknya[0]['id_menu']) || ($this->input->post('parent') != $data_menu->parent)) {
            if ($this->input->post('header')=='header') {
                // $data_post['depth']='1';
                // $data_post['weight']='0';
                $data_post['parent']='0';
            }
            else{
                $data_post['parent']=$this->input->post('parent');
                // $get_level = $this->rbac_model->get_level($this->input->post('parent'));
                // $get_level_now = (isset($get_level->depth)?$get_level->depth:0) + 1;
                // $data_post['depth'] = $get_level_now;

                // $get_urut = $this->rbac_model->get_urut($this->input->post('parent'));
                // $get_urut_now = (isset($get_urut->weight)?$get_urut->weight:0) + 1;
                // $data_post['weight'] = $get_urut_now;
            }
        }

        $result = $this->rbac_model->edit_menu($data_post,$id);

        if ($result) {
            $arr = array(
                'submit'    => '1',
                'menu_id' => $id,
            );
        }
        else{
            $arr = array(
                'submit'    => '0',
                'error'     => 'error!!!',
            );
        }
        echo json_encode($arr);
    }

    function add_menu(){
        $this->auth->restrict_ajax_login();

        $data_post = array(
            'text' => $this->input->post('text'),
            'link' => $this->input->post('link'),
            'icon' => $this->input->post('icon'),
            'parent' => $this->input->post('parent'),
            'depth' => 0,
            'weight' => 0,
        );

        $result = $this->rbac_model->new_menu($data_post);

        $data_parent['id_menu'] = $this->input->post('parent');
        $data_menu_parent = $this->rbac_model->get_menu_byid($data_parent);

        if ($this->input->post('link')!='#') {
            $data_post1 = array(
                'perm_desc' => "View".str_replace(",","",str_replace(" ","",ucwords($this->input->post('text')))),
                'perm_detail' => "-",
                'id_menu' => $result,
                'group' => (isset($data_menu_parent->text)?$data_menu_parent->text:$this->input->post('text'))
            );

            $result1 = $this->rbac_model->insertPerm($data_post1);

            $data_post2 = array(
                'perm_desc' => "Add".str_replace(",","",str_replace(" ","",ucwords($this->input->post('text')))),
                'perm_detail' => "-",
                'group' => (isset($data_menu_parent->text)?$data_menu_parent->text:$this->input->post('text'))
            );

            $result2 = $this->rbac_model->insertPerm($data_post2);

            $data_post3 = array(
                'perm_desc' => "Edit".str_replace(",","",str_replace(" ","",ucwords($this->input->post('text')))),
                'perm_detail' => "-",
                'group' => (isset($data_menu_parent->text)?$data_menu_parent->text:$this->input->post('text'))
            );

            $result3 = $this->rbac_model->insertPerm($data_post3);

            $data_post4 = array(
                'perm_desc' => "Delete".str_replace(",","",str_replace(" ","",ucwords($this->input->post('text')))),
                'perm_detail' => "-",
                'group' => (isset($data_menu_parent->text)?$data_menu_parent->text:$this->input->post('text'))
            );

            $result4 = $this->rbac_model->insertPerm($data_post4);

            $data_post5 = array(
                'perm_desc' => "Detail".str_replace(",","",str_replace(" ","",ucwords($this->input->post('text')))),
                'perm_detail' => "-",
                'group' => (isset($data_menu_parent->text)?$data_menu_parent->text:$this->input->post('text'))
            );

            $result5 = $this->rbac_model->insertPerm($data_post5);
        }
        

        if ($result) {
            $arr = array(
                'submit'    => '1',
                'menu_id' => $result,
            );
        }
        else{
            $arr = array(
                'submit'    => '0',
                'error'     => 'error!!!',
            );
        }
        echo json_encode($arr);
    }

    function delete_menu(){
        $this->auth->restrict_ajax_login();
        
        $id = $this->input->post('id');

        $result = $this->rbac_model->delete_menu($id);
        if ($result) {
            $arr = array(
                'submit'    => '1',
                
            );
        }
        else{
            $arr = array(
                'submit'    => '0',
                'error'     => 'error!!!',
            );
        }
        echo json_encode($arr);
    }

    function sorting_menu(){
        $arr = $this->input->post('list');
        
        $no=1;
        foreach ($arr as $position => $item) :
            if($item!='null'){
                $data_post['parent'] = $item;
            }
            else{
                $data_post['parent'] = 0;
            }
            $data_post['weight'] = $no;
            $result = $this->rbac_model->edit_menu($data_post,$position);
            $no++;
        endforeach;

        
        if ($result) {
            $arr = array(
                'submit'    => '1',
                
            );
        }
        else{
            $arr = array(
                'submit'    => '0',
                'error'     => 'error!!!',
            );
        }
        echo json_encode($arr);   
    }
}
