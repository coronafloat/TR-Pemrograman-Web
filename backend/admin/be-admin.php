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
                $query = "SELECT * FROM tbadmin WHERE id = :id AND nama = :nama AND password = :password";
                $stmt = $this->db->prepare($query);

                // Bind parameter
                $stmt->bindParam(':id', $adminId);
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
        public function tampilkanKursus(){
            //Query SQL
            $query = $this->db->prepare("SELECT * FROM tbjadwalkursus");

            //Menjalankan Query
            $query->execute();

            //Meletakkan hasil Query ke Array
            $data = $query->fetchAll();
            return $data;
        }

        //INSERT
        public function tambahKursus($a,$b,$c,$d,$e){
            $query=$this->db->prepare("INSERT INTO tbjadwalkursus (nama_user,nama_kursus,tanggal,waktu,status) VALUES(:nama_user,:nama_kursus,:tanggal,:waktu,:status)");
            $query->bindParam(":nama_user",$a);
            $query->bindParam(":nama_kursus",$b);
            $query->bindParam(":tanggal",$c);
            $query->bindParam(":waktu",$d);
            $query->bindParam(":status",$e);

            if($query->execute()) return true;
            else return false;
        }

        //UPDATE
        /*Proses update melibatkan 2 Query
            1. Select + Where id yang akan diupdate
            2. Update
        */
        public function tampilkanKursusByID($id){
            $query = $this->db->prepare("SELECT * FROM tbjadwalkursus WHERE id=:id");
            $query->bindParam(":id",$id);
            $query->execute();

            $data=$query->fetchAll();
            return $data;
        }

        public function ubahKursus($a,$b,$c,$d,$e,$f){
            $query = $this->db->prepare("UPDATE tbjadwalkursus SET nama_user=:nama_user,nama_kursus=:nama_kursus,tanggal=:tanggal,waktu=:waktu,status=:status WHERE id=:id");
            $query->bindParam(":id",$a);
            $query->bindParam(":nama_user",$b);
            $query->bindParam(":nama_kursus",$c);
            $query->bindParam(":tanggal",$d);
            $query->bindParam(":waktu",$e);
            $query->bindParam(":status",$f);

            if($query->execute()) return true;
            else return false;
        }

        //DELETE
        public function hapusKursus($id){
            $query = $this->db->prepare("DELETE FROM tbjadwalkursus where id=:id");
            $query->bindParam(":id",$id);

            if($query->execute()) return true;
            else return false;
        }
    }
?>
