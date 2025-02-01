<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>LOGIN | SIRUANG</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js"></script>
    <style>
        body {
            font-family: "Poppins", sans-serif;
        }
    </style>
    <style>
        /*.blur-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 30%;
            height: 30%;
            background-image: url("img/btn.png");
            background-repeat: no-repeat;
            background-position: calc(100% - 0px) calc(100% - 0px);
            background-size: cover;
            filter: blur(1px);
            z-index: -1;
        }

        .blur-background-two {
            position: fixed;
            top: 0;
            left: 0;
            width: 30%;
            height: 30%;
            background-image: url("img/top.png");
            background-repeat: no-repeat;
            background-position: calc(100% - 0px) calc(100% - 0px);
            background-size: cover;
            filter: blur(1px);
            z-index: -1;
        }*/

        .content {
            position: relative;
            z-index: 1;
            font-family: "Poppins", sans-serif;
        }

        .select2-container .select2-selection--single {
            width: 100% !important;
            background-color: #f9fafb;
            border: 1px solid #d1d5db !important;
            padding: 0.5rem 0.75rem;
            font-size: 0.875rem;
            height: 43px;
            border-radius: 0.4rem;
            color: #1f2937;
        }

        .select2-container .select2-selection--single .select2-selection__arrow {
            top: 20% !important;
            right: 8px;
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            font-size: 14px !important;
            top: -2px;
            left: -6px;
            position: relative;
            color: #1f2937;
        }

        .select2-search__field {
            font-size: 14px !important;
            border-radius: 0.5rem;
        }

        .select2-results {
            font-size: 14px !important;
            border-radius: 0px 10px 0px 10px;
        }

        .custom-bg {
            background-image: url('{{ url('img/pattern.jpg') }}');
            /* URL gambar */
            background-size: cover;
            /* Gambar akan menyesuaikan ukuran div */
            background-position: center;
            /* Posisikan gambar di tengah */
            background-repeat: no-repeat;
            /* Jangan ulang gambar */
        }
    </style>
</head>

<body class="items-center justify-center lg:h-screen">
    {{-- <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900"> --}}
    {{-- <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg"> --}}
    {{-- {{ $slot }} --}}
    {{-- </div>
        </div> --}}
    {{-- <div class="blur-background-two"></div> --}}
    {{-- <div class="blur-background mt-[700px] ml-[1350px]"></div> --}}
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="flex flex-col lg:flex-row items-center justify-center gap-12 bg-red-500 h-screen">
        <div class="custom-bg border-2 border-gray-100 bg-gray-100 rounded-3xl lg:w-[900px] lg:h-[920px] lg:mr-[325px] lg:mt-4">
            <div class="flex items-end just lg:ml-12 lg:mt-12 box">
                <img src="{{ url('img/tagline.svg') }}" alt="" srcset="">
            </div>
            <div class="ml-12 lg:mt-44 box">
                <div class="lg:text-[60px] font-extrabold w-80">
                    Small Space, Big Ideas
                </div>
                <div class="lg:text-xl">
                    Tempat yang tepat untuk ide-ide hebat.
                </div>
                {{-- <span class="-mt-24 z-0 -mr-10">Copyright © 2024 Politeknik LP3I Kampus Tasikmalaya</span> --}}
            </div>
            <div
                class="bg-gray-100 lg:-ml-3 lg:mr-2 h-20 rounded-b-3xl mt-[245px] lg:p-6 lg:pl-12 flex text-center items-center justify-start box" hidden>
                <span class="lg:ml-6">View More Application Web at Politeknik LP3I Tasikmalaya, </span> <a
                    href="https://politekniklp3i-tasikmalaya.ac.id/catalog" target="_blank"
                    class="text-sky-500 ml-1 font-bold hover:text-sky-600">in here</a>
            </div>
        </div>
        <div class="mr-[300px] ml-[300px]">
            <div class="flex -mt-[300px] items-end justify-end lg:-mr-[300px] box-left">
                <div class="mr-4">
                    <img src="{{ url('img/lp3i-color.png') }}" class="w-60" alt="" srcset="">
                </div>
                <div class="mr-12">
                    <img src="{{ url('img/global-mandiri.png') }}" class="w-48" alt="" srcset="">
                </div>
            </div>
            <div class="mt-60 w-[300px]">
                <form method="POST" action="{{ route('login') }}" class="w-full">
                    @csrf

                    <!-- Email Address -->
                    <div class="box-email">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4 box-password">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4 box-btn">
                        <x-primary-button class="ms-3">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        gsap.fromTo(
            ".box", {
                autoAlpha: 0,
                x: -200
            }, {
                autoAlpha: 0.8,
                x: 10,
                duration: 1
            }
        );
        gsap.fromTo(
            ".box-left", {
                autoAlpha: 0,
                x: 200
            }, {
                autoAlpha: 0.8,
                x: 10,
                duration: 1
            }
        );
        gsap.fromTo(
            ".box-email", {
                autoAlpha: 0,
                y: -200
            }, {
                autoAlpha: 0.8,
                y: 10,
                duration: 1
            }
        );
        gsap.fromTo(
            ".box-password", {
                autoAlpha: 0,
                y: -200
            }, {
                autoAlpha: 0.8,
                y: 10,
                duration: 2
            }
        );
        gsap.fromTo(
            ".box-btn", {
                autoAlpha: 0,
                y: -200
            }, {
                autoAlpha: 0.8,
                y: 10,
                duration: 3
            }
        );
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>
