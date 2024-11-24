          <!-- ---- Footer link   ----- -->

          <div
          class="mt-12 grid grid-cols-2 gap-8 xl:mt-0 xl:col-span-2"
      >
          <div class="md:grid md:grid-cols-2 md:gap-8">
              <div>
                  <h3
                      class="text-sm font-semibold text-gray-400 tracking-wide uppercase"
                  >
                      Solutions
                  </h3>
                  <div class="mt-4 space-y-4">
                      <a
                          href="#"
                          class="text-base text-gray-500 hover:text-gray-900 block font-semibold"
                      >
                          Marketing
                      </a>
                      <a
                          href="#"
                          class="text-base text-gray-500 hover:text-gray-900 block font-semibold"
                      >
                          Analytics
                      </a>
                      <a
                          href="#"
                          class="text-base text-gray-500 hover:text-gray-900 block font-semibold"
                      >
                          Commerce
                      </a>
                      <a
                          href="#"
                          class="text-base text-gray-500 hover:text-gray-900 block font-semibold"
                      >
                          Insights
                      </a>
                  </div>
              </div>

              <div class="mt-12 md:mt-0">
                  <h3
                      class="text-sm font-semibold text-gray-400 tracking-wide uppercase"
                  >
                      Support
                  </h3>
                  <div class="mt-4 space-y-4">
                      <a
                          href="#"
                          class="text-base text-gray-500 hover:text-gray-900 block font-semibold"
                      >
                          Pricing
                      </a>
                      <a
                          href="#"
                          class="text-base text-gray-500 hover:text-gray-900 block font-semibold"
                      >
                          Documentation
                      </a>
                      <a
                          href="#"
                          class="text-base text-gray-500 hover:text-gray-900 block font-semibold"
                      >
                          Guides
                      </a>
                      <a
                          href="#"
                          class="text-base text-gray-500 hover:text-gray-900 block font-semibold"
                      >
                          API Status
                      </a>
                  </div>
              </div>
          </div>

          <div class="md:grid md:grid-cols-2 md:gap-8">
              <div>
                  <h3
                      class="text-sm font-semibold text-gray-400 tracking-wide uppercase"
                  >
                      Company
                  </h3>
                  <div class="mt-4 space-y-4">
                      <a
                          href="#"
                          class="text-base text-gray-500 hover:text-gray-900 block font-semibold"
                      >
                          About
                      </a>
                      <a
                          href="#"
                          class="text-base text-gray-500 hover:text-gray-900 block font-semibold"
                      >
                          Blog
                      </a>
                      <a
                          href="#"
                          class="text-base text-gray-500 hover:text-gray-900 block font-semibold"
                      >
                          Jobs
                      </a>
                      <a
                          href="#"
                          class="text-base text-gray-500 hover:text-gray-900 block font-semibold"
                      >
                          Service
                      </a>
                  </div>
              </div>

              <div class="mt-12 md:mt-0">
                  <h3
                      class="text-sm font-semibold text-gray-400 tracking-wide uppercase"
                  >
                      Legal
                  </h3>
                  <div class="mt-4 space-y-4">
                      <a
                          href="#"
                          class="text-base text-gray-500 hover:text-gray-900 block font-semibold"
                      >
                          Claim
                      </a>
                      <a
                          href="#"
                          class="text-base text-gray-500 hover:text-gray-900 block font-semibold"
                      >
                          Privacy
                      </a>
                      <a
                          href="#"
                          class="text-base text-gray-500 hover:text-gray-900 block font-semibold"
                      >
                          Policy
                      </a>
                      <a
                          href="#"
                          class="text-base text-gray-500 hover:text-gray-900 block font-semibold"
                      >
                          Terms
                      </a>
                  </div>
              </div>
          </div>
      </div>
      <!-- ----End Footer link   ----- -->
  </div>
</div>
</footer>
<!-- ---- End Footer   ----- -->

<!-- ---- Copyright  ----- -->
<div class="bg-gray-800 py-4">
<div class="container flex items-center justify-between">
  <p class="text-white font-semibold">© Easy Learning 2022</p>

  <div>
      <img src="images/methods.png" class="h-5" />
  </div>
</div>
</div>

<!-- ---- End Copyright   ----- -->

<script>
let menuBar = document.querySelector("#menuBar");
let mobileMenu = document.querySelector("#mobileMenu");
let closeMenu = document.querySelector("#closeMenu");

menuBar.addEventListener("click", function () {
  mobileMenu.classList.remove("hidden");
});

closeMenu.addEventListener("click", function () {
  mobileMenu.classList.add("hidden");
});
</script>
</body>
</html>
