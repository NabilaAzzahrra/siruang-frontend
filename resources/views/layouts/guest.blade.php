<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="icon" type="image/png" href="{{ asset('img/lp3i.png') }}">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js"></script>
    <style>
        .custom-bg {
            background-image: url('{{ url('img/pattern.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body class="p-12 h-screen flex flex-col lg:flex-row items-center justify-center">
    <div class="custom-bg w-full rounded-3xl">
        <div class="lg:ml-12 ml-4 box lg:pt-6 pt-4 lg:mr-12 mr-4 flex w-36 lg:w-full items-start justify-start">
            <img src="{{ url('img/tagline.svg') }}" alt="" srcset="">
        </div>
        <div class="lg:ml-12 ml-4 lg:mt-44 mt-4 box lg:mr-12 mr-4">
            <div class="lg:text-[60px] font-extrabold w-80">
                Small Space, Big Ideas
            </div>
            <div class="lg:text-xl">
                Tempat yang tepat untuk ide-ide hebat.
            </div>
        </div>
        <div class="bg-gray-100 mt-4 lg:-ml-[10px] ml-[-10px] lg:mr-[10px] mr-[10px] lg:h-20 rounded-b-3xl lg:mt-[245px] lg:p-6 p-2 lg:pl-12 flex text-center items-center justify-start box">
            <span class="lg:ml-6 text-xs lg:text-xl">View More Application Web at Politeknik LP3I Tasikmalaya, </span> <a
                href="https://politekniklp3i-tasikmalaya.ac.id/catalog" target="_blank"
                class="text-sky-500 ml-1 font-bold mr-2 lg:mr-0 hover:text-sky-600 text-xs lg:text-xl">in here</a>
        </div>
    </div>
    <div class="w-full mt-4 lg:mt-0">
        <div class="w-full flex items-center lg:justify-end justify-center mt-4 lg:mt-[-300px] box-left">
            <div class="mr-4">
                <img src="{{ url('img/lp3i-color.png') }}" class="w-60" alt="" srcset="">
            </div>
            <div class="mr-12">
                <img src="{{ url('img/global-mandiri.png') }}" class="w-48" alt="" srcset="">
            </div>
        </div>
        <div class="flex items-center justify-center mt-4 lg:mt-64">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="box-email">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="border-2 border-gray-100 p-2 h-10 mt-1 w-[300px]" type="email" name="email"
                        :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4 box-password">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="border-2 p-2 border-gray-100 h-10 mt-1 w-full" type="password" name="password" required
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
