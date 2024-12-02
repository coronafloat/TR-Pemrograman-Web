<?php

?>

<html>

<head>
    <title>ProRider Role</title>
    <!-- <link rel="stylesheet" href="main.css"> -->
    <link rel="icon" href="../../assets/favicon-logo.png" type="image/png">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #F1F0E8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            background: white;
            border: 2px solid #E5E1DA;
            padding: 20px 40px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .title {
            font-size: 2rem;
            color: #1b1b1b;
            margin-bottom: 0.5rem;
        }

        .subtitle {
            font-size: 1.2rem;
            color: #1b1b1b;
            margin-bottom: 1.5rem;
        }

        .button-group {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .btn {
            padding: 10px 20px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .admin-btn {
            background-color: #89A8B2;
            color: white;
        }

        .user-btn {
            background-color: #3E4143;
            color: white;
        }

        .btn:hover {
            transform: scale(1.05);
        }

        .admin-btn:hover {
            background-color: #6D8A96;
        }

        .user-btn:hover {
            background-color: #5A5C5E;
        }
    </style>

    <script>
        function adminPage() {
            window.location.href = "../admin/view-login.php";
        }

        function userPage() {
            window.location.href = "../user/view-main-user.php";

        }
    </script>
</head>

<body>
    <div class="container">
        <h1 class="title">Selamat Datang di ProRider</h1>
        <h3 class="subtitle">Pilih Role Anda</h3>
        <div class="button-group">
            <button onclick="adminPage()" class="btn admin-btn">ADMIN</button>
            <button onclick="userPage()" class="btn user-btn">USER</button>
        </div>
    </div>
</body>

</html>
