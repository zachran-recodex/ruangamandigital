<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ruang Aman Digital — Suaramu Berharga, Ceritamu Berdaya</title>
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
    <style>
        /* Smooth scroll */
        html {
            scroll-behavior: smooth;
        }

        /* Custom scrollbar - calming */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #F5F0FA;
        }

        ::-webkit-scrollbar-thumb {
            background: #C4ADE0;
            border-radius: 3px;
        }

        /* Gentle animations */
        @keyframes gentleFadeUp {
            from {
                opacity: 0;
                transform: translateY(24px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes gentlePulse {

            0%,
            100% {
                opacity: 0.4;
            }

            50% {
                opacity: 0.8;
            }
        }

        @keyframes softFloat {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-8px);
            }
        }

        .animate-gentle-fade-up {
            animation: gentleFadeUp 0.8s ease-out forwards;
        }

        .animate-gentle-fade-up-delay-1 {
            animation: gentleFadeUp 0.8s ease-out 0.15s forwards;
            opacity: 0;
        }

        .animate-gentle-fade-up-delay-2 {
            animation: gentleFadeUp 0.8s ease-out 0.3s forwards;
            opacity: 0;
        }

        .animate-gentle-fade-up-delay-3 {
            animation: gentleFadeUp 0.8s ease-out 0.45s forwards;
            opacity: 0;
        }

        .animate-soft-float {
            animation: softFloat 6s ease-in-out infinite;
        }

        .animate-soft-float-delay {
            animation: softFloat 7s ease-in-out 1s infinite;
        }

        .blob-gentle {
            animation: gentlePulse 8s ease-in-out infinite;
        }

        .blob-gentle-delay {
            animation: gentlePulse 10s ease-in-out 2s infinite;
        }

        /* Focus states for accessibility */
        textarea:focus,
        input:focus,
        a:focus-visible,
        button:focus-visible {
            outline: 3px solid #C4ADE0;
            outline-offset: 2px;
        }

        /* Toast notification */
        .toast {
            transform: translate(-50%, -16px) scale(0.96);
            opacity: 0;
            transition: all 0.5s ease;
        }

        .toast.show {
            transform: translate(-50%, 0) scale(1);
            opacity: 1;
        }

        /* Story card expand */
        .story-full {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s ease;
        }

        .story-full.open {
            max-height: 500px;
        }
    </style>
</head>

<body class="bg-sand-50 font-sans text-slate-700 antialiased">

    <!-- ============================================ -->
    <!-- TOAST NOTIFICATION -->
    <!-- ============================================ -->
    <div id="toast" data-story-submitted="{{ session('story_submitted') ? '1' : '0' }}" class="toast fixed top-5 left-1/2 z-[100] bg-safe-900/95 text-white px-5 py-3 rounded-full shadow-xl flex items-center gap-3 max-w-sm backdrop-blur-md border border-white/10 pointer-events-none">
        <svg class="w-5 h-5 text-calm-300 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span id="toast-msg" class="text-sm font-medium">Ceritamu telah tersimpan dengan aman.</span>
    </div>

    <!-- ============================================ -->
    <!-- NAVIGATION -->
    <!-- ============================================ -->
    <nav class="fixed top-0 inset-x-0 z-50 backdrop-blur-md bg-sand-50/80 border-b border-safe-100">
        <div class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between">
            <!-- Logo -->
            <a href="#hero" class="flex items-center gap-2.5 group" aria-label="Kembali ke beranda">
                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-safe-300 to-calm-300 flex items-center justify-center">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c-4.97 0-9 2.69-9 6v6c0 3.31 4.03 6 9 6s9-2.69 9-6V9c0-3.31-4.03-6-9-6z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.21 0 4 1.34 4 3v1c0 1.66-1.79 3-4 3S8 8.66 8 7V6c0-1.66 1.79-3 4-3z" />
                    </svg>
                </div>
                <span class="font-serif text-lg font-semibold text-safe-800 group-hover:text-safe-600 transition-colors">Ruang Aman</span>
            </a>
            <!-- Nav Links -->
            <div class="hidden md:flex items-center gap-8">
                <a href="#bercerita" class="text-sm font-medium text-slate-500 hover:text-safe-700 transition-colors">Bercerita</a>
                <a href="#solidaritas" class="text-sm font-medium text-slate-500 hover:text-safe-700 transition-colors">Solidaritas</a>
                <a href="#bantuan" class="text-sm font-medium text-slate-500 hover:text-safe-700 transition-colors">Bantuan</a>
            </div>
            <!-- Mobile menu button -->
            <button id="mobile-menu-btn" class="md:hidden p-2 rounded-lg hover:bg-safe-50 transition-colors" aria-label="Buka menu navigasi">
                <svg class="w-5 h-5 text-safe-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden border-t border-safe-100 bg-sand-50/95 backdrop-blur-md">
            <div class="px-6 py-4 flex flex-col gap-3">
                <a href="#bercerita" class="text-sm font-medium text-slate-600 hover:text-safe-700 py-2 transition-colors mobile-link">Bercerita</a>
                <a href="#solidaritas" class="text-sm font-medium text-slate-600 hover:text-safe-700 py-2 transition-colors mobile-link">Solidaritas</a>
                <a href="#bantuan" class="text-sm font-medium text-slate-600 hover:text-safe-700 py-2 transition-colors mobile-link">Bantuan</a>
            </div>
        </div>
    </nav>

    <!-- ============================================ -->
    <!-- HERO SECTION -->
    <!-- ============================================ -->
    <section id="hero" class="relative min-h-screen flex items-center overflow-hidden">
        <!-- Background blobs - gentle, calming -->
        <div class="absolute inset-0 pointer-events-none overflow-hidden">
            <div class="absolute top-20 -left-32 w-[500px] h-[500px] bg-safe-200/30 rounded-full blur-[120px] blob-gentle"></div>
            <div class="absolute bottom-10 right-0 w-[400px] h-[400px] bg-calm-200/25 rounded-full blur-[100px] blob-gentle-delay"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-safe-100/20 rounded-full blur-[150px]"></div>
        </div>

        <div class="relative max-w-6xl mx-auto px-6 pt-28 pb-20 md:pt-32 md:pb-28">
            <div class="max-w-3xl mx-auto text-center">
                <!-- Badge -->
                <div class="animate-gentle-fade-up inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-safe-100/80 border border-safe-200/50 mb-8">
                    <span class="w-2 h-2 rounded-full bg-calm-400 animate-pulse"></span>
                    <span class="text-xs font-semibold text-safe-700 tracking-wide uppercase">Ruang Tanpa Judul</span>
                </div>

                <!-- Main Heading -->
                <h1 class="animate-gentle-fade-up-delay-1 font-serif text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold text-safe-900 leading-[1.1] tracking-tight mb-8">
                    Suaramu Berharga,<br>
                    <span class="bg-gradient-to-r from-safe-500 via-calm-500 to-safe-400 bg-clip-text text-transparent">Ceritamu Berdaya</span>
                </h1>

                <!-- Subheading -->
                <p class="animate-gentle-fade-up-delay-2 text-base sm:text-lg md:text-xl text-slate-500 leading-relaxed max-w-2xl mx-auto mb-6">
                    Ini adalah wadah aman untuk memutus budaya diam dan melawan normalisasi pelecehan di ruang digital. Setiap cerita yang kamu bagikan adalah langkah berani menuju keadilan.
                </p>
                <p class="animate-gentle-fade-up-delay-3 text-sm text-slate-400 mb-10">
                    Tanpa nama. Tanpa jejak. Tanpa data yang direkam.
                </p>

                <!-- CTA -->
                <div class="animate-gentle-fade-up-delay-3 flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="#bercerita" class="group inline-flex items-center gap-2 px-8 py-4 bg-safe-600 text-white font-semibold rounded-2xl hover:bg-safe-700 hover:shadow-lg hover:shadow-safe-200/50 transition-all duration-300">
                        Mulai Bercerita
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </a>
                    <a href="#bantuan" class="inline-flex items-center gap-2 px-8 py-4 bg-white/70 text-safe-700 font-semibold rounded-2xl border border-safe-200 hover:bg-white hover:shadow-md transition-all duration-300">
                        Butuh Bantuan?
                    </a>
                </div>
            </div>

            <!-- Floating supportive icons -->
            <div class="hidden md:block absolute top-40 right-16 animate-soft-float">
                <div class="w-12 h-12 rounded-2xl bg-calm-100/80 border border-calm-200/50 flex items-center justify-center shadow-sm">
                    <svg class="w-6 h-6 text-calm-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                    </svg>
                </div>
            </div>
            <div class="hidden md:block absolute bottom-32 left-12 animate-soft-float-delay">
                <div class="w-12 h-12 rounded-2xl bg-safe-100/80 border border-safe-200/50 flex items-center justify-center shadow-sm">
                    <svg class="w-6 h-6 text-safe-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m3.75 2.383a14.406 14.406 0 01-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 10-7.517 0c.85.493 1.509 1.333 1.509 2.316V18" />
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================ -->
    <!-- ANONYMOUS STORY FORM -->
    <!-- ============================================ -->
    <section id="bercerita" class="relative py-20 md:py-28">
        <div class="max-w-6xl mx-auto px-6">
            <div class="max-w-2xl mx-auto">
                <!-- Section header -->
                <div class="text-center mb-12">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-calm-50 border border-calm-200/50 mb-4">
                        <svg class="w-3.5 h-3.5 text-calm-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931z" />
                        </svg>
                        <span class="text-xs font-semibold text-calm-600 tracking-wide uppercase">Tulis Ceritamu</span>
                    </div>
                    <h2 class="font-serif text-3xl md:text-4xl font-bold text-safe-900 tracking-tight mb-4">Lepaskan Bebanmu di Sini</h2>
                    <p class="text-slate-500 leading-relaxed">Kamu tidak wajib memberikan identitas apapun. Tuliskan apa yang ingin kamu sampaikan — tanpa takut dihakimi, tanpa takut dilacak.</p>
                </div>

                <!-- Form Card -->
                <div class="bg-white/80 backdrop-blur-sm rounded-3xl border border-safe-100 shadow-[0_4px_30px_rgba(0,0,0,0.04)] p-6 sm:p-8 md:p-10">
                    @if ($errors->any())
                        <div class="mb-6 rounded-2xl border border-warm-200 bg-warm-50/60 px-5 py-4">
                            <p class="text-sm font-semibold text-warm-700 mb-2">Periksa kembali inputmu:</p>
                            <ul class="list-disc pl-5 space-y-1 text-sm text-warm-700">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form id="storyForm" method="POST" action="{{ route('anonymous-stories.store') }}" novalidate>
                        @csrf
                        <!-- Textarea -->
                        <div class="mb-6">
                            <label for="story" class="block text-sm font-medium text-safe-800 mb-2">Ceritamu</label>
                            <textarea
                                id="story"
                                name="story"
                                rows="8"
                                placeholder="Tuliskan isi hatimu di sini… Kata-katamu aman bersama kami."
                                class="w-full px-5 py-4 bg-sand-50 border border-safe-200/60 rounded-2xl text-slate-700 placeholder:text-slate-300 leading-relaxed resize-y focus:border-safe-400 focus:ring-2 focus:ring-safe-100 transition-all duration-300"
                                aria-describedby="story-hint">{{ old('story') }}</textarea>
                            <p id="story-hint" class="mt-2 text-xs text-slate-400">Kamu bebas menulis sepanjang apa pun yang kamu butuhkan.</p>
                        </div>

                        <!-- Anonymity checkbox -->
                        <div class="mb-8">
                            <label class="flex items-start gap-3 cursor-pointer group">
                                <input
                                    type="checkbox"
                                    id="anonConfirm"
                                    name="anonConfirm"
                                    class="mt-0.5 w-5 h-5 rounded-md border-safe-300 text-safe-600 focus:ring-safe-400 focus:ring-offset-2 transition cursor-pointer"
                                    @checked(old('anonConfirm'))>
                                <span class="text-sm text-slate-500 leading-relaxed group-hover:text-slate-600 transition-colors">
                                    Saya memahami bahwa <strong class="text-safe-700">tidak ada data pribadi, alamat IP, atau informasi identitas</strong> yang akan direkam atau disimpan oleh sistem ini.
                                </span>
                            </label>
                        </div>

                        <!-- Submit button -->
                        <button
                            type="submit"
                            id="submitBtn"
                            class="w-full py-4 px-6 bg-safe-600 text-white font-semibold text-base rounded-2xl hover:bg-safe-700 hover:shadow-lg hover:shadow-safe-200/40 active:scale-[0.98] transition-all duration-300 disabled:opacity-40 disabled:cursor-not-allowed disabled:hover:shadow-none flex items-center justify-center gap-2"
                            disabled>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                            </svg>
                            Lepaskan Cerita
                        </button>
                    </form>

                    <!-- Gentle reminder below form -->
                    <div class="mt-6 p-4 bg-calm-50/50 rounded-xl border border-calm-100">
                        <div class="flex gap-3">
                            <svg class="w-5 h-5 text-calm-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                            </svg>
                            <p class="text-xs text-calm-700 leading-relaxed">Ceritamu akan disimpan secara anonim dan hanya menampilkan cuplikan di galeri solidaritas. Tidak ada siapa pun yang dapat menelusuri cerita ini kembali kepadamu.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================ -->
    <!-- GALLERY OF STORIES (SOLIDARITY) -->
    <!-- ============================================ -->
    <section id="solidaritas" class="relative py-20 md:py-28 bg-gradient-to-b from-sand-50 via-safe-50/30 to-sand-50">
        <div class="max-w-6xl mx-auto px-6">
            <!-- Section header -->
            <div class="text-center mb-14">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-safe-100/80 border border-safe-200/50 mb-4">
                    <svg class="w-3.5 h-3.5 text-safe-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                    </svg>
                    <span class="text-xs font-semibold text-safe-600 tracking-wide uppercase">Kamu Tidak Sendiri</span>
                </div>
                <h2 class="font-serif text-3xl md:text-4xl font-bold text-safe-900 tracking-tight mb-4">Galeri Solidaritas</h2>
                <p class="text-slate-500 max-w-xl mx-auto leading-relaxed">Cerita-cerita ini dikirimkan secara anonim oleh penyintas lain. Membaca pengalaman serupa bisa menjadi pengingat bahwa kamu tidak berjuang sendirian.</p>
            </div>

            <!-- Story Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @forelse ($stories ?? [] as $story)
                    @php
                        $isLong = \Illuminate\Support\Str::length($story->story) > 140;
                        $preview = $isLong ? \Illuminate\Support\Str::limit($story->story, 140, '...') : $story->story;
                    @endphp
                    <article class="bg-white/80 backdrop-blur-sm rounded-2xl border border-safe-100 p-6 hover:shadow-md hover:border-safe-200 transition-all duration-300 group">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-9 h-9 rounded-full bg-gradient-to-br from-safe-200 to-calm-200 flex items-center justify-center">
                                <svg class="w-4 h-4 text-safe-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-safe-800">Penyintas Anonim</p>
                                <p class="text-xs text-slate-400">{{ $story->created_at?->diffForHumans() }}</p>
                            </div>
                        </div>
                        <p class="text-sm text-slate-600 leading-relaxed mb-3">{{ $preview }}</p>

                        @if ($isLong)
                            <button class="text-xs font-medium text-safe-500 hover:text-safe-700 flex items-center gap-1 transition-colors read-more-btn" aria-expanded="false">
                                Baca selengkapnya
                                <svg class="w-3 h-3 transition-transform" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div class="story-full mt-3">
                                <p class="text-sm text-slate-600 leading-relaxed">{{ $story->story }}</p>
                            </div>
                        @endif
                    </article>
                @empty
                    <div class="rounded-2xl border border-safe-100 bg-white/60 p-6 md:col-span-2 lg:col-span-3 text-center">
                        <p class="text-sm text-slate-500">Belum ada cerita yang ditampilkan. Kamu bisa jadi yang pertama.</p>
                    </div>
                @endforelse

                <!-- Card 6 - CTA -->
                <div class="rounded-2xl border-2 border-dashed border-safe-200 bg-safe-50/50 p-6 flex flex-col items-center justify-center text-center min-h-[240px]">
                    <div class="w-12 h-12 rounded-full bg-safe-100 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-safe-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </div>
                    <p class="text-sm font-semibold text-safe-700 mb-1">Ceritamu Berharga</p>
                    <p class="text-xs text-slate-400 mb-4">Tambahkan ceritamu ke galeri solidaritas ini</p>
                    <a href="#bercerita" class="inline-flex items-center gap-1 text-xs font-medium text-safe-600 hover:text-safe-800 transition-colors">
                        Tulis Cerita
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25" />
                        </svg>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- ============================================ -->
    <!-- EDUCATION & HELP SECTION -->
    <!-- ============================================ -->
    <section id="bantuan" class="relative py-20 md:py-28 bg-gradient-to-b from-sand-50 to-safe-50/40">
        <div class="max-w-6xl mx-auto px-6">
            <!-- Section header -->
            <div class="text-center mb-14">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-warm-50 border border-warm-200/50 mb-4">
                    <svg class="w-3.5 h-3.5 text-warm-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                    <span class="text-xs font-semibold text-warm-400 tracking-wide uppercase">Penting untuk Diketahui</span>
                </div>
                <h2 class="font-serif text-3xl md:text-4xl font-bold text-safe-900 tracking-tight mb-4">Edukasi & Bantuan Formal</h2>
                <p class="text-slate-500 max-w-xl mx-auto leading-relaxed">Kamu tidak harus melewati ini sendirian. Ada jalur hukum dan dukungan psikososial yang siap membantu melindungi hak-hakmu.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Card: UU TPKS -->
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl border border-safe-100 p-6 hover:shadow-md transition-all duration-300">
                    <div class="w-11 h-11 rounded-xl bg-safe-100 flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-safe-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                        </svg>
                    </div>
                    <h3 class="font-serif text-lg font-semibold text-safe-900 mb-3">UU TPKS</h3>
                    <p class="text-sm text-slate-500 leading-relaxed mb-4">Undang-Undang Nomor 12 Tahun 2022 tentang Tindak Pidana Kekerasan Seksual menjamin hak korban untuk mendapat perlindungan, pemulihan, dan keadilan hukum.</p>
                    <ul class="space-y-2">
                        <li class="flex items-start gap-2 text-xs text-slate-500">
                            <svg class="w-4 h-4 text-calm-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                            Perlindungan identitas korban
                        </li>
                        <li class="flex items-start gap-2 text-xs text-slate-500">
                            <svg class="w-4 h-4 text-calm-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                            Hak restitusi dan kompensasi
                        </li>
                        <li class="flex items-start gap-2 text-xs text-slate-500">
                            <svg class="w-4 h-4 text-calm-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                            Pemulihan psikososial
                        </li>
                    </ul>
                </div>

                <!-- Card: Permendikbudristek -->
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl border border-safe-100 p-6 hover:shadow-md transition-all duration-300">
                    <div class="w-11 h-11 rounded-xl bg-calm-100 flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-calm-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342" />
                        </svg>
                    </div>
                    <h3 class="font-serif text-lg font-semibold text-safe-900 mb-3">Permendikbudristek 55/2024</h3>
                    <p class="text-sm text-slate-500 leading-relaxed mb-4">Peraturan ini mewajibkan setiap perguruan tinggi membentuk Satuan Tugas Pencegahan dan Penanganan Kekerasan Seksual (Satgas PPKS) di lingkungan kampus.</p>
                    <ul class="space-y-2">
                        <li class="flex items-start gap-2 text-xs text-slate-500">
                            <svg class="w-4 h-4 text-calm-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                            Mekanisme pelaporan di kampus
                        </li>
                        <li class="flex items-start gap-2 text-xs text-slate-500">
                            <svg class="w-4 h-4 text-calm-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                            Perlindungan pelapor dari retaliasi
                        </li>
                        <li class="flex items-start gap-2 text-xs text-slate-500">
                            <svg class="w-4 h-4 text-calm-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                            Proses adil dan transparan
                        </li>
                    </ul>
                </div>

                <!-- Card: Hotlines & Contacts -->
                <div class="bg-gradient-to-br from-safe-700 to-safe-800 rounded-2xl p-6 text-white md:col-span-2 lg:col-span-1">
                    <div class="w-11 h-11 rounded-xl bg-white/10 flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-calm-200" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                        </svg>
                    </div>
                    <h3 class="font-serif text-lg font-semibold mb-3">Kontak Darurat & Hotline</h3>
                    <p class="text-sm text-safe-200 leading-relaxed mb-5">Jika kamu atau orang yang kamu kenal sedang dalam bahaya, jangan ragu menghubungi:</p>

                    <div class="space-y-4">
                        <!-- SAPA 129 -->
                        <div class="bg-white/10 rounded-xl p-4">
                            <div class="flex items-center gap-2 mb-1.5">
                                <span class="inline-block w-2 h-2 rounded-full bg-calm-300 animate-pulse"></span>
                                <span class="text-xs font-bold text-calm-200 uppercase tracking-wider">Hotline Nasional</span>
                            </div>
                            <p class="text-lg font-bold text-white">SAPA 129</p>
                            <p class="text-xs text-safe-200 mt-1">Layanan pengaduan dan rujukan kekerasan seksual — gratis dan 24 jam</p>
                        </div>

                        <!-- Satgas PPKS -->
                        <div class="bg-white/10 rounded-xl p-4">
                            <div class="flex items-center gap-2 mb-1.5">
                                <span class="inline-block w-2 h-2 rounded-full bg-safe-300"></span>
                                <span class="text-xs font-bold text-safe-200 uppercase tracking-wider">Kampus</span>
                            </div>
                            <p class="text-base font-bold text-white">Satgas PPKS Kampus</p>
                            <p class="text-xs text-safe-200 mt-1">Hubungi Satgas PPKS di kampusmu untuk pelaporan dan pendampingan</p>
                        </div>

                        <!-- Komnas Perempuan -->
                        <div class="bg-white/10 rounded-xl p-4">
                            <div class="flex items-center gap-2 mb-1.5">
                                <span class="inline-block w-2 h-2 rounded-full bg-warm-300"></span>
                                <span class="text-xs font-bold text-warm-200 uppercase tracking-wider">Lembaga Negara</span>
                            </div>
                            <p class="text-base font-bold text-white">Komnas Perempuan</p>
                            <p class="text-xs text-safe-200 mt-1">Pengaduan pelanggaran HAM perempuan: (021) 8601290</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Rights banner -->
            <div class="mt-10 bg-calm-50/70 rounded-2xl border border-calm-200/50 p-6 md:p-8">
                <div class="flex flex-col md:flex-row gap-6 items-start">
                    <div class="w-12 h-12 rounded-2xl bg-calm-100 flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-calm-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-serif text-lg font-semibold text-safe-900 mb-2">Hak-Hakmu Dilindungi Hukum</h3>
                        <p class="text-sm text-slate-500 leading-relaxed mb-4">Sebagai korban kekerasan seksual, kamu memiliki hak yang dilindungi oleh undang-undang:</p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-calm-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                                <span class="text-sm text-slate-600">Perlindungan dari ancaman dan intimidasi</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-calm-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                                <span class="text-sm text-slate-600">Pendampingan hukum dan psikologis</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-calm-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                                <span class="text-sm text-slate-600">Kerahasiaan identitas di proses hukum</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-calm-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                                <span class="text-sm text-slate-600">Restitusi dan pemulihan psikososial</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================ -->
    <!-- FOOTER - PRIVACY & SECURITY -->
    <!-- ============================================ -->
    <footer class="bg-safe-900 text-white">
        <!-- Privacy warning -->
        <div class="bg-warm-50/10 border-b border-white/5">
            <div class="max-w-6xl mx-auto px-6 py-5">
                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-3">
                    <div class="flex items-center gap-2 flex-shrink-0">
                        <svg class="w-5 h-5 text-warm-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                        </svg>
                        <span class="text-xs font-bold text-warm-200 uppercase tracking-wider">Peringatan Privasi</span>
                    </div>
                    <p class="text-xs text-safe-200 leading-relaxed">Berhati-hatilah dalam menyebutkan detail spesifik yang dapat mengidentifikasi dirimu (nama, lokasi tepat, tanggal spesifik). Hal ini untuk mencegah risiko reviktimisasi atau pengenalan identitas oleh pihak yang tidak bertanggung jawab.</p>
                </div>
            </div>
        </div>

        <!-- Main footer -->
        <div class="max-w-6xl mx-auto px-6 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <!-- Brand -->
                <div>
                    <div class="flex items-center gap-2.5 mb-4">
                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-safe-400 to-calm-400 flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c-4.97 0-9 2.69-9 6v6c0 3.31 4.03 6 9 6s9-2.69 9-6V9c0-3.31-4.03-6-9-6z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.21 0 4 1.34 4 3v1c0 1.66-1.79 3-4 3S8 8.66 8 7V6c0-1.66 1.79-3 4-3z" />
                            </svg>
                        </div>
                        <span class="font-serif text-lg font-semibold">Ruang Aman Digital</span>
                    </div>
                    <p class="text-sm text-safe-300 leading-relaxed">Wadah aman bagi perempuan penyintas pelecehan seksual untuk bercerita secara anonim, memutus budaya diam, dan melawan normalisasi kekerasan seksual.</p>
                </div>

                <!-- Links -->
                <div>
                    <h4 class="text-xs font-bold text-safe-300 uppercase tracking-wider mb-4">Navigasi</h4>
                    <ul class="space-y-2.5">
                        <li><a href="#bercerita" class="text-sm text-safe-200 hover:text-white transition-colors">Bercerita</a></li>
                        <li><a href="#solidaritas" class="text-sm text-safe-200 hover:text-white transition-colors">Galeri Solidaritas</a></li>
                        <li><a href="#bantuan" class="text-sm text-safe-200 hover:text-white transition-colors">Bantuan & Edukasi</a></li>
                    </ul>
                </div>

                <!-- Confidentiality statement -->
                <div>
                    <h4 class="text-xs font-bold text-safe-300 uppercase tracking-wider mb-4">Kerahasiaan</h4>
                    <div class="bg-white/5 rounded-xl p-4">
                        <div class="flex items-center gap-2 mb-2">
                            <svg class="w-4 h-4 text-calm-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                            </svg>
                            <span class="text-xs font-semibold text-calm-300">Janji Kami</span>
                        </div>
                        <p class="text-xs text-safe-300 leading-relaxed">Website ini menjunjung tinggi kerahasiaan identitas. Kami tidak merekam alamat IP, tidak menggunakan cookies pelacak, dan tidak mengumpulkan data pribadi apapun. Ceritamu sepenuhnya anonim.</p>
                    </div>
                </div>
            </div>

            <!-- Bottom bar -->
            <div class="mt-12 pt-6 border-t border-white/10 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-xs text-safe-400">&copy; 2025 Ruang Aman Digital. Dibuat dengan empati dan solidaritas.</p>
                <div class="flex items-center gap-2 text-xs text-safe-400">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                    </svg>
                    Tanpa pelacak &bull; Tanpa log &bull; Tanpa jejak
                </div>
            </div>
        </div>
    </footer>

    <!-- ============================================ -->
    <!-- JAVASCRIPT -->
    <!-- ============================================ -->
    <script>
        // --- Mobile menu toggle ---
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        let menuOpen = false;

        mobileMenuBtn.addEventListener('click', () => {
            menuOpen = !menuOpen;
            mobileMenu.classList.toggle('hidden', !menuOpen);
            mobileMenuBtn.setAttribute('aria-expanded', menuOpen);
        });

        // Close mobile menu on link click
        document.querySelectorAll('.mobile-link').forEach(link => {
            link.addEventListener('click', () => {
                menuOpen = false;
                mobileMenu.classList.add('hidden');
                mobileMenuBtn.setAttribute('aria-expanded', false);
            });
        });

        // --- Form: enable submit only when checkbox checked and story not empty ---
        const storyForm = document.getElementById('storyForm');
        const storyInput = document.getElementById('story');
        const anonCheckbox = document.getElementById('anonConfirm');
        const submitBtn = document.getElementById('submitBtn');

        function validateForm() {
            const hasStory = storyInput.value.trim().length > 0;
            const isConfirmed = anonCheckbox.checked;
            submitBtn.disabled = !(hasStory && isConfirmed);
        }

        storyInput.addEventListener('input', validateForm);
        anonCheckbox.addEventListener('change', validateForm);
        validateForm();

        // --- Form submission ---
        storyForm.addEventListener('submit', (e) => {
            const storyText = storyInput.value.trim();
            if (!storyText || !anonCheckbox.checked) {
                e.preventDefault();
            }
        });

        // --- Toast notification ---
        function showToast(message) {
            const toast = document.getElementById('toast');
            const toastMsg = document.getElementById('toast-msg');
            toastMsg.textContent = message;
            toast.classList.add('show');
            setTimeout(() => {
                toast.classList.remove('show');
            }, 4000);
        }

        const toastEl = document.getElementById('toast');
        if (toastEl && toastEl.dataset.storySubmitted === '1') {
            showToast('Ceritamu telah tersimpan dengan aman. Terima kasih atas keberanianmu.');
        }

        // --- Read more toggle for story cards ---
        function attachReadMore(btn) {
            btn.addEventListener('click', () => {
                const storyFull = btn.nextElementSibling;
                const arrow = btn.querySelector('svg');
                const isOpen = storyFull.classList.contains('open');

                storyFull.classList.toggle('open', !isOpen);
                btn.setAttribute('aria-expanded', !isOpen);

                if (!isOpen) {
                    btn.childNodes[0].textContent = 'Ringkas cerita ';
                    arrow.style.transform = 'rotate(180deg)';
                } else {
                    btn.childNodes[0].textContent = 'Baca selengkapnya ';
                    arrow.style.transform = 'rotate(0deg)';
                }
            });
        }

        // Attach to all existing read-more buttons
        document.querySelectorAll('.read-more-btn').forEach(attachReadMore);

        // --- Intersection Observer for fade-in on scroll ---
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe sections
        document.querySelectorAll('section > div').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'opacity 0.6s ease-out, transform 0.6s ease-out';
            observer.observe(el);
        });

        // Make hero visible immediately
        const heroContent = document.querySelector('#hero > div');
        if (heroContent) {
            heroContent.style.opacity = '1';
            heroContent.style.transform = 'translateY(0)';
        }
    </script>

</body>

</html>
