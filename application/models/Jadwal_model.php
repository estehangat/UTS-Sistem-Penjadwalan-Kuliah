<?php
class Jadwal_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function get_all() {
        $this->db->select('jadwal_kuliah.*, dosen.nama_dosen, mata_kuliah.nama_matkul, mata_kuliah.kode_matkul, mata_kuliah.sks, ruang.nama_ruang, ruang.gedung');
        $this->db->from('jadwal_kuliah');
        $this->db->join('dosen', 'dosen.id_dosen = jadwal_kuliah.id_dosen');
        $this->db->join('mata_kuliah', 'mata_kuliah.id_matkul = jadwal_kuliah.id_matkul');
        $this->db->join('ruang', 'ruang.id_ruang = jadwal_kuliah.id_ruang');
        return $this->db->get()->result();
    }
    
    public function get_by_id($id_jadwal) {
        $this->db->select('jadwal_kuliah.*, dosen.nama_dosen, mata_kuliah.nama_matkul, mata_kuliah.kode_matkul, mata_kuliah.sks, ruang.nama_ruang, ruang.gedung');
        $this->db->from('jadwal_kuliah');
        $this->db->join('dosen', 'dosen.id_dosen = jadwal_kuliah.id_dosen');
        $this->db->join('mata_kuliah', 'mata_kuliah.id_matkul = jadwal_kuliah.id_matkul');
        $this->db->join('ruang', 'ruang.id_ruang = jadwal_kuliah.id_ruang');
        $this->db->where('jadwal_kuliah.id_jadwal', $id_jadwal);
        return $this->db->get()->row();
    }
    
    public function insert($data) {
        return $this->db->insert('jadwal_kuliah', $data);
    }
    
    public function update($id_jadwal, $data) {
        return $this->db->update('jadwal_kuliah', $data, ['id_jadwal' => $id_jadwal]);
    }
    
    public function delete($id_jadwal) {
        return $this->db->delete('jadwal_kuliah', ['id_jadwal' => $id_jadwal]);
    }
    
    public function check_conflict($id_ruang, $hari, $jam_mulai, $jam_selesai, $id_jadwal = null) {
        // Cek konflik jadwal untuk ruangan yang sama pada hari dan waktu yang sama
        $this->db->where('id_ruang', $id_ruang);
        $this->db->where('hari', $hari);
        $this->db->where('(jam_mulai < "' . $jam_selesai . '" AND jam_selesai > "' . $jam_mulai . '")', NULL, FALSE);
        
        // Jika update, exclude jadwal yang sedang diedit
        if($id_jadwal != null) {
            $this->db->where('id_jadwal !=', $id_jadwal);
        }
        
        $query = $this->db->get('jadwal_kuliah');
        return $query->num_rows() > 0;
    }
    
    public function check_conflict_dosen($id_dosen, $hari, $jam_mulai, $jam_selesai, $id_jadwal = null) {
        // Cek konflik jadwal untuk dosen yang sama pada hari dan waktu yang sama
        $this->db->where('id_dosen', $id_dosen);
        $this->db->where('hari', $hari);
        $this->db->where('(jam_mulai < "' . $jam_selesai . '" AND jam_selesai > "' . $jam_mulai . '")', NULL, FALSE);
        
        // Jika update, exclude jadwal yang sedang diedit
        if($id_jadwal != null) {
            $this->db->where('id_jadwal !=', $id_jadwal);
        }
        
        $query = $this->db->get('jadwal_kuliah');
        return $query->num_rows() > 0;
    }
    
    public function get_weekly_schedule() {
        $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $schedule = [];
        
        foreach($hari as $h) {
            $this->db->select('jadwal_kuliah.*, dosen.nama_dosen, mata_kuliah.nama_matkul, mata_kuliah.kode_matkul, mata_kuliah.sks, ruang.nama_ruang, ruang.gedung');
            $this->db->from('jadwal_kuliah');
            $this->db->join('dosen', 'dosen.id_dosen = jadwal_kuliah.id_dosen');
            $this->db->join('mata_kuliah', 'mata_kuliah.id_matkul = jadwal_kuliah.id_matkul');
            $this->db->join('ruang', 'ruang.id_ruang = jadwal_kuliah.id_ruang');
            $this->db->where('hari', $h);
            $this->db->order_by('jam_mulai', 'ASC');
            
            $schedule[$h] = $this->db->get()->result();
        }
        
        return $schedule;
    }
}