<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mainpage extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->library('upload');
        $this->load->model('model');
    }

    function init_data(){
        $this->auth->check_login();
        
        if(!$this->auth->hasPrivilege("ViewTimeOffRequest")){
            redirect('home','refresh');
        }

        $user = $this->auth->get_data_session();

        $data['ico'] = '<i class="fa fa-fw fa-rocket"></i>';
        $data['title'] = 'Overtime Control';
        $data['sub_title'] = 'detail';
        
        $data['content']="over-time/view";
        $data['form_id']="form-input-over-time";
        $data['table_id']="table-over-time";
        
        $data['url_add']=base_url()."over-time/mainpage/add_data";
        $data['url_edit']=base_url()."over-time/mainpage/edit_data";
        $data['url_delete']=base_url()."over-time/mainpage/delete_data";
        $data['url_load_table']=base_url()."over-time/mainpage/list_data";
        $data['url_show_data']=base_url()."over-time/mainpage/show_data";
        $data['url_get_count_overtime']=base_url()."over-time/mainpage/getCountOvertime";

        $mini_list = $this->global_model->general_select('m_mini_list',array('`group`'=>'REASON','`delete`'=>'0'),'result','','');
        $data['reason'] = $this->global_model->general_combo($mini_list,'yes','value','value_name','');

        $mini_list = $this->global_model->general_select('m_mini_list',array('`group`'=>'APPROVE STATUS','`delete`'=>'0'),'result','','');
        $data['approve_status'] = $this->global_model->general_combo($mini_list,'yes','value','value_name','');

        return $data;
    }

    public function index(){
        $data = $this->init_data();
        if (isset($_GET['x'])) {
            $data_row1 = $this->global_model->general_select('tb_over_time',array('md5(`id`)'=>$_GET['x']),'row','','');
            $user = $this->auth->get_data_session();
            if (@$data_row1->id_user==$user->id_user) {
                $data['xapprove_status1'] = $data_row1->approve_status1;    
                $data['xid'] = $data_row1->id;
            }
        }
        $this->load->view('template-admin/template',$data);
    }

    public function list_data(){
        $this->auth->restrict_ajax_login_datatable();
        
        $arr_sort = array('create_date','date_assigment','expected_start','expected_end','`reason`');
        $user = $this->auth->get_data_session();
        $_GET['id_user'] = $user->id_user;
        $_GET['claim'] = 'false';
        $list_data = $this->model->get_data_overtime($_GET,$arr_sort[$_GET['iSortCol_0']],$arr_sort);
        $list_data_count = $this->model->get_data_count_overtime($_GET,$arr_sort);
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

                $changed_date = '<i style=\"font-size:11px;\">'.(isset($row->create_date) && $row->create_date!=''?'<br>Create from '.$this->global_model->datetotext($row->create_date):'').(isset($row->changed_date) && $row->changed_date!=''?'&nbsp;&nbsp;&nbsp;Last Update '.$this->global_model->datetotext($row->changed_date):'').'</i>';

                $valid_date = '<i style=\"font-size:11px;\">'.(isset($row->valid_start) && $row->valid_start!='' && $row->approve_status2=='1'?'<br>Can be claim from '.$this->global_model->datetotext($row->valid_start):'').(isset($row->valid_end) && $row->valid_end!='' && $row->approve_status2=='1'?'&nbsp;&nbsp;&nbsp;until '.$this->global_model->datetotext($row->valid_end):'').'</i>';

                $expected_time = 'Exp : '.$row->expected_start.' - '.$row->expected_end;
                $actual_time = ($row->approve_status1=='1'?'<br>Act : '.$row->actual_start.' - '.$row->actual_end:'');
                $tot_time = ($row->approve_status2=='1'?'<br>Time Aprv : <b>'.$this->global_model->view_time($row->valid_time).'</b>':'');
                $leftover = ($row->approve_status2=='1'?'&nbsp;&nbsp;&nbsp;Clm left : <b>'.$this->model->get_leftover($row->id).'</b>':'');

                $edit_btn = '<button type=\"button\" class=\"btn btn-primary btn-flat btn-sm btn_table_edit\" onclick=\"show_data('.$row->id.');\" title=\"view / edit actual time work\"><i class=\"fa fa-fw fa-clock-o\"></i></button>';
                $approve_btn = '<button type=\"button\" class=\"btn btn-primary btn-flat btn-sm btn_table_edit\" onclick=\"approve_data('.$row->id.',\'1\');\" title=\"approve assigment to me\"><i class=\"fa fa-fw fa-thumbs-up\"></i></button>';
                $notapprove_btn = '<button type=\"button\" class=\"btn btn-danger btn-flat btn-sm btn_table_edit\" onclick=\"approve_data('.$row->id.',\'2\');\" title=\"not approve assigment to me\"><i class=\"fa fa-fw fa-close\"></i></button>';

                if ($row->approve_status1=='0' && $row->create_by!=$user->id_user) {
                    $btn_action = $approve_btn.$notapprove_btn;
                }
                elseif ($row->approve_status1=='2' && $row->create_by!=$user->id_user) {
                    $btn_action = $approve_btn;
                }
                else{
                    $btn_action = $edit_btn;
                }

                $html .= '
                [
                    "<input type=\"checkbox\" name=\"check_list\" value=\"'.$row->id.'\">",
                    "'.$this->global_model->datetotext($row->date_assigment).'<br>'.$row->reason.$changed_date.'",
                    "'.$expected_time.$actual_time.$tot_time.$leftover.$valid_date.'",
                    "<small class=\"label label-'.$arr_status[$row->approve_status1][0].'\"><i class=\"fa fa-fw '.$arr_status[$row->approve_status1][1].'\"></i> '.$row->approve_text1.'</small>",
                    "<small class=\"label label-'.$arr_status[$row->approve_status2][0].'\"><i class=\"fa fa-fw '.$arr_status[$row->approve_status2][1].'\"></i> '.$row->approve_text2.'</small>",
                    "'.$btn_action.'"
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

    function getCountOvertime(){
        $this->auth->restrict_ajax_login();
        
        $user = $this->auth->get_data_session();
        $_POST['id_user'] = $user->id_user;
        $_POST['claim'] = 'false';
        $_POST['sSearch'] = '1';
        $arr = $this->model->getCountOvertime($_POST);
        echo json_encode($arr);
    }

    function add_data(){
        $this->auth->restrict_ajax_login();
        
        $user = $this->auth->get_data_session();

        date_default_timezone_set('Asia/Makassar');
        $date=date("Y-m-d");
        $time=date("H:i:s");

        $_POST['id_user'] = $user->id_user;
        if (isset($_POST['date_assigment'])) {
            $_POST['date_assigment'] = $this->global_model->texttodate($_POST['date_assigment']);
        }

        if (@$_POST['id']=='') {
            $_POST['create_date'] = $date." ".$time;
            $_POST['create_by'] = $user->id_user;
            $save_id = $this->global_model->general_add($_POST,'tb_over_time');
        }
        else{
            $data_row1 = $this->global_model->general_select('tb_over_time',array('`id`'=>@$_POST['id']),'row','','');
            if (!isset($data_row1->approve_status2) || $data_row1->approve_status2!='1') {
                if (isset($_POST['approve_by_me'])) {
                    $_POST['approve_date1'] = $date." ".$time;
                    $_POST['approve_by1'] = $user->id_user;
                }
                $_POST['changed_date'] = $date." ".$time;
                $_POST['changed_by'] = $user->id_user;
                unset($_POST['approve_by_me']);
                $this->global_model->general_update($_POST,'tb_over_time',array('id'=>$_POST['id']));
                $save_id = $_POST['id'];
            }
            else{
                $error = "Save data failed because the day of submission has been approve";
            }
        }

        if (@$save_id) {
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
        $user = $this->auth->get_data_session();

        $data_row1 = $this->global_model->general_select('tb_over_time',array('`id`'=>$_POST['id']),'row','','');
        $data_row2 = $this->global_model->general_select('rbac_user_detail',array('`id_user`'=>$data_row1->approve_by2),'row','','');
        $data_row3 = $this->global_model->general_select('m_mini_list',array('`group`'=>'APPROVE STATUS','value'=>$data_row1->approve_status1),'row','','');
        $data_row4 = $this->global_model->general_select('m_mini_list',array('`group`'=>'APPROVE STATUS','value'=>$data_row1->approve_status2),'row','','');

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

    function delete_data(){
        $this->auth->restrict_ajax_login();

        $user = $this->auth->get_data_session();

        date_default_timezone_set('Asia/Makassar');
        $date=date("Y-m-d");
        $time=date("H:i:s");

        $data_row1 = $this->global_model->general_select('tb_over_time',array('`id`'=>$_POST['id']),'row','','');

        $result = false;

        if (($data_row1->create_by==$user->id_user && $data_row1->approve_status1==0) || $_POST['value']=='0') {
            $data_post['delete'] = $_POST['value'];
            $data_post['changed_date'] = $date." ".$time;
            $data_post['changed_by'] = $user->id_user;

            $result = $this->global_model->general_update($data_post,'tb_over_time',array('id'=>$_POST['id']));
        }
        else{
            $error = "Delete Overtime for ".$this->global_model->datetotext($data_row1->date_assigment)." failed because the day of submission has been approve";
        }

        if ($result) {
            $arr = array(
                'submit'    => '1',
                'id' => $result,
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

    function get_overtime_manager(){
        $this->auth->restrict_ajax_login();
        
        $user = $this->auth->get_data_session();
        $data_row1 = array(
            'id_user' => $user->id_user,
        );
        $list_data = $this->model->get_overtime_manager($data_row1);
        $html = "";
        foreach ($list_data as $row) {
            $html .= '
            <li class="item">
                <div class="product-img" style="height: 50px; overflow: hidden;" title="'.$row->name.'">
                    <img src="'.(isset($row->photo_profile) && file_exists(getcwd()."/".$row->photo_profile) ? base_url().$row->photo_profile : base_url()."media/dist/img/user_no_photo.png").'" alt="'.$row->name.'" style="height: auto;">
                </div>
                <div class="product-info">
                    <a href="'.base_url().'over-time/mainpage?x='.md5($row->id).'" class="product-title">'.$this->global_model->datetotext($row->date_assigment).' '.($row->approve_status1==0 && (strtotime($row->date_new)>strtotime(date('Y-m-d')))?'<span class="label label-success pull-right">new</span>':'').'</a>
                    <span class="product-description">
                        '.$row->reason.'
                    </span>
                </div>
            </li>';
        }

        echo $html;
    }
}
