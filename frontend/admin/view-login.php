<?php
    session_start();
?>
    <html>

    <head>
        <title>Login</title>
    </head>

    <body>
        <form method="post" action="../../backend/admin/login-proses.php">
            ID
            <input type="text" name="id" required>
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
