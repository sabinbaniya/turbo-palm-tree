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
            <?php
            require_once("./helpers/courses_renderer.php");
            $path = "../controllers/admin/course/get-all-course.php";
            $fromAdmin = true;
            render_course($path, $fromAdmin);
            ?>
        </section>
        <div id="about" class="h-20"></div>
        <section class="mb-20 mt-10">
            <h3 class="text-center text-2xl md:text-4xl font-bold text-gray-900 my-10">So, Who are we ?</h3>
            <div class="flex flex-col md:flex-row justify-center md:justify-between items-start md:space-x-12 space-y-8 md:space-y-0">
                <img src=" ./assets/images/hero-2.jpg" class="max-w-sm lg:max-w-lg mx-auto md:mx-0 rounded-lg">
                <p class=" mb-4 text-gray-500 basis-3/5 text-center md:text-left">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos similique recusandae facilis enim, culpa porro at labore sint doloremque accusamus, debitis aperiam, consequatur fuga adipisci omnis ipsa velit incidunt laboriosam. Officia at, non voluptatibus unde quia veniam facere perferendis quod animi, molestias, hic numquam in dolores. Numquam nobis, magni, fuga quo rerum rem, odio accusantium assumenda magnam hic libero? Asperiores dolorem quisquam neque corporis assumenda vitae, autem eum esse aut a modi iste placeat quod! Eum suscipit inventore, accusamus dolorum aliquid reprehenderit molestiae veritatis necessitatibus praesentium tempore cumque numquam nostrum vero porro. Recusandae, nostrum eius! Eum aperiam exercitationem ullam necessitatibus.</p>
            </div>
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
                    <img src="./assets/images/image-john.jpg" alt="Jhon's Image" class="h-24 rounded-md">
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
                    <img src="./assets/images/image-john.jpg" alt="Jhon's Image" class="h-24 rounded-md">
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
                    <img src="./assets/images/image-john.jpg" alt="Jhon's Image" class="h-24 rounded-md">
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
                    <img src="./assets/images/image-john.jpg" alt="Jhon's Image" class="h-24 rounded-md">
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