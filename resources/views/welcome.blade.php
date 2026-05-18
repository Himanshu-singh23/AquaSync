<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AquaSync - Smart Water Conservation</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
            }
            .glow-effect {
                box-shadow: 0 0 50px -10px rgba(16, 185, 129, 0.2);
            }
            .glow-effect-blue {
                box-shadow: 0 0 50px -10px rgba(14, 165, 233, 0.2);
            }
        </style>
    </head>
    <body class="bg-gradient-to-b from-[#050B14] via-[#0A152E] to-[#040812] text-slate-100 min-h-screen relative overflow-x-hidden antialiased">
        
        <!-- Glowing background blobs -->
        <div class="absolute top-0 left-1/4 w-[500px] h-[500px] bg-teal-500/10 rounded-full blur-[120px] pointer-events-none -z-10"></div>
        <div class="absolute top-[400px] right-1/4 w-[600px] h-[600px] bg-sky-500/10 rounded-full blur-[140px] pointer-events-none -z-10"></div>
        <div class="absolute bottom-0 left-1/3 w-[500px] h-[500px] bg-emerald-500/5 rounded-full blur-[120px] pointer-events-none -z-10"></div>

        <!-- Sticky Nav Header -->
        <header class="sticky top-0 z-50 backdrop-blur-md bg-[#050B14]/75 border-b border-slate-800/80 transition-all duration-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
                
                <!-- Logo -->
                <a href="/" class="flex items-center space-x-3 group">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-sky-400 to-teal-400 flex items-center justify-center shadow-lg group-hover:scale-105 transition transform duration-200">
                        <svg class="w-6 h-6 text-slate-900" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 2a8 8 0 00-8 8 .75.75 0 01-1.5 0 9.5 9.5 0 0119 0 .75.75 0 01-1.5 0 8 8 0 00-8-8zM2.166 11.372a.75.75 0 011.05-.172 8.25 8.25 0 0013.564 0 .75.75 0 111.222.868 9.75 9.75 0 01-16.008 0 .75.75 0 01.172-1.046z" clip-rule="evenodd" /></svg>
                    </div>
                    <span class="text-2xl font-black bg-gradient-to-r from-white via-slate-100 to-sky-200 bg-clip-text text-transparent tracking-tight">AquaSync</span>
                </a>

                <!-- Navigation Options -->
                <div class="flex items-center space-x-4">
                    @if (Route::has('login'))
                        <nav class="flex items-center space-x-3">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="px-6 py-2.5 rounded-full text-sm font-bold bg-gradient-to-r from-sky-400 to-teal-400 hover:from-sky-500 hover:to-teal-500 text-slate-900 transition-all shadow-md hover:shadow-lg transform active:scale-95">
                                    Go to Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="px-5 py-2.5 rounded-full text-sm font-bold text-slate-300 hover:text-white hover:bg-slate-800/40 transition-all">
                                    Log in
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="px-6 py-2.5 rounded-full text-sm font-black bg-slate-850 hover:bg-slate-800 text-white border border-slate-700/80 hover:border-slate-600 transition-all shadow-md active:scale-95">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </div>

            </div>
        </header>

        <!-- Hero Section -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28 relative">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">
                
                <!-- Hero Text -->
                <div class="lg:col-span-7 space-y-8 text-center lg:text-left">
                    <div class="inline-flex items-center space-x-2.5 bg-sky-950/80 border border-sky-500/30 text-sky-400 px-4 py-1.5 rounded-full text-xs font-black uppercase tracking-widest shadow-sm">
                        <span class="relative flex h-2.5 w-2.5">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-sky-500"></span>
                        </span>
                        <span>Smart Water Conservation</span>
                    </div>

                    <h1 class="text-5xl sm:text-6xl lg:text-7xl font-black tracking-tight leading-[1.1] text-white">
                        Synchronize with <br>
                        <span class="bg-gradient-to-r from-sky-400 via-teal-400 to-emerald-400 bg-clip-text text-transparent">Water Efficiency</span>
                    </h1>

                    <p class="text-lg text-slate-400 max-w-2xl mx-auto lg:mx-0 leading-relaxed font-medium">
                        Connect smart devices, audit daily water flow, achieve sustainable consumption goals, and list or find trusted local water experts. Empowering a smarter, greener planet.
                    </p>

                    <!-- Hero Actions -->
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="w-full sm:w-auto px-8 py-4 rounded-full text-base font-black bg-gradient-to-r from-sky-400 via-teal-400 to-emerald-400 hover:from-sky-500 hover:via-teal-500 hover:to-emerald-500 text-slate-900 text-center shadow-lg hover:shadow-xl hover:shadow-sky-500/10 transform active:scale-98 transition duration-200">
                                Enter Dashboard
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="w-full sm:w-auto px-8 py-4 rounded-full text-base font-black bg-gradient-to-r from-sky-400 via-teal-400 to-emerald-400 hover:from-sky-500 hover:via-teal-500 hover:to-emerald-500 text-slate-900 text-center shadow-lg hover:shadow-xl hover:shadow-sky-500/10 transform active:scale-98 transition duration-200">
                                Get Started Free
                            </a>
                            <a href="{{ route('login') }}" class="w-full sm:w-auto px-8 py-4 rounded-full text-base font-bold bg-slate-900/60 hover:bg-slate-800/60 text-white border border-slate-700/80 hover:border-slate-600 text-center transition duration-200">
                                Sign In to Account
                            </a>
                        @endauth
                    </div>

                    <!-- Mini Stats row -->
                    <div class="grid grid-cols-3 gap-6 pt-10 border-t border-slate-800/60 max-w-md mx-auto lg:mx-0">
                        <div>
                            <div class="text-3xl font-black text-white">4.2M+</div>
                            <div class="text-xs text-slate-400 font-bold uppercase tracking-wider mt-1">Liters Saved</div>
                        </div>
                        <div>
                            <div class="text-3xl font-black text-white">12k+</div>
                            <div class="text-xs text-slate-400 font-bold uppercase tracking-wider mt-1">Connected Meters</div>
                        </div>
                        <div>
                            <div class="text-3xl font-black text-white">99.8%</div>
                            <div class="text-xs text-slate-400 font-bold uppercase tracking-wider mt-1">Accuracy</div>
                        </div>
                    </div>
                </div>

                <!-- Hero Graphic (Dashboard mockup styled in pure CSS/SVG) -->
                <div class="lg:col-span-5 relative w-full max-w-md mx-auto">
                    
                    <!-- Decorative backglow -->
                    <div class="absolute inset-0 bg-gradient-to-tr from-sky-500 to-teal-500 rounded-3xl opacity-10 blur-xl"></div>
                    
                    <div class="bg-slate-900/85 border border-slate-800 rounded-3xl p-6 shadow-2xl space-y-6 glow-effect-blue relative overflow-hidden backdrop-blur-sm">
                        
                        <!-- Mockup Header -->
                        <div class="flex items-center justify-between pb-4 border-b border-slate-800/80">
                            <div class="flex items-center space-x-2">
                                <span class="w-3.5 h-3.5 rounded-full bg-red-500/70 inline-block"></span>
                                <span class="w-3.5 h-3.5 rounded-full bg-yellow-500/70 inline-block"></span>
                                <span class="w-3.5 h-3.5 rounded-full bg-green-500/70 inline-block"></span>
                            </div>
                            <span class="text-xs text-slate-500 font-black tracking-widest uppercase">AquaSync Live Flow</span>
                        </div>

                        <!-- Metric circle -->
                        <div class="flex justify-center items-center py-4">
                            <div class="relative w-44 h-44 rounded-full border-4 border-slate-800 flex flex-col justify-center items-center">
                                <div class="absolute inset-2 rounded-full border border-sky-400/20 bg-sky-950/20 flex flex-col justify-center items-center">
                                    <span class="text-4xl font-black text-white tracking-tight">76%</span>
                                    <span class="text-[10px] text-teal-400 font-black tracking-widest uppercase mt-0.5">Efficiency</span>
                                </div>
                                <svg class="absolute inset-0 transform -rotate-90 w-full h-full" viewBox="0 0 100 100">
                                    <circle class="text-sky-400" stroke-width="4.5" stroke-dasharray="280" stroke-dashoffset="65" stroke-linecap="round" stroke="currentColor" fill="transparent" r="44" cx="50" cy="50"/>
                                </svg>
                            </div>
                        </div>

                        <!-- Real-time metrics list -->
                        <div class="space-y-3.5">
                            <div class="bg-slate-950/60 rounded-xl p-3.5 border border-slate-800/80 flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 rounded-lg bg-sky-950 flex items-center justify-center text-sky-400 border border-sky-500/20">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                    </div>
                                    <div>
                                        <div class="text-xs text-slate-400 font-bold">Active Flow Speed</div>
                                        <div class="text-sm font-black text-white">0.45 L/sec</div>
                                    </div>
                                </div>
                                <span class="bg-teal-950 text-teal-400 border border-teal-500/20 text-[10px] px-2 py-0.5 rounded font-black uppercase">Flowing</span>
                            </div>

                            <div class="bg-slate-950/60 rounded-xl p-3.5 border border-slate-800/80 flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 rounded-lg bg-emerald-950 flex items-center justify-center text-emerald-400 border border-emerald-500/20">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                    <div>
                                        <div class="text-xs text-slate-400 font-bold">Leak Detection</div>
                                        <div class="text-sm font-black text-white">0 Leaks Detected</div>
                                    </div>
                                </div>
                                <span class="bg-emerald-950 text-emerald-400 border border-emerald-500/20 text-[10px] px-2 py-0.5 rounded font-black uppercase">Secure</span>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </main>

        <!-- Features Grid Section -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 border-t border-slate-800/40 relative">
            
            <div class="text-center space-y-4 mb-16">
                <h2 class="text-3xl sm:text-4xl font-black text-white">Platform Core Ecosystem</h2>
                <p class="text-slate-400 max-w-2xl mx-auto font-medium">AquaSync synchronizes smart automation, consumption diagnostics, and crowdsourced service capabilities.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                
                <!-- Feature 1 -->
                <div class="bg-slate-900/40 border border-slate-850 hover:border-slate-700/80 p-6 rounded-2xl transition duration-300 space-y-4 hover:-translate-y-1 transform">
                    <div class="w-12 h-12 rounded-xl bg-sky-950 flex items-center justify-center text-sky-400 border border-sky-500/20">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    </div>
                    <h3 class="text-lg font-black text-white">Flow Tracking</h3>
                    <p class="text-sm text-slate-400 leading-relaxed font-medium">
                        Log and connect shower heads, kitchen faucets, and yard sprinklers to view flow history in real-time.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-slate-900/40 border border-slate-850 hover:border-slate-700/80 p-6 rounded-2xl transition duration-300 space-y-4 hover:-translate-y-1 transform">
                    <div class="w-12 h-12 rounded-xl bg-teal-950 flex items-center justify-center text-teal-400 border border-teal-500/20">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-lg font-black text-white">Conservation Targets</h3>
                    <p class="text-sm text-slate-400 leading-relaxed font-medium">
                        Establish monthly thresholds and water saving targets. Receive auto alerts as you approach limits.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-slate-900/40 border border-slate-850 hover:border-slate-700/80 p-6 rounded-2xl transition duration-300 space-y-4 hover:-translate-y-1 transform">
                    <div class="w-12 h-12 rounded-xl bg-emerald-950 flex items-center justify-center text-emerald-400 border border-emerald-500/20">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-lg font-black text-white">Services Marketplace</h3>
                    <p class="text-sm text-slate-400 leading-relaxed font-medium">
                        Hire vetted water auditing and smart-meter hardware experts directly inside our premium directory catalog.
                    </p>
                </div>

                <!-- Feature 4 -->
                <div class="bg-slate-900/40 border border-slate-850 hover:border-slate-700/80 p-6 rounded-2xl transition duration-300 space-y-4 hover:-translate-y-1 transform">
                    <div class="w-12 h-12 rounded-xl bg-indigo-950 flex items-center justify-center text-indigo-400 border border-indigo-500/20">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                    </div>
                    <h3 class="text-lg font-black text-white">Expert Guidance</h3>
                    <p class="text-sm text-slate-400 leading-relaxed font-medium">
                        Browse peer-reviewed advice, guidelines, and conservation tricks published by authenticated water scientists.
                    </p>
                </div>

            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-slate-950/80 border-t border-slate-900/80 py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-6 text-sm text-slate-500 font-semibold">
                <div class="flex items-center space-x-2">
                    <span class="text-white font-bold">AquaSync</span>
                    <span>© 2026. Empowering local communities to conserve water.</span>
                </div>
                <div class="flex space-x-6">
                    <a href="#" class="hover:text-slate-300">Privacy Policy</a>
                    <a href="#" class="hover:text-slate-300">Terms of Use</a>
                </div>
            </div>
        </footer>

    </body>
</html>
