<?php
    include "be-admin.php";

    //Membuat Objek
    $pk = new Admin();

    //Unboxing - set parameter
    $a = $_POST["txtId"];
    $b = $_POST["txtNama"];
    $c = $_POST["txtKursus"];
    $d = $_POST["txtTanggal"];
    $e = $_POST["txtWaktu"];

    //Panggil function atau method
    $status = $pk->tambahKursus($a, $b, $c, $d, $e);
    if($status==true)
        header("Location:../../frontend/admin/view-dashboard.php");
    else 
        echo "Gagal Menambahkan Data.";
?>