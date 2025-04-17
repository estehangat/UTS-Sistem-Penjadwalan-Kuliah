<?php
class Matakuliah_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function get_all() {
        return $this->db->get('mata_kuliah')->result();
    }
    
    public function get_by_id($id_matkul) {
        return $this->db->get_where('mata_kuliah', ['id_matkul' => $id_matkul])->row();
    }
    
    public function insert($data) {
        return $this->db->insert('mata_kuliah', $data);
    }
    
    public function update($id_matkul, $data) {
        return $this->db->update('mata_kuliah', $data, ['id_matkul' => $id_matkul]);
    }
    
    public function delete($id_matkul) {
        return $this->db->delete('mata_kuliah', ['id_matkul' => $id_matkul]);
    }
}