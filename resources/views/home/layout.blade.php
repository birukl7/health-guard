<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/ee4b6626a1.js" crossorigin="anonymous"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Truculenta:opsz,wght@12..72,100..900&display=swap" rel="stylesheet">
  @vite('resources/css/app.css')
  <title>Document</title>
</head>
<body class="font font-GTpro bg-custom-vvlgary">
  <div class="flex max-w-screen-2xl mx-auto my-0">
  <header class="pr-3 w-80 pt-10 bg-custom-graish header-js transition-all  duration-200 ease-in-out">
      <div class="flex items-center gap-x-5 m-4 ">
        <span class="flex "><h1 class="text-3xl text-custom-blue font-bold">H</h1><h1 class="text-3xl text-custom-blue font-bold guard-js">ealth-Guard.</h1></span>

        <button class="px-3 py-1 bg-custom-vlgray rounded-lg nav-toggle-js"><i class="fa-solid fa-less-than text-sm font-light" style="font-size: 8px;" ></i></button>
      </div>

      <nav>
        <span class="text-custom-lgray text-sm capitalize mx-4">General</span>
        <ul>
          <a href="" class=" ">
            <li class="hover:bg-custom-vlgray cursor-pointer  py-5 pl-6 rounded-xl my-1"><div><i class="mr-4 fa-solid fa-user-doctor"></i><span>Pyschologists</span></div></li>
          </a>

          <a href="">
            <li class="hover:bg-custom-vlgray cursor-pointer  py-5 pl-6 rounded-xl my-1"><div><i class="mr-4 fa-solid fa-table-cells-large"></i><span>Dashboard</span></div></li>
          </a>
          
          <a href="">
            <li class="hover:bg-custom-vlgray cursor-pointer  py-5 pl-6 rounded-xl my-1"><div><i class="fa-regular fa-calendar mr-4"></i><span>Calender</span></div></li>
          </a>

          <a href="">
            <li class="hover:bg-custom-vlgray cursor-pointer  py-5 pl-6 rounded-xl my-1"><div><i class="mr-4 fa-solid fa-building-columns"></i><span>Education</span></div></li>
          </a>

          <a href="">
            <li class="hover:bg-custom-vlgray cursor-pointer  py-5 pl-6 rounded-xl my-1"><div><i class="mr-4 fa-regular fa-pen-to-square"></i><span>Blog</span></div></li>
          </a>
        </ul>

        <div class="mt-10">
          <span class="text-custom-lgray text-sm capitalize mx-4">Tools</span>
          <ul>
            <a href="">
              <li class="hover:bg-custom-vlgray cursor-pointer  py-5 pl-6 rounded-xl my-1"><div><i class="fa-regular fa-comments mr-4"></i><span>Chat</span></div></li>
            </a>

            <a href="">
              <li class="hover:bg-custom-vlgray cursor-pointer  py-5 pl-6 rounded-xl my-1"><div><i class="fa-solid fa-gear mr-4"></i><span>Settings</span></div></li>
            </a>
          </ul>
        </div>


        <ul>
          <a href="">
            <li class="hover:bg-custom-vlgray cursor-pointer  py-5 pl-6 rounded-xl my-1"><div><i class="fa-solid fa-arrow-right-from-bracket fa-rotate-180 mr-4"></i><span>Log out</span></div></li>
          </a>
        </ul>
      </nav>

    </header>
    @yield('content')
  </div>
</body>
</html>