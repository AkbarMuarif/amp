<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wp_m extends CI_Model {

    public function get($id=null)
    {
        $this->db->select('wp.*, tipe_wp.*');
        $this->db->from('wp');
        $this->db->join('tipe_wp', 'wp.tipe_id = tipe_wp.tipe_id');
        if($id != null){
            $this->db->where('npwpd', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_modal($tipenya)
    {
        $this->db->select('wp.*, tipe_wp.*');
        $this->db->from('wp');
        $this->db->join('tipe_wp', 'wp.tipe_id = tipe_wp.tipe_id');
        if($tipenya != null){
            $this->db->where('tipe_wp.ket_tipe', $tipenya);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_modalwp()
    {
        $this->db->select('wp.*');
        $this->db->from('wp');
        $this->db->where('wp.username', null);
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'npwpd' => $post['npwpd'],
            'nama_wp' => $post['nama_wp'],
            'tipe_id' => $post['tipe'],
            'nama_kelola' => $post['nama_kelola'],
            'alamat' => $post['alamat'],
            'no_telp' => $post['no_telp'],
            'username' => $post['username'],
        ];
        $this->db->insert('wp', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama_wp' => $post['nama_wp'],
            'tipe_id' => $post['tipe'],
            'nama_kelola' => $post['nama_kelola'],
            'alamat' => $post['alamat'],
            'no_telp' => $post['no_telp'],
        ];
        $this->db->where('npwpd', $post['npwpd']);
        $this->db->update('wp', $params);
    }

    public function del($id)
	{
		$this->db->where('npwpd', $id);
		$this->db->delete('wp');
	}

    public function deluser($npwpd)
    {
        $params = [
            'username' => null
        ];
        $this->db->where('npwpd', $npwpd);
        $this->db->update('wp', $params);
    }

    public function edit_wp($post)
    {
        $params = [
            'username' => $post['username']
        ];
        $this->db->where('npwpd', $post['npwpd']);
        $this->db->update('wp', $params);
    }

    public function data_hotel()
    {
        $this->db->select('wp.*, tipe_wp.*');
        $this->db->from('wp');
        $this->db->join('tipe_wp', 'wp.tipe_id = tipe_wp.tipe_id');
        $this->db->where('tipe_wp.ket_tipe', 'hotel');
        $query = $this->db->get();
        return $query;
    }

    public function data_restoran()
    {
        $this->db->select('wp.*, tipe_wp.*');
        $this->db->from('wp');
        $this->db->join('tipe_wp', 'wp.tipe_id = tipe_wp.tipe_id');
        $this->db->where('tipe_wp.ket_tipe', 'restoran');
        $query = $this->db->get();
        return $query;
    }

    public function data_hiburan()
    {
        $this->db->select('wp.*, tipe_wp.*');
        $this->db->from('wp');
        $this->db->join('tipe_wp', 'wp.tipe_id = tipe_wp.tipe_id');
        $this->db->where('tipe_wp.ket_tipe', 'hiburan');
        $query = $this->db->get();
        return $query;
    }

}