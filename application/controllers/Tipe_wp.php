<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipe_wp extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        belum_login();
        cek_level();
		$this->load->model('tipe_wp_m');
    }

    public function index()
	{
		$data['row'] = $this->tipe_wp_m->get();
		$this->template->load('template','wp/tipe_wp_data', $data);
    }
    
    public function add()
	{
		$tipewp = new stdClass();
		$tipewp->tipe_id = null;
		$tipewp->jenis_tipe = null;
		$tipewp->ket_tipe = null;
		$tipewp->pajak = null;
		$data = array (
			'page' => 'tambah',
			'row' => $tipewp
		);
		$this->template->load('template','wp/tipe_wp_form', $data);
    }

    public function edit($id)
	{
		$query = $this->tipe_wp_m->get($id);
		if($query->num_rows() > 0){
			$tipewp = $query->row();
			$data = array (
				'page' => 'ubah',
				'row' => $tipewp
			);
			$this->template->load('template','wp/tipe_wp_form', $data);
		}else{
			echo "<script> alert('Data tidak ditemukan');";
			echo "window,location='".site_url('tipe_wp')."';</script>";
		}
    }
    
    public function proses()
	{
		$post=$this->input->post(null, TRUE);
		if(isset($_POST['tambah'])){
			$this->tipe_wp_m->add($post);
		} else if(isset($_POST['ubah'])){
			$this->tipe_wp_m->edit($post);
		}

		if($this->db->affected_rows() > 0){
			echo "<script>
				alert('Data berhasil disimpan');
			</script>";
			echo "<script>window,location='".site_url('tipe_wp')."';</script>";
		} else {
            redirect('tipe_wp');
        }
    }
    
    public function del($id)
	{
		$this->tipe_wp_m->del($id);
		if($this->db->affected_rows() > 0){
			echo "<script>
				alert('Data berhasil dihapus');
			</script>";
			echo "<script>window,location='".site_url('tipe_wp')."';</script>";
		}
	}
}