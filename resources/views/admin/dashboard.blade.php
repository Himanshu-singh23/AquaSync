<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-cyan-100 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-cyan-950 min-h-screen text-slate-200">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            @if(session('success'))
            <div class="bg-cyan-900/80 border-l-4 border-cyan-400 text-cyan-100 p-4 rounded-xl shadow-md transition duration-300" role="alert">
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5 text-cyan-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    <p class="font-bold">Success</p>
                </div>
                <p class="mt-1 text-sm text-cyan-200">{{ session('success') }}</p>
            </div>
            @endif

            <!-- Admin Overview Banner (Cyber twilight slate card) -->
            <div class="bg-[#041d2c] rounded-3xl p-8 shadow-2xl relative overflow-hidden text-cyan-50 border border-cyan-800/80 backdrop-blur-md">
                <div class="absolute top-0 left-0 right-0 h-[2px] bg-gradient-to-r from-teal-400 via-cyan-500 to-blue-600"></div>
                <div class="absolute right-0 bottom-0 opacity-10 transform translate-x-12 translate-y-12 pointer-events-none text-cyan-500">
                    <svg class="w-96 h-96" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M2.166 11.372a.75.75 0 011.05-.172 8.25 8.25 0 0013.564 0 .75.75 0 111.222.868 9.75 9.75 0 01-16.008 0 .75.75 0 01.172-1.046zM10 2a8 8 0 00-8 8 .75.75 0 01-1.5 0 9.5 9.5 0 0119 0 .75.75 0 01-1.5 0 8 8 0 00-8-8z" clip-rule="evenodd" /></svg>
                </div>
                <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <div class="max-w-2xl space-y-2">
                        <h3 class="text-3xl font-black tracking-tight text-cyan-100">Platform Command Center</h3>
                        <p class="text-cyan-300/80 text-base leading-relaxed font-medium">Moderate content, approve new professionals, and maintain community standards across the AquaSync database.</p>
                    </div>
                    <div class="shrink-0">
                        <div class="inline-flex items-center space-x-2 bg-cyan-950/80 border border-cyan-500/30 text-cyan-400 px-4 py-2 rounded-full text-xs font-black shadow-md uppercase tracking-wider">
                            <span class="relative flex h-2.5 w-2.5">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-cyan-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-cyan-500"></span>
                            </span>
                            <span>System Status: Online</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modern Interactive Tabs Component -->
            <div class="bg-cyan-900/30 rounded-3xl shadow-xl overflow-hidden border border-cyan-800/50 backdrop-blur-md">
                <!-- Tab Buttons Navigation -->
                <div class="border-b border-cyan-800/50 bg-cyan-950/50 flex flex-wrap">
                    <button onclick="switchTab('pending')" id="tab-btn-pending" class="px-8 py-5 text-sm font-extrabold border-b-4 border-cyan-400 text-cyan-400 focus:outline-none transition-all flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.952 11.952 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        <span>Pending Validations</span>
                        <span class="ml-2 bg-cyan-900 text-cyan-300 text-xs px-2.5 py-0.5 rounded-full font-black border border-cyan-700">{{ $pendingUsers->count() }}</span>
                    </button>
                    <button onclick="switchTab('tips')" id="tab-btn-tips" class="px-8 py-5 text-sm font-extrabold border-b-4 border-transparent text-cyan-600/70 hover:text-cyan-300 hover:border-cyan-700 focus:outline-none transition-all flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                        <span>Manage Expert Tips</span>
                        <span class="ml-2 bg-blue-900 text-blue-300 text-xs px-2.5 py-0.5 rounded-full font-black border border-blue-800">{{ $tips->count() }}</span>
                    </button>
                    <button onclick="switchTab('services')" id="tab-btn-services" class="px-8 py-5 text-sm font-extrabold border-b-4 border-transparent text-cyan-600/70 hover:text-cyan-300 hover:border-cyan-700 focus:outline-none transition-all flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <span>Manage Services</span>
                        <span class="ml-2 bg-teal-900 text-teal-300 text-xs px-2.5 py-0.5 rounded-full font-black border border-teal-800">{{ $services->count() }}</span>
                    </button>
                    <button onclick="switchTab('users')" id="tab-btn-users" class="px-8 py-5 text-sm font-extrabold border-b-4 border-transparent text-cyan-600/70 hover:text-cyan-300 hover:border-cyan-700 focus:outline-none transition-all flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        <span>Manage Users</span>
                        <span class="ml-2 bg-indigo-900 text-indigo-300 text-xs px-2.5 py-0.5 rounded-full font-black border border-indigo-800">{{ $allUsers->count() }}</span>
                    </button>
                </div>

                <!-- Tab Panel: Pending Validations -->
                <div id="tab-panel-pending" class="tab-panel p-8">
                    @if($pendingUsers->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-cyan-800/50">
                                <thead class="bg-cyan-950/50">
                                    <tr>
                                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-cyan-500 uppercase tracking-wider">Name</th>
                                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-cyan-500 uppercase tracking-wider">Email</th>
                                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-cyan-500 uppercase tracking-wider">Role Requested</th>
                                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-cyan-500 uppercase tracking-wider">Registered On</th>
                                        <th scope="col" class="px-6 py-4 text-right text-xs font-bold text-cyan-500 uppercase tracking-wider">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-transparent divide-y divide-cyan-800/50">
                                    @foreach($pendingUsers as $user)
                                        <tr class="hover:bg-cyan-900/30 transition">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="font-bold text-cyan-100">{{ $user->name }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-cyan-400 font-semibold">{{ $user->email }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-extrabold rounded-full {{ $user->role === 'expert' ? 'bg-blue-900/50 text-blue-300 border border-blue-700' : 'bg-teal-900/50 text-teal-300 border border-teal-700' }} uppercase">
                                                    {{ $user->role }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-cyan-600 font-bold">
                                                {{ $user->created_at->format('M d, Y') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <form action="{{ route('admin.users.validate', $user) }}" method="POST" class="inline-block" onsubmit="return confirm('Approve this professional registration?');">
                                                    @csrf
                                                    <button type="submit" class="text-cyan-950 bg-cyan-400 hover:bg-cyan-300 font-bold px-5 py-2.5 rounded-full shadow-md shadow-cyan-900/50 hover:shadow-lg transition transform hover:-translate-y-0.5">
                                                        Approve
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-16">
                            <svg class="mx-auto h-16 w-16 text-cyan-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h3 class="mt-4 text-lg font-bold text-cyan-100">All caught up!</h3>
                            <p class="mt-2 text-sm text-cyan-400/70 font-medium">There are no pending professionals waiting for validation.</p>
                        </div>
                    @endif
                </div>

                <!-- Tab Panel: Manage Expert Tips -->
                <div id="tab-panel-tips" class="tab-panel p-8 hidden">
                    @if($tips->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-cyan-800/50 align-middle">
                                <thead class="bg-cyan-950/50">
                                    <tr>
                                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-cyan-500 uppercase tracking-wider">Tip</th>
                                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-cyan-500 uppercase tracking-wider">Expert Author</th>
                                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-cyan-500 uppercase tracking-wider">Location Tag</th>
                                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-cyan-500 uppercase tracking-wider">Published</th>
                                        <th scope="col" class="px-6 py-4 text-right text-xs font-bold text-cyan-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-transparent divide-y divide-cyan-800/50">
                                    @foreach($tips as $tip)
                                        <tr class="hover:bg-cyan-900/30 transition">
                                            <td class="px-6 py-4 max-w-md">
                                                <div class="font-bold text-cyan-100">{{ $tip->title }}</div>
                                                <div class="text-xs text-cyan-400/70 mt-1 font-semibold truncate">{{ Str::limit($tip->content, 90) }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-bold text-cyan-300">
                                                    {{ $tip->user ? $tip->user->name : 'System Seeded' }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="inline-block bg-teal-900/50 text-teal-300 text-xs px-2.5 py-0.5 rounded-full font-bold uppercase border border-teal-700/50">
                                                    {{ $tip->location_tag ?? 'general' }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-cyan-600 font-semibold">
                                                {{ $tip->created_at->diffForHumans() }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <form action="{{ route('admin.tips.destroy', $tip) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to permanently delete this expert tip?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="inline-flex items-center space-x-1.5 bg-rose-900/30 text-rose-400 hover:bg-rose-800 hover:text-white border border-rose-800 hover:border-transparent px-3.5 py-1.5 rounded-xl text-xs font-black transition-all duration-200 shadow-sm hover:shadow-md transform active:scale-95">
                                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                        <span>Delete</span>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-16">
                            <svg class="mx-auto h-16 w-16 text-cyan-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h3 class="mt-4 text-lg font-bold text-cyan-100">No Expert Tips Published</h3>
                            <p class="mt-2 text-sm text-cyan-400/70 font-medium">Any tips created by our approved Experts will appear here.</p>
                        </div>
                    @endif
                </div>

                <!-- Tab Panel: Manage Services -->
                <div id="tab-panel-services" class="tab-panel p-8 hidden">
                    @if($services->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($services as $service)
                                <div class="bg-cyan-950/40 rounded-2xl p-6 border border-cyan-700/50 shadow-md flex flex-col justify-between hover:shadow-lg hover:shadow-cyan-900/50 transition duration-200">
                                    <div>
                                        <div class="flex justify-between items-start mb-4">
                                            <h4 class="text-lg font-bold text-cyan-100">{{ $service->title }}</h4>
                                            <span class="bg-teal-900/50 text-teal-300 border border-teal-700/50 text-xs font-black px-3 py-1 rounded-full uppercase tracking-wider">
                                                {{ $service->price }}
                                            </span>
                                        </div>
                                        <p class="text-sm text-cyan-200/80 leading-relaxed font-medium mb-4">{{ Str::limit($service->description, 120) }}</p>
                                    </div>
                                    <div class="pt-4 border-t border-cyan-800/50 space-y-3">
                                        <div class="flex items-center justify-between text-xs text-cyan-500 font-semibold">
                                            <span>Provider: <strong class="text-cyan-300">{{ $service->user ? $service->user->name : 'Unknown Provider' }}</strong></span>
                                        </div>
                                        <div class="flex items-center justify-between">
                                            <span class="text-xs text-cyan-500 font-semibold">{{ $service->contact_email }}</span>
                                            <form action="{{ route('admin.services.destroy', $service) }}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this service offering?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex items-center space-x-1.5 bg-rose-900/30 text-rose-400 hover:bg-rose-800 hover:text-white border border-rose-800 hover:border-transparent px-3.5 py-1.5 rounded-xl text-xs font-black transition-all duration-200 shadow-sm hover:shadow-md transform active:scale-95">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                    <span>Delete Listing</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-16">
                            <svg class="mx-auto h-16 w-16 text-cyan-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                            <h3 class="mt-4 text-lg font-bold text-cyan-100">No Services Listed</h3>
                            <p class="mt-2 text-sm text-cyan-400/70 font-medium">Registered service providers have not created any offerings yet.</p>
                        </div>
                    @endif
                </div>

                <!-- Tab Panel: Manage Users -->
                <div id="tab-panel-users" class="tab-panel p-8 hidden">
                    @if($allUsers->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-cyan-800/50 align-middle">
                                <thead class="bg-cyan-950/50">
                                    <tr>
                                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-cyan-500 uppercase tracking-wider">Name</th>
                                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-cyan-500 uppercase tracking-wider">Email</th>
                                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-cyan-500 uppercase tracking-wider">Role</th>
                                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-cyan-500 uppercase tracking-wider">Registered On</th>
                                        <th scope="col" class="px-6 py-4 text-right text-xs font-bold text-cyan-500 uppercase tracking-wider">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-transparent divide-y divide-cyan-800/50">
                                    @foreach($allUsers as $user)
                                        <tr class="hover:bg-cyan-900/30 transition">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="font-bold text-cyan-100">{{ $user->name }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-cyan-400 font-semibold">{{ $user->email }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-extrabold rounded-full {{ $user->role === 'expert' ? 'bg-blue-900/50 text-blue-300 border border-blue-700' : ($user->role === 'provider' ? 'bg-teal-900/50 text-teal-300 border border-teal-700' : 'bg-slate-800 text-slate-300 border border-slate-700') }} uppercase">
                                                    {{ $user->role }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-cyan-600 font-semibold">
                                                {{ $user->created_at->format('M d, Y') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to permanently delete this user account?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="inline-flex items-center space-x-1.5 bg-rose-900/30 text-rose-400 hover:bg-rose-800 hover:text-white border border-rose-800 hover:border-transparent px-3.5 py-1.5 rounded-xl text-xs font-black transition-all duration-200 shadow-sm hover:shadow-md transform active:scale-95">
                                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                        <span>Delete Account</span>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-16">
                            <svg class="mx-auto h-16 w-16 text-cyan-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <h3 class="mt-4 text-lg font-bold text-cyan-100">No Users Found</h3>
                        </div>
                    @endif
                </div>
            </div>
            <footer class="fixed bottom-0 left-0 w-full pt-2 pb-4 bg-slate-900 text-center text-sm text-cyan-500/60 border-t border-cyan-800/30 z-200">
                <p>&copy; {{ date('Y') }} AquaSync. All rights reserved.</p>
            </footer>
        </div>
    </div>

    <!-- Switch Tab Javascript Logic -->
    <script>
        function switchTab(tabId) {
            // Hide all tab panels
            document.querySelectorAll('.tab-panel').forEach(panel => {
                panel.classList.add('hidden');
            });
            // Show requested tab panel
            document.getElementById('tab-panel-' + tabId).classList.remove('hidden');

            // Reset all tab button styles to inactive
            document.querySelectorAll('[id^="tab-btn-"]').forEach(btn => {
                btn.classList.remove('border-cyan-400', 'text-cyan-400');
                btn.classList.add('border-transparent', 'text-cyan-600/70');
            });

            // Set current tab button style to active
            const activeBtn = document.getElementById('tab-btn-' + tabId);
            activeBtn.classList.remove('border-transparent', 'text-cyan-600/70');
            activeBtn.classList.add('border-cyan-400', 'text-cyan-400');
        }
    </script>
</x-app-layout>
