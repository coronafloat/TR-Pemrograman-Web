<?php
include "kelas-user.php";
//INSTANCE
$user = new User();
//UNBOXING - SET PARAMETER
if (isset($_POST['nama']) && isset($_POST['password'])) {
    $idProses = $_POST['idUser'];
    $namaProses = $_POST['nama'];
    $passwordProses = $_POST['password'];

    // Panggil method signUpLogic untuk proses signup
    $status = $user->signUpLogic($idProses, $namaProses, $passwordProses);
} else {
    echo "Nama dan Pasword Harus Diisi.";
    exit;
}
