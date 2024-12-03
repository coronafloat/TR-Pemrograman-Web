<?php

class Instruktur
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

    //verification update method
    public function update($idJadwalKursus)
    {
        $query = $this->db->prepare(
            "UPDATE jadwal_kursus_user 
            SET status = 'aktif' 
            WHERE idJadwalKursus = :idJadwalKursus AND status = 'request'"
        );

        // Bind parameter
        $query->bindParam(":idJadwalKursus", $idJadwalKursus);

        if ($query->execute()) {
            return true; // Berhasil diupdate
        } else {
            return false; // Gagal diupdate
        }
    }
}
