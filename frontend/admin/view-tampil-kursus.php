<html>
    <body>
        <script>
            function tambahData() {
                window.location.href = "../../frontend/admin/view-tambah-kursus.php"
            }
        </script>
        <?php
            include "../../backend/admin/be-admin.php";

            //Membuat Objek
            //Konstruktor otomatis terpanggil
            //Isi konstruktor = string connection
            $pk = new Admin();

            //Memanggil method
            $dtk = $pk->tampilkanKursus();

            //Buat table
            echo "<table border='1'>";
            echo "<tr> <th>ID</th> <th>NAMA</th> <th>KURSUS</th> <th>TANGGAL</th> <th>WAKTU</th> <th>STATUS</th> <th>ACTION</th> </tr>";
            
            //Unboxing array
            foreach ($dtk as $d) {
                echo "<tr>";
                    echo "<td>" .$d["id"]. "</td>";
                    echo "<td>" .$d["nama_user"]. "</td>";
                    echo "<td>" .$d["nama_kursus"]. "</td>";
                    echo "<td>" .$d["tanggal"]. "</td>";
                    echo "<td>" .$d["waktu"]. "</td>";
                    echo "<td>" .$d["status"]. "</td>";
                    echo "<td>";
                        echo "<a href='../../frontend/admin/view-edit-kursus.php?id=".$d["id"]."'>Ubah</a>";
                        echo " | <a href='../../backend/admin/proses-hapus-kursus.php?id=".$d["id"]."'>Hapus</a>";
                    echo "</td>";
                echo "</tr>";
            }
            echo "</table><br>";
        ?>
        <button onclick="tambahData()">Tambah</button>
    </body>
</html>
