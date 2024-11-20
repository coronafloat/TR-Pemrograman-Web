<?php
session_start();

if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] == false) {
    header("Location: ../../frontend/admin/view-login.php");
}

?>

<html>

<head>
    <title>Dashboard Admin</title>
    <script>
        function logoutPage() {
            window.location.href = "../../backend/admin/logout.php";
        }
    </script>
</head>

<body>
    <h1>Selamat datang, <?php echo htmlspecialchars($_SESSION['admin_name']); ?>!</h1>
    <p>disini akan dilakukan CRUD JADWAL sesuai dengan perintah TR</p>
    <!-- <a href="../../backend/admin/logout.php">Logout</a> -->
    <button onclick="logoutPage()">LOGOUT</button>
</body>

</html>