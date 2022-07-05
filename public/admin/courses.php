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
    <title>View All Courses | D & B Engineering</title>
    <link rel="stylesheet" href="../assets/styles/style.css">
    <script src="../assets/js/admin/index.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
</head>

<body>
    <?php require_once("./include/navbar.php") ?>
    <section class="max-w-[1400px] mx-auto px-8">
        <section class="my-10">
            <h3 class="text-2xl md:text-4xl font-bold text-gray-900">Currently Listed Courses</h3>
            <?php
            require_once("../../controllers/admin/course/get-all-course.php");
            $stmt = get_all_course();

            if ($stmt) {
                $stmt->bind_result($course_id, $course_name, $course_title, $course_price, $course_description, $course_curriculum_brief, $course_aim, $course_objectives, $course_salient_features, $course_entry_criteria, $course_structure_downloadable, $course_url, $createdat, $updatedat);
                echo '<section class="my-8 flex items-center justify-between overflow-x-hidden no-wrap space-x-4 relative ">';
                echo '<section class="my-8 animatein flex items-center justify-between no-wrap space-x-4 overflow-x-scroll cursor-grab active:cursor-grabbing slider1" id="slider1">';
                while ($stmt->fetch()) {
                    echo '
                    <div class="rounded-xl card text-white p-8 space-y-4 flex-shrink-0 w-80 lg:w-96 h-96 flex flex-col justify-between items-start">
                        <p class="text-xl font-semibold my-2 underline underline-offset-2 decoration-wavy decoration-2 text-decor">' . $course_title . '</p>
                        <div class="includes">
                        ' . $course_description . '
                        </div>
                        <div>
                            <a target="_blank" href="../courses/' . $course_url . '" class="inline-block">
                                <button class="px-4 py-2 btn font-bold rounded-full hover:-translate-y-1 transition-all">View full</button>
                            </a>
                            <a target="_blank" href="./edit-course.php?id=' . $course_id . '" class="inline-block">
                                <button class="px-4 py-2 bg-gray-800 font-bold rounded-full hover:-translate-y-1 transition-all">Edit Now</button>
                            </a>
                        </div>
                    </div>
                    ';
                }
                echo "
                    <div class='rounded-xl card bg-gray-500 text-white p-8 space-y-4 flex-shrink-0 w-80 lg:w-96 h-96 cursor-default flex flex-col justify-between items-start'>
                        <p class='text-xl font-semibold my-2 underline underline-offset-2 decoration-wavy decoration-gray-700 decoration-2'>Add Course</p>
                        <p class='text-gray-100'>Create a new course</p>
                        <a href='./create-course.php' class='inline-block'>
                            <button class='px-4 py-2 bg-gray-800 font-bold rounded-full transition-all cursor-pointer'>Add now</button>
                        </a>
                    </div>
                ";
                echo '</section>';
                echo '</section>';
            } else {
                echo "
                    <div class='rounded-xl card bg-gray-500 text-white p-8 space-y-4 flex-shrink-0 w-80 lg:w-96 h-96 cursor-default flex flex-col justify-between items-start'>
                        <p class='text-xl font-semibold my-2 underline underline-offset-2 decoration-wavy decoration-gray-700 decoration-2'>Add Course</p>
                        <p class='text-gray-100'>Create a new course</p>
                        <a href='./create-course.php' class='inline-block'>
                            <button class='px-4 py-2 bg-gray-800 font-bold rounded-full transition-all cursor-pointer'>Add now</button>
                        </a>
                    </div>
                ";
            }
            ?>
        </section>
    </section>
</body>
<script>
    const includes = Array.from(document.getElementsByClassName("includes"));
    includes.map(includes => {
        const tempArr = Array.from(includes.children)
        tempArr.map(el => {
            if (el.innerText.includes("free") && el.innerText.trim().endsWith("free")) {
                el.innerText = el.innerText.split("free")[0];
                const sp = document.createElement("span");
                sp.classList.add("bg-green-500", "rounded-full", "inline-block", "px-4", "py-1", "text-white");
                sp.innerText = "Free";
                el.appendChild(sp)
            }
        })
    })

    const cards = Array.from(document.getElementsByClassName("card"))
    const textDecors = Array.from(document.getElementsByClassName("text-decor"))
    const btns = Array.from(document.getElementsByClassName("btn"))

    const colorArr = ["blue", "orange", "indigo", "emerald"];

    cards.map((card, idx) => {
        const className = `bg-${colorArr[idx]}-400`
        card.classList.add(className)
    })

    textDecors.map((text, idx) => {
        const className = `decoration-${colorArr[idx]}-500`
        text.classList.add(className)
    })

    btns.map((btn, idx) => {
        const className = `bg-${colorArr[idx]}-800`
        btn.classList.add(className)
    })
</script>

</html>