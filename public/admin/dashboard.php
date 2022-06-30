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
    <title>Admin Dashboard | D & B Engineering</title>
    <link rel="stylesheet" href="../assets/styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        #card1::before,
        #card2::before {
            z-index: 0;
            background-position: 100% 100%;
            opacity: 0.5;
        }

        #card1::before {
            filter: invert(19%) sepia(85%) saturate(1703%) hue-rotate(212deg) brightness(81%) contrast(95%);
            background-size: 300px;

        }

        #card2::before {
            filter: invert(23%) sepia(49%) saturate(726%) hue-rotate(91deg) brightness(90%) contrast(89%);
            background-size: 100px;
        }
    </style>
</head>

<body>
    <?php require_once("./include/navbar.php") ?>
    <section class="bg-gray-100 min-h-screen">
        <section class="max-w-[1400px] mx-auto px-8">
            <section class="py-10">
                <h3 class="text-2xl md:text-4xl font-bold text-gray-900">What would you like to do?</h3>
                <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 mx-auto gap-4 my-10">
                    <div class="bg-blue-500 rounded-lg p-4 text-white hover:scale-105 cursor-default transition-all space-y-8 relative before:bg-[url('../images/admin/book.png')] before:bg-no-repeat before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:bottom-0 h-32 overflow-hidden" id="card1">
                        <div class="absolute top-0 bottom-0 left-0 right-0 p-4 space-y-8 h-full w-full">
                            <p>Edit Courses</p>
                            <a class="inline-block " href="./courses.php">
                                <button class="px-4 py-2 bg-blue-800 hover:bg-blue-900 text-white font-bold rounded-md">Edit Courses</button>
                            </a>
                        </div>

                    </div>
                    <div class="bg-green-500 rounded-lg p-4 text-white hover:scale-105 cursor-default transition-all space-y-8 relative before:bg-[url('../images/admin/graph.png')] before:bg-no-repeat before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:bottom-0 h-32 overflow-hidden" id="card2">
                        <div class="absolute top-0 bottom-0 left-0 right-0 p-4 space-y-8 h-full w-full">
                            <p>View Stats</p>
                            <a class="inline-block " href="./stats.php">
                                <button class="px-4 py-2 bg-green-800 hover:bg-green-900 text-white font-bold rounded-md">View Stats</button>
                            </a>
                        </div>

                    </div>


                </section>
            </section>
        </section>
    </section>
</body>

<script>
    function closeMenu() {
        document.getElementById("menu").checked = false;
    }
</script>

</html>