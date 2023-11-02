<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model extends CI_Model
{
    //annual-----------------------------------------------------------------

    function get_query_string_annual($data,$columns){
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
                    tb_annual_leave.*,
                    reason.name AS reason_text,
                    approve_status.value_name AS approve_text
                FROM tb_annual_leave
                LEFT JOIN m_reason_leave AS reason
                    ON reason.id=tb_annual_leave.reason
                LEFT JOIN m_mini_list AS approve_status
                    ON approve_status.value=tb_annual_leave.approve_status AND approve_status.`group`='APPROVE STATUS'
                WHERE tb_annual_leave.id_user='".$data['id_user']."'";
                if (isset($data['except_date'])) {
                    $query_string .= "
                    AND tb_annual_leave.id <> '".$data['except_date']."'";
                } 
                $query_string .= " 
                AND tb_annual_leave.`delete`='0'
                AND YEAR(tb_annual_leave.date_from)='".$data['leave_year']."'";
                if (isset($data['bulan'])) {
                    $query_string .= "
                    AND MONTH(tb_annual_leave.date_from)=MONTH('".$this->global_model->texttodate("01/".$data['bulan'])."')";
                } 
                $query_string .= " ) AS data_leave
            WHERE (1=1)
            AND ".$q." AND ".$q_search;

        return $query_string;
    }

    function get_data_annual($data,$sortcol,$columns) {
        $query = $this->db->query($this->get_query_string_annual($data,$columns)."
            ORDER BY ".$sortcol." ".$data['sSortDir_0']." LIMIT ".$data['iDisplayStart'].",".$data['iDisplayLength']);
        return $query->result();
    }

    function get_data_count_annual($data,$columns) {
        $query = $this->db->query("
            SELECT count(*) AS count
            FROM (".$this->get_query_string_annual($data,$columns).") AS a");
        return $query->row();
    }

    function get_data_user_leave($data,$columns) {
        $query = $this->db->query($this->get_query_string_annual($data,$columns));
        // echo $this->db->last_query();
        return $query->result();
    }

    //annual approve-----------------------------------------------------------------

    function get_query_string_annual_approve($data,$columns){
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
                    tb_annual_leave.*,
                    reason.name AS reason_text,
                    approve_status.value_name AS approve_text
                FROM tb_annual_leave
                LEFT JOIN rbac_user_detail
                    ON rbac_user_detail.id_user=tb_annual_leave.id_user
                LEFT JOIN m_position
                    ON m_position.id=rbac_user_detail.position
                LEFT JOIN m_reason_leave AS reason
                    ON reason.id=tb_annual_leave.reason
                LEFT JOIN m_mini_list AS approve_status
                    ON approve_status.value=tb_annual_leave.approve_status AND approve_status.`group`='APPROVE STATUS'
                WHERE (1=1)
                ".$where_child."
                AND YEAR(tb_annual_leave.date_from)='".$data['leave_year']."') AS data_leave
            WHERE ".$q." AND ".$q_search;

        return $query_string;
    }

    function get_data_annual_approve($data,$sortcol,$columns) {
        $query = $this->db->query($this->get_query_string_annual_approve($data,$columns)."
            ORDER BY ".$sortcol." ".$data['sSortDir_0']." LIMIT ".$data['iDisplayStart'].",".$data['iDisplayLength']);
        return $query->result();
    }

    function get_data_count_annual_approve($data,$columns) {
        $query = $this->db->query("
            SELECT count(*) AS count
            FROM (".$this->get_query_string_annual_approve($data,$columns).") AS a");
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

    function getWorkingDays($startDate, $endDate){
        $begin = strtotime($startDate);
        $end   = strtotime($endDate);
        if ($begin > $end) {
            echo "startdate is in the future! <br />";
            return 0;
        } 
        else {
            $no_days  = 0;
            $weekends = 0;
            while ($begin <= $end) {
                $no_days++; // no of days in the given interval
                $what_day = date("N", $begin);
                if ($what_day > 5) { // 6 and 7 are weekend days
                    $weekends++;
                };
                $begin += 86400; // +1 day
            };
            $working_days = $no_days - $weekends;

            return $working_days;
        }
    }

    function getCountLeave($data){
        $this->auth->restrict_ajax_login();

        $data_user_leave = $this->get_data_user_leave($data,array('approve_status'));

        $countLeave = 0;
        foreach ($data_user_leave as $row) {
            // $countWorkingLeave = $this->getWorkingDays($row->date_from,$row->date_to);
            // $countLeave += $countWorkingLeave;
            $countLeave += $row->total_date;
        }

        $data_row1 = $this->global_model->general_select('rbac_user_detail',array('`id_user`'=>$data['id_user']),'row','','');

        $arr['total_leave_default'] = $data_row1->max_annual_leave + 0;
        $arr['total_leave'] = $countLeave + 0;
        $arr['user_name'] = $data_row1->name;
        $arr['interval_date'] = $this->global_model->datetotext(@$data_row1->starting_date).($this->global_model->datetotext(@$data_row1->end_date)!=""?" ~ ".$this->global_model->datetotext(@$data_row1->end_date):"");

        return $arr;
    }
}

?>