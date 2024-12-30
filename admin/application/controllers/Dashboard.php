<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  public function __construct() {
    parent::__construct();
    if (!$this->session->userdata("dokter_id")) {
        $this->session->set_flashdata('pesan_gagal', 'Anda harus login');
        redirect('login'); 
    }
  }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard');
        $this->load->view('templates/footer');
    }
}

