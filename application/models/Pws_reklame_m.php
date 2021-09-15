<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pws_reklame_m extends CI_Model {

    public function get($id=null)
    {
        $this->db->select('pws_reklame.*, wp.*');
        $this->db->from('pws_reklame');
        $this->db->join('wp', 'pws_reklame.npwpd = wp.npwpd');
        if($id != null){
            $this->db->where('no_pws', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_izin()
    {
        $array = array('izin =' => 'ada', 'tgl_bayar !=' => '0000-00-00');
        $this->db->select('pws_reklame.*, wp.*');
        $this->db->from('pws_reklame');
        $this->db->join('wp', 'pws_reklame.npwpd = wp.npwpd');
        $this->db->where($array); 
        $query = $this->db->get();
        return $query;
    }

    public function get_tdk_bayar()
    {
        $array = array('izin =' => 'ada', 'tgl_bayar =' => '0000-00-00');
        $this->db->select('pws_reklame.*, wp.*');
        $this->db->from('pws_reklame');
        $this->db->join('wp', 'pws_reklame.npwpd = wp.npwpd');
        $this->db->where($array); 
        $query = $this->db->get();
        return $query;
    }

    public function get_tdk_izin($id=null)
    {
        $this->db->select('pws_reklame.*, wp.*');
        $this->db->from('pws_reklame');
        $this->db->join('wp', 'pws_reklame.npwpd = wp.npwpd');
        $this->db->where('izin', 'tidak ada');
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'no_pws' => $post['no_pws'],
            'tgl_pws' => $post['tgl_pws'],
            'npwpd' => $post['npwpd'],
            'izin' => $post['izin'],
            'masa' => $post['masa'],
            'tgl_bayar' => $post['tgl_bayar'],
            'jenis' => $post['jenis'],
            'ukuran' => $post['ukuran'],
            'teks' => $post['teks'],
            'lokasi' => $post['lokasi'],
            'status_tempat' => $post['status_tempat'],
            'status_pasang' => $post['status_pasang'],
        ];
        $this->db->insert('pws_reklame', $params);
    }

    public function edit($post)
    {
        $params = [
            'tgl_pws' => $post['tgl_pws'],
            'npwpd' => $post['npwpd'],
            'izin' => $post['izin'],
            'masa' => $post['masa'],
            'tgl_bayar' => $post['tgl_bayar'],
            'jenis' => $post['jenis'],
            'ukuran' => $post['ukuran'],
            'teks' => $post['teks'],
            'lokasi' => $post['lokasi'],
            'status_tempat' => $post['status_tempat'],
            'status_pasang' => $post['status_pasang'],
        ];
        $this->db->where('no_pws', $post['no_pws']);
        $this->db->update('pws_reklame', $params);
    }

    public function del($id)
	{
		$this->db->where('no_pws', $id);
		$this->db->delete('pws_reklame');
    }
    
    public function no_awas()
    {
        $sql = "SELECT MAX(MID(no_pws,11,4)) AS nomor_pws 
                FROM pws_reklame
                WHERE MID(no_pws,5,6) = DATE_FORMAT(CURDATE(),'%y%m%d')";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0) {
            $row = $query->row();
            $n = ((int)$row->nomor_pws) + 1;
            $no = sprintf("%'.04d", $n);
        } else {
            $no = "0001";
        }
        $nmr = "rkl-".date('ymd').$no;
        return $nmr;
    }


    public function cetak($awal,$akhir)
    {
        $this->db->select('pws_reklame.*, wp.*');
        $this->db->from('pws_reklame');
        $this->db->join('wp', 'pws_reklame.npwpd = wp.npwpd');
        if($awal&&$akhir != null)
        {
            $this->db->where('tgl_pws BETWEEN "'. date('Y-m-d', strtotime($awal)). '" and "'. date('Y-m-d', strtotime($akhir)).'"');
        }
        $query = $this->db->get();
        return $query;
    }

}