<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function index() {
        $this->load->model('Dashboard_model'); // Memuat model
    $data['title'] = 'Dashboard';
    $this->load->model('Dashboard_model');
    $data['total_dokter'] = $this->Dashboard_model->getTotalDokter();
    $data['total_pasien'] = $this->Dashboard_model->getTotalPasien();
    $data['total_obat'] = $this->Dashboard_model->getTotalObat();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('dashboard', $data);
    $this->load->view('templates/footer');
  }
}

