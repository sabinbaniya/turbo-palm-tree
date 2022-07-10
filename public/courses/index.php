<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses | D & B Engineering</title>
    <link rel="stylesheet" href="../assets/styles/style.css">
    <style>
        .slider1::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .slider1 {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }
    </style>
    <script src="../assets/js/courses/index.js" defer></script>
    <script src="../assets/js/forColouringCourses.js"></script>
    <!-- font awesome icon cdn  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php include_once("../include/navbar.php") ?>
    <section class="lg:max-w-[1400px] px-8 mx-auto">
        <section class="my-20">
            <h3 class="font-bold text-2xl md:text-4xl">Here's what we currently offer</h3>
            <?php
            require_once("../helpers/courses_renderer.php");
            $path = "../../controllers/admin/course/get-all-course.php";
            $fromAdmin = false;
            render_course($path, $fromAdmin);
            ?>
        </section>
    </section>

    <?php require_once("./include/footer.php") ?>
</body>

</html>