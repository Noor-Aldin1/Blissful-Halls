@include('user.partials.nav')


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
                    src="images/icons/bed.svg"
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

      <!-- ---- Mobile Menu Bar ----- -->

      <div
        class="fixed w-full border-t border-gray-200 shadow-sm bg-white py-3 bottom-0 left-0 flex justify-around items-start px-6 lg:hidden z-40"
      >
        <a
          href="javascript:void(0)"
          class="block text-center text-gray-700 hover:text-primary transition relative"
        >
          <div class="text-2xl" id="menuBar">
            <i class="fas fa-bars"></i>
          </div>
          <div class="text-xs leading-3">Menu</div>
        </a>

        <a
          href=""
          class="block text-center text-gray-700 hover:text-primary transition relative"
        >
          <div class="text-2xl">
            <i class="fas fa-list-ul"></i>
          </div>
          <div class="text-xs leading-3">Category</div>
        </a>

        <a
          href=""
          class="block text-center text-gray-700 hover:text-primary transition relative"
        >
          <div class="text-2xl">
            <i class="fas fa-search"></i>
          </div>
          <div class="text-xs leading-3">Search</div>
        </a>

        <a
          href=""
          class="block text-center text-gray-700 hover:text-primary transition relative"
        >
          <span
            class="absolute -right-3 -top-1 w-5 h-5 rounded-full flex items-center justify-center bg-primary text-white text-xs"
            >5
          </span>
          <div class="text-2xl">
            <i class="fas fa-shopping-bag"></i>
          </div>
          <div class="text-xs leading-3">Cart</div>
        </a>
      </div>

      <!-- ----End Mobile Menu Bar ----- -->

      <!-- ---- Mobile Side Bar ----- -->

      <div
        class="fixed left-0 top-0 w-full h-full z-50 bg-black bg-opacity-30 shadow hidden"
        id="mobileMenu"
      >
        <div class="absolute left-0 top-0 w-72 h-full z-50 bg-white shadow">
          <div
            id="closeMenu"
            class="text-gray-400 hover:text-primary text-lg absolute right-3 top-3 cursor-pointer"
          >
            <i class="fas fa-times"></i>
          </div>
          <h3
            class="text-xl font-semibold text-white mb-2 font-roboto pl-4 pt-4 pb-4 bg-primary"
          >
            Menu
          </h3>
          <div>
            <a
              href="index.html"
              class="block px-4 py-4 font-medium transition hover:bg-gray-200"
            >
              Home
            </a>
            <a
              href="index.html"
              class="block px-4 py-4 font-medium transition hover:bg-gray-200"
            >
              Shop
            </a>

            <a
              href="index.html"
              class="block px-4 py-4 font-medium transition hover:bg-gray-200"
            >
              About Us
            </a>
            <a
              href="index.html"
              class="block px-4 py-4 font-medium transition hover:bg-gray-200"
            >
              Contact Us
            </a>
          </div>
        </div>
      </div>

      <!-- ---- End Mobile Side Bar ----- -->

      <!-- ---- Start Banner  ----- -->
      <div
        class="bg-cover bg-no-repeat bg-center py-36 relative"
        style="background-image: url('images/banner-bg.jpg')"
      >
        <div class="container">
          <!-- ---- Banner Content   ----- -->
          <h1
            class="xl:text-6xl md:text-5xl text-4xl text-gray-800 font-semibold mb-4"
          >
            Best Collection For <br class="hidden sm:block" />
            Home Decoration
          </h1>
          <p class="text-base text-gray-600 leading-6">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vulputate
            <br class="hidden sm:block" />
            rhoncus pellentesque id integer neque, vel accumsan dolor diam.
          </p>

          <div class="mt-12">
            <a
              href="shop.html"
              class="bg-primary border border-primary text-white px-8 py-3 font-medium rounded-md uppercase hover:bg-transparent hover:text-primary transition"
            >
              Shop Now
            </a>
          </div>
          <!-- ---- Banner Content End  ----- -->
        </div>
      </div>
      <!-- ---- End Banner ----- -->

      <!-- ---- Start Features  ----- -->

      <div class="container py-16">
        <div
          class="lg:w-10/12 grid md:grid-cols-3 lg:gap-6 mx-auto justify-center"
        >
          <!-- ---- Single Features  ----- -->
          <div
            class="border-primary border rounded-sm px-8 lg:px-3 lg:py-6 py-4 flex justify-center items-center gap-5 transition hover:border-slate-400 hover:bg-gray-200 duration-300"
          >
            <img
              src="images/icons/delivery-van.svg"
              class="lg:w-12 w-10 h-12 object-contain"
            />
            <div>
              <h4 class="font-medium capitalize text-lg">Free Shipping</h4>
              <p class="text-gray-500 text-xs lg:text-sm">Order Over $200</p>
            </div>
          </div>
          <!-- ----End  Single Features  ----- -->

          <!-- ---- Single Features  ----- -->
          <div
            class="border-primary border rounded-sm px-8 lg:px-3 lg:py-6 py-4 flex justify-center items-center gap-5 transition hover:border-slate-400 hover:bg-gray-200 duration-300"
          >
            <img
              src="images/icons/money-back.svg"
              class="lg:w-12 w-10 h-12 object-contain"
            />
            <div>
              <h4 class="font-medium capitalize text-lg">Money Returns</h4>
              <p class="text-gray-500 text-xs lg:text-sm">30 Days Money Return</p>
            </div>
          </div>
          <!-- ----End  Single Features  ----- -->

          <!-- ---- Single Features  ----- -->
          <div
            class="border-primary border rounded-sm px-8 lg:px-3 lg:py-6 py-4 flex justify-center items-center gap-5 transition hover:border-slate-400 hover:bg-gray-200 duration-300"
          >
            <img
              src="images/icons/service-hours.svg"
              class="lg:w-12 w-10 h-12 object-contain"
            />
            <div>
              <h4 class="font-medium capitalize text-lg">24/7 Support</h4>
              <p class="text-gray-500 text-xs lg:text-sm">Customer Support</p>
            </div>
          </div>
          <!-- ----End  Single Features  ----- -->
        </div>
      </div>

      <!-- ---- End Features  ----- -->

      <!-- ---- Start Categories  ----- -->

      <div class="container pb-16">
        <h2 class="text-2xl md:text-3xl font-medium text-gray-800 uppercase mb-6">
          Shop by Category
        </h2>
        <div class="grid lg:grid-cols-3 sm:grid-cols-2 gap-3">
          <!-- ---- Single Categories  ----- -->
          <div class="relative group rounded-sm overflow-hidden">
            <img src="images/category/category-1.jpg" class="w-full" />
            <a
              href="#"
              class="absolute inset-0 bg-black bg-opacity-40 group-hover:bg-opacity-50 flex items-center justify-center text-xl text-white font-roboto font-medium tracking-wide transition"
            >
              Bedroom
            </a>
          </div>
          <!-- ---- Single Categories End  ----- -->

          <!-- ---- Single Categories  ----- -->
          <div class="relative group rounded-sm overflow-hidden">
            <img src="images/category/category-2.jpg" class="w-full" />
            <a
              href="#"
              class="absolute inset-0 bg-black bg-opacity-40 group-hover:bg-opacity-50 flex items-center justify-center text-xl text-white font-roboto font-medium tracking-wide transition"
            >
              Sofa
            </a>
          </div>
          <!-- ---- Single Categories End  ----- -->

          <!-- ---- Single Categories  ----- -->
          <div class="relative group rounded-sm overflow-hidden">
            <img src="images/category/category-3.jpg" class="w-full" />
            <a
              href="#"
              class="absolute inset-0 bg-black bg-opacity-40 group-hover:bg-opacity-50 flex items-center justify-center text-xl text-white font-roboto font-medium tracking-wide transition"
            >
              Office
            </a>
          </div>
          <!-- ---- Single Categories End  ----- -->

          <!-- ---- Single Categories  ----- -->
          <div class="relative group rounded-sm overflow-hidden">
            <img src="images/category/category-4.jpg" class="w-full" />
            <a
              href="#"
              class="absolute inset-0 bg-black bg-opacity-40 group-hover:bg-opacity-50 flex items-center justify-center text-xl text-white font-roboto font-medium tracking-wide transition"
            >
              OutDoor
            </a>
          </div>
          <!-- ---- Single Categories End  ----- -->

          <!-- ---- Single Categories  ----- -->
          <div class="relative group rounded-sm overflow-hidden">
            <img src="images/category/category-5.jpg" class="w-full" />
            <a
              href="#"
              class="absolute inset-0 bg-black bg-opacity-40 group-hover:bg-opacity-50 flex items-center justify-center text-xl text-white font-roboto font-medium tracking-wide transition"
            >
              Mattress
            </a>
          </div>
          <!-- ---- Single Categories End  ----- -->

          <!-- ---- Single Categories  ----- -->
          <div class="relative group rounded-sm overflow-hidden">
            <img src="images/category/category-6.jpg" class="w-full" />
            <a
              href="#"
              class="absolute inset-0 bg-black bg-opacity-40 group-hover:bg-opacity-50 flex items-center justify-center text-xl text-white font-roboto font-medium tracking-wide transition"
            >
              Dinings
            </a>
          </div>
          <!-- ---- Single Categories End  ----- -->
        </div>
      </div>
      <!-- ---- End Categories  ----- -->

      <!-- ---- Start Top New Arrival  ----- -->

      <div class="container pb-16">
        <h2 class="text-2xl md:text-3xl font-medium text-gray-800 uppercase mb-6">
          Top New Arrival
        </h2>
        <div class="grid lg:grid-cols-4 sm:grid-cols-2 gap-6">
          <!-- ---- Start Single Product  ----- -->
          <div class="group rounded bg-white shadow overflow-hidden">
            <div class="relative">
              <img src="images/products/product1.jpg" class="w-full" />

              <div
                class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition"
              >
                <a
                  href="view.html"
                  class="text-white text-lg w-9 h-9 rounded-full bg-primary hover:bg-gray-800 transition flex items-center justify-center"
                >
                  <i class="fas fa-search"></i>
                </a>
                <a
                  href="#"
                  class="text-white text-lg w-9 h-9 rounded-full bg-primary hover:bg-gray-800 transition flex items-center justify-center"
                >
                  <i class="fas fa-heart"></i>
                </a>
              </div>
            </div>

            <div class="pt-4 pb-3 px-4">
              <a href="view.html">
                <h4
                  class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition"
                >
                  Guyer Chair
                </h4>
              </a>

              <div class="flex items-baseline mb-1 space-x-2">
                <p class="text-xl text-primary font-roboto font-semibold">
                  $45.00
                </p>
                <p class="text-sm text-gray-400 font-roboto line-through">
                  $55.00
                </p>
              </div>
              <div class="flex items-center">
                <div class="flex gap-1 text-sm text-yellow-400">
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                </div>
                <div class="text-xs text-gray-500 ml-3">(120)</div>
              </div>
            </div>

            <a
              href="#"
              class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b font-medium hover:bg-transparent hover:text-primary transition"
            >
              Add To Cart
            </a>
          </div>

          <!-- ---- End Single Product  ----- -->

          <!-- ---- Start Single Product  ----- -->
          <div class="group rounded bg-white shadow overflow-hidden">
            <div class="relative">
              <img src="images/products/product2.jpg" class="w-full" />

              <div
                class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition"
              >
                <a
                  href="view.html"
                  class="text-white text-lg w-9 h-9 rounded-full bg-primary hover:bg-gray-800 transition flex items-center justify-center"
                >
                  <i class="fas fa-search"></i>
                </a>
                <a
                  href="#"
                  class="text-white text-lg w-9 h-9 rounded-full bg-primary hover:bg-gray-800 transition flex items-center justify-center"
                >
                  <i class="fas fa-heart"></i>
                </a>
              </div>
            </div>

            <div class="pt-4 pb-3 px-4">
              <a href="view.html">
                <h4
                  class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition"
                >
                  Guyer Chair
                </h4>
              </a>

              <div class="flex items-baseline mb-1 space-x-2">
                <p class="text-xl text-primary font-roboto font-semibold">
                  $45.00
                </p>
                <p class="text-sm text-gray-400 font-roboto line-through">
                  $55.00
                </p>
              </div>
              <div class="flex items-center">
                <div class="flex gap-1 text-sm text-yellow-400">
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                </div>
                <div class="text-xs text-gray-500 ml-3">(120)</div>
              </div>
            </div>

            <a
              href="#"
              class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b font-medium hover:bg-transparent hover:text-primary transition"
            >
              Add To Cart
            </a>
          </div>

          <!-- ---- End Single Product  ----- -->

          <!-- ---- Start Single Product  ----- -->
          <div class="group rounded bg-white shadow overflow-hidden">
            <div class="relative">
              <img src="images/products/product3.jpg" class="w-full" />

              <div
                class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition"
              >
                <a
                  href="view.html"
                  class="text-white text-lg w-9 h-9 rounded-full bg-primary hover:bg-gray-800 transition flex items-center justify-center"
                >
                  <i class="fas fa-search"></i>
                </a>
                <a
                  href="#"
                  class="text-white text-lg w-9 h-9 rounded-full bg-primary hover:bg-gray-800 transition flex items-center justify-center"
                >
                  <i class="fas fa-heart"></i>
                </a>
              </div>
            </div>

            <div class="pt-4 pb-3 px-4">
              <a href="view.html">
                <h4
                  class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition"
                >
                  Guyer Chair
                </h4>
              </a>

              <div class="flex items-baseline mb-1 space-x-2">
                <p class="text-xl text-primary font-roboto font-semibold">
                  $45.00
                </p>
                <p class="text-sm text-gray-400 font-roboto line-through">
                  $55.00
                </p>
              </div>
              <div class="flex items-center">
                <div class="flex gap-1 text-sm text-yellow-400">
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                </div>
                <div class="text-xs text-gray-500 ml-3">(120)</div>
              </div>
            </div>

            <a
              href="#"
              class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b font-medium hover:bg-transparent hover:text-primary transition"
            >
              Add To Cart
            </a>
          </div>

          <!-- ---- End Single Product  ----- -->

          <!-- ---- Start Single Product  ----- -->
          <div class="group rounded bg-white shadow overflow-hidden">
            <div class="relative">
              <img src="images/products/product4.jpg" class="w-full" />

              <div
                class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition"
              >
                <a
                  href="view.html"
                  class="text-white text-lg w-9 h-9 rounded-full bg-primary hover:bg-gray-800 transition flex items-center justify-center"
                >
                  <i class="fas fa-search"></i>
                </a>
                <a
                  href="#"
                  class="text-white text-lg w-9 h-9 rounded-full bg-primary hover:bg-gray-800 transition flex items-center justify-center"
                >
                  <i class="fas fa-heart"></i>
                </a>
              </div>
            </div>

            <div class="pt-4 pb-3 px-4">
              <a href="view.html">
                <h4
                  class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition"
                >
                  Guyer Chair
                </h4>
              </a>

              <div class="flex items-baseline mb-1 space-x-2">
                <p class="text-xl text-primary font-roboto font-semibold">
                  $45.00
                </p>
                <p class="text-sm text-gray-400 font-roboto line-through">
                  $55.00
                </p>
              </div>
              <div class="flex items-center">
                <div class="flex gap-1 text-sm text-yellow-400">
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                </div>
                <div class="text-xs text-gray-500 ml-3">(120)</div>
              </div>
            </div>

            <a
              href="#"
              class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b font-medium hover:bg-transparent hover:text-primary transition"
            >
              Add To Cart
            </a>
          </div>

          <!-- ---- End Single Product  ----- -->
        </div>
      </div>

      <!-- ---- End Top New Arrival  ----- -->

      <!-- ---- Start Add  ----- -->
      <div class="container pb-16">
        <a href="#">
          <img src="images/offer.jpg" class="w-full" />
        </a>
      </div>
      <!-- ---- End Add  ----- -->

      <!-- ---- Start  Recomended for you   ----- -->

      <div class="container pb-16">
        <h2 class="text-2xl md:text-3xl font-medium text-gray-800 uppercase mb-6">
          Recomended For You
        </h2>
        <div class="grid lg:grid-cols-4 sm:grid-cols-2 gap-6">
          <!-- ---- Start Single Product  ----- -->
          <div class="group rounded bg-white shadow overflow-hidden">
            <div class="relative">
              <img src="images/products/product1.jpg" class="w-full" />

              <div
                class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition"
              >
                <a
                  href="view.html"
                  class="text-white text-lg w-9 h-9 rounded-full bg-primary hover:bg-gray-800 transition flex items-center justify-center"
                >
                  <i class="fas fa-search"></i>
                </a>
                <a
                  href="#"
                  class="text-white text-lg w-9 h-9 rounded-full bg-primary hover:bg-gray-800 transition flex items-center justify-center"
                >
                  <i class="fas fa-heart"></i>
                </a>
              </div>
            </div>

            <div class="pt-4 pb-3 px-4">
              <a href="view.html">
                <h4
                  class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition"
                >
                  Guyer Chair
                </h4>
              </a>

              <div class="flex items-baseline mb-1 space-x-2">
                <p class="text-xl text-primary font-roboto font-semibold">
                  $45.00
                </p>
                <p class="text-sm text-gray-400 font-roboto line-through">
                  $55.00
                </p>
              </div>
              <div class="flex items-center">
                <div class="flex gap-1 text-sm text-yellow-400">
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                </div>
                <div class="text-xs text-gray-500 ml-3">(120)</div>
              </div>
            </div>

            <a
              href="#"
              class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b font-medium hover:bg-transparent hover:text-primary transition"
            >
              Add To Cart
            </a>
          </div>

          <!-- ---- End Single Product  ----- -->

          <!-- ---- Start Single Product  ----- -->
          <div class="group rounded bg-white shadow overflow-hidden">
            <div class="relative">
              <img src="images/products/product2.jpg" class="w-full" />

              <div
                class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition"
              >
                <a
                  href="view.html"
                  class="text-white text-lg w-9 h-9 rounded-full bg-primary hover:bg-gray-800 transition flex items-center justify-center"
                >
                  <i class="fas fa-search"></i>
                </a>
                <a
                  href="#"
                  class="text-white text-lg w-9 h-9 rounded-full bg-primary hover:bg-gray-800 transition flex items-center justify-center"
                >
                  <i class="fas fa-heart"></i>
                </a>
              </div>
            </div>

            <div class="pt-4 pb-3 px-4">
              <a href="view.html">
                <h4
                  class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition"
                >
                  Guyer Chair
                </h4>
              </a>

              <div class="flex items-baseline mb-1 space-x-2">
                <p class="text-xl text-primary font-roboto font-semibold">
                  $45.00
                </p>
                <p class="text-sm text-gray-400 font-roboto line-through">
                  $55.00
                </p>
              </div>
              <div class="flex items-center">
                <div class="flex gap-1 text-sm text-yellow-400">
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                </div>
                <div class="text-xs text-gray-500 ml-3">(120)</div>
              </div>
            </div>

            <a
              href="#"
              class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b font-medium hover:bg-transparent hover:text-primary transition"
            >
              Add To Cart
            </a>
          </div>

          <!-- ---- End Single Product  ----- -->

          <!-- ---- Start Single Product  ----- -->
          <div class="group rounded bg-white shadow overflow-hidden">
            <div class="relative">
              <img src="images/products/product3.jpg" class="w-full" />

              <div
                class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition"
              >
                <a
                  href="view.html"
                  class="text-white text-lg w-9 h-9 rounded-full bg-primary hover:bg-gray-800 transition flex items-center justify-center"
                >
                  <i class="fas fa-search"></i>
                </a>
                <a
                  href="#"
                  class="text-white text-lg w-9 h-9 rounded-full bg-primary hover:bg-gray-800 transition flex items-center justify-center"
                >
                  <i class="fas fa-heart"></i>
                </a>
              </div>
            </div>

            <div class="pt-4 pb-3 px-4">
              <a href="view.html">
                <h4
                  class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition"
                >
                  Guyer Chair
                </h4>
              </a>

              <div class="flex items-baseline mb-1 space-x-2">
                <p class="text-xl text-primary font-roboto font-semibold">
                  $45.00
                </p>
                <p class="text-sm text-gray-400 font-roboto line-through">
                  $55.00
                </p>
              </div>
              <div class="flex items-center">
                <div class="flex gap-1 text-sm text-yellow-400">
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                </div>
                <div class="text-xs text-gray-500 ml-3">(120)</div>
              </div>
            </div>

            <a
              href="#"
              class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b font-medium hover:bg-transparent hover:text-primary transition"
            >
              Add To Cart
            </a>
          </div>

          <!-- ---- End Single Product  ----- -->

          <!-- ---- Start Single Product  ----- -->
          <div class="group rounded bg-white shadow overflow-hidden">
            <div class="relative">
              <img src="images/products/product4.jpg" class="w-full" />

              <div
                class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition"
              >
                <a
                  href="view.html"
                  class="text-white text-lg w-9 h-9 rounded-full bg-primary hover:bg-gray-800 transition flex items-center justify-center"
                >
                  <i class="fas fa-search"></i>
                </a>
                <a
                  href="#"
                  class="text-white text-lg w-9 h-9 rounded-full bg-primary hover:bg-gray-800 transition flex items-center justify-center"
                >
                  <i class="fas fa-heart"></i>
                </a>
              </div>
            </div>

            <div class="pt-4 pb-3 px-4">
              <a href="view.html">
                <h4
                  class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition"
                >
                  Guyer Chair
                </h4>
              </a>

              <div class="flex items-baseline mb-1 space-x-2">
                <p class="text-xl text-primary font-roboto font-semibold">
                  $45.00
                </p>
                <p class="text-sm text-gray-400 font-roboto line-through">
                  $55.00
                </p>
              </div>
              <div class="flex items-center">
                <div class="flex gap-1 text-sm text-yellow-400">
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                </div>
                <div class="text-xs text-gray-500 ml-3">(120)</div>
              </div>
            </div>

            <a
              href="#"
              class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b font-medium hover:bg-transparent hover:text-primary transition"
            >
              Add To Cart
            </a>
          </div>

          <!-- ---- End Single Product  ----- -->

          <!-- ---- Start Single Product  ----- -->
          <div class="group rounded bg-white shadow overflow-hidden">
            <div class="relative">
              <img src="images/products/product5.jpg" class="w-full" />

              <div
                class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition"
              >
                <a
                  href="view.html"
                  class="text-white text-lg w-9 h-9 rounded-full bg-primary hover:bg-gray-800 transition flex items-center justify-center"
                >
                  <i class="fas fa-search"></i>
                </a>
                <a
                  href="#"
                  class="text-white text-lg w-9 h-9 rounded-full bg-primary hover:bg-gray-800 transition flex items-center justify-center"
                >
                  <i class="fas fa-heart"></i>
                </a>
              </div>
            </div>

            <div class="pt-4 pb-3 px-4">
              <a href="view.html">
                <h4
                  class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition"
                >
                  Guyer Chair
                </h4>
              </a>

              <div class="flex items-baseline mb-1 space-x-2">
                <p class="text-xl text-primary font-roboto font-semibold">
                  $45.00
                </p>
                <p class="text-sm text-gray-400 font-roboto line-through">
                  $55.00
                </p>
              </div>
              <div class="flex items-center">
                <div class="flex gap-1 text-sm text-yellow-400">
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                </div>
                <div class="text-xs text-gray-500 ml-3">(120)</div>
              </div>
            </div>

            <a
              href="#"
              class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b font-medium hover:bg-transparent hover:text-primary transition"
            >
              Add To Cart
            </a>
          </div>

          <!-- ---- End Single Product  ----- -->

          <!-- ---- Start Single Product  ----- -->
          <div class="group rounded bg-white shadow overflow-hidden">
            <div class="relative">
              <img src="images/products/product6.jpg" class="w-full" />

              <div
                class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition"
              >
                <a
                  href="view.html"
                  class="text-white text-lg w-9 h-9 rounded-full bg-primary hover:bg-gray-800 transition flex items-center justify-center"
                >
                  <i class="fas fa-search"></i>
                </a>
                <a
                  href="#"
                  class="text-white text-lg w-9 h-9 rounded-full bg-primary hover:bg-gray-800 transition flex items-center justify-center"
                >
                  <i class="fas fa-heart"></i>
                </a>
              </div>
            </div>

            <div class="pt-4 pb-3 px-4">
              <a href="view.html">
                <h4
                  class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition"
                >
                  Guyer Chair
                </h4>
              </a>

              <div class="flex items-baseline mb-1 space-x-2">
                <p class="text-xl text-primary font-roboto font-semibold">
                  $45.00
                </p>
                <p class="text-sm text-gray-400 font-roboto line-through">
                  $55.00
                </p>
              </div>
              <div class="flex items-center">
                <div class="flex gap-1 text-sm text-yellow-400">
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                </div>
                <div class="text-xs text-gray-500 ml-3">(120)</div>
              </div>
            </div>

            <a
              href="#"
              class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b font-medium hover:bg-transparent hover:text-primary transition"
            >
              Add To Cart
            </a>
          </div>

          <!-- ---- End Single Product  ----- -->

          <!-- ---- Start Single Product  ----- -->
          <div class="group rounded bg-white shadow overflow-hidden">
            <div class="relative">
              <img src="images/products/product7.jpg" class="w-full" />

              <div
                class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition"
              >
                <a
                  href="view.html"
                  class="text-white text-lg w-9 h-9 rounded-full bg-primary hover:bg-gray-800 transition flex items-center justify-center"
                >
                  <i class="fas fa-search"></i>
                </a>
                <a
                  href="#"
                  class="text-white text-lg w-9 h-9 rounded-full bg-primary hover:bg-gray-800 transition flex items-center justify-center"
                >
                  <i class="fas fa-heart"></i>
                </a>
              </div>
            </div>

            <div class="pt-4 pb-3 px-4">
              <a href="view.html">
                <h4
                  class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition"
                >
                  Guyer Chair
                </h4>
              </a>

              <div class="flex items-baseline mb-1 space-x-2">
                <p class="text-xl text-primary font-roboto font-semibold">
                  $45.00
                </p>
                <p class="text-sm text-gray-400 font-roboto line-through">
                  $55.00
                </p>
              </div>
              <div class="flex items-center">
                <div class="flex gap-1 text-sm text-yellow-400">
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                </div>
                <div class="text-xs text-gray-500 ml-3">(120)</div>
              </div>
            </div>

            <a
              href="#"
              class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b font-medium hover:bg-transparent hover:text-primary transition"
            >
              Add To Cart
            </a>
          </div>

          <!-- ---- End Single Product  ----- -->

          <!-- ---- Start Single Product  ----- -->
          <div class="group rounded bg-white shadow overflow-hidden">
            <div class="relative">
              <img src="images/products/product8.jpg" class="w-full" />

              <div
                class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition"
              >
                <a
                  href="view.html"
                  class="text-white text-lg w-9 h-9 rounded-full bg-primary hover:bg-gray-800 transition flex items-center justify-center"
                >
                  <i class="fas fa-search"></i>
                </a>
                <a
                  href="#"
                  class="text-white text-lg w-9 h-9 rounded-full bg-primary hover:bg-gray-800 transition flex items-center justify-center"
                >
                  <i class="fas fa-heart"></i>
                </a>
              </div>
            </div>

            <div class="pt-4 pb-3 px-4">
              <a href="view.html">
                <h4
                  class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition"
                >
                  Guyer Chair
                </h4>
              </a>

              <div class="flex items-baseline mb-1 space-x-2">
                <p class="text-xl text-primary font-roboto font-semibold">
                  $45.00
                </p>
                <p class="text-sm text-gray-400 font-roboto line-through">
                  $55.00
                </p>
              </div>
              <div class="flex items-center">
                <div class="flex gap-1 text-sm text-yellow-400">
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                  <span><i class="fas fa-star"></i> </span>
                </div>
                <div class="text-xs text-gray-500 ml-3">(120)</div>
              </div>
            </div>

            <a
              href="#"
              class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b font-medium hover:bg-transparent hover:text-primary transition"
            >
              Add To Cart
            </a>
          </div>

          <!-- ---- End Single Product  ----- -->
        </div>
      </div>

      <!-- ---- End Recomended for you   ----- -->

	@include('user.partials.footer')
