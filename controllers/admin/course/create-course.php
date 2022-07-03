<?php

function create_course()
{
    require_once("../../models/db/connectDB.php");

    $downloadable = $_FILES['course_structure_downloadable']['name'];

    $tempname = $_FILES['course_structure_downloadable']['tmp_name'];

    $folder = "../assets/pdf/courses/" . $downloadable;

    move_uploaded_file($tempname, $folder);

    $c_id = random_int(0, 2312312432599);
    $c_price = intval($_POST["course_price"]);
    $c_hrs = intval($_POST["course_credit_hours"]);

    if ($stmt = $conn->prepare("INSERT INTO courses (course_id, course_name, course_price, course_title, course_credit_hours, course_description, course_curriculum_brief, course_aim, course_objectives, course_salient_features,course_entry_criteria, course_structure_downloadable) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)")) {
        $stmt->bind_param(
            "dsisisssssss",
            $c_id,
            $_POST["course_name"],
            $c_price,
            $_POST["course_title"],
            $c_hrs,
            $_POST["course_description"],
            $_POST["course_curriculum_brief"],
            $_POST["course_aim"],
            $_POST["course_objectives"],
            $_POST["course_salient_features"],
            $_POST["course_entry_criteria"],
            $folder
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
                        ' . $_POST["course_title"] . '
                        | D & B Engineering
                    </title>
                    <link rel="stylesheet" href="../assets/styles/style.css">
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                </head>

                <body>
                    <?php require_once("../include/navbar.php") ?>
                    <section class="max-w-[1400px] mx-auto px-8 flex flex-col md:flex-row justify-between items-start">
                        <section class="basis-1/2">
                            <section class="my-20 space-y-6 text-gray-600">
                                <h3 class="text-2xl md:text-4xl font-bold text-gray-900">
                                    Curriculum Brief 
                                </h3>
                                <p>
                                    ' . $_POST["course_curriculum_brief"] . '
                                </p>
                            </section>
                            <section class="my-20 space-y-6 text-gray-600">
                                <h3 class="text-2xl md:text-4xl font-bold text-gray-900">
                                    Aim
                                </h3>
                                <p>
                                    ' . $_POST["course_aim"] . '
                                </p>
                            </section>
                            <section class="my-20 space-y-6 text-gray-600">
                                <h3 class="text-2xl md:text-4xl font-bold text-gray-900">
                                    Objectives
                                </h3>
                                <p>
                                   After completion of training the trainees will be able:
                                </p>
                                <p>
                                ' . $_POST["course_objectives"] . '
                                </p>

                            </section>
                            <section class="my-20 space-y-6 text-gray-600">
                                <h3 class="text-2xl md:text-4xl font-bold text-gray-900">
                                    Salient Features
                                </h3>
                                <div>
                                    <div>
                                        ' . $_POST["course_salient_features"] . '
                                    </div>
                                </div>
                            </section>
                            <section class="my-20 space-y-6 text-gray-600">
                                <h3 class="text-2xl md:text-4xl font-bold text-gray-900">
                                    Who is this course meant for
                                </h3>
                                <div>
                                    <div class="space-y-2">
                                        ' . $_POST["course_entry_criteria"] . '
                                    </div>
                                </div>
                            </section>
                            <section class="my-20 space-y-6 text-gray-600">
                                <h3 class="text-2xl md:text-4xl font-bold text-gray-900">
                                    Curricular Structure
                                </h3>
                                <div class="space-y-2">
                                    <h4><a href="' . $folder . '" target="_blank" class="underline">Curriculum of&nbsp;' . $_POST["course_title"] . '.pdf&nbsp;</a></h4>
                                </div>
                            </section>
                        </section>
                        <section class="my-20 space-y-6 sticky md:top-8 shadow-lg rounded-xl p-8 w-full md:basis-1/3">
                            <h3 class="text-xl md:text-3xl font-bold text-gray-700">
                               ' . $_POST["course_title"] . '
                            </h3>
                            <div class="text-gray-600 space-y-4">
                                <p>
                                    Credit Hours: ' . $_POST["c_hrs"] . ' hours
                                </p>
                                <p class="font-bold text-gray-700">
                                    Includes :
                                </p>
                                <p>
                                    ' . $_POST["course_description"] . '
                                </p>
                                <p>
                                    And all the curiculum listed here
                                </p>
                                <button class="w-full inline-block">
                                    <a href="#" class="bg-blue-500 font-bold text-white text-xl px-4 py-2 w-full inline-block rounded-xl hover:bg-blue-400 focus:ring-4 ring-blue-200">Enroll Now</a>
                                </button>
                            </div>
                        </section>
                    </section>
                    <?php require_once("./include/footer.php") ?>
                </body>

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
