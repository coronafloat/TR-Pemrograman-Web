<?php

?>
<html>

<head>
    <title>Sign up</title>
</head>

<body>
    <h1>SIGN UP USER</h1>
    <form method="post" action="../../backend/user/proses-signup-user.php">
        ID
        <input type="text" name="idUser" required>
        <br><br>

        Nama
        <input type="text" name="nama" required>
        <br><br>

        Password
        <input type="password" name="password" required>
        <br><br>

        <!-- SUBMIT BUTTON -->
        <input type="submit" value="Submit">
    </form>
</body>

</html>