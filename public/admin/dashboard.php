<?php
session_start();
if (!isset($_SESSION["admin_loggedin"])) {
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
        #card2::before,
        #card3::before,
        #card4::before {
            z-index: 0;
            background-position: 97% 90%;
            opacity: 0.5;
        }

        #card1::before {
            filter: invert(19%) sepia(85%) saturate(1703%) hue-rotate(212deg) brightness(81%) contrast(95%);
            background-size: 100px;

        }

        #card2::before {
            filter: invert(23%) sepia(49%) saturate(726%) hue-rotate(91deg) brightness(90%) contrast(89%);
            background-size: 100px;
        }

        #card3::before {
            filter: invert(14%) sepia(84%) saturate(2452%) hue-rotate(5deg) brightness(93%) contrast(86%);
            background-size: 100px;
        }

        #card4::before {
            filter: invert(13%) sepia(41%) saturate(4963%) hue-rotate(237deg) brightness(90%) contrast(89%);
            background-size: 80px;
        }
    </style>
</head>

<body>
    <?php require_once("./include/navbar.php") ?>
    <section class="bg-gray-100 min-h-[88.5vh]">
        <section class="max-w-[1400px] mx-auto px-8">
            <section class="py-10">
                <h3 class="text-2xl md:text-4xl font-bold text-gray-900">What would you like to do?</h3>
                <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 mx-auto gap-4 my-10">
                    <div class="bg-blue-500 rounded-lg p-4 text-white hover:scale-105 cursor-default transition-all space-y-8 relative before:bg-[url('../images/admin/book.png')] before:bg-no-repeat before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:bottom-0 h-32 overflow-hidden" id="card1">
                        <div class="absolute top-0 bottom-0 left-0 right-0 p-4 space-y-8 h-full w-full">
                            <p class="font-bold text-xl">Edit Courses</p>
                            <a class="inline-block " href="./edit-course.php">
                                <button class="px-4 py-2 bg-blue-800 hover:bg-blue-900 text-white font-bold rounded-md">Edit Courses</button>
                            </a>
                        </div>
                    </div>
                    <div class="bg-green-500 rounded-lg p-4 text-white hover:scale-105 cursor-default transition-all space-y-8 relative before:bg-[url('../images/admin/graph.png')] before:bg-no-repeat before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:bottom-0 h-32 overflow-hidden" id="card2">
                        <div class="absolute top-0 bottom-0 left-0 right-0 p-4 space-y-8 h-full w-full">
                            <p class="font-bold text-xl">View Stats</p>
                            <a class="inline-block " href="./stats.php">
                                <button class="px-4 py-2 bg-green-800 hover:bg-green-900 text-white font-bold rounded-md">View Stats</button>
                            </a>
                        </div>
                    </div>
                    <div class="bg-orange-500 rounded-lg p-4 text-white hover:scale-105 cursor-default transition-all space-y-8 relative before:bg-[url('../images/admin/online-course.png')] before:bg-no-repeat before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:bottom-0 h-32 overflow-hidden" id="card3">
                        <div class="absolute top-0 bottom-0 left-0 right-0 p-4 space-y-8 h-full w-full">
                            <p class="font-bold text-xl">View Courses</p>
                            <a class="inline-block " href="./courses.php">
                                <button class="px-4 py-2 bg-orange-800 hover:bg-orange-900 text-white font-bold rounded-md">View Courses</button>
                            </a>
                        </div>
                    </div>
                    <div class="bg-indigo-500 rounded-lg p-4 text-white hover:scale-105 cursor-default transition-all space-y-8 relative before:bg-[url('../images/admin/ebook.png')] before:bg-no-repeat before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:bottom-0 h-32 overflow-hidden" id="card4">
                        <div class="absolute top-0 bottom-0 left-0 right-0 p-4 space-y-8 h-full w-full">
                            <p class="font-bold text-xl">Create Course</p>
                            <a class="inline-block " href="./create-course.php">
                                <button class="px-4 py-2 bg-indigo-800 hover:bg-indigo-900 text-white font-bold rounded-md">Create Course</button>
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