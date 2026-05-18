<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Add New Service Offering') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-blue-50 to-indigo-50 min-h-screen">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl rounded-3xl border border-blue-100 p-8">
                <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    List a Conservation Service
                </h3>

                <form method="POST" action="{{ route('provider.services.store') }}" class="space-y-6">
                    @csrf

                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Service Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" class="block w-full border-gray-200 rounded-xl focus:border-blue-500 focus:ring-blue-500 shadow-sm" placeholder="e.g. Smart Irrigation Audit" required>
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Detailed Description</label>
                        <textarea name="description" id="description" rows="4" class="block w-full border-gray-200 rounded-xl focus:border-blue-500 focus:ring-blue-500 shadow-sm" placeholder="Explain the service value, process, and tools used..." required>{{ old('description') }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <!-- Price -->
                    <div>
                        <label for="price" class="block text-sm font-semibold text-gray-700 mb-2">Pricing/Rate</label>
                        <input type="text" name="price" id="price" value="{{ old('price') }}" class="block w-full border-gray-200 rounded-xl focus:border-blue-500 focus:ring-blue-500 shadow-sm" placeholder="e.g. $150 Fixed, or $50/hr" required>
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>

                    <!-- Contact Email -->
                    <div>
                        <label for="contact_email" class="block text-sm font-semibold text-gray-700 mb-2">Contact Email for Inquiries</label>
                        <input type="email" name="contact_email" id="contact_email" value="{{ old('contact_email', auth()->user()->email) }}" class="block w-full border-gray-200 rounded-xl focus:border-blue-500 focus:ring-blue-500 shadow-sm" required>
                        <x-input-error :messages="$errors->get('contact_email')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end space-x-4 pt-4">
                        <a href="{{ route('provider.dashboard') }}" class="text-sm font-semibold text-gray-600 hover:text-gray-800">
                            Cancel
                        </a>
                        <button type="submit" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-bold py-3 px-8 rounded-full shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-1">
                            Publish Offering
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
