<?php
include "be-admin.php";
session_start();

//INSTANCE
$admin = new Admin();

//UNBOXING - SET PARAMETER
$idProses = $_POST["id"];
$namaProses = $_POST["nama"];
$passwordProses = $_POST["password"];

//CALL METHOD
$status = $admin->loginLogic($idProses, $namaProses, $passwordProses);

if ($status == true) {
    // Simpan informasi admin di sesi
    $_SESSION['admin_logged_in'] = true;
    $_SESSION['admin_id'] = $idProses;
    $_SESSION['admin_name'] = $namaProses;
    header("Location: ../../frontend/admin/view-dashboard.php");
} else {
    echo "Login Tidak Valid";
}
