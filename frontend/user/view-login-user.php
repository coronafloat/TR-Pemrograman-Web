<?php
session_start();
?>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <h1>Login User</h1>
    <form method="post" action="../../backend/user/proses-login-user.php">
        ID
        <input type="text" name="idUser" required>
        <br><br>

        Nama
        <input type="text" name="nama" required>
        <br><br>

        Password
        <input type="password" name="password" required>
        <br><br>

        <a href="view-signup-user.php">dont have an account?</a>

        <!-- SUBMIT BUTTON -->
        <input type="submit" value="Submit">
    </form>
</body>

</html>