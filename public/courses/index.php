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
            require_once("../../controllers/admin/course/get-all-course.php");
            $stmt = get_all_course();

            if ($stmt) {
                $stmt->bind_result($course_id, $course_name, $course_title, $course_price, $course_description, $course_curriculum_brief, $course_aim, $course_objectives, $course_salient_features, $course_entry_criteria, $course_structure_downloadable, $course_url, $enrolled_at, $createdat, $updatedat);
                echo '<section class="my-8 flex items-center justify-between overflow-x-hidden no-wrap space-x-4 relative ">';
                echo '<section class="my-8 animatein flex items-center justify-between no-wrap space-x-4 overflow-x-scroll cursor-grab active:cursor-grabbing slider1" id="slider1">';
                while ($stmt->fetch()) {
                    echo '
                    <div class="rounded-xl card text-white p-8 space-y-4 flex-shrink-0 w-80 lg:w-96 h-96 flex flex-col justify-between items-start">
                        <p class="text-xl font-semibold my-2 underline underline-offset-2 decoration-wavy decoration-2 text-decor">' . $course_title . '</p>
                        <div class="includes overflow-hidden" style="display: -webkit-box; -webkit-line-clamp: 9; -webkit-box-orient: vertical;">
                        ' . $course_description . '
                        <p>And more...</p>
                        <p class="my-4 font-bold">Price : ' . ($course_price !== 0 ?  number_format($course_price) : "Free") . '</p>
                        </div>
                            <a target="_blank" href="./' . $course_url . '" class="inline-block">
                                <button class="px-4 py-2 btn font-bold rounded-full hover:-translate-y-1 transition-all">Know More</button>
                            </a>
                    </div>
                    ';
                }
                echo "
                    <div class='rounded-xl card bg-gray-500 text-white p-8 space-y-4 flex-shrink-0 w-80 lg:w-96 h-96 flex flex-col opacity-50 justify-between items-start cursor-not-allowed'>
                        <p class='text-xl font-semibold my-2 underline underline-offset-2 decoration-wavy decoration-gray-700 decoration-2'>New Courses</p>
                        <p class='text-gray-100'>New courses will be added soon!</p>
                        <a href='#' class='inline-block'>
                            <button class='px-4 py-2 bg-gray-800 font-bold rounded-full transition-all cursor-not-allowed'>Coming Soon</button>
                        </a>
                    </div>
                ";
                echo '</section>';
                echo '</section>';
            } else {
                echo "
                    <div class='rounded-xl card bg-gray-500 text-white p-8 space-y-4 flex-shrink-0 w-80 lg:w-96 h-96 flex flex-col opacity-50 justify-between items-start cursor-not-allowed my-10'>
                        <p class='text-xl font-semibold my-2 underline underline-offset-2 decoration-wavy decoration-gray-700 decoration-2'>New Courses</p>
                        <p class='text-gray-100'>New courses will be added soon!</p>
                        <a href='#' class='inline-block'>
                            <button class='px-4 py-2 bg-gray-800 font-bold rounded-full transition-all cursor-not-allowed'>Coming Soon</button>
                        </a>
                    </div>
                ";
            }
            ?>
        </section>
    </section>

    <?php require_once("./include/footer.php") ?>
</body>

</html>