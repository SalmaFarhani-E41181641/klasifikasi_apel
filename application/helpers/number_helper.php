<?php
function autonumber($id_terakhir, $panjang_kode, $panjang_angka)
{

    // mengambil nilai kode ex: USR0015 hasil USR
    $kode = substr($id_terakhir, 0, $panjang_kode);

    // mengambil nilai angka
    // ex: USR0015 hasilnya 0015
    $angka = substr($id_terakhir, $panjang_kode, $panjang_angka);

    // menambahkan nilai angka dengan 1
    // kemudian memberikan string 0 agar panjang string angka menjadi 4
    // ex: angka baru = 6 maka ditambahkan strig 0 tiga kali
    // sehingga menjadi 0006
    $angka_baru = str_repeat("0", $panjang_angka - strlen($angka + 1)) . ($angka + 1);

    // menggabungkan kode dengan nilang angka baru
    $id_baru = $kode . $angka_baru;

    return $id_baru;
}

function get_jumlah_sum_atribut($db_object, $atribut, $kelas_asli)
{
    $var_ci = get_instance();
    $sql = $var_ci->db->query("SELECT SUM($atribut) FROM pengujian WHERE hasil='$kelas_asli'")->result_array();
    return $sql[0];
}
