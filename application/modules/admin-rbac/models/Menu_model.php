<?php
require_once( "class.treeManager.php" );
class Menu_model extends CI_Model{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function gen_menu($link){
        $user = $this->auth->get_data_session();
        $arrs = $user->arr_menu;

        $treeManager  = treeManager::get();
        $recordsTree  = $treeManager->getTree( $arrs );

        $q_menu = $this->db->query("SELECT * FROM rbac_menu WHERE link='".$link."'");
        $q_menu_ = $q_menu->row();

        $bapaknya = $this->find_pat($arrs,(isset($q_menu_->id_menu)?$q_menu_->id_menu:''));
        return $this->build_menu1($recordsTree,$bapaknya);
    }

    function find_pat($a, $n, $key='id_menu' ){
        $out = array();
        foreach ($a as $r){
            if ($r[$key] == $n){
                $out = $this->find_pat($a, $r['parent'],'id_menu');
                $out[]=$r;
            }
        }
        return $out;
    }

    function searchForId($id, $array) {
        foreach ($array as $row) {
            if ($row['id_menu'] == $id) {
               return true;
            }
        }
    }

    function build_menu1($arrs,$aktif,$istree='',$menu_id=''){
        $init = '
            <ul class="'.($istree=='1'?'treeview-menu '.($this->searchForId($menu_id, $aktif)?'menu-open':''):'sidebar-menu').'" '.($istree=='1' && $this->searchForId($menu_id, $aktif)?'style="display: block;"':'').'>';
        foreach ($arrs as $arr) {
            if ($this->auth->is_logged_in() && $this->auth->hasPrivilege($arr['perm_desc']) || $this->ChildPrivilege($arr['id_menu'])) {
                $init .= '
                    <li class="'.($istree=='1' && $arr['link']=='#'?'treeview ':'').' '.($this->searchForId($arr['id_menu'], $aktif)?'active':'').'"> 
                        <a data-id_menu="'.$arr['id_menu'].'" data-have_link="'.($arr['link']!='#'?'true':'false').'" href="'.base_url().$arr['link'].'">
                            <i class="'.$arr['icon'].'"></i> <span>'.$arr['text'].'</span></i> '.(count($arr['children'])>0?'<i class="fa fa-angle-down pull-right"></i>':'').'
                        </a>
                        '.(count($arr['children'])>0?$this->build_menu1($arr['children'],$aktif,'1',$arr['id_menu']):'').'
                    </li>';
            }
        }
        $init .= '
            </ul>';
        return $init;
    }

    function arrChildPrivilege($arrs, $parent=0, $level=0){
        $check = '';
        foreach ($arrs as $arr) {
            if ($arr['parent'] == $parent) {
                if ($this->auth->hasPrivilege($arr['perm_desc'])) {
                    $check .= ',ya';
                }
                else{
                    $check .= ',tidak';   
                }
                $check .= $this->arrChildPrivilege($arrs, $arr['id_menu'], $level+1);
            }
        }
        return $check;
    }

    function ChildPrivilege($id_parent){
        $user = $this->auth->get_data_session();
        $arrs = $user->arr_menu;

        $arrhasil = explode(',', substr($this->arrChildPrivilege($arrs,$id_parent), 1));
        if (in_array('ya', $arrhasil)) {
            return true;
        }
    }
}
?>