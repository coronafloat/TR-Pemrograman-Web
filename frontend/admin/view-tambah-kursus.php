<html>
    <head></head>
    <body>
        <form method="post" action="../../backend/admin/proses-tambah-kursus.php">
            Nama  <input type="text" name="txtNama"><br><br>
            Kursus <input type="text" name="txtKursus"><br><br>
            Tanggal <input type="date" name="txtTanggal"><br><br>
            Waktu <input type="time" name="txtWaktu"><br><br>
            Status 
            <input type="radio" name="radStatus" value="Aktif">Aktif
            <input type="radio" name="radStatus" value="Tidak Aktif">Tidak Aktif
            <br><br>

            <input type="submit" value="Simpan">
        </form>
    </body>
</html>
