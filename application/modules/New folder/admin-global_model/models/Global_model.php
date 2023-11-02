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

    function datetotext($date){
        if ($date!='') {
            $datex = explode(" ", $date);
            $datetotext2 = explode("-", $datex[0]);
            return $datetotext2[2]."/".$datetotext2[1]."/".$datetotext2[0];
        }
        else{
            return "";
        }
    }

    function texttodate($date){
        if ($date!='') {
            $datex = explode(" ", $date);
            $datetotext2 = explode("/", $datex[0]);
            return $datetotext2[2]."-".$datetotext2[1]."-".$datetotext2[0];
        }
        else{
            return "";
        }
        $datex = explode(" ", $date);
        $datetotext2 = explode("/", $datex[0]);
        return $datetotext2[2]."-".$datetotext2[1]."-".$datetotext2[0];
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