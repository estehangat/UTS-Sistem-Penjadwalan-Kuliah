<?php
class Matakuliah extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Matakuliah_model');
        $this->load->library('form_validation');
    }
    
    public function index() {
        $data['title'] = 'Data Mata Kuliah';
        $data['matakuliah'] = $this->Matakuliah_model->get_all();
        
        $this->load->view('templates/header', $data);
        $this->load->view('matakuliah/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function create() {
        $data['title'] = 'Tambah Mata Kuliah';
        
        $this->form_validation->set_rules('nama_matkul', 'Nama Mata Kuliah', 'required');
        $this->form_validation->set_rules('kode_matkul', 'Kode Mata Kuliah', 'required|is_unique[mata_kuliah.kode_matkul]');
        $this->form_validation->set_rules('sks', 'SKS', 'required|numeric');
        
        if($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('matakuliah/create', $data);
            $this->load->view('templates/footer');
        } else {
            $matkul_data = [
                'nama_matkul' => $this->input->post('nama_matkul'),
                'kode_matkul' => $this->input->post('kode_matkul'),
                'sks' => $this->input->post('sks')
            ];
            
            $this->Matakuliah_model->insert($matkul_data);
            $this->session->set_flashdata('success', 'Data mata kuliah berhasil ditambahkan');
            redirect('matakuliah');
        }
    }
    
    public function edit($id_matkul) {
        $data['title'] = 'Edit Mata Kuliah';
        $data['matkul'] = $this->Matakuliah_model->get_by_id($id_matkul);
        
        if(empty($data['matkul'])) {
            show_404();
        }
        
        $this->form_validation->set_rules('nama_matkul', 'Nama Mata Kuliah', 'required');
        $this->form_validation->set_rules('kode_matkul', 'Kode Mata Kuliah', 'required');
        $this->form_validation->set_rules('sks', 'SKS', 'required|numeric');
        
        if($this->input->post('kode_matkul') !== $data['matkul']->kode_matkul) {
            $this->form_validation->set_rules('kode_matkul', 'Kode Mata Kuliah', 'required|is_unique[mata_kuliah.kode_matkul]');
        }
        
        if($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('matakuliah/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $matkul_data = [
                'nama_matkul' => $this->input->post('nama_matkul'),
                'kode_matkul' => $this->input->post('kode_matkul'),
                'sks' => $this->input->post('sks')
            ];
            
            $this->Matakuliah_model->update($id_matkul, $matkul_data);
            $this->session->set_flashdata('success', 'Data mata kuliah berhasil diperbarui');
            redirect('matakuliah');
        }
    }
    
    public function delete($id_matkul) {
        $this->Matakuliah_model->delete($id_matkul);
        $this->session->set_flashdata('success', 'Data mata kuliah berhasil dihapus');
        redirect('matakuliah');
    }
}