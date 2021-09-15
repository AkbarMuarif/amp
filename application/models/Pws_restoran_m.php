<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pws_restoran_m extends CI_Model {

    public function get($id=null)
    {
        $this->db->select('pws_restoran.*, wp.*, tipe_wp.*');
        $this->db->from('pws_restoran');
        $this->db->join('wp', 'pws_restoran.npwpd = wp.npwpd');
        $this->db->join('tipe_wp', 'pws_restoran.tipe_id = tipe_wp.tipe_id');
        if($id != null){
            $this->db->where('no_pws', $id);
        }
        $this->db->order_by('tgl_pws','desc');
        $query = $this->db->get();
        return $query;
    }

    public function get_npwpd($id)
    {
        $this->db->select('pws_restoran.*, wp.*, tipe_wp.*');
        $this->db->from('pws_restoran');
        $this->db->join('wp', 'pws_restoran.npwpd = wp.npwpd');
        $this->db->join('tipe_wp', 'pws_restoran.tipe_id = tipe_wp.tipe_id');
        $this->db->where('pws_restoran.npwpd', $id);
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'no_pws' => $post['no_pws'],
            'tgl_pws' => $post['tgl_pws'],
            'npwpd' => $post['npwpd'],
            'tipe_id' => $post['tipe_id'],
            'izin' => $post['izin'],
            'tarif' => $post['tarif'],
            'sptpd' => $post['sptpd'],
            'rekap_terima' => $post['rekap_terima'],
            'rekap_bill' => $post['rekap_bill'],
            'sspd' => $post['sspd'],
            'bill' => $post['bill'],
            'cash' => $post['cash'],
            'edc' => $post['edc'],
            'emoney' => $post['emoney'],
            'ditempat' => $post['ditempat'],
            'pesan' => $post['pesan'],
            'catering' => $post['catering'],
            'tgl_bayar' => $post['tgl_bayar'],
            'ket' => $post['ket'],
            'jumlah' => 0,
            'verif' => 'Y'
        ];
        $this->db->insert('pws_restoran', $params);
    }

    public function add_dr_user($post)
    {
        $params = [
            'no_pws' => $post['no_pws'],
            'tgl_pws' => $post['tgl_pws'],
            'npwpd' => $post['npwpd'],
            'tipe_id' => $post['tipe_id'],
            'izin' => $post['izin'],
            'tarif' => $post['tarif'],
            'sptpd' => $post['sptpd'],
            'rekap_terima' => $post['rekap_terima'],
            'rekap_bill' => $post['rekap_bill'],
            'sspd' => $post['sspd'],
            'bill' => $post['bill'],
            'cash' => $post['cash'],
            'edc' => $post['edc'],
            'emoney' => $post['emoney'],
            'ditempat' => $post['ditempat'],
            'pesan' => $post['pesan'],
            'catering' => $post['catering'],
            'tgl_bayar' => $post['tgl_bayar'],
            'ket' => $post['ket'],
            'jumlah' => 0,
            'verif' => 'T'
        ];
        $this->db->insert('pws_restoran', $params);
    }

    public function edit($post)
    {
        $params = [
            'tgl_pws' => $post['tgl_pws'],
            'npwpd' => $post['npwpd'],
            'izin' => $post['izin'],
            'tarif' => $post['tarif'],
            'rekap_terima' => $post['rekap_terima'],
            'rekap_bill' => $post['rekap_bill'],
            'bill' => $post['bill'],
            'cash' => $post['cash'],
            'edc' => $post['edc'],
            'emoney' => $post['emoney'],
            'ditempat' => $post['ditempat'],
            'pesan' => $post['pesan'],
            'catering' => $post['catering'],
            'tgl_bayar' => $post['tgl_bayar'],
            'ket' => $post['ket'],
        ];
        if($post['sptpd'] != null){
            $params['sptpd'] = $post['sptpd'];
        }
        if($post['sspd'] != null){
            $params['sspd'] = $post['sspd'];
        }
        $this->db->where('no_pws', $post['no_pws']);
        $this->db->update('pws_restoran', $params);
    }

    public function verif($id)
    {
        $params = [
            'verif' => 'Y',
        ];
        $this->db->where('no_pws', $id);
        $this->db->update('pws_restoran', $params);
    }

    public function del($id)
	{
		$this->db->where('no_pws', $id);
		$this->db->delete('pws_restoran');
	}

    public function get_belum()
    {
        $array = array('jumlah =' => '0');
        $this->db->select('pws_restoran.*, wp.*, tipe_wp.*');
        $this->db->from('pws_restoran');
        $this->db->join('wp', 'pws_restoran.npwpd = wp.npwpd');
        $this->db->join('tipe_wp', 'pws_restoran.tipe_id = tipe_wp.tipe_id');
        $this->db->where($array);
        $this->db->order_by('tgl_pws', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function get_sudah()
    {
        $array = array('jumlah >' => '0');
        $this->db->select('pws_restoran.*, wp.*, tipe_wp.*');
        $this->db->from('pws_restoran');
        $this->db->join('wp', 'pws_restoran.npwpd = wp.npwpd');
        $this->db->join('tipe_wp', 'pws_restoran.tipe_id = tipe_wp.tipe_id');
        $this->db->where($array);
        $query = $this->db->get();
        return $query;
    }

    public function get_sudah_user($id)
    {
        $array = array('jumlah >' => '0', 'pws_restoran.npwpd =' => $id);
        $this->db->select('pws_restoran.*, wp.*, tipe_wp.*');
        $this->db->from('pws_restoran');
        $this->db->join('wp', 'pws_restoran.npwpd = wp.npwpd');
        $this->db->join('tipe_wp', 'pws_restoran.tipe_id = tipe_wp.tipe_id');
        $this->db->where($array);
        $query = $this->db->get();
        return $query;
    }

    public function up_jumlah($post)
    {
        $params = [
            'jumlah' => 6,
        ];
        $this->db->where('no_pws', $post['no_pws']);
        $this->db->update('pws_restoran', $params);
    }

    public function del_jumlah($id)
    {
        $params = [
            'jumlah' => 0,
        ];
        $this->db->where('no_pws', $id);
        $this->db->update('pws_restoran', $params);
    }

    public function no_awas()
    {
        $sql = "SELECT MAX(MID(no_pws,11,4)) AS nomor_pws 
                FROM pws_restoran
                WHERE MID(no_pws,5,6) = DATE_FORMAT(CURDATE(),'%y%m%d')";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0) {
            $row = $query->row();
            $n = ((int)$row->nomor_pws) + 1;
            $no = sprintf("%'.04d", $n);
        } else {
            $no = "0001";
        }
        $nmr = "rst-".date('ymd').$no;
        return $nmr;
    }

    public function cetak($awal,$akhir)
    {
        $this->db->select('pws_restoran.*, wp.*, tipe_wp.*');
        $this->db->from('pws_restoran');
        $this->db->join('wp', 'pws_restoran.npwpd = wp.npwpd');
        $this->db->join('tipe_wp', 'pws_restoran.tipe_id = tipe_wp.tipe_id');
        if($awal&&$akhir != null)
        {
            $this->db->where('tgl_pws BETWEEN "'. date('Y-m-d', strtotime($awal)). '" and "'. date('Y-m-d', strtotime($akhir)).'"');
        }
        $query = $this->db->get();
        return $query;
    }
}