<?php
class Model_pages extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function get_data_gallery(){
		$query = $this->db->query("
			SELECT * FROM tb_gallery WHERE `delete`='0'");
		return $query->result();
	}

	function get_data_accommodation(){
		$query = $this->db->query("
			SELECT * FROM tb_accommodation WHERE `delete`='0' ORDER BY created_date DESC");
		return $query->result();
	}

	function get_data_accommodation_similar($id){
		$query = $this->db->query("
			SELECT * FROM tb_accommodation WHERE `delete`='0' AND `id`!='".$id."' ORDER BY created_date DESC LIMIT 0,4");
		return $query->result();
	}

	function get_data_accommodation_detail($id){
		$query = $this->db->query("
			SELECT * FROM tb_accommodation WHERE `id`='".$id."'");
		return $query->row();
	}

	function get_data_accommodation_detail_img($id){
		$query = $this->db->query("
			SELECT * FROM tb_accommodation_img WHERE `id_acco`='".$id."' AND `delete`='0'");
		return $query->result();
	}

	function get_data_offers(){
		$query = $this->db->query("
			SELECT * FROM tb_offers WHERE `delete`='0' ORDER BY created_date DESC");
		return $query->result();
	}

	function get_data_offers_similar($id){
		$query = $this->db->query("
			SELECT * FROM tb_offers WHERE `delete`='0' AND `id`!='".$id."' ORDER BY created_date DESC LIMIT 0,4");
		return $query->result();
	}

	function get_data_offers_detail($id){
		$query = $this->db->query("
			SELECT * FROM tb_offers WHERE `id`='".$id."'");
		return $query->row();
	}

	function get_data_banner_page($id){
		$query = $this->db->query("
			SELECT * FROM tb_banner_page WHERE `text`='".$id."'");
		return $query->row();
	}
}
?>