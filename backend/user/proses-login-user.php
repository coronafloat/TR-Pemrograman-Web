<?php
    include "kelas-user.php";
    session_start();
    $_SESSION["user_logged_in"] = false;

    //INSTANCE
    $user = new User();

    //UNBOXING - SET PARAMETER
    $idProses = $_POST["idUser"];
    $namaProses = $_POST["nama"];
    $passwordProses = $_POST["password"];

    //CALL METHOD
    $status = $user->loginLogic($idProses, $namaProses, $passwordProses);

    if ($status == true) {
        // Simpan informasi user di sesi
        $_SESSION["user_logged_in"] = true;
        $_SESSION["user_id"] = $idProses;
        $_SESSION["user_name"] = $namaProses;
        header("Location: ../../frontend/user/view-create-user.php");
    } else {
        echo "<script>
        alert('Login Gagal. Silakan cek ID, Nama, atau Password Anda.');
        window.location.href = '../../frontend/user/view-login-user.php';
        </script>";
    
    }
?>
