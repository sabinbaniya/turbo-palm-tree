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
    <link rel="stylesheet" href="../assets/styles/style.css">
    <script src="../assets/js/courses/index.js"></script>
    <script src="../assets/js/forColouringCourses.js"></script>
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
                <section class="my-10">
                    <?php
                    require_once("../../controllers/admin/course/get-all-course.php");
                    require_once("../../controllers/user/course/get_enrolled_courses.php");

                    $stmt = get_all_course();
                    $arr = get_enrolled_courses();

                    if ($stmt) {
                        $stmt->bind_result($course_id, $course_name, $course_title, $course_price, $course_description, $course_curriculum_brief, $course_aim, $course_objectives, $course_salient_features, $course_entry_criteria, $course_structure_downloadable, $course_url, $enrolled_count, $createdat, $updatedat);
                        echo '<section class="my-8 flex items-center justify-between overflow-x-hidden no-wrap space-x-4 relative ">';
                        echo '<section class="my-8 animatein flex items-center justify-between no-wrap space-x-4 overflow-x-scroll cursor-grab active:cursor-grabbing slider1" id="slider1">';
                        while ($stmt->fetch()) {
                            if (in_array($course_id, $arr)) {

                                echo '
                    <div class="rounded-xl card text-white p-8 space-y-4 flex-shrink-0 w-80 lg:w-96 h-96 flex flex-col justify-between items-start">
                        <p class="text-xl font-semibold my-2 underline underline-offset-2 decoration-wavy decoration-2 text-decor">' . $course_title . '</p>
                        <div class="includes overflow-hidden" style="display: -webkit-box; -webkit-line-clamp: 9; -webkit-box-orient: vertical;">
                        ' . $course_description . '
                        <p>And more...</p>
                        </div>
                            <a target="_blank" href="./' . $course_url . '" class="inline-block">
                                <button class="px-4 py-2 btn font-bold rounded-full hover:-translate-y-1 transition-all">Know More</button>
                            </a>
                    </div>
                    ';
                            }
                        }
                        echo "
                    <div class='rounded-xl card bg-gray-500 text-white p-8 space-y-4 flex-shrink-0 w-80 lg:w-96 h-96 flex flex-col  justify-between items-start'>
                        <p class='text-xl font-semibold my-2 underline underline-offset-2 decoration-wavy decoration-gray-700 decoration-2'>Join a new Course</p>
                        <p class='text-gray-100'>You can see all of the courses that we provide by clicking the link below.</p>
                        <a href='./index.php' class='inline-block px-4 py-2 bg-gray-800 font-bold rounded-full transition-all cursor-pointer'>
                            See all the courses
                        </a>
                    </div>
                ";
                        echo '</section>';
                        echo '</section>';
                    } else {
                        echo "
                    <div class='rounded-xl card bg-gray-500 text-white p-8 space-y-4 flex-shrink-0 w-80 lg:w-96 h-96 flex flex-col  justify-between items-start'>
                        <p class='text-xl font-semibold my-2 underline underline-offset-2 decoration-wavy decoration-gray-700 decoration-2'>Join a new Course</p>
                        <p class='text-gray-100'>You can see all of the courses that we provide by clicking the link below.</p>
                        <a href='./index.php' class='inline-block px-4 py-2 bg-gray-800 font-bold rounded-full transition-all cursor-pointer'>
                            See all the courses
                        </a>
                    </div>
                ";
                    }
                    ?>
                </section>
            </section>
        </section>
    </section>
    <?php require_once("./include/footer.php") ?>
</body>

<script>
    function closeMenu() {
        document.getElementById(" menu").checked = false;
    }
</script>

</html>