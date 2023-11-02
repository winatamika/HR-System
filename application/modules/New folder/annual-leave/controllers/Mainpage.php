<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mainpage extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->library('upload');
        $this->load->model('model');
    }

    public function index(){
        $this->auth->check_login();
        
        if(!$this->auth->hasPrivilege("ViewTimeOffRequest")){
            redirect('home','refresh');
        }

        $user = $this->auth->get_data_session();

        $data['ico'] = '<i class="fa fa-fw fa-coffee"></i>';
        $data['title'] = 'Time Off Request';
        $data['sub_title'] = 'detail';
        
        $data['content']="annual-leave/view";
        $data['form_id']="form-input-annual-leave";
        $data['table_id']="table-annual-leave";
        
        $data['url_add']=base_url()."annual-leave/mainpage/add_data";
        $data['url_edit']=base_url()."annual-leave/mainpage/edit_data";
        $data['url_delete']=base_url()."annual-leave/mainpage/delete_data";
        $data['url_load_table']=base_url()."annual-leave/mainpage/list_data";
        $data['url_show_data']=base_url()."annual-leave/mainpage/show_data";
        $data['url_get_count_leave']=base_url()."annual-leave/mainpage/getCountLeave";

        $mini_list = $this->global_model->general_select('m_mini_list',array('`group`'=>'REASON','`delete`'=>'0'),'result','','');
        $data['reason'] = $this->global_model->general_combo($mini_list,'yes','value','value_name','');

        $mini_list = $this->global_model->general_select('m_mini_list',array('`group`'=>'APPROVE STATUS','`delete`'=>'0'),'result','','');
        $data['approve_status'] = $this->global_model->general_combo($mini_list,'yes','value','value_name','');

        $this->load->view('template-admin/template',$data);
    }

    public function list_data(){
        $this->auth->restrict_ajax_login_datatable();
        
        $arr_sort = array('create_date','date_from','date_to','reason_text','`approve_text`');
        $user = $this->auth->get_data_session();
        $_GET['id_user'] = $user->id_user;
        $list_data = $this->model->get_data_annual($_GET,$arr_sort[$_GET['iSortCol_0']],$arr_sort);
        $list_data_count = $this->model->get_data_count_annual($_GET,$arr_sort);
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

                $changed_date = '<i style=\"font-size:11px;\">'.(isset($row->create_date) && $row->create_date!=''?'Create from '.$this->global_model->datetotext($row->create_date):'').(isset($row->changed_date) && $row->changed_date!=''?'&nbsp;&nbsp;&nbsp;Last Update '.$this->global_model->datetotext($row->changed_date):'').'</i>';

                $html .= '
                [
                    "<input type=\"checkbox\" name=\"check_list\" value=\"'.$row->id.'\">",
                    "'.$this->global_model->datetotext($row->date_from).'",
                    "'.$this->global_model->datetotext($row->date_to).'",
                    "'.$this->model->getWorkingDays($row->date_from,$row->date_to).' day",
                    "'.$row->reason_text.'",
                    "'.$changed_date.'",
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

    function getCountLeave(){
        $this->auth->restrict_ajax_login();
        
        $user = $this->auth->get_data_session();
        $_POST['id_user'] = $user->id_user;
        $_POST['sSearch'] = '1';
        $arr = $this->model->getCountLeave($_POST);
        echo json_encode($arr);
    }

    function add_data(){
        $this->auth->restrict_ajax_login();

        $user = $this->auth->get_data_session();

        date_default_timezone_set('Asia/Makassar');
        $date=date("Y-m-d");
        $time=date("H:i:s");

        $_POST['id_user'] = $user->id_user;
        $_POST['date_from'] = $this->global_model->texttodate(@$_POST['date_from']);
        $_POST['date_to'] = $this->global_model->texttodate(@$_POST['date_to']);

        if ($_POST['id']=='') {
            $_POST['create_date'] = $date." ".$time;
            $_POST['create_by'] = $user->id_user;
            $save_id = $this->global_model->general_add($_POST,'tb_annual_leave');
        }
        else{
            $data_row1 = $this->global_model->general_select('tb_annual_leave',array('`id`'=>@$_POST['id']),'row','','');
            if (!isset($data_row1->approve_status) || $data_row1->approve_status!='1') {
                $_POST['changed_date'] = $date." ".$time;
                $_POST['changed_by'] = $user->id_user;
                $this->global_model->general_update($_POST,'tb_annual_leave',array('id'=>$_POST['id']));
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
        $data_row1 = $this->global_model->general_select('tb_annual_leave',array('`id`'=>$_POST['id']),'row','','');
        $data_row2 = $this->global_model->general_select('rbac_user_detail',array('`id_user`'=>$data_row1->approve_by),'row','','');
        $data_row3 = $this->global_model->general_select('m_mini_list',array('`group`'=>'APPROVE STATUS','value'=>$data_row1->approve_status),'row','','');

        $arr = array();
        foreach ($data_row1 as $key => $value) {
            $arr[$key] = $value;
        }
        $arr['date_from'] = $this->global_model->datetotext(@$data_row1->date_from);
        $arr['date_to'] = $this->global_model->datetotext(@$data_row1->date_to);

        if ($data_row1->approve_status=='0') {
            $app_status = array('warning','fa-clock-o');
        }
        elseif ($data_row1->approve_status=='1') {
            $app_status = array('success','fa-check');
        }
        elseif ($data_row1->approve_status=='2') {
            $app_status = array('danger','fa-close');
        }

        $arr['approve_status_'] = $data_row1->approve_status;
        $arr['approve_status'] = '<small class="label label-'.$app_status[0].'"><i class="fa fa-fw '.$app_status[1].'"></i> '.$data_row3->value_name.'</small> '.($data_row1->approve_by!=''?'&nbsp;&nbsp;&nbsp;by '.$data_row2->name.' <i>&nbsp;&nbsp;&nbsp;'.$data_row1->approve_date.'</i>':'');

        echo json_encode($arr);
    }

    function delete_data(){
        $this->auth->restrict_ajax_login();

        $user = $this->auth->get_data_session();

        date_default_timezone_set('Asia/Makassar');
        $date=date("Y-m-d");
        $time=date("H:i:s");

        $data_row1 = $this->global_model->general_select('tb_annual_leave',array('`id`'=>$_POST['id']),'row','','');

        if ($data_row1->approve_status!='1' || (strtotime($data_row1->date_from) > strtotime(date("Y-m-d"))) || $_POST['value']=='0') {
            $data_post['delete'] = $_POST['value'];
            $data_post['changed_date'] = $date." ".$time;
            $data_post['changed_by'] = $user->id_user;

            $result = $this->global_model->general_update($data_post,'tb_annual_leave',array('id'=>$_POST['id']));
        }
        else{
            $error = "Delete Time Off for ".$this->global_model->datetotext($data_row1->date_from)." failed because the day of submission has been approve and has passed";
        }

        if (@$result) {
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

    function get_bar_leave(){
        $this->auth->restrict_ajax_login();
        
        $user = $this->auth->get_data_session();
        
        $data = new stdClass();
        $data->data = array();
        $data->color = "#3c8dbc";

        $arr_bulan = array(
            array("January",'01'), 
            array("February",'02'), 
            array("March",'03'), 
            array("April",'04'), 
            array("May",'05'), 
            array("June",'06'),
            array("July",'07'),
            array("Agustus",'08'),
            array("September",'09'),
            array("Oktober",'10'),
            array("November",'11'),
            array("Desember",'12')
        );

        foreach ($arr_bulan as $row) {
            $_POST['id_user'] = $user->id_user;
            $_POST['sSearch'] = '1';
            $_POST['bulan'] = $row[1]."/".$_POST['leave_year'];
            $arr = $this->model->getCountLeave($_POST);
            array_push($data->data, array($row[0],$arr['total_leave']));
        }

        echo json_encode($data);
    }
}
