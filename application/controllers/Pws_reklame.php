<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pws_reklame extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        belum_login();
        cek_level();
		$this->load->model(['wp_m','pws_reklame_m']);
		$this->load->library('form_validation');
	}

	public function index()
	{
		$post=$this->input->post(null, TRUE);
		$awal = $this->input->post('tgl_awal');
		$akhir = $this->input->post('tgl_akhir');	
		if(isset($_POST['cetak'])){
			$data['row'] = $data['row'] = $this->pws_reklame_m->cetak($awal,$akhir);
			$data['awal'] = $awal;
			$data['akhir'] = $akhir;
			$html = $this->load->view('pengawasan/reklame/rekap_pws_reklame_semua', $data, TRUE);
			$this->fungsi->PdfGenerator($html,'Rekap Pengawasan Reklame','A4','landscape');
		}
		$data['row'] = $this->pws_reklame_m->get_izin();
		$data['page'] = 'berizin';
		$this->template->load('template','pengawasan/reklame/pws_reklame_data', $data);
	}

	public function tidak_izin()
	{
		$data['row'] = $this->pws_reklame_m->get_tdk_izin();
		$data['page'] = 'takizin';
		$this->template->load('template','pengawasan/reklame/pws_reklame_data', $data);
	}
	public function tidak_bayar()
	{
		$data['row'] = $this->pws_reklame_m->get_tdk_bayar();
		$data['page'] = 'takbayar';
		$this->template->load('template','pengawasan/reklame/pws_reklame_data', $data);
    }

    public function add()
	{
		// form validation
		$this->form_validation->set_rules('tgl_pws', 'Tanggal Pengawasan', 'required');
		$this->form_validation->set_rules('no_pws', 'Nomor Pengawasan', 'required|is_unique[pws_reklame.no_pws]', array('is_unique' => '%s sudah digunakan'));
		$this->form_validation->set_rules('nama_wp', 'Nama Wajib Pajak', 'required', array('required' => '%s tidak ditemukan'));
		$this->form_validation->set_rules('izin', 'Izin', 'required');
		$this->form_validation->set_rules('jenis', 'Jenis Reklame', 'required');
		$this->form_validation->set_rules('masa', 'Masa Berlaku Reklame', 'numeric', array('numeric'=> '%s hanya bisa diisi dengan angka'));
		$this->form_validation->set_rules('ukuran', 'Ukuran Reklame', 'required');
        $this->form_validation->set_rules('teks', 'Teks/Gambar Isi Reklame', 'required');
        $this->form_validation->set_rules('lokasi', 'Teks/Gambar Isi Reklame', 'required');
        $this->form_validation->set_rules('status_tempat', 'Status Pemasangan Reklame', 'required');
        $this->form_validation->set_rules('status_pasang', 'Teks/Gambar Isi Reklame', 'required');
		$this->form_validation->set_message('required', 'field %s masih kosong, silahkan isi');
		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');
		
		$post=$this->input->post(null, TRUE);
		$wp = $this->wp_m->get()->result();
		$nmr=$this->pws_reklame_m->no_awas();

		$data = array(
			'wp' 	 => $wp,
			'nmr'	 => $nmr
		);

        // if (isset($_GET['izin'])) {
        //     $this->Nama_Pegawai->EditValue = $this->Nama_Pegawai->CurrentValue;
        //     $this->masa->ReadOnly = TRUE;
        // }

		if ($this->form_validation->run() == FALSE)
		{
			$this->template->load('template','pengawasan/reklame/pws_reklame_add', $data);
		} else 
		{
			$this->pws_reklame_m->add($post);
			if($this->db->affected_rows() > 0){
				echo "<script>
					alert('Data berhasil disimpan');
				</script>";
				echo "<script>window,location='".site_url('pws_reklame')."';</script>";
			}
			
		}	
	}

	public function del($id)
	{
		$this->pws_reklame_m->del($id);
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success','Data Berhasil dihapus');
		}
		redirect('pws_reklame');
	}

	public function edit($id)
	{
		// form validation
		$this->form_validation->set_rules('tgl_pws', 'Tanggal Pengawasan', 'required');
		$this->form_validation->set_rules('nama_wp', 'Nama Wajib Pajak', 'required', array('required' => '%s tidak ditemukan'));
        $this->form_validation->set_rules('izin', 'Izin', 'required');
		$this->form_validation->set_rules('jenis', 'Jenis Reklame', 'required');
		$this->form_validation->set_rules('ukuran', 'Ukuran Reklame', 'required');
        $this->form_validation->set_rules('teks', 'Teks/Gambar Isi Reklame', 'required');
        $this->form_validation->set_rules('lokasi', 'Teks/Gambar Isi Reklame', 'required');
        $this->form_validation->set_rules('status_tempat', 'Status Pemasangan Reklame', 'required');
        $this->form_validation->set_rules('status_pasang', 'Teks/Gambar Isi Reklame', 'required');
		$this->form_validation->set_message('required', 'field %s masih kosong, silahkan isi');
		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		$post=$this->input->post(null, TRUE);
		$wp = $this->wp_m->get()->result();
		$query = $this->pws_reklame_m->get($id);
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
				$this->template->load('template','pengawasan/reklame/pws_reklame_edit', $data);
			} else {
				echo "<script> alert('Data tidak ditemukan');";
				echo "window,location='".site_url('pws_reklame')."';</script>";
			}
		} else 
		{
			$this->pws_reklame_m->edit($post);
			if($this->db->affected_rows() > 0){
				echo "<script>
					alert('Data berhasil diubah');
				</script>";
				echo "<script>window,location='".site_url('pws_reklame')."';</script>";
			} else {
				redirect('pws_reklame');
			}
			
		}	
	}

	function surat($id){
		
		$data['row'] = $this->pws_reklame_m->get($id)->row();
		$html = $this->load->view('pengawasan/reklame/surat_pws_reklame', $data, TRUE);
		$this->fungsi->PdfGenerator($html,'pengawasan.reklame-'.$data['row']->no_pws,'A4','portrait');
	}

	function cetak(){
		$data['hal'] = 'izin';
		$data['row'] = $this->pws_reklame_m->get_izin();
		$html = $this->load->view('pengawasan/reklame/rekap_pws_reklame', $data, TRUE);
		$this->fungsi->PdfGenerator($html,'Rekap Pengawasan Reklame','A4','landscape');
	}

	function cetak_t_izin(){
		$data['hal'] = 'tdk_izin';
		$data['row'] = $this->pws_reklame_m->get_tdk_izin();
		$html = $this->load->view('pengawasan/reklame/rekap_pws_reklame', $data, TRUE);
		$this->fungsi->PdfGenerator($html,'Rekap Pengawasan Reklame','A4','landscape');
	}

	function cetak_t_bayar(){
		$data['hal'] = 'tdk_bayar';
		$data['row'] = $this->pws_reklame_m->get_tdk_bayar();
		$html = $this->load->view('pengawasan/reklame/rekap_pws_reklame', $data, TRUE);
		$this->fungsi->PdfGenerator($html,'Rekap Pengawasan Reklame','A4','landscape');
	}
}