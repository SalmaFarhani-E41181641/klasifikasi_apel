<?php
class M_training extends CI_Model
{
    public function select_manalagi()
    {
        $data = $this->db->query("SELECT * FROM data_training WHERE data_training.kelas_training = 'Manalagi' ");
        return $data->result();
    }

    public function select_greensmith()
    {
        $data = $this->db->query("SELECT * FROM data_training WHERE data_training.kelas_training = 'Green Smith' ");
        return $data->result();
    }

    public function select_all()
    {
        $this->db->select('*');
        $this->db->from('data_training');
        $data = $this->db->get();
        return $data->result();
    }

    function insert($kelas_asli, $kelas_klasifikasi, $mean_h, $mean_s, $mean_i, $skewness_h, $skewness_s, $skewness_i, $kurtosis_h, $kurtosis_s, $kurtosis_i)
    {
        $data = array(
            'Kelas_Asli' => $kelas_asli,
            'Kelas_Klasifikasi' => $kelas_klasifikasi,
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
        $this->db->insert('data_training', $data);
    }

    function update($id, $kelas_asli, $kelas_klasifikasi, $mean_h, $mean_s, $mean_i, $skewness_h, $skewness_s, $skewness_i, $kurtosis_h, $kurtosis_s, $kurtosis_i)
    {
        $this->db->set('Kelas_Asli', $kelas_asli);
        $this->db->set('Kelas_Klasifikasi', $kelas_klasifikasi);
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
        $this->db->update('data_training');
    }

    function delete($id)
    {
        $query = $this->db->delete('data_training', array('id_training' => $id));
        return $query;
    }

    public function check_data($data)
    {
        $this->db->where('Mean_H', $data);
        $data = $this->db->get('data_training');

        return $data->num_rows();
    }

    public function insert_batch($data)
    {
        $this->db->insert_batch('data_training', $data);
        return $this->db->affected_rows();
    }
}
