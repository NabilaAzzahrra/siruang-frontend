<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    </x-slot>

    <div class="py-12 content  pt-20 pl-24">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div>
                <div class="w-[300px] mb-5">
                    <label for="tgl"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
                    <input type="date" id="tgl" name="tgl"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Masukan Tanggal Pakai disini ..." value="{{ date('Y-m-d', strtotime($tgl)) }}"
                        onchange="redirectToPage(this.value)" />
                </div>
            </div>
            <div class="flex gap-5 mr-8">
                <div class="w-full">
                    <div class="flex gap-4">
                        <div class="text-center pt-2">
                            <div class="font-extrabold text-red-500">SESI 1</div>
                            <div>08.00 - 09.40 WIB</div>
                        </div>
                        @foreach ($ruang as $r)
                            @php
                                $matchingData = $data->firstWhere('id_ruang', $r->id);
                                $bgColor = $matchingData
                                    ? ($matchingData->verifikasi === 'JADWAL'
                                        ? 'bg-red-500'
                                        : 'bg-amber-400')
                                    : 'bg-emerald-400';
                                $onClick = $matchingData
                                    ? ($matchingData->verifikasi === 'JADWAL'
                                        ? "infoRoom('{$matchingData->id}','{$matchingData->kelas}','{$matchingData->program_studi}', '{$matchingData->mata_kuliah}','{$matchingData->dosen}')"
                                        : "infoRoomBooking('{$matchingData->id}','{$matchingData->kelas}','{$matchingData->program_studi}','{$matchingData->kegiatan}', '{$matchingData->mata_kuliah}','{$matchingData->dosen}')")
                                    : "booking('{$r->id}','{$r->id}', '1')";
                            @endphp
                            <div class="p-2 {{ $bgColor }} cursor-pointer w-[65px] h-[65px] flex items-center justify-center font-extrabold text-xm rounded-xl  mb-4"
                                onclick="{{ $onClick }}">
                                {{ $r->ruang }}
                            </div>
                        @endforeach
                    </div>
                    <div class="flex gap-4">
                        <div class="text-center pt-2 pr-2">
                            <div class="font-extrabold text-red-500">SESI 2</div>
                            <div>09.50 - 11.30 WIB</div>
                        </div>
                        @foreach ($ruang as $r)
                            @php
                                $matchingData = $dataDua->firstWhere('id_ruang', $r->id);
                                $bgColor = $matchingData
                                    ? ($matchingData->verifikasi === 'JADWAL'
                                        ? 'bg-red-500'
                                        : 'bg-amber-400')
                                    : 'bg-emerald-400';
                                $onClick = $matchingData
                                    ? ($matchingData->verifikasi === 'JADWAL'
                                        ? "infoRoom('{$matchingData->id}','{$matchingData->kelas}','{$matchingData->program_studi}', '{$matchingData->mata_kuliah}','{$matchingData->dosen}')"
                                        : "infoRoomBooking('{$matchingData->id}','{$matchingData->kelas}','{$matchingData->program_studi}','{$matchingData->kegiatan}', '{$matchingData->mata_kuliah}','{$matchingData->dosen}')")
                                    : "booking('{$r->id}','{$r->id}', '2')";
                            @endphp
                            <div class="p-2 {{ $bgColor }} cursor-pointer w-[65px] h-[65px] flex items-center justify-center font-extrabold text-xm rounded-xl  mb-4"
                                onclick="{{ $onClick }}">
                                {{ $r->ruang }}
                            </div>
                        @endforeach
                    </div>
                    <div class="flex gap-4">
                        <div class="text-center pt-2 pr-3">
                            <div class="font-extrabold text-red-500">SESI 3</div>
                            <div>12.30 - 14.10 WIB</div>
                        </div>
                        @foreach ($ruang as $r)
                            @php
                                $matchingData = $dataTiga->firstWhere('id_ruang', $r->id);
                                $bgColor = $matchingData
                                    ? ($matchingData->verifikasi === 'JADWAL'
                                        ? 'bg-red-500'
                                        : 'bg-amber-400')
                                    : 'bg-emerald-400';
                                $onClick = $matchingData
                                    ? ($matchingData->verifikasi === 'JADWAL'
                                        ? "infoRoom('{$matchingData->id}','{$matchingData->kelas}','{$matchingData->program_studi}', '{$matchingData->mata_kuliah}','{$matchingData->dosen}')"
                                        : "infoRoomBooking('{$matchingData->id}','{$matchingData->kelas}','{$matchingData->program_studi}','{$matchingData->kegiatan}', '{$matchingData->mata_kuliah}','{$matchingData->dosen}')")
                                    : "booking('{$r->id}','{$r->id}', '2')";
                            @endphp
                            <div class="p-2 {{ $bgColor }} cursor-pointer w-[65px] h-[65px] flex items-center justify-center font-extrabold text-xm rounded-xl  mb-4"
                                onclick="{{ $onClick }}">
                                {{ $r->ruang }}
                            </div>
                        @endforeach
                    </div>
                    <div class="flex gap-4">
                        <div class="text-center pt-2 pr-2">
                            <div class="font-extrabold text-red-500">SESI 4</div>
                            <div>14.20 - 16.00 WIB</div>
                        </div>
                        @foreach ($ruang as $r)
                            @php
                                $matchingData = $dataEmpat->firstWhere('id_ruang', $r->id);
                                $bgColor = $matchingData
                                    ? ($matchingData->verifikasi === 'JADWAL'
                                        ? 'bg-red-500'
                                        : 'bg-amber-400')
                                    : 'bg-emerald-400';
                                $onClick = $matchingData
                                    ? ($matchingData->verifikasi === 'JADWAL'
                                        ? "infoRoom('{$matchingData->id}','{$matchingData->kelas}','{$matchingData->program_studi}', '{$matchingData->mata_kuliah}','{$matchingData->dosen}')"
                                        : "infoRoomBooking('{$matchingData->id}','{$matchingData->kelas}','{$matchingData->program_studi}','{$matchingData->kegiatan}', '{$matchingData->mata_kuliah}','{$matchingData->dosen}')")
                                    : "booking('{$r->id}','{$r->id}', '2')";
                            @endphp
                            <div class="p-2 {{ $bgColor }} cursor-pointer w-[65px] h-[65px] flex items-center justify-center font-extrabold text-xm rounded-xl  mb-4"
                                onclick="{{ $onClick }}">
                                {{ $r->ruang }}
                            </div>
                        @endforeach
                    </div>
                    <div class="flex gap-4">
                        <div class="text-center pt-2 pr-3">
                            <div class="font-extrabold text-red-500">SESI 5</div>
                            <div>16.10 - 17.50 WIB</div>
                        </div>
                        @foreach ($ruang as $r)
                            @php
                                $matchingData = $dataLima->firstWhere('id_ruang', $r->id);
                                $bgColor = $matchingData
                                    ? ($matchingData->verifikasi === 'JADWAL'
                                        ? 'bg-red-500'
                                        : 'bg-amber-400')
                                    : 'bg-emerald-400';
                                $onClick = $matchingData
                                    ? ($matchingData->verifikasi === 'JADWAL'
                                        ? "infoRoom('{$matchingData->id}','{$matchingData->kelas}','{$matchingData->program_studi}', '{$matchingData->mata_kuliah}','{$matchingData->dosen}')"
                                        : "infoRoomBooking('{$matchingData->id}','{$matchingData->kelas}','{$matchingData->program_studi}','{$matchingData->kegiatan}', '{$matchingData->mata_kuliah}','{$matchingData->dosen}')")
                                    : "booking('{$r->id}','{$r->id}', '2')";
                            @endphp
                            <div class="p-2 {{ $bgColor }} cursor-pointer w-[65px] h-[65px] flex items-center justify-center font-extrabold text-xm rounded-xl  mb-4"
                                onclick="{{ $onClick }}">
                                {{ $r->ruang }}
                            </div>
                        @endforeach
                    </div>
                    <div class="flex gap-4">
                        <div class="text-center pt-2 pr-2">
                            <div class="font-extrabold text-red-500">SESI 6</div>
                            <div>18.30 - 20.10 WIB</div>
                        </div>
                        @foreach ($ruang as $r)
                            @php
                                $matchingData = $dataEnam->firstWhere('id_ruang', $r->id);
                                $bgColor = $matchingData
                                    ? ($matchingData->verifikasi === 'JADWAL'
                                        ? 'bg-red-500'
                                        : 'bg-amber-400')
                                    : 'bg-emerald-400';
                                $onClick = $matchingData
                                    ? ($matchingData->verifikasi === 'JADWAL'
                                        ? "infoRoom('{$matchingData->id}','{$matchingData->kelas}','{$matchingData->program_studi}', '{$matchingData->mata_kuliah}','{$matchingData->dosen}')"
                                        : "infoRoomBooking('{$matchingData->id}','{$matchingData->kelas}','{$matchingData->program_studi}','{$matchingData->kegiatan}', '{$matchingData->mata_kuliah}','{$matchingData->dosen}')")
                                    : "booking('{$r->id}','{$r->id}', '2')";
                            @endphp
                            <div class="p-2 {{ $bgColor }} cursor-pointer w-[65px] h-[65px] flex items-center justify-center font-extrabold text-xm rounded-xl  mb-4"
                                onclick="{{ $onClick }}">
                                {{ $r->ruang }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="flex gap-5 items-center justify-center mt-8">
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
    <div class="blur-background-two"></div>
    <div class="blur-background mt-[700px] ml-[1350px]"></div>
    <div id="modal-info" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
        <div class="bg-white rounded-lg p-6 w-4/12">
            <h2 class="text-lg font-bold mb-4">Jadwal Ruangan</h2>
            <p id="modal-content-info"></p>
            <button onclick="closeModalInfo()" class="mt-4 bg-red-500 text-white px-4 py-2 rounded">Tutup</button>
        </div>
    </div>
    <div id="modal-info-booking" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
        <div class="bg-white rounded-lg p-6 w-4/12">
            <h2 class="text-lg font-bold mb-4">Pesan Ruangan</h2>
            <p id="modal-content-info-booking"></p>
            <button onclick="closeModalInfoBooking()"
                class="mt-4 bg-red-500 text-white px-4 py-2 rounded">Tutup</button>
        </div>
    </div>
    <div id="modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
        <div class="bg-white rounded-lg p-6 w-4/12">
            <h2 class="text-lg font-bold mb-4">Info Ruangan</h2>
            <p id="modal-content"></p>
            <button onclick="closeModal()" class="mt-4 bg-red-500 text-white px-4 py-2 rounded">Tutup</button>
        </div>
    </div>
    <script>
        function infoRoom(roomId, kelas, program_studi, mata_kuliah, dosen) {
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
            const modal = document.getElementById("modal-info");
            modal.classList.remove("hidden");
        }

        function infoRoomBooking(roomId, kelas, program_studi, kegiatan, mata_kuliah, dosen) {
            const modalContent = document.getElementById("modal-content");
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
            const modal = document.getElementById("modal");
            modal.classList.remove("hidden");
        }

        function booking(id, id_ruang, id_sesi) {
            const modalContent = document.getElementById("modal-content-info-booking");
            const pemesananStoreUrl = "{{ route('booking.store') }}";
            modalContent.innerHTML = `
                <form action="${pemesananStoreUrl}" method="post" class="w-full">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" value="${id_sesi}" name="sesi">
                    <input type="hidden" value="${id_ruang}" name="ruang">
                    <div class="lg:mb-5 w-full">
                        <label for="mata_kuliah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mata Kuliah <span class="text-red-500">*</span></label>
                        <select style="width: 585px" class="js-example-placeholder-single js-states form-control w-full m-6" name="mata_kuliah" data-placeholder="Pilih Mata Kuliah">
                            <option value="">Pilih...</option>
                            @foreach ($mataKuliah as $k)
                                <option value="{{ $k->id }}" data-sks="{{ $k->sks }}">{{ $k->mata_kuliah }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="lg:mb-5 w-full">
                        <label for="dosen" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dosen <span class="text-red-500">*</span></label>
                        <select style="width: 585px" class="js-example-placeholder-single js-states form-control w-full m-6" name="dosen" data-placeholder="Pilih Dosen">
                            <option value="">Pilih...</option>
                            @foreach ($dosen as $k)
                                <option value="{{ $k->id }}">{{ $k->dosen }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="lg:mb-5 w-full">
                        <label for="kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas <span class="text-red-500">*</span></label>
                        <select style="width: 585px" class="js-example-placeholder-single js-states form-control w-full m-6" name="kelas" data-placeholder="Pilih Kelas">
                            <option value="">Pilih...</option>
                            @foreach ($kelas as $k)
                                <option value="{{ $k->id }}">{{ $k->kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="lg:mb-5 w-full">
                        <label for="kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kegiatan <span class="text-red-500">*</span></label>
                        <select style="width: 585px" class="js-example-placeholder-single js-states form-control w-full m-6" name="jenis_kegiatan" data-placeholder="Pilih Jenis Kegiatan">
                            <option value="">Pilih...</option>
                            @foreach ($jenisKegiatan as $k)
                                <option value="{{ $k->id }}">{{ $k->kegiatan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="lg:mb-5 w-full" hidden>
                        <label for="tgl_pakai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pakai</label>
                        <input type="date" id="tgl_pakai" name="tgl_pakai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Tanggal Pakai disini ..." value="{{ date('Y-m-d', strtotime($tgl)) }}"/>
                    </div>
                    <div class="lg:mb-5 w-full">
                        <label for="no_hp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No HP <span class="text-red-500">*</span></label>
                        <input type="number" id="no_hp" name="no_hp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan No HP disini ..." />
                    </div>
                    <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i
                                        class="fi fi-rr-disk "></i></button>
                </form>
            `;
            const noHpInput = document.getElementById('no_hp');

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
            });

            // Tampilkan modal
            initializeSelect2();
            const modal = document.getElementById("modal-info-booking");
            modal.classList.remove("hidden");
        }

        const initializeSelect2 = () => {
            $('.js-example-placeholder-single').select2({
                placeholder: "Pilih...",
                allowClear: true,
            });
        };

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

        function getRooms() {
            socket.emit("getRooms", "sopyan");
        }
        getRooms();
    </script>
    <script>
        function redirectToPage(selectedDate) {
            if (selectedDate) {
                // Gunakan rute dengan parameter dinamis
                const targetUrl = `/target-halaman/${selectedDate}`;
                window.location.href = targetUrl;
            }
        }
    </script>
</x-app-layout>
