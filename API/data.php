<?php

require_once('connect.php');

$result = mysqli_query($con, "SELECT * FROM table_barang");

$hasil = array();
while ($data = mysqli_fetch_array($result)) {
    array_push($hasil, array(
        'kode_barang' => $data['kd_barang'],
        'nama_barang' => $data['nama_barang'],
        'harga' => $data['harga_barang'],
        'stok' => $data['stok_barang'],
        'keterangan' => $data['keterangan'],
        'gambar' => $data['gambar']
    ));
}

echo json_encode(
    $hasil
);

?>

