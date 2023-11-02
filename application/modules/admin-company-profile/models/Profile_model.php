<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends CI_Model
{
    
    public function __construct(){
        $this->load->database();
    }
    
    function get_data($data,$sortcol,$columns){
        $q = "";
        foreach ($columns as $column) {
            if ($column!='') {
                $q .= " OR ".$column." LIKE '%".$data['sSearch']."%' ";
            }
        }
        $q = "(".substr($q, 3).")";

        $query = $this->db->query("
            SELECT 
              `tb_profile_company`.*
            FROM
              `tb_profile_company`
            WHERE ".$q."
            AND `tb_profile_company`.delete <> 1
            ORDER BY ".$sortcol." ".$data['sSortDir_0']." 
            LIMIT ".$data['iDisplayStart'].",".$data['iDisplayLength']);
        return $query->result();
    }
    function get_data_count($data,$columns){
        $q = "";
        $arr_search = explode(" ", $data['sSearch']);
        foreach ($arr_search as $q_search) {
            foreach ($columns as $column) {
                if ($column!='') {
                    $q .= " OR ".$column." LIKE '%".$q_search."%' ";
                }
            }
        }
        $q = "(".substr($q, 3).")";
        $query = $this->db->query("
            SELECT COUNT(*) AS `count`
            FROM
              (SELECT 
              `tb_profile_company`.*
            FROM
              `tb_profile_company`
            WHERE ".$q."
            AND `tb_profile_company`.delete <> 1) AS a");
        return $query->row();
    }

    function get_data_byid($id){
        $query = $this->db->query("
            SELECT 
            `tb_profile_company`.*
            FROM tb_profile_company
            WHERE tb_profile_company.id='".$id."'");
        return $query->row();
    }

    public function insertCompanyProfile($data){
        $this->db->insert('tb_profile_company',$data);
        return $this->db->insert_id();
    }

    public function updateCompanyProfile($id,$data) {
        $this->db->where('id',$id);
        return $this->db->update('tb_profile_company',$data);
    }
}

?>