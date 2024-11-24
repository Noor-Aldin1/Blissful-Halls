@include('user.partials.nav')
    <!-- ---- End Mobile Side Bar ----- -->

    <!-- ---- BreadCrum ----- -->
    <div class="container py-4 flex justify-between">
      <div class="flex gap-3 items-center">
        <a href="index.html" class="text-primary text-base">
          <i class="fas fa-home"></i>
        </a>
        <span class="text-sm text-gray-500">
          <i class="fas fa-chevron-right"></i>
        </span>
        <p class="text-gray-500 font-medium uppercase">My Account</p>
      </div>
    </div>
    <!-- ---- End BreadCrum --->

    <!-- ---- Account Wrapper--->

    <div class="container lg:grid grid-cols-12 items-start gap-6 pt-4 pb-16">
      <!-- ---- Sidebar --->
    @include('user.partials.sidebar_acount')
      <!-- ----End Sidebar--->

      <!-- ----Account Content --->

      <div class="col-span-9 grid md:grid-cols-7 gap-4 mt-6 lg:mt-0">
        @include('user.acount_info_section.profile_edit')
        {{-- @include('user.acount_info_section.paycard_edit') --}}


        <!-- ----End single card --->
      </div>

      <!-- ----End Account Content--->
    </div>

    <!-- ---- End Account Wrapper --->

    <!-- ---- Start Footer  ----- -->
 @include('user.partials.footer')
