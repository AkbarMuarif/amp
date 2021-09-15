<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    function __construct()
	{
        parent::__construct();
        belum_login();
		$this->load->model(['wp_m','tipe_wp_m','user_m']);
		$this->load->library('form_validation');
	}

    public function index()
	{
        $dt=$this->fungsi->cek_user_wp();
        $log=$this->fungsi->user_login();
        $query=$this->user_m->get($log->user_id);
        
        $data = array(
            'log' => $log,
            'dt' => $dt,
		);

        $this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric|min_length[5]|callback_username_check');
		
		if($this->input->post('password')){
            $this->form_validation->set_rules('password', 'Password', 'min_length[5]');
            $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'matches[password]',
            array('matches' => '%s tidak sesuai dengan password')
        );
		}
		if($this->input->post('passconf')){
			$this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'matches[password]',
				array('matches' => '%s tidak sesuai dengan password')
			);
        }

		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
        $this->form_validation->set_message('alpha_numeric', '%s hanya bisa huruf dan angka');

        $this->form_validation->set_error_delimiters('<span class="help-block">','</span>');
        
        if ($this->form_validation->run() == FALSE)
		{
			if($query->num_rows()>0){
				$data['row'] = $query->row();
				$this->template->load('template','profile', $data);
			} else {
				echo "<script> alert('Data tidak ditemukan');";
				echo "window,location='".site_url('user')."';</script>";
			}
		} else {
			$post=$this->input->post(null, TRUE);
            $this->user_m->edit_user($post);
            $this->wp_m->edit_wp($post);
			if($this->db->affected_rows() > 0){
				echo "<script>
					alert('Data berhasil disimpan');
				</script>";
				echo "<script>window,location='".site_url('user')."';</script>";
			}
		}
    }

    function username_check(){
		$post=$this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND user_id != '$post[user_id]'");
		if ($query->num_rows()>0){
			$this->form_validation->set_message('username_check', '%s ini sudah digunakan');
			return FALSE;
		} else {
			return TRUE;
		}
	}

}