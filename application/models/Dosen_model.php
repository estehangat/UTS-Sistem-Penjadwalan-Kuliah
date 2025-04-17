<?php

class Dosen_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function get_all() {
        return $this->db->get('dosen')->result();
    }
    
    public function get_by_id($id_dosen) {
        return $this->db->get_where('dosen', ['id_dosen' => $id_dosen])->row();
    }
    
    public function insert($data) {
        return $this->db->insert('dosen', $data);
    }
    
    public function update($id_dosen, $data) {
        return $this->db->update('dosen', $data, ['id_dosen' => $id_dosen]);
    }
    
    public function delete($id_dosen) {
        return $this->db->delete('dosen', ['id_dosen' => $id_dosen]);
    }
}