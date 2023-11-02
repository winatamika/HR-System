<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rbac_model extends CI_Model
{
    var $table_user = 'rbac_user';
    var $primary_user = 'id_user';
    var $table_permission = 'rbac_permissions';
    var $primary_permission = 'perm_id';
    var $table_role = 'rbac_roles';
    var $table_role_permission = 'rbac_role_perm';
    var $primary_role = 'role_id';
    
    public function __construct(){
        $this->load->database();
    }
    
    /**
     * model fungsi untuk mendapatkan permission dari suatu role
     * input : $role_id
     * output : array yang bersesuaian dengan permission dari role_id
     */
     public function getRolePerms($role_id){
        $sql = "SELECT t2.perm_desc FROM rbac_role_perm as t1
                JOIN rbac_permissions as t2 ON t1.perm_id = t2.perm_id
                WHERE t1.role_id ='".$role_id."'";
        $run_query = $this->db->query($sql);
        return $run_query->result();
    }
    
    /**
     * model untuk mendapatkan seluruh informasi dari user bedasarkan nip
     * input : $nip yaitu nip dari user
     * output : array yang berisi seluruh informasi dari user
     */
    
    function getByNip($nip){
        $sql = "SELECT * FROM rbac_user WHERE nip ='".$nip."'";
        $run_query = $this->db->query($sql);
        return $run_query->result();  
    }
    
    /**
     * model untuk mendapatkan seluruh informasi dari user bedasarkan id_user
     * input : $id_user yaitu id_user dari user
     * output : array yang berisi seluruh informasi dari user
     */
    
    function getByIdUser($username){
        $sql = "select u.id_user, u.username, d.*
                from rbac_user as u
                left join rbac_user_detail  as d on d.id_user=u.id_user
                where u.username='".$username."'
                and u.active = '1'";
        $run_query = $this->db->query($sql);
        return $run_query->result();  
    }
    
    /**
     * model fungsi untuk mendapatkan seluruh role dari suatu user bedasarkan id_user
     * input : $id_user yaitu id_user dari user
     * output : array role dari user yang bersangkutan
     */ 
    function getRoleByIdUser($id_user){
        $sql = "SELECT t1.role_id , t2.role_name FROM rbac_user_role as t1
                JOIN rbac_roles as t2 ON t1.role_id = t2.role_id
                WHERE t1.id_user ='".$id_user."'";
        $run_query = $this->db->query($sql);
        return $run_query->result();
    }
     
     /**
      * model untuk memasukkan array dari role untuk suatu user 
      * input   : $id_user , $role_id (array)
      * output  : boolean
      */
    public function insertUserRole($id_user,$roles){
        for ($i=0; $i < count($roles); $i++) { 
            if ($roles[$i]!='') {
                $sql = "INSERT INTO rbac_user_role (id_user,role_id) VALUES (".$id_user.",".$roles[$i].")";
                if(!$this->db->query($sql)){
                    return false;
                }
            }
        }
        return true;    
    }
    
    /**
     * model untuk menghapus seluruh role dari id_user
     * input    : $id_user
     * output   : boolean
     */
    public function deleteUserRoles($id_user){
        $sql = "DELETE FROM rbac_user_role WHERE id_user='".$id_user."'";
        return $this->db->query($sql);
    }

    public function deleteRolesPermission($role_id){
        $sql = "DELETE FROM rbac_role_perm WHERE role_id='".$role_id."'";
        return $this->db->query($sql);
    }
    
    /**
     * model untuk memasukkan role dan permission yang baru
     * input    : $data = ($role_id + $perm_id + data pendukung) 
     * output   : boolean
     */ 
    public function insertPerm($data){
        $this->db->insert($this->table_permission,$data);
        return $this->db->insert_id();
    }

    public function selectPerm($data){
        $this->db->where($data);
        $query = $this->db->get($this->table_permission);
        return $query->row();
    }

    public function updatePerm($id,$data) {
        $this->db->where($this->primary_permission,$id);
        return $this->db->update($this->table_permission,$data);
    }

    //TODO : Buat insert global
    public function insertRole($data){
        $this->db->insert($this->table_role,$data);
        return $this->db->insert_id();
    }

    public function selectRole($data){
        $this->db->where($data);
        $query = $this->db->get($this->table_role);
        return $query->row();
    }

    public function updateRole($id,$data) {
        $this->db->where($this->primary_role,$id);
        return $this->db->update($this->table_role,$data);
    }

    public function insertuser($data){
        $this->db->insert('rbac_user',$data);
        return $this->db->insert_id();
    }

    public function insertuser_detail($data){
        $this->db->insert('rbac_user_detail',$data);
        return true;
    }

    public function selectuser($data){
        $sql = "
            SELECT rbac_user.*,rbac_user_detail.* FROM rbac_user
            LEFT JOIN rbac_user_detail ON rbac_user_detail.id_user=rbac_user.id_user
            WHERE rbac_user.id_user='".$data['id_user']."'";
        return $this->db->query($sql)->row();
    }

    public function selectuserdetail($data){
        $this->db->where($data);
        $query = $this->db->get('rbac_user_detail');
        return $query->row();
    }

    public function updateuser($id,$data) {
        $this->db->where($this->primary_user,$id);
        return $this->db->update($this->table_user,$data);
    }

    public function updateuser_detail($id,$data) {
        $this->db->where('id_user',$id);
        return $this->db->update('rbac_user_detail',$data);
    }


    
    /**
     * Model untuk menhapus seluruh role permission pada tabel role_perm
     * input    :
     * output   : boolean
     */
    public function deletePerms(){
        $sql = "TRUNCATE rbac_role_perm";
        return $this->db->query($sql);
    }
    
    public function getMenuById($id_user){
        $sql = "SELECT DISTINCT rbac_menu.* FROM rbac_role_perm
                INNER JOIN rbac_roles
                ON rbac_roles.role_id=rbac_role_perm.role_id
                INNER JOIN rbac_permissions
                ON rbac_role_perm.perm_id=rbac_permissions.perm_id
                INNER JOIN rbac_menu
                ON rbac_permissions.id_menu=rbac_menu.id_menu
                WHERE rbac_roles.role_id IN ( 
                		SELECT rbac_roles.role_id FROM rbac_user_role 
                		INNER JOIN `user`
                		ON `user`.id_user=rbac_user_role.id_user
                		INNER JOIN rbac_roles
                		ON rbac_user_role.role_id=rbac_roles.role_id
                		WHERE `user`.id_user=$id_user
                )";
        return $this->db->query($sql);
    }
    
    // Custom function for Data Table
    function get_data_count($table,$columns,$data) {
        foreach ($columns as $column) {
            $this->db->or_like($column,$data['sSearch']);
        }
        return $this->db->get($table)->num_rows();
    }
    function get_data($table,$columns,$data,$sortcol) {
        foreach ($columns as $column) {
            $this->db->or_like($column,$data['sSearch']);
        }
        $this->db->order_by($sortcol, $data['sSortDir_0']);
        return $this->db->get($table, $data['iDisplayLength'],$data['iDisplayStart'])->result();
    }

    //user--------------------------------------------------------------------

    function get_query_string_user($data,$columns){
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

        $query_string = "
            SELECT * FROM (
                SELECT 
                    rbac_user.username, 
                    rbac_user_detail.*,
                    GROUP_CONCAT(rbac_roles.role_name SEPARATOR ', ') AS role_user,
                    m_position.name AS position_
                FROM rbac_user
                LEFT JOIN rbac_user_detail
                    ON rbac_user_detail.id_user=rbac_user.id_user
                LEFT JOIN m_position
                    ON m_position.id=rbac_user_detail.position
                LEFT JOIN rbac_user_role
                    ON rbac_user_role.id_user=rbac_user.id_user
                LEFT JOIN rbac_roles
                    ON rbac_roles.role_id=rbac_user_role.role_id
                WHERE rbac_user.active='1'
                GROUP BY rbac_user.id_user) AS data_user
            WHERE ".$q;

        return $query_string;
    }

    function get_data_user($data,$sortcol,$columns) {
        $query = $this->db->query($this->get_query_string_user($data,$columns)."
            ORDER BY ".$sortcol." ".$data['sSortDir_0']." LIMIT ".$data['iDisplayStart'].",".$data['iDisplayLength']);
        return $query->result();
    }

    function get_data_count_user($data,$columns) {
        $query = $this->db->query("
            SELECT count(*) AS count
            FROM (".$this->get_query_string_user($data,$columns).") AS a");
        return $query->row();
    }

    //permission--------------------------------------------------------------------

    function get_query_string_perm($data,$columns){
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

        $query_string = "
            SELECT rbac_permissions.*,rbac_menu.text AS menu FROM rbac_permissions
            LEFT JOIN rbac_menu
                ON rbac_menu.id_menu=rbac_permissions.id_menu
            WHERE `delete`='0'
            AND ".$q;

        return $query_string;
    }

    function get_data_perm($data,$sortcol,$columns) {
        $query = $this->db->query($this->get_query_string_perm($data,$columns)."
            ORDER BY ".$sortcol." ".$data['sSortDir_0']." LIMIT ".$data['iDisplayStart'].",".$data['iDisplayLength']);
        return $query->result();
    }

    function get_data_count_perm($data,$columns) {
        $query = $this->db->query("
            SELECT count(*) AS count
            FROM (".$this->get_query_string_perm($data,$columns).") AS a");
        return $query->row();
    }

    //role-----------------------------------------------------------------

    function get_query_string_role($data,$columns){
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

        $query_string = "
            SELECT * FROM rbac_roles
            WHERE `delete`='0'
            AND ".$q;

        return $query_string;
    }

    function get_data_role($data,$sortcol,$columns) {
        $query = $this->db->query($this->get_query_string_role($data,$columns)."
            ORDER BY ".$sortcol." ".$data['sSortDir_0']." LIMIT ".$data['iDisplayStart'].",".$data['iDisplayLength']);
        return $query->result();
    }

    function get_data_count_role($data,$columns) {
        $query = $this->db->query("
            SELECT count(*) AS count
            FROM (".$this->get_query_string_role($data,$columns).") AS a");
        return $query->row();
    }

    public function get_data_user_role($table,$columns,$data,$sortcol){
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

        $query = "
            SELECT 
              * 
            FROM
              (SELECT 
                a.id_user,
                ud.name,
                a.daftar_role 
              FROM
                (SELECT 
                  ur.id_user,
                  GROUP_CONCAT(r.role_name SEPARATOR ', ') AS daftar_role 
                FROM
                  rbac_user_role AS ur 
                  LEFT JOIN rbac_roles AS r 
                    ON ur.role_id = r.role_id 
                GROUP BY ur.id_user) AS a 
                LEFT JOIN rbac_user AS u 
                  ON a.id_user = u.id_user
                LEFT JOIN rbac_user_detail AS ud 
                  ON u.id_user = ud.id_user) AS b 
            WHERE ".$q."
            ORDER BY ".$sortcol." ".$data['sSortDir_0']."
            LIMIT ".$data['iDisplayStart'].",".$data['iDisplayLength']."";
        return $this->db->query($query)->result();
    }

    public function get_data_user_role_byid($data){
        $query = "select * from (select a.id_user,u.username,a.daftar_role from  (
                select ur.id_user,GROUP_CONCAT(r.`role_id` SEPARATOR ',') as daftar_role  from rbac_user_role as ur
                left join rbac_roles as r
                on ur.role_id=r.role_id
                GROUP BY ur.id_user)
                as a
                left join rbac_user as u
                on a.id_user=u.id_user)
                as b
                where b.id_user = '".$data['id_user']."'";
        return $this->db->query($query)->row();
    }

    public function get_data_user_role_count($table,$columns,$data){
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

        $query = "
            SELECT COUNT(*) AS count
            FROM
              (SELECT 
                a.id_user,
                ud.name,
                a.daftar_role 
              FROM
                (SELECT 
                  ur.id_user,
                  GROUP_CONCAT(r.role_name SEPARATOR ', ') AS daftar_role 
                FROM
                  rbac_user_role AS ur 
                  LEFT JOIN rbac_roles AS r 
                    ON ur.role_id = r.role_id 
                GROUP BY ur.id_user) AS a 
                LEFT JOIN rbac_user AS u 
                  ON a.id_user = u.id_user
                LEFT JOIN rbac_user_detail AS ud 
                  ON u.id_user = ud.id_user) AS b 
            WHERE ".$q."";
        return $this->db->query($query)->row();
    }
    
    function delete_user_role($id){
        $this->db->where('id_user',$id);
        return $this->db->delete('rbac_user_role');
    }

    function deletePermission($id){
        $this->db->where('perm_id',$id);
        return $this->db->delete('rbac_permissions');
    }

    function delete_role_permission($id){
        $this->db->where('role_id',$id);
        return $this->db->delete('rbac_role_perm');
    }

    function deleteRole($id){
        $this->db->where('role_id',$id);
        return $this->db->delete('rbac_roles');
    }

    public function insertRolePermission($data){
        $this->db->insert($this->table_role_permission,$data);
        return $this->db->insert_id();
    }

    public function get_data_role_perm($data){
        $query = "
            SELECT 
                rp.group,
                GROUP_CONCAT(
                    CONCAT(
                        rp.`perm_id`,
                        '-',
                        rp.`perm_desc`,
                        '-',
                        IF(e.`perm_id`, 1, 0)
                    ) 
                    ORDER BY rp.`group` ASC,rp.`id_menu` ASC,rp.`perm_desc` ASC
                    SEPARATOR ','
                ) AS daftar_perm 
            FROM
                `rbac_permissions` AS rp 
                LEFT JOIN `rbac_role_perm` AS e 
                    ON e.`perm_id` = rp.`perm_id` 
                    AND e.`role_id` = '".$data['role_id']."' 
            WHERE rp.`delete`='0'
            GROUP BY rp.group";
        return $this->db->query($query)->result();
    }

    function load_menu(){
        $query = $this->db->query("
            SELECT rbac_menu.*,`rbac_permissions`.`perm_desc` 
            FROM rbac_menu
            LEFT JOIN `rbac_permissions` ON `rbac_permissions`.`id_menu`=`rbac_menu`.`id_menu`
            GROUP BY `rbac_menu`.id_menu
            ORDER BY `rbac_menu`.`weight` ASC");
        $arrs = array();
        foreach($query->result_array() as $row){
            $arrs[] = $row;
        }
        return $arrs;
    }

    // function build_menu1($arrs, $parent=0, $level=0){
    //     $init = '
    //         <div class="box-group" id="accordion">';
    //     foreach ($arrs as $arr) {
    //         if ($arr['parent'] == $parent) {
    //             $init .= '
    //             <div class="'.($level==0?'panel box box-primary':'').'">
    //                 <div class="box-header with-border" style="padding: 4px 10px;">
    //                     <h4 class="box-title">
    //                         <a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$arr['id_menu'].'" style="padding-left:'.($level * 25).'px;color:#000000;font-size:16px;">
    //                             <i style="color:#3B464A;" class="'.$arr["icon"].' fa-fw"></i> '.$arr["text"].' <span onclick="delete_list('.$arr['id_menu'].')" style="display: inline-block;float: right;width: auto;cursor: pointer;z-index:9999;"><i class="fa fa-fw fa-trash-o"></i> Hapus</span> <span onclick=show_menu("'.$arr['id_menu'].'") style="display: inline-block;float: right;width: auto;margin-right: 17px;cursor: pointer;z-index:999;"><i class="fa fa-fw fa-edit"></i> Ubah</span>
    //                         </a>
    //                     </h4>
    //                 </div>
    //                 <div id="collapse'.$arr['id_menu'].'" class="panel-collapse collapse" style="height: 0px;">';
    //                 $init .= $this->build_menu1($arrs, $arr['id_menu'], $level+1);
    //                 $init .= '
    //                 </div>
    //             </div>';
    //         }
    //     }
    //     $init .= '
    //         </div>';
    //     return $init;
    // }

    function build_menu1($arrs, $parent=0, $level=0, $first=1){
        $init = '
            <ol class="'.($first==1?'sortable':'').'">';
        foreach ($arrs as $arr) {
            if ($arr['parent'] == $parent) {
                $init .= '
                <li id="list_'.$arr['id_menu'].'"><div><span class="disclose"><span></span></span><i style="color:#3B464A;" class="'.$arr["icon"].' fa-fw"></i> '.$arr["text"].' <span onclick="delete_list('.$arr['id_menu'].')" style="display: inline-block;float: right;width: auto;cursor: pointer;z-index:9999;"><i class="fa fa-fw fa-trash-o"></i> Delete</span> <span onclick=show_menu("'.$arr['id_menu'].'") style="display: inline-block;float: right;width: auto;margin-right: 17px;cursor: pointer;z-index:999;"><i class="fa fa-fw fa-edit"></i> Edit</span></div>';
                $init .= $this->build_menu1($arrs, $arr['id_menu'], $level+1, 0);
                $init .= '</li>';
            }
        }
        $init .= '
            </ol>';
        return $init;
    }

    function get_header(){
        $query = $this->db->query("SELECT * FROM `rbac_menu` WHERE `parent`='0'");
        return $query->result();
    }

    function get_menu_byid($data){
        $query = $this->db->query("SELECT * FROM rbac_menu WHERE id_menu='".$data['id_menu']."'");
        return $query->row();
    }

    function get_level($parent){
        $query = $this->db->query("SELECT * FROM rbac_menu WHERE id_menu='".$parent."'");
        return $query->row();
    }

    function get_urut($id_parent){
        $query = $this->db->query("SELECT * FROM rbac_menu WHERE parent='".$id_parent."' ORDER BY weight DESC LIMIT 0,1");
        return $query->row();
    }

    function edit_menu($data, $data_id){
        $this->db->where('id_menu',$data_id);
        return $this->db->update('rbac_menu',$data);
    }

    function new_menu($data){
        $this->db->insert('rbac_menu',$data);
        return $this->db->insert_id();
    }

    public function delete_menu($id){
        $sql = "DELETE FROM rbac_menu WHERE id_menu='".$id."'";
        return $this->db->query($sql);
    }
}

?>