<?php
session_start();
if (!isset($_SESSION["admin_loggedin"])) {
    header("Location: ../index.php");
    exit();
}

if (isset($_POST["submit"])) {
    require_once("../../controllers/admin/course/create-course.php");
    $res = create_course();
    if ($res) {
        header("Location: ./create-course.php?success=true");
    } else {
        header("Location: ./create-course.php?success=false");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Course | D & B Engineering</title>
    <link rel="stylesheet" href="../assets/styles/style.css">
    <script src="../assets/js/courses/create-course.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php require_once("./include/navbar.php") ?>
    <section class="bg-gray-100">
        <?php
        require_once("./include/notification.php");
        if (isset($_GET["success"])) {
            if ($_GET["success"] === "true") {
                notification("Successfully created new course", "success");
            } else {
                notification("Couldn't create new course, please try again later.", "failure");
            }
        }
        ?>
        <section class="max-w-[1400px] mx-auto px-8">
            <section class="py-20">
                <h3 class="text-2xl md:text-4xl font-bold text-center">Create New Course</h3>
                <section class="my-10" onsubmit="return toggleDisable()">
                    <form action="<?= $_SERVER["PHP_SELF"] ?>" method="POST" class="space-y-4 max-w-lg mx-auto" enctype="multipart/form-data">
                        <div class="flex flex-col sm:flex-row sm:space-x-4">
                            <div class="relative flex flex-col-reverse">
                                <i class="fa-solid fa-book absolute top-12 left-3 text-gray-600"></i>
                                <input autocomplete="off" type="text" name="course_name" id="course_name" class="pr-4 pl-8 py-2 my-2 rounded-lg border-gray-300 border-2 focus:outline-none focus:border-gray-500 ">
                                <label for="course_name" title="used for making urls">Course url</label>
                            </div>
                            <div class="relative flex flex-col-reverse">
                                <i class="fa-solid fa-chain absolute top-12 left-3 text-gray-600"></i>
                                <input autocomplete="off" disabled type="text" name="course_url" id="course_url" class="pr-4 pl-8 py-2 my-2 rounded-lg border-gray-300 border-2 focus:outline-none focus:border-gray-500 ">
                                <label for="course_url">Url will be</label>
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:space-x-4">
                            <div class="relative flex flex-col-reverse">
                                <i class="fa-solid fa-a absolute top-12 left-3 text-gray-600"></i>
                                <input autocomplete="off" type="text" name="course_title" id="course_title" class="pr-4 pl-8 py-2 my-2 rounded-lg border-gray-300 border-2 focus:outline-none focus:border-gray-500 ">
                                <label for="course_title">Course Title (shown in ui)</label>
                            </div>

                            <div class="relative flex flex-col-reverse">
                                <i class="fa-solid fa-dollar absolute top-12 left-3 text-gray-600"></i>
                                <input autocomplete="off" type="number" min="0" name="course_price" id="course_price" class="pr-4 pl-8 py-2 my-2 rounded-lg border-gray-300 border-2 focus:outline-none focus:border-gray-500 ">
                                <label for="course_price">Course Price</label>
                            </div>
                        </div>
                        <div class="relative flex flex-col-reverse">
                            <textarea rows="5" style="resize:none;" autocomplete="off" name="course_description" id="course_description" class="px-2 py-2 my-2 rounded-lg border-gray-300 border-2 focus:outline-none focus:border-gray-500 "></textarea>
                            <label for="course_description">Course Description</label>
                        </div>
                        <div class="relative flex flex-col-reverse">
                            <textarea rows="5" style="resize:none;" autocomplete="off" name="course_curriculum_brief" id="course_curriculum_brief" class="px-2 py-2 my-2 rounded-lg border-gray-300 border-2 focus:outline-none focus:border-gray-500 "></textarea>
                            <label for="course_curriculum_brief">Course Curriculum Brief</label>
                        </div>
                        <div class="relative flex flex-col-reverse">
                            <textarea rows="5" style="resize:none;" autocomplete="off" name="course_aim" id="course_aim" class="px-2 py-2 my-2 rounded-lg border-gray-300 border-2 focus:outline-none focus:border-gray-500 "></textarea>
                            <label for="course_aim">Course Aim</label>
                        </div>
                        <div class="relative flex flex-col-reverse">
                            <textarea rows="5" style="resize:none;" autocomplete="off" name="course_objectives" id="course_objectives" class="px-2 py-2 my-2 rounded-lg border-gray-300 border-2 focus:outline-none focus:border-gray-500 "></textarea>
                            <label for="course_objectives">Course Objectives</label>
                        </div>
                        <div class="relative flex flex-col-reverse">
                            <textarea rows="5" style="resize:none;" autocomplete="off" name="course_salient_features" id="course_salient_features" class="px-2 py-2 my-2 rounded-lg border-gray-300 border-2 focus:outline-none focus:border-gray-500 "></textarea>
                            <label for="course_salient_features">Course Salient Features</label>
                        </div>
                        <div class="relative flex flex-col-reverse">
                            <textarea rows="5" style="resize:none;" autocomplete="off" name="course_entry_criteria" id="course_entry_criteria" class="px-2 py-2 my-2 rounded-lg border-gray-300 border-2 focus:outline-none focus:border-gray-500 "></textarea>
                            <label for="course_entry_criteria">Course Entry Criteria</label>
                        </div>
                        <div class="relative flex flex-col-reverse">
                            <textarea rows="5" style="resize:none;" autocomplete="off" name="course_structure_details" id="course_structure_details" class="px-2 py-2 my-2 rounded-lg border-gray-300 border-2 focus:outline-none focus:border-gray-500 "></textarea>
                            <label for="course_structure_details">Course Structure Details</label>
                        </div>
                        <div class="relative flex flex-col-reverse">
                            <input type="file" name="course_structure_downloadable" id="course_structure_downloadable" accept="application/pdf" class="px-2 py-2 my-2 rounded-lg border-gray-300 border-2 focus:outline-none focus:border-gray-500 ">
                            <label for="course_structure_downloadable">Course Structure Downloadable (upload pdf)</label>
                        </div>
                        <div>
                            <input type="submit" disabled value="Create" name="submit" id="btn" class="px-4 py-2 w-full bg-blue-300 cursor-not-allowed font-bold text-white rounded-full">
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

    function toggleDisable() {
        document.getElementById("course_url").disabled = false;
        return true;
    }
</script>

</html>