<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model {
    
    private $data_mahasiswa = array(
        array('id' => 1, 'nama' => 'Ulung Galih M', 'npm' => '1412220097', 'angkatan' => '2022', 'kelas' => 'C', 'alamat' => 'Jl. Dewi Sartika NO.87 , Perumahan permata bonang', 'mata_kuliah_favorit' => 'Rekayasa Perangkat Lunak'),
        array('id' => 2, 'nama' => 'Moh. Hedar Rozak', 'npm' => '1412220030', 'angkatan' => '2022', 'kelas' => 'C', 'alamat' => 'Jl. Teluk Bayur, Perumahan permata bonang', 'mata_kuliah_favorit' => 'Rekayasa Perangkat lunak'),
        array('id' => 3, 'nama' => 'Daluri Safe sharma ', 'npm' => '1412220039', 'angkatan' => '2022', 'kelas' => 'C', 'alamat' => 'Jl. Dr. Soetomo, Ronggomulyo', 'mata_kuliah_favorit' => 'Rekayasa Perangkat Lunak'),
        array('id' => 4, 'nama' => 'Febrian Achmad Aden ', 'npm' => '1412220088', 'angkatan' => '2022', 'kelas' => 'C', 'alamat' => 'Jl. KH. Agus Salim, Ronggomulyo', 'mata_kuliah_favorit' => 'Rekayasa Perangkat Lunak'),
        array('id' => 5, 'nama' => 'Yoyok Hartoni', 'npm' => '1412220077', 'angkatan' => '2022', 'kelas' => 'C', 'alamat' => 'Jl. Apel', 'mata_kuliah_favorit' => 'Rekayasa Perangkat Lunak')
    );

    public function get_mahasiswa() {
        return $this->data_mahasiswa;
    }

    public function search_mahasiswa($keyword) {
        $result = array();
        $keyword = strtolower($keyword);
        foreach ($this->data_mahasiswa as $mahasiswa) {
            $nama_lower = strtolower($mahasiswa['nama']);
            $npm = $mahasiswa['npm'];
            $angkatan = strtolower($mahasiswa['angkatan']);
            $alamat_lower = strtolower($mahasiswa['alamat']);
            $mata_kuliah_lower = strtolower($mahasiswa['mata_kuliah_favorit']);

            if (strpos($nama_lower, $keyword) !== false ||
                strpos($npm, $keyword) !== false ||
                strpos($angkatan, $keyword) !== false ||
                strpos($alamat_lower, $keyword) !== false ||
                strpos($mata_kuliah_lower, $keyword) !== false) {
                    $result[] = $mahasiswa;
            }
        }
        return $result;
    }
}
?>
