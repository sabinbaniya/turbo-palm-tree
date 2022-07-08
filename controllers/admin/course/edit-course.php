<?php

function get_course_details($id)
{
    require_once("../../models/db/connectDB.php");
    if ($stmt = $conn->prepare("SELECT course_title, course_price, course_description, course_curriculum_brief, course_aim, course_objectives, course_salient_features, course_entry_criteria, course_structure_downloadable, course_structure_details, course_url FROM courses WHERE course_id = ?")) {
        $stmt->bind_param("d", $id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            return $stmt;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function edit_course_details($course_id)
{
    $course_price = intval($_POST["course_price"]);

    require_once("../../models/db/connectDB.php");

    if ($stmt = $conn->prepare("SELECT course_structure_downloadable FROM courses WHERE course_id = ?")) {
        try {
            if ($_FILES["course_structure_downloadable"]["name"] === "") {
                $folder = null;
            } else {
                $downloadable = $_FILES['course_structure_downloadable']['name'];

                $tempname = $_FILES['course_structure_downloadable']['tmp_name'];

                $folder = "../assets/pdf/courses/" . $downloadable;

                move_uploaded_file($tempname, $folder);
            }

            $stmt = $conn->prepare("UPDATE courses SET course_title = ?, 
                course_price = ?, 
                course_description = ?, 
                course_curriculum_brief = ?, 
                course_aim = ?,
                course_objectives = ?,
                course_salient_features = ?,
                course_entry_criteria = ?,
                course_structure_details = ?,
                course_structure_downloadable = ?
                WHERE course_id = ?
                ");
            $stmt->bind_param(
                "sissssssssi",
                $_POST["course_title"],
                $course_price,
                $_POST["course_description"],
                $_POST["course_curriculum_brief"],
                $_POST["course_aim"],
                $_POST["course_objectives"],
                $_POST["course_salient_features"],
                $_POST["course_entry_criteria"],
                $_POST["course_structure_details"],
                $folder,
                $course_id
            );
            $stmt->execute();
        } catch (\Throwable $th) {
            return $th;
            return null;
        }
        $path = "../courses/" . $_POST["course_url"];
        $res = update_course_page($conn, $path, $folder, $course_id);
        if ($res) {
            return $stmt->affected_rows;
        } else {
            return null;
        }
    } else {
        return null;
    }
}

function update_course_page($conn, $path, $folder, $course_id)
{
    try {
        $myFile = fopen($path, "w");
        $myStr = '
                <!DOCTYPE html>
                <html lang="en">

                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>
                        ' . mysqli_real_escape_string($conn, $_POST["course_title"]) . '
                        | D & B Engineering
                    </title>
                    <link rel="stylesheet" href="../assets/styles/style.css">
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                    <style>
                        .changeList ul{
                            list-style-type: disc;
                            list-style-position: inside;
                            margin-top: 8px;
                        }

                        .changeList ul > li{
                            margin-top: 8px;
                        }

                        .changeList ol{
                            list-style-type: number;
                            list-style-position: inside;
                            margin-top: 8px;
                        }

                        .changeList ol > li{
                            margin-top: 8px;
                        }

                        #salient > div p{
                            margin-top: 8px;
                        }
                    </style>
                </head>

                <body>
                    <?php require_once("../include/navbar.php") ?>
                    <section class="max-w-[1400px] mx-auto px-8 flex flex-col md:flex-row justify-between items-start">
                        <section class="basis-1/2">
                            <section class="my-20 text-gray-600">
                                ' . ($_POST["course_curriculum_brief"] !== "" ?

            '<section class="my-20 space-y-6 text-gray-600">
                                <h3 class="text-2xl md:text-4xl font-bold text-gray-900">
                                    Curriculum Brief 
                                </h3>
                                <div class="changeList space-y-6">
                                    ' . mysqli_real_escape_string($conn, $_POST["course_curriculum_brief"]) . '
                                </div>
                            </section>'
            :
            null)
            . '
                                    ' . ($_POST["course_aim"] !== "" ?

                '<section class="my-20 space-y-6 text-gray-600">
                                <h3 class="text-2xl md:text-4xl font-bold text-gray-900">
                                    Aim
                                </h3>
                                <div class="changeList">
                                    ' . mysqli_real_escape_string($conn, $_POST["course_aim"]) . '
                                </div>
                            </section>' : null) . '
                            ' . ($_POST["course_objectives"] !== "" ?
                '<section class="my-20 space-y-6 text-gray-600">
                                <h3 class="text-2xl md:text-4xl font-bold text-gray-900">
                                    Objectives
                                </h3>
                                <div class="changeList space-y-6">
                                ' . mysqli_real_escape_string($conn, $_POST["course_objectives"]) . '
                                </div>

                            </section>' : null)
            . '
                            ' . ($_POST["course_salient_features"] !== "" ?
                '<section class="my-20 space-y-6 text-gray-600">
                                <h3 class="text-2xl md:text-4xl font-bold text-gray-900">
                                    Salient Features
                                </h3>
                                <div>
                                    <div id="salient" class="changeList space-y-2">
                                        ' . mysqli_real_escape_string($conn, $_POST["course_salient_features"]) . '
                                    </div>
                                </div>
                            </section>' :
                null) . '
                            ' .
            ($_POST["course_entry_criteria"] !== "" ?
                '<section class="my-20 space-y-6 text-gray-600">
                                <h3 class="text-2xl md:text-4xl font-bold text-gray-900">
                                    Who is this course meant for
                                </h3>
                                <div>
                                    <div class="space-y-2 changeList">
                                        ' . mysqli_real_escape_string($conn, $_POST["course_entry_criteria"]) . '
                                    </div>
                                </div>
                            </section>' :
                null)
            . '
                            ' .
            (mysqli_real_escape_string($conn, $_POST["course_structure_details"]) === ""
                &&  $folder === null ?
                null :
                '
                                    <section class="my-20 space-y-6 text-gray-600">
                                <h3 class="text-2xl md:text-4xl font-bold text-gray-900">
                                    Curricular Structure
                                </h3>
                                <div class="space-y-2 changeList">
                                <div class="space-y-2">
                                ' . (mysqli_real_escape_string($conn, $_POST["course_structure_details"]) !== "" ? mysqli_real_escape_string($conn, $_POST["course_structure_details"]) : null) . '
                                </div>
                                    ' . ($folder !== null ? '<h4><a href="' . mysqli_real_escape_string($conn, $folder) . '" target="_blank" class="underline">Curriculum of&nbsp;' . $_POST["course_title"] . '.pdf&nbsp;</a></h4>' : null)
                . '
                                </div>
                            </section>
                                    '

            )
            . '
                            
                        </section>
                        </section>

                        <section class="my-20 space-y-6 sticky md:top-8 shadow-lg rounded-xl p-8 w-full md:basis-1/3">
                            <h3 class="text-xl md:text-3xl font-bold text-gray-700">
                               ' . mysqli_real_escape_string($conn, $_POST["course_title"]) . '
                            </h3>
                            <div class="text-gray-600 space-y-4">
                                <div id="includes" class="space-y-4">
                                    ' . mysqli_real_escape_string($conn, $_POST["course_description"]) . '
                                    <p> And all the curriculum listed here </p>

                                </div>
                                <button class="w-full inline-block">
                                    <a href="./enroll.php?id=' . $course_id . '" class="bg-blue-500 font-bold text-white text-xl px-4 py-2 w-full inline-block rounded-xl hover:bg-blue-400 focus:ring-4 ring-blue-200">Enroll Now</a>
                                </button>
                            </div>
                        </section>
                    </section>
                    <?php require_once("./include/footer.php") ?>
                </body>
                <script>
                    const includes = document.getElementById("includes");
                    const tempArr = Array.from(includes.children)
                    tempArr.map(el => {
                        if (el.innerText.includes("free") && el.innerText.endsWith("free")) {
                            el.innerText = el.innerText.split("free")[0];
                            const sp = document.createElement("span");
                            sp.classList.add("bg-green-500", "rounded-full", "inline-block", "px-4", "py-1", "text-white");
                            sp.innerText = "Free";
                            el.appendChild(sp)
                        }
                    })
                </script>
                </html>
            ';

        fwrite($myFile, $myStr);
        fclose($myFile);
        return true;
    } catch (\Throwable $th) {
        return false;
    }
}
