<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pws_insidentil extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        belum_login();
        cek_level();
		$this->load->model(['wp_m','pws_insidentil_m','tipe_wp_m']);
		$this->load->library('form_validation');
	}

	public function index()
	{
		$post=$this->input->post(null, TRUE);
		$awal = $this->input->post('tgl_awal');
		$akhir = $this->input->post('tgl_akhir');	
		if(isset($_POST['cetak'])){
			$data['row'] = $this->pws_insidentil_m->cetak($awal,$akhir);
			$data['awal'] = $awal;
			$data['akhir'] = $akhir;
			$html = $this->load->view('pengawasan/insidentil/rekap_insidentil', $data, TRUE);
			$this->fungsi->PdfGenerator($html,'Rekap Pengawasan Insidentil','A4','landscape');
		}
		$data['row'] = $this->pws_insidentil_m->get();
		$this->template->load('template','pengawasan/insidentil/pws_insidentil_data', $data);
    }

	public function add()
	{
		// form validation
		$this->form_validation->set_rules('tgl_pws', 'Tanggal Pengawasan', 'required');
		$this->form_validation->set_rules('no_pws', 'Nomor Pengawasan', 'required|is_unique[pws_insidentil.no_pws]', array('is_unique' => '%s sudah digunakan'));
		$this->form_validation->set_rules('nama_p', 'Nama Penyelenggara', 'required');
        $this->form_validation->set_rules('alamat_p', 'Alamat Penyelenggara', 'required');
		$this->form_validation->set_rules('no_telp_p', 'Nomor Telepon Penyelenggara', 'required');
		$this->form_validation->set_rules('tempat', 'Tempat Penyelenggaraan Acara', 'required');
		$this->form_validation->set_rules('sah', 'sah', 'required', array('required' => 'Data belum diisi, Silahkan pilih'));
		$this->form_validation->set_rules('harga', 'harga', 'required', array('required' => 'Data belum diisi, Silahkan pilih'));
		$this->form_validation->set_rules('seri', 'seri', 'required', array('required' => 'Data belum diisi, Silahkan pilih'));
		$this->form_validation->set_rules('sobek', 'sobek', 'required', array('required' => 'Data belum diisi, Silahkan pilih'));
		$this->form_validation->set_rules('simpan', 'simpan', 'required', array('required' => 'Data belum diisi, Silahkan pilih'));
		$this->form_validation->set_rules('lapor', 'lapor', 'required', array('required' => 'Data belum diisi, Silahkan pilih'));
        $this->form_validation->set_rules('tgl_bayar', 'Tanggal Bayar', 'required');
		$this->form_validation->set_message('required', 'field %s masih kosong, silahkan isi');
		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');
		
		$post=$this->input->post(null, TRUE);
        $wp = $this->wp_m->get()->result();
		$nmr=$this->pws_insidentil_m->no_awas();

		$data = array(
			'wp' 	 => $wp,
			'nmr'    => $nmr
		);

        if (isset($_GET['izin'])) {
            // $this->Nama_Pegawai->EditValue = $this->Nama_Pegawai->CurrentValue;
            $this->masa->ReadOnly = TRUE;
        }

		if ($this->form_validation->run() == FALSE)
		{
			$this->template->load('template','pengawasan/insidentil/pws_insidentil_add', $data);
		} else 
		{
			$this->pws_insidentil_m->add($post);
			if($this->db->affected_rows() > 0){
				echo "<script>
					alert('Data berhasil disimpan');
				</script>";
				echo "<script>window,location='".site_url('pws_insidentil')."';</script>";
			}
			
		}	
	}

	public function edit($id)
	{
		// form validation
		$this->form_validation->set_rules('tgl_pws', 'Tanggal Pengawasan', 'required');
		$this->form_validation->set_rules('nama_p', 'Nama Penyelenggara', 'required');
        $this->form_validation->set_rules('alamat_p', 'Alamat Penyelenggara', 'required');
		$this->form_validation->set_rules('no_telp_p', 'Nomor Telepon Penyelenggara', 'required');
		$this->form_validation->set_rules('tempat', 'Tempat Penyelenggaraan Acara', 'required');
		$this->form_validation->set_rules('sah', 'sah', 'required', array('required' => 'Data belum diisi, Silahkan pilih'));
		$this->form_validation->set_rules('harga', 'harga', 'required', array('required' => 'Data belum diisi, Silahkan pilih'));
		$this->form_validation->set_rules('seri', 'seri', 'required', array('required' => 'Data belum diisi, Silahkan pilih'));
		$this->form_validation->set_rules('sobek', 'sobek', 'required', array('required' => 'Data belum diisi, Silahkan pilih'));
		$this->form_validation->set_rules('simpan', 'simpan', 'required', array('required' => 'Data belum diisi, Silahkan pilih'));
		$this->form_validation->set_rules('lapor', 'lapor', 'required', array('required' => 'Data belum diisi, Silahkan pilih'));
        $this->form_validation->set_rules('tgl_bayar', 'Tanggal Bayar', 'required');
		$this->form_validation->set_message('required', 'field %s masih kosong, silahkan isi');
		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		$post=$this->input->post(null, TRUE);
		$wp = $this->wp_m->get()->result();
		$query = $this->pws_insidentil_m->get($id);
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
				$this->template->load('template','pengawasan/insidentil/pws_insidentil_edit', $data);
			} else {
				echo "<script> alert('Data tidak ditemukan');";
				echo "window,location='".site_url('pws_insidentil')."';</script>";
			}
		} else 
		{
			$this->pws_insidentil_m->del($id);
			$this->pws_insidentil_m->add($post);
			if($this->db->affected_rows() > 0){
				echo "<script>
					alert('Data berhasil diubah');
				</script>";
				echo "<script>window,location='".site_url('pws_insidentil')."';</script>";
			} else {
				redirect('pws_insidentil');
			}
			
		}	
	}

	public function del($id)
	{
		$this->pws_insidentil_m->del($id);
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success','Data Berhasil dihapus');
		}
		redirect('pws_insidentil');
	}
	
	function surat($id){
		
		$data['row'] = $this->pws_insidentil_m->get($id)->row();
		$html = $this->load->view('pengawasan/insidentil/surat_insidentil', $data, TRUE);
		$this->fungsi->PdfGenerator($html,'pengawasan.insidentil-'.$data['row']->no_pws,'A4','portrait');
	}

}