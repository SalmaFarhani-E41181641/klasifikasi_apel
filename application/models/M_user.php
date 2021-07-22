<?php
class M_user extends CI_Model
{
    function user($email)
    {
        $this->db->select('*');
        $this->db->from('user');
        // $this->db->join('role', 'role.id_role=user.id_role');
        $this->db->where('email', $email);
        $query = $this->db->get()->row_array();
        return $query;
    }

    function ubhpsw($pswhash, $email)
    {
        $this->db->set('password', $pswhash);
        $this->db->set('update_password', time());
        $this->db->where('email', $email);
        $this->db->update('user');
        return $this->db;
    }

    public function allTesting($id)
    {
        return $this->db->query('SELECT * FROM detail_pengujian_user join data_testing_user where detail_pengujian_user.id_testing= data_testing_user.id_testing and detail_pengujian_user.id_uji="'. $id.'"')->result();
    }

    public function jmltraining()
    {
        $jml = $this->db->get('data_training')->num_rows();
        return $jml;
    }

    public function jmltesting()
    {
        $jml = $this->db->get('data_testing')->num_rows();
        return $jml;
    }

    public function jmlkelas()
    {
        $jml = $this->db->query("SELECT COUNT( DISTINCT data_training.Kelas_Apel) as kelas
        FROM data_training")->row_array();
        return $jml;
    }

    public function detailkelas(){
        $kelas = $this->db->query("SELECT DISTINCT Kelas_Apel FROM data_training")->result_array();
        return $kelas;
    }

    public function jmluji()
    {
        $jml = $this->db->query("SELECT COUNT( DISTINCT pengujian.id_uji) as uji
        FROM pengujian")->row_array();
        return $jml;
    }

    function insert($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function idps()
    {
        $this->db->select('*');
        $this->db->from('pengujian');
        $this->db->order_by('id_uji', 'DESC');
        $this->db->limit(1);
        return $this->db->get();
    }

    function getId($id_ps)
    {
        $this->db->select('*');
        $this->db->from('pengujian');
        $this->db->where('jenis_pengujian', $id_ps);
        $query = $this->db->get()->result_array();
        return $query;
    }

    function getTest()
    {
        $this->db->select('*');
        $this->db->from('data_testing');
        $query = $this->db->get()->result_array();
        return $query;
    }
}
