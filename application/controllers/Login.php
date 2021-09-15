<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function masuk()
	{
        sudah_login();
		$this->load->view('login');
    }

    public function keluar()
    {
        $params = array('user_id','level','npwpd');
        $this->session->unset_userdata($params);
        redirect('login');
    }

    public function proses()
    {
        $post = $this->input->post(null, TRUE);
		if(isset($post['login'])){
			$this->load->model('user_m');
            $query = $this->user_m->login($post);
            //IF DATA FOUND
			if($query->num_rows()>0){
				$row = $query->row();
				$params = array(
					'user_id' => $row->user_id,
					'level' => $row->level,
					'npwpd' => $row->npwpd,
				);
				//CREATE SESSION

				$this->session->set_userdata($params);
				echo "<script>
					alert('Login Berhasil');
					window.location='".site_url('dashboard')."';
				</script>";
			} else{
				echo "<script>
					alert('Username/Password salah');
					window.location='".site_url('login')."';
				</script>";
			}
		}  
    }
    
}