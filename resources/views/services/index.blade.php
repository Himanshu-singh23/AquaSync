<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white leading-tight">
            {{ __('Water Conservation Services Marketplace') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-blue-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Introduction Header -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white rounded-3xl p-8 shadow-2xl relative overflow-hidden border border-blue-500">
                <div class="absolute right-0 bottom-0 opacity-10 transform translate-x-12 translate-y-12">
                    <svg class="w-96 h-96" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" /></svg>
                </div>
                <div class="relative z-10 max-w-2xl">
                    <h3 class="text-3xl font-extrabold mb-2">Professional Water Solutions</h3>
                    <p class="text-blue-100 text-lg leading-relaxed">Book a vetted expert to audit your home's water systems, locate complex leaks, or install state-of-the-art smart conservation devices.</p>
                </div>
            </div>

            <!-- List Providers & Services -->
            <div class="space-y-12">
                @forelse($providers as $provider)
                    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border-2 border-blue-300 p-8 space-y-6">
                        <!-- Provider Info -->
                        <div class="flex items-center space-x-4 border-b border-gray-100 pb-4">
                            <div class="bg-blue-100 text-blue-600 rounded-2xl p-3">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-800">{{ $provider->name }}</h3>
                                <p class="text-sm text-blue-600 font-semibold flex items-center">
                                    <svg class="w-4 h-4 mr-1 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6.267 3.585a.75.75 0 011.026.244l1.04 1.777c.189.324.083.738-.236.938l-.667.417a.75.75 0 00-.284.996c.642 1.282 1.68 2.32 2.962 2.962a.75.75 0 00.996-.284l.417-.667c.2-.319.614-.425.938-.236l1.777 1.04a.75.75 0 01.244 1.026l-1.04 1.778a.75.75 0 01-1.026.244l-.766-.447c-2.316-1.353-4.22-3.257-5.573-5.573l-.447-.766z" clip-rule="evenodd" /></svg>
                                    Vetted Professional Utility Provider
                                </p>
                            </div>
                        </div>

                        <!-- Services Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @forelse($provider->services as $service)
                                <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100 flex flex-col justify-between hover:shadow-md transition group">
                                    <div>
                                        <div class="flex justify-between items-start mb-4">
                                            <h4 class="text-lg font-bold text-gray-800 group-hover:text-blue-600 transition">{{ $service->title }}</h4>
                                            <span class="bg-blue-100 text-blue-700 text-xs font-extrabold px-3 py-1 rounded-full uppercase tracking-wider">{{ $service->price }}</span>
                                        </div>
                                        <p class="text-sm text-gray-600 leading-relaxed mb-6">{{ $service->description }}</p>
                                    </div>
                                    <div class="pt-4 border-t border-gray-100 flex justify-between items-center">
                                        <span class="text-xs text-gray-400">Contact Provider</span>
                                        <a href="mailto:{{ $service->contact_email }}?subject=Inquiry: {{ urlencode($service->title) }}" class="text-sm font-bold text-blue-600 hover:text-blue-800 flex items-center">
                                            Book Service &rarr;
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <div class="col-span-full py-8 text-center text-gray-500 italic bg-gray-50 rounded-2xl border border-dashed border-gray-200">
                                    No services listed by this provider yet.
                                </div>
                            @endforelse
                        </div>
                    </div>
                @empty
                    <div class="py-12 text-center text-gray-500 italic bg-white rounded-3xl shadow border border-gray-100">
                        No approved water service providers are registered at the moment. Check back soon!
                    </div>
                @endforelse
            </div>

            <!-- Footer -->
            <footer class="pt-8 pb-4 mt-8 text-center text-sm text-blue-500 border-t border-gray-200">
                <p>&copy; {{ date('Y') }} AquaSync. All rights reserved.</p>
            </footer>
        </div>
    </div>
</x-app-layout>
