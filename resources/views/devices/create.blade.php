<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Add New Device') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 p-8">
                
                <form action="{{ route('devices.store') }}" method="POST">
                    @csrf
                    
                    <div class="space-y-6">
                        <!-- Device Name -->
                        <div>
                            <x-input-label for="name" :value="__('Device Name')" />
                            <x-text-input id="name" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm" type="text" name="name" :value="old('name')" required autofocus placeholder="e.g. Master Bathroom Sink" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Device Type -->
                        <div>
                            <x-input-label for="type" :value="__('Device Type')" />
                            <select id="type" name="type" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm">
                                <option value="sink">Sink Faucet</option>
                                <option value="shower">Shower Head</option>
                                <option value="toilet">Toilet</option>
                                <option value="washing_machine">Washing Machine</option>
                                <option value="dishwasher">Dishwasher</option>
                                <option value="sprinkler">Sprinkler / Irrigation</option>
                                <option value="other">Other</option>
                            </select>
                            <x-input-error :messages="$errors->get('type')" class="mt-2" />
                        </div>

                        <!-- Location -->
                        <div>
                            <x-input-label for="location" :value="__('Location in Home')" />
                            <x-text-input id="location" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm" type="text" name="location" :value="old('location')" placeholder="e.g. Kitchen, Garden, Basement" />
                            <x-input-error :messages="$errors->get('location')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-8">
                            <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-gray-700 font-medium px-4">
                                Cancel
                            </a>
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-full shadow-lg transition-transform transform hover:-translate-y-1">
                                Register Device
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
