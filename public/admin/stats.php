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
    <title>View Stats | D & B Engineering</title>
    <link rel="stylesheet" href="../assets/styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <?php
    require_once("./include/navbar.php")
    ?>
    <section class="bg-gray-100">
        <section class="bg-gray-100 min-h-[88.5vh]">
            <section class="max-w-[1400px] mx-auto px-8">
                <section class="py-10">
                    <?php
                    require_once("../../controllers/admin/course/get-all-course.php");
                    $stmt = get_all_course();
                    $stmt->bind_result($course_id, $course_name, $course_title, $course_price, $course_description, $course_curriculum_brief, $course_aim, $course_objectives, $course_salient_features, $course_entry_criteria, $course_structure_downloadable, $course_url, $enrollment_count, $createdat, $updatedat);


                    echo '<section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 mx-auto gap-4 my-10">';
                    while ($stmt->fetch()) {
                        echo '
                    <div class="bg-blue-500 rounded-lg p-4 text-white hover:scale-105 cursor-default transition-all space-y-8 relative h-48 overflow-hidden">
                        <div class="absolute top-0 bottom-0 left-0 right-0 p-4 space-y-8 h-full w-full">
                            <p class="font-bold text-xl">' . $course_name . '</p>
                            <a class="inline-block " href="./edit-course.php?id="' . $course_id . '">
                                <button class="px-4 py-2 bg-blue-800 hover:bg-blue-900 text-white font-bold rounded-md">Edit Courses</button>
                            </a>
                        </div>
                    </div>

                    ';
                    }
                    echo '
                        </section>
        
                    ';
                    ?>
                </section>
            </section>
        </section>
    </section>

</body>

</html>