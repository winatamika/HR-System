<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Role implements Serializable
{
    protected $permissions;
    
    public function __construct(){
        $this->CI =& get_instance();
        $this->CI->load->model('admin-rbac/rbac_model');
    }
    
    public function serialize(){
        return serialize(
            array(
                'permissions' => $this->permissions)
            );
    }
    
    public function unserialize($data){
        $data = unserialize($data);
        $this->permissions = $data['permissions'];
    }
    
    /**
     * Fungsi untuk mendapatkan seluruh permission pada role_id yang bersangkutan
     * input    : role_id
     * output   : object role yg berisi permission
     */
    public function getRolePerms($role_id){
        $role = new Role();
        $results = $this->CI->rbac_model->getRolePerms($role_id);
        foreach($results as $result){
            $role->permissions[$result->perm_desc] = true;
        }
        return $role;
    }
    
    /**
     * Fungsi untuk mendapatkan apakah suatu permission ada pada role
     * input    : permission yang dicari
     * output   : true/false
     */
    public function hasPerm($permission){
        return isset($this->permissions[$permission]);
    }
    
    /**
     * Fungsi untuk memasukkan role baru
     * input    : nama role
     * output   : boolean
     */
    public function insertRole($role_name){
        return $this->CI->rbac_model->insertRole($role_name);
    }
    
    /**
     * fungsi untuk memasukkan array dari role untuk suatu user 
     * input   : $id_user , $roles (array)
     * output  : boolean
     */
    public function insertUserRole($id_dosen,$roles){
        return $this->CI->rbac_model->insertUserRole($id_dosen,$roles);
    }
    
    /**
     * fungsi untuk menghapus array dari role,dan seluruh yang berhubungan dengannya
     * input    : $roles (array)
     * output   : boolean 
     */ 
    public function deleteRoles($roles){
        
    }
    
    /**
     * fungsi untuk menghapus seluruh role dari id_user
     * input    : $id_user
     * output   : boolean
     */
    public function deleteUserRoles($id_user){
        return $this->CI->rbac_model->deleteUserRoles($id_user);
    }
    
}


?>