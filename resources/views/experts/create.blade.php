<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Publish Conservation Tip') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-blue-50 to-indigo-50 min-h-screen">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl rounded-3xl border border-blue-100 p-8">
                <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                    Publish Conservation Advice
                </h3>

                <form method="POST" action="{{ route('expert.tips.store') }}" class="space-y-6">
                    @csrf

                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Tip Title / Hook</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" class="block w-full border-gray-200 rounded-xl focus:border-blue-500 focus:ring-blue-500 shadow-sm" placeholder="e.g. Save 10 Gallons with Aerators!" required>
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <!-- Content -->
                    <div>
                        <label for="content" class="block text-sm font-semibold text-gray-700 mb-2">Tip Content (Educational Advice)</label>
                        <textarea name="content" id="content" rows="5" class="block w-full border-gray-200 rounded-xl focus:border-blue-500 focus:ring-blue-500 shadow-sm" placeholder="Write comprehensive details about the conservation method..." required>{{ old('content') }}</textarea>
                        <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    </div>

                    <!-- Location Tag -->
                    <div>
                        <label for="location_tag" class="block text-sm font-semibold text-gray-700 mb-2">Location / Category Tag</label>
                        <input type="text" name="location_tag" id="location_tag" value="{{ old('location_tag') }}" class="block w-full border-gray-200 rounded-xl focus:border-blue-500 focus:ring-blue-500 shadow-sm" placeholder="e.g. Indoor, Garden, Kitchen, General" required>
                        <x-input-error :messages="$errors->get('location_tag')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end space-x-4 pt-4">
                        <a href="{{ route('expert.dashboard') }}" class="text-sm font-semibold text-gray-600 hover:text-gray-800">
                            Cancel
                        </a>
                        <button type="submit" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-bold py-3 px-8 rounded-full shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-1">
                            Publish Tip
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
