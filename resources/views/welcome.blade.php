<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SIRUANG</title>
    <link rel="icon" type="image/png" href="{{ asset('img/lp3i.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- Flacticon --}}
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />


    {{-- DataTables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    {{-- Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />


    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
        <style>
            .blur-background {
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
            }

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
        </style>
    @else
    @endif
</head>
{{-- <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" alt="Laravel background" />
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                            @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </header>

                    <main class="mt-6">
                        dbhdbs
                    </main>

                </div>
            </div>
        </div>
    </body> --}}

<body class="lg:pl-32 pl-14 pt-36 content bg-red-50">
    <div class="flex items-center scroll pr-20 justify-center text-[40px] font-bold mb-8 ml-8 lg:ml-0">
        SIRUANG
    </div>
    <div class="flex gap-5 mr-8">
        <div class="w-full">
            <div class="flex flex-col lg:flex-row gap-3">
                <div class="text-center pt-2">
                    <div class="font-extrabold text-red-500">SESI 1</div>
                    <div>08.00 - 09.40 WIB</div>
                </div>
                <div class="flex flex-wrap gap-4 text-xs" id="rooms"></div>
            </div>

            <div class="flex flex-col lg:flex-row gap-3">
                <div class="text-center pt-2 pr-2">
                    <div class="font-extrabold text-red-500">SESI 2</div>
                    <div>09.50 - 11.30 WIB</div>
                </div>
                <div class="flex flex-wrap gap-4" id="rooms-dua"></div>
            </div>

            <div class="flex flex-col lg:flex-row gap-3">
                <div class="text-center pt-2 pr-3">
                    <div class="font-extrabold text-red-500">SESI 3</div>
                    <div>12.30 - 14.10 WIB</div>
                </div>
                <div class="flex flex-wrap gap-4" id="rooms-tiga"></div>
            </div>

            <div class="flex flex-col lg:flex-row gap-3">
                <div class="text-center pt-2 pr-2">
                    <div class="font-extrabold text-red-500">SESI 4</div>
                    <div>14.20 - 16.00 WIB</div>
                </div>
                <div class="flex flex-wrap gap-4" id="rooms-empat"></div>
            </div>

            <div class="flex flex-col lg:flex-row gap-3">
                <div class="text-center pt-2 pr-4">
                    <div class="font-extrabold text-red-500">SESI 5</div>
                    <div>16.10 - 17.50 WIB</div>
                </div>
                <div class="flex flex-wrap gap-4" id="rooms-lima"></div>
            </div>

            <div class="flex flex-col lg:flex-row gap-3">
                <div class="text-center pt-2 pr-3">
                    <div class="font-extrabold text-red-500">SESI 6</div>
                    <div>18.30 - 20.10 WIB</div>
                </div>
                <div class="flex flex-wrap gap-4" id="rooms-enam"></div>
            </div>
        </div>
    </div>
    <div class="flex flex-col lg:flex-row gap-5 items-center justify-center mt-8 mb-4 -ml-14 lg:-ml-0">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-red-400 rounded-full"></div>
            <div>Ruangan Terdapat Jadwal</div>
        </div>
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-amber-400 rounded-full"></div>
            <div>Ruangan Telah di pesan</div>
        </div>
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-emerald-400 rounded-full"></div>
            <div>Ruangan Tersedia</div>
        </div>
    </div>
    {{-- <div class="blur-background-two"></div>
    <div class="blur-background mt-[700px] ml-[1350px]"></div> --}}

    <div id="modal" class="hidden fixed inset-0 flex justify-center items-center m-4">
        <div class="bg-white rounded-lg p-6 lg:w-4/12 w-full shadow-xl">
            <h2 class="text-lg font-bold mb-4">Pesan Ruangan</h2>
            <p id="modal-content"></p>
            <button onclick="closeModal()" class="mt-4 bg-red-500 text-white px-4 py-2 rounded">Tutup</button>
        </div>
    </div>

    <div id="modal-info" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
        <div class="bg-white rounded-lg p-6 w-4/12">
            <h2 class="text-lg font-bold mb-4 bg-emerald-100 p-2 rounded-lg">Informasi Ruangan</h2>
            <p id="modal-content-info"></p>
            <button onclick="closeModalInfo()" class="mt-4 bg-red-500 text-white px-4 py-2 rounded">Tutup</button>
        </div>
    </div>

    <div id="modal-info-booking" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
        <div class="bg-white rounded-lg p-6 w-4/12">
            <h2 class="text-lg font-bold mb-4 bg-emerald-100 p-2 rounded-lg">Informasi Ruangan Dipesan</h2>
            <p id="modal-content-info-booking"></p>
            <button onclick="closeModalInfoBooking()"
                class="mt-4 bg-red-500 text-white px-4 py-2 rounded">Tutup</button>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(".js-example-placeholder-single").select2({
            placeholder: "Pilih...",
            allowClear: true,
            width: '100%'
        });
    </script>
    <script>
        function infoBookingRoom(id, kelas, program_studi, kegiatan, dosen, mata_kuliah) {
            // Update konten modal
            const modalContent = document.getElementById("modal-content-info-booking");
            modalContent.innerHTML = `
                Ruangan sudah dipesan oleh <span class="font-bold text-red-500">${kelas} - ${program_studi}</span> untuk:
                <div>
                    <table>
                        <tr>
                            <td class="font-bold text-red-500">Jenis Kegiatan</td>
                            <td class="pl-2 pr-2">:</td>
                            <td>${kegiatan}</td>
                        </tr>

                        ${kegiatan === "PERGANTIAN" ?
                        `
                                                    <tr>
                                                        <td class="font-bold text-red-500">Mata Kuliah</td>
                                                        <td class="pl-2 pr-2">:</td>
                                                        <td>${mata_kuliah}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-bold text-red-500">Dosen</td>
                                                        <td class="pl-2 pr-2">:</td>
                                                        <td>${dosen}</td>
                                                    </tr>
                                                    `
                        :
                        `<tr>
                                                        <td class="font-bold text-red-500">Penanggung Jawab</td>
                                                        <td class="pl-2 pr-2">:</td>
                                                        <td>${dosen}</td>
                                                    </tr>`
                        }
                    </table>
                </div>
            `;

            // Tampilkan modal
            const modal = document.getElementById("modal-info-booking");
            modal.classList.remove("hidden");
        }

        function updateRoom(id, nama_ruang, id_sesi) {
            // Update konten modal
            const ruangData = @json($ruang);
            const namaRuang = `${nama_ruang}`;
            const ruang = ruangData.find(r => r.ruang === namaRuang);
            const idRuang = ruang ? ruang.id : null;
            const modalContent = document.getElementById("modal-content");
            const pemesananStoreUrl = "{{ route('booking.store') }}";
            modalContent.innerHTML = `
                Untuk memesan ruangan harus login terlebih dahulu, <a href="{{ route('login') }}" class="text-red-400 font-bold">Login di sini</a>
            `;
            const modal = document.getElementById("modal");
            modal.classList.remove("hidden");
        }

        function infoRoom(id, kelas, program_studi, mata_kuliah, dosen, kegiatan) {
            // Update konten modal
            const modalContent = document.getElementById("modal-content-info");
            modalContent.innerHTML = `
                Ruangan digunakan untuk jadwal:
                <div>
                    <table>
                        <tr>
                            <td class="font-bold text-red-500">Kelas</td>
                            <td class="pl-2 pr-2">:</td>
                            <td>${kelas}</td>
                        </tr>
                        <tr>
                            <td class="font-bold text-red-500">Program Studi</td>
                            <td class="pl-2 pr-2">:</td>
                            <td>${program_studi}</td>
                        </tr>
                        <tr>
                            <td class="font-bold text-red-500">Mata Kuliah</td>
                            <td class="pl-2 pr-2">:</td>
                            <td>${mata_kuliah}</td>
                        </tr>
                        <tr>
                            <td class="font-bold text-red-500">Dosen</td>
                            <td class="pl-2 pr-2">:</td>
                            <td>${dosen}</td>
                        </tr>
                    </table>
                </div>
            `;

            // Tampilkan modal
            const modal = document.getElementById("modal-info");
            modal.classList.remove("hidden");
        }

        function closeModal() {
            const modal = document.getElementById("modal");
            modal.classList.add("hidden");
        }

        function closeModalInfo() {
            const modal = document.getElementById("modal-info");
            modal.classList.add("hidden");
        }

        function closeModalInfoBooking() {
            const modal = document.getElementById("modal-info-booking");
            modal.classList.add("hidden");
        }

        // Fungsi untuk menginisialisasi Select2
        const initializeSelect2 = () => {
            $('.js-example-placeholder-single').select2({
                placeholder: "Pilih...",
                allowClear: true,
            });
        };
    </script>
    <script src="https://cdn.socket.io/4.8.1/socket.io.min.js"></script>
    <script>
        const socket = io("https://siruang-api.politekniklp3i-tasikmalaya.ac.id");

        socket.on("connect", () => {
            console.log("connected");
        });
        socket.on("connect_error", () => {
            console.log("not connected");
        });

        socket.on("Rooms", (response) => {
            console.log(response);

            let RoomContent = "";
            let RoomContentDua = "";
            let RoomContentTiga = "";
            let RoomContentEmpat = "";
            let RoomContentLima = "";
            let RoomContentEnam = "";
            for (let i = 0; i < response.satu.length; i++) {
                RoomContent += `
                <div
                    ${
                    response.satu[i].verifikasi === "JADWAL"
                        ? `onclick="infoRoom('${response.satu[i].id}','${response.satu[i].kelas}','${response.satu[i].program_studi}','${response.satu[i].mata_kuliah}','${response.satu[i].dosen}')"`
                        : response.satu[i].verifikasi === "BOOKED"
                        ? `onclick="infoBookingRoom('${response.satu[i].id}','${response.satu[i].kelas}','${response.satu[i].program_studi}','${response.satu[i].kegiatan}','${response.satu[i].dosen}','${response.satu[i].mata_kuliah}')"`
                        : `onclick="updateRoom('${response.satu[i].id}','${response.satu[i].nama_ruang}','1')"`
                    }
                    class="${
                    response.satu[i].verifikasi === "JADWAL" && response.satu[i].status === "AKTIF"
                        ? "bg-red-500 text-white cursor-pointer"
                        : response.satu[i].verifikasi === "BOOKED" && response.satu[i].status === "AKTIF"
                        ? "bg-amber-400 text-black cursor-pointer"
                        : "bg-emerald-400 text-black cursor-pointer"
                    } w-[65px] h-[65px] flex items-center justify-center font-extrabold text-xm rounded-xl mb-4">${
                        response.satu[i].nama_ruang
                    }
                </div>`;
            }
            for (let i = 0; i < response.dua.length; i++) {
                RoomContentDua += `
                <div
                    ${
                    response.dua[i].verifikasi === "JADWAL"
                        ? `onclick="infoRoom('${response.dua[i].id}','${response.dua[i].kelas}','${response.dua[i].program_studi}','${response.dua[i].mata_kuliah}','${response.dua[i].dosen}')"`
                        : response.dua[i].verifikasi === "BOOKED"
                        ? `onclick="infoBookingRoom('${response.dua[i].id}','${response.dua[i].kelas}','${response.dua[i].program_studi}','${response.dua[i].jenis_kegiatan}','${response.dua[i].dosen}','${response.dua[i].mata_kuliah}')"`
                        :`onclick="updateRoom('${response.dua[i].id}','${response.dua[i].nama_ruang}','2')"`
                    }
                    class="${
                    response.dua[i].verifikasi === "JADWAL" && response.dua[i].status === "AKTIF"
                        ? "bg-red-500 text-white cursor-pointer"
                        : response.dua[i].verifikasi === "BOOKED" && response.dua[i].status === "AKTIF"
                        ? "bg-amber-400 text-black cursor-pointer"
                        : "bg-emerald-400 text-black cursor-pointer"
                    } w-[65px] h-[65px] flex items-center justify-center font-extrabold text-xm rounded-xl  mb-4">${
                        response.dua[i].nama_ruang
                    }
                </div>`;
            }
            for (let i = 0; i < response.tiga.length; i++) {
                RoomContentTiga += `
                <div
                    ${
                    response.tiga[i].verifikasi === "JADWAL"
                        ? `onclick="infoRoom('${response.tiga[i].id}','${response.tiga[i].kelas}','${response.tiga[i].program_studi}','${response.tiga[i].mata_kuliah}','${response.tiga[i].dosen}')"`
                        : response.tiga[i].verifikasi === "BOOKED"
                        ? `onclick="infoBookingRoom('${response.tiga[i].id}','${response.tiga[i].kelas}','${response.tiga[i].program_studi}','${response.tiga[i].jenis_kegiatan}','${response.tiga[i].dosen}','${response.dua[i].mata_kuliah}')"`
                        : `onclick="updateRoom('${response.tiga[i].id}','${response.tiga[i].nama_ruang}','3')"`
                    }
                    class="${
                    response.tiga[i].verifikasi === "JADWAL" && response.tiga[i].status === "AKTIF"
                        ? "bg-red-500 text-white cursor-pointer"
                        : response.tiga[i].verifikasi === "BOOKED" && response.tiga[i].status === "AKTIF"
                        ? "bg-amber-400 text-black cursor-pointer"
                        : "bg-emerald-400 text-black cursor-pointer"
                    } w-[65px] h-[65px] flex items-center justify-center font-extrabold text-xm rounded-xl  mb-4">${
                        response.tiga[i].nama_ruang
                    }
                </div>`;
            }
            for (let i = 0; i < response.empat.length; i++) {
                RoomContentEmpat += `
                <div
                    ${
                    response.empat[i].verifikasi === "JADWAL"
                        ? `onclick="infoRoom('${response.empat[i].id}','${response.empat[i].kelas}','${response.empat[i].program_studi}','${response.empat[i].mata_kuliah}','${response.empat[i].dosen}')"`
                        : response.empat[i].verifikasi === "BOOKED"
                        ? `onclick="infoBookingRoom('${response.empat[i].id}','${response.empat[i].kelas}','${response.empat[i].program_studi}','${response.empat[i].jenis_kegiatan}','${response.empat[i].dosen}','${response.dua[i].mata_kuliah}')"`
                        : `onclick="updateRoom('${response.empat[i].id}','${response.empat[i].nama_ruang}','4')"`
                    }
                    class="${
                    response.empat[i].verifikasi === "JADWAL" && response.empat[i].status === "AKTIF"
                        ? "bg-red-500 text-white cursor-pointer"
                        : response.empat[i].verifikasi === "BOOKED" && response.empat[i].status === "AKTIF"
                        ? "bg-amber-400 text-black cursor-pointer"
                        : "bg-emerald-400 text-black cursor-pointer"
                    } w-[65px] h-[65px] flex items-center justify-center font-extrabold text-xm rounded-xl mb-4">${
                    response.empat[i].nama_ruang
                    }
                </div>`;
            }
            for (let i = 0; i < response.lima.length; i++) {
                RoomContentLima += `
                <div
                    ${
                    response.lima[i].verifikasi === "JADWAL"
                        ? `onclick="infoRoom('${response.lima[i].id}','${response.lima[i].kelas}','${response.lima[i].program_studi}','${response.lima[i].mata_kuliah}','${response.lima[i].dosen}')"`
                        : response.lima[i].verifikasi === "BOOKED"
                        ? `onclick="infoBookingRoom('${response.lima[i].id}','${response.lima[i].kelas}','${response.lima[i].program_studi}','${response.lima[i].jenis_kegiatan}','${response.lima[i].dosen}','${response.dua[i].mata_kuliah}')"`
                        : `onclick="updateRoom('${response.lima[i].id}','${response.lima[i].nama_ruang}','5')"`
                    }
                    class="${
                    response.lima[i].verifikasi === "JADWAL" && response.lima[i].status === "AKTIF"
                        ? "bg-red-500 text-white cursor-pointer"
                        : response.lima[i].verifikasi === "BOOKED" && response.lima[i].status === "AKTIF"
                        ? "bg-amber-400 text-black cursor-pointer"
                        : "bg-emerald-400 text-black cursor-pointer"
                    } w-[65px] h-[65px] flex items-center justify-center font-extrabold text-xm rounded-xl mb-4">${
                    response.lima[i].nama_ruang
                    }
                </div>`;
            }
            for (let i = 0; i < response.enam.length; i++) {
                RoomContentEnam += `
                <div
                    ${
                    response.enam[i].verifikasi === "JADWAL"
                        ? `onclick="infoRoom('${response.enam[i].id}','${response.enam[i].kelas}','${response.enam[i].program_studi}','${response.enam[i].mata_kuliah}','${response.enam[i].dosen}')"`
                        : response.enam[i].verifikasi === "BOOKED"
                        ? `onclick="infoBookingRoom('${response.enam[i].id}','${response.enam[i].kelas}','${response.enam[i].program_studi}','${response.enam[i].jenis_kegiatan}','${response.enam[i].dosen}','${response.dua[i].mata_kuliah}')"`
                        : `onclick="updateRoom('${response.enam[i].id}','${response.enam[i].nama_ruang}','6')"`
                    }
                    class="${
                    response.enam[i].verifikasi === "JADWAL" && response.enam[i].status === "AKTIF"
                        ? "bg-red-500 text-white cursor-pointer"
                        : response.enam[i].verifikasi === "BOOKED" && response.enam[i].status === "AKTIF"
                        ? "bg-amber-400 text-black cursor-pointer"
                        : "bg-emerald-400 text-black cursor-pointer"
                    } w-[65px] h-[65px] flex items-center justify-center font-extrabold text-xm rounded-xl mb-4">${
                        response.enam[i].nama_ruang
                    }
                </div>`;
            }
            document.getElementById("rooms").innerHTML = RoomContent;
            document.getElementById("rooms-dua").innerHTML = RoomContentDua;
            document.getElementById("rooms-tiga").innerHTML = RoomContentTiga;
            document.getElementById("rooms-empat").innerHTML = RoomContentEmpat;
            document.getElementById("rooms-lima").innerHTML = RoomContentLima;
            document.getElementById("rooms-enam").innerHTML = RoomContentEnam;

            console.log(response);
        });

        function getRooms() {
            socket.emit("getRooms", "sopyan");
        }
        getRooms();
    </script>
</body>

</html>
