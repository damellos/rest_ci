<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_model extends CI_Model {

    public function get_all_pasien()
    {
        return $this->db->select('pasien_id, nama, alamat, tgl_lahir, jenis_kelamin, no_hp')
                       ->get('pasien')
                       ->result();
    }

    public function get_pasien_by_id($pasien_id)
    {
        return $this->db->get_where('pasien', ['pasien_id' => $pasien_id])->row();
    }

    public function insert_pasien($data)
    {
        $this->db->insert('pasien', $data);
        return $this->db->insert_id();
    }

    public function update_pasien($pasien_id, $data)
    {
        $this->db->where('pasien_id', $pasien_id);
        return $this->db->update('pasien', $data);
    }

    public function delete_pasien($pasien_id)
    {
        $this->db->where('pasien_id', $pasien_id);
        return $this->db->delete('pasien');
    }

    public function validate_pasien($data)
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('nama', 'Nama', 'required|max_length[100]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|max_length[255]');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|in_list[L,P]');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required|max_length[15]');

        return $this->form_validation->run();
    }
}

