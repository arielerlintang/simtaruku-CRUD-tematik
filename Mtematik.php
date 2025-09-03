
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mtematik extends CI_Model {

	function tampil_tematik(){
		return $this->db->get("tematik")->result_array();	
	}
	function ambil_tematik($id){	
		$this->db->where("id_tematik",$id);
		return $this->db->get("tematik")->row_array();	
	}
	function simpan_tematik($input){
		$config['upload_path']   = './assets/temantik/';
		$config['allowed_types'] = 'pdf|jpg|jpeg|png';
		$config['overwrite']     = TRUE;

		$this->load->library("upload",$config);
		$upload = $this->upload->do_upload("file_tematik");

		if ($upload) {
			$upload_data = $this->upload->data();
			$filename    = $upload_data['file_name']; 
			$ext         = strtolower($upload_data['file_ext']); 
			$full_path   = $upload_data['full_path']; 

			$input["file_tematik"] = $filename;

			if(in_array($ext, ['.jpg','.jpeg','.png'])){
				$source = $full_path;
				$dst_dir_300 = $upload_data['file_path'].'300_300_'.$filename;
				$dst_dir_500 = $upload_data['file_path'].'500_500_'.$filename;


				resize_crop_image(300, 300, $source, $dst_dir_300, 80);
				resize_crop_image(500, 500, $source, $dst_dir_500, 80);
			}
		}

		$this->db->insert("tematik",$input);
	}
	
	function edit_tematik($input,$id){
		$config['upload_path']   = './assets/temantik/';
		$config['allowed_types'] = 'pdf|jpg|jpeg|png';
		$config['overwrite']     = TRUE;

		$this->load->library("upload",$config);

		$upload = $this->upload->do_upload("file_tematik");

		if ($upload) {
			$upload_data = $this->upload->data();
			$filename    = $upload_data['file_name'];   
			$ext         = strtolower($upload_data['file_ext']); 
			$full_path   = $upload_data['full_path'];   
			
			$input["file_tematik"] = $filename;

			if(in_array($ext, ['.jpg','.jpeg','.png'])){
				$source       = $full_path;
				$dst_dir_300  = $upload_data['file_path'].'300_300_'.$filename;
				$dst_dir_500  = $upload_data['file_path'].'500_500_'.$filename;

				resize_crop_image(300, 300, $source, $dst_dir_300, 80);
				resize_crop_image(500, 500, $source, $dst_dir_500, 80);
			}
		}

		$this->db->where("id_tematik",$id);
		$this->db->update("tematik",$input);
	}

	function hapus_tematik($id)
	{
		$this->db->where("id_tematik",$id);
		$this->db->delete("tematik");
	}


}

/* End of file Mtematik.php */
/* Location: ./application/models/Mtematik.php */
?>