<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pasien_model');
    }

    public function index()
    {
        $data['title'] = 'Pasien';
        $data['dokter'] = $this->db->select('pasien_id, Nama, Alamat, Tgl_Lahir, Jenis_Kelamin, No_Hp')->get('pasien')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pasien', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Pasien'; 
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('tambah_pasien', $data);
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
        'alamat' => $this->input->post('alamat'),
        'tgl_lahir' => $this->input->post('tgl_lahir'),
        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
        'no_hp' => $this->input->post('no_hp'),
        );
      $this->Dokter_model->insert_data($data, 'pasien');
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
        $dokter_id = $this->input->post('pasien_id'); // Retrieve dokter_id from the form
        
        $data = array(
            'pasien_id' => $pasien_id,
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'no_hp' => $this->input->post('no_hp'),
        );
        
        $this->Dokter_model->update_data($data, 'pasien');
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data berhasil diubah!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>'
        );
        
        redirect('pasien');
    }
}


    public function _rules()
    {
    $this->form_validation->set_rules('nama', 'Nama Pasien', 'required', array(
        'required' => '%s harus diisi !!'
    ));
    $this->form_validation->set_rules('alamat', 'Alamat', 'required', array(
        'required' => '%s harus diisi !!'
    ));
    $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required', array(
        'required' => '%s harus diisi !!'
    ));
    $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', array(
        'required' => '%s harus diisi !!'
    ));

    $this->form_validation->set_rules('no_hp', 'No HP', 'required', array(
        'required' => '%s harus diisi !!'
    ));
    }

    public function delete($pasien_id)
    {
        $where = array('pasien_id' => $pasien_id);

        $this->Dokter_model->delete($where, 'pasien');
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data berhasil dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>'
        );
        redirect('pasien');
    }
}
    