<?php
class Dosen extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Dosen_model');
        $this->load->library('form_validation');
    }
    
    public function index() {
        $data['title'] = 'Data Dosen';
        $data['dosen'] = $this->Dosen_model->get_all();
        
        $this->load->view('templates/header', $data);
        $this->load->view('dosen/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function create() {
        $data['title'] = 'Tambah Dosen';
        
        $this->form_validation->set_rules('nama_dosen', 'Nama Dosen', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required|is_unique[dosen.nip]');
        
        if($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('dosen/create', $data);
            $this->load->view('templates/footer');
        } else {
            $dosen_data = [
                'nama_dosen' => $this->input->post('nama_dosen'),
                'nip' => $this->input->post('nip')
            ];
            
            $this->Dosen_model->insert($dosen_data);
            $this->session->set_flashdata('success', 'Data dosen berhasil ditambahkan');
            redirect('dosen');
        }
    }
    
    public function edit($id_dosen) {
        $data['title'] = 'Edit Dosen';
        $data['dosen'] = $this->Dosen_model->get_by_id($id_dosen);
        
        if(empty($data['dosen'])) {
            show_404();
        }
        
        $this->form_validation->set_rules('nama_dosen', 'Nama Dosen', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        
        if($this->input->post('nip') !== $data['dosen']->nip) {
            $this->form_validation->set_rules('nip', 'NIP', 'required|is_unique[dosen.nip]');
        }
        
        if($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('dosen/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $dosen_data = [
                'nama_dosen' => $this->input->post('nama_dosen'),
                'nip' => $this->input->post('nip')
            ];
            
            $this->Dosen_model->update($id_dosen, $dosen_data);
            $this->session->set_flashdata('success', 'Data dosen berhasil diperbarui');
            redirect('dosen');
        }
    }
    
    public function delete($id_dosen) {
        $this->Dosen_model->delete($id_dosen);
        $this->session->set_flashdata('success', 'Data dosen berhasil dihapus');
        redirect('dosen');
    }
}