<?php

class Global_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        
    }

    function general_add($data,$table) {
        $this->db->insert($table,$data);
        return $this->db->insert_id();
    }

    function general_update($data_post,$table,$data_where){
        $this->db->where($data_where);
        return $this->db->update($table,$data_post);
    }

    function general_delete($data,$table){
        $this->db->where($data);
        return $this->db->delete($table);
    }

    function general_select($table,$data,$data_show="row",$column="",$group_by=""){
        $where_ = "";
        if (count($data)>0) {
            foreach ($data as $inputkey => $input_value) {
                $where_ .= " AND ".$inputkey." = '".$input_value."' ";
            }
        }
        $where_ = ($where_ != ""?"(".substr($where_, 4).")":"(1=1)");

        $select = "*";
        if ($column!="") {
            $select = $column;
        }

        $group_by_ = "";
        if ($group_by!="") {
            $group_by_ = "GROUP BY ".$group_by;
        }

        $query_string = "
            SELECT ".$select." 
            FROM ".$table." 
            WHERE (1=1)
            AND ".$where_.
            $group_by_;
        $query = $this->db->query($query_string);
        if ($data_show=="row") {
            return $query->row();   
        }
        elseif ($data_show=="result"){
            return $query->result();   
        }
    }

    function general_dataselect($select="*",$table_from,$table_join=array(),$table_where=array(),$table_order=array(),$data_show="row"){
        $this->db->select($select);

        if (count($table_join)>0) {
            foreach ($table_join as $inputkey => $input_value) {
                foreach ($input_value as $inputkey1 => $input_value1) {
                    $this->db->where($inputkey,$inputkey1,$input_value1);
                }
            }
        }

        if (count($table_where)>0) {
            foreach ($table_where as $inputkey => $input_value) {
                $this->db->where($inputkey,$input_value);
            }
        }

        if (count($table_order)>0) {
            foreach ($table_order as $inputkey => $input_value) {
                $this->db->order_by($inputkey,$input_value);
            }
        }

        $query = $this->db->get($table_from);

        if ($data_show=="row") {
            return $query->row();   
        }
        elseif ($data_show=="result"){
            return $query->result();   
        }
        elseif ($data_show=="result_array"){
            return $query->result_array();   
        }
    }

    function general_combo($arrs,$use_null='yes',$field_value,$field_view,$value_select='',$data_value=array()){
        $option = "";

        if ($use_null=='yes') {
            $option .= "<option value=''>-</option>";
        }
        elseif ($use_null=='no') {
            $option .= "";
        }


        foreach ($arrs as $row) {
            if (count($data_value)>0) {
                foreach ($data_value as $key => $value) {
                    $data_value_ = $key."='".$row->$value."'";
                }
            }
            else{
                $data_value_ = "";
            }
            
            $option .= "<option ".$data_value_." value='".$row->$field_value."' ".($value_select!='' && $row->$field_value==$value_select?"selected='selected'":"").">".$row->$field_view."</option>";
        }

        return $option;
    }

    function general_combo_tree($arr_data,$use_null='yes',$with_level='yes',$with_dis_parent='no',$root='',$first_root='',$data_view='name',$data_value=array()){
        $arrs = array();
        foreach($arr_data as $row){
            $arrs[] = $row;
        }

        $option = "";

        if ($use_null=='yes') {
            $option .= "<option value=''>-</option>";
        }
        elseif ($use_null=='no') {
            $option .= "";
        }
        
        return $option
                .$this->build_tree($arrs,$root,'1',$first_root,$with_level,$with_dis_parent,$data_view,$data_value);

    }

    function build_tree($arrs,$id_root,$level=1,$id_tree="",$with_level,$with_dis_parent,$data_view,$data_value){
        $init = '';
        foreach ($arrs as $arr) {
            if (($id_tree==""?$arr['id']==$id_root:$arr['parent']==$id_root)) {
                if (count($this->arr_child($arrs,$arr['id']))) {
                    if ($with_dis_parent=='yes') {
                        $event_disable = 'disabled=""';
                    }
                    else{
                        $event_disable = '';
                    }
                    $is_parent = 'true';
                }
                else{
                    $event_disable = '';   
                    $is_parent = 'false';
                }

                if ($with_level=='yes') {
                    $level_description = 'Lvl '.$level.'. ';
                }
                else{
                    $level_description = '';
                }

                $data_value_ = "";
                if (count($data_value)>0) {
                    foreach ($data_value as $key => $value) {
                        $data_value_ .= $key."='".$arr[$value]."' ";
                    }
                }
                else{
                    $data_value_ = "";
                }

                $init .= '
                    <option '.$event_disable.' '.$data_value_.' data-isparent="'.$is_parent.'" data-level="'.$level.'" data-parent="'.$arr['parent'].'" value="'.$arr['id'].'">
                        '.$level_description.$arr[$data_view].'
                    </option>';
                $init .= $this->build_tree($arrs,$arr['id'],$level+1,'1',$with_level,$with_dis_parent,$data_view,$data_value);
            }
        }

        return $init;
    }

    function arr_child($arrs,$id_root){
        $arrs_ = array();

        foreach ($arrs as $arr) {
            if ($arr['parent']==$id_root) {
                array_push($arrs_, $arr['id']);
            }
        }

        return $arrs_;
    }

    function datetotext($date){
        if ($date!='' && $date!='0000-00-00') {
            $datex = explode(" ", $date);
            $datetotext2 = explode("-", $datex[0]);
            return $datetotext2[2]."/".$datetotext2[1]."/".$datetotext2[0];
        }
        else{
            return "";
        }
    }

    function texttodate($date){
        if ($date!='' && $date!='0000-00-00') {
            $datex = explode(" ", $date);
            $datetotext2 = explode("/", $datex[0]);
            return $datetotext2[2]."-".$datetotext2[1]."-".$datetotext2[0];
        }
        else{
            return "";
        }
    }

    public function view_time($time){
        if ($time!='') {
            $timex = explode(":", $time);
            return $timex[0].":".$timex[1];
        }
        else{
            return "";
        }
    }

    public function formatHours($time){
        $date = explode(':', $time.":00");
        return ($date[0]*60*60)+($date[1]*60)+$date[2];
    }

    public function sent_email($data){
        $this->load->library('email');

        $this->email->from('info@hr_system.com', "HR System");
        $this->email->to($user_to->email);
        $this->email->subject('Activate Account HR SYSTEM');

        $email_body = "
            <p>Wellcome, Your Account has been created by admin. Please follow this link to update your profile data:</p>
            <p>http://localhost/sihr/profile/mainpage</p>
            <p>Have a nice day...</p>";

        $this->email->message($email_body);

        $this->email->send();
    }
}