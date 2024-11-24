<div class="col-span-3">
    @php
    $user = Auth::user();
@endphp
    <!-- ---- User Profile --->
    <div class="px-4 py-3 shadow flex bg-gray-100 items-center gap-4">
      <div class="flex-shrink-0">
        <img
          src="{{ asset($user->Photo) }}"
          class="relative inline-block h-12 w-12 !rounded-full  object-cover object-center"        />
      </div>
      <div>
        <p class="text-gray-600">Hello..</p>
        <h4 class="text-gray-800 capitalize font-semibold">   {{ old('name', $user->name) }}</h4>
      </div>
    </div>
    <!-- ----End User Profile --->

    <!-- ---- Profile Link --->
    <div
      class="mt-6 bg-gray-100 shadow rounded p-4 divide-y divide-gray-200 space-y-4 text-gray-600"
    >
      <!-- ---- single Link --->
      <div class="space-y-1 pl-8">
        <a
          href="{{ url('user/acountinfo/profile') }}"
          class="relative text-base font-medium capitalize hover:text-primary transition block text-primary"
        >
          Manage Account
          <span class="absolute -left-8 top-0 text-base">
            <i class="far fa-address-card"></i>
          </span>
        </a>

      </div>
      <!-- ---- End single Link --->

      <!-- ---- single Link --->
      <div class="space-y-1 pl-8 pt-4">
        <a
          href="{{ url('/user/acountinfo/card') }}"
          class="relative text-base font-medium capitalize hover:text-primary transition block text-primary"
        >
          Payment Method
          <span class="absolute -left-8 top-0 text-base">
            <i class="far fa-credit-card"></i>
          </span>
        </a>
      </div>
      <!-- ---- End single Link --->

      <!-- ---- single Link --->
      <div class="space-y-1 pl-8 pt-4">
        <a
          href="#"
          class="relative text-base font-medium capitalize hover:text-primary transition block text-primary"
        >
          My wishlist
          <span class="absolute -left-8 top-0 text-base">
            <i class="far fa-heart"></i>
          </span>
        </a>
      </div>
      <!-- ---- End single Link --->

      <!-- ---- single Link --->

      <div class="space-y-1 pl-8 pt-4">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a
              href="#"
              class="relative text-base font-medium capitalize hover:text-primary transition block text-primary"
              onclick="event.preventDefault(); this.closest('form').submit();"
            >
              Logout
              <span class="absolute -left-8 top-0 text-base">
                <i class="fas fa-sign-out-alt"></i>
              </span>
            </a>
        </form>
    </div>

      <!-- ---- End single Link --->
    </div>

    <!-- ----End Profile Link --->
  </div>
