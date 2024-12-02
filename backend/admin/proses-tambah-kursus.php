<?php
    include "be-admin.php";

    //Membuat Objek
    $pk = new Admin();

    //Unboxing - set parameter
    $a = $_POST["txtNama"];
    $b = $_POST["txtKursus"];
    $c = $_POST["txtTanggal"];
    $d = $_POST["txtWaktu"];

    //Panggil function atau method
    $status = $pk->tambahKursus($a, $b, $c, $d);
    if($status==true)
        header("Location:../../frontend/admin/view-dashboard.php");
    else 
        echo "Gagal Menambahkan Data.";
?>
