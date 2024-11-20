<?php
session_start();

if (!isset($_SESSION["admin-logged-in"]) || $_SESSION["admin-logged-in"] == true) {
    header("Location: ../../frontend/admin/view-login.php");
}

?>

<html>

<head>
    <title>Dashboard Admin</title>
</head>

<body>
    <h1>Selamat datang, <?php echo htmlspecialchars($_SESSION['admin_name']); ?>!</h1>
    <p>disini akan dilakukan CRUD JADWAL sesuai dengan perintah TR</p>
    <a href="../../backend/admin/logout.php">Logout</a>
</body>

</html>