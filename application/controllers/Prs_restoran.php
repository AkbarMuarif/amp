<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prs_restoran extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        belum_login();
        cek_level();
        $this->load->model(['wp_m','prs_restoran_m','tipe_wp_m','pws_restoran_m']);
		$this->load->library('form_validation');
	}

	public function index()
	{
		$post=$this->input->post(null, TRUE);
		$awal = $this->input->post('tgl_awal');
		$akhir = $this->input->post('tgl_akhir');	
		if(isset($_POST['cetak'])){
			$data['row'] = $this->prs_restoran_m->cetak($awal,$akhir)->result();
			$data['awal'] = $awal;
			$data['akhir'] = $akhir;
			$html = $this->load->view('pemeriksaan/restoran/rekap_restoran', $data, TRUE);
		$this->fungsi->PdfGenerator($html,'Rekap Pemeriksaan Restoran','A4','landscape');
		}
		$data['row'] = $this->pws_restoran_m->get_sudah();
		$this->template->load('template','pemeriksaan/restoran/prs_restoran_data', $data);

		
    }

	public function add()
	{	

		$post=$this->input->post(null, TRUE);
		$pws = $this->pws_restoran_m->get_belum()->result();

		
		$data = array(
			'pws' 	 => $pws,
		);

		$this->template->load('template','pemeriksaan/restoran/prs_restoran_add', $data);

		if(isset($_POST['submit'])){
			$this->prs_restoran_m->add($post);
			$this->pws_restoran_m->up_jumlah($post);
			if($this->db->affected_rows() > 0){
				$this->session->set_flashdata('success','Data Berhasil Disimpan');
			}
			redirect('prs_restoran');
		}
	}

	public function cek($id)
	{		
		$prs2 = $this->prs_restoran_m->get($id)->row();
		$prs = $this->prs_restoran_m->get($id)->result();

		$data = array(
			'prs' 	 => $prs,
			'prs2'	 => $prs2
		);
		$this->template->load('template','pemeriksaan/restoran/data_restoran', $data);
	}

	public function edit($id)
	{
		$post=$this->input->post(null, TRUE);
		$prs = $this->prs_restoran_m->get_id($id)->row();

		$data = array(
			'prs' 	 => $prs,
		);
		$this->template->load('template','pemeriksaan/restoran/prs_restoran_edit', $data);

		if(isset($_POST['submit'])){
			$this->prs_restoran_m->edit($post);
			if($this->db->affected_rows() > 0){
				$this->session->set_flashdata('success','Data Berhasil Diubah');
			}
			redirect('prs_restoran/cek/'.$prs->no_pws);
		}
	}

	public function del($id)
	{
		$this->prs_restoran_m->del($id);
		$this->pws_restoran_m->del_jumlah($id);
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success','Data Berhasil Dihapus');
		}
		redirect('prs_restoran');
	}

	function hasil($id){
		
		$data['row'] = $this->prs_restoran_m->get($id);
		$html = $this->load->view('pemeriksaan/restoran/hasil_restoran', $data, TRUE);
		$this->fungsi->PdfGenerator($html,'pemeriksaan.restoran-'.$id,'A4','landscape');
	}
}