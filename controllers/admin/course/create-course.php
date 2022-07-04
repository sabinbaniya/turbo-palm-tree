<?php

function create_course()
{
    require_once("../../models/db/connectDB.php");

    $downloadable = $_FILES['course_structure_downloadable']['name'];

    if ($downloadable) {
        $tempname = $_FILES['course_structure_downloadable']['tmp_name'];

        $folder = "../assets/pdf/courses/" . $downloadable;

        move_uploaded_file($tempname, $folder);
    }

    $c_id = random_int(0, 2312312432599);
    $c_price = intval(mysqli_real_escape_string($conn, $_POST["course_price"]));

    if ($stmt = $conn->prepare("INSERT INTO courses (course_id, course_name, course_price, course_title, course_description, course_curriculum_brief, course_aim, course_objectives, course_salient_features,course_entry_criteria, course_structure_downloadable, course_structure_details, course_url) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)")) {
        $stmt->bind_param(
            "dsissssssssss",
            $c_id,
            $_POST["course_name"],
            $c_price,
            $_POST["course_title"],
            $_POST["course_description"],
            $_POST["course_curriculum_brief"],
            $_POST["course_aim"],
            $_POST["course_objectives"],
            $_POST["course_salient_features"],
            $_POST["course_entry_criteria"],
            $folder,
            $_POST["course_structure_details"],
            $_POST["course_url"]
        );
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $path = "../courses/" . $_POST["course_url"];

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
                            <section class="my-20 space-y-6 text-gray-600">
                                <h3 class="text-2xl md:text-4xl font-bold text-gray-900">
                                    Curriculum Brief 
                                </h3>
                                <div class="changeList space-y-6">
                                    ' . mysqli_real_escape_string($conn, $_POST["course_curriculum_brief"]) . '
                                </div>
                            </section>
                            <section class="my-20 space-y-6 text-gray-600">
                                <h3 class="text-2xl md:text-4xl font-bold text-gray-900">
                                    Aim
                                </h3>
                                <div class="changeList">
                                    ' . mysqli_real_escape_string($conn, $_POST["course_aim"]) . '
                                </div>
                            </section>
                            <section class="my-20 space-y-6 text-gray-600">
                                <h3 class="text-2xl md:text-4xl font-bold text-gray-900">
                                    Objectives
                                </h3>
                                <div class="changeList space-y-6">
                                ' . mysqli_real_escape_string($conn, $_POST["course_objectives"]) . '
                                </div>

                            </section>
                            <section class="my-20 space-y-6 text-gray-600">
                                <h3 class="text-2xl md:text-4xl font-bold text-gray-900">
                                    Salient Features
                                </h3>
                                <div>
                                    <div id="salient" class="changeList space-y-2">
                                        ' . mysqli_real_escape_string($conn, $_POST["course_salient_features"]) . '
                                    </div>
                                </div>
                            </section>
                            <section class="my-20 space-y-6 text-gray-600">
                                <h3 class="text-2xl md:text-4xl font-bold text-gray-900">
                                    Who is this course meant for
                                </h3>
                                <div>
                                    <div class="space-y-2 changeList">
                                        ' . mysqli_real_escape_string($conn, $_POST["course_entry_criteria"]) . '
                                    </div>
                                </div>
                            </section>
                            ' .
                (mysqli_real_escape_string($conn, $_POST["course_structure_details"]) === null
                    && mysqli_real_escape_string($conn, $folder) === null ?
                    null :
                    '
                                    <section class="my-20 space-y-6 text-gray-600">
                                <h3 class="text-2xl md:text-4xl font-bold text-gray-900">
                                    Curricular Structure
                                </h3>
                                <div class="space-y-2 changeList">
                                <div>
                                ' . mysqli_real_escape_string($conn, $_POST["course_structure_details"]) . '
                                </div>
                
                                    <h4><a href="' . mysqli_real_escape_string($conn, $folder) . '" target="_blank" class="underline">Curriculum of&nbsp;' . $_POST["course_title"] . '.pdf&nbsp;</a></h4>
                                </div>
                            </section>
                                    '

                )
                . '
                            
                        </section>
                        <section class="my-20 space-y-6 sticky md:top-8 shadow-lg rounded-xl p-8 w-full md:basis-1/3">
                            <h3 class="text-xl md:text-3xl font-bold text-gray-700">
                               ' . mysqli_real_escape_string($conn, $_POST["course_title"]) . '
                            </h3>
                            <div class="text-gray-600 space-y-4">
                                <div id="includes">
                                    ' . mysqli_real_escape_string($conn, $_POST["course_description"]) . '
                                    <p> And all the curriculum listed here </p>

                                </div>
                                <button class="w-full inline-block">
                                    <a href="#" class="bg-blue-500 font-bold text-white text-xl px-4 py-2 w-full inline-block rounded-xl hover:bg-blue-400 focus:ring-4 ring-blue-200">Enroll Now</a>
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
        } else {
            return false;
        }
    } else {
        return false;
    }
}
