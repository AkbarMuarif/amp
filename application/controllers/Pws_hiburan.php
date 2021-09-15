<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pws_hiburan extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        belum_login();
        cek_level();
		$this->load->model(['wp_m','pws_hiburan_m','tipe_wp_m']);
		$this->load->library('form_validation');
	}

	public function index()
	{
		$post=$this->input->post(null, TRUE);
		$awal = $this->input->post('tgl_awal');
		$akhir = $this->input->post('tgl_akhir');	
		if(isset($_POST['cetak'])){
			$data['row'] = $this->pws_hiburan_m->cetak($awal,$akhir);
			$data['awal'] = $awal;
			$data['akhir'] = $akhir;
			$html = $this->load->view('pengawasan/hiburan/rekap_hiburan', $data, TRUE);
			$this->fungsi->PdfGenerator($html,'Rekap Pengawasan hiburan','A4','landscape');
		}
		$data['row'] = $this->pws_hiburan_m->get();
		$this->template->load('template','pengawasan/hiburan/pws_hiburan_data', $data);
    }
	
	public function add()
	{
		// form validation
		$this->form_validation->set_rules('tgl_pws', 'Tanggal Pengawasan', 'required');
		$this->form_validation->set_rules('no_pws', 'Nomor Pengawasan', 'required|is_unique[pws_hiburan.no_pws]', array('is_unique' => '%s sudah digunakan'));
		$this->form_validation->set_rules('nama_wp', 'Nama Wajib Pajak', 'required', array('required' => '%s tidak ditemukan'));
		$this->form_validation->set_rules('tgl_bayar', 'Tanggal Bayar', 'required');
		$this->form_validation->set_rules('izin', 'Izin', 'required');
		$this->form_validation->set_rules('tarif', 'Tarif Pajak', 'required');
		$this->form_validation->set_rules('bill', 'Bill/Bon Penjualan', 'required');
		$this->form_validation->set_rules('rekap_terima', 'Rekap Penerimaan Bulanan', 'required');
		$this->form_validation->set_rules('rekap_bill', 'Rekap Penggunaan Bill', 'required');
		$this->form_validation->set_rules('cash', 'Uang Kontan (Cash)', 'required');
		$this->form_validation->set_rules('edc', 'Kartu Debit/Kredit', 'required');
		$this->form_validation->set_rules('emoney', 'E-Money', 'required');
		$this->form_validation->set_rules('ket', 'Keterangan', 'max_length[200]', array('max_length' => '%s tidak bisa memuat lebih dari 200 karakter'));
		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');
		// config image
		$config['upload_path']   = './uploads/pengawasan/hiburan/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']      = 2048;
		$config['file_name']     = 'pws-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);
		
		$nmr=$this->pws_hiburan_m->no_awas();
		$post=$this->input->post(null, TRUE);
		$wp = $this->wp_m->get_modal('hiburan')->result();

		$data = array(
			'wp' 	 => $wp,
			'nmr'	 => $nmr
		);
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->template->load('template','pengawasan/hiburan/pws_hiburan_add', $data);
		} else 
		{
			if(!empty($_FILES['sptpd']['name'])){
				if ($this->upload->do_upload('sptpd')){
					$post['sptpd'] = $this->upload->data('file_name');
				} else {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('error', $error);
					redirect('pws_hiburan/add');
				}
			} else {
				$post['sptpd'] = null;
				if($this->db->affected_rows() > 0){
					$this->session->set_flashdata('alert','File sptpd gagal diupload');
				}
			}	
			if(!empty($_FILES['sspd']['name'])){
				if ($this->upload->do_upload('sspd')){
					$post['sspd'] = $this->upload->data('file_name');
				} else {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('error', $error);
					redirect('pws_hiburan/add');
				}
			} else {
				$post['sspd'] = null;
				if($this->db->affected_rows() > 0){
					$this->session->set_flashdata('alert','File sspd gagal diupload');
				}
			}
			$this->pws_hiburan_m->add($post);
			if($this->db->affected_rows() > 0){
				echo "<script>
					alert('Data berhasil disimpan');
				</script>";
				echo "<script>window,location='".site_url('pws_hiburan')."';</script>";
			} else
			{
				echo "<script>
					alert('Data gagal disimpan');
				</script>";
				echo "<script>window,location='".site_url('pws_hiburan')."';</script>";
			}
			
		}	
	}

	public function edit($id)
	{
		// form validation
		$this->form_validation->set_rules('tgl_pws', 'Tanggal Pengawasan', 'required');
		$this->form_validation->set_rules('nama_wp', 'Nama Wajib Pajak', 'required', array('required' => '%s tidak ditemukan'));
		$this->form_validation->set_rules('tgl_bayar', 'Tanggal Bayar', 'required');
		$this->form_validation->set_rules('izin', 'Izin', 'required');
		$this->form_validation->set_rules('tarif', 'Tarif Pajak', 'required');
		$this->form_validation->set_rules('bill', 'Bill/Bon Penjualan', 'required');
		$this->form_validation->set_rules('rekap_terima', 'Rekap Penerimaan Bulanan', 'required');
		$this->form_validation->set_rules('rekap_bill', 'Rekap Penggunaan Bill', 'required');
		$this->form_validation->set_rules('cash', 'Uang Kontan (Cash)', 'required');
		$this->form_validation->set_rules('edc', 'Kartu Debit/Kredit', 'required');
		$this->form_validation->set_rules('emoney', 'E-Money', 'required');
		$this->form_validation->set_rules('ket', 'Keterangan', 'max_length[200]', array('max_length' => '%s tidak bisa memuat lebih dari 200 karakter'));
		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');
		// config image
		$config['upload_path']   = './uploads/pengawasan/hiburan/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']      = 2048;
		$config['file_name']     = 'pws-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

		$post=$this->input->post(null, TRUE);
		$wp = $this->wp_m->get_modal('hiburan')->result();
		$query = $this->pws_hiburan_m->get($id);
		$nomor = $query->row()->npwpd;
		$cariwp = $this->wp_m->get($nomor)->row();

		$data = array(
			'wp' 	 => $wp,
			'cariwp' => $cariwp
		);

		if ($this->form_validation->run() == FALSE)
		{
			if($query->num_rows()>0){
				$data['row'] = $query->row();
				$this->template->load('template','pengawasan/hiburan/pws_hiburan_edit', $data);
			} else {
				echo "<script> alert('Data tidak ditemukan');";
				echo "window,location='".site_url('pws_hiburan')."';</script>";
			}
		} else 
		{
			if(!empty($_FILES['sptpd']['name'])){
				if ($this->upload->do_upload('sptpd')){
					$hiburan = $this->pws_hiburan_m->get($post['no_pws'])->row();
					if ($hiburan->sptpd != null){
						$target_file = './uploads/pengawasan/hiburan/'.$hiburan->sptpd ;
						unlink($target_file);
					}
					$post['sptpd'] = $this->upload->data('file_name');
				} else {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('error', $error);
					redirect('pws_hiburan/edit');
				}
			} else {
				$post['sptpd'] = null;
			}	
			if(!empty($_FILES['sspd']['name'])){
				if ($this->upload->do_upload('sspd')){
					$hiburan = $this->pws_hiburan_m->get($post['no_pws'])->row();
						if ($hiburan->sspd != null){
							$target_file = './uploads/pengawasan/hiburan/'.$hiburan->sspd ;
							unlink($target_file);
						}
						$post['sspd'] = $this->upload->data('file_name');
				} else {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('error', $error);
					redirect('pws_hiburan/edit');
				}
			} else {
				$post['sspd'] = null;
			}
			$this->pws_hiburan_m->edit($post);
			if($this->db->affected_rows() > 0){
				echo "<script>
					alert('Data berhasil diubah');
				</script>";
				echo "<script>window,location='".site_url('pws_hiburan')."';</script>";
			} else {
				redirect('pws_hiburan');
			}
			
		}	
	}

	public function del($id)
	{
		$hiburan = $this->pws_hiburan_m->get($id)->row();
		$datasptpd = $hiburan->sptpd;
		$datasspd = $hiburan->sspd;
		$this->pws_hiburan_m->del($id);
		$error = $this->db->error();

		if($error['code'] != 0){
			echo "<script>alert('Data tidak dapat dihapus(sudah berelasi)');</script>";
		} else {
			if ($datasptpd != null){
				$sptpd = './uploads/pengawasan/hiburan/'.$datasptpd->sptpd;
				unlink($sptpd);
			}
			if ($datasspd != null){
				$sspd = './uploads/pengawasan/hiburan/'.$datasspd->sspd;
				unlink($sspd);
			}
		}		
		if($this->db->affected_rows() > 0){
			echo "<script>
				alert('Data berhasil dihapus');
			</script>";
		}
		echo "<script>window,location='".site_url('hiburan')."';</script>";
	}

	function surat($id){
		
		$data['row'] = $this->pws_hiburan_m->get($id)->row();
		$html = $this->load->view('pengawasan/hiburan/surat_hiburan', $data, TRUE);
		$this->fungsi->PdfGenerator($html,'pengawasan.hiburan-'.$data['row']->no_pws,'A4','portrait');
	}

	public function verif($id)
	{
		$this->pws_hiburan_m->verif($id);
		if($this->db->affected_rows() > 0){
			echo "<script>
				alert('Data berhasil diverifikasi');
			</script>";
			echo "<script>window,location='".site_url('pws_hiburan')."';</script>";
		}
	}
}