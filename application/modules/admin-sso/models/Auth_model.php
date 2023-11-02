<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
        $this->load->library('admin-sso/Session');
        $this->load->library('admin-sso/User');
        $this->load->library('admin-sso/Role');
    }
    
    var $table = 'rbac_user';
    var $table_roles = 'rbac_roles';
    
    public function login($username,$password){
        if($this->check_password($username,$password)){
            $ipaddress=$_SERVER['REMOTE_ADDR'];
            $user_browser = $_SERVER['HTTP_USER_AGENT'];
            $password2 = md5($password);
            $login_string = md5($password2.$ipaddress.$user_browser);
            $user = $this->user->getByIdUser($username);
            $user->login_string=$login_string;
            $un_user = serialize($user);
            $this->session->set_userdata('user',$un_user);
            return 1;
        }
        else{
            return 0;
        }
    }

    public function validate_session(){
        $un_user = $this->session->userdata('user');
        if($un_user!=false){
            $user = unserialize($un_user);
            $ip_address = $_SERVER['REMOTE_ADDR']; 
			$user_browser = $_SERVER['HTTP_USER_AGENT'];
            $password = $this->getUserData('id_user',$user->id_user)->password;
            $login_check = md5($password.$ip_address.$user_browser);
            
            if($user->login_string==$login_check)
                return true;
            else
                return false;
        }
        return false;
    }
    
    public function logout(){
        $this->session->unset_userdata('user');
    }
    
    public function get_data_session(){
        $un_user = $this->session->userdata('user');
        $user = unserialize($un_user);
        return $user;
    }
    
    function check_username($username){
        $result = $this->db->from($this->table)
                        ->where('username',$username)
                        ->get();
        if($result->num_rows > 0)
            return true;
        else
            return false;
    }

    public function check_password($username,$password){
        $password_new = md5($password);
        $query = $this->db->get_where($this->table, array('username' => $username, 'password' => $password_new, 'active' => '1' ), 1, 0);
        if ($query->num_rows() > 0){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    
    function check_active_user($username){
        $result = $this->db->select('active')
                        ->from($this->table)
                        ->where('username',$username)
                        ->get()->row();
        if($result->active==1)
            return true;
        else
            return false;
    }
    
    public function getUserData($where,$data){
        return $this->db->from($this->table)
                        ->where($where,$data)
                        ->get()->row();
    }

    public function hasPrivilege($privilege){
        $un_user = $this->session->userdata('user');
        $user = unserialize($un_user);
        return $user->hasPrivilege($privilege);
    }

    public function hasRole($role){
        $un_user = $this->session->userdata('user');
        $user = unserialize($un_user);
        return $user->hasRole($role);
    }

    public function get_id_user(){
        $un_user = $this->session->userdata('user');
        $user = unserialize($un_user);
        return $user->id_user;
    }
    
    public function get_role_id_by_name($role_name){
        return $this->db->from($this->table_roles)
                        ->where('role_name',$role_name)
                        ->get()->row()->role_id;
    }
}

?>