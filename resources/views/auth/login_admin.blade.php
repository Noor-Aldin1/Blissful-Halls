@include('user.partials.nav')
<!-- ---- End Mobile Side Bar ----- -->

<!-- ---- Login Form Wrapper ----- -->

<div class="container py-16">
    <div class="max-w-lg mx-auto px-6 py-7 shadow rounded overflow-hidden">
        <h2 class="text-2xl uppercase font-medium mb-1 text-center">
            <span class="text-primary">Lessor</span> Login
        </h2>
        <p class="text-gray-600 mb-6 text-sm text-center">
            Login if you are a returning user
        </p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full"
                              type="password"
                              name="password"
                              required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div >
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <div class="mt-4">
                    <button
                        type="submit"
                        class="block w-full py-2 text-center text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium"
                    >
                    {{ __('Log in') }}
                </button>
                </div>
            </div>
        </form>



        <!-- ---- Login with Social ----- -->

        <p class="mt-4 text-gray-600 text-center">
            Don't have an account?
            <a href="#" class="text-primary">Register Now</a>
        </p>

        <!-- ---- End Login with Social ----- -->
    </div>
</div>

<!-- ---- End Login Form Wrapper ----- -->

@include('user.partials.footer')
