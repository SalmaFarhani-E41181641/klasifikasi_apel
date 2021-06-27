<?php
class M_report extends CI_Model
{
    public function select_all()
    {
        $this->db->select('*');
        $this->db->from('pengujian');
        $data = $this->db->get();
        return $data->result();
    }
}
