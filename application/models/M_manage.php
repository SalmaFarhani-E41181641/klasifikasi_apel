<?php
class M_manage extends CI_Model
{
    public function user()
    {
        $this->db->select('*');
        $this->db->from('user');
        // $this->db->where('id_role=2');
        $this->db->order_by('id_user', 'DESC');
        return $this->db->get()->result_array();
    }

    public function idusr()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->order_by('id_user', 'DESC');
        $this->db->limit(1);
        return $this->db->get();
    }

    public function reguser($register)
    {
        $insert = $this->db->insert('user', $register);
        return $insert;
    }

    public function hapus($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user');
        return $this->db;
    }

    public function blok($id)
    {
        $this->db->set('status', 2);
        $this->db->where('id_user', $id);
        $this->db->update('user');
        return $this->db;
    }

    public function unblok($id)
    {
        $this->db->set('status', 1);
        $this->db->where('id_user', $id);
        $this->db->update('user');
        return $this->db;
    }

    public function aktif($id)
    {
        $this->db->set('status', 1);
        $this->db->where('id_user', $id);
        $this->db->update('user');
        return $this->db;
    }
}
