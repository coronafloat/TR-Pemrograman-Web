<?php
    include "be-admin.php";

    //Membuat Objek
    $pk = new Admin();

    //Unboxing - set parameter
    $a = $_POST["txtNama"];
    $b = $_POST["txtKursus"];
    $c = $_POST["txtTanggal"];
    $d = $_POST["txtWaktu"];
    $e = $_POST["radStatus"];

    //Panggil function atau method
    $status = $pk->tambahKursus($a, $b, $c, $d, $e);
    if($status==true)
        header("Location:../../frontend/admin/view-tampil-kursus.php");
    else 
        echo "Gagal Menambahkan Data.";
?>
