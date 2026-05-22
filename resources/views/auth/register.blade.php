<x-guest-layout>
    <style>
        /* Flowing dark blue background */
        body {
            background: linear-gradient(-45deg, #020617, #0f172a, #1e3a8a, #0f172a);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            margin: 0;
            padding: 0;
        }
        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        /* Make layout transparent to show the body background */
        .min-h-screen {
            background-color: transparent !important;
        }

        /* Form container matching background */
        .sm\:max-w-md {
            background-color: rgba(15, 23, 42, 0.6) !important; /* Semi-transparent dark slate */
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.5), 0 8px 10px -6px rgba(0, 0, 0, 0.5) !important;
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }

        /* Form text to white */
        label, .text-gray-600, .text-sm, a {
            color: #ffffff !important;
        }

        /* Input styles for better visibility on dark */
        input[type="text"], input[type="email"], input[type="password"], select {
            background-color: rgba(255, 255, 255, 0.1) !important;
            color: #ffffff !important;
            border: 1px solid rgba(255, 255, 255, 0.2) !important;
        }

        input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus, select:focus {
            background-color: rgba(255, 255, 255, 0.15) !important;
            border-color: #3b82f6 !important; /* blue-500 */
            box-shadow: 0 0 0 1px #3b82f6 !important;
        }

        /* Select dropdown options */
        select option {
            background-color: #0f172a;
            color: #ffffff;
        }

        /* Update primary button */
        button {
            background-color: #1e3a8a !important; /* Dark blue button */
            color: white !important;
            border: 1px solid rgba(255, 255, 255, 0.3) !important;
            transition: all 0.3s ease;
        }
        button:hover {
            background-color: #1e40af !important;
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06) !important;
        }
    </style>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Role Selection -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Register As')" />
            <select id="role" name="role" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="user">{{ __('Standard User (Water Conservationist)') }}</option>
                <option value="provider">{{ __('Service Provider (Plumber, Utility)') }}</option>
                <option value="expert">{{ __('Water Conservation Expert') }}</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
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

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
