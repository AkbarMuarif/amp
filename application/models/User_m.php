<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {

    public function login($post)
    {
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', md5($post['password']));
        $query = $this->db->get();
        return $query;
    }

    public function get($id=null)
    {
        $this->db->from('user');
        if($id != null){
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    Public function add($post)
    {
        $n = $post['npwpd'];
        $params= [
            'username' => $post['username'],
            'password' => md5($post['password']),
            'name' => $post['fullname'],
            'npwpd' => $post['npwpd'],
            'level' => $post['level']
        ];

        if($n!=null){
            $params['npwpd'] = $n;
        } else {
            $params['npwpd'] = null;
        }
        $this->db->insert('user', $params);
    }

    public function del($id)
    {
        $this->db->where('user_id', $id);
		$this->db->delete('user');
    }

    Public function edit($post)
    {
        $params= [
            'name' => $post['fullname'],
            'username' => $post['username'],
            'level' => $post['level']
        ];
        if(!empty($post['password'])){
            $params['password'] = md5($post['password']);
        }
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('user', $params);
    }

    Public function edit_user($post)
    {
        $params= [
            'username' => $post['username'],
        ];
        if(!empty($post['password'])){
            $params['password'] = md5($post['password']);
        }
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('user', $params);
    }

    public function create_wp($post)
    {
        $params= [
            'name' => $post['nama_wp'],
            'username' => $post['username'],
            'password' => md5($post['username']),
            'npwpd' => $post['npwpd'],
            'level' => '2'
        ];
        $this->db->insert('user', $params);
    }

    public function edit_wp($post)
    {
        $params= [
            'name' => $post['nama_wp'],
        ];
        $this->db->where('npwpd', $post['npwpd']);
        $this->db->update('user', $params);
    }

    public function del_wp($id)
    {
        $this->db->where('npwpd', $id);
		$this->db->delete('user');
    }

}