<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Log Water Usage') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-blue-50 to-indigo-50 min-h-screen">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl rounded-3xl border border-blue-100 p-8">
                <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    Record Water Consumption
                </h3>

                <form method="POST" action="{{ route('usages.store') }}" class="space-y-6">
                    @csrf

                    <!-- Device -->
                    <div>
                        <label for="device_id" class="block text-sm font-semibold text-gray-700 mb-2">Select Device</label>
                        <select id="device_id" name="device_id" class="block w-full border-gray-200 rounded-xl focus:border-blue-500 focus:ring-blue-500 shadow-sm" required>
                            <option value="">-- Choose a Device --</option>
                            @foreach($devices as $device)
                                <option value="{{ $device->id }}" {{ old('device_id', request('device_id')) == $device->id ? 'selected' : '' }}>
                                    {{ $device->name }} ({{ $device->location }})
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('device_id')" class="mt-2" />
                    </div>

                    <!-- Consumed Liters -->
                    <div>
                        <label for="consumed_liters" class="block text-sm font-semibold text-gray-700 mb-2">Water Consumed (Liters)</label>
                        <div class="relative rounded-md shadow-sm">
                            <input type="number" step="0.01" min="0.01" name="consumed_liters" id="consumed_liters" value="{{ old('consumed_liters') }}" class="block w-full border-gray-200 rounded-xl focus:border-blue-500 focus:ring-blue-500 pr-12" placeholder="e.g. 15.5" required>
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm font-bold">L</span>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('consumed_liters')" class="mt-2" />
                    </div>

                    <!-- Recorded At -->
                    <div>
                        <label for="recorded_at" class="block text-sm font-semibold text-gray-700 mb-2">Date & Time of Usage</label>
                        <input type="datetime-local" name="recorded_at" id="recorded_at" value="{{ old('recorded_at', now()->format('Y-m-d\TH:i')) }}" class="block w-full border-gray-200 rounded-xl focus:border-blue-500 focus:ring-blue-500 shadow-sm" required>
                        <x-input-error :messages="$errors->get('recorded_at')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end space-x-4 pt-4">
                        <a href="{{ route('dashboard') }}" class="text-sm font-semibold text-gray-600 hover:text-gray-800">
                            Cancel
                        </a>
                        <button type="submit" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-bold py-3 px-8 rounded-full shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-1">
                            Save Consumption
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
