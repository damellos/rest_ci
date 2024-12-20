<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dokter_model');
    }

    public function index()
    {
        $data['title'] = 'Dokter';
        $data['dokter'] = $this->db->select('dokter_id, Nama, No_Hp, Email')->get('dokter')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dokter', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Dokter'; 
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('tambah_dokter', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        $this->_rules();
        if($this->form_validation->run() == FALSE) {
           $this->tambah();
        } else {
      $data = array(
        'nama' => $this->input->post('nama'),
        'no_hp' => $this->input->post('no_hp'),
        'email' => $this->input->post('email'),
        );
      $this->Dokter_model->insert_data($data, 'dokter');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  Data berhasil ditambah!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span></button></div>' );
    redirect('dokter');
    }
    }

    public function edit()
{
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
        $this->tambah(); // Ensure this method redirects to an appropriate page
    } else {
        $dokter_id = $this->input->post('dokter_id'); // Retrieve dokter_id from the form
        
        $data = array(
            'dokter_id' => $dokter_id,
            'nama'      => $this->input->post('nama'),
            'no_hp'     => $this->input->post('no_hp'),
            'email'     => $this->input->post('email'),
        );
        
        $this->Dokter_model->update_data($data, 'dokter');
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data berhasil diubah!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>'
        );
        
        redirect('dokter');
    }
}


    public function _rules()
    {
    $this->form_validation->set_rules('nama', 'Nama Dokter', 'required', array(
        'required' => '%s harus diisi !!'
    ));

    $this->form_validation->set_rules('no_hp', 'No HP', 'required', array(
        'required' => '%s harus diisi !!'
    ));

    $this->form_validation->set_rules('email', 'Email', 'required|valid_email', array(
        'required' => '%s harus diisi !!'
    ));
    }

    public function delete($dokter_id)
    {
        $where = array('dokter_id' => $dokter_id);

        $this->Dokter_model->delete($where, 'dokter');
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data berhasil dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>'
        );
        redirect('dokter');
    }
}
    