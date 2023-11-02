<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
        $this->load->model('model_home');
	}

	public function index(){
        $this->auth->check_login();

        $data['ico'] = '<i class="fa fa-fw fa-home"></i>';
        $data['title'] = 'Welcome to HR System';
        $data['sub_title'] = '';
		$data['content']="home/home";
        
        $data['url_get_count_leave']=base_url()."annual-leave/mainpage/getCountLeave";
        $data['url_get_count_overtime']=base_url()."over-time/mainpage/getCountOvertime";
        $data['url_get_count_claim']=base_url()."over-time/claim/getCountClaim";
        $data['url_get_bar_leave']=base_url()."annual-leave/mainpage/get_bar_leave";
        $data['url_get_overtime_manager']=base_url()."over-time/mainpage/get_overtime_manager";
        
		$this->load->view('template-admin/template',$data);
	}

    function load_chat(){
        date_default_timezone_set('Asia/Makassar');
        $user = $this->auth->get_data_session();
        $data_chat = $this->model_home->get_data_chat();
        $html = '';
        foreach ($data_chat as $row) {
            $html .= '
                <div class="direct-chat-msg '.($row->id_user == $user->id_user?'left':'right').'">
                    <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-'.($row->id_user == $user->id_user?'left':'right').'">'.(isset($row->nama)?$row->nama:'Guest').'</span>
                        <span class="direct-chat-timestamp pull-'.($row->id_user == $user->id_user?'right':'left').'">'.$row->date_chat.'</span>
                    </div>
                    <div class="direct-chat-img-wrap">
                        <img class="direct-chat-img" src="'.base_url().'media/dist/img/avatar-no-image.png" alt="message user image">
                    </div>
                    <div class="direct-chat-text">
                        '.$row->text.'
                    </div>
                </div>';
        }
        if ($data_chat) {
            $arr = array(
                'submit' => '1',
                'list_chat' => $html,
            );
        }
        else{
            $arr = array(
                'submit' => '0',
            );   
        }
        echo json_encode($arr);
    }

    function load_pengumuman(){
        date_default_timezone_set('Asia/Makassar');
        $user = $this->auth->get_data_session();
        $data_pengumuman = $this->model_home->get_data_pengumuman();
        $html = '';
        if (count($data_pengumuman)!=0) {
            foreach ($data_pengumuman as $row) {
                $html .= '
                    <li><a href="#">'.$row->judul.' <span class="label label-success" style="margin-left:10px;">new</span> <span class="direct-chat-timestamp datetime pull-right">'.$row->date_created.'</span></a></li>';
            }    
        }
        else{
            $html .= '
                <li><a href="#">Tidak Ada Pengumuman...</a></li>';
        }
        
        $arr = array(
            'submit' => '1',
            'list_pengumuman' => $html,
        );
        echo json_encode($arr);
    }

    public function sent_chat(){
        //TODO : Insert Permission Checking Here

        date_default_timezone_set('Asia/Makassar');
        $date=date("Y-m-d");
        $time=date("H:i:s");

        $user = $this->auth->get_data_session();

        $data_post   = array(
                'text'             => $this->input->post('message'),
                'timestamp'        => strtotime($date." ".$time),
                'id_user'         => $user->id_user,
        );
        
        $result = $this->model_home->insert_chat($data_post);
        
        if ($result) {
            $arr = array(
                'submit'    => '1',
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
}
