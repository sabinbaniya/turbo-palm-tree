<?php
session_start();
require_once("../../controllers/user/settings/get-profile-details.php");
$arr = getUserDetails();
$GLOBALS["arr"] = $arr;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings | D & B Engineering</title>
    <link rel="stylesheet" href="../assets/styles/style.css">
    <script src="../assets/js/edit-profile.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php require_once("./include/navbar.php") ?>
    <section class="bg-gray-100">
        <section class="max-w-[1400px] mx-auto px-8">
            <?php
            require_once("../admin/include/notification.php");
            if (isset($_GET["success"])) {
                if ($_GET["success"] === "true") {
                    notification("Successfully edited profile details", "success");
                } else {
                    notification("Couldn't edit profile details, please try again later.", "failure");
                }
            }
            ?>
            <section class="py-20">
                <h3 class="text-2xl md:text-4xl font-bold text-center">Edit your profile</h3>
                <section class="my-10">
                    <form action="../../controllers/user/settings/edit-profile-details.php" method="POST" class="bg-white p-8 space-y-8 rounded-lg max-w-xl mx-auto" id="update_form">
                        <div class="flex flex-col sm:flex-row justify-between sm:space-x-4 space-y-6 sm:space-y-0">
                            <div class="flex flex-col-reverse relative">
                                <i class="fa-solid fa-user absolute top-8 left-3 text-gray-600" id="name_icon"></i>
                                <span class="text-red-500 hidden text-xs absolute -bottom-4 left-0 w-96" id="name_error"></span>
                                <input autocomplete="name" type="text" name="name" id="name" value="<?= $GLOBALS["arr"]["name"] ?>" class="peer mt-4 border-2 border-gray-200 px-4 pl-8 py-2 h-12 rounded-lg sm:w-56" />
                                <label for="name" class="peer-focus:text-lg transition-all block text-md text-gray-700 absolute -top-[10px]">Name</label>
                            </div>
                            <div class="flex flex-col-reverse relative ">
                                <?= isset($_GET["email"]) ? "<i class='fa-solid fa-envelope absolute top-8 left-3 text-gray-600 invalid_input_icon' id='email_icon'></i>" : "<i class='fa-solid fa-envelope absolute top-8 left-3 text-gray-600' id='email_icon'></i>" ?>
                                <?= isset($_GET["email"]) ? "<span class='text-red-500 text-xs absolute -bottom-4 left-0 w-96' id='email_error'>Email Already in use.</span>" :  "<span class='text-red-500 hidden text-xs absolute -bottom-4 left-0 w-96' id='email_error'></span>" ?>
                                <?= isset($_GET["email"]) ? "<input autocomplete='Email' value='" . $GLOBALS['arr']['email'] . "' type='email' name='email' id='email' class='peer mt-4 border-2 border-gray-200 px-4 pl-8 py-2 h-12 rounded-lg  sm:w-56 invalid_input' />" :  "<input autocomplete='Email' type='email' name='email' value='" . $GLOBALS['arr']['email'] . "' id='email' class='peer mt-4 border-2 border-gray-200 px-4 pl-8 py-2 h-12 rounded-lg  sm:w-56' />" ?>
                                <label for="Email" class="peer-focus:text-lg transition-all block text-md text-gray-700 absolute -top-[10px]">Email</label>
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row justify-between sm:space-x-4 space-y-6 sm:space-y-0">
                            <div class="flex flex-col-reverse relative">
                                <i class="fa-solid fa-mobile-screen-button absolute top-8 left-3 text-gray-600" id="number_icon"></i>
                                <span class="text-red-500 hidden text-xs absolute -bottom-4 left-0 w-96" id="number_error"></span>
                                <input autocomplete="number" type="tel" name="number" value="<?= $GLOBALS["arr"]["mobile"] ?>" id="number" class="peer mt-4 border-2 border-gray-200 pl-8 px-4 py-2 h-12 rounded-lg  sm:w-56" />
                                <label for="number" class="peer-focus:text-lg transition-all block text-md text-gray-700 absolute -top-[10px]">Phone number</label>
                            </div>
                            <div class="flex flex-col-reverse relative">
                                <?= isset($_GET["uname"]) ? "<i class='fa-solid fa-at absolute top-8 left-3 text-gray-600 invalid_input_icon' id='username_icon'></i>" : "<i class='fa-solid fa-at absolute top-8 left-3 text-gray-600' id='username_icon'></i>" ?>
                                <?= isset($_GET["uname"]) ? "<span class='text-red-500 text-xs absolute -bottom-4 left-0 w-96' id='username_error'>Username is already taken</span>" : "<span class='text-red-500 hidden text-xs absolute -bottom-4 left-0 w-96' id='username_error'></span>" ?>
                                <?= isset($_GET["uname"]) ? "<input autocomplete='username' type='text'  value='" . $_SESSION["username"] . "' name='username' id='username' class='peer mt-4 border-2 border-gray-200 px-4 pl-8 py-2 h-12 rounded-lg  sm:w-56 invalid_input' />" :  "<input autocomplete='username'  value='" . $_SESSION["username"] . "' type='text' name='username' id='username' class='peer mt-4 border-2 border-gray-200 px-4 pl-8 py-2 h-12 rounded-lg  sm:w-56' />" ?>
                                <label for="username" class="peer-focus:text-lg transition-all block text-md text-gray-700 absolute -top-[10px]">Username</label>
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row justify-between sm:space-x-4 space-y-6 sm:space-y-0">
                            <div class="flex flex-col-reverse relative">
                                <i class="fa-solid fa-calendar absolute top-8 left-3 valid_input_icon" id="birth-date_icon"></i>
                                <span class="text-red-500 hidden text-xs absolute -bottom-4 left-0 w-96" id="birth-date_error"></span>
                                <input autocomplete="off" type="date" value="<?= $GLOBALS["arr"]["dob"] ?>" name="birth-date" id="birth-date" class="peer mt-4 border-2 border-gray-200 pl-8 px-4 py-2 h-12 rounded-lg  sm:w-56" />
                                <label for="birth-date" class="peer-focus:text-lg transition-all block text-md text-gray-700 absolute -top-[10px]">Date of birth</label>
                            </div>
                            <div class="flex flex-col-reverse relative">
                                <i class="fa-solid fa-venus-mars absolute top-8 left-3 valid_input_icon" id="gender_icon"></i>
                                <span class="text-red-500 hidden text-xs absolute -bottom-4 left-0 w-96" id="gender_error"></span>
                                <select name="gender" id="gender" class="peer mt-4 border-2 border-gray-200 pl-8 px-4 py-2 h-12 rounded-lg sm:w-56">
                                    <option value="male" <?= $GLOBALS["arr"]["gender"] === "male" ? "selected" : "" ?>>Male</option>
                                    <option value="female" <?= $GLOBALS["arr"]["gender"] === "female" ? "selected" : "" ?>>Female</option>
                                    <option value="other" <?= $GLOBALS["arr"]["gender"] === "other" ? "selected" : "" ?>>Others</option>
                                    <option value="not-specified" <?= $GLOBALS["arr"]["gender"] === "not-specified" ? "selected" : "" ?>>Rather not specify</option>
                                </select>
                                <label for="gender" class="peer-focus:text-lg transition-all block text-md text-gray-700 absolute -top-[10px]">Gender</label>
                            </div>
                        </div>
                        <div>
                            <input disabled name="update" id="btn" type="submit" value="Update" class="cursor-not-allowed w-full bg-blue-300 text-white font-bold py-2 px-4 rounded-lg">
                            <div class="my-4">
                                <a class="cursor-pointer block w-full bg-gray-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-gray-400 text-center" href="./dashboard.php">Cancel</a>
                                <a class="cursor-pointer mt-4 block w-full text-black font-bold underline text-center" href="./edit-password.php">Edit your password</a>
                            </div>
                        </div>

                    </form>
                </section>
            </section>
        </section>
    </section>
</body>

</html>