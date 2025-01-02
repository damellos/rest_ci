<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Obat_model');
    }

    public function index()
    {
        $data['title'] = 'Obat';
        $data['obat'] = $this->db->select('obat_id, nama_obat, harga')->get('obat')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('obat', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Obat'; 
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('tambah_obat', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        $this->_rules();
        if($this->form_validation->run() == FALSE) {
           $this->tambah();
        } else {
      $data = array(
        'nama_obat' => $this->input->post('nama_obat'),
        'harga' => $this->input->post('harga'),
        );
      $this->Obat_model->insert_data($data, 'obat');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  Data berhasil ditambah!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span></button></div>' );
    redirect('obat');
    }
    }

    public function edit()
{
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
        $this->tambah(); // Ensure this method redirects to an appropriate page
    } else {
        $obat_id = $this->input->post('obat_id'); // Retrieve Obat_id from the form
        
        $data = array(
            'obat_id' => $obat_id,
            'nama_obat' => $this->input->post('nama_obat'),
            'harga' => $this->input->post('harga'),
        );
        
        $this->Obat_model->update_data($data, 'obat');
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data berhasil diubah!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>'
        );
        
        redirect('obat');
    }
}


    public function _rules()
    {
    $this->form_validation->set_rules('nama_obat', 'Nama Obat', 'required', array(
        'required' => '%s harus diisi !!'
    ));

    $this->form_validation->set_rules('harga', 'Harga', 'required', array(
        'required' => '%s harus diisi !!'
    ));

    }

    public function delete($obat_id)
    {
        $where = array('obat_id' => $obat_id);

        $this->Obat_model->delete($where, 'obat');
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data berhasil dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>'
        );
        redirect('obat');
    }
}
    