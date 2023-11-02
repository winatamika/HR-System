<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mainpage extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->library('upload');
    }

    public function index(){
        $this->auth->check_login();
        
        if(!$this->auth->hasPrivilege("ViewMyProfile")){
            redirect('home','refresh');
        }

        $user = $this->auth->get_data_session();

        $data['ico'] = '<i class="fa fa-fw fa-user"></i>';
        $data['title'] = 'My Profile';
        $data['sub_title'] = 'detail';
        
        $data['id_user']=$user->id_user;
        $data['content']="profile/view";
        $data['form_id']="form-input-rbac-user";
        
        $data['url_add']=base_url()."profile/mainpage/add_user";
        $data['url_edit']=base_url()."profile/mainpage/edit_user";
        $data['url_show_data']=base_url()."profile/mainpage/show_user";
        $data['url_load_upper_position']=base_url()."profile/mainpage/load_upper_position";

        $mini_list = $this->global_model->general_select('m_mini_list',array('`group`'=>'BLOOD TYPE','`delete`'=>'0'),'result','','');
        $data['blood_type'] = $this->global_model->general_combo($mini_list,'yes','value','value_name','');

        $mini_list = $this->global_model->general_select('m_mini_list',array('`group`'=>'RELIGION','`delete`'=>'0'),'result','','');
        $data['religion'] = $this->global_model->general_combo($mini_list,'yes','value','value_name','');

        $mini_list = $this->global_model->general_select('m_nationality',array('`delete`'=>'0'),'result','','');
        $data['nationality'] = $this->global_model->general_combo($mini_list,'yes','id','name','');

        $mini_list = $this->global_model->general_select('m_mini_list',array('`group`'=>'MARTIAL STATUS','`delete`'=>'0'),'result','','');
        $data['martial_status'] = $this->global_model->general_combo($mini_list,'yes','value','value_name','');

        $mini_list = $this->global_model->general_select('m_mini_list',array('`group`'=>'FAMILY MEMBER','`delete`'=>'0'),'result','','');
        $data['family_member'] = $this->global_model->general_combo($mini_list,'yes','value','value_name','');

        $this->db->select('m_position.*');
        $this->db->where('m_position.`delete`','0');
        $this->db->order_by('m_position.weight','ASC');
        $position = $this->db->get('m_position')->result_array();
        $data['position'] = $this->global_model->general_combo_tree($position,'yes','yes','no','0','1','name',array());

        $mini_list = $this->global_model->general_select('m_mini_list',array('`group`'=>'EMPLOYMENT','`delete`'=>'0'),'result','','');
        $data['employment'] = $this->global_model->general_combo($mini_list,'yes','value','value_name','');

        $mini_list = $this->global_model->general_select('m_mini_list',array('`group`'=>'SEX','`delete`'=>'0'),'result','','');
        $data['sex'] = $this->global_model->general_combo($mini_list,'yes','value','value_name','');

        $this->load->view('template-admin/template',$data);
    }

    function add_user(){
        $this->auth->restrict_ajax_login();
        
        //insert user---------------------------------------
        $user = $this->auth->get_data_session();

        date_default_timezone_set('Asia/Makassar');
        $date=date("Y-m-d");
        $time=date("H:i:s");

        $arr_fam = array('fam_name','fam_sex','fam_date_of_birth','fam_status','fam_education','fam_job');
        $jumlah_data_fam = count($_POST[$arr_fam[0]]);
        $first_data_fam = $_POST[$arr_fam[0]][0];
        if (isset($first_data_fam) && $first_data_fam!='') {
            $arr_fam_data = array();
            for ($i=0; $i < $jumlah_data_fam; $i++) { 
                $arr_fam_data_row = array();
                foreach ($arr_fam as $key) {
                    $arr_fam_data_row['id_user'] = $_POST['id'];
                    if ($key=='fam_date_of_birth') {
                        $value = $this->global_model->texttodate($_POST[$key][$i]);
                    }
                    else{
                        $value = $_POST[$key][$i];
                    }
                    $arr_fam_data_row[substr($key, 4)] = $value;
                }
                array_push($arr_fam_data, $arr_fam_data_row);
            }
        }

        if ($_POST['id']=='') {
            $data_post['username'] = $_POST['username'];
            $data_post['active'] = '1';
            $data_post['password'] = md5($_POST['password']);
            $data_post['created_date'] = $date." ".$time;
            $data_post['created_by'] = $user->id_user;
            $id_user = $this->global_model->general_add($data_post,'rbac_user');
        }
        else {
            $data_post['username'] = $_POST['username'];
            $data_post['changed_date'] = $date." ".$time;
            $data_post['changed_by'] = $user->id_user;
            if ($_POST['password']!='') {
                $data_post['password'] = md5($_POST['password']);
            }
            $this->global_model->general_update($data_post,'rbac_user',array('id_user'=>$_POST['id']));
            $id_user = $_POST['id'];
        }

        //insert user detail---------------------------------------
        $ko_foto = $_POST['ko_foto'];
        $arr_unset = array('id','username','password','confirmPassword','ko_foto','filename-foto','file_bank_account');
        foreach ($arr_unset as $key) {
            unset($_POST[$key]);
        }
        foreach ($arr_fam as $key) {
            unset($_POST[$key]);
        }
        $_POST['date_of_birth'] = $this->global_model->texttodate(@$_POST['date_of_birth']);
        if (isset($_POST['starting_date'])) {
            $_POST['starting_date'] = $this->global_model->texttodate(@$_POST['starting_date']);
        }
        if ($id_user=='') {
            $_POST['id_user'] = $id_user;
            $result = $this->global_model->general_add($_POST,'rbac_user_detail');
        }
        else {
            $result = $this->global_model->general_update($_POST,'rbac_user_detail',array('id_user'=>$id_user));
        }

        $edit_photo = $this->upload_file('foto',$ko_foto,'filename-foto',$id_user,'photo_profile','rbac_user_detail','id_user');
        $file_bank_account = $this->upload_file('','','file_bank_account',$id_user,'file_bank_account','rbac_user_detail','id_user');

        //insert family---------------------------------------------
        $deleteFamily = $this->global_model->general_delete(array('id_user'=>$id_user),'tb_family_data');
        if (isset($first_data_fam) && $first_data_fam!='') {
            foreach ($arr_fam_data as $key) {
                $insertFamily = $this->global_model->general_add($key,'tb_family_data');
            }
        }

        if ($result) {
            $is_user_login = 'no';
            if ($user->id_user==$id_user) {
                if ($edit_photo) {
                    $this->set_ses_value('photo_profile',$edit_photo);
                }
                $this->set_ses_value('name',$this->input->post('name'));
                $is_user_login = 'yes';
            }

            $arr = array(
                'submit' => '1',
                'id_user' => $id_user,
                'photo_profile' => $edit_photo,
                'name' => $_POST['name'],
                'is_user_login' => $is_user_login,
            );
        }
        else{
            $arr = array(
                'submit'    => '0',
                'error'     => 'error!!!',
            );
        }
        echo json_encode($arr);
    }

    function show_user(){
        $data_user = $this->global_model->general_select('rbac_user',array('`id_user`'=>$_POST['id']),'row','','');
        $data_user_detail = $this->global_model->general_select('rbac_user_detail',array('`id_user`'=>$_POST['id']),'row','','');
        $data_family = $this->global_model->general_select('tb_family_data',array('`id_user`'=>$_POST['id']),'result','','');

        $arr = array();
        foreach ($data_user as $key => $value) {
            $arr[$key] = $value;
        }
        foreach ($data_user_detail as $key => $value) {
            $arr[$key] = $value;
        }
        $arr['id'] = $data_user->id_user;
        $arr['password'] = "";
        $arr['date_of_birth'] = $this->global_model->datetotext(@$data_user_detail->date_of_birth);
        $arr['starting_date'] = $this->global_model->datetotext(@$data_user_detail->starting_date);
        $arr['photo_profile'] = (isset($data_user_detail->photo_profile) && file_exists(getcwd()."/".$data_user_detail->photo_profile) ? base_url().$data_user_detail->photo_profile : base_url()."media/dist/img/user_no_photo.png");
        $arr['file_bank_account'] = (isset($data_user_detail->file_bank_account) && $data_user_detail->file_bank_account !='' && file_exists(getcwd()."/".$data_user_detail->file_bank_account) ? base_url().$data_user_detail->file_bank_account:'');
        $arr['jumlah_family'] = count($data_family);

        if ($data_family > 0) {
            $no_ = 1;
            foreach ($data_family as $row) {
                $arr['fam_name'.$no_] = $row->name;
                $arr['fam_sex'.$no_] = $row->sex;
                $arr['fam_date_of_birth'.$no_] = $this->global_model->datetotext(@$row->date_of_birth);
                $arr['fam_status'.$no_] = $row->status;
                $arr['fam_education'.$no_] = $row->education;
                $arr['fam_job'.$no_] = $row->job;

                $no_++;
            }
        }
        else{
            $no_ = 1;
            $arr['fam_name'.$no_] = "";
            $arr['fam_sex'.$no_] = "";
            $arr['fam_date_of_birth'.$no_] = "";
            $arr['fam_status'.$no_] = "";
            $arr['fam_education'.$no_] = "";
            $arr['fam_job'.$no_] = "";
        }

        echo json_encode($arr);
    }

    function upload_file($jenis_file='',$ko_foto,$file_name,$id_data,$kategori_upload,$table_master_,$table_id_){
        $status = "";
        $msg = "";
        $file_upload = "";
        $file_element_name = $file_name;
        $kategori = $kategori_upload;
        $upload_file_path = "";

        $data_row = $this->global_model->general_select($table_master_,array($table_id_=>$id_data),'row','','');

        if ($status != "error"){
            if(!is_dir(getcwd().'/uploads/'.$kategori.'_dir')){
                mkdir(getcwd().'/uploads/'.$kategori.'_dir');
            }
            $config_['upload_path'] = getcwd().'/uploads/'.$kategori.'_dir';
            $config_['allowed_types'] = 'jpg|png|pdf';
            $config_['encrypt_name'] = TRUE;

            $this->upload->initialize($config_);

            if (!$this->upload->do_upload($file_element_name)){
                $status = 'error';
                $msg = $this->upload->display_errors('', '');
            }
            else{
                $data = $this->upload->data();
                $file_path = $data['full_path'];
                $file_upload = $data['file_name'];
                if(file_exists($file_path)){
                    $status = "success";
                    $msg = "File successfully uploaded";
                    $upload_file_path = 'uploads/'.$kategori.'_dir/'.$file_upload;

                    if ($jenis_file=='foto') {
                        $this->load->library('image_lib');
                        $arr_ko = explode(';', $ko_foto);

                        $config3['image_library'] = 'gd2';
                        $config3['source_image'] = 'uploads/'.$kategori.'_dir/'.$file_upload;
                        $config3['maintain_ratio'] = FALSE;
                        $config3['rotation_angle']  = intval(substr($arr_ko[4], 0, -3));
                        $this->image_lib->initialize($config3);
                        $this->image_lib->rotate();

                        $config1['image_library'] = 'gd2';
                        $config1['source_image'] = 'uploads/'.$kategori.'_dir/'.$file_upload;
                        $config1['maintain_ratio'] = FALSE;
                        $config1['width']  = intval(substr($arr_ko[2], 0, -2));
                        $config1['height'] = intval(substr($arr_ko[3], 0, -2));
                        $this->image_lib->initialize($config1);
                        $this->image_lib->resize();

                        $this->image_lib->clear();
                        $config2['image_library'] = 'gd2';
                        $config2['source_image'] = 'uploads/'.$kategori.'_dir/'.$file_upload;
                        $config2['maintain_ratio'] = FALSE;
                        $config2['x_axis'] = abs(intval(substr($arr_ko[0], 0, -2)));
                        $config2['y_axis'] = abs(intval(substr($arr_ko[1], 0, -2)));
                        $config2['width']  = 152;
                        $config2['height'] = 182;
                        $this->image_lib->initialize($config2);
                        $this->image_lib->crop();
                    }

                    if ($data_row->$kategori!='') {
                        $arr_file_path = explode('/', $data_row->$kategori);
                        if (file_exists(getcwd().'/uploads/'.$kategori.'_dir'.'/'.$arr_file_path[2])) {
                            unlink(getcwd().'/uploads/'.$kategori.'_dir'.'/'.$arr_file_path[2]);
                        }
                    }

                    //update file di database
                    $data_post[$kategori] = 'uploads/'.$kategori.'_dir'.'/'.$file_upload;
                    $result = $this->global_model->general_update($data_post,$table_master_,array($table_id_=>$id_data));
                }
                else{
                    $status = "error";
                    $msg = "Something went wrong when saving the file, please try again.";
                }
            }
            @unlink($_FILES[$file_element_name]);
        }
        // echo json_encode(array('status' => $status, 'msg' => $msg, 'img' => $file_upload));
        return $upload_file_path;
    }

    function set_ses_value($var='',$value=''){
        $x = ($var!=''?$var:$_POST['x']);
        $x_value = ($value!=''?$value:$_POST['x_value']);
        $user = $this->session->userdata('user');
        $un_user = unserialize($user);
        $un_user->$x = $x_value;

        $user_ = serialize($un_user);
        $this->session->set_userdata('user',$user_);

        if ($var=='') {
            $arr = array(
                'submit'    => '1',
            );

            echo json_encode($arr);
        }
    }

    function load_upper_position(){
        $position = $this->global_model->general_select('m_position',array('id'=>$_POST['position'],'`delete`'=>'0'),'row','','');
        $list_user = $this->global_model->general_select('rbac_user_detail',array('position'=>$position->parent),'result','','');
        echo $this->global_model->general_combo($list_user,'yes','id_user','name',$_POST['value']);
    }
}
