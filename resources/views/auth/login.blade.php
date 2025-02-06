<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="flex flex-col lg:flex-row items-center justify-center gap-12 bg-red-500 h-screen">
        <div
            class="custom-bg border-2 border-gray-100 bg-gray-100 rounded-3xl lg:w-[900px] lg:h-[920px] lg:mr-[325px] lg:mt-4">
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
            <div class="bg-gray-100 lg:-ml-3 lg:mr-2 h-20 rounded-b-3xl mt-[245px] lg:p-6 lg:pl-12 flex text-center items-center justify-start box"
                hidden>
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
                        <x-input-label for="email" :value="__('Username')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="text" name="email"
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
</x-guest-layout>
