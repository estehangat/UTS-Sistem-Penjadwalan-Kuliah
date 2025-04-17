<?php
class Ruang extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Ruang_model');
        $this->load->library('form_validation');
    }
    
    public function index() {
        $data['title'] = 'Data Ruang';
        $data['ruang'] = $this->Ruang_model->get_all();
        
        $this->load->view('templates/header', $data);
        $this->load->view('ruang/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function create() {
        $data['title'] = 'Tambah Ruang';
        
        $this->form_validation->set_rules('nama_ruang', 'Nama Ruang', 'required|is_unique[ruang.nama_ruang]');
        $this->form_validation->set_rules('gedung', 'Gedung', 'required');
        
        if($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('ruang/create', $data);
            $this->load->view('templates/footer');
        } else {
            $ruang_data = [
                'nama_ruang' => $this->input->post('nama_ruang'),
                'gedung' => $this->input->post('gedung')
            ];
            
            $this->Ruang_model->insert($ruang_data);
            $this->session->set_flashdata('success', 'Data ruang berhasil ditambahkan');
            redirect('ruang');
        }
    }
    
    public function edit($id_ruang) {
        $data['title'] = 'Edit Ruang';
        $data['ruang'] = $this->Ruang_model->get_by_id($id_ruang);
        
        if(empty($data['ruang'])) {
            show_404();
        }
        
        $this->form_validation->set_rules('nama_ruang', 'Nama Ruang', 'required');
        $this->form_validation->set_rules('gedung', 'Gedung', 'required');
        
        if($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('ruang/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $ruang_data = [
                'nama_ruang' => $this->input->post('nama_ruang'),
                'gedung' => $this->input->post('gedung')
            ];
            
            $this->Ruang_model->update($id_ruang, $ruang_data);
            $this->session->set_flashdata('success', 'Data ruang berhasil diperbarui');
            redirect('ruang');
        }
    }
    
    public function delete($id_ruang) {
        $this->Ruang_model->delete($id_ruang);
        $this->session->set_flashdata('success', 'Data ruang berhasil dihapus');
        redirect('ruang');
    }
}