<?php

function render_course($path, $fromAdmin)
{

    require_once($path);
    $stmt = get_all_course($fromAdmin);

    if ($stmt) {
        $stmt->bind_result($course_id, $course_name, $course_title, $course_price, $course_description, $course_curriculum_brief, $course_aim, $course_objectives, $course_salient_features, $course_entry_criteria, $course_structure_downloadable, $course_url, $enrolled_count, $createdat, $updatedat);
        echo '<section class="my-8 flex items-center justify-between overflow-x-hidden no-wrap space-x-4 relative ">';
        echo '<section class="my-8 animatein flex items-center justify-between no-wrap space-x-4 overflow-x-scroll cursor-grab active:cursor-grabbing slider1" id="slider1">';
        while ($stmt->fetch()) {
            echo '
                    <div class="rounded-xl card text-white p-8 space-y-4 flex-shrink-0 w-80 lg:w-96 h-96 flex flex-col justify-between items-start">
                        <p class="text-xl font-semibold my-2 underline underline-offset-2 decoration-wavy decoration-2 text-decor">' . $course_title . '</p>
                        <div class="includes overflow-hidden" style="display: -webkit-box; -webkit-line-clamp: 9; -webkit-box-orient: vertical;">
                        ' . $course_description . '
                        <p>And more...</p>
                        <p class="my-4 font-bold">Price : ' . ($course_price !== 0 ?  number_format($course_price) : "Free") . '</p>
                        </div>
                            <a target="_blank" href="./courses/' . $course_url . '" class="inline-block">
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
}
