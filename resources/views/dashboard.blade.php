<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    </x-slot>

    <div class="py-12 content pt-20 pl-24">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div>
                <div class="lg:w-[400px] w-[240px] mb-5">
                    <label for="tgl"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
                    <input type="date" id="tgl" name="tgl"
                        class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Masukan Tanggal Pakai disini ..." value="{{ date('Y-m-d') }}"
                        onchange="redirectToPage(this.value)" />
                </div>
            </div>
            <div class="flex gap-5 mr-8">
                <div class="w-full">
                    <div class="flex flex-col lg:flex-row gap-3">
                        <div class="text-center pt-2 pr-1">
                            <div class="font-extrabold text-red-500">SESI 1</div>
                            <div>08.00 - 09.40 WIB</div>
                        </div>
                        <div class="flex flex-wrap gap-4" id="rooms"></div>
                    </div>

                    <div class="flex flex-col lg:flex-row gap-3">
                        <div class="text-center pt-2 pr-3">
                            <div class="font-extrabold text-red-500">SESI 2</div>
                            <div>09.50 - 11.30 WIB</div>
                        </div>
                        <div class="flex flex-wrap gap-4" id="rooms-dua"></div>
                    </div>

                    <div class="flex flex-col lg:flex-row gap-3">
                        <div class="text-center pt-2 pr-4">
                            <div class="font-extrabold text-red-500">SESI 3</div>
                            <div>12.30 - 14.10 WIB</div>
                        </div>
                        <div class="flex flex-wrap gap-4" id="rooms-tiga"></div>
                    </div>

                    <div class="flex flex-col lg:flex-row gap-3">
                        <div class="text-center pt-2 pr-3">
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
            <div class="flex flex-col lg:flex-row gap-5 items-center justify-center mt-8 -ml-14 lg:-ml-0">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-red-500 rounded-full"></div>
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
        </div>
    </div>
    {{-- <div class="blur-background-two"></div>
    <div class="blur-background mt-[700px] ml-[1350px]"></div> --}}

    <div id="modal" class="hidden fixed inset-0 flex justify-center items-center m-4">
        <div class="bg-white rounded-lg p-6 lg:w-4/12 w-full shadow-xl">
            <h2 class="text-lg font-bold mb-4 bg-amber-100 p-2 rounded-xl">Pesan Ruangan</h2>
            <form id="bookingForm" action="{{ route('booking.store') }}" method="post" class="w-full">
                <p id="modal-content"></p>
                <button type="submit" id="submitBooking" class="mt-4 bg-sky-500 text-white px-4 py-2 rounded">
                    Simpan
                </button>
                <button onclick="closeModal()" class="mt-4 bg-red-500 text-white px-4 py-2 rounded">Tutup</button>
            </form>
        </div>
    </div>

    <div id="modal-info" class="hidden fixed inset-0 flex justify-center items-center m-4">
        <div class="bg-white rounded-lg p-6 lg:w-4/12 w-full shadow-xl">
            <h2 class="text-lg font-bold mb-4 bg-emerald-100 p-2 rounded-lg">Informasi Ruangan</h2>
            <p id="modal-content-info"></p>
            <button onclick="closeModalInfo()" class="mt-4 bg-red-500 text-white px-4 py-2 rounded">Tutup</button>
        </div>
    </div>

    <div id="modal-info-booking" class="hidden fixed inset-0 flex justify-center items-center m-4">
        <div class="bg-white rounded-lg p-6 lg:w-4/12 w-full shadow-xl">
            <h2 class="text-lg font-bold mb-4 bg-emerald-100 p-2 rounded-lg">Informasi Ruangan Dipesan</h2>
            <p id="modal-content-info-booking"></p>
            <button onclick="closeModalInfoBooking()"
                class="mt-4 bg-red-500 text-white px-4 py-2 rounded">Tutup</button>
        </div>
    </div>

    <script>
        function infoBookingRoom(id, kelas, program_studi, kegiatan, dosen, mata_kuliah) {
            // Update konten modal
            const modalContent = document.getElementById("modal-content-info-booking");
            modalContent.innerHTML = `
                <div class="text-wrap">Ruangan sudah dipesan oleh <span class="font-bold text-red-500">${kelas} - ${program_studi}</span> untuk:</div>
                <div>
                    <table>
                        <tr>
                            <td class="font-bold text-red-500">Jenis Kegiatan</td>
                            <td class="pl-2 pr-2">:</td>
                            <td class="text-wrap">${kegiatan}</td>
                        </tr>

                        ${kegiatan === "PERGANTIAN" ?
                        `
                                                                                                                    <tr>
                                                                                                                        <td class="font-bold text-red-500">Mata Kuliah</td>
                                                                                                                        <td class="pl-2 pr-2">:</td>
                                                                                                                        <td class="text-wrap">${mata_kuliah}</td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <td class="font-bold text-red-500">Dosen</td>
                                                                                                                        <td class="pl-2 pr-2">:</td>
                                                                                                                        <td class="text-wrap">${dosen}</td>
                                                                                                                    </tr>
                                                                                                                    `
                        :
                        `<tr>
                                                                                                                        <td class="font-bold text-red-500">Penanggung Jawab</td>
                                                                                                                        <td class="pl-2 pr-2">:</td>
                                                                                                                        <td class="text-wrap">${dosen}</td>
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
            const ruangData = @json($ruang);
            const namaRuang = `${nama_ruang}`;
            const ruang = ruangData.find(r => r.ruang === namaRuang);
            const idRuang = ruang ? ruang.id : null;
            const modalContent = document.getElementById("modal-content");
            const pemesananStoreUrl = "{{ route('booking.store') }}";
            modalContent.innerHTML = `
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" value="${id_sesi}" name="sesi">
                    <input type="hidden" value="${idRuang}" name="ruang">
                    <div class="lg:mb-5 mb-2 w-full">
                        <label for="mata_kuliah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mata Kuliah <span class="text-red-500">*</span></label>
                        <select id="mata_kuliah" class="js-example-placeholder-single js-states lg:w-[400px] w-[280px] form-control m-6" name="mata_kuliah" data-placeholder="Pilih Mata Kuliah">
                            <option value="">Pilih...</option>
                            @foreach ($mataKuliah as $k)
                                <option value="{{ $k->id }}" data-sks="{{ $k->sks }}">{{ $k->mata_kuliah }}</option>
                            @endforeach
                        </select>
                        <p id="error-mata_kuliah" class="mt-2 text-sm text-red-500 hidden">Mata kuliah wajib dipilih.</p>
                    </div>
                    <div class="lg:mb-5 mb-2 w-full">
                        <label for="dosen" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dosen <span class="text-red-500">*</span></label>
                        <select id="dosen" class="js-example-placeholder-single js-states form-control lg:w-[400px] w-[280px] m-6" name="dosen" data-placeholder="Pilih Dosen">
                            <option value="">Pilih...</option>
                            @foreach ($dosen as $k)
                                <option value="{{ $k->id }}">{{ $k->dosen }}</option>
                            @endforeach
                        </select>
                        <p id="error-dosen" class="mt-2 text-sm text-red-500 hidden">Dosen wajib dipilih.</p>
                    </div>
                    @can('role-A')
                        <div class="lg:mb-5 mb-2 w-full">
                            <label for="kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas <span class="text-red-500">*</span></label>
                            <select id="kelas" class="js-example-placeholder-single js-states form-control lg:w-[400px] w-[280px] m-6" name="kelas" data-placeholder="Pilih Kelas">
                                <option value="">Pilih...</option>
                                @foreach ($kelas as $k)
                                    <option value="{{ $k->id }}">{{ $k->kelas }}</option>
                                @endforeach
                            </select>
                            <p id="error-kelas" class="mt-2 text-sm text-red-500 hidden">Kelas wajib dipilih.</p>
                        </div>
                    @endcan
                    @can('role-U')
                        <div class="lg:mb-5 mb-2 w-full" hidden>
                            <label for="kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                            <input type="text" id="kelas" name="kelas" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $id_kelas->id }}" />
                        </div>
                    @endcan
                    <div class="lg:mb-5 mb-2 w-full">
                        <label for="kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kegiatan <span class="text-red-500">*</span></label>
                        <select id="kegiatan" class="js-example-placeholder-single js-states form-control lg:w-[400px] w-[280px] m-6" name="jenis_kegiatan" data-placeholder="Pilih Jenis Kegiatan">
                            <option value="">Pilih...</option>
                            @foreach ($jenisKegiatan as $k)
                                <option value="{{ $k->id }}">{{ $k->kegiatan }}</option>
                            @endforeach
                        </select>
                        <p id="error-kegiatan" class="mt-2 text-sm text-red-500 hidden">Kegiatan wajib dipilih.</p>
                    </div>
                    <div class="lg:mb-5 mb-2 w-full" hidden>
                        <label for="tgl_pakai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pakai</label>
                        <input type="date" id="tgl_pakai" name="tgl_pakai" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Tanggal Pakai disini ..." value="{{ date('Y-m-d') }}"/>
                    </div>
                    <div class="lg:mb-5 mb-5 w-full">
                        <label for="no_hp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No HP</label>
                        <input type="number" id="no_hp" name="no_hp" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan No HP disini ..." />
                        <p id="error-no_hp" class="mt-2 text-sm text-red-500 hidden">No HP wajib diisi.</p>
                    </div>
            `;

            const form = document.getElementById('bookingForm');

            const noHpInput = document.getElementById('no_hp');
            const errorNoHp = document.createElement('p');
            errorNoHp.id = 'error-no_hp';
            errorNoHp.className = 'mt-2 text-sm text-red-500 hidden';
            errorNoHp.innerText = 'No HP wajib diisi dan harus minimal 13 karakter.';
            noHpInput.parentNode.appendChild(errorNoHp);

            noHpInput.addEventListener('focus', () => {
                if (!noHpInput.value.startsWith('62')) {
                    noHpInput.value = '62';
                }
            });

            noHpInput.addEventListener('input', () => {
                let value = noHpInput.value;

                // Pastikan selalu dimulai dengan "62"
                if (!value.startsWith('62')) {
                    value = '62';
                }

                // Pastikan karakter setelah "62" adalah "8"
                if (value.length > 2 && value.charAt(2) !== '8') {
                    value = value.slice(0, 2) + '8' + value.slice(3);
                }

                // Batasi hingga maksimal 14 karakter
                if (value.length > 14) {
                    value = value.slice(0, 14);
                }

                noHpInput.value = value;

                // Tampilkan pesan error jika kurang dari 13 karakter
                if (value.length < 13) {
                    errorNoHp.classList.remove('hidden');
                } else {
                    errorNoHp.classList.add('hidden');
                }
            });
            const isRoleA = @json(Auth::user()->can('role-A'));

            // Validasi sebelum submit
            form.addEventListener('submit', function(e) {
                e.preventDefault(); // Mencegah form dikirim

                let isValid = true;

                // Validasi Mata Kuliah
                const mataKuliah = document.getElementById('mata_kuliah');
                const errorMataKuliah = document.getElementById('error-mata_kuliah');
                if (mataKuliah.value === '') {
                    errorMataKuliah.classList.remove('hidden');
                    isValid = false;
                } else {
                    errorMataKuliah.classList.add('hidden');
                }

                // Validasi Mata Kuliah
                const dosen = document.getElementById('dosen');
                const errorDosen = document.getElementById('error-dosen');
                if (dosen.value === '') {
                    errorDosen.classList.remove('hidden');
                    isValid = false;
                } else {
                    errorDosen.classList.add('hidden');
                }

                // Validasi Mata Kuliah
                const kegiatan = document.getElementById('kegiatan');
                const errorKegiatan = document.getElementById('error-kegiatan');
                if (kegiatan.value === '') {
                    errorKegiatan.classList.remove('hidden');
                    isValid = false;
                } else {
                    errorKegiatan.classList.add('hidden');
                }
                // Validasi No HP
                const noHpValue = noHpInput.value.trim();
                if (noHpValue === '' || noHpValue.length < 13) {
                    errorNoHp.classList.remove('hidden');
                    isValid = false;
                } else {
                    errorNoHp.classList.add('hidden');
                }

                // Validasi Kelas (Hanya untuk role "A")
                if (isRoleA) {
                    const kelas = document.getElementById('kelas');
                    const errorKelas = document.getElementById('error-kelas');
                    if (kelas.value === '') {
                        errorKelas.classList.remove('hidden');
                        isValid = false;
                    } else {
                        errorKelas.classList.add('hidden');
                    }
                }


                // Jika validasi lolos, kirim form
                if (isValid) {
                    form.submit();
                }
            });

            // Tampilkan modal
            initializeSelect2();
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
                            <td class="text-wrap">${kelas}</td>
                        </tr>
                        <tr>
                            <td class="font-bold text-red-500">Program Studi</td>
                            <td class="pl-2 pr-2">:</td>
                            <td class="text-wrap">${program_studi}</td>
                        </tr>
                        <tr>
                            <td class="font-bold text-red-500">Mata Kuliah</td>
                            <td class="pl-2 pr-2">:</td>
                            <td class="text-wrap">${mata_kuliah}</td>
                        </tr>
                        <tr>
                            <td class="font-bold text-red-500">Dosen</td>
                            <td class="pl-2 pr-2">:</td>
                            <td class="text-wrap">${dosen}</td>
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
        const socket = io("https://siruang-api.politekniklp3i-tasikmalaya.ac.id/");

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
                        ? `onclick="infoBookingRoom('${response.dua[i].id}','${response.dua[i].kelas}','${response.dua[i].program_studi}','${response.dua[i].kegiatan}','${response.dua[i].dosen}','${response.dua[i].mata_kuliah}')"`
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
                        ? `onclick="infoBookingRoom('${response.tiga[i].id}','${response.tiga[i].kelas}','${response.tiga[i].program_studi}','${response.tiga[i].kegiatan}','${response.tiga[i].dosen}','${response.tiga[i].mata_kuliah}')"`
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
                        ? `onclick="infoBookingRoom('${response.empat[i].id}','${response.empat[i].kelas}','${response.empat[i].program_studi}','${response.empat[i].kegiatan}','${response.empat[i].dosen}','${response.empat[i].mata_kuliah}')"`
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
                        ? `onclick="infoBookingRoom('${response.lima[i].id}','${response.lima[i].kelas}','${response.lima[i].program_studi}','${response.lima[i].kegiatan}','${response.lima[i].dosen}','${response.lima[i].mata_kuliah}')"`
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
                        ? `onclick="infoBookingRoom('${response.enam[i].id}','${response.enam[i].kelas}','${response.enam[i].program_studi}','${response.enam[i].kegiatan}','${response.enam[i].dosen}','${response.enam[i].mata_kuliah}')"`
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
    <script>
        function redirectToPage(selectedDate) {
            if (selectedDate) {
                const targetUrl = `/target-halaman/${selectedDate}`;
                window.location.href = targetUrl;
            }
        }
    </script>
    @if (session('message_insert'))
        <script src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.2.3/howler.min.js"></script>
        <script>
            const sound = new Howl({
                src: ['{{ url('sound/success.mp3') }}'],
                volume: 0.5 // Atur volume
            });

            Swal.fire({
                title: 'Berhasil!',
                text: "{{ session('message_insert') }}",
                icon: 'success',
                confirmButtonText: 'OK',
                didOpen: () => {
                    sound.play(); // Putar suara saat alert muncul
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // sound.play(); // Putar suara saat klik "OK"
                }
            });
        </script>
    @endif
</x-app-layout>
