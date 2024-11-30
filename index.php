<?php

?>

<html>

<head>
    <title>Halaman Awal</title>

    <script>
        function adminPage() {
            window.location.href = "frontend/admin/view-login.php";
        }

        function userPage() {
            window.location.href = "frontend/user/view-main-user.php";

        }
    </script>
</head>

<body>
    <h3>Ini adalah halaman Awal</h3>
    <h1>Selamat Datang di Kursus Mobil blablabla</h1>
    <h4>Pilih Role Anda</h4>
    <button onclick="adminPage()">ADMIN</button>
    <button onclick="userPage()">USER</button>
</body>

</html>
