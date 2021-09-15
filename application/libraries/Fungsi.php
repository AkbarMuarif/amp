<?php

class Fungsi{

    protected $ci;
    
    public function __construct(){
        $this->ci =& get_instance();
    }

    function user_login(){
        $this->ci->load->model('user_m');
        $user_id = $this->ci->session->userdata('user_id');
        $user_data = $this->ci->user_m->get($user_id)->row();
        return $user_data;
    }

    function PdfGenerator($html, $filename, $paper, $orientation){
        $dompdf = new Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper($paper, $orientation);
        // Render the HTML as PDF
        $dompdf->render();
        // Output the generated PDF to Browser
        $dompdf->stream($filename, array('Attachment'=>0));
    }

    public function count_wp(){
        $this->ci->load->model('wp_m');
        return $this->ci->wp_m->get()->num_rows();
    }

    public function count_hotel(){
        $this->ci->load->model('wp_m');
        return $this->ci->wp_m->data_hotel()->num_rows();
    }

    public function count_restoran(){
        $this->ci->load->model('wp_m');
        return $this->ci->wp_m->data_restoran()->num_rows();
    }

    public function count_hiburan(){
        $this->ci->load->model('wp_m');
        return $this->ci->wp_m->data_hiburan()->num_rows();
    }

    public function cek_user_wp(){
        $this->ci->load->model('wp_m');
        $npwpd = $this->ci->session->userdata('npwpd');
        $data_wp = $this->ci->wp_m->get($npwpd)->row();
        return $data_wp;
    }
}