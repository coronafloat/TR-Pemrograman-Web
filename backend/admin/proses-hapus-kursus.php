<?php
    include "be-admin.php";

    //Membuat Objek
    $pk = new Admin();

    $id = $_GET["id"];

    $status = $pk->hapusData($id);

    if($status==true)
        header("Location:../../frontend/admin/view-tampil-kursus.php");
    else 
        echo "Gagal Menghapus Data.";
?>
