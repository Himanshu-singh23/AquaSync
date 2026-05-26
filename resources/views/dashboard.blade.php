<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-cyan-100 leading-tight">
            {{ __('Smart Water Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-white min-h-screen text-slate-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            @if(session('success'))
            <div class="bg-cyan-900/80 border-l-4 border-cyan-400 text-cyan-100 p-4 rounded-md shadow-sm" role="alert">
                <p class="font-bold">Success</p>
                <p>{{ session('success') }}</p>
            </div>
            @endif

            @if(session('warning'))
            <div class="bg-orange-900/80 border-l-4 border-orange-400 text-orange-100 p-4 rounded-md shadow-sm" role="alert">
                <p class="font-bold flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>
                    Goal Exceeded
                </p>
                <p>{{ session('warning') }}</p>
            </div>
            @endif

            @if(in_array(auth()->user()->role, ['provider', 'expert']) && !auth()->user()->is_validated)
            <div class="bg-blue-900/50 border-l-4 border-blue-400 text-blue-100 p-6 rounded-2xl shadow-md space-y-2 border border-blue-800" role="alert">
                <p class="font-bold text-lg flex items-center">
                    <svg class="w-6 h-6 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    Awaiting Administrator Validation
                </p>
                <p class="text-sm">Your account as a <strong class="uppercase text-blue-300">{{ auth()->user()->role }}</strong> has been registered. An administrator needs to validate your credentials before you can access all features. We will notify you once approved!</p>
            </div>
            @endif

            @if(auth()->user()->role === 'provider' && auth()->user()->is_validated)
            <div class="bg-gradient-to-r from-cyan-800 to-blue-900 rounded-2xl p-6 shadow-lg text-white flex justify-between items-center border border-cyan-700/50">
                <div>
                    <h4 class="text-lg font-bold text-cyan-50">Provider Mode Active</h4>
                    <p class="text-sm text-cyan-200/80">List your professional conservation services in the marketplace.</p>
                </div>
                <a href="{{ route('provider.dashboard') }}" class="bg-cyan-500/20 hover:bg-cyan-500/40 text-cyan-100 font-bold py-2 px-6 rounded-full border border-cyan-400/50 transition shadow">
                    Open Provider Panel &rarr;
                </a>
            </div>
            @endif

            @if(auth()->user()->role === 'expert' && auth()->user()->is_validated)
            <div class="bg-gradient-to-r from-teal-800 to-cyan-900 rounded-2xl p-6 shadow-lg text-white flex justify-between items-center border border-teal-700/50">
                <div>
                    <h4 class="text-lg font-bold text-teal-50">Expert Mode Active</h4>
                    <p class="text-sm text-teal-200/80">Write and publish water conservation guides and tips.</p>
                </div>
                <a href="{{ route('expert.dashboard') }}" class="bg-teal-500/20 hover:bg-teal-500/40 text-teal-100 font-bold py-2 px-6 rounded-full border border-teal-400/50 transition shadow">
                    Open Expert Panel &rarr;
                </a>
            </div>
            @endif

            <!-- Top Stats Row -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <!-- Total Usage Card -->
                <div class="bg-cyan-900/40 backdrop-blur-sm overflow-hidden shadow-xl sm:rounded-2xl border border-cyan-800/50 transform transition hover:scale-105 duration-300">
                    <div class="p-6 bg-gradient-to-br from-cyan-800/80 to-blue-900/80 text-white h-full">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-bold text-cyan-100">Total Usage</h3>
                            <svg class="w-8 h-8 text-cyan-400 opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                        </div>
                        <p class="text-4xl font-extrabold mt-4 text-cyan-50">{{ $totalUsage ?? 0 }} <span class="text-xl font-medium text-cyan-200">Liters</span></p>
                    </div>
                </div>

                <!-- Monthly Goal Card -->
                <div class="bg-teal-900/40 backdrop-blur-sm overflow-hidden shadow-xl sm:rounded-2xl border border-teal-800/50 transform transition hover:scale-105 duration-300">
                    <div class="p-6 bg-gradient-to-br from-teal-800/80 to-cyan-900/80 text-white h-full">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-bold text-teal-100">Monthly Goal</h3>
                            <svg class="w-8 h-8 text-teal-400 opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <p class="text-4xl font-extrabold mt-4 text-teal-50">
                            @if($currentGoal)
                                {{ $currentGoal->target_liters_per_month }} <span class="text-xl font-medium text-teal-200">Liters</span>
                            @else
                                <span class="text-2xl font-semibold opacity-90 text-teal-100/70">Not set</span>
                            @endif
                        </p>
                        <!-- Goal form -->
                        <form action="{{ route('goals.store') }}" method="POST" class="mt-4">
                            @csrf
                            <div class="flex items-center space-x-2">
                                <input type="number" name="target_liters_per_month" placeholder="Liters" min="0" required
                                    class="flex-1 px-4 py-2 rounded-full bg-cyan-950/50 border border-teal-700/50 text-cyan-100 placeholder-teal-400/50 focus:outline-none focus:ring-2 focus:ring-teal-400"
                                    value="{{ old('target_liters_per_month', $currentGoal->target_liters_per_month ?? '') }}">
                                <button type="submit" class="bg-teal-500 hover:bg-teal-400 text-teal-950 font-bold py-2 px-4 rounded-full transition">Set</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Admin Action Card (If Admin) -->
                @if(auth()->user()->role === 'admin')
                <div class="bg-blue-900/40 backdrop-blur-sm overflow-hidden shadow-xl sm:rounded-2xl border border-blue-800/50 transform transition hover:scale-105 duration-300">
                    <div class="p-6 bg-gradient-to-br from-blue-800/80 to-indigo-900/80 text-white flex flex-col justify-between h-full">
                        <div>
                            <h3 class="text-lg font-bold text-blue-100">Admin Controls</h3>
                            <p class="text-sm text-blue-200/80 mt-1">Manage platform participants</p>
                        </div>
                        <a href="{{ route('admin.dashboard') }}" class="mt-4 inline-flex items-center text-sm font-semibold bg-blue-500/20 text-blue-100 py-2 px-4 rounded-full border border-blue-400/50 hover:bg-blue-500/40 transition">
                            Open Admin Panel &rarr;
                        </a>
                    </div>
                </div>
                @else
                <!-- Tips Card -->
                <div class="bg-cyan-900/40 backdrop-blur-sm overflow-hidden shadow-xl sm:rounded-2xl border border-cyan-800/50 flex flex-col justify-between">
                    <div class="p-6 bg-gradient-to-br from-cyan-900/60 to-blue-900/60 h-full flex flex-col">
                        <h3 class="text-lg font-bold text-cyan-100 flex items-center">
                            <svg class="w-5 h-5 text-cyan-400 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M11 3a1 1 0 10-2 0v1a1 1 0 102 0V3zM15.657 5.757a1 1 0 00-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM5.05 6.464A1 1 0 106.464 5.05l-.707-.707a1 1 0 00-1.414 1.414l.707.707zM5 10a1 1 0 01-1 1H3a1 1 0 110-2h1a1 1 0 011 1zM8 16v-1h4v1a2 2 0 11-4 0zM12 14c.015-.34.208-.646.477-.859a4 4 0 10-4.954 0c.27.213.462.519.476.859h4.002z"></path></svg>
                            Did you know?
                        </h3>
                        <div class="mt-4 space-y-3 flex-1">
                            @forelse($tips as $tip)
                                <div class="bg-cyan-950/50 rounded-lg p-3 text-sm text-cyan-100 border-l-4 border-cyan-400">
                                    <strong class="block mb-1 text-cyan-300">{{ $tip->title }}</strong>
                                    {{ $tip->content }}
                                </div>
                            @empty
                                <p class="text-sm text-cyan-400/70 italic">No tips available right now. Keep conserving!</p>
                            @endforelse
                        </div>
                    </div>
                    <div class="p-4 bg-cyan-950/80 border-t border-cyan-800/50 flex justify-between items-center">
                        <span class="text-xs text-cyan-400/70">Need professional help?</span>
                        <a href="{{ route('services.catalog') }}" class="text-sm font-bold text-cyan-300 hover:text-cyan-100 flex items-center transition">
                            Browse Services &rarr;
                        </a>
                    </div>
                </div>
                @endif
            </div>

            <!-- Devices Section -->
            <div class="bg-cyan-700 backdrop-blur-md overflow-hidden shadow-xl sm:rounded-2xl border border-cyan-800/50">
                <div class="p-6 lg:p-8 border-b border-cyan-800/30">
                    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
                        <h2 class="text-2xl font-bold text-cyan-100">Connected Devices</h2>
                        <div class="flex flex-wrap gap-4 justify-center">
                            <a href="{{ route('usages.create') }}" class="bg-cyan-500 hover:bg-cyan-400 text-cyan-950 font-bold py-2 px-6 rounded-full shadow-lg shadow-cyan-900/50 transition-transform transform hover:-translate-y-1">
                                Log Water Usage
                            </a>
                            <a href="{{ route('devices.create') }}" class="bg-blue-600 hover:bg-blue-500 text-blue-50 font-bold py-2 px-6 rounded-full shadow-lg shadow-blue-900/50 transition-transform transform hover:-translate-y-1">
                                + Add Device
                            </a>
                        </div>
                    </div>

                    @if($devices && $devices->count() > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($devices as $device)
                                <div class="border border-cyan-700/50 rounded-xl p-5 hover:shadow-lg hover:shadow-cyan-900/50 transition duration-300 relative group bg-cyan-950/40">
                                    <div class="absolute top-0 right-0 mt-4 mr-4 text-cyan-600 group-hover:text-cyan-400 transition">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                    <h4 class="text-lg font-bold text-cyan-100">{{ $device->name }}</h4>
                                    <p class="text-sm text-cyan-400/70 capitalize">{{ $device->type }} &bull; {{ $device->location }}</p>
                                    <div class="mt-4 pt-4 border-t border-cyan-800/50 flex justify-between items-center">
                                        <a href="{{ route('usages.create', ['device_id' => $device->id]) }}" class="text-xs font-bold text-cyan-300 hover:text-cyan-100 flex items-center transition">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            Log Usage
                                        </a>
                                        <span class="text-lg font-bold text-cyan-300">{{ $device->waterUsages->sum('consumed_liters') }}L</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12 bg-cyan-950/30 rounded-xl border-2 border-dashed border-cyan-800/50">
                            <svg class="mx-auto h-12 w-12 text-cyan-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-cyan-200">No devices connected</h3>
                            <p class="mt-1 text-sm text-cyan-400/70">Get started by adding your first water-consuming device.</p>
                            <div class="mt-6">
                                <a href="{{ route('devices.create') }}" class="inline-flex items-center px-4 py-2 border border-cyan-600 shadow-sm text-sm font-medium rounded-md text-cyan-50 bg-cyan-700 hover:bg-cyan-600 transition">
                                    <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" /></svg>
                                    Add Device
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Usage Analytics Section -->
            <div class="bg-cyan-700/10 backdrop-blur-md overflow-hidden shadow-xl sm:rounded-2xl border border-cyan-800/20 mt-8">
                <div class="p-6 lg:p-8 border-b border-cyan-800/10">
                    <h2 class="text-2xl font-bold text-cyan-900 mb-6">Usage Analytics</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <div class="bg-white rounded-2xl p-6 border border-cyan-100 shadow-md">
                            <h3 class="text-lg font-bold text-cyan-800 mb-4">Water Usage Over Time</h3>
                            <div class="relative h-72 w-full">
                                <canvas id="userTimeChart"></canvas>
                            </div>
                        </div>
                        <div class="bg-white rounded-2xl p-6 border border-cyan-100 shadow-md">
                            <h3 class="text-lg font-bold text-cyan-800 mb-4">Monthly Usage vs Goal</h3>
                            <div class="relative h-72 w-full flex justify-center">
                                <canvas id="userLimitChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="fixed bottom-0 left-0 w-full pt-2 pb-4 bg-white backdrop-blur text-center text-sm text-cyan-600/80 border-t border-cyan-100 z-50">
                <p>&copy; {{ date('Y') }} AquaSync. All rights reserved.</p>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Data for Time Chart
            const timeData = @json($usageByDate);
            const timeLabels = timeData.map(item => item.date);
            const timeValues = timeData.map(item => item.total);

            const ctxTime = document.getElementById('userTimeChart').getContext('2d');
            new Chart(ctxTime, {
                type: 'line',
                data: {
                    labels: timeLabels,
                    datasets: [{
                        label: 'Total Liters Consumed',
                        data: timeValues,
                        borderColor: '#0284c7', // sky-600
                        backgroundColor: 'rgba(2, 132, 199, 0.1)',
                        borderWidth: 3,
                        tension: 0.4,
                        fill: true,
                        pointBackgroundColor: '#0369a1', // sky-700
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });

            // Data for Limit Chart (Bar with line)
            const currentGoal = {{ $currentGoal ? $currentGoal->target_liters_per_month : 0 }};
            const totalUsage = {{ $totalUsage }};
            
            const ctxLimit = document.getElementById('userLimitChart').getContext('2d');
            new Chart(ctxLimit, {
                type: 'bar',
                data: {
                    labels: ['Usage vs Limit'],
                    datasets: [
                        {
                            label: 'Total Usage',
                            data: [totalUsage],
                            backgroundColor: '#06b6d4', // cyan-500
                            barThickness: 60
                        },
                        {
                            label: 'Monthly Limit',
                            data: [currentGoal],
                            backgroundColor: 'rgba(239, 68, 68, 0.2)', // transparent red
                            borderColor: '#ef4444', // red-500
                            borderWidth: 3,
                            barThickness: 60
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: { 
                            beginAtZero: true,
                            suggestedMax: Math.max(currentGoal, totalUsage) * 1.2
                        }
                    }
                }
            });
        });
    </script>
</x-app-layout>
