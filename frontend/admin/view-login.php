<?php
    session_start();
?>
    <html>

    <head>
        <title>Admin Login</title>
        <!-- <link rel="stylesheet" href="view-login.css"> -->
        <link rel="icon" href="../../assets/favicon-logo.png" type="image/png">
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: Arial, sans-serif;
                background-color: #F1F0E8;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }

            form {
                background-color: white;
                border: 2px solid #E5E1DA;
                border-radius: 10px;
                padding: 30px 40px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                width: 320px;
            }

            form h1 {
                font-size: 24px;
                font-weight: bold;
                margin-bottom: 20px;
                text-align: center;
                color: #1b1b1b;
            }

            form input[type="text"],
            form input[type="password"] {
                width: 100%;
                padding: 10px;
                margin: 10px 0;
                border: 1px solid #C4C4C4;
                border-radius: 5px;
                font-size: 14px;
                background-color: #FFFFFF;
                color: #1b1b1b;
            }

            form input[type="submit"] {
                background-color: #89A8B2;
                color: #FFFFFF;
                border: none;
                padding: 12px 20px;
                border-radius: 5px;
                font-size: 16px;
                cursor: pointer;
                margin-top: 20px;
                width: 100%;
                transition: background-color 0.3s ease;
            }

            form input[type="submit"]:hover {
                background-color: #6D8A96;
            }
        </style>
    </head>

    <body>
        <form method="post" action="../../backend/admin/login-proses.php">
            ID
            <input type="text" name="idAdmin" required>
            <br><br>

            Username
            <input type="text" name="namaAdmin" required>
            <br><br>

            Password
            <input type="password" name="passwordAdmin" required>
            <br><br>

            <!-- SUBMIT BUTTON -->
            <input type="submit" value="Submit">
        </form>
    </body>

    </html>
