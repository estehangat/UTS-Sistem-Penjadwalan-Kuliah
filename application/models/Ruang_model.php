<?php
class Ruang_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function get_all() {
        return $this->db->get('ruang')->result();
    }
    
    public function get_by_id($id_ruang) {
        return $this->db->get_where('ruang', ['id_ruang' => $id_ruang])->row();
    }
    
    public function insert($data) {
        return $this->db->insert('ruang', $data);
    }
    
    public function update($id_ruang, $data) {
        return $this->db->update('ruang', $data, ['id_ruang' => $id_ruang]);
    }
    
    public function delete($id_ruang) {
        return $this->db->delete('ruang', ['id_ruang' => $id_ruang]);
    }
}