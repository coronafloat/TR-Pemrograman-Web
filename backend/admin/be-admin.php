<?php
    class Admin {
        public $host = "127.0.0.1";
        public $name = "dbkursus";
        public $user = "root";
        public $pass = "";

        public $db;

        // Constructor
        public function __construct()
        {
            $this->db = new PDO(
                "mysql:host={$this->host};dbname={$this->name}",
                $this->user,
                $this->pass
            );
        }

        //LOGIN LOGIC
        public function loginLogic($adminId, $adminName, $adminPassword)
        {
            try {
                // Query untuk mendapatkan data admin berdasarkan id, nama, dan password
                $query = "SELECT * FROM tbadmin WHERE idAdmin = :idAdmin AND namaAdmin = :namaAdmin AND passwordAdmin = :passwordAdmin";
                $stmt = $this->db->prepare($query);

                // Bind parameter
                $stmt->bindParam(':idAdmin', $adminId);
                $stmt->bindParam(':namaAdmin', $adminName);
                $stmt->bindParam(':passwordAdmin', $adminPassword);

                // Jalankan query
                $stmt->execute();

                // Ambil data
                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                // Jika ada data yang ditemukan
                if ($result) {
                    return true; // Login berhasil
                } else {
                    return false; // Login gagal
                }
            } catch (PDOException $error) {
                die("Error: " . $error->getMessage());
            }
        }
        
        //SELECT
        //Method
        public function tampilkanKursus($kategori = '') {
            if ($kategori) {
                $query = $this->db->prepare("SELECT * FROM tbjadwalkursus WHERE kursus LIKE :kategori");
                $query->bindParam(':kategori', $kategori);
            } else {
                $query = $this->db->prepare("SELECT * FROM tbjadwalkursus");
            }
            
            $query->execute();
            
            $data = $query->fetchAll();
            return $data;
        }

        //INSERT
        public function tambahKursus($a,$b,$c,$d){
            $query=$this->db->prepare("INSERT INTO tbjadwalkursus (namaUser,kursus,tanggal,waktu) VALUES(:namaUser,:kursus,:tanggal,:waktu)");
            $query->bindParam(":namaUser",$a);
            $query->bindParam(":kursus",$b);
            $query->bindParam(":tanggal",$c);
            $query->bindParam(":waktu",$d);

            if($query->execute()) return true;
            else return false;
        }

        //UPDATE
        /*Proses update melibatkan 2 Query
            1. Select + Where id yang akan diupdate
            2. Update
        */
        public function tampilkanKursusByID($id){
            $query = $this->db->prepare("SELECT * FROM tbjadwalkursus WHERE idJadwal=:idJadwal");
            $query->bindParam(":idJadwal",$id);
            $query->execute();

            $data=$query->fetchAll();
            return $data;
        }

        public function ubahKursus($a,$b,$c,$d,$e){
            $query = $this->db->prepare("UPDATE tbjadwalkursus SET namaUser=:namaUser,kursus=:kursus,tanggal=:tanggal,waktu=:waktu WHERE idJadwal=:idJadwal");
            $query->bindParam(":idJadwal",$a);
            $query->bindParam(":namaUser",$b);
            $query->bindParam(":kursus",$c);
            $query->bindParam(":tanggal",$d);
            $query->bindParam(":waktu",$e);

            if($query->execute()) return true;
            else return false;
        }

        //DELETE
        public function hapusKursus($id){
            $query = $this->db->prepare("DELETE FROM tbjadwalkursus where idJadwal=:idJadwal");
            $query->bindParam(":idJadwal",$id);

            if($query->execute()) return true;
            else return false;
        }
    }
?>
