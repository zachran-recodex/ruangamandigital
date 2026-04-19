<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cerita Anonim - Ruang Aman Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        serif: ['Playfair Display', 'serif'],
                        sans: ['DM Sans', 'sans-serif'],
                    },
                    colors: {
                        safe: {
                            50: '#F5F0FA',
                            100: '#EDE5F7',
                            200: '#DDD0EE',
                            300: '#C4ADE0',
                            400: '#A988CF',
                            500: '#8E6ABE',
                            600: '#7A52A8',
                            700: '#63408C',
                            800: '#4F336F',
                            900: '#3D2857',
                        },
                        calm: {
                            50: '#EFFCF9',
                            100: '#D5F5F0',
                            200: '#B0E9E1',
                            300: '#83D8CC',
                            400: '#55BFB2',
                            500: '#38A196',
                            600: '#2D847B',
                            700: '#276A64',
                            800: '#235551',
                            900: '#1F4743',
                        },
                        warm: {
                            50: '#FFF5F5',
                            100: '#FDE8E8',
                            200: '#FBD5D5',
                            300: '#F8B4B4',
                            400: '#F88080',
                        },
                        sand: {
                            50: '#FAF8F5',
                            100: '#F5F0EA',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-sand-50 font-sans text-slate-700 antialiased">
    <main class="min-h-screen">
        <div class="max-w-3xl mx-auto px-6 pt-10 pb-16">
            <div class="flex items-center justify-between gap-4 mb-8">
                <a href="{{ route('home', absolute: false) }}#solidaritas" class="inline-flex items-center gap-2 text-sm font-medium text-safe-600 hover:text-safe-800 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12l7.5-7.5M3 12h18" />
                    </svg>
                    Kembali ke Galeri
                </a>
                <span class="text-xs text-slate-400">{{ $story->created_at?->diffForHumans() }}</span>
            </div>

            <div class="bg-white/80 backdrop-blur-sm rounded-3xl border border-safe-100 shadow-[0_4px_30px_rgba(0,0,0,0.04)] p-6 sm:p-8">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-safe-200 to-calm-200 flex items-center justify-center">
                        <svg class="w-5 h-5 text-safe-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-safe-800">Penyintas Anonim</p>
                        <p class="text-xs text-slate-400">Cerita lengkap</p>
                    </div>
                </div>

                <div class="text-sm sm:text-base text-slate-700 leading-relaxed whitespace-pre-wrap">{{ $story->story }}</div>
            </div>
        </div>
    </main>
</body>
</html>
