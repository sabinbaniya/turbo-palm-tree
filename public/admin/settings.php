<?php
session_start();
if (!isset($_SESSION["admin_loggedin"])) {
    header("Location: ../index.php");
    exit();
}

if (isset($_POST["submit"])) {
    require_once("../../controllers/admin/dashboard/editAdminDetails.php");
    $res = editAdminDetails();
    if ($res) {
        header("Location: ./settings.php?success=true");
    } else {
        header("Location: ./settings.php?success=false");
    }
} else {
    require_once("../../controllers/admin/dashboard/getAdminDetails.php");
    $res = getAdminDetails();
    $GLOBALS["res"] = $res;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Settings | D & B Engineering</title>
    <link rel="stylesheet" href="../assets/styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php require_once("./include/navbar.php") ?>
    <section class="bg-gray-100 min-h-[88.5vh]">
        <?php
        require_once("./include/notification.php");
        if (isset($_GET["success"])) {
            if ($_GET["success"] === "true") {
                notification("Successfully updated record", "success");
            } else {
                notification("Couldn't update record, please try again later.", "failure");
            }
        }
        ?>
        <section class=" max-w-[1400px] mx-auto px-8">
            <section class="py-20">
                <h3 class="text-2xl md:text-4xl font-bold text-center">Edit your profile</h3>
                <section class="my-10">
                    <form action="./settings.php" method="POST" class="space-y-4 max-w-md mx-auto">
                        <div class="relative flex flex-col-reverse">
                            <i class="fa-solid fa-at absolute top-12 left-3 text-gray-600"></i>
                            <input autocomplete="off" type="text" name="uname" onchange="changeInput()" id="uname" value='<?= $GLOBALS["res"]["username"]; ?>' class="pr-4 pl-8 py-2 my-2 rounded-lg border-gray-300 border-2 focus:outline-none focus:border-gray-500 ">
                            <label for="uname">Username</label>
                        </div>
                        <div class="relative flex flex-col-reverse">
                            <i class="fa-solid fa-envelope absolute top-12 left-3 text-gray-600"></i>
                            <input autocomplete="email" type="email" name="email" onchange="changeInput()" id="email" value='<?= $GLOBALS["res"]["email"]; ?>' class="pr-4 pl-8 py-2 my-2 rounded-lg border-gray-300 border-2 focus:outline-none focus:border-gray-500 ">
                            <label for="email">Email</label>
                        </div>
                        <div>
                            <input id="btn" type="submit" name="submit" disabled value="Update" class="px-4 py-2 w-full bg-blue-300 cursor-not-allowed font-bold text-white rounded-full">
                        </div>
                        <div>
                            <a href="./dashboard.php" class="block text-center px-4 py-2 w-full bg-stone-500 hover:bg-stone-400 cursor-pointer font-bold text-white rounded-full">
                                Cancel
                            </a>
                        </div>
                        <div class="text-center">
                            <a href="./edit-password.php" class="underline underline-offset-2">Change your password</a>
                        </div>
                    </form>
                </section>
            </section>
        </section>
    </section>
</body>
<script>
    function changeInput() {
        const btn = document.getElementById("btn");
        btn.disabled = false;
        btn.classList.remove("bg-blue-300")
        btn.classList.remove("cursor-not-allowed")
        btn.classList.add("bg-blue-500")
        btn.classList.add("hover:bg-blue-400")
        btn.classList.add("cursor-pointer")
    }
</script>

</html>