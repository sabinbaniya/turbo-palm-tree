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
      if (endsWith($url, "courses/")) {
        return false;
      }
      return true;
    }
    if (endsWith($url, "/index.php")) {
      if (endsWith($url, "courses/index.php")) {
        return false;
      }
      return true;
    }
    return false;
  }
  if (strpos($_SERVER['REQUEST_URI'], $path) !== false) {
    return true;
  }
  return false;
}

function get_relative_path($path)
{
  $url = $_SERVER["REQUEST_URI"];
  if (endsWith($url, "courses/") || endsWith($url, "courses/index.php")) {
    switch ($path) {
      case "":
        return "../index.php";
        break;
      case "about":
        return "../about.php";
        break;
      case "courses":
        return "./";
        break;
      case "services":
        return "../services.php";
        break;
      case "contact":
        return "../contact.php";
        break;
    }
  }
  switch ($path) {
    case "":
      return "./index.php";
      break;
    case "about":
      return "./about.php";
      break;
    case "courses":
      return "./courses";
      break;
    case "services":
      return "./services.php";
      break;
    case "contact":
      return "./contact.php";
      break;
  }
}

echo "
    <!-- nav component starts  -->
    <header
      class='flex justify-between items-center h-20 max-w-[1400px] mx-auto px-8'
    >
      <div>
        <p class=''>D & B Engineering</p>
      </div>
      <!-- menu for desktop starts -->
      <nav class='hidden lg:block'>
        <ul class='flex space-x-8'>
          <li
          >
            <a href='"  . get_relative_path("") .  "'
            class='text-lg inline-block " . (check_path("") ? "bg-gray-900 text-white" : "hover:bg-gray-300") . "  px-2 py-1 rounded-lg transition-all'
            >Home</a>
          </li>
          
          <li
          >
            <a href='"  . get_relative_path("about") .  "' 
            class='text-lg inline-block " . (check_path("about") ? "bg-gray-900 text-white" : "hover:bg-gray-300") . " px-2 py-1  transition-all rounded-lg'
            >About Us</a>
          </li>
          <li
          >
            <a href='"  . get_relative_path("courses") .  "'
            class='text-lg inline-block  " . (check_path("courses") ? "bg-gray-900 text-white" : "hover:bg-gray-300") . "  px-2 py-1 transition-all rounded-lg'
            >Courses</a>
          </li>
          <li
          >
            <a href='"  . get_relative_path("services") .  "'
            class='text-lg inline-block " . (check_path("services") ? "bg-gray-900 text-white" : "hover:bg-gray-300") . "  px-2 py-1 transition-all rounded-lg'
            >Our Services</a>
          </li>
        </ul>
      </nav>
      <div class='hidden lg:block'>
      " .
  (get_relative_path("courses") === "./" ?
    "<button>
          <a
            href='./login.php'
            class='border-[3px] px-6 py-2 rounded-lg border-gray-500 hover:bg-black hover:text-white font-semibold transition-all'
            >Login</a
          >
        </button>" :
    "<button>
          <a
            href='" . get_relative_path("contact") . "'
            class='border-[3px] px-6 py-2 rounded-lg border-gray-500 hover:bg-black hover:text-white font-semibold transition-all'
            >Contact Us</a
          >
        </button>")
  . "
        
      </div>
      <!-- menu for desktop ends -->

      <!-- mobile menu starts  -->
      <div class='lg:hidden'>
        <input type='checkbox' id='menu' class='hidden peer' />
        <span
          class='w-7 h-[3px] bg-black block rounded relative peer-checked:bg-inherit peer-checked:after:rotate-45 peer-checked:before:-rotate-45 peer-checked:after:top-0 peer-checked:before:top-0 after:content-[\"\"] before:content-[\"\"] before:-top-2 after:top-2 before:absolute after:absolute after:w-full before:w-full after:h-full before:h-full after:block before:block after:rounded before:rounded after:bg-black before:bg-black before:transition-all before:duration-300 after:transition-all after:duration-300'
        >
          <label
            for='menu'
            class='w-full h-8 -top-4 absolute block z-50 cursor-pointer'
          ></label>
        </span>

        <div
          class='absolute z-50 pb-8 left-0 right-0 transition-all duration-300 peer-checked:top-28 lg:hidden -top-[500px] rounded-sm space-y-4 flex flex-col w-11/12 mx-auto bg-gray-300 text-[#002635] text-center'
        >
          <a onclick='closeMenu()' class='py-2 mt-4' href='"  . get_relative_path("") .  "'>Home</a>
          <a onclick='closeMenu()' class='py-2' href='"  . get_relative_path("about") .  "'>About Us </a>
          <a onclick='closeMenu()' class='py-2' href='"  . get_relative_path("courses") .  "'>Courses </a>
          <a onclick='closeMenu()' class='py-2 mb-4' href='"  . get_relative_path("services") .  "'>Our Services</a>
          " .
  (get_relative_path("courses") === "./" ?
    "<button>
          <a
            href='./login.php'
            class='border-[3px] px-6 py-2 rounded-lg border-gray-500 hover:bg-black hover:text-white font-semibold transition-all'
            >Login</a
          >
        </button>" :
    "<button>
          <a
            href='" . get_relative_path("contact") . "'
            class='border-[3px] px-6 py-2 rounded-lg border-gray-500 hover:bg-black hover:text-white font-semibold transition-all'
            >Contact Us</a
          >
        </button>")
  . "
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
