<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        belum_login();
        cek_level();
        $this->load->model(['wp_m','user_m']);
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user'] = $this->user_m->get();
        $this->template->load('template','user/user_form', $data);     
    }

    public function create()
    {
        $this->form_validation->set_rules('fullname', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric|min_length[5]|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]',
			array('matches' => '%s tidak sesuai dengan password')
        );
		$this->form_validation->set_rules('level', 'Level', 'required');

		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
        $this->form_validation->set_message('is_unique', '{field} sudah digunakan');
        $this->form_validation->set_message('alpha_numeric', '%s hanya bisa huruf dan angka');

		$this->form_validation->set_error_delimiters('<span class="danger-block">','</span>');

		$post=$this->input->post(null, TRUE);
		$wp = $this->wp_m->get_modalwp()->result();

		$data = array(
			'wp' 	 => $wp
		);
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->template->load('template','user/user_add', $data);
		} else 
		{
			if ($post['npwpd'] != null){
				$this->user_m->add($post);
				$this->wp_m->edit_wp($post);
				if($this->db->affected_rows() > 0){
					echo "<script>
						alert('Data berhasil disimpan');
					</script>";
					echo "<script>window,location='".site_url('user')."';</script>";
				}
			} else {		
				$this->user_m->add($post);
				if($this->db->affected_rows() > 0){
					echo "<script>
						alert('Data berhasil disimpan');
					</script>";
					echo "<script>window,location='".site_url('user')."';</script>";
				}
			}
		}
    }

    public function del()
    {
        $id = $this->input->post('user_id');
		$this->user_m->del($id);

		if($this->db->affected_rows() > 0){
			echo "<script>
				alert('Data berhasil dihapus');
			</script>";
			echo "<script>window,location='".site_url('user')."';</script>";
        }
	}
	
	public function delwp()
    {
        $id = $this->input->post('user_id');
		$this->user_m->del($id);
		$npwpd = $this->input->post('npwpd');
		$this->wp_m->deluser($npwpd);

		if($this->db->affected_rows() > 0){
			echo "<script>
				alert('Data berhasil dihapus');
			</script>";
			echo "<script>window,location='".site_url('user')."';</script>";
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('fullname', 'Nama', 'required');
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

		$this->form_validation->set_rules('level', 'Level', 'required');

		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
        $this->form_validation->set_message('is_unique', '{field} sudah digunakan');
        $this->form_validation->set_message('alpha_numeric', '%s hanya bisa huruf dan angka');

		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		if ($this->form_validation->run() == FALSE)
		{
			$query = $this->user_m->get($id);
			if($query->num_rows()>0){
				$data['row'] = $query->row();
				$this->template->load('template','user/user_edit', $data);
			} else {
				echo "<script> alert('Data tidak ditemukan');";
				echo "window,location='".site_url('user')."';</script>";
			}
		} else {
			$post=$this->input->post(null, TRUE);
			$this->user_m->edit($post);
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