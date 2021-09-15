<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wp_data extends CI_Controller {

    function __construct()
	{
        parent::__construct();
        belum_login();
		$this->load->model(['pws_hotel_m','pws_hiburan_m','pws_restoran_m','prs_hotel_m','prs_hiburan_m','prs_restoran_m']);
		$this->load->library('form_validation');
    }
    
    public function pengawasan()
	{
        $dt = $this->fungsi->cek_user_wp();
        $tpe = $this->fungsi->cek_user_wp()->ket_tipe;
        $npwpd = $this->fungsi->cek_user_wp()->npwpd;

        if ($tpe == 'hotel'){
            $loc = 'uploads/pengawasan/hotel/';
        } else if ($tpe == 'hiburan'){
            $loc = 'uploads/pengawasan/hiburan/';
        } else if ($tpe == 'restoran'){
            $loc = 'uploads/pengawasan/restoran/';
        }

        $data = array(
            'dt' => $dt,
            'loc'=> $loc,
		);

        if ($tpe == 'hotel'){
            $data['row'] = $this->pws_hotel_m->get_npwpd($npwpd);
            $this->template->load('template','client/data/pengawasan', $data);
        } else if ($tpe == 'hiburan'){
            $data['row'] = $this->pws_hiburan_m->get_npwpd($npwpd);
            $this->template->load('template','client/data/pengawasan', $data);
        } else if ($tpe == 'restoran'){
            $data['row'] = $this->pws_restoran_m->get_npwpd($npwpd);
            $this->template->load('template','client/data/pengawasan', $data);
        }
    }

    public function pemeriksaan()
	{
        $dt = $this->fungsi->cek_user_wp();
        $tpe = $this->fungsi->cek_user_wp()->ket_tipe;
        $npwpd = $this->fungsi->cek_user_wp()->npwpd;

        $data = array(
            'dt' => $dt,
		);

        if ($tpe == 'hotel'){
            $data['row'] = $this->pws_hotel_m->get_sudah_user($npwpd);
            $this->template->load('template','client/data/pemeriksaan', $data);
        } else if ($tpe == 'hiburan'){
            $data['row'] = $this->pws_hiburan_m->get_sudah_user($npwpd);
            $this->template->load('template','client/data/pemeriksaan', $data);
        } else if ($tpe == 'restoran'){
            $data['row'] = $this->pws_restoran_m->get_sudah_user($npwpd);
            $this->template->load('template','client/data/pemeriksaan', $data);
        }
    }

    public function data_pemeriksaan($id)
	{
        $dt = $this->fungsi->cek_user_wp();
        $tpe = $this->fungsi->cek_user_wp()->ket_tipe;
        
        if ($tpe == 'hotel'){
            $prs = $this->prs_hotel_m->get($id)->result();
        } else if ($tpe == 'hiburan'){
            $prs = $this->prs_hiburan_m->get($id)->result();
        } else if ($tpe == 'restoran'){
            $prs = $this->prs_restoran_m->get($id)->result();
        }

        $data = array(
            'dt' => $dt,
            'prs' 	 => $prs,
        );
        
		$this->template->load('template','client/data/data_pemeriksaan', $data);
    }
}