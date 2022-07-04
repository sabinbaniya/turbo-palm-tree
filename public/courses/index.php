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
    <!-- font awesome icon cdn  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php include_once("../include/navbar.php") ?>
    <section class="lg:max-w-[1400px] px-8 mx-auto">
        <section class="my-20">
            <h3 class="font-bold text-2xl md:text-4xl">Here's what we currently offer</h3>
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
                        <a href="./computer-system-administrator-and-developer.php" class="inline-block">
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
                        <a href="./computer-operator-course.php" class="inline-block">
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
                        <a href="./foundation-of-it.php" class="inline-block">
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
                        <a href="./typing-course.php" class="inline-block">
                            <button class="px-4 py-2 bg-indigo-800 font-bold rounded-full hover:-translate-y-1 transition-all">Know More</button>
                        </a>
                    </div>
                    <div class="rounded-xl card bg-gray-500 text-white p-8 space-y-4 flex-shrink-0 w-80 lg:w-96 h-96 cursor-not-allowed opacity-30 flex flex-col justify-between items-start">
                        <p class="text-xl font-semibold my-2 underline underline-offset-2 decoration-wavy decoration-gray-700 decoration-2">More Courses</p>
                        <p class="text-gray-100">More courses coming soon!</p>
                        <a href="" class="inline-block">
                            <button class="px-4 py-2 bg-gray-800 font-bold rounded-full transition-all cursor-not-allowed">Coming soon</button>
                        </a>
                    </div>
                </section>
            </section> -->
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
                    <div class='rounded-xl card bg-gray-500 text-white p-8 space-y-4 flex-shrink-0 w-80 lg:w-96 h-96 flex flex-col opacity-50 justify-between items-start cursor-not-allowed'>
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

    <footer class="border-t-2  border-gray-200 bg-no-repeat bg-left-bottom bg-cover" style="background-image: url('../assets/images/pattern-curve.svg')">
        <section class="lg:max-w-[1400px] max-w-[90%] space-y-8 mx-auto flex flex-col text-center md:text-left md:flex-row justify-between items-center px-8 py-8">
            <section class="basis-1/3">
                <p class="font-bold text-gray-800 text-xl">D & B Engineering</p>
                <p class="text-gray-600">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laboriosam consectetur debitis explicabo saepe repellendus porro sequi rem, magnam dolorem tempore.</p>
            </section>
            <section class="basis-1/3 ">
                <ul class="space-y-4">
                    <li><a href="../../public">Home</a></li>
                    <li><a href="../about.php">About us</a></li>
                    <li><a href="./">Courses</a></li>
                    <li><a href="../services.php">Our services</a></li>
                </ul>
            </section>
            <section>
                <ul class="flex justify-between items-center space-x-8">
                    <li><a href="#"><i class="fa-brands fa-instagram fa-2xl hover:-translate-y-1 inline-block transition-all"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-facebook fa-2xl hover:-translate-y-1 inline-block transition-all"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-twitter fa-2xl hover:-translate-y-1 inline-block transition-all"></i></a></li>
                </ul>
            </section>
        </section>
        <footer class="py-4">
            <p class="text-center font-semibold text-gray-900">Copyright &copy; <span id="current_year"></span> D & B Engineering</p>
        </footer>
    </footer>
</body>

<script>
    document.getElementById("current_year").innerText = new Date().getFullYear();
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