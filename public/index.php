<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixel IT Magic Solutions</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
    <script src="./assets/js/index.js"></script>
    <style>
        /* Hide scrollbar for Chrome, Safari and Opera */
        #slider1::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        #slider1 {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }
    </style>
    <!-- font awesome icon cdn  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="scroll-smooth">
    <?php include_once("./include/navbar.php") ?>
    <section class="px-8 mx-auto max-w-[1400px]">
        <section class="my-16 flex flex-col sm:flex-row items-center justify-evenly sm:space-x-12 space-y-4 text-center sm:text-left">
            <h1 class="text-4xl sm:text-7xl font-black sm:leading-[80px]">Courses for</br> Everyone</h1>
            <div class="space-y-2 sm:space-y-4">
                <p class="text-gray-700 text-lg sm:text-xl">Take any of our free online courses to<br /> add more skills to your skillset.</p>
                <a href="./courses.php" class="inline-block">
                    <button class="bg-blue-500 text-bold text-white rounded-tl-xl rounded-br-xl px-4 py-2 sm:px-6 sm:py-4 font-bold hover:rounded-tr-xl hover:rounded-bl-xl hover:-translate-y-1 transition-all">View Courses</button>
                </a>
            </div>
        </section>
        <section class="my-20">
            <h3 class="text-center text-2xl md:text-4xl font-bold">See what we've to offer</h3>
            <p class="text-center my-4 text-gray-500">Click & Drag &#8660; below</p>
            <section class="my-8 flex items-center justify-between overflow-x-hidden no-wrap space-x-4 relative ">
                <section class="my-8 animatein flex items-center justify-between no-wrap space-x-4 overflow-x-scroll cursor-grab active:cursor-grabbing " id="slider1">
                    <div class="rounded-xl card bg-blue-400 text-white p-8 space-y-4 flex-shrink-0 w-80">
                        <p class="text-xl font-semibold my-2 underline underline-offset-2 decoration-wavy decoration-blue-500 decoration-2">Course Name</p>
                        <p class="text-gray-100">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae excepturi beatae sunt eveniet ipsa veritatis quaerat laboriosam voluptates, maxime dolor!</p>
                        <a href="" class="inline-block">
                            <button class="px-4 py-2 bg-blue-800 font-bold rounded-full hover:-translate-y-1 transition-all">Take Course</button>
                        </a>
                    </div>
                    <div class="rounded-xl card bg-emerald-400 text-white p-8 space-y-4 flex-shrink-0 w-80">
                        <p class="text-xl font-semibold my-2 underline underline-offset-2 decoration-wavy decoration-emerald-500 decoration-2">Course Name</p>
                        <p class="text-gray-100">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae excepturi beatae sunt eveniet ipsa veritatis quaerat laboriosam voluptates, maxime dolor!</p>
                        <a href="" class="inline-block">
                            <button class="px-4 py-2 bg-emerald-800 font-bold rounded-full hover:-translate-y-1 transition-all">Take Course</button>
                        </a>
                    </div>
                    <div class="rounded-xl card bg-orange-400 text-white p-8 space-y-4 flex-shrink-0 w-80">
                        <p class="text-xl font-semibold my-2 underline underline-offset-2 decoration-wavy decoration-orange-500 decoration-2">Course Name</p>
                        <p class="text-gray-100">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae excepturi beatae sunt eveniet ipsa veritatis quaerat laboriosam voluptates, maxime dolor!</p>
                        <a href="" class="inline-block">
                            <button class="px-4 py-2 bg-orange-800 font-bold rounded-full hover:-translate-y-1 transition-all">Take Course</button>
                        </a>
                    </div>
                    <div class="rounded-xl card bg-indigo-400 text-white p-8 space-y-4 flex-shrink-0 w-80">
                        <p class="text-xl font-semibold my-2 underline underline-offset-2 decoration-wavy decoration-indigo-500 decoration-2">Course Name</p>
                        <p class="text-gray-100">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae excepturi beatae sunt eveniet ipsa veritatis quaerat laboriosam voluptates, maxime dolor!</p>
                        <a href="" class="inline-block">
                            <button class="px-4 py-2 bg-indigo-800 font-bold rounded-full hover:-translate-y-1 transition-all">Take Course</button>
                        </a>
                    </div>
                    <div class="rounded-xl card bg-amber-400 text-white p-8 space-y-4 flex-shrink-0 w-80">
                        <p class="text-xl font-semibold my-2 underline underline-offset-2 decoration-wavy decoration-amber-500 decoration-2">Course Name</p>
                        <p class="text-gray-100">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae excepturi beatae sunt eveniet ipsa veritatis quaerat laboriosam voluptates, maxime dolor!</p>
                        <a href="" class="inline-block">
                            <button class="px-4 py-2 bg-amber-800 font-bold rounded-full hover:-translate-y-1 transition-all">Take Course</button>
                        </a>
                    </div>
                    <div class="rounded-xl card bg-lime-400 text-white p-8 space-y-4 flex-shrink-0 w-80">
                        <p class="text-xl font-semibold my-2 underline underline-offset-2 decoration-wavy decoration-lime-500 decoration-2">Course Name</p>
                        <p class="text-gray-100">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae excepturi beatae sunt eveniet ipsa veritatis quaerat laboriosam voluptates, maxime dolor!</p>
                        <a href="" class="inline-block">
                            <button class="px-4 py-2 bg-lime-800 font-bold rounded-full hover:-translate-y-1 transition-all">Take Course</button>
                        </a>
                    </div>
                </section>
            </section>
        </section>
        <section class="my-20">

        </section>
    </section>

</body>

</html>