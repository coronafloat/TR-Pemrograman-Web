<?php
include "kelas-user.php";

//INSTANCE
$user = new User();

//UNBOXING - SET PARAMETER
$idProses = $_POST["idUser"];
$namaProses = $_POST["nama"];
$passwordProses = $_POST["password"];

//CALL METHOD
$status = $user->signUpLogic($idProses, $namaProses, $passwordProses);
