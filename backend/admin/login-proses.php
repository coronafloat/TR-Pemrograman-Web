<?php
    include "be-admin.php";
    session_start();
    $_SESSION["admin_logged_in"] = false;

    //INSTANCE
    $admin = new Admin();

    //UNBOXING - SET PARAMETER
    $idProses = $_POST["idAdmin"];
    $namaProses = $_POST["namaAdmin"];
    $passwordProses = $_POST["passwordAdmin"];

    //CALL METHOD
    $status = $admin->loginLogic($idProses, $namaProses, $passwordProses);

    if ($status == true) {
        // Simpan informasi admin di sesi
        $_SESSION["admin_logged_in"] = true;
        $_SESSION["admin_id"] = $idProses;
        $_SESSION["admin_name"] = $namaProses;
        header("Location: ../../frontend/admin/view-dashboard.php");
    } else {
        echo "<script>
        alert('Login Gagal. ID, Username atau Password Anda Salah!');
        window.location.href = '../../frontend/admin/view-login.php';
        </script>";
    
    }
?>
