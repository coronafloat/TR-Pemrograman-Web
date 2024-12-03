<?php

session_start();
?>
<html>

<head>
    <title>Sign Up</title>
    <!-- Menambahkan Favicon -->
    <link rel="icon" href="../../assets/favicon-logo.png" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        function loginPage() {
            window.location.href = "../../frontend/user/view-login-user.php";
        }
    </script>
</head>

<body class="flex flex-col h-screen justify-between bg-[#F1F0E8]">

    <!-- NAVBAR -->
    <nav class="bg-white shadow-md py-2 sticky top-0">
        <div class="max-w-screen-xl mx-auto px-6 flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center">
                <img src="../../assets/logo-prorider.png" alt="Logo" class="h-12">
            </div>

            <!-- Menu -->
            <div class="md:flex items-center space-x-6">
                <a href="../../index.php" class="text-gray-700 font-medium hover:text-[#89A8B2]">Home</a>
                <a href="about-us.php" class="text-gray-700 font-medium hover:text-[#89A8B2]">About</a>
                <a href="#" onclick="window.open('https://wa.me/6287724061150?text=Hi, Saya ingin menghubungi Anda!', '_blank')" class="text-gray-700 font-medium hover:text-[#89A8B2]">Contact Us</a>
                <!-- Button Login -->
                <button onclick="loginPage()" class="flex items-center border-2 border-black bg-white text-black font-medium rounded-lg px-4 py-2 hover:bg-[#E3E7EA] transition duration-300">
                    Log in
                </button>
            </div>
        </div>
    </nav>
    <!-- End of NAVBAR -->

    <!-- SIGN UP FORM -->
    <div class="flex items-center justify-center flex-grow">
        <div class="bg-white rounded-lg shadow-md p-8 w-96">
            <h1 class="text-2xl font-semibold text-center mb-6">Sign Up User</h1>
            <form method="post" action="../../backend/user/proses-signup-user.php">
                <!-- <div class="mb-4">
                    <label class="block text-gray-700" for="idUser">ID</label>
                    <input type="text" name="idUser" id="idUser" required class="mt-1 p-2 border border-gray-300 rounded w-full">
                </div> -->

                <div class="mb-4">
                    <label class="block text-gray-700" for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" required class="mt-1 p-2 border border-gray-300 rounded w-full">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700" for="password">Password</label>
                    <input type="password" name="password" id="password" required class="mt-1 p-2 border border-gray-300 rounded w-full">
                </div>

                <!-- SUBMIT BUTTON -->
                <button onclick="loginPage()" type="submit" class="w-full bg-black text-white font-semibold py-2 rounded-lg hover:bg-[#3E4143] transition duration-200 mt-4">
                    Submit
                </button>
            </form>
        </div>
    </div>
    <!-- End of SIGN UP FORM -->

    <!-- Footer -->
    <footer class="bg-white fixed bottom-0 left-0 right-0">
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <div class="flex justify-center text-teal-600 sm:justify-start">
                    <img src="../../assets/logo-prorider.png" alt="Logo ProRider" class="h-12">
                </div>
                <p class="mt-4 text-center text-sm text-black lg:mt-0 lg:text-right">
                    Copyright &copy; 2024. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->
</body>

</html>