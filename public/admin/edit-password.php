<?php
session_start();
if (!isset($_SESSION["admin_loggedin"])) {
    header("Location: ../index.php");
    exit();
}

if (isset($_POST["submit"])) {
    require_once("../../controllers/admin/dashboard/editAdminDetails.php");
    $res = editAdminPassword();
    if ($res) {
        header("Location: ./edit-password.php?success=true");
    } else {
        header("Location: ./edit-password.php?success=false");
    }
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
    <script src="../assets/js/admin/edit-password.js" defer></script>
</head>

<body>
    <?php require_once("./include/navbar.php") ?>
    <section class="bg-gray-100">
        <?php
        require_once("./include/notification.php");
        if (isset($_GET["success"])) {
            if ($_GET["success"] === "true") {
                notification("Successfully updated password", "success");
            } else {
                notification("Couldn't update record, please try again later.", "failure");
            }
        }
        ?>
        <section class="max-w-[1400px] mx-auto px-8">
            <section class="py-20">
                <h3 class="text-2xl md:text-4xl font-bold text-center">Edit Account Password</h3>
                <section class="my-10">
                    <form action="./edit-password.php" method="POST" class="space-y-4 max-w-md mx-auto">
                        <div class="relative flex flex-col-reverse">
                            <i class="fa-solid fa-lock absolute top-12 left-3 text-gray-600"></i>
                            <input autocomplete="current-password" type="password" name="curr_pass" id="cpass" class="pr-4 pl-8 py-2 my-2 rounded-lg border-gray-300 border-2 focus:outline-none focus:border-gray-500 ">
                            <label for="cpass">Current Password</label>
                        </div>
                        <div class="relative flex flex-col-reverse">
                            <span class="text-red-500 hidden" id="new_pass_error"></span>
                            <i class="fa-solid fa-lock absolute top-12 left-3 text-gray-600"></i>
                            <input autocomplete="new-password" type="password" name="new_pass" id="npass" class="pr-4 pl-8 py-2 my-2 rounded-lg border-gray-300 border-2 focus:outline-none focus:border-gray-500 ">
                            <label for="npass">New Password</label>
                        </div>
                        <div class="relative flex flex-col-reverse">
                            <span class="text-red-500 hidden" id="re_pass_error"></span>
                            <i class="fa-solid fa-lock absolute top-12 left-3 text-gray-600"></i>
                            <input autocomplete="new-password" type="password" name="re_pass" id="repass" class="pr-4 pl-8 py-2 my-2 rounded-lg border-gray-300 border-2 focus:outline-none focus:border-gray-500 ">
                            <label for="repass">Re-Type New Password</label>
                        </div>
                        <div>
                            <input type="submit" disabled value="Update" name="submit" id="btn" class="px-4 py-2 w-full bg-blue-300 cursor-not-allowed font-bold text-white rounded-full">
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