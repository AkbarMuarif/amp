<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wp extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        belum_login();
        cek_level();
		$this->load->model(['wp_m','tipe_wp_m','user_m']);
		$this->load->library('form_validation');
	}

	public function index()
	{
		$post=$this->input->post(null, TRUE);
		$tipenya = $this->input->post('tipenya');
		if(isset($_POST['cetak'])){
			$data['row'] = $this->wp_m->get_modal($tipenya);
			$data['tipenya'] = $tipenya;
			$html = $this->load->view('wp/wp_rekap', $data, TRUE);
			$this->fungsi->PdfGenerator($html,'Data-Data Wajib Pajak','A4','landscape');
		}
		$data['row'] = $this->wp_m->get();
		$this->template->load('template','wp/wp_data', $data);

	}

	public function add()
	{
		$this->form_validation->set_rules('npwpd', 'NPWPD', 'required|max_length[20]|is_unique[wp.npwpd]', array('max_length' => '{field} maksimal 20 karakter'));
		$this->form_validation->set_rules('nama_wp', 'Nama Wajib Pajak', 'required');
		$this->form_validation->set_rules('nama_kelola', 'Nama Pengelola', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat Wajib Pajak', 'required');
		$this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|numeric');
		$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric|min_length[5]|is_unique[user.username]', array('min_length' => '{field} minimal 5 karakter'));

		$this->form_validation->set_message('required', 'field %s masih kosong, silahkan isi');
		$this->form_validation->set_message('alpha_numeric', '%s hanya bisa diisi dengan huruf dan angka');
		$this->form_validation->set_message('numeric', '%s hanya bisa diisi dengan angka');
		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		$post=$this->input->post(null, TRUE);
		$query_tipe = $this->tipe_wp_m->get();
		$tipe[null] = '- Pilih -';
		foreach($query_tipe->result() as $tip) {
			$tipe[$tip->tipe_id] = ucwords($tip->jenis_tipe);
		}
		$data = array (
			'tipe' =>$tipe, 
			'selectedunit' => null
		);

		if ($this->form_validation->run() == FALSE)
		{
			$this->template->load('template','wp/wp_form_add', $data);
		} else 
		{
			$this->wp_m->add($post);
			$this->user_m->create_wp($post);
			if($this->db->affected_rows() > 0){
				echo "<script>
					alert('Data berhasil disimpan');
				</script>";
				echo "<script>window,location='".site_url('wp')."';</script>";
			} else {
				redirect('wp');
			}
		}	
    }
    
	public function edit($id)
	{
		$this->form_validation->set_rules('nama_wp', 'Nama Wajib Pajak', 'required');
		$this->form_validation->set_rules('nama_kelola', 'Nama Pengelola', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat Wajib Pajak', 'required');
		$this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|numeric');
		$this->form_validation->set_message('numeric', '%s hanya bisa diisi dengan angka');
		$this->form_validation->set_message('required', 'field %s masih kosong, silahkan isi');
		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		$post=$this->input->post(null, TRUE);
		$query = $this->wp_m->get($id);
		$query_tipe = $this->tipe_wp_m->get();
		$tipe[null] = '- Pilih -';
		foreach($query_tipe->result() as $tip) {
			$tipe[$tip->tipe_id] = ucwords($tip->jenis_tipe);
		}

		if ($this->form_validation->run() == FALSE)
		{
			if($query->num_rows() > 0){
				$wp = $query->row();
				$data = array (
					'row' => $wp,
					'tipe' =>$tipe, 
					'selectedunit' => $wp->tipe_id
				);
				$this->template->load('template','wp/wp_form_edit', $data);
			}else{
				echo "<script> alert('Data tidak ditemukan');";
				echo "window,location='".site_url('wp')."';</script>";
			}
		} else
		{
			$this->wp_m->edit($post);
			$this->user_m->edit_wp($post);
			if($this->db->affected_rows() > 0){
				echo "<script>
					alert('Data berhasil disimpan');
				</script>";
				echo "<script>window,location='".site_url('wp')."';</script>";
			} else {
				redirect('wp');
			}
		}
	}

	public function del($id)
	{
		$this->user_m->del_wp($id);
		$this->wp_m->del($id);
		if($this->db->affected_rows() > 0){
			echo "<script>
				alert('Data berhasil dihapus');
			</script>";
			echo "<script>window,location='".site_url('wp')."';</script>";
		}
	}

}
