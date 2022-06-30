<?php
session_start();
if (!isset($_SESSION["admin_loggedin"])) {
    header("Location: ../index.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Password | D & B Engineering</title>
    <link rel="stylesheet" href="../assets/styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php require_once("./include/navbar.php") ?>
    <section class="bg-gray-100">
        <section class="max-w-[1400px] mx-auto px-8">
            <section class="py-20">
                <h3 class="text-2xl md:text-4xl font-bold text-center">Edit your profile</h3>
                <section class="my-10">
                    <form action="" method="POST" class="space-y-4 max-w-md mx-auto">
                        <div class="relative flex flex-col-reverse">
                            <i class="fa-solid fa-lock absolute top-12 left-3 text-gray-600"></i>
                            <input autocomplete="current-password" type="password" name="cpass" id="cpass" value="" class="pr-4 pl-8 py-2 my-2 rounded-lg border-gray-300 border-2 focus:outline-none focus:border-gray-500 ">
                            <label for="cpass">Current Password</label>
                        </div>
                        <div class="relative flex flex-col-reverse">
                            <i class="fa-solid fa-lock absolute top-12 left-3 text-gray-600"></i>
                            <input autocomplete="new-password" type="password" name="npass" id="npass" value="" class="pr-4 pl-8 py-2 my-2 rounded-lg border-gray-300 border-2 focus:outline-none focus:border-gray-500 ">
                            <label for="npass">New Password</label>
                        </div>
                        <div class="relative flex flex-col-reverse">
                            <i class="fa-solid fa-lock absolute top-12 left-3 text-gray-600"></i>
                            <input autocomplete="new-password" type="password" name="repass" id="repass" value="" class="pr-4 pl-8 py-2 my-2 rounded-lg border-gray-300 border-2 focus:outline-none focus:border-gray-500 ">
                            <label for="repass">Re-Type New Password</label>
                        </div>
                        <div>
                            <input type="submit" value="Update" class="px-4 py-2 w-full bg-blue-500 hover:bg-blue-400 cursor-pointer font-bold text-white rounded-full">
                        </div>
                        <div>
                            <a href="./dashboard.php">
                                <button class="px-4 py-2 w-full bg-stone-500 hover:bg-stone-400 cursor-pointer font-bold text-white rounded-full">
                                    Cancel
                                </button>
                            </a>
                        </div>
                    </form>
                </section>

            </section>

        </section>
    </section>
</body>

</html>