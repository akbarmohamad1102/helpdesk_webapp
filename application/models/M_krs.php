<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_krs extends CI_Model {

    public function getJadwalBySmt($smt, $jur)
    {
        $this->db->select('jadwal_kuliah.id_jadwalkuliah,jadwal_kuliah.jam, jadwal_kuliah.hari, mata_kuliah.nama_matkul, dosen.nama_dosen, kelas.no_ruangan, mata_kuliah.semester');   
        $this->db->from('jadwal_kuliah');
        $this->db->join('dosen', 'dosen.id_dosen = jadwal_kuliah.id_dosen');
        $this->db->join('mata_kuliah', 'jadwal_kuliah.id_matkul = mata_kuliah.id_matkul');
        $this->db->join('kelas', 'kelas.id_kelas = jadwal_kuliah.id_kelas');
        $this->db->join('jurusan', 'mata_kuliah.id_jurusan = jurusan.id_jurusan');
        // $this->db->where('NOT EXISTS (select krs.id_jadwal from krs where krs.id_jadwal= jadwal_kuliah.id_jadwalkuliah)', '', FALSE);
        $this->db->where('mata_kuliah.semester', $smt);
        $this->db->where('mata_kuliah.id_jurusan', $jur);
        $this->db->where('jadwal_kuliah.deleted', 0);
        return $this->db->get()->result();
    }

    public function getKrs($nim)
    {
        $this->db->select('jadwal_kuliah.id_jadwalkuliah, jadwal_kuliah.jam, jadwal_kuliah.tahun, jadwal_kuliah.hari, mata_kuliah.nama_matkul, dosen.nama_dosen, kelas.no_ruangan, kelas.gedung, mata_kuliah.semester');   
        $this->db->from('krs');
        $this->db->join('jadwal_kuliah', 'jadwal_kuliah.id_jadwalkuliah = krs.id_jadwal');
        $this->db->join('mata_kuliah', 'mata_kuliah.id_matkul = jadwal_kuliah.id_matkul');
        $this->db->join('dosen', 'dosen.id_dosen = jadwal_kuliah.id_dosen');
        $this->db->join('kelas', 'kelas.id_kelas = jadwal_kuliah.id_kelas');
        $this->db->where('krs.nim', $nim);
        return $this->db->get()->result();
    }

    public function createKrs($val)
    {
        $insert = $this->db->insert('krs', $val);
    }
    public function cari($id,$nim)
    {
        $this->db->where('id_jadwal', $id);
        $this->db->where('nim',$nim);
        $q = $this->db->get('krs')->result();
        return $q;
    }
    

}

/* End of file M_krs.php */
