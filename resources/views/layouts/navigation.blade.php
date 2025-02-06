<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">

                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <img src="{{url('img/lp3i.png')}}" class="block h-14 w-[40px] fill-current text-gray-800 dark:text-gray-200" alt="" srcset="">
                    {{-- <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a> --}}
                </div>
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard', 'booking.targetHalaman')">
                        <div class="text-[16px] font-bold tracking-wide">Dashboard</div>
                    </x-nav-link>
                </div>
                @can('role-A')
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <li class="relative list-none">
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-black dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                        <div
                                            class="text-[16px] font-bold tracking-wide {{ request()->routeIs(['konfigurasi.index', 'tahunAkademik.index', 'jenisKegiatan.index', 'ruang.index', 'kelas.index', 'dosen.index', 'mataKuliah.index', 'user.index']) || request()->routeIs(['konfigurasi.index', 'tahunAkademik.index', 'jenisKegiatan.index', 'ruang.index', 'kelas.index', 'dosen.index', 'mataKuliah.index']) ? 'text-[#F2994A]' : '' }}">
                                            Master</div>
                                        <div class="ms-1 mt-1">
                                            <i
                                                class="fi fi-rr-caret-down {{ request()->routeIs(['konfigurasi.index', 'tahunAkademik.index', 'jenisKegiatan.index', 'ruang.index', 'kelas.index', 'dosen.index', 'mataKuliah.index', 'user.index']) || request()->routeIs(['konfigurasi.index', 'tahunAkademik.index', 'jenisKegiatan.index', 'ruang.index', 'kelas.index', 'dosen.index', 'mataKuliah.index']) ? 'text-[#F2994A]' : '' }}"></i>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">

                                    <x-dropdown-link :href="route('konfigurasi.index')" :class="request()->routeIs('konfigurasi.index') ? 'text-red-500 font-bold' : ''">
                                        {{ __('Konfigurasi') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('tahunAkademik.index')" :class="request()->routeIs('tahunAkademik.index')
                                        ? 'text-red-500 font-bold'
                                        : ''">
                                        {{ __('Tahun Akademik') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('jenisKegiatan.index')" :class="request()->routeIs('jenisKegiatan.index')
                                        ? 'text-red-500 font-bold'
                                        : ''">
                                        {{ __('Jenis Kegiatan') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('ruang.index')" :class="request()->routeIs('ruang.index') ? 'text-red-500 font-bold' : ''">
                                        {{ __('Ruang') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('kelas.index')" :class="request()->routeIs('kelas.index') ? 'text-red-500 font-bold' : ''">
                                        {{ __('Kelas') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('dosen.index')" :class="request()->routeIs('dosen.index') ? 'text-red-500 font-bold' : ''">
                                        {{ __('Dosen') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('mataKuliah.index')" :class="request()->routeIs('mataKuliah.index') ? 'text-red-500 font-bold' : ''">
                                        {{ __('Mata Kuliah') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('user.index')" :class="request()->routeIs('user.index') ? 'text-red-500 font-bold' : ''">
                                        {{ __('User') }}
                                    </x-dropdown-link>

                                </x-slot>
                            </x-dropdown>
                        </li>
                    </div>

                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <li class="relative list-none">
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-black dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                        <div
                                            class="text-[16px] font-bold tracking-wide {{ request()->routeIs(['jadwal.index', 'pemesanan.index']) || request()->routeIs(['jadwal.index', 'pemesanan.index']) ? 'text-[#F2994A]' : '' }}">
                                            Aktivitas Ruangan</div>
                                        <div class="ms-1 mt-1">
                                            <i
                                                class="fi fi-rr-caret-down {{ request()->routeIs(['jadwal.index', 'pemesanan.index']) || request()->routeIs(['jadwal.index', 'pemesanan.index']) ? 'text-[#F2994A]' : '' }}"></i>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">

                                    <x-dropdown-link :href="route('jadwal.index')" :class="request()->routeIs('jadwal.index') ? 'text-red-500 font-bold' : ''">
                                        {{ __('Jadwal') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('pemesanan.index')" :class="request()->routeIs('pemesanan.index') ? 'text-red-500 font-bold' : ''">
                                        {{ __('Pemesanan') }}
                                    </x-dropdown-link>

                                </x-slot>
                            </x-dropdown>
                        </li>
                    </div>

                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('report.index')" :active="request()->routeIs('report.index')">
                            <div class="text-[16px] font-bold tracking-wide">Laporan</div>
                        </x-nav-link>
                    </div>
                @endcan
                @can('role-U')
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <li class="relative list-none">
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-black dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                        <div
                                            class="text-[16px] font-bold tracking-wide {{ request()->routeIs(['jadwal.index', 'pemesanan.index']) || request()->routeIs(['jadwal.index', 'pemesanan.index']) ? 'text-[#F2994A]' : '' }}">
                                            Aktivitas Ruangan</div>
                                        <div class="ms-1 mt-1">
                                            <i
                                                class="fi fi-rr-caret-down {{ request()->routeIs(['jadwal.index', 'pemesanan.index']) || request()->routeIs(['jadwal.index', 'pemesanan.index']) ? 'text-[#F2994A]' : '' }}"></i>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">

                                    <x-dropdown-link :href="route('jadwal.show', Auth::user()->id)" :class="request()->routeIs('jadwal.show', Auth::user()->id)
                                        ? 'text-red-500 font-bold'
                                        : ''">
                                        {{ __('Jadwal') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('pemesanan.show', Auth::user()->id)" :class="request()->routeIs('pemesanan.show', Auth::user()->id)
                                        ? 'text-red-500 font-bold'
                                        : ''">
                                        {{ __('Pemesanan') }}
                                    </x-dropdown-link>

                                </x-slot>
                            </x-dropdown>
                        </li>
                    </div>
                @endcan
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div class="mr-4 font-bold">{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <img src="{{url('img/working.png')}}" class="w-10 h-10" alt="" srcset="">
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        {{-- <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link> --}}

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard', 'booking.targetHalaman')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        @can('role-A')
            <!-- Dropdown Menu Example -->
            <div x-data="{ openDropdown: false }" class="space-y-1">
                <button @click="openDropdown = !openDropdown"
                    class="w-full text-left px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                    {{ __('Master') }}
                </button>

                <div x-show="openDropdown" class="pl-4 space-y-1">
                    <x-responsive-nav-link :href="route('konfigurasi.index')" :active="request()->routeIs('konfigurasi.index')">
                        {{ __('Konfigurasi') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('tahunAkademik.index')" :active="request()->routeIs('tahunAkademik.index')">
                        {{ __('Tahun Akademik') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('jenisKegiatan.index')" :active="request()->routeIs('jenisKegiatan.index')">
                        {{ __('Jenis Kegiatan') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('ruang.index')" :active="request()->routeIs('ruang.index')">
                        {{ __('Ruang') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('kelas.index')" :active="request()->routeIs('kelas.index')">
                        {{ __('Kelas') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('dosen.index')" :active="request()->routeIs('dosen.index')">
                        {{ __('Dosen') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('mataKuliah.index')" :active="request()->routeIs('mataKuliah.index')">
                        {{ __('Mata Kuliah') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('user.index')" :active="request()->routeIs('user.index')">
                        {{ __('User') }}
                    </x-responsive-nav-link>
                </div>
            </div>

            <!-- Dropdown Menu Example -->
            <div x-data="{ openDropdown: false }" class="space-y-1">
                <button @click="openDropdown = !openDropdown"
                    class="w-full text-left px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                    {{ __('Aktivitas Ruangan') }}
                </button>

                <div x-show="openDropdown" class="pl-4 space-y-1">
                    <x-responsive-nav-link :href="route('jadwal.index')" :active="request()->routeIs('jadwal.index')">
                        {{ __('Jadwal') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('pemesanan.index')" :active="request()->routeIs('pemesanan.index')">
                        {{ __('Pemesanan') }}
                    </x-responsive-nav-link>
                </div>
            </div>

            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('report.index')" :active="request()->routeIs('report.index')">
                    {{ __('Laporan') }}
                </x-responsive-nav-link>
            </div>
        @endcan

        @can('role-U')
            <!-- Dropdown Menu Example -->
            <div x-data="{ openDropdown: false }" class="space-y-1">
                <button @click="openDropdown = !openDropdown"
                    class="w-full text-left px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                    {{ __('Aktivitas Ruangan') }}
                </button>

                <div x-show="openDropdown" class="pl-4 space-y-1">
                    <x-responsive-nav-link :href="route('jadwal.show', Auth::user()->id)" :active="request()->routeIs('jadwal.show', Auth::user()->id)">
                        {{ __('Jadwal') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('pemesanan.show', Auth::user()->id)" :active="request()->routeIs('pemesanan.show', Auth::user()->id)">
                        {{ __('Pemesanan') }}
                    </x-responsive-nav-link>
                </div>
            </div>
        @endcan

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                {{-- <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link> --}}

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
