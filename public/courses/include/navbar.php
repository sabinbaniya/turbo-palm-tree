<?php
function check_path($path)
{
  $url = $_SERVER["REQUEST_URI"];
  if (strpos($url, $path) !== false) {
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
        <p class=''>Welcome " . $_SESSION["username"] . "</p>
      </div>
      <!-- menu for desktop starts -->
      <nav class='hidden lg:block'>
        <ul class='flex space-x-8'>
          <li
          >
            <a href='./dashboard.php'
            class='text-lg inline-block " . (check_path("dashboard") ? "bg-gray-900 text-white" : "hover:bg-gray-300") . "  px-2 py-1 rounded-lg transition-all'
            >Dashboard</a>
          </li>
            <a href='./settings.php'
            class='text-lg inline-block  " . (check_path("settings") ? "bg-gray-900 text-white" : "hover:bg-gray-300") . "  px-2 py-1 transition-all rounded-lg'
            >Settings</a>
          </li>
        </ul>
      </nav>
      <div class='hidden lg:block'>
        <button>
          <a
            href='./logout.php'
            class='border-[3px] px-6 py-2 rounded-lg border-red-500 hover:bg-red-700 hover:text-white font-semibold transition-all'
            >Log Out  <i class='fa-solid fa-arrow-right-from-bracket' style='margin-left: 6px'></i> </a
          >
        </button>
        
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
          <a onclick='closeMenu()' class='py-2 mt-4' href='./dashboard.php'>Dashboard</a>
          <a onclick='closeMenu()' class='py-2' href='./settings.php'>Settings</a>
        <button>
          <a
            href='./logout.php'
            class='border-[3px] px-6 py-2 rounded-lg border-red-500 hover:bg-red-700 hover:text-white font-semibold transition-all'
            >Log Out</a
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
