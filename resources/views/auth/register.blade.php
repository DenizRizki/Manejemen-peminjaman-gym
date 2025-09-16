<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900 px-4 py-12">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 w-full max-w-5xl rounded-lg shadow-xl overflow-hidden bg-white dark:bg-gray-800">

                <div class="p-8 md:p-12">
                    <div class="mb-8 flex justify-center">
                        <a href="/">
                            <img src="{{ asset('img/Screenshot 2025-09-15 213035.png') }}" alt="Logo Gym" class="w-24 h-24 md:w-32 md:h-32">
                        </a>
                    </div>
                    
                    <h2 class="text-2xl font-bold text-center text-gray-800 dark:text-gray-200 mb-6">Daftar Akun</h2>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div>
                            <x-input-label for="name" :value="__('Nama')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" class="block mt-1 w-full"
                                          type="password"
                                          name="password"
                                          required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                          type="password"
                                          name="password_confirmation" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                                {{ __('Sudah punya akun?') }}
                            </a>

                            <x-primary-button class="ms-4">
                                {{ __('Daftar') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>

                <div class="hidden lg:block">
                    <img src="{{ asset('img/image.jpg') }}" alt="Gambar Gym" class="w-full h-full object-cover">
                </div>

            </div>
        </div>
    </body>
</html>