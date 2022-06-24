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
    <title>User Signup | Pixel IT Magic Solution Courses</title>
    <link rel="stylesheet" href="../assets/styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="../assets/js/signup.js" defer></script>
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex space-y-8 flex-col justify-center items-center ">
        <h3 class="text-3xl font-bold text-gray-700">Create a new account</h3>
        <p class="text-gray-800">Already have an account? <a href="./login.php" class="underline underline-offset-2">Log In</a> here.</p>
        <form action="./authenticate.php" method="POST" class="bg-white p-8 space-y-8 rounded-lg" id="signup_form">
            <div class="flex flex-col sm:flex-row justify-between sm:space-x-4 space-y-6 sm:space-y-0">
                <div class="flex flex-col-reverse relative">
                    <i class="fa-solid fa-user absolute top-8 left-3 text-gray-600" id="name_icon"></i>
                    <span class="text-red-500 hidden text-xs absolute -bottom-4 left-0 w-96" id="name_error"></span>
                    <input autocomplete="name" type="text" name="name" id="name" class="peer mt-4 border-2 border-gray-200 px-4 pl-8 py-2 h-12 rounded-lg  w-56" />
                    <label for="name" class="peer-focus:text-lg transition-all block text-md text-gray-700 absolute -top-[10px]">Name</label>
                </div>
                <div class="flex flex-col-reverse relative ">
                    <i class="fa-solid fa-envelope absolute top-8 left-3 text-gray-600" id="email_icon"></i>
                    <span class="text-red-500 hidden text-xs absolute -bottom-4 left-0 w-96" id="email_error"></span>
                    <input autocomplete="Email" type="email" name="Email" id="email" class="peer mt-4 border-2 border-gray-200 px-4 pl-8 py-2 h-12 rounded-lg  w-56" />
                    <label for="Email" class="peer-focus:text-lg transition-all block text-md text-gray-700 absolute -top-[10px]">Email</label>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row justify-between sm:space-x-4 space-y-6 sm:space-y-0">
                <div class="flex flex-col-reverse relative">
                    <i class="fa-solid fa-mobile-screen-button absolute top-8 left-3 valid_input_icon" id="number_icon"></i>
                    <span class="text-red-500 hidden text-xs absolute -bottom-4 left-0 w-96" id="number_error"></span>
                    <input autocomplete="number" type="tel" name="number" id="number" class="peer mt-4 border-2 border-gray-200 pl-8 px-4 py-2 h-12 rounded-lg  w-56" />
                    <label for="number" class="peer-focus:text-lg transition-all block text-md text-gray-700 absolute -top-[10px]">Phone number</label>
                </div>
                <div class="flex flex-col-reverse relative">
                    <i class="fa-solid fa-at absolute top-8 left-3 valid_input_icon" id="username_icon"></i>
                    <span class="text-red-500 hidden text-xs absolute -bottom-4 left-0 w-96" id="username_error"></span>
                    <input autocomplete="username" type="text" name="username" id="username" class="peer mt-4 border-2 border-gray-200 pl-8 px-4 py-2 h-12 rounded-lg  w-56" />
                    <label for="username" class="peer-focus:text-lg transition-all block text-md text-gray-700 absolute -top-[10px]">Username</label>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row justify-between sm:space-x-4 space-y-6 sm:space-y-0">
                <div class="flex flex-col-reverse relative">
                    <i class="fa-solid fa-calendar absolute top-8 left-3 valid_input_icon" id="birth-date_icon"></i>
                    <span class="text-red-500 hidden text-xs absolute -bottom-4 left-0 w-96" id="birth-date_error"></span>
                    <input autocomplete="off" type="date" name="birth-date" id="birth-date" class="peer mt-4 border-2 border-gray-200 pl-8 px-4 py-2 h-12 rounded-lg  w-56" />
                    <label for="birth-date" class="peer-focus:text-lg transition-all block text-md text-gray-700 absolute -top-[10px]">Date of birth</label>
                </div>
                <div class="flex flex-col-reverse relative">
                    <i class="fa-solid fa-venus-mars absolute top-8 left-3 valid_input_icon" id="gender_icon"></i>
                    <span class="text-red-500 hidden text-xs absolute -bottom-4 left-0 w-96" id="gender_error"></span>
                    <select name="gender" id="gender" class="peer mt-4 border-2 border-gray-200 pl-8 px-4 py-2 h-12 rounded-lg  w-56">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Others</option>
                        <option value="not-specified">Rather not specify</option>
                    </select>
                    <label for="gender" class="peer-focus:text-lg transition-all block text-md text-gray-700 absolute -top-[10px]">Gender</label>
                </div>
            </div>
            <div class="flex flex-col-reverse relative" style="margin-bottom: 60px">
                <i class="fa-solid fa-lock absolute top-8 left-3 valid_input_icon" id="password_icon"></i>
                <span class="text-red-500 hidden text-xs absolute -bottom-12 left-0 " id="password_error"></span>
                <input autocomplete="new-password" type="password" name="password" id="password" class="peer mt-4 border-2 border-gray-200 pl-8 px-4 py-2 h-12 rounded-lg  w-full" />
                <label for="password" class="peer-focus:text-lg transition-all block text-md text-gray-700 absolute -top-[10px]">Password</label>
            </div>
            <div>
                <input type="submit" value="Sign Up" class="cursor-pointer w-full  bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-400">
            </div>
        </form>

    </div>
</body>

</html>