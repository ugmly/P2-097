<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Mahasiswa_model'); 
        $this->load->library('form_validation');
    }

    public function index() {
        $data['mahasiswa'] = $this->Mahasiswa_model->get_mahasiswa(); 
        $this->load->view('mahasiswa_view', $data); 
    }

    public function search() {
        $keyword = $this->input->post('keyword'); 
        $data['mahasiswa'] = $this->Mahasiswa_model->search_mahasiswa($keyword); 
        $this->load->view('mahasiswa_view', $data); 
    }

    public function input_data()
    {
        $this->load->view('input_data');
    }

    public function tampilkan_data()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('npm', 'NPM', 'required|numeric');
        $this->form_validation->set_rules('angkatan', 'Angkatan', 'required|callback_validate_angkatan');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|callback_validate_kelas');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[20]');
        $this->form_validation->set_rules('mata_kuliah', 'Mata Kuliah Favorit', 'required');

        // Set pesan kesalahan
        $this->form_validation->set_message('required', '{field} harus diisi.');
        $this->form_validation->set_message('numeric', '{field} harus berupa angka.');
        $this->form_validation->set_message('min_length', '{field} harus memiliki panjang minimal {param} karakter.');

        // Jalankan validasi
        if ($this->form_validation->run() == false) {
            // Jika validasi gagal, tampilkan kembali form input data
            $this->load->view('input_data');
        } else {
            // Jika validasi berhasil, ambil data dan lanjutkan proses
            $data['nama'] = $this->input->post('nama');
            $data['npm'] = $this->input->post('npm');
            $data['angkatan'] = $this->input->post('angkatan');
            $data['kelas'] = $this->input->post('kelas');
            $data['alamat'] = $this->input->post('alamat');
            $data['mata_kuliah'] = $this->input->post('mata_kuliah');
            // Tampilkan data di halaman lain
            $this->load->view('hasil_data', $data);
        }
    }

    public function validate_angkatan($str)
    {
        if (!preg_match('/^(19|20)\d{2}$/', $str)) {
            $this->form_validation->set_message('validate_angkatan', 'Format Angkatan harus sesuai dengan format tahun (19XX atau 20XX).');
            return false;
        } else {
            return true;
        }
    }

    public function validate_kelas($str)
    {
        if (!preg_match('/^[A-Z]{1}$/', $str)) {
            $this->form_validation->set_message('validate_kelas', 'Format Kelas harus merupakan satu huruf kapital.');
            return false;
        } else {
            return true;
        }
    }
}
?>
