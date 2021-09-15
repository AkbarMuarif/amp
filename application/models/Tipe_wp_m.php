<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipe_wp_m extends CI_Model {

    public function get($id=null)
    {
        $this->db->from('tipe_wp');
        if($id != null){
            $this->db->where('tipe_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_ket($tipenya)
    {
        $this->db->select('*');
        $this->db->from('tipe_wp');
        $this->db->where('ket_tipe', $tipenya);
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'tipe_id' => $post['tipe_id'],
            'jenis_tipe' => $post['jenis_tipe'],
            'ket_tipe' => $post['ket_tipe'],
            'pajak' => $post['pajak'],
        ];
        $this->db->insert('tipe_wp', $params);
    }

    public function edit($post)
    {
        $params = [
            'jenis_tipe' => $post['jenis_tipe'],
            'ket_tipe' => $post['ket_tipe'],
            'pajak' => $post['pajak'],
        ];
        $this->db->where('tipe_id', $post['tipe_id']);
        $this->db->update('tipe_wp', $params);
    }

    public function del($id)
	{
		$this->db->where('tipe_id', $id);
		$this->db->delete('tipe_wp');
	}

}