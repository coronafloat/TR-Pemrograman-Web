<?php
    include "be-admin.php";

    //Membuat Objek
    $pk = new Admin();

    //Unboxing data + set parameter
    $a = $_POST["txtId"];
    $b = $_POST["txtNama"];
    $c = $_POST["txtKursus"];
    $d = $_POST["txtTanggal"];
    $e = $_POST["txtWaktu"];
    $f = $_POST["radStatus"];

    //Memanggil method
    $status = $pk->ubahData($a, $b, $c, $d, $e, $f);
    if($status==true)
        header("Location:../../frontend/admin/view-tampil-kursus.php");
    else 
        echo "Gagal Mengubah Data.";
?>
