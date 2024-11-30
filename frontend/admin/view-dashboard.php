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

            function adminPage() {
                window.location.href = "../../frontend/admin/view-tampil-kursus.php"
            }
        </script>
    </head>

    <body>
        <h1>Selamat Datang, <?php echo htmlspecialchars($_SESSION['admin_name']); ?>!</h1>
        <p>Disini akan dilakukan : Tambah kursus, ubah jadwal kursus, hapus kursus, kelola jadwal. ( CRUD Jadwal )</p>
        <!-- <a href="../../backend/admin/logout.php">Logout</a> -->
        <button onclick="adminPage()">KELOLA JADWAL</button>
        <button onclick="logoutPage()">LOGOUT</button>
    </body>

    </html>
