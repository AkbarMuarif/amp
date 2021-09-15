<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prs_hotel extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        belum_login();
        cek_level();
        $this->load->model(['wp_m','prs_hotel_m','tipe_wp_m','pws_hotel_m']);
		$this->load->library('form_validation');
	}

	public function index()
	{
		$post=$this->input->post(null, TRUE);
		$awal = $this->input->post('tgl_awal');
		$akhir = $this->input->post('tgl_akhir');	
		if(isset($_POST['cetak'])){
			$data['row'] = $this->prs_hotel_m->cetak($awal,$akhir)->result();
			$data['awal'] = $awal;
			$data['akhir'] = $akhir;
			$html = $this->load->view('pemeriksaan/hotel/rekap_hotel', $data, TRUE);
			$this->fungsi->PdfGenerator($html,'Rekap Pemeriksaan Hotel','A4','landscape');
		}
		$data['row'] = $this->pws_hotel_m->get_sudah();
		$this->template->load('template','pemeriksaan/hotel/prs_hotel_data', $data);
    }

	public function add()
	{	

		$post=$this->input->post(null, TRUE);
		$pws = $this->pws_hotel_m->get_belum()->result();

		
		$data = array(
			'pws' 	 => $pws,
		);

		$this->template->load('template','pemeriksaan/hotel/prs_hotel_add', $data);

		if(isset($_POST['submit'])){
			$this->prs_hotel_m->add($post);
			$this->pws_hotel_m->up_jumlah($post);
			if($this->db->affected_rows() > 0){
				$this->session->set_flashdata('success','Data Berhasil Disimpan');
			}
			redirect('prs_hotel');
		}
	}

	public function cek($id)
	{		
		$prs2 = $this->prs_hotel_m->get($id)->row();
		$prs = $this->prs_hotel_m->get($id)->result();

		$data = array(
			'prs' 	 => $prs,
			'prs2'	 => $prs2,
		);
		$this->template->load('template','pemeriksaan/hotel/data_hotel', $data);
	}

	public function edit($id)
	{
		$post=$this->input->post(null, TRUE);
		$prs = $this->prs_hotel_m->get_id($id)->row();

		$data = array(
			'prs' 	 => $prs,
		);
		$this->template->load('template','pemeriksaan/hotel/prs_hotel_edit', $data);

		if(isset($_POST['submit'])){
			$this->prs_hotel_m->edit($post);
			if($this->db->affected_rows() > 0){
				$this->session->set_flashdata('success','Data Berhasil Diubah');
			}
			redirect('prs_hotel/cek/'.$prs->no_pws);
		}
	}

	public function del($id)
	{
		$this->prs_hotel_m->del($id);
		$this->pws_hotel_m->del_jumlah($id);
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success','Data Berhasil Dihapus');
		}
		redirect('prs_hotel');
	}

	function hasil($id){
		
		$data['row'] = $this->prs_hotel_m->get($id);
		$html = $this->load->view('pemeriksaan/hotel/hasil_hotel', $data, TRUE);
		$this->fungsi->PdfGenerator($html,'pemeriksaan.hotel-'.$id,'A4','landscape');
	}

	function cetak(){
		
		
	}

}