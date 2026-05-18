<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Service Provider Panel') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-blue-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md shadow-sm" role="alert">
                <p class="font-bold">Success</p>
                <p>{{ session('success') }}</p>
            </div>
            @endif

            <!-- Dashboard Summary card -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-3xl border border-gray-100 p-8 flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <div>
                    <h3 class="text-2xl font-bold text-gray-800">Your Water Conservation Offerings</h3>
                    <p class="text-sm text-gray-500 mt-1">Manage the services that users can discover in the platform marketplace.</p>
                </div>
                <a href="{{ route('provider.services.create') }}" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-bold py-3 px-8 rounded-full shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-1">
                    + Add New Service
                </a>
            </div>

            <!-- Provider Services list -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($services as $service)
                    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-md flex flex-col justify-between hover:shadow-lg transition">
                        <div>
                            <div class="flex justify-between items-start mb-4">
                                <h4 class="text-lg font-bold text-gray-800">{{ $service->title }}</h4>
                                <span class="bg-blue-100 text-blue-700 text-xs font-bold px-3 py-1 rounded-full">{{ $service->price }}</span>
                            </div>
                            <p class="text-sm text-gray-600 leading-relaxed">{{ $service->description }}</p>
                        </div>
                        <div class="mt-6 pt-4 border-t border-gray-100 flex justify-between items-center text-xs text-gray-400">
                            <span>Contact: {{ $service->contact_email }}</span>
                            <form method="POST" action="{{ route('provider.services.destroy', $service) }}" onsubmit="return confirm('Are you sure you want to delete this service?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 font-bold transition">
                                    Delete Listing
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-16 text-center bg-white rounded-3xl border-2 border-dashed border-gray-200">
                        <svg class="mx-auto h-12 w-12 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No services created</h3>
                        <p class="mt-1 text-sm text-gray-500">Get started by creating your first service offering for customers.</p>
                        <div class="mt-6">
                            <a href="{{ route('provider.services.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                                Create a Service
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>
