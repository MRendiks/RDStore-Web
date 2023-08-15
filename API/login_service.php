<?php 

require_once 'connect.php';

$username = $_POST['username'];
$password = $_POST['password'];

$result = mysqli_query($con, "SELECT * FROM table_user WHERE username='$username' AND password='$password'");

$hasil = array();
while ($data = mysqli_fetch_array($result)) {
    $hasil = array(
        'kd_user' => $data['kd_user'],
        'nama_user' => $data['nama_user'],
        'username' => $data['username'],
        'password' => $data['password']
    );
}
echo json_encode(
    $hasil
);

?>