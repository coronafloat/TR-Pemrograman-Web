<?php
    class Admin {
        public $host = "127.0.0.1";
        public $name = "dbkursus_user";
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
                $query = "SELECT * FROM admin_profiles WHERE idAdmin = :idAdmin AND nama = :nama AND password= :password";
                $stmt = $this->db->prepare($query);

                // Bind parameter
                $stmt->bindParam(':idAdmin', $adminId);
                $stmt->bindParam(':nama', $adminName);
                $stmt->bindParam(':password', $adminPassword);

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
                $query = $this->db->prepare("SELECT * FROM jadwal_kursus_user WHERE namaKursus LIKE :kategori");
                $query->bindParam(':kategori', $kategori);
            } else {
                $query = $this->db->prepare("SELECT * FROM jadwal_kursus_user");
            }
            
            $query->execute();
            
            $data = $query->fetchAll();
            return $data;
        }

        //INSERT
        public function tambahKursus($a, $b, $c, $d, $e) {
            try {
                // Masukkan data ke tabel tbjadwalkursus
                $query = $this->db->prepare("INSERT INTO jadwal_kursus_user (idJadwalKursus, namaUser, namaKursus, tanggal, waktu) VALUES(:idJadwalKursus, :namaUser, :namaKursus, :tanggal, :waktu)");
                $query->bindParam(":idJadwalKursus", $a);
                $query->bindParam(":namaUser", $b);
                $query->bindParam(":namaKursus", $c);
                $query->bindParam(":tanggal", $d);
                $query->bindParam(":waktu", $e);

                if ($query->execute()) {
                    // Jika kursus adalah 'Mobil', pindahkan data ke tabel tbmobil
                    if ($b == 'Mobil') {
                        $sql_transfer = "INSERT INTO tbmobil (idJadwalKursus, namaUser, namaKursus, tanggal, waktu) SELECT idJadwalKursus, namaUser, namaKursus, tanggal, waktu
                                        FROM jadwal_kursus_user WHERE namaKursus = 'Mobil'";
                        $transfer_query = $this->db->prepare($sql_transfer);
                        $transfer_query->execute();
                    }

                    // Jika kursus adalah 'Motor', pindahkan data ke tabel tbmotor
                    if ($b == 'Motor') {
                        $sql_transfer = "INSERT INTO tbmotor (idJadwalKursus, namaUser, namaKursus, tanggal, waktu) SELECT idJadwalKursus, namaUser, namaKursus, tanggal, waktu
                                        FROM jadwal_kursus_user WHERE namaKursus = 'Motor'";
                        $transfer_query = $this->db->prepare($sql_transfer);
                        $transfer_query->execute();
                    }

                    return true;
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            }
        }

        //UPDATE
        /*Proses update melibatkan 2 Query
            1. Select + Where id yang akan diupdate
            2. Update
        */
        public function tampilkanKursusByID($id){
            $query = $this->db->prepare("SELECT * FROM jadwal_kursus_user WHERE idJadwalKursus=:idJadwalKursus");
            $query->bindParam(":idJadwalKursus",$id);
            $query->execute();

            $data=$query->fetchAll();
            return $data;
        }

        public function ubahKursus($a,$b,$c,$d,$e){
            $query = $this->db->prepare("UPDATE jadwal_kursus_user SET namaUser=:namaUser,namaKursus=:namaKursus,tanggal=:tanggal,waktu=:waktu WHERE idJadwalKursus=:idJadwalKursus");
            $query->bindParam(":idJadwalKursus",$a);
            $query->bindParam(":namaUser",$b);
            $query->bindParam(":namaKursus",$c);
            $query->bindParam(":tanggal",$d);
            $query->bindParam(":waktu",$e);

            if($query->execute()) return true;
            else return false;
        }

        //DELETE
        public function hapusKursus($id){
            $query = $this->db->prepare("DELETE FROM jadwal_kursus_user where idJadwalKursus=:idJadwalKursus");
            $query->bindParam(":idJadwalKursus",$id);

            if($query->execute()) return true;
            else return false;
        }
    }
?>
