<?php
class Model_home extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	function get_data($data,$sortcol){
		$query = $this->db->query("
			SELECT * 
			FROM m_jabatan 
			WHERE (
				nama_jabatan_panjang like '%".$data['sSearch']."%' OR
				tipe_jabatan like '%".$data['sSearch']."%' OR
				jenis_pegawai like '%".$data['sSearch']."%')
			AND `flag_delete` <> '1'
			ORDER BY ".$sortcol." ".$data['sSortDir_0']." LIMIT ".$data['iDisplayStart'].",".$data['iDisplayLength']);
		return $query->result();
	}
	function get_data_count($data){
		$query = $this->db->query("
			SELECT count(*) AS count 
			FROM m_jabatan 
			WHERE (
				nama_jabatan_panjang like '%".$data['sSearch']."%' OR
				tipe_jabatan like '%".$data['sSearch']."%' OR
				jenis_pegawai like '%".$data['sSearch']."%')
			AND `flag_delete` <> '1'");
		return $query->row();
	}

	function new_jabatan($data){
		$this->db->insert('m_jabatan',$data);
		return $this->db->insert_id();
	}

	function edit_jabatan($data, $data_id){
		$this->db->where('id_jabatan',$data_id);
		return $this->db->update('m_jabatan',$data);
	}

	function delete_jabatan($id){
		$this->db->where('id_jabatan',$id);
		return $this->db->update('m_jabatan',array('flag_delete' => '1'));
	}

	function get_data_byid($data){
		$query = $this->db->query("SELECT * FROM m_jabatan WHERE id_jabatan='".$data['id']."'");
		return $query->row();
	}

	function get_data_chat(){
		$query = $this->db->query("
			SELECT * FROM (
				SELECT `shoutbox`.*, `rbac_user`.`username` AS nama, DATE_FORMAT(FROM_UNIXTIME(`shoutbox`.`timestamp`), '%d %b %Y %I:%i %p') AS date_chat FROM `shoutbox`
				LEFT JOIN `rbac_user` ON `rbac_user`.`id_user`=`shoutbox`.`id_user` 
				ORDER BY `shoutbox`.`timestamp` DESC LIMIT 0,50
			) AS a ORDER BY a.`timestamp` ASC");
		return $query->result();	
	}

	function get_data_pengumuman(){
		$query = $this->db->query("
			SELECT `tb_pengumuman`.*, `rbac_user`.`username` AS nama, DATE_FORMAT(date_created, '%d %b %Y %I:%i %p') AS date_created FROM `tb_pengumuman`
			LEFT JOIN `rbac_user` ON `rbac_user`.`id_user`=`tb_pengumuman`.`user_created` 
			ORDER BY `tb_pengumuman`.`date_created` DESC LIMIT 0,50");
		return $query->result();	
	}

	function insert_chat($data){
		$this->db->insert('shoutbox',$data);
		return $this->db->insert_id();
	}
}
?>