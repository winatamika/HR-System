<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rbac_permission extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->auth->check_login();
        
        if(!$this->auth->hasPrivilege("ViewPermission")){
            redirect('home','refresh');
        }

        $data['ico'] = '<i class="fa fa-fw fa-magic"></i>';
        $data['title'] = 'Master Permission';
        $data['sub_title'] = 'role based access control';
        
        $data['content']="admin-rbac/rbac_permission";
        $data['form_id']="form-input-rbac-permission";
        $data['table_id']="table-rbac-permission";
        
        $data['url_add']=base_url()."admin-rbac/rbac_permission/add_permission";
        $data['url_edit']=base_url()."admin-rbac/rbac_permission/edit_permission";
        $data['url_delete']=base_url()."admin-rbac/rbac_permission/delete_permission";
        $data['url_load_table']=base_url()."admin-rbac/rbac_permission/list_permission";
        $data['url_show_data']=base_url()."admin-rbac/rbac_permission/show_permission";
        $data['combo_menu'] = $this->build_header_menu($this->rbac_model->load_menu());
        $this->load->view('template-admin/template',$data);
    }

    function build_header_menu($arrs, $parent=0, $level=0){
        $init = "";
        foreach ($arrs as $arr) {
            if ($arr['parent'] == $parent) {
                $init .= '<option value="'.$arr['id_menu'].'">'.$arr['text'].'</option>';
                if ($arr['parent']==0) {
                    $init .= '<optgroup label="'.$arr['text'].'">';
                    $init .= $this->build_header_menu($arrs, $arr['id_menu'], $level+1);
                    $init .= '</optgroup>';
                }
            }
        }
        return $init;
    }

    public function list_permission(){
        $this->auth->restrict_ajax_login_datatable();
        
        $arr_sort = array('perm_id','perm_desc','perm_detail','text','`group`');
        $list_permission = $this->rbac_model->get_data_perm($_GET,$arr_sort[$_GET['iSortCol_0']],$arr_sort);
        $list_permission_count = $this->rbac_model->get_data_count_perm($_GET,$arr_sort);
        $html = '{
            "iTotalRecords": '.$list_permission_count->count.',
            "iTotalDisplayRecords": '.$list_permission_count->count.',
            "aaData": [';
            $no=$_GET['iDisplayStart']+1;
            foreach ($list_permission as $row) {
                $html .= '
                [
                    "<input type=\"checkbox\" name=\"check_list\" value=\"'.$row->perm_id.'\">",
                    "'.$row->perm_desc.'",
                    "'.$row->perm_detail.'",
                    "'.$row->menu.'",
                    "'.$row->group.'",
                    "<button type=\"button\" class=\"btn btn-primary btn-flat btn-sm btn_table_edit\" onclick=\"show_permission('.$row->perm_id.');\" title=\"view / edit\"><i class=\"fa fa-fw fa-edit\"></i></button>"
                ],';
                $no++;
            }
        if (count($list_permission)!=0) {
            $html = substr($html, 0, -1).']}';
        }
        else{
            $html .= ']}';
        }
        echo $html;
    }

    function add_permission(){
        $this->auth->restrict_ajax_login();

        $user = $this->auth->get_data_session();

        date_default_timezone_set('Asia/Makassar');
        $date=date("Y-m-d");
        $time=date("H:i:s");

        if ($_POST['perm_id']=='') {
            $_POST['create_date'] = $date." ".$time;
            $_POST['create_by'] = $user->id_user;
            $perm_id = $this->global_model->general_add($_POST,'rbac_permissions');
        }
        else{
            $_POST['changed_date'] = $date." ".$time;
            $_POST['changed_by'] = $user->id_user;
            $this->global_model->general_update($_POST,'rbac_permissions',array('perm_id'=>$_POST['perm_id']));
            $perm_id = $_POST['perm_id'];
        }

        if ($perm_id) {
            $arr = array(
                'submit'    => '1',
                'perm_id' => $perm_id,
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

    function show_permission(){
        $data_perm = $this->global_model->general_select('rbac_permissions',array('`perm_id`'=>$_POST['id']),'row','','');

        $arr = array();
        foreach ($data_perm as $key => $value) {
            $arr[$key] = $value;
        }

        echo json_encode($arr);
    }

    function delete_permission(){
        $this->auth->restrict_ajax_login();
        
        $user = $this->auth->get_data_session();

        $id = $_POST['id'];

        date_default_timezone_set('Asia/Makassar');
        $date=date("Y-m-d");
        $time=date("H:i:s");

        $data_post['delete'] = '1';
        $data_post['changed_date'] = $date." ".$time;
        $data_post['changed_by'] = $user->id_user;

        $result = $this->global_model->general_update($data_post,'rbac_permissions',array('perm_id'=>$id));

        if ($result) {
            $arr = array(
                'submit'    => '1',
                'perm_id' => $result,
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
