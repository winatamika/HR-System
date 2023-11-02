<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approvalform extends CI_Controller {

    public function __construct(){
        parent::__construct();
        
        $this->load->library('upload');
        $this->load->model('model');
    }

    public function index(){
        $this->auth->check_login();

        if(!$this->auth->hasPrivilege("ViewTimeOffRequest") || (!$this->auth->hasPrivilege('ViewLeaveAllChild') && !$this->auth->hasPrivilege('ViewLeaveDownChild'))){
            redirect('home','refresh');
        }

        $user = $this->auth->get_data_session();

        $data['ico'] = '<i class="fa fa-fw fa-list-alt"></i>';
        $data['title'] = 'Data Time Off Request';
        $data['sub_title'] = 'detail';
        
        $data['content']="annual-leave/approvalform";
        $data['form_id']="form-input-annual-leave";
        $data['table_id']="table-annual-leave";
        
        $data['url_add']=base_url()."annual-leave/approvalform/add_data";
        $data['url_edit']=base_url()."annual-leave/approvalform/edit_data";
        $data['url_delete']=base_url()."annual-leave/mainpage/delete_data";
        $data['url_load_table']=base_url()."annual-leave/approvalform/list_data";
        $data['url_show_data']=base_url()."annual-leave/approvalform/show_data";

        $mini_list = $this->global_model->general_select('m_mini_list',array('`group`'=>'REASON','`delete`'=>'0'),'result','','');
        $data['reason'] = $this->global_model->general_combo($mini_list,'yes','value','value_name','');

        $mini_list = $this->global_model->general_select('m_mini_list',array('`group`'=>'APPROVE STATUS','`delete`'=>'0'),'result','','');
        $data['approve_status'] = $this->global_model->general_combo($mini_list,'yes','value','value_name','');

        $this->load->view('template-admin/template',$data);
    }

    public function list_data(){
        $this->auth->restrict_ajax_login_datatable();

        $arr_sort = array('create_date','employee','date_from','date_to','reason','`approve_text`');
        $list_data = $this->model->get_data_annual_approve($_GET,$arr_sort[$_GET['iSortCol_0']],$arr_sort);
        $list_data_count = $this->model->get_data_count_annual_approve($_GET,$arr_sort);
        $html = '{
            "iTotalRecords": '.$list_data_count->count.',
            "iTotalDisplayRecords": '.$list_data_count->count.',
            "aaData": [';
            $no=$_GET['iDisplayStart']+1;
            foreach ($list_data as $row) {
                if ($row->approve_status=='0') {
                    $app_status = array('warning','fa-clock-o');
                }
                elseif ($row->approve_status=='1') {
                    $app_status = array('success','fa-check');   
                }
                elseif ($row->approve_status=='2') {
                    $app_status = array('danger','fa-close');   
                }

                $changed_date = '<br><i style=\"font-size:11px;\">'.(isset($row->create_date) && $row->create_date!=''?'Create from '.$this->global_model->datetotext($row->create_date):'').(isset($row->changed_date) && $row->changed_date!=''?'&nbsp;&nbsp;&nbsp;Last Update '.$this->global_model->datetotext($row->changed_date):'').'</i>';

                $html .= '
                [
                    "<input type=\"checkbox\" name=\"check_list\" value=\"'.$row->id.'\">",
                    "'.$row->employee.' <i>('.$row->position_.')'.$changed_date.'</i>",
                    "'.$this->global_model->datetotext($row->date_from).'",
                    "'.$this->global_model->datetotext($row->date_to).'",
                    "'.$this->model->getWorkingDays($row->date_from,$row->date_to).' day",
                    "'.$row->reason_text.'",
                    "<small class=\"label label-'.$app_status[0].'\"><i class=\"fa fa-fw '.$app_status[1].'\"></i> '.$row->approve_text.'</small>",
                    "<button type=\"button\" class=\"btn btn-primary btn-flat btn-sm btn_table_edit\" onclick=\"show_data('.$row->id.');\" title=\"view / edit\"><i class=\"fa fa-fw fa-edit\"></i></button>"
                ],';
                $no++;
            }
        if (count($list_data)!=0) {
            $html = substr($html, 0, -1).']}';
        }
        else{
            $html .= ']}';
        }

        echo $html;
    }

    function add_data(){
        $this->auth->restrict_ajax_login();
        
        $user = $this->auth->get_data_session();

        date_default_timezone_set('Asia/Makassar');
        $date=date("Y-m-d");
        $time=date("H:i:s");

        $data_row1 = $this->global_model->general_select('tb_annual_leave',array('`id`'=>$_POST['id']),'row','','');
        $data_post_annual['id_user'] = $data_row1->id_user;
        $data_post_annual['sSearch'] = '1';
        $data_post_annual['except_date'] = $data_row1->id;
        $date_from=date_create($data_row1->date_from);
        $data_post_annual['leave_year'] = date_format($date_from,"Y");
        $leaveCount = $this->model->getCountLeave($data_post_annual);

        $total_leave_now = $this->model->getWorkingDays($data_row1->date_from,$data_row1->date_to);

        if ($_POST['approve_status']=='1') {
            if ((intval($leaveCount['total_leave'])+$total_leave_now) < intval($leaveCount['total_leave_default'])) {
                $data_post['approve_status'] = $_POST['approve_status'];
                $data_post['approve_by'] = $user->id_user;
                $data_post['approve_date'] = $date." ".$time;
                $result = $this->global_model->general_update($data_post,'tb_annual_leave',array('id'=>$_POST['id']));
            }
            else{
                $error = "your count Annual Leave has larger than total Default Leave for this year";
            }
        }
        else {
            $data_post['approve_status'] = $_POST['approve_status'];
            $data_post['approve_by'] = $user->id_user;
            $data_post['approve_date'] = $date." ".$time;
            $result = $this->global_model->general_update($data_post,'tb_annual_leave',array('id'=>$_POST['id']));
        }

        $save_id = $_POST['id'];

        if (@$result) {
            $arr = array(
                'submit'    => '1',
                'id' => $save_id,
            );
        }
        else{
            $arr = array(
                'submit'    => '0',
                'error'     => $error,
            );
        }
        echo json_encode($arr);
    }

    function show_data(){
        $data_row1 = $this->global_model->general_select('tb_annual_leave',array('`id`'=>$_POST['id']),'row','','');
        $data_row2 = $this->global_model->general_select('rbac_user_detail',array('`id_user`'=>$data_row1->id_user),'row','','');

        $arr = array();
        foreach ($data_row1 as $key => $value) {
            $arr[$key] = $value;
        }
        $arr['date_from'] = $this->global_model->datetotext(@$data_row1->date_from);
        $arr['date_to'] = $this->global_model->datetotext(@$data_row1->date_to);
        $arr['filed'] = $data_row2->name;

        $_POST['id_user'] = $data_row1->id_user;
        $_POST['sSearch'] = '1';
        $leaveCount = $this->model->getCountLeave($_POST);
        
        $arr['total_day'] = $this->model->getWorkingDays($data_row1->date_from,$data_row1->date_to);
        $arr['leave_info'] = "*** INFO : ".$leaveCount['user_name']." still has ".(intval($leaveCount['total_leave_default']) - intval($leaveCount['total_leave']))." times from a total of ".$leaveCount['total_leave_default']." times leave for this year";

        echo json_encode($arr);
    }
}
