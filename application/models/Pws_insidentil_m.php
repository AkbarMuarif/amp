<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pws_insidentil_m extends CI_Model {

    public function get($id=null)
    {
        $this->db->select('pws_insidentil.*, wp.*');
        $this->db->from('pws_insidentil');
        $this->db->join('wp', 'pws_insidentil.npwpd = wp.npwpd', 'left');
        if($id != null){
            $this->db->where('no_pws', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'no_pws' => $post['no_pws'],
            'tgl_pws' => $post['tgl_pws'],
            'nama_p' => $post['nama_p'],
            'alamat_p' => $post['alamat_p'],
            'no_telp_p' => $post['no_telp_p'],
            'tempat' => $post['tempat'],
            'sah' => $post['sah'],
            'harga' => $post['harga'],
            'seri' => $post['seri'],
            'sobek' => $post['sobek'],
            'simpan' => $post['simpan'],
            'lapor' => $post['lapor'],
            'tgl_bayar' => $post['tgl_bayar'],
            'ket' => $post['ket']
        ];
        if($post['npwpd'] != null){
            $params['npwpd'] = $post['npwpd'];
        }
        $this->db->insert('pws_insidentil', $params);
    }

    public function del($id)
	{
		$this->db->where('no_pws', $id);
		$this->db->delete('pws_insidentil');
    }
    
    public function no_awas()
    {
        $sql = "SELECT MAX(MID(no_pws,11,4)) AS nomor_pws 
                FROM pws_insidentil
                WHERE MID(no_pws,5,6) = DATE_FORMAT(CURDATE(),'%y%m%d')";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0) {
            $row = $query->row();
            $n = ((int)$row->nomor_pws) + 1;
            $no = sprintf("%'.04d", $n);
        } else {
            $no = "0001";
        }
        $nmr = "idt-".date('ymd').$no;
        return $nmr;
    }

    public function cetak($awal,$akhir)
    {
        $this->db->select('pws_insidentil.*, wp.*');
        $this->db->from('pws_insidentil');
        $this->db->join('wp', 'pws_insidentil.npwpd = wp.npwpd', 'left');
        if($awal&&$akhir != null)
        {
            $this->db->where('tgl_pws BETWEEN "'. date('Y-m-d', strtotime($awal)). '" and "'. date('Y-m-d', strtotime($akhir)).'"');
        }
        $query = $this->db->get();
        return $query;
    }
}