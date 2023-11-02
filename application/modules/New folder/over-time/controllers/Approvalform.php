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
        $data['title'] = 'Data Overtime';
        $data['sub_title'] = 'detail';
        
        $data['content']="over-time/approvalform";
        $data['form_id']="form-input-over-time";
        $data['table_id']="table-over-time";
        
        $data['url_add']=base_url()."over-time/approvalform/add_data";
        $data['url_edit']=base_url()."over-time/approvalform/edit_data";
        $data['url_delete']=base_url()."over-time/mainpage/delete_data";
        $data['url_load_table']=base_url()."over-time/approvalform/list_data";
        $data['url_show_data']=base_url()."over-time/approvalform/show_data";

        $mini_list = $this->global_model->general_select('m_mini_list',array('`group`'=>'APPROVE STATUS','`delete`'=>'0'),'result','','');
        $data['approve_status'] = $this->global_model->general_combo($mini_list,'yes','value','value_name','');

        $employee = $this->model->getEmployee();
        $data['list_employee'] = $this->global_model->general_combo($employee,'yes','id_user','name','');

        $this->load->view('template-admin/template',$data);
    }

    public function list_data(){
        $this->auth->restrict_ajax_login_datatable();
        
        $arr_sort = array('create_date','employee','date_assigment','expected_start','expected_end','`reason`');
        $user = $this->auth->get_data_session();
        $list_data = $this->model->get_data_overtime_approve($_GET,$arr_sort[$_GET['iSortCol_0']],$arr_sort);
        $list_data_count = $this->model->get_data_count_overtime_approve($_GET,$arr_sort);
        $html = '{
            "iTotalRecords": '.$list_data_count->count.',
            "iTotalDisplayRecords": '.$list_data_count->count.',
            "aaData": [';
            $no=$_GET['iDisplayStart']+1;
            foreach ($list_data as $row) {
                $arr_status = array(
                    array('warning','fa-clock-o'),
                    array('success','fa-check'),
                    array('danger','fa-close'),
                );

                $changed_date = '<br><i style=\"font-size:11px;\">'.(isset($row->create_date) && $row->create_date!=''?'Create from '.$this->global_model->datetotext($row->create_date):'').(isset($row->changed_date) && $row->changed_date!=''?'&nbsp;&nbsp;&nbsp;Last Update '.$this->global_model->datetotext($row->changed_date):'').'</i>';

                $expected_time = 'Expected : <br>'.$row->expected_start.' - '.$row->expected_end;
                $actual_time = ($row->approve_status1=='1'?'<br>Actual : <br>'.$row->actual_start.' - '.$row->actual_end:'');

                $html .= '
                [
                    "<input type=\"checkbox\" name=\"check_list\" value=\"'.$row->id.'\">",
                    "'.$row->employee.' <i>('.$row->position_.')</i><br><i><b>'.$this->global_model->datetotext($row->date_assigment).'</b></i><br>'.$row->reason.' '.$changed_date.'",
                    "'.$expected_time.$actual_time.'",
                    "<small class=\"label label-'.$arr_status[$row->approve_status1][0].'\"><i class=\"fa fa-fw '.$arr_status[$row->approve_status1][1].'\"></i> '.$row->approve_text1.'</small>",
                    "<small class=\"label label-'.$arr_status[$row->approve_status2][0].'\"><i class=\"fa fa-fw '.$arr_status[$row->approve_status2][1].'\"></i> '.$row->approve_text2.'</small>",
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

        if (isset($_POST['date_assigment'])) {
            $_POST['date_assigment'] = $this->global_model->texttodate($_POST['date_assigment']);
        }
        $data_post['approve_by1'] = $user->id_user;
        $data_post['approve_date1'] = $date." ".$time;
        $data_post['approve_by2'] = $user->id_user;
        $data_post['approve_date2'] = $date." ".$time;

        if ($_POST['id']=='') {
            $_POST['create_date'] = $date." ".$time;
            $_POST['create_by'] = $user->id_user;
            $save_id = $this->global_model->general_add($_POST,'tb_over_time');
        }
        else{
            $_POST['changed_date'] = $date." ".$time;
            $_POST['changed_by'] = $user->id_user;
            $this->global_model->general_update($_POST,'tb_over_time',array('id'=>$_POST['id']));
            $save_id = $_POST['id'];
        }

        if ($save_id) {
            $arr = array(
                'submit'    => '1',
                'id' => $save_id,
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

    function show_data(){
        $user = $this->auth->get_data_session();

        $data_row1 = $this->global_model->general_select('tb_over_time',array('`id`'=>$_POST['id']),'row','','');
        $data_row2 = $this->global_model->general_select('rbac_user_detail',array('`id_user`'=>$data_row1->approve_by2),'row','','');

        $arr = array();
        foreach ($data_row1 as $key => $value) {
            $arr[$key] = ($value!=''?$value:'-');
        }
        $arr['date_assigment'] = $this->global_model->datetotext(@$data_row1->date_assigment);

        $arr['actual_start'] = ($data_row1->actual_start!='' && $data_row1->actual_start!='00:00:00'?$data_row1->actual_start:'');
        $arr['actual_end'] = ($data_row1->actual_end!='' && $data_row1->actual_end!='00:00:00'?$data_row1->actual_end:'');
        
        if ($data_row1->create_by==$user->id_user) {
            $arr['create_by_me'] = "true";
        }
        else{
            $arr['create_by_me'] = "false";   
        }

        echo json_encode($arr);
    }
}
