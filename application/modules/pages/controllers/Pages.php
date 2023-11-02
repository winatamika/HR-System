<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	function __construct(){
		parent::__construct();
        $this->load->model('model_pages');
	}

	public function contact(){
        $data['ico'] = '<i class="fa fa-inbox"></i>';
        $data['title'] = 'Contact Us';
		$data['content']="contact";
		$data['have_title_img']="yes";
		$data['form_id']="form-contact";
		$data['profile_company'] = $this->model_home->get_profile_company();
		$data['banner_page'] = $this->model_pages->get_data_banner_page('contact');
		$data['url_sent_email']=base_url()."pages/sent_email";
		$this->load->view('template-user/template',$data);
	}

	public function accommodation(){
        $data['ico'] = '<i class="fa fa-hotel"></i>';
        $data['title'] = 'Accommodation';
		$data['content']="accommodation";
		$data['have_title_img']="yes";
		$data['list_accommodation'] = $this->model_pages->get_data_accommodation();
		$data['banner_page'] = $this->model_pages->get_data_banner_page('accommodation');
		$this->load->view('template-user/template',$data);
	}

	public function accommodation_detail($id){
        $data['ico'] = '<i class="fa fa-hotel"></i>';
        $data['title'] = 'Accommodation';
		$data['content']="accommodation_detail";
		$data['have_title_img']="yes";
		$data['list_accommodation'] = $this->model_pages->get_data_accommodation_similar($id);
		$data['list_accommodation_detail'] = $this->model_pages->get_data_accommodation_detail($id);
		$data['list_accommodation_detail_img'] = $this->model_pages->get_data_accommodation_detail_img($id);
		$data['banner_page'] = $this->model_pages->get_data_banner_page('accommodation');
		// echo $this->db->last_query();
		$this->load->view('template-user/template',$data);
	}

	public function specialoffer(){
        $data['ico'] = '<i class="fa fa-gift"></i>';
        $data['title'] = 'Special Offers';
		$data['content']="specialoffer";
		$data['have_title_img']="yes";
		$data['list_offers'] = $this->model_pages->get_data_offers();
		$data['banner_page'] = $this->model_pages->get_data_banner_page('offer');
		$this->load->view('template-user/template',$data);
	}

	public function specialoffer_detail($id){
        $data['ico'] = '<i class="fa fa-gift"></i>';
        $data['title'] = 'Special Offers';
		$data['content']="specialoffer_detail";
		$data['have_title_img']="yes";
		$data['list_offers'] = $this->model_pages->get_data_offers_similar($id);
		$data['list_offers_detail'] = $this->model_pages->get_data_offers_detail($id);
		$data['banner_page'] = $this->model_pages->get_data_banner_page('offer');
		$this->load->view('template-user/template',$data);
	}

	public function gallery(){
        $data['ico'] = '<i class="fa fa-file-photo-o"></i>';
        $data['title'] = 'Gallery';
		$data['content']="gallery";
		$data['have_title_img']="yes";
		$data['banner_page'] = $this->model_pages->get_data_banner_page('gallery');
		$this->load->view('template-user/template',$data);
	}

	public function sent_email(){
		$this->load->library('email');

		$company = $this->model_home->get_profile_company();

		$this->email->from($this->input->post("email"), $this->input->post("name"));
		$this->email->to($company->email);

		$this->email->subject($this->input->post("subject"));
		$this->email->message($this->input->post("message"));

		if ($this->email->send()) {
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
