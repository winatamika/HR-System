<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User implements Serializable
{
    public $roles;
    public $id_user;
    public $username;
    public $login_string;
    public $arr_menu;
    public $photo_profile;
    public $name;
    public $role_active;
    
    public function __construct(){
        $this->CI =& get_instance();
        $this->CI->load->model('admin-rbac/rbac_model');
    }
    
    public function serialize(){
        return serialize(
            array(
                'id_user' => $this->id_user,
                'roles' => $this->roles,
		        'username' => $this->username,
                'login_string' => $this->login_string,
                'arr_menu' => $this->arr_menu,
                'photo_profile' => $this->photo_profile,
                'name' => $this->name,
                'role_active' => $this->role_active,)
                );
    }
    
    public function unserialize($data){
        $data=unserialize($data);
        $this->id_user = $data['id_user'];
        $this->roles = $data['roles'];
	    $this->username = $data['username'];
        $this->login_string = $data['login_string'];
        $this->arr_menu = $data['arr_menu'];
        $this->photo_profile = $data['photo_profile'];
        $this->name = $data['name'];
        $this->role_active = $data['role_active'];
    }
    
    /**
     * Fungsi untuk mendapatkan seluruh informasi pada user termasuk role dan permission
     * input    : $id_user
     * output   : object user
     */
    public function getByIdUser($id_user){
        $result = $this->CI->rbac_model->getByIdUser($id_user);
        if(!empty($result)){
            $user = new User();
            $user->id_user = $result['0']->id_user;
            $user->username = $result['0']->username;
            $user->arr_menu = $this->CI->rbac_model->load_menu();
            $user->photo_profile = $result['0']->photo_profile;
            $user->name = $result['0']->name;
            $user->initRoles();
            $user->role_active = key($user->roles);
            return $user;
        } else {
            return false;
        }
    }
    
    /**
     * Fungsi untuk mendapatkan seluruh permission pada suatu user bedasarkan role_id yang didapat
     */
    protected function initRoles(){
        $this->roles = array();
        $results = $this->CI->rbac_model->getRoleByIdUser($this->id_user);
        foreach($results as $result){
            $this->roles[$result->role_name] = (new Role)->getRolePerms($result->role_id);
        }
    }

    /**
     * Fungsi untuk mendapatkan apakah suatu permission ada pada user
     * input    : $perm yaitu permission
     * output   : boolean
     */

    public function hasPrevilege($perm){
        if(!is_null($this->roles)){
            foreach($this->roles as $role){
                if($role->hasPerm($perm)){
                    return true;
                }
            }
        }
        return false;
    }

    public function hasPrivilege($privilege){
        if(!is_null($this->roles)){
            if($this->roles[$this->role_active]->hasPerm($privilege)){
                return true;
          }
        }
        return false;
    }

    /**
     * Fungsi untuk memeriksa apakah user memiliki suatu role
     * input    : $role_name
     * output   : boolean
     */

    public function hasRole($role_name){
        return isset($this->roles[$role_name]);
    }

    /**
     * Fungsi untuk memasukkan role dan permission yang baru
     * input    : $role_id dan $perm_id
     * output   : boolean
     */

    public function insertPerm($role_id,$perm_id){
        return $this->CI->rbac_model->insertPerm($role_id,$perm_id);
    }

    /**
     * Fungsi untuk menghapus seluruh role permission pada tabel role_perm
     * input    :
     * output   : boolean
     */
    public function deletePerms(){
        return $this->CI->rbac_model->deletePerms();
    }

    public function setLoginString($login_string){
        $this->login_string = $login_string;
    }

    public function getLoginString(){
        return $this->login_string;
    }
}


?>
