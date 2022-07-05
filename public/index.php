<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D & B Engineering</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
    <script src="./assets/js/index.js"></script>
    <style>
        /* Hide scrollbar for Chrome, Safari and Opera */
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

        #testimonials {
            scroll-behavior: smooth;
        }
    </style>
    <script src="./assets/js/forColouringCourses.js"></script>
    <!-- font awesome icon cdn  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- font's link  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Gothic&display=swap" rel="stylesheet">
</head>

<body class="scroll-smooth">
    <?php include_once("./include/navbar.php") ?>
    <section class="px-8 mx-auto max-w-[1400px]">
        <section class="my-16 flex flex-col sm:flex-row items-center justify-evenly sm:space-x-12 space-y-4 text-center sm:text-left">
            <h1 class="text-4xl sm:text-7xl font-black sm:leading-[80px]">Courses for</br> Everyone</h1>
            <div class="space-y-2 sm:space-y-4">
                <p class="text-gray-700 text-lg sm:text-xl">Take any of our free online courses to<br /> add more skills to your skillset.</p>
                <a href="./courses" class="inline-block">
                    <button class="bg-blue-500 text-bold text-white rounded-tl-xl rounded-br-xl px-4 py-2 sm:px-6 sm:py-4 font-bold hover:rounded-tr-xl hover:rounded-bl-xl hover:-translate-y-1 transition-all">View Courses</button>
                </a>
            </div>
        </section>
        <section class="my-20">
            <h3 class="text-center text-2xl md:text-4xl font-bold text-gray-900">See what we've to offer</h3>
            <p class="text-center my-4 text-gray-500">Click & Drag &#8660; below</p>
            <!-- <section class="my-8 flex items-center justify-between overflow-x-hidden no-wrap space-x-4 relative ">
                <section class="my-8 animatein flex items-center justify-between no-wrap space-x-4 overflow-x-scroll cursor-grab active:cursor-grabbing slider1" id="slider1">
                    <div class="rounded-xl card bg-blue-400 text-white p-8 space-y-4 flex-shrink-0 w-80 lg:w-96 h-96 flex flex-col justify-between items-start">
                        <p class="text-xl font-semibold my-2 underline underline-offset-2 decoration-wavy decoration-blue-500 decoration-2">Computer System Administrator & Developers</p>
                        <p class="text-gray-100">
                        <p>Credit Hours: 1320 Hours</p>
                        <p class="text-lg font-semibold">Includes: </p>
                        <ul>
                            <li>Foundation of IT <span class="bg-green-500 rounded-full inline-block px-4 py-1">Free</span></li>
                            <li>and more...</li>
                        </ul>
                        </p>
                        <a href="./courses/computer-system-administrator-and-developer.php" class="inline-block">
                            <button class="px-4 py-2 bg-blue-800 font-bold rounded-full hover:-translate-y-1 transition-all">Know More</button>
                        </a>
                    </div>
                    <div class="rounded-xl card bg-emerald-400 text-white p-8 space-y-4 flex-shrink-0 w-80 lg:w-96 h-96 flex flex-col justify-between items-start">
                        <p class="text-xl font-semibold my-2 underline underline-offset-2 decoration-wavy decoration-emerald-500 decoration-2">Computer Operator Course</p>
                        <p class="text-gray-100">
                        <p>Credit Hours: 220 credit Hours</p>
                        <p class="text-lg font-semibold">Includes: </p>
                        <ul>
                            <li>Typing Course 15 days <span class="bg-green-500 rounded-full inline-block px-4 py-1">Free</span></li>
                            <li>and more...</li>
                        </ul>
                        </p>
                        <a href="./courses/computer-operator-course.php" class="inline-block">
                            <button class="px-4 py-2 bg-emerald-800 font-bold rounded-full hover:-translate-y-1 transition-all">Know More</button>
                        </a>
                    </div>
                    <div class="rounded-xl card bg-orange-400 text-white p-8 space-y-4 flex-shrink-0 w-80 lg:w-96 h-96 flex flex-col justify-between items-start">
                        <p class="text-xl font-semibold my-2 underline underline-offset-2 decoration-wavy decoration-orange-500 decoration-2">Foundation of IT</p>
                        <p class="text-gray-100">
                        <p class="text-lg font-semibold">Includes: </p>
                        <ul>
                            <li>Computer Fundamentals</li>
                            <li>Assembling / Dessembling computer parts</li>
                            <li>Fundamentals of web</li>
                            <li>And more...</li>
                        </ul>
                        </p>
                        <a href="./courses/foundation-of-it.php" class="inline-block">
                            <button class="px-4 py-2 bg-orange-800 font-bold rounded-full hover:-translate-y-1 transition-all">Know More</button>
                        </a>
                    </div>
                    <div class="rounded-xl card bg-indigo-400 text-white p-8 space-y-4 flex-shrink-0 w-80 lg:w-96 h-96 flex flex-col justify-between items-start">
                        <p class="text-xl font-semibold my-2 underline underline-offset-2 decoration-wavy decoration-indigo-500 decoration-2">Typing Course</p>
                        <p class="text-gray-100">
                        <p class="text-lg font-semibold">Includes: </p>
                        <ul>
                            <li>English Typing</li>
                            <li>Nepali Typing</li>
                            <li>And more...</li>
                        </ul>
                        </p>
                        <a href="./courses/typing-course.php" class="inline-block">
                            <button class="px-4 py-2 bg-indigo-800 font-bold rounded-full hover:-translate-y-1 transition-all">Know More</button>
                        </a>
                    </div>
                    <div class="rounded-xl card bg-gray-500 text-white p-8 space-y-4 flex-shrink-0 w-80 lg:w-96 h-96 cursor-not-allowed opacity-30 flex flex-col justify-between items-start">
                        <p class="text-xl font-semibold my-2 underline underline-offset-2 decoration-wavy decoration-gray-700 decoration-2">More Courses</p>
                        <p class="text-gray-100">More courses coming soon!</p>
                        <a class="inline-block">
                            <button class="px-4 py-2 bg-gray-800 font-bold rounded-full transition-all cursor-not-allowed">Coming soon</button>
                        </a>
                    </div>
                </section>
            </section> -->
            <?php
            require_once("../controllers/admin/course/get-all-course.php");
            $stmt = get_all_course($fromAdmin = true);

            if ($stmt) {
                $stmt->bind_result($course_id, $course_name, $course_title, $course_price, $course_description, $course_curriculum_brief, $course_aim, $course_objectives, $course_salient_features, $course_entry_criteria, $course_structure_downloadable, $course_url, $createdat, $updatedat);
                echo '<section class="my-8 flex items-center justify-between overflow-x-hidden no-wrap space-x-4 relative ">';
                echo '<section class="my-8 animatein flex items-center justify-between no-wrap space-x-4 overflow-x-scroll cursor-grab active:cursor-grabbing slider1" id="slider1">';
                while ($stmt->fetch()) {
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

    <section class="my-20">
        <h3 class="text-center text-gray-900 text-2xl md:text-4xl font-bold mb-20">Here's what others say about us</h3>
        <section class="flex justify-between items-center space-x-4 overflow-auto slider1 p-6 md:p-8 lg:p-12" id="testimonials">
            <div class="space-y-8 max-w-sm md:max-w-lg lg:max-w-xl shrink-0 shadow-lg rounded-xl p-8">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-7xl font-bold text-gray-900" style="font-family: 'League Gothic' , sans-serif;">Jhon Doe</p>
                        <p class=" text-stone-500">CEO of JHON INC.</p>
                    </div>
                    <img src="./assets/images/image-john.jpg" alt="Jhon's Image" class="h-24 rounded-xl">
                </div>
                <div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum optio dolore voluptatibus rem officiis veritatis mollitia sint quae, explicabo doloribus blanditiis, sunt asperiores ullam, velit inventore voluptates tempora illum. Aperiam?</p>
                </div>
            </div>
            <div class="space-y-8 max-w-sm md:max-w-lg lg:max-w-xl shrink-0 shadow-lg rounded-xl p-8">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-7xl font-bold text-gray-900" style="font-family: 'League Gothic' , sans-serif;">Jhon Doe</p>
                        <p class=" text-stone-500">CEO of JHON INC.</p>
                    </div>
                    <img src="./assets/images/image-john.jpg" alt="Jhon's Image" class="h-24 rounded-xl">
                </div>
                <div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum optio dolore voluptatibus rem officiis veritatis mollitia sint quae, explicabo doloribus blanditiis, sunt asperiores ullam, velit inventore voluptates tempora illum. Aperiam?</p>
                </div>
            </div>
            <div class="space-y-8 max-w-sm md:max-w-lg lg:max-w-xl shrink-0 shadow-lg rounded-xl p-8">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-7xl font-bold text-gray-900" style="font-family: 'League Gothic' , sans-serif;">Jhon Doe</p>
                        <p class=" text-stone-500">CEO of JHON INC.</p>
                    </div>
                    <img src="./assets/images/image-john.jpg" alt="Jhon's Image" class="h-24 rounded-xl">
                </div>
                <div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum optio dolore voluptatibus rem officiis veritatis mollitia sint quae, explicabo doloribus blanditiis, sunt asperiores ullam, velit inventore voluptates tempora illum. Aperiam?</p>
                </div>
            </div>
            <div class="space-y-8 max-w-sm md:max-w-lg lg:max-w-xl shrink-0 shadow-lg rounded-xl p-8">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-7xl font-bold text-gray-900" style="font-family: 'League Gothic' , sans-serif;">Jhon Doe</p>
                        <p class=" text-stone-500">CEO of JHON INC.</p>
                    </div>
                    <img src="./assets/images/image-john.jpg" alt="Jhon's Image" class="h-24 rounded-xl">
                </div>
                <div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum optio dolore voluptatibus rem officiis veritatis mollitia sint quae, explicabo doloribus blanditiis, sunt asperiores ullam, velit inventore voluptates tempora illum. Aperiam?</p>
                </div>
            </div>
        </section>
        <section class="flex justify-center w-40 h-16 shadow-xl mx-auto my-8 rounded-full overflow-hidden">
            <button class="w-full h-full basis-1/2 hover:bg-gray-100 transition-all text-3xl rounded-l-full" id="button_backward">
                &larr;
            </button>
            <button class="w-full h-full basis-1/2 hover:bg-gray-100 transition-all text-3xl rounded-r-full" id="button_forward">
                &rarr;
            </button>
        </section>
    </section>
    <?php require_once("./include/footer.php") ?>

</body>

</html>