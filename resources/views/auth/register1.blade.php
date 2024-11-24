<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" class="text-dca73a" />
            <x-text-input id="name" class="block mt-1 w-full border-dca73a focus:ring-dca73a focus:border-dca73a" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" class="text-dca73a" />
            <x-text-input id="email" class="block mt-1 w-full border-dca73a focus:ring-dca73a focus:border-dca73a" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
        </div>

        <!-- Profile Image -->
        <div class="mt-4">
            <label for="Photo" class="text-dca73a">Profile Image</label>
            <input type="file" name="Photo" id="Photo" accept="image/*" class="block mt-1 w-full text-dca73a border-dca73a focus:ring-dca73a focus:border-dca73a">
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-dca73a" />
            <x-text-input id="password" class="block mt-1 w-full border-dca73a focus:ring-dca73a focus:border-dca73a" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-dca73a" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full border-dca73a focus:ring-dca73a focus:border-dca73a" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600" />
        </div>

        <!-- Already Registered & Register Button -->
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-dca73a hover:text-yellow-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-dca73a" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4 bg-dca73a hover:bg-yellow-600 text-white border-none">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>