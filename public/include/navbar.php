<?php

function endsWith($string, $endString)
{
  $len = strlen($endString);
  if ($len == 0) {
    return true;
  }
  return (substr($string, -$len) === $endString);
}

function check_path($path)
{
  $url = $_SERVER["REQUEST_URI"];
  if ($path == "") {
    if (endsWith($url, "/")) {
      return true;
    }
    if (endsWith($url, "/index.php")) {
      return true;
    }
    return false;
  }
  if (strpos($_SERVER['REQUEST_URI'], $path) !== false) {
    return true;
  }
  return false;
}

echo "
    <!-- nav component starts  -->
    <header
      class='flex justify-between items-center h-20 max-w-[1400px] mx-auto px-8'
    >
      <div>
        <p class=''>Pixel IT Magic Solutions</p>
      </div>
      <!-- menu for desktop starts -->
      <nav class='hidden md:block'>
        <ul class='flex space-x-8'>
          <li
            class='text-lg " . (check_path("") ? "bg-gray-900 text-white" : "hover:bg-gray-300") . "  px-2 py-1 rounded-lg transition-all'
          >
            <a href='./'>Home</a>
          </li>
          
          <li
            class='text-lg " . (check_path("about") ? "bg-gray-900 text-white" : "hover:bg-gray-300") . " px-2 py-1  transition-all rounded-lg'
          >
            <a href='./about.php'>About Us</a>
          </li>
          <li
            class='text-lg  " . (check_path("courses") ? "bg-gray-900 text-white" : "hover:bg-gray-300") . "  px-2 py-1 transition-all rounded-lg'
          >
            <a href='./courses.php'>Courses</a>
          </li>
          <li
            class='text-lg " . (check_path("services") ? "bg-gray-900 text-white" : "hover:bg-gray-300") . "  px-2 py-1 transition-all rounded-lg'
          >
            <a href='./services.php'>Our Services</a>
          </li>
        </ul>
      </nav>
      <div class='hidden md:block'>
        <button>
          <a
            href='#'
            class='border-[3px] px-6 py-2 rounded-lg border-gray-500 hover:bg-black hover:text-white font-semibold transition-all'
            >Contact Us</a
          >
        </button>
      </div>
      <!-- menu for desktop ends -->

      <!-- mobile menu starts  -->
      <div class='md:hidden'>
        <input type='checkbox' id='menu' class='hidden peer' />
        <span
          class='w-7 h-[3px] bg-black block rounded relative peer-checked:bg-inherit peer-checked:after:rotate-45 peer-checked:before:-rotate-45 peer-checked:after:top-0 peer-checked:before:top-0 after:content-[''] before:content-[''] before:-top-2 after:top-2 before:absolute after:absolute after:w-full before:w-full after:h-full before:h-full after:block before:block after:rounded before:rounded after:bg-black before:bg-black before:transition-all before:duration-300 after:transition-all after:duration-300'
        >
          <label
            for='menu'
            class='w-full h-8 -top-4 absolute block z-50 cursor-pointer'
          ></label>
        </span>

        <div
          class='absolute z-50 pb-8 left-0 right-0 transition-all duration-300 peer-checked:top-28 md:hidden -top-[500px] rounded-sm space-y-4 flex flex-col w-11/12 mx-auto bg-gray-300 text-[#002635] text-center'
        >
          <a onclick='closeMenu()' class='py-2 mt-4' href='./'>Home</a>
          <a onclick='closeMenu()' class='py-2' href='./about.php'>About Us </a>
          <a onclick='closeMenu()' class='py-2' href='./courses.php'>Courses </a>
          <a onclick='closeMenu()' class='py-2 mb-4' href='./services.php'>Our Services</a>
          <button>
            <a
              href='#'
              onclick='closeMenu()'
              class='border-2 my-2 px-6 py-2 inline-block rounded-lg border-gray-500 font-semibold transition-all'
              >Contact Us</a
            >
          </button>
        </div>
      </div>
      <!-- mobile menu endss  -->
    </header>
    <script>
        function closeMenu() {
            document.getElementById('menu').checked = false;
        }
    </script>
    <!-- nav component ends  -->
";
