<?php
session_start();
if (!isset($_SESSION["admin_loggedin"])) {
    header("Location: ../index.php");
    exit();
}

$show_all_courses = false;

if (!isset($_POST["submit"])) {
    if (isset($_GET["id"])) {
        $show_all_courses = false;
        require_once("../../controllers/admin/course/edit-course.php");
        $c_id = doubleval(htmlspecialchars($_GET["id"]));
        if (!$c_id) {
            exit(header("./index.php"));
        }
        $stmt2 = get_course_details($c_id);
    } else {
        $show_all_courses = true;
        require_once("../../controllers/admin/course/get-all-course.php");
        $stmt = get_all_course();
    }
} else {
    require_once("../../controllers/admin/course/edit-course.php");

    $c_id = intval(htmlspecialchars($_POST["c_id"]));
    if (!$c_id) {
        exit(header("./index.php"));
    }
    $res = edit_course_details($c_id);
    if ($res === 0 || $res === 1) {
        header("Location: ./edit-course.php?success=true");
    } else {
        header("Location: ./edit-course.php?success=false");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course | D & B Engineering</title>
    <link rel="stylesheet" href="../assets/styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="../assets/js/courses/edit-course.js"></script>
</head>

<body>
    <?php require_once("./include/navbar.php") ?>
    <section class="bg-gray-100 min-h-screen">
        <?php
        require_once("./include/notification.php");
        if (isset($_GET["success"])) {
            if ($_GET["success"] === "true") {
                notification("Successfully edited a course", "success");
            } else {
                notification("Couldn't edit that course, please try again later.", "failure");
            }
        }
        ?>
        <section class="max-w-[1400px] mx-auto px-8">
            <?php
            if ($show_all_courses && !isset($_POST["submit"])) {
                if ($stmt) {
                    $stmt->bind_result($course_id, $course_name, $course_title, $course_price, $course_description, $course_curriculum_brief, $course_aim, $course_objectives, $course_salient_features, $course_entry_criteria, $course_structure_downloadable, $course_url, $enrolled_count, $createdat, $updatedat);
                    $count = 0;
                    echo '<section class="py-8 flex items-center justify-between overflow-x-hidden no-wrap space-x-4 relative ">';
                    echo '<section class="my-8 animatein flex items-center justify-between no-wrap space-x-4 overflow-x-auto cursor-grab active:cursor-grabbing slider1" id="slider1">';
                    echo '<table class="mx-auto rounded-lg border border-collapse">';
                    echo '<tr class="bg-gray-800 text-white">
                            <th class="border px-4 py-2 cursor-default" >Serial Number</th>
                            <th class="border px-4 py-2 cursor-default" >Name of Course</th>
                            <th class="border px-4 py-2 cursor-default" >Course URL</th>
                            <th class="border px-4 py-2 cursor-default" >Actions</th>
                        </tr>';
                    while ($stmt->fetch()) {
                        echo '<tr class="border hover:bg-gray-200">';
                        echo '<td class="border p-4 cursor-default" >' . ++$count . '</td>';
                        echo '<td class="border p-4 cursor-default" >' . $course_name . '</td>';
                        echo '<td class="border p-4 underline cursor-pointer" ><a href="../courses/' . $course_url . '">' . $course_name . '</a><i class="fa-solid fa-link px-2"></i></td>';
                        echo '<td class="border p-4 cursor-default" >
                                <a href="?id=' . $course_id . '" class="hover:bg-gray-500 hover:text-white px-2 py-1 rounded-lg">Edit</a>
                              </td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                    echo '</section>';
                    echo '</section>';
                } else {
                    echo "
                    <div class='py-10'>
                        <p class='text-gray-800 font-bold text-2xl md:text-4xl my-4'>No courses found !</p>
                        <a href='./create-course.php' class='underline'>Create a new course</a>
                    </div>
                ";
                }
            }
            if (!$show_all_courses && !isset($_POST["submit"])) {
                $stmt2->bind_result($course_title, $course_price, $course_description, $course_curriculum_brief, $course_aim, $course_objectives, $course_salient_features, $course_entry_criteria, $course_structure_downloadable, $course_structure_details, $course_url);
                $stmt2->fetch();
                $stmt2->close();
            ?>
                <section class="py-20">
                    <h3 class="text-2xl md:text-4xl font-bold text-center">Edit `<?= $course_title ?>` Course</h3>
                    <section class="my-10">
                        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="POST" class="space-y-4 max-w-lg mx-auto" enctype="multipart/form-data">
                            <div class="relative flex flex-col-reverse">
                                <i class="fa-solid fa-chain absolute top-12 left-3 text-gray-600"></i>
                                <input autocomplete="off" value="<?= $course_url ?>" type="text" name="course_url" id="course_url" class="pr-4 pl-8 py-2 my-2 rounded-lg border-gray-300 border-2 focus:outline-none focus:border-gray-500 ">
                                <label for="course_url">Url is</label>
                            </div>
                            <div>
                                <input type="hidden" name="c_id" value="<?= $_GET["id"] ?>">
                            </div>
                            <div class="flex flex-col sm:flex-row sm:space-x-4">
                                <div class="relative flex flex-col-reverse">
                                    <i class="fa-solid fa-a absolute top-12 left-3 text-gray-600"></i>
                                    <input value="<?= $course_title ?>" autocomplete="off" type="text" name="course_title" id="course_title" class="pr-4 pl-8 py-2 my-2 rounded-lg border-gray-300 border-2 focus:outline-none focus:border-gray-500 ">
                                    <label for="course_title">Course Title (shown in ui)</label>
                                </div>

                                <div class="relative flex flex-col-reverse">
                                    <i class="fa-solid fa-dollar absolute top-12 left-3 text-gray-600"></i>
                                    <input value="<?= $course_price  ?>" autocomplete="off" type="number" min="0" name="course_price" id="course_price" class="pr-4 pl-8 py-2 my-2 rounded-lg border-gray-300 border-2 focus:outline-none focus:border-gray-500 ">
                                    <label for="course_price">Course Price</label>
                                </div>
                            </div>
                            <div class="relative flex flex-col-reverse">
                                <textarea rows="5" style="resize:none;" autocomplete="off" name="course_description" id="course_description" class="px-2 py-2 my-2 rounded-lg border-gray-300 border-2 focus:outline-none focus:border-gray-500 "><?= $course_description  ?></textarea>
                                <label for="course_description">Course Description</label>
                            </div>
                            <div class="relative flex flex-col-reverse">
                                <textarea rows="5" style="resize:none;" autocomplete="off" name="course_curriculum_brief" id="course_curriculum_brief" class="px-2 py-2 my-2 rounded-lg border-gray-300 border-2 focus:outline-none focus:border-gray-500 "><?= $course_curriculum_brief ?></textarea>
                                <label for="course_curriculum_brief">Course Curriculum Brief</label>
                            </div>
                            <div class="relative flex flex-col-reverse">
                                <textarea rows="5" style="resize:none;" autocomplete="off" name="course_aim" id="course_aim" class="px-2 py-2 my-2 rounded-lg border-gray-300 border-2 focus:outline-none focus:border-gray-500 "><?= $course_aim ?></textarea>
                                <label for="course_aim">Course Aim</label>
                            </div>
                            <div class="relative flex flex-col-reverse">
                                <textarea rows="5" style="resize:none;" autocomplete="off" name="course_objectives" id="course_objectives" class="px-2 py-2 my-2 rounded-lg border-gray-300 border-2 focus:outline-none focus:border-gray-500 "><?= $course_objectives ?></textarea>
                                <label for="course_objectives">Course Objectives</label>
                            </div>
                            <div class="relative flex flex-col-reverse">
                                <textarea rows="5" style="resize:none;" autocomplete="off" name="course_salient_features" id="course_salient_features" class="px-2 py-2 my-2 rounded-lg border-gray-300 border-2 focus:outline-none focus:border-gray-500 "><?= $course_salient_features ?></textarea>
                                <label for="course_salient_features">Course Salient Features</label>
                            </div>
                            <div class="relative flex flex-col-reverse">
                                <textarea rows="5" style="resize:none;" autocomplete="off" name="course_entry_criteria" id="course_entry_criteria" class="px-2 py-2 my-2 rounded-lg border-gray-300 border-2 focus:outline-none focus:border-gray-500 "><?= $course_entry_criteria ?></textarea>
                                <label for="course_entry_criteria">Course Entry Criteria</label>
                            </div>
                            <div class="relative flex flex-col-reverse">
                                <textarea rows="5" style="resize:none;" autocomplete="off" name="course_structure_details" id="course_structure_details" class="px-2 py-2 my-2 rounded-lg border-gray-300 border-2 focus:outline-none focus:border-gray-500 "><?= $course_structure_details ?></textarea>
                                <label for="course_structure_details">Course Structure Details</label>
                            </div>
                            <div class="relative flex flex-col-reverse">
                                <input type="file" name="course_structure_downloadable" id="course_structure_downloadable" accept="application/pdf" class="px-2 py-2 my-2 rounded-lg border-gray-300 border-2 focus:outline-none focus:border-gray-500 ">
                                <label for="course_structure_downloadable">Course Structure Downloadable (upload pdf)</label>
                            </div>
                            <div class="relative flex flex-row space-x-4">
                                <input type="checkbox" name="course_pdf_new" id="course_pdf_new" class="inline-block h-8 w-8">
                                <label for="course_pdf_new">Keep the old course structure ? (unchecking will remove the previously uploaded pdf)</label>
                            </div>
                            <div>
                                <input type="submit" value="Update" name="submit" id="btn" class="px-4 py-2 w-full bg-blue-500 hover:bg-blue-400 cursor-pointer font-bold text-white rounded-full">
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
            <?php } ?>
        </section>
    </section>
</body>

<!-- ck editor js script   -->
<script src="../ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('course_entry_criteria')
    CKEDITOR.replace('course_curriculum_brief')
    CKEDITOR.replace('course_description')
    CKEDITOR.replace('course_aim')
    CKEDITOR.replace('course_objectives')
    CKEDITOR.replace('course_salient_features')
    CKEDITOR.replace('course_structure_details')
</script>

</html>