<?php
class M_testing extends CI_Model
{
    public function select_all()
    {
        $this->db->select('*');
        $this->db->from('data_testing');
        $data = $this->db->get();
        return $data->result();
    }

    public function insert_batch($data)
    {
        $this->db->insert_batch('data_testing', $data);
        return $this->db->affected_rows();
    }

    public function insert_batch_user($tabel,$data)
    {
        $this->db->insert_batch($tabel, $data);
        return $this->db->affected_rows();
    }

    public function check_data($data)
    {
        $this->db->where('Mean_H', $data);
        $data = $this->db->get('data_testing');

        return $data->num_rows();
    }

    function insert($kelas, $mean_h, $mean_s, $mean_i, $skewness_h, $skewness_s, $skewness_i, $kurtosis_h, $kurtosis_s, $kurtosis_i)
    {
        $data = array(
            'Kelas_Apel' => $kelas,
            'Mean_H' => $mean_h,
            'Mean_S' => $mean_s,
            'Mean_I' => $mean_i,
            'Skewness_H' => $skewness_h,
            'Skewness_S' => $skewness_s,
            'Skewness_I' => $skewness_i,
            'Kurtosis_H' => $kurtosis_h,
            'Kurtosis_S' => $kurtosis_s,
            'Kurtosis_I' => $kurtosis_i
        );
        $this->db->insert('data_testing', $data);
    }

    function update($id, $kelas, $mean_h, $mean_s, $mean_i, $skewness_h, $skewness_s, $skewness_i, $kurtosis_h, $kurtosis_s, $kurtosis_i)
    {
        $this->db->set('Kelas_Apel', $kelas);
        $this->db->set('Mean_H', $mean_h);
        $this->db->set('Mean_S', $mean_s);
        $this->db->set('Mean_I', $mean_i);
        $this->db->set('Skewness_H', $skewness_h);
        $this->db->set('Skewness_S', $skewness_s);
        $this->db->set('Skewness_I', $skewness_i);
        $this->db->set('Kurtosis_H', $kurtosis_h);
        $this->db->set('Kurtosis_S', $kurtosis_s);
        $this->db->set('Kurtosis_I', $kurtosis_i);
        $this->db->where('Id', $id);
        $this->db->update('data_testing');
    }

    function delete($id)
    {
        $query = $this->db->delete('data_testing', array('Id' => $id));
        return $query;
    }
}
