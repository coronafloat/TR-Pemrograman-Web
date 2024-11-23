<html>
    <head></head>
    <body>
        <?php
            include "../../backend/admin/be-admin.php";

            //Membuat objek
            $pk = new Admin();

            //Unboxing id dari link Ubah
            $id = $_GET["id"];
            
            //Memanggil method Select + Where
            $dtk = $pk->tampilkanDataByID($id);

            echo "<form method='post' action='../../backend/admin/proses-edit-kursus.php'>";
            //Unboxing dengan data yang disajikan didalam form
            foreach($dtk as $d) {
                echo "ID : ".$d["id"];
                echo "<input type='hidden' name='txtId' value='".$d["id"]."'>";
                echo "<br><br>";

                echo "Nama ";
                echo "<input type='text' name='txtNama' value='".$d["nama_user"]."'>";
                echo "<br><br>";

                echo "Kursus ";
                echo "<input type='text' name='txtKursus' value='".$d["nama_kursus"]."'>";
                echo "<br><br>";

                echo "Tanggal ";
                echo "<input type='text' name='txtTanggal' value='".$d["tanggal"]."'>";
                echo "<br><br>";

                echo "Waktu ";
                echo "<input type='text' name='txtWaktu' value='".$d["waktu"]."'>";
                echo "<br><br>";

                if($d["status"] == "Aktif"){
                    echo "Status";
                    echo "<input type='radio' name='radStatus' value='Aktif' checked>Aktif";
                    echo "<input type='radio' name='radStatus' value='Tidak Aktif'>Tidak Aktif";
                } else {
                    echo "<input type='radio' name='radStatus' value='Aktif'>Aktif";
                    echo "<input type='radio' name='radStatus' value='Tidak Aktif' checked>Tidak Aktif";
                }
                echo "<br><br>";
                echo "<input type='submit' value='Ubah'>";  
            }
            echo "</form>";
        ?>     
    </body>
</html>
