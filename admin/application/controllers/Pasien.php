<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pasien_model');
    }

    public function index() {
        $data['title'] = 'Pasien';
        $data['pasien'] = $this->db->select('pasien_id, Nama, Alamat, Tgl_Lahir, Jenis_Kelamin, No_Hp')
                                   ->get('pasien')
                                   ->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pasien', $data);
        $this->load->view('templates/footer');
    }

    public function tambah() {
        $data['title'] = 'Tambah Pasien'; 
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('tambah_pasien', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_aksi() {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'Nama' => $this->input->post('nama'),
                'Alamat' => $this->input->post('alamat'),
                'Tgl_Lahir' => $this->input->post('tgl_lahir'),
                'Jenis_Kelamin' => $this->input->post('jenis_kelamin'),
                'No_Hp' => $this->input->post('no_hp')
            );
            $this->Pasien_model->insert_data($data, 'pasien');
            redirect('pasien');
        }
    }

    public function edit($id) {
        $data['title'] = 'Edit Pasien';
        $data['pasien'] = $this->db->get_where('pasien', ['pasien_id' => $id])->row();

        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('edit_pasien', $data);
            $this->load->view('templates/footer');
        } else {
            $update_data = array(
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'no_hp' => $this->input->post('no_hp')
            );

            $this->Pasien_model->update_data($update_data, 'pasien', ['pasien_id' => $id]);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data berhasil diubah!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data gagal diubah!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
            }
            redirect('pasien');
        }
    }

    public function delete($pasien_id) {
        $where = array('pasien_id' => $pasien_id);

        $this->Pasien_model->delete($where, 'pasien');
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button></div>');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data gagal dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button></div>');
        }
        redirect('pasien');
    }

    public function _rules() {
        $this->form_validation->set_rules('nama', 'Nama Pasien', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|callback_valid_date', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('no_hp', 'No HP', 'required|numeric', array(
            'required' => '%s harus diisi !!',
            'numeric' => '%s harus berupa angka !!'
        ));
    }
}
