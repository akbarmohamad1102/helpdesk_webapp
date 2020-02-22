<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dosen extends CI_Model {

    public function getDosen()
    {
        return $this->db->get('dosen')->result();
    }

    public function getKelasW($where)
    {
        $this->db->select('*');
        $this->db->where('id_dosen', $where);
        return $this->db->get('dosen')->result();
    }

    public function createDosen($data)
    {
        $insert = $this->db->insert('dosen', $data);
    }

    public function update($table, $var, $where)
    {
        $res = $this->db->update($table, $var, $where);
		return $res;
    }

}

/* End of file ModelName.php */
