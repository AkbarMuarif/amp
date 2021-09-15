<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pws_restoran extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        belum_login();
        cek_level();
		$this->load->model(['wp_m','pws_restoran_m','tipe_wp_m']);
		$this->load->library('form_validation');
	}

	public function index()
	{
		$post=$this->input->post(null, TRUE);
		$awal = $this->input->post('tgl_awal');
		$akhir = $this->input->post('tgl_akhir');	
		if(isset($_POST['cetak'])){
			$data['row'] = $this->pws_restoran_m->cetak($awal,$akhir);
			$data['awal'] = $awal;
			$data['akhir'] = $akhir;
			$html = $this->load->view('pengawasan/restoran/rekap_restoran', $data, TRUE);
			$this->fungsi->PdfGenerator($html,'Rekap Pengawasan restoran','A4','landscape');
		}
		$data['row'] = $this->pws_restoran_m->get();
		$this->template->load('template','pengawasan/restoran/pws_restoran_data', $data);
    }
	
	public function add()
	{
		// form validation
		$this->form_validation->set_rules('tgl_pws', 'Tanggal Pengawasan', 'required');
		$this->form_validation->set_rules('no_pws', 'Nomor Pengawasan', 'required|is_unique[pws_restoran.no_pws]', array('is_unique' => '%s sudah digunakan'));
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
		$this->form_validation->set_rules('ditempat', 'Makan Ditempat', 'required');
		$this->form_validation->set_rules('pesan', 'Pesan Antar Makanan', 'required');
		$this->form_validation->set_rules('catering', 'Catering', 'required');
		$this->form_validation->set_rules('ket', 'Keterangan', 'max_length[200]', array('max_length' => '%s tidak bisa memuat lebih dari 200 karakter'));
		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');
		// config image
		$config['upload_path']   = './uploads/pengawasan/restoran/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']      = 2048;
		$config['file_name']     = 'pws-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);
		
		$post=$this->input->post(null, TRUE);
		$tipe = $this->tipe_wp_m->get_ket('restoran')->row();
		$wp = $this->wp_m->get_modal('restoran')->result();
		$nmr=$this->pws_restoran_m->no_awas();

		$data = array(
			'tipeid' => $tipe,
			'wp' 	 => $wp,
			'nmr'	 => $nmr
		);
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->template->load('template','pengawasan/restoran/pws_restoran_add', $data);
		} else 
		{
			if(!empty($_FILES['sptpd']['name'])){
				if ($this->upload->do_upload('sptpd')){
					$post['sptpd'] = $this->upload->data('file_name');
				} else {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('error', $error);
					redirect('pws_restoran/add');
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
					redirect('pws_restoran/add');
				}
			} else {
				$post['sspd'] = null;
				if($this->db->affected_rows() > 0){
					$this->session->set_flashdata('alert','File sspd gagal diupload');
				}
			}
			$this->pws_restoran_m->add($post);
			if($this->db->affected_rows() > 0){
				echo "<script>
					alert('Data berhasil disimpan');
				</script>";
				echo "<script>window,location='".site_url('pws_restoran')."';</script>";
			} else
			{
				echo "<script>
					alert('Data gagal disimpan');
				</script>";
				echo "<script>window,location='".site_url('pws_restoran')."';</script>";
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
		$this->form_validation->set_rules('ditempat', 'Makan Ditempat', 'required');
		$this->form_validation->set_rules('pesan', 'Pesan Antar Makanan', 'required');
		$this->form_validation->set_rules('catering', 'Catering', 'required');
		$this->form_validation->set_rules('ket', 'Keterangan', 'max_length[200]', array('max_length' => '%s tidak bisa memuat lebih dari 200 karakter'));
		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');
		// config image
		$config['upload_path']   = './uploads/pengawasan/restoran/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']      = 2048;
		$config['file_name']     = 'pws-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

		$post=$this->input->post(null, TRUE);
		$tipe = $this->tipe_wp_m->get_ket('restoran')->row();
		$wp = $this->wp_m->get_modal('restoran')->result();
		$query = $this->pws_restoran_m->get($id);
		$nomor = $query->row()->npwpd;
		$cariwp = $this->wp_m->get($nomor)->row();

		$data = array(
			'tipeid' => $tipe,
			'wp' 	 => $wp,
			'cariwp' => $cariwp
		);

		if ($this->form_validation->run() == FALSE)
		{
			if($query->num_rows()>0){
				$data['row'] = $query->row();
				$this->template->load('template','pengawasan/restoran/pws_restoran_edit', $data);
			} else {
				echo "<script> alert('Data tidak ditemukan');";
				echo "window,location='".site_url('pws_restoran')."';</script>";
			}
		} else 
		{
			if(!empty($_FILES['sptpd']['name'])){
				if ($this->upload->do_upload('sptpd')){
					$restoran = $this->pws_restoran_m->get($post['no_pws'])->row();
					if ($restoran->sptpd != null){
						$target_file = './uploads/pengawasan/restoran/'.$restoran->sptpd ;
						unlink($target_file);
					}
					$post['sptpd'] = $this->upload->data('file_name');
				} else {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('error', $error);
					redirect('pws_restoran/edit');
				}
			} else {
				$post['sptpd'] = null;
			}	
			if(!empty($_FILES['sspd']['name'])){
				if ($this->upload->do_upload('sspd')){
					$restoran = $this->pws_restoran_m->get($post['no_pws'])->row();
						if ($restoran->sspd != null){
							$target_file = './uploads/pengawasan/restoran/'.$restoran->sspd ;
							unlink($target_file);
						}
						$post['sspd'] = $this->upload->data('file_name');
				} else {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('error', $error);
					redirect('pws_restoran/edit');
				}
			} else {
				$post['sspd'] = null;
			}
			$this->pws_restoran_m->edit($post);
			if($this->db->affected_rows() > 0){
				echo "<script>
					alert('Data berhasil diubah');
				</script>";
				echo "<script>window,location='".site_url('pws_restoran')."';</script>";
			} else {
				redirect('pws_restoran');
			}
			
		}	
	}

	public function del($id)
	{
		$restoran = $this->pws_restoran_m->get($id)->row();
		$datasptpd = $restoran->sptpd;
		$datasspd = $restoran->sspd;
		$this->pws_restoran_m->del($id);
		$error = $this->db->error();
		
		if($error['code'] != 0){
			echo "<script>alert('Data tidak dapat dihapus(sudah berelasi)');</script>";
		} else {
			if ($datasptpd != null){
				$sptpd = './uploads/pengawasan/restoran/'.$datasptpd;
				unlink($sptpd);
			}
			if ($datasspd != null){
				$sspd = './uploads/pengawasan/restoran/'.$datasspd;
				unlink($sspd);
			}
		}		
		if($this->db->affected_rows() > 0){
			echo "<script>
				alert('Data berhasil dihapus');
			</script>";
		}
		echo "<script>window,location='".site_url('pws_restoran')."';</script>";
	}

	function surat($id){
		
		$data['row'] = $this->pws_restoran_m->get($id)->row();
		$html = $this->load->view('pengawasan/restoran/surat_restoran', $data, TRUE);
		$this->fungsi->PdfGenerator($html,'pengawasan.restoran-'.$data['row']->no_pws,'A4','portrait');
	}

	public function verif($id)
	{
		$this->pws_restoran_m->verif($id);
		if($this->db->affected_rows() > 0){
			echo "<script>
				alert('Data berhasil diverifikasi');
			</script>";
			echo "<script>window,location='".site_url('pws_restoran')."';</script>";
		}
	}

}