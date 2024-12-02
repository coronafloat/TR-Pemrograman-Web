<?php

class User
{

    // Atribut untuk config database
    public $host = "127.0.0.1";
    public $name = "dbkursus";
    public $user = "root";
    public $pass = "";

    public $db;

    //Konstruktor
    //Method yang otomatis terpanggil ketika objek dibuat atau di instance
    public function __construct()
    {
        //menggabungkan string menjadi string connection ke db
        $this->db = new PDO(
            "mysql:host={$this->host};
            dbname={$this->name}",
            $this->user,
            $this->pass

        );
    }

    //LOGIN LOGIC
    public function loginLogic($idUser, $nama, $password)
    {
        try {
            // Query untuk mendapatkan data admin berdasarkan id, nama, dan password
            $query = "SELECT * FROM user_profiles WHERE idUser = :idUser AND nama = :nama AND password = :password";
            $stmt = $this->db->prepare($query);

            // Bind parameter
            $stmt->bindParam(':idUser', $idUser);
            $stmt->bindParam(':nama', $nama);
            $stmt->bindParam(':password', $password);

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
    // End of LOGIN LOGIC

    // SignUp Logic
    public function signUpLogic($idUser, $nama, $password)
    {
        try {
            // Mengecek apakah ID pengguna sudah ada
            $queryCheck = "SELECT * FROM user_profiles WHERE idUser = :idUser";
            $stmtCheck = $this->db->prepare($queryCheck);
            $stmtCheck->bindParam(':idUser', $idUser);
            $stmtCheck->execute();

            if ($stmtCheck->rowCount() > 0) {
                // ID sudah digunakan, tampilkan alert dan redirect
                echo "<script>alert('ID pengguna sudah terdaftar.'); window.location.href='../../frontend/user/view-signup-user.php';</script>";
                return;
            }

            // Query untuk menambahkan data pengguna baru
            $queryInsert = "INSERT INTO user_profiles (idUser, nama, password) VALUES (:idUser, :nama, :password)";
            $stmtInsert = $this->db->prepare($queryInsert);

            // Bind parameter
            $stmtInsert->bindParam(':idUser', $idUser);
            $stmtInsert->bindParam(':nama', $nama);
            $stmtInsert->bindParam(':password', $password);  // Menyimpan password dalam plaintext

            // Eksekusi query untuk insert data
            $stmtInsert->execute();

            // Setelah pendaftaran berhasil, beri tahu user dan arahkan mereka ke halaman login
            echo "<script>
                        alert('Pendaftaran berhasil. Silakan login.'); 
                        window.location.href='../../frontend/user/view-login-user.php';
                    </script>";
        } catch (PDOException $error) {
            die("Error: " . $error->getMessage());
        }
    }
    // End of SIGN UP LOGIC

    //Read Jadwal Tersedia
    public function jadwalReady()
    {
        //query SQL
        $query = $this->db->prepare("SELECT * FROM jadwal_ready");

        //menjalankan Query
        $query->execute();

        //meletakkan hasil query ke array
        $data = $query->fetchAll();

        return $data;
    }
    //End of Read Jadwal Tersedia

    // Pesan Kursus (CREATE)
    public function pesanKursus($idUser, $namaKursus, $namaUser, $tanggal, $waktu, $status)
    {
        $query = $this->db->prepare(
            "INSERT INTO jadwal_kursus_user(idUser, namaKursus, namaUser, tanggal, waktu, status)
            values(:idUser, :namaKursus, :namaUser, :tanggal, :waktu, :status)
            "
        );

        $query->bindParam(":idUser", $idUser);
        $query->bindParam(":namaKursus", $namaKursus);
        $query->bindParam(":namaUser", $namaUser);
        $query->bindParam(":tanggal", $tanggal);
        $query->bindParam(":waktu", $waktu);
        $query->bindParam(":status", $status);

        if ($query->execute()) {
            # code...
            return true;
        } else {
            return false;
        }
    }
    // End of Pesan Kursus (CREATE)

    // TAMPIL DATA
    public function tampilData($idUser)
    {
        $query = $this->db->prepare(
            "SELECT * FROM jadwal_kursus_user WHERE idUser=:idUser"
        );
        $query->bindParam(":idUser", $idUser);
        $query->execute();

        $data = $query->fetchAll();
        return $data;
    }
    // End of TAMPIL DATA
}
