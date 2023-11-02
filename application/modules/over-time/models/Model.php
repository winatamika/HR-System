<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model extends CI_Model
{
    //overtime-----------------------------------------------------------------

    function get_query_string_overtime($data,$columns){
        $q = "";
        foreach ($columns as $column) {
            if ($column!='') {
                if (isset($data['sSearch']) && $data['sSearch']!="") {
                    $q .= " OR ".$column." LIKE '%".$data['sSearch']."%' ";
                }
            }
        }
        $q = ($q != ""?"(".substr($q, 3).")":"(1=1)");

        $q_search = "";
        if (isset($data['input'])) {
            foreach ($data['input'] as $inputkey => $input_value) {
                if (($data['input'][$inputkey]!="" && $data['input'][$inputkey]!="-" && $data['input'][$inputkey]!="all")) {
                    if ($inputkey=='employee') {
                        $q_search .= " AND ".$inputkey." LIKE '%".$input_value."%' ";
                    }
                    else{
                        $q_search .= " AND ".$inputkey." = '".$input_value."' ";
                    }
                }
            }
        }
        $q_search = ($q_search != ""?"(".substr($q_search, 4).")":"(1=1)");

        $query_string = "
            SELECT * FROM (
                SELECT 
                    tb_over_time.*,
                    approve_status1.value_name AS approve_text1,
                    approve_status2.value_name AS approve_text2
                FROM tb_over_time
                LEFT JOIN m_mini_list AS approve_status1
                    ON approve_status1.value=tb_over_time.approve_status1 AND approve_status1.`group`='APPROVE STATUS'
                LEFT JOIN m_mini_list AS approve_status2
                    ON approve_status2.value=tb_over_time.approve_status2 AND approve_status2.`group`='APPROVE STATUS'
                WHERE tb_over_time.id_user='".$data['id_user']."' 
                AND tb_over_time.`delete`='0'
                ";
                if ($data['claim']=='false') {
                    $query_string .= "
                    AND YEAR(tb_over_time.date_assigment)=YEAR('".$this->global_model->texttodate("01/".$data['month_overtime'])."')
                    AND MONTH(tb_over_time.date_assigment)=MONTH('".$this->global_model->texttodate("01/".$data['month_overtime'])."')";
                }
                if ($data['claim']=='true') {
                    // $query_string .= "
                    // AND YEAR(tb_over_time.date_assigment)='".$data['year_overtime']."'";   
                    $query_string .= "
                    AND YEAR(tb_over_time.date_assigment)=YEAR('".$this->global_model->texttodate("01/".$data['month_overtime'])."')
                    AND MONTH(tb_over_time.date_assigment)=MONTH('".$this->global_model->texttodate("01/".$data['month_overtime'])."')";
                }
            $query_string .= "
            ) AS data_overtime
            WHERE (1=1)
            AND ".$q." AND ".$q_search;

        return $query_string;
    }

    function get_data_overtime($data,$sortcol,$columns) {
        $query = $this->db->query($this->get_query_string_overtime($data,$columns)."
            ORDER BY ".$sortcol." ".$data['sSortDir_0']." LIMIT ".$data['iDisplayStart'].",".$data['iDisplayLength']);
        // echo $this->db->last_query();
        return $query->result();
    }

    function get_data_count_overtime($data,$columns) {
        $query = $this->db->query("
            SELECT count(*) AS count
            FROM (".$this->get_query_string_overtime($data,$columns).") AS a");
        return $query->row();
    }

    function get_data_user_overtime($data,$columns) {
        $query = $this->db->query($this->get_query_string_overtime($data,$columns));
        return $query->result();
    }

    //overtime approve-----------------------------------------------------------------

    function get_query_string_overtime_approve($data,$columns){
        $user = $this->auth->get_data_session();

        $q = "";
        foreach ($columns as $column) {
            if ($column!='') {
                if (isset($data['sSearch']) && $data['sSearch']!="") {
                    $q .= " OR ".$column." LIKE '%".$data['sSearch']."%' ";
                }
            }
        }
        $q = ($q != ""?"(".substr($q, 3).")":"(1=1)");

        $q_search = "";
        foreach ($data['input'] as $inputkey => $input_value) {
            if (($data['input'][$inputkey]!="" && $data['input'][$inputkey]!="-" && $data['input'][$inputkey]!="all")) {
                if ($inputkey=='employee') {
                    $q_search .= " AND ".$inputkey." LIKE '%".$input_value."%' ";
                }
                elseif ($inputkey=='delete') {
                    $q_search .= " AND `".$inputkey."` = '".$input_value."' ";
                }
                else{
                    $q_search .= " AND ".$inputkey." = '".$input_value."' ";
                }
            }
        }
        $q_search = ($q_search != ""?"(".substr($q_search, 4).")":"(1=1)");

        if ($this->auth->hasPrivilege('ViewLeaveAllChild')) {
            if ($this->auth->hasPrivilege('isSuperAdmin')) {
                $where_child = "AND ".$this->load_position(0);    
            }
            else{
                $data_user = $this->global_model->general_select('rbac_user_detail',array('`id_user`'=>$user->id_user),'row','','');
                $where_child = "AND ".$this->load_position($data_user->position);
            }
        }
        elseif ($this->auth->hasPrivilege('ViewLeaveDownChild')) {
            $where_child = "AND rbac_user_detail.direct_supervisor='".$user->id_user."'";
        }

        $query_string = "
            SELECT * FROM (
                SELECT 
                    rbac_user_detail.name AS employee,
                    m_position.name AS position_,
                    tb_over_time.*,
                    approve_status1.value_name AS approve_text1,
                    approve_status2.value_name AS approve_text2
                FROM tb_over_time
                LEFT JOIN rbac_user_detail
                    ON rbac_user_detail.id_user=tb_over_time.id_user
                LEFT JOIN m_position
                    ON m_position.id=rbac_user_detail.position
                LEFT JOIN m_mini_list AS approve_status1
                    ON approve_status1.value=tb_over_time.approve_status1 AND approve_status1.`group`='APPROVE STATUS'
                LEFT JOIN m_mini_list AS approve_status2
                    ON approve_status2.value=tb_over_time.approve_status2 AND approve_status2.`group`='APPROVE STATUS'
                WHERE (1=1)
                ".$where_child."
                AND YEAR(tb_over_time.date_assigment)=YEAR('".$this->global_model->texttodate("01/".$data['month_overtime'])."')
                AND MONTH(tb_over_time.date_assigment)=MONTH('".$this->global_model->texttodate("01/".$data['month_overtime'])."')) AS data_overtime
            WHERE ".$q." AND ".$q_search;

        return $query_string;
    }

    function get_data_overtime_approve($data,$sortcol,$columns) {
        $query = $this->db->query($this->get_query_string_overtime_approve($data,$columns)."
            ORDER BY ".$sortcol." ".$data['sSortDir_0']." LIMIT ".$data['iDisplayStart'].",".$data['iDisplayLength']);
        return $query->result();
    }

    function get_data_count_overtime_approve($data,$columns) {
        $query = $this->db->query("
            SELECT count(*) AS count
            FROM (".$this->get_query_string_overtime_approve($data,$columns).") AS a");
        return $query->row();
    }

    //claim-----------------------------------------------------------------------------------
    function get_query_string_claim_overtime($data,$columns){
        $q = "";
        foreach ($columns as $column) {
            if ($column!='') {
                if (isset($data['sSearch']) && $data['sSearch']!="") {
                    if ($column=='approve_status') {
                        $q .= " OR ".$column." = '".$data['sSearch']."' ";
                    }
                    else {
                        $q .= " OR ".$column." LIKE '%".$data['sSearch']."%' ";
                    }
                }
            }
        }
        $q = ($q != ""?"(".substr($q, 3).")":"(1=1)");

        $q_search = "";
        if (isset($data['input'])) {
            foreach ($data['input'] as $inputkey => $input_value) {
                if (($data['input'][$inputkey]!="" && $data['input'][$inputkey]!="-" && $data['input'][$inputkey]!="all")) {
                    if ($inputkey=='employee') {
                        $q_search .= " AND ".$inputkey." LIKE '%".$input_value."%' ";
                    }
                    else{
                        $q_search .= " AND ".$inputkey." = '".$input_value."' ";
                    }
                }
            }
        }
        $q_search = ($q_search != ""?"(".substr($q_search, 4).")":"(1=1)");

        $query_string = "
            SELECT * FROM (
                SELECT 
                    tb_over_time_claim.*,
                    approve_status.value_name AS approve_text
                FROM tb_over_time_claim
                LEFT JOIN m_mini_list AS approve_status
                    ON approve_status.value=tb_over_time_claim.approve_status AND approve_status.`group`='APPROVE STATUS'
                WHERE tb_over_time_claim.id_user='".$data['id_user']."'";
                if (isset($data['except_date'])) {
                    $query_string .= "
                    AND tb_over_time_claim.id <> '".$data['except_date']."'";
                } 
                $query_string .= "
                AND tb_over_time_claim.`delete`='0'
                AND YEAR(tb_over_time_claim.date_claim)=YEAR('".$this->global_model->texttodate("01/".$data['month_overtime'])."')
                AND MONTH(tb_over_time_claim.date_claim)=MONTH('".$this->global_model->texttodate("01/".$data['month_overtime'])."')
            ) AS data_claim
            WHERE (1=1)
            AND ".$q." AND ".$q_search;

        return $query_string;
    }

    function get_data_claim_overtime($data,$sortcol,$columns) {
        $query = $this->db->query($this->get_query_string_claim_overtime($data,$columns)."
            ORDER BY ".$sortcol." ".$data['sSortDir_0']." LIMIT ".$data['iDisplayStart'].",".$data['iDisplayLength']);
        return $query->result();
    }

    function get_data_count_claim_overtime($data,$columns) {
        $query = $this->db->query("
            SELECT count(*) AS count
            FROM (".$this->get_query_string_claim_overtime($data,$columns).") AS a");
        return $query->row();
    }

    function get_data_user_overtime_claim($data,$columns) {
        $query = $this->db->query($this->get_query_string_claim_overtime($data,$columns));
        return $query->result();
    }

    //claim approve--------------------------------------------------------------------

    function get_query_string_claim_approve($data,$columns){
        $user = $this->auth->get_data_session();

        $q = "";
        foreach ($columns as $column) {
            if ($column!='') {
                if (isset($data['sSearch']) && $data['sSearch']!="") {
                    $q .= " OR ".$column." LIKE '%".$data['sSearch']."%' ";
                }
            }
        }
        $q = ($q != ""?"(".substr($q, 3).")":"(1=1)");

        $q_search = "";
        foreach ($data['input'] as $inputkey => $input_value) {
            if (($data['input'][$inputkey]!="" && $data['input'][$inputkey]!="-" && $data['input'][$inputkey]!="all")) {
                if ($inputkey=='employee') {
                    $q_search .= " AND ".$inputkey." LIKE '%".$input_value."%' ";
                }
                elseif ($inputkey=='delete') {
                    $q_search .= " AND `".$inputkey."` = '".$input_value."' ";
                }
                else{
                    $q_search .= " AND ".$inputkey." = '".$input_value."' ";
                }
            }
        }
        $q_search = ($q_search != ""?"(".substr($q_search, 4).")":"(1=1)");

        if ($this->auth->hasPrivilege('ViewLeaveAllChild')) {
            if ($this->auth->hasPrivilege('isSuperAdmin')) {
                $where_child = "AND ".$this->load_position(0);    
            }
            else{
                $data_user = $this->global_model->general_select('rbac_user_detail',array('`id_user`'=>$user->id_user),'row','','');
                $where_child = "AND ".$this->load_position($data_user->position);
            }
        }
        elseif ($this->auth->hasPrivilege('ViewLeaveDownChild')) {
            $where_child = "AND rbac_user_detail.direct_supervisor='".$user->id_user."'";
        }

        $query_string = "
            SELECT * FROM (
                SELECT 
                    rbac_user_detail.name AS employee,
                    m_position.name AS position_,
                    tb_over_time_claim.*,
                    approve_status.value_name AS approve_text
                FROM tb_over_time_claim
                LEFT JOIN rbac_user_detail
                    ON rbac_user_detail.id_user=tb_over_time_claim.id_user
                LEFT JOIN m_position
                    ON m_position.id=rbac_user_detail.position
                LEFT JOIN m_mini_list AS approve_status
                    ON approve_status.value=tb_over_time_claim.approve_status AND approve_status.`group`='APPROVE STATUS'
                WHERE (1=1)
                ".$where_child."
                AND YEAR(tb_over_time_claim.date_claim)=YEAR('".$this->global_model->texttodate("01/".$data['month_overtime'])."')
                AND MONTH(tb_over_time_claim.date_claim)=MONTH('".$this->global_model->texttodate("01/".$data['month_overtime'])."')
            ) AS data_claim
            WHERE ".$q." AND ".$q_search;

        return $query_string;
    }

    function get_data_claim_approve($data,$sortcol,$columns) {
        $query = $this->db->query($this->get_query_string_claim_approve($data,$columns)."
            ORDER BY ".$sortcol." ".$data['sSortDir_0']." LIMIT ".$data['iDisplayStart'].",".$data['iDisplayLength']);
        return $query->result();
    }

    function get_data_count_claim_approve($data,$columns) {
        $query = $this->db->query("
            SELECT count(*) AS count
            FROM (".$this->get_query_string_claim_approve($data,$columns).") AS a");
        return $query->row();
    }

    function load_position($root){
        $query = $this->db->query("
            SELECT *
            FROM m_position
            WHERE `delete`='0'");
        $arrs = array();
        foreach($query->result_array() as $row){
            $arrs[] = $row;
        }
        
        $q = $this->build_menu2($arrs,$root,'','','m_position','id');
        $q = ($q != ""?"(".substr($q, 3).")":"(1=1)");
        return $q;
    }

    function build_menu2($arrs,$id_root,$level=1,$id_menu="",$table_,$table_id_){
        $init = '';
        foreach ($arrs as $arr) {
            if ($arr['parent']==$id_root) {
                $init .= " OR rbac_user_detail.position='".$arr['id']."'";
                $init .= $this->build_menu2($arrs,$arr['id'],$level+1,'1',$table_,$table_id_);
            }
        }

        return $init;
    }

    function get_time_difference($time_start, $time_end){
        $time_start = new DateTime("1980-01-01 ".$time_start);
        $time_end = new DateTime("1980-01-01 ".$time_end);
        
        $interval = $time_start->diff($time_end);

        return $interval->format('%H:%I');
    }

    function timeToSeconds($time){
        $timeExploded = explode(':', $time);
        if (isset($timeExploded[2])) {
            return $timeExploded[0] * 3600 + $timeExploded[1] * 60 + $timeExploded[2];
        }
        return $timeExploded[0] * 3600 + $timeExploded[1] * 60;
    }

    function get_time_difference1($time_start, $time_end){
        // $time_start = new DateTime("1980-01-01 ".$time_start);
        // $time_end = new DateTime("1980-01-01 ".$time_end);
        
        // $interval = $time_start->diff($time_end);

        // return $interval->format('%H:%I');
        // return $time_start."|".$this->timeToSeconds($time_start)."|".$time_end."|".$this->timeToSeconds($time_end);

        $diff = $this->timeToSeconds($time_start)-$this->timeToSeconds($time_end);
        $hours = floor($diff / 3600);
        $mins = floor($diff / 60 % 60);
        return $hours.":".$mins;

        // return strtotime("0000-00-00 ".$time_start.":00")-strtotime("0000-00-00 ".$time_end.":00");
    }

    function AddPlayTime($times) {
        $i = 0;
        foreach ($times as $time) {
            sscanf($time, '%d:%d', $hour, $min);
            $i += $hour * 60 + $min;
        }
        if ($h = floor($i / 60)) {
            $i %= 60;
        }
        return sprintf('%02d:%02d', $h, $i);
    }

    function getCountOvertime($data){
        $this->auth->restrict_ajax_login();

        $data_user_overtime = $this->get_data_user_overtime($data,array('approve_status2'));

        $data_diff_time = array();
        foreach ($data_user_overtime as $row) {
            array_push($data_diff_time, $this->get_time_difference($row->actual_start,$row->actual_end));
        }

        $time_difference = $this->AddPlayTime($data_diff_time);

        $data_row1 = $this->global_model->general_select('rbac_user_detail',array('`id_user`'=>$data['id_user']),'row','','');

        $arr['total_hour'] = $time_difference;
        $arr['user_name'] = $data_row1->name;

        return $arr;
    }

    function getCountClaim($data){
        $this->auth->restrict_ajax_login();

        $data_user_overtime = $this->get_data_user_overtime($data,array('approve_status2'));

        $data_diff_time = array();
        foreach ($data_user_overtime as $row) {
            array_push($data_diff_time, $this->get_time_difference($row->actual_start,$row->actual_end));
        }

        $time_difference = $this->AddPlayTime($data_diff_time);

        $data_user_overtime_claim = $this->get_data_user_overtime_claim($data,array('approve_status'));

        $data_diff_time_claim = array();
        foreach ($data_user_overtime_claim as $row) {
            array_push($data_diff_time_claim, $row->total_claim);
        }

        $time_difference_claim = $this->AddPlayTime($data_diff_time_claim);

        $data_row1 = $this->global_model->general_select('rbac_user_detail',array('`id_user`'=>$data['id_user']),'row','','');

        $arr['total_overtime'] = $time_difference;
        $arr['total_claim'] = $time_difference_claim;
        $arr['overtime_left'] = $this->get_time_difference1($time_difference,$time_difference_claim);
        $arr['user_name'] = $data_row1->name;

        return $arr;   
    }

    function getEmployee(){
        $user = $this->auth->get_data_session();

        if ($this->auth->hasPrivilege('ViewLeaveAllChild')) {
            if ($this->auth->hasPrivilege('isSuperAdmin')) {
                $where_child = "AND ".$this->load_position(0);    
            }
            else{
                $data_user = $this->global_model->general_select('rbac_user_detail',array('`id_user`'=>$user->id_user),'row','','');
                $where_child = "AND ".$this->load_position($data_user->position);
            }
        }
        elseif ($this->auth->hasPrivilege('ViewLeaveDownChild')) {
            $where_child = "AND rbac_user_detail.direct_supervisor='".$user->id_user."'";
        }

        $query_string = "
            SELECT * FROM
            rbac_user_detail
            LEFT JOIN rbac_user
                ON rbac_user.id_user=rbac_user_detail.id_user
            WHERE (1=1)
            ".$where_child."
            AND rbac_user.`active`='1'";

        $query = $this->db->query($query_string);
        return $query->result();
    }

    function get_overtime_manager($data) {
        $query_string = "
            SELECT 
                tb_over_time.*,
                DATE_ADD(tb_over_time.`date_assigment`,INTERVAL 7 DAY) AS date_new,
                rbac_user_detail.name,
                rbac_user_detail.photo_profile
            FROM tb_over_time
            LEFT JOIN rbac_user_detail
                ON rbac_user_detail.id_user=tb_over_time.create_by
            WHERE tb_over_time.id_user='".$data['id_user']."'";
                if (!$this->auth->hasPrivilege('ViewLeaveAllChild') && !$this->auth->hasPrivilege('ViewLeaveDownChild')) {
                    $query_string .= "
                    AND tb_over_time.create_by<>'".$data['id_user']."'";
                }
                $query_string .= "
                AND tb_over_time.`delete`='0'
            ORDER BY tb_over_time.date_assigment DESC
            LIMIT 0,6";

        $query = $this->db->query($query_string);
        return $query->result();
    }

    function get_leftover($id_overtime){
        $data_overtime = $this->global_model->general_select('tb_over_time',array('`id`'=>$id_overtime),'row','','');
        // $data_claim = $this->global_model->general_select('tb_over_time_claim_detail',array('`id_overtime`'=>$id_overtime),'result','','');
        $data_claim = $this->db->query("
            SELECT 
                `tb_over_time_claim_detail`.*
            FROM
                `tb_over_time_claim_detail` 
                LEFT JOIN `tb_over_time_claim` 
                    ON `tb_over_time_claim`.`id` = `tb_over_time_claim_detail`.`id_claim` 
            WHERE `tb_over_time_claim`.`approve_status`='1' AND `tb_over_time_claim`.`delete`='0' AND `tb_over_time_claim_detail`.`id_overtime`='".$id_overtime."'")->result();

        $data_time_claim = array();
        foreach ($data_claim as $row) {
            array_push($data_time_claim, $row->time_claim);
        }
        $total_claim = $this->AddPlayTime($data_time_claim);

        $leftover = $this->get_time_difference($total_claim,$this->global_model->view_time($data_overtime->valid_time));

        return $leftover;
    }

    function loadOvertime($data){
        $user = $this->auth->get_data_session();

        $query_string = "
            SELECT 
                *
            FROM tb_over_time
            WHERE id NOT IN (    
                SELECT 
                    `tb_over_time_claim_detail`.`id_overtime`
                FROM
                    `tb_over_time_claim_detail` 
                    LEFT JOIN `tb_over_time_claim` 
                        ON `tb_over_time_claim`.`id` = `tb_over_time_claim_detail`.`id_claim` 
                WHERE `tb_over_time_claim`.`approve_status`='0' 
                AND `tb_over_time_claim`.`delete`='0'
                AND `tb_over_time_claim`.`id_user`='".$user->id_user."')
            AND ('".$this->global_model->texttodate(@$data['date_claim'])."' > valid_start) 
            AND ('".$this->global_model->texttodate(@$data['date_claim'])."' < valid_end)
            AND approve_status2='1'
            AND id_user='".$user->id_user."'";

        if ($data['x']=='edit') {
            $query_string .= "
                UNION
                SELECT * FROM `tb_over_time` WHERE id IN (
                SELECT 
                    `tb_over_time_claim_detail`.`id_overtime`
                FROM
                    `tb_over_time_claim_detail` 
                    LEFT JOIN `tb_over_time_claim` 
                        ON `tb_over_time_claim`.`id` = `tb_over_time_claim_detail`.`id_claim` 
                WHERE `tb_over_time_claim`.`id`='".$data['id_data']."')
                AND ('".$this->global_model->texttodate(@$data['date_claim'])."' > valid_start) 
                AND ('".$this->global_model->texttodate(@$data['date_claim'])."' < valid_end) 
                AND approve_status2 = '1'";
        }

        $query = $this->db->query($query_string);
        return $query->result();
    }
}

?>