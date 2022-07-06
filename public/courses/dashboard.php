<?php
session_start();
if (!isset($_SESSION["loggedin"])) {
    header("Location: ./login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Dashboard</title>
    <link rel="stylesheet" href="../assets/styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php require_once("./include/navbar.php") ?>
    <section class="bg-gray-100 min-h-screen">
        <section class="max-w-[1400px] mx-auto px-8">
            <section class="py-10">
                <h3 class="text-2xl md:text-4xl font-bold">
                    Your Courses
                </h3>
                <div>

                </div>
            </section>
        </section>
    </section>
</body>

<script>
    function closeMenu() {
        document.getElementById(" menu").checked = false;
    }
</script>

</html>