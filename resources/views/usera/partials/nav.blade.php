<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ecommerce - Tailwind Project</title>
    <link rel="stylesheet" href="{{asset('output/tailwind.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800;900&family=Roboto:wght@400;700;900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    @php
    $user = Auth::user();
@endphp
    <!-- ---- Start Header ----- -->

    <header class="py-4 shadow-sm bg-pink-100 lg:bg-white">
      <div class="container flex items-center justify-between">
        <!-- logo  -->
        <a href="#" class="block w-32">
          <img src="images/easyshop.png" alt="logo" class="w-full" />
        </a>
        <!-- logo end  -->
        <!-- search   -->
        <div class="w-full xl:max-w-xl lg:max-w-lg lg:flex relative hidden">
          <span class="absolute left-4 top-3 text-lg text-gray-400">
            <i class="fas fa-search"></i>
          </span>
          <input
            type="text"
            class="pl-12 w-full border border-r-0 border-primary py-3 px-3 rounded-l-md focus:ring-primary"
            placeholder="Search"
          />
          <button
            type="submit"
            class="bg-primary border border-primary text-white px-8 font-medium rounded-r-md hover:bg-transparent hover:text-primary transition"
          >
            Search
          </button>
        </div>

        <!-- search End  -->

        <!-- NavIcons -->

        <div class="space-x-4 flex items-center">
          <a
            href="#"
            class="block text-center text-gray-700 hover:text-primary transition relative"
          >
            <span
              class="absolute -right-0 -top-1 w-5 h-5 rounded-full flex items-center justify-center bg-primary text-white text-xs"
            >
              5
            </span>
            <div class="text-2xl">
              <i class="far fa-heart"></i>
            </div>
            <div class="text-sm font-semibold leading-3">Wish List</div>
          </a>

          <a
            href="#"
            class="block text-center text-gray-700 hover:text-primary transition relative"
          >
            <span
              class="absolute -right-2 -top-1 w-5 h-5 rounded-full flex items-center justify-center bg-primary text-white text-xs"
            >
              5
            </span>
            <div class="text-2xl">
              <i class="fas fa-shopping-bag"></i>
            </div>
            <div class="text-sm font-semibold leading-3">Cart</div>
          </a>

          <a
            href="#"
            class="block text-center text-gray-700 hover:text-primary transition relative"
          >
            <div class="text-2xl">
              <i class="fas fa-user"></i>
            </div>
            <div class="text-sm font-semibold leading-3">Account</div>
          </a>
        </div>
        <!-- NavIcons End  -->
      </div>
    </header>
    <!-- ---- End Header ----- -->

    <!-- ---- Start NavBar ----- -->
    <nav class="bg-gray-800 hidden lg:block">
      <div class="container">
        <div class="flex">
          <!-- ---- All Category ----- -->
          <div
            class="px-8 py-4 bg-primary flex items-center cursor-pointer group relative"
          >
            <span class="text-white">
              <i class="fas fa-bars"></i>
            </span>
            <span class="capitalize ml-2 text-white font-semibold"
              >All categories</span
            >

            <div
              class="absolute left-0 top-full w-full bg-white shadow-md py-3 invisible opacity-0 group-hover:opacity-100 group-hover:visible transition duration-300 z-50 divide-y divide-gray-300 divide-dashed"
            >
              <!-- ---- Start single category ----- -->
              <a
                href="#"
                class="px-6 py-3 flex items-center hover:bg-gray-100 transition"
              >
                <img
              src="{{ asset('images/icons/bed.svg') }}"
                  class="w-5 h-5 object-contain"
                />
                <span class="ml-6 text-gray-700 text-sm font-semibold">
                  BedRoom</span
                >
              </a>
              <!-- ---- single category End ----- -->

              <!-- ---- Start single category ----- -->
              <a
                href="#"
                class="px-6 py-3 flex items-center hover:bg-gray-100 transition"
              >
                <img
                  src="images/icons/sofa.svg"
                  class="w-5 h-5 object-contain"
                />
                <span class="ml-6 text-gray-700 text-sm font-semibold">
                  Sofa</span
                >
              </a>
              <!-- ---- single category End ----- -->

              <!-- ---- Start single category ----- -->
              <a
                href="#"
                class="px-6 py-3 flex items-center hover:bg-gray-100 transition"
              >
                <img
                  src="images/icons/office.svg"
                  class="w-5 h-5 object-contain"
                />
                <span class="ml-6 text-gray-700 text-sm font-semibold">
                  Office</span
                >
              </a>
              <!-- ---- single category End ----- -->

              <!-- ---- Start single category ----- -->
              <a
                href="#"
                class="px-6 py-3 flex items-center hover:bg-gray-100 transition"
              >
                <img
                  src="images/icons/outdoor-cafe.svg"
                  class="w-5 h-5 object-contain"
                />
                <span class="ml-6 text-gray-700 text-sm font-semibold">
                  OutDoor</span
                >
              </a>
              <!-- ---- single category End ----- -->

              <!-- ---- Start single category ----- -->
              <a
                href="#"
                class="px-6 py-3 flex items-center hover:bg-gray-100 transition"
              >
                <img
                  src="images/icons/terrace.svg"
                  class="w-5 h-5 object-contain"
                />
                <span class="ml-6 text-gray-700 text-sm font-semibold">
                  Mattress</span
                >
              </a>
              <!-- ---- single category End ----- -->

              <!-- ---- Start single category ----- -->
              <a
                href="#"
                class="px-6 py-3 flex items-center hover:bg-gray-100 transition"
              >
                <img
                  src="images/icons/sofa.svg"
                  class="w-5 h-5 object-contain"
                />
                <span class="ml-6 text-gray-700 text-sm font-semibold">
                  Sofa</span
                >
              </a>
              <!-- ---- single category End ----- -->
            </div>
          </div>

          <!-- ---- All Category End ----- -->

          <!-- ---- Nav Menu ----- -->

          <div class="flex items-center justify-between flex-grow pl-12">
            <div class="flex items-center space-x-6 text-base capitalize">
              <a
                href="index.html"
                class="text-gray-200 hover:text-white transition font-semibold"
              >
                Home
              </a>
              <a
                href="shop.html"
                class="text-gray-200 hover:text-white transition font-semibold"
              >
                Shop
              </a>
              <a
                href="index.html"
                class="text-gray-200 hover:text-white transition font-semibold"
              >
                About Us
              </a>
              <a
                href="index.html"
                class="text-gray-200 hover:text-white transition font-semibold"
              >
                Contact Us
              </a>
            </div>

            <a
              href="login.html"
              class="ml-auto text-gray-200 hover:text-white transition font-semibold"
            >
              Login/Register
            </a>
          </div>

          <!-- ---- Nav Menu End ----- -->
        </div>
      </div>
    </nav>
    <!-- ---- End NavBar ----- -->
