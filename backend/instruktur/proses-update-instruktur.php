<<<<<<< HEAD
<html>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body></body>
</html>


=======
>>>>>>> 05c981b3022da70c60e83c9958f4894eafa445f2
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
<<<<<<< HEAD
    echo"<script>
            Swal.fire({
                    title: 'Berhasil!',
                    text: 'Verifikasi telah dilakukan',
                    icon: 'success',
                    confirmButtonColor: '#000000'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../../frontend/instruktur/view-update-instruktur.php';
                }
            });
        </script>";
=======
    echo "<script>alert('Berhasil di Aktifkan!');
                window.location.href = '../../frontend/instruktur/view-update-instruktur.php';
            </script>";
>>>>>>> 05c981b3022da70c60e83c9958f4894eafa445f2
} else {
    echo "<script>alert('Jadwal Kursus gagal di Aktifkan!');</script>";
}
