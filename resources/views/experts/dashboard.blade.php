<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Conservation Expert Suite') }}
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

            <!-- Summary header card -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-3xl border border-gray-100 p-8 flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <div>
                    <h3 class="text-2xl font-bold text-gray-800">Your Water Conservation Tips</h3>
                    <p class="text-sm text-gray-500 mt-1">Write helpful tips and guidelines to educate the community on modern water conservation techniques.</p>
                </div>
                <a href="{{ route('expert.tips.create') }}" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-bold py-3 px-8 rounded-full shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-1">
                    + Publish a Tip
                </a>
            </div>

            <!-- Published Tips list -->
            <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100">
                    <h4 class="text-xl font-bold text-gray-800">Platform Tips Database</h4>
                </div>
                <div class="divide-y divide-gray-100">
                    @forelse($tips as $tip)
                        <div class="p-6 hover:bg-gray-50 transition flex justify-between items-start space-x-4">
                            <div class="space-y-1 flex-1">
                                <h5 class="text-lg font-bold text-gray-800">{{ $tip->title }}</h5>
                                <p class="text-sm text-gray-600 leading-relaxed">{{ $tip->content }}</p>
                                @if($tip->location_tag)
                                    <span class="inline-block bg-teal-100 text-teal-800 text-xs px-2.5 py-0.5 rounded-full font-bold uppercase">{{ $tip->location_tag }}</span>
                                @endif
                            </div>
                            <div class="flex flex-col items-end space-y-4">
                                <span class="text-xs text-gray-400 font-semibold whitespace-nowrap">{{ $tip->created_at->diffForHumans() }}</span>
                                @if($tip->user_id === auth()->id())
                                <form method="POST" action="{{ route('expert.tips.destroy', $tip) }}" onsubmit="return confirm('Are you sure you want to delete this tip?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm text-red-500 hover:text-red-700 font-bold transition">
                                        Delete
                                    </button>
                                </form>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="p-12 text-center text-gray-500 italic">
                            No tips published yet. Help the community by publishing your first tip!
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
