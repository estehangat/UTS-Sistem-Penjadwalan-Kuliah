<?php
class Jadwal extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Jadwal_model');
        $this->load->model('Dosen_model');
        $this->load->model('Matakuliah_model');
        $this->load->model('Ruang_model');
        $this->load->library('form_validation');
    }
    
    public function index() {
        $data['title'] = 'Data Jadwal Kuliah';
        $data['jadwal'] = $this->Jadwal_model->get_all();
        
        $this->load->view('templates/header', $data);
        $this->load->view('jadwal/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function weekly() {
        $data['title'] = 'Jadwal Mingguan';
        $data['jadwal_mingguan'] = $this->Jadwal_model->get_weekly_schedule();
        
        $this->load->view('templates/header', $data);
        $this->load->view('jadwal/weekly', $data);
        $this->load->view('templates/footer');
    }
    
    public function create() {
        $data['title'] = 'Tambah Jadwal Kuliah';
        $data['dosen'] = $this->Dosen_model->get_all();
        $data['matakuliah'] = $this->Matakuliah_model->get_all();
        $data['ruang'] = $this->Ruang_model->get_all();
        $data['hari'] = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        
        $this->form_validation->set_rules('id_dosen', 'Dosen', 'required');
        $this->form_validation->set_rules('id_matkul', 'Mata Kuliah', 'required');
        $this->form_validation->set_rules('id_ruang', 'Ruang', 'required');
        $this->form_validation->set_rules('hari', 'Hari', 'required');
        $this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required');
        $this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        
        if($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('jadwal/create', $data);
            $this->load->view('templates/footer');
        } else {
            $id_ruang = $this->input->post('id_ruang');
            $id_dosen = $this->input->post('id_dosen');
            $hari = $this->input->post('hari');
            $jam_mulai = $this->input->post('jam_mulai');
            $jam_selesai = $this->input->post('jam_selesai');
            
            // Cek konflik jadwal ruangan
            if($this->Jadwal_model->check_conflict($id_ruang, $hari, $jam_mulai, $jam_selesai)) {
                $this->session->set_flashdata('error', 'Terjadi konflik jadwal pada ruangan yang dipilih. Silakan pilih ruangan atau waktu lain.');
                $this->load->view('templates/header', $data);
                $this->load->view('jadwal/create', $data);
                $this->load->view('templates/footer');
                return;
            }
            
            // Cek konflik jadwal dosen
            if($this->Jadwal_model->check_conflict_dosen($id_dosen, $hari, $jam_mulai, $jam_selesai)) {
                $this->session->set_flashdata('error', 'Terjadi konflik jadwal pada dosen yang dipilih. Dosen sudah memiliki jadwal mengajar pada waktu tersebut.');
                $this->load->view('templates/header', $data);
                $this->load->view('jadwal/create', $data);
                $this->load->view('templates/footer');
                return;
            }
            
            $jadwal_data = [
                'id_dosen' => $id_dosen,
                'id_matkul' => $this->input->post('id_matkul'),
                'id_ruang' => $id_ruang,
                'hari' => $hari,
                'jam_mulai' => $jam_mulai,
                'jam_selesai' => $jam_selesai,
                'kelas' => $this->input->post('kelas')
            ];
            
            $this->Jadwal_model->insert($jadwal_data);
            $this->session->set_flashdata('success', 'Jadwal kuliah berhasil ditambahkan');
            redirect('jadwal');
        }
    }
    
    public function edit($id_jadwal) {
        $data['title'] = 'Edit Jadwal Kuliah';
        $data['jadwal'] = $this->Jadwal_model->get_by_id($id_jadwal);
        $data['dosen'] = $this->Dosen_model->get_all();
        $data['matakuliah'] = $this->Matakuliah_model->get_all();
        $data['ruang'] = $this->Ruang_model->get_all();
        $data['hari'] = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        
        if(empty($data['jadwal'])) {
            show_404();
        }
        
        $this->form_validation->set_rules('id_dosen', 'Dosen', 'required');
        $this->form_validation->set_rules('id_matkul', 'Mata Kuliah', 'required');
        $this->form_validation->set_rules('id_ruang', 'Ruang', 'required');
        $this->form_validation->set_rules('hari', 'Hari', 'required');
        $this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required');
        $this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        
        if($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('jadwal/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $id_ruang = $this->input->post('id_ruang');
            $id_dosen = $this->input->post('id_dosen');
            $hari = $this->input->post('hari');
            $jam_mulai = $this->input->post('jam_mulai');
            $jam_selesai = $this->input->post('jam_selesai');
            $kelas = $this->input->post('kelas');
            
            // Cek konflik jadwal ruangan
            if($this->Jadwal_model->check_conflict($id_ruang, $hari, $jam_mulai, $jam_selesai, $id_jadwal, $kelas)) {
                $this->session->set_flashdata('error', 'Terjadi konflik jadwal pada ruangan yang dipilih. Silakan pilih ruangan atau waktu lain.');
                $this->load->view('templates/header', $data);
                $this->load->view('jadwal/edit', $data);
                $this->load->view('templates/footer');
                return;
            }
            
            // Cek konflik jadwal dosen
            if($this->Jadwal_model->check_conflict_dosen($id_dosen, $hari, $jam_mulai, $jam_selesai, $id_jadwal, $kelas)) {
                $this->session->set_flashdata('error', 'Terjadi konflik jadwal pada dosen yang dipilih. Dosen sudah memiliki jadwal mengajar pada waktu tersebut.');
                $this->load->view('templates/header', $data);
                $this->load->view('jadwal/edit', $data);
                $this->load->view('templates/footer');
                return;
            }
            
            $jadwal_data = [
                'id_dosen' => $id_dosen,
                'id_matkul' => $this->input->post('id_matkul'),
                'id_ruang' => $id_ruang,
                'hari' => $hari,
                'jam_mulai' => $jam_mulai,
                'jam_selesai' => $jam_selesai,
                'kelas' => $this->input->post('kelas')
            ];
            
            $this->Jadwal_model->update($id_jadwal, $jadwal_data);
            $this->session->set_flashdata('success', 'Jadwal kuliah berhasil diperbarui');
            redirect('jadwal');
        }
    }
    
    public function delete($id_jadwal) {
        $this->Jadwal_model->delete($id_jadwal);
        $this->session->set_flashdata('success', 'Jadwal kuliah berhasil dihapus');
        redirect('jadwal');
    }
}