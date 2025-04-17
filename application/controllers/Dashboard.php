<?php
class Dashboard extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Dosen_model');
        $this->load->model('Matakuliah_model');
        $this->load->model('Ruang_model');
        $this->load->model('Jadwal_model');
    }

    public function index() {
        $data['title'] = 'Dashboard';
        $data['total_dosen'] = count($this->Dosen_model->get_all());
        $data['total_matkul'] = count($this->Matakuliah_model->get_all());
        $data['total_ruang'] = count($this->Ruang_model->get_all());
        $data['total_jadwal'] = count($this->Jadwal_model->get_all());
        $data['jadwal_hari_ini'] = $this->get_jadwal_today();
        
        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer');
    }
    
    private function get_jadwal_today() {
        $hari_ini = date('N'); // 1 (Senin) sampai 7 (Minggu)
        $hari = ['', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        
        // Jika hari ini adalah Minggu, tampilkan jadwal kosong
        if($hari_ini == 7) {
            return [];
        }
        
        $this->db->select('jadwal_kuliah.*, dosen.nama_dosen, mata_kuliah.nama_matkul, mata_kuliah.kode_matkul, ruang.nama_ruang, ruang.gedung');
        $this->db->from('jadwal_kuliah');
        $this->db->join('dosen', 'dosen.id_dosen = jadwal_kuliah.id_dosen');
        $this->db->join('mata_kuliah', 'mata_kuliah.id_matkul = jadwal_kuliah.id_matkul');
        $this->db->join('ruang', 'ruang.id_ruang = jadwal_kuliah.id_ruang');
        $this->db->where('hari', $hari[$hari_ini]);
        $this->db->order_by('jam_mulai', 'ASC');
        
        return $this->db->get()->result();
    }
}