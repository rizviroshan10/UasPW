<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="tinggi_badan" :value="__('Tinggi Badan')" />

            <x-text-input id="tinggi_badan" class="block mt-1 w-full"
                            type="text"
                            name="tinggi_badan"/>

            <x-input-error :messages="$errors->get('tinggi_badan')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="berat_badan" :value="__('Berat Badan')" />

            <x-text-input id="berat_badan" class="block mt-1 w-full"
                            type="text"
                            name="berat_badan"/>

            <x-input-error :messages="$errors->get('berat_badan')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="alamat" :value="__('Alamat')" />

            <x-text-input id="alamat" class="block mt-1 w-full"
                            type="text"
                            name="alamat"/>

            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="no_hp" :value="__('No HP')" />

            <x-text-input id="no_hp" class="block mt-1 w-full"
                            type="text"
                            name="no_hp"/>

            <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
