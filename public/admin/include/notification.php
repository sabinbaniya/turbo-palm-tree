<?php
function notification($text, $type)
{
    switch ($type) {
        case "success":
            echo "
            <div class='max-w-[1400px] px-8 mx-auto pt-4'>
                <div class='bg-green-400 text-white font-bold rounded-lg py-4 px-2 slidein'>
                    " . $text . "
                </div>
            </div>
            ";
            break;
        case "failure":
            echo "
            <div class='max-w-[1400px] px-8 mx-auto pt-4'>
                <div class='bg-red-400 text-white font-bold rounded-lg py-4 px-2 slidein'>
                    " . $text . "
                </div>
            </div>
            ";
    }
}
