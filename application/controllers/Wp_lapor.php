<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wp_lapor extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        belum_login();
		$this->load->model(['wp_m','tipe_wp_m','user_m','pws_hotel_m','pws_restoran_m','pws_hiburan_m']);
		$this->load->library('form_validation');
	}

	public function index()
	{
        // $data['row'] = $this->wp_m->get();
        $this->form_validation->set_rules('tgl_bayar', 'Tanggal Bayar', 'required');
        $this->form_validation->set_rules('izin', 'Izin', 'required');
        $this->form_validation->set_rules('tarif', 'Tarif Pajak', 'required');
        $this->form_validation->set_rules('bill', 'Bill/Bon Penjualan', 'required');
        $this->form_validation->set_rules('rekap_terima', 'Rekap Penerimaan Bulanan', 'required');
        $this->form_validation->set_rules('rekap_bill', 'Rekap Penggunaan Bill', 'required');
        $this->form_validation->set_rules('ket', 'Keterangan', 'max_length[200]', array('max_length' => '%s tidak bisa memuat lebih dari 200 karakter'));
        $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
        $this->form_validation->set_message('numeric', '%s hanya bisa diisi dengan angka');
        $this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

        $tpe = $this->fungsi->cek_user_wp()->ket_tipe;
        $dt = $this->fungsi->cek_user_wp();

        $this->form_validation->set_rules('cash', 'Uang Kontan (Cash)', 'required');
		$this->form_validation->set_rules('edc', 'Kartu Debit/Kredit', 'required');
        $this->form_validation->set_rules('emoney', 'E-Money', 'required');
        if ($tpe == 'hotel'){
        $this->form_validation->set_rules('ota', 'Online Travel Agent', 'required');
        }
        if ($tpe == 'restoran'){
		$this->form_validation->set_rules('ditempat', 'Makan Ditempat', 'required');
		$this->form_validation->set_rules('pesan', 'Pesan Antar Makanan', 'required');
        $this->form_validation->set_rules('catering', 'Catering', 'required');
        }
        
        // config image
        if ($tpe == 'hotel'){
            $config['upload_path']   = './uploads/pengawasan/hotel/';
        } else if ($tpe == 'hiburan'){
            $config['upload_path']   = './uploads/pengawasan/hiburan/';
        } else if ($tpe == 'restoran'){
            $config['upload_path']   = './uploads/pengawasan/restoran/';
        }
        $config['allowed_types'] = 'pdf';
        $config['max_size']      = 2048;
        $config['file_name']     = 'pws-'.date('ymd').'-'.substr(md5(rand()),0,10);
        $this->load->library('upload', $config);
        
        $post=$this->input->post(null, TRUE);

        if ($tpe == 'hotel'){
            $nmr=$this->pws_hotel_m->no_awas();
        } else if ($tpe == 'hiburan'){
            $nmr=$this->pws_hiburan_m->no_awas();
        } else if ($tpe == 'restoran'){
            $nmr=$this->pws_restoran_m->no_awas();
        }

		$data = array(
            'dt' => $dt,
            'nmr' => $nmr,
		);

        if ($this->form_validation->run() == FALSE)
        {
            $this->template->load('template','client/pengawasan/pws_add', $data);
        } else 
        {
            if(!empty($_FILES['sptpd']['name'])){
                if ($this->upload->do_upload('sptpd')){
                    $post['sptpd'] = $this->upload->data('file_name');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('pws_hotel/add');
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
                    redirect('pws_hotel/add');
                }
            } else {
                $post['sspd'] = null;
                if($this->db->affected_rows() > 0){
                    $this->session->set_flashdata('alert','File sspd gagal diupload');
                }
            }
            //input data dengan cek wp
            if ($tpe == 'hotel'){
                $this->pws_hotel_m->add_dr_user($post);
            } else if ($tpe == 'hiburan'){
                $this->pws_hiburan_m->add_dr_user($post);
            } else if ($tpe == 'restoran'){
                $this->pws_restoran_m->add_dr_user($post);
            }

            if($this->db->affected_rows() > 0){
                echo "<script>
                    alert('Data berhasil disimpan');
                </script>";
                echo "<script>window,location='".site_url('dashboard')."';</script>";
            } else
            {
                echo "<script>
                    alert('Data gagal disimpan');
                </script>";
                echo "<script>window,location='".site_url('dashboard')."';</script>";
            }
            
        }	
    }

	public function edit($id)
	{
		// form validation
		$this->form_validation->set_rules('tgl_bayar', 'Tanggal Bayar', 'required');
		$this->form_validation->set_rules('izin', 'Izin', 'required');
		$this->form_validation->set_rules('tarif', 'Tarif Pajak', 'required');
		$this->form_validation->set_rules('bill', 'Bill/Bon Penjualan', 'required');
		$this->form_validation->set_rules('rekap_terima', 'Rekap Penerimaan Bulanan', 'required');
		$this->form_validation->set_rules('rekap_bill', 'Rekap Penggunaan Bill', 'required');
		$this->form_validation->set_rules('ket', 'Keterangan', 'max_length[200]', array('max_length' => '%s tidak bisa memuat lebih dari 200 karakter'));
		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');
        
        $tpe = $this->fungsi->cek_user_wp()->ket_tipe;
        // config image
		if ($tpe == 'hotel'){
            $config['upload_path']   = './uploads/pengawasan/hotel/';
        } else if ($tpe == 'hiburan'){
            $config['upload_path']   = './uploads/pengawasan/hiburan/';
        } else if ($tpe == 'restoran'){
            $config['upload_path']   = './uploads/pengawasan/restoran/';
        }
		$config['allowed_types'] = 'pdf';
		$config['max_size']      = 2048;
		$config['file_name']     = 'pws-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

		$post=$this->input->post(null, TRUE);
        $dt = $this->fungsi->cek_user_wp();

        if ($tpe == 'hotel'){
            $query = $this->pws_hotel_m->get($id);
            $tempat = './uploads/pengawasan/hotel/';
        } else if ($tpe == 'hiburan'){
            $query = $this->pws_hiburan_m->get($id);
            $tempat = './uploads/pengawasan/hiburan/';
        } else if ($tpe == 'restoran'){
            $query = $this->pws_restoran_m->get($id);
            $tempat = './uploads/pengawasan/restoran/';
        }

		$data = array(
			'dt' => $dt
		);

		if ($this->form_validation->run() == FALSE)
		{
			if($query->num_rows()>0){
				$data['row'] = $query->row();
				$this->template->load('template','client/pengawasan/pws_edit', $data);
			} else {
				echo "<script> alert('Data tidak ditemukan');";
				echo "window,location='".site_url('wp_data/pengawasan')."';</script>";
			}
		} else 
		{
            if ($tpe == 'hotel'){
                $inputan = $this->pws_hotel_m->get($post['no_pws'])->row();
            } else if ($tpe == 'hiburan'){
                $inputan = $this->pws_hiburan_m->get($post['no_pws'])->row();
            } else if ($tpe == 'restoran'){
                $inputan = $this->pws_restoran_m->get($post['no_pws'])->row();
            }
			if(!empty($_FILES['sptpd']['name'])){
				if ($this->upload->do_upload('sptpd')){
                    $target_file = $tempat.$inputan->sptpd ;
					if ($inputan->sptpd != null){
						unlink($target_file);
					}
					$post['sptpd'] = $this->upload->data('file_name');
				} else {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('error', $error);
					redirect('wp_lapor/edit');
				}
			} else {
				$post['sptpd'] = null;
			}	
			if(!empty($_FILES['sspd']['name'])){
				if ($this->upload->do_upload('sspd')){
                    $target_file = $tempat.$inputan->sspd ;
                    if ($inputan->sspd != null){
                        unlink($target_file);
                    }
                    $post['sspd'] = $this->upload->data('file_name');
				} else {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('error', $error);
					redirect('wp_lapor/edit');
				}
			} else {
				$post['sspd'] = null;
            }
            if ($tpe == 'hotel'){
                $this->pws_hotel_m->edit($post);
            } else if ($tpe == 'hiburan'){
                $this->pws_hiburan_m->edit($post);
            } else if ($tpe == 'restoran'){
                $this->pws_restoran_m->edit($post);
            }
			if($this->db->affected_rows() > 0){
				echo "<script>
					alert('Data berhasil diubah');
				</script>";
				echo "<script>window,location='".site_url('wp_data/pengawasan')."';</script>";
			} else {
				redirect('wp_data/pengawasan');
			}
			
		}	
	}
    
    public function del($id)
	{
        $tpe = $this->fungsi->cek_user_wp()->ket_tipe;

        if ($tpe == 'hotel'){
            $hps = $this->pws_hotel_m->get($id)->row();
            $datasptpd = $hps->sptpd;
            $sptpd = './uploads/pengawasan/hotel/'.$datasptpd;
            $datasspd = $hps->sspd;
            $sspd = './uploads/pengawasan/hotel/'.$datasspd;
            $this->pws_hotel_m->del($id);
        } else if ($tpe == 'hiburan'){
            $hps = $this->pws_hiburan_m->get($id)->row();
            $datasptpd = $hps->sptpd;
            $sptpd = './uploads/pengawasan/hiburan/'.$datasptpd;
            $datasspd = $hps->sspd;
            $sspd = './uploads/pengawasan/hiburan/'.$datasspd;
            $this->pws_hiburan_m->del($id);
        } else if ($tpe == 'restoran'){
            $hps = $this->pws_restoran_m->get($id)->row();
            $datasptpd = $hps->sptpd;
            $sptpd = './uploads/pengawasan/restoran/'.$datasptpd;
            $datasspd = $hps->sspd;
            $sspd = './uploads/pengawasan/restoran/'.$datasspd;
            $this->pws_restoran_m->del($id);
        }
		$error = $this->db->error();

		if($error['code'] != 0){
			echo "<script>alert('Data tidak dapat dihapus(sudah berelasi)');</script>";
		} else {
			if ($datasptpd != null){
				unlink($sptpd);
			}
			if ($datasspd != null){	
				unlink($sspd);
			}
        }		
        
		if($this->db->affected_rows() > 0){
			echo "<script>
				alert('Data berhasil dihapus');
			</script>";
		}
		echo "<script>window,location='".site_url('wp_data/pengawasan')."';</script>";
	}
}