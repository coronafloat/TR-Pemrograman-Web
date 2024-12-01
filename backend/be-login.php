<?php
class admin
{
    public $host = "127.0.0.1";
    public $name = "dbkursus";
    public $user = "root";
    public $pass = "";

    public $db;

    // Constructor
    public function __construct()
    {
        $this->db = new PDO(
            "mysql:host={$this->host};
                dbname = {$this->name}",
            $this->user,
            $this->pass
        );
    }

    public function loginLogic($adminId, $adminName, $adminPassword)
    {

        try {
            // Query untuk mendapatkan data admin berdasarkan id, nama, dan password
            $query = "SELECT * FROM admin_profiles WHERE id = :id AND nama = :nama AND password = :password";
            $stmt = $this->db->prepare($query);

            // Bind parameter
            $stmt->bindParam(':id', $adminId);
            $stmt->bindParam(':nama', $adminName);
            $stmt->bindParam(':password', $adminPassword);

            $stmt->execute();

            // Cek apakah data ditemukan
            if ($stmt->rowCount() > 0) {
                // Jika validasi berhasil, arahkan ke halaman admin
                header("Location: ../frontend/dashboard.php");
                exit();
            } else {
                // Jika gagal, tampilkan pesan error
                echo "ID, Nama, atau Password salah!";
            }
        } catch (PDOException $error) {
            die("Error : " . $error->getMessage());
        }
    }
}
