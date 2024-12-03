<?php
include "kelas-instruktur.php";

//instance
$update = new Instruktur();

//unboxing-set parameter
// $status = $_GET["status"];
$idJadwalKursus = $_GET["idJadwalKursus"];

// Call method
$statusMethod = $update->update($idJadwalKursus);

if ($statusMethod == true) {
    echo "<script>alert('Berhasil di Aktifkan!');
                window.location.href = '../../frontend/instruktur/view-update-instruktur.php';
            </script>";
} else {
    echo "<script>alert('Jadwal Kursus gagal di Aktifkan!');</script>";
}
