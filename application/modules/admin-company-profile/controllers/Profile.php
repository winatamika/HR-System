<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('global_model/lov_model');
        $this->load->model('profile_model');

        $this->load->library('upload');
    }

    public function index(){
        $this->auth->check_login();

        if(!$this->auth->hasPrivilege('ViewCompanyProfile')){
            redirect('admin-home/home','refresh');
        }

        $data['ico'] = '<i class="fa fa-shirtsinbulk"></i>';
        $data['title'] = 'CompanyProfile';
        $data['sub_title'] = '';

        $data['content']="admin-company-profile/profile";
        $data['form_id']="form-input-profile";
        $data['table_id']="table-profile";

        $data['url_add']=base_url()."admin-company-profile/profile/add_profile";
        $data['url_edit']=base_url()."admin-company-profile/profile/edit_profile";
        $data['url_delete']=base_url()."admin-company-profile/profile/delete_profile";
        $data['url_load_table']=base_url()."admin-company-profile/profile/list_profile";
        $data['url_show_data']=base_url()."admin-company-profile/profile/show_profile";

        $this->load->view('template-admin/template',$data);
    }

    public function list_profile(){
        $this->auth->restrict_ajax_login_datatable();
        
        $arr_sort = array('id','','name');
        $list_profile = $this->profile_model->get_data($_GET,$arr_sort[$_GET['iSortCol_0']],$arr_sort);
        $list_profile_count = $this->profile_model->get_data_count($_GET,$arr_sort);

        $html = '{
            "iTotalRecords": '.$list_profile_count->count.',
            "iTotalDisplayRecords": '.$list_profile_count->count.',
            "aaData": [';
            $no=$_GET['iDisplayStart']+1;
            foreach ($list_profile as $row) {
                $html .= '
                    [
                        "<input type=\"checkbox\" name=\"check_list\" value=\"'.$row->id.'\">",
                        "<div style=\"display:inline-block;vertical-align:top; margin-right:20px; width: 161px; height: 161px; background: rgb(238, 238, 238) none repeat scroll 0% 0%; border: 1px solid rgb(222, 222, 222);\"><img style=\"width:100%;\" src=\"'.base_url().$row->logo.'\"></div><span style=\"display:inline-block;vertical-align:top;\"><b>'.$row->name.'</b> - '.$row->slogan.'<br><i class=\"fa fa-taxi\" style=\"width:30px;\"></i> '.$row->address.'<br><i class=\"fa fa-phone\" style=\"width:30px;\"></i> '.$row->phone.'<br><i class=\"fa fa-envelope\" style=\"width:30px;\"></i> '.$row->email.'<br><i class=\"fa fa-facebook\" style=\"width:30px;\"></i> '.$row->facebook.'<br><i class=\"fa fa-twitter\" style=\"width:30px;\"></i> '.$row->twitter.'<br><i class=\"fa fa-instagram\" style=\"width:30px;\"></i> '.$row->instagram.'<br><i class=\"fa fa-google-plus\" style=\"width:30px;\"></i> '.$row->google.'</span>",
                        "<div class=\"btn-group\">'.($this->auth->hasPrivilege("EditCompanyProfile") || $this->auth->hasPrivilege("DetailCompanyProfile")?'<button class=\"btn btn-primary btn-xs btn-flat btn_table_edit\" onclick=\"show_data('.$row->id.');\"><i class=\"fa fa-fw fa-pencil\"></i> <span>Edit</span></button>':'').'</div>"
                    ],';
                $no++;
            }
        if (count($list_profile)!=0) {
            $html = substr($html, 0, -1).']}';
        }
        else{
            $html .= ']}';
        }
        echo $html;
    }

    function add_profile(){
        $this->auth->restrict_ajax_login();

        //insert ---------------------------------------
        $user = $this->auth->get_data_session();

        date_default_timezone_set('Asia/Makassar');
        $date=date("Y-m-d");
        $time=date("H:i:s");

        $data_post = array(
            'name' => $this->input->post('name'),
            'slogan' => $this->input->post('slogan'),
            'address' => $this->input->post('address'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'facebook' => $this->input->post('facebook'),
            'twitter' => $this->input->post('twitter'),
            'instagram' => $this->input->post('instagram'),
            'google' => $this->input->post('google'),
            'maps' => $this->input->post('maps'),
        );

        $data_post['created_date'] = $date." ".$time;
        $data_post['created_by'] = $user->id_user;

        $id_ = $this->profile_model->insertCompanyProfile($data_post);

        //upload file----------------------------------------------------------------
        $upload_file = $this->upload_file('foto',$this->input->post('ko_image'),'filename-image',$id_,'logo');

        if ($id_) {
            $arr = array(
                'submit'    => '1',
                'id_' => $id_,
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

    function show_profile(){
        $data_profile = $this->profile_model->get_data_byid($this->input->post('id'));
        $arr = array(
            'img' => (isset($data_profile->logo) && file_exists(getcwd()."/".$data_profile->logo) ? base_url().$data_profile->logo : base_url()."media/dist/img/sample_image.jpg"),
            'name' => $data_profile->name,
            'slogan' => $data_profile->slogan,
            'address' => $data_profile->address,
            'email' => $data_profile->email,
            'phone' => $data_profile->phone,
            'facebook' => $data_profile->facebook,
            'twitter' => $data_profile->twitter,
            'instagram' => $data_profile->instagram,
            'google' => $data_profile->google,
            'maps' => $data_profile->maps,
            'id_' => $data_profile->id
        );

        echo json_encode($arr);
    }

    function edit_profile($id){
        $this->auth->restrict_ajax_login();

        //edit -----------------------------------------------
        $user = $this->auth->get_data_session();

        date_default_timezone_set('Asia/Makassar');
        $date=date("Y-m-d");
        $time=date("H:i:s");

        $data_post = array(
            'name' => $this->input->post('name'),
            'slogan' => $this->input->post('slogan'),
            'address' => $this->input->post('address'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'facebook' => $this->input->post('facebook'),
            'twitter' => $this->input->post('twitter'),
            'instagram' => $this->input->post('instagram'),
            'google' => $this->input->post('google'),
            'maps' => $this->input->post('maps'),
        );

        $data_post['changed_date'] = $date." ".$time;
        $data_post['changed_by'] = $user->id_user;

        $result = $this->profile_model->updateCompanyProfile($id,$data_post);

        //upload file----------------------------------------------------------------
        $upload_file = $this->upload_file('foto',$this->input->post('ko_image'),'filename-image',$id,'logo');

        if ($result) {
            $arr = array(
                'submit'    => '1',
                'id_' => $id,
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

    function delete_profile(){
        $this->auth->restrict_ajax_login();
        
        $id = $this->input->post('id');

        $data_post = array(
            'delete' => '1',
        );

        $result = $this->profile_model->updateCompanyProfile($id,$data_post);
        if ($result) {
            $arr = array(
                'submit'    => '1',
                'id_jabatan' => $result,
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

    function upload_file($jenis_file,$ko_foto,$file_name,$id_data,$kategori_upload){
        $status = "";
        $msg = "";
        $file_upload = "";
        $file_element_name = $file_name;
        $kategori = $kategori_upload;
        $upload_file_path = "";

        $data__ = $this->profile_model->get_data_byid($id_data);

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
                        //crop image
                        //left:0px;top:-12.9px;width:152px;height:207px;
                        $arr_ko = explode(';', $ko_foto);

                        $config1['image_library'] = 'gd2';
                        $config1['source_image'] = 'uploads/'.$kategori.'_dir/'.$file_upload;
                        $config1['maintain_ratio'] = FALSE;
                        $config1['width']  = intval(substr($arr_ko[2], 0, -2));
                        $config1['height'] = intval(substr($arr_ko[3], 0, -2));

                        $this->load->library('image_lib', $config1);
                        $this->image_lib->resize();

                        $this->image_lib->clear();
                        $config2['image_library'] = 'gd2';
                        $config2['source_image'] = 'uploads/'.$kategori.'_dir/'.$file_upload;
                        $config2['maintain_ratio'] = FALSE;
                        $config2['x_axis'] = abs(intval(substr($arr_ko[0], 0, -2)));
                        $config2['y_axis'] = abs(intval(substr($arr_ko[1], 0, -2)));
                        $config2['width']  = 161;
                        $config2['height'] = 161;
                        $this->image_lib->initialize($config2); 
                        if (!$this->image_lib->crop()) {
                            $status = "error";
                            $msg = $this->image_lib->display_errors();
                        }
                        //end crop image
                    }

                    if ($data__->$kategori!='') {
                        $arr_file_path = explode('/', $data__->$kategori);
                        if (file_exists(getcwd().'/uploads/'.$kategori.'_dir'.'/'.$arr_file_path[2])) {
                            unlink(getcwd().'/uploads/'.$kategori.'_dir'.'/'.$arr_file_path[2]);
                        }
                    }

                    //update file di database
                    $data_post[$kategori] = 'uploads/'.$kategori.'_dir'.'/'.$file_upload;
                    $result = $this->profile_model->updateCompanyProfile($id_data,$data_post);
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

    function datetotext($date){
        $datex = explode(" ", $date);
        $datetotext2 = explode("-", $datex[0]);
        return $datetotext2[2]."/".$datetotext2[1]."/".$datetotext2[0];
    }

    function texttodate($date){
        $datex = explode(" ", $date);
        $datetotext2 = explode("/", $datex[0]);
        return $datetotext2[2]."-".$datetotext2[1]."-".$datetotext2[0];
    }
}
