<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rbac_role extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->auth->check_login();
        
        if(!$this->auth->hasPrivilege("ViewRoles")){
            redirect('home','refresh');
        }

        $data['ico'] = '<i class="fa fa-fw fa-key"></i>';
        $data['title'] = 'Master Role';
        $data['sub_title'] = 'role based access control';
        
        $data['content']="admin-rbac/rbac_role";
        $data['form_id']="form-input-rbac-role";
        $data['table_id']="table-rbac-role";
        
        $data['url_add']=base_url()."admin-rbac/rbac_role/add_role";
        $data['url_edit']=base_url()."admin-rbac/rbac_role/edit_role";
        $data['url_delete']=base_url()."admin-rbac/rbac_role/delete_role";
        $data['url_load_table']=base_url()."admin-rbac/rbac_role/list_role";
        $data['url_show_data']=base_url()."admin-rbac/rbac_role/show_role";
        $data['url_list_permission']=base_url()."admin-rbac/rbac_role/list_permission";
        $this->load->view('template-admin/template',$data);
    }

    public function list_role(){
        $this->auth->restrict_ajax_login_datatable();
        
        $arr_sort = array('role_id','role_name','role_desc');
        $list_role = $this->rbac_model->get_data_role($_GET,$arr_sort[$_GET['iSortCol_0']],$arr_sort);
        $list_role_count = $this->rbac_model->get_data_count_role($_GET,$arr_sort);
        $html = '{
            "iTotalRecords": '.$list_role_count->count.',
            "iTotalDisplayRecords": '.$list_role_count->count.',
            "aaData": [';
            $no=$_GET['iDisplayStart']+1;
            foreach ($list_role as $row) {
                $html .= '
                [
                    "<input type=\"checkbox\" name=\"check_list\" value=\"'.$row->role_id.'\">",
                    "'.$row->role_name.'",
                    "'.$row->role_desc.'",
                    "<button type=\"button\" class=\"btn btn-primary btn-flat btn-sm btn_table_edit\" onclick=\"show_role('.$row->role_id.');\" title=\"view / edit\"><i class=\"fa fa-fw fa-edit\"></i></button>"

                ],';
                $no++;
            }
        if (count($list_role)!=0) {
            $html = substr($html, 0, -1).']}';
        }
        else{
            $html .= ']}';
        }
        echo $html;
    }

    function add_role(){
        $this->auth->restrict_ajax_login();

        $user = $this->auth->get_data_session();

        date_default_timezone_set('Asia/Makassar');
        $date=date("Y-m-d");
        $time=date("H:i:s");

        $arr_perm_ = $_POST['role_perm_check'];

        //insert role---------------------------------------
        unset($_POST['role_perm_check']);

        if ($_POST['role_id']=='') {
            $_POST['create_date'] = $date." ".$time;
            $_POST['create_by'] = $user->id_user;
            $role_id = $this->global_model->general_add($_POST,'rbac_roles');
        }
        else{
            $_POST['changed_date'] = $date." ".$time;
            $_POST['changed_by'] = $user->id_user;
            $this->global_model->general_update($_POST,'rbac_roles',array('role_id'=>$_POST['role_id']));
            $role_id = $_POST['role_id'];
        }

        //insert role permission-----------------------------------------
        $deleteRolePermission = $this->global_model->general_delete(array('role_id'=>$role_id),'rbac_role_perm');
        if (count($arr_perm_) > 0) {
            for ($i=0; $i < count($arr_perm_); $i++) { 
                $data_post_ = array(
                    'role_id' => $role_id,
                    'perm_id' => $arr_perm_[$i],
                );
                $this->global_model->general_add($data_post_,'rbac_role_perm');
            }
        }

        if ($role_id) {
            $arr = array(
                'submit' => '1',
                'role_id' => $role_id,
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

    function show_role(){
        $data_role = $this->global_model->general_select('rbac_roles',array('`role_id`'=>$_POST['id']),'row','','');

        $arr = array();
        foreach ($data_role as $key => $value) {
            $arr[$key] = $value;
        }

        echo json_encode($arr);
    }

    function delete_role(){
        $this->auth->restrict_ajax_login();
        
        $user = $this->auth->get_data_session();

        $id = $_POST['id'];

        date_default_timezone_set('Asia/Makassar');
        $date=date("Y-m-d");
        $time=date("H:i:s");

        $data_post['delete'] = '1';
        $data_post['changed_date'] = $date." ".$time;
        $data_post['changed_by'] = $user->id_user;

        $result = $this->global_model->general_update($data_post,'rbac_roles',array('role_id'=>$id));

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

    function list_permission(){
        $data_post = array (
            'role_id' => $this->input->post('id_role')
        );
        $data_role = $this->rbac_model->get_data_role_perm($data_post);
        $list_permission = '
            <ul>
                <li>
                    <div class="group">
                    <div class="switch">
                        <input type="checkbox" class="cmn-toggle cmn-toggle-yes-no" id="checkAll" onChange="checkcentang();"> 
                        <label for="checkAll" data-on="Select All" data-off="Deselect All"></label>
                    </div>
                    <div class="perm"></div>
                </li>
            </ul>';

        $list_permission .= '
            <ul>';
                foreach ($data_role as $row) {
                    $list_permission .= '
                    <li>
                        <div class="group" style="margin-bottom: 10px;"><i class="fa fa-fw fa-thumb-tack"></i> '.$row->group.'</div>
                        <div class="perm">';
                            $arr_perm = explode(',', $row->daftar_perm);
                            for ($i=0; $i < count($arr_perm); $i++) {
                                $arr_perm_detail = explode('-', $arr_perm[$i]); 
                                $list_permission .= '    
                                <div class="checkbox">
                                    <label>
                                        <div class="switch" style="margin-bottom: 2px; display: inline-block;">
                                            <input type="checkbox" class="cmn-toggle cmn-toggle-round-flat" id="p_'.$arr_perm_detail[0].'" name="role_perm_check[]" value="'.$arr_perm_detail[0].'" '.($arr_perm_detail[2]==1?'checked':'').'>
                                            <label for="p_'.$arr_perm_detail[0].'"></label>
                                        </div>
                                        <span style="margin-top: -46px; display: block; margin-left: 55px; margin-bottom: 7px;">'.$arr_perm_detail[1].'</span>
                                    </label>
                                </div>';
                            }
                            $list_permission .= '
                        </div>
                    </li>';
                }
        $list_permission .= '
            </ul>
        ';
        $arr = array(
            'list_permission' => $list_permission,
        );

        echo json_encode($arr);
    }
}
