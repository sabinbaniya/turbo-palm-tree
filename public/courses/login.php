<?php
session_start();
if (isset($_SESSION["loggedin"])) {
    header("Location: ./index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login | Pixel IT Magic Solution Courses</title>
    <link rel="stylesheet" href="../assets/styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="../assets/js/login.js" defer></script>
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex space-y-8 flex-col justify-center items-center ">
        <h3 class="text-3xl font-bold text-gray-700">Login to your account</h3>
        <p class="text-gray-800">Don't have an account? <a href="./signup.php" class="underline underline-offset-2">Sign Up</a> here.</p>
        <form action="../../controllers/auth/login.php" method="POST" class="bg-white p-8 space-y-8 rounded-lg w-80" id="login_form">
            <div class="flex flex-col-reverse relative">
                <i class="fa-solid fa-at absolute top-8 left-3 text-gray-600" id="username_icon"></i>
                <span class="text-red-500 hidden text-xs absolute -bottom-4 left-0 w-96" id="username_error"></span>
                <input autocomplete="username" type="text" name="username" id="username" class="peer mt-4 border-2 border-gray-200 px-4 pl-8 py-2 h-12 rounded-lg" />
                <label for="username" class="peer-focus:text-lg transition-all block text-md text-gray-700 absolute -top-[10px]">Username</label>
            </div>
            <div class="flex flex-col-reverse relative" style="margin-bottom: 60px;">
                <i class="fa-solid fa-lock absolute top-8 left-3 text-gray-600" id="password_icon"></i>
                <span class="text-red-500 hidden text-xs absolute -bottom-12 left-0 " id="password_error"></span>
                <input autocomplete="current-password" type="password" name="password" id="password" class="peer mt-4 border-2 border-gray-200 px-4 pl-8 py-2 h-12 rounded-lg" />
                <label for="password" class="peer-focus:text-lg transition-all block text-md text-gray-700 absolute -top-[10px]">Password</label>
            </div>
            <div>
                <input name="login" type="submit" value="Log In" class="cursor-pointer w-full  bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-400">
            </div>
        </form>

    </div>
</body>

</html>