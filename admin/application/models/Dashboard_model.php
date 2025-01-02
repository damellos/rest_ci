<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    public function getTotalDokter() {
        return $this->db->count_all('dokter');
    }

    public function getTotalPasien() {
        return $this->db->count_all('pasien');
    }

    public function getTotalObat() {
        return $this->db->count_all('obat');
    }
}
