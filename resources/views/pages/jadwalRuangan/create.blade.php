<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Jadwal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full p-3">
                <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div
                            class="lg:p-2 p-2 lg:pl-4 text-sm lg:text-lg text-center lg:text-left bg-amber-100 lg:bg-amber-50 rounded-xl font-bold">
                            FORM INPUT JADWAL
                        </div>
                        <form id="bookingForm" action="{{ route('jadwal.store') }}" method="post">
                            @csrf
                            <div class="p-4 rounded-xl">
                                <div class="flex flex-col lg:flex-row gap-5">
                                    <div class="flex flex-col lg:flex-row w-full gap-5">
                                        <div class="lg:mb-5 w-full">
                                            <label for="hari"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Mata Kuliah <span class="text-red-500">*</span>
                                            </label>
                                            <select id="mata_kuliah"
                                                class="js-example-placeholder-single js-states form-control w-full m-6"
                                                name="mata_kuliah" data-placeholder="Pilih Mata Kuliah"
                                                onchange="getMataKuliah()">
                                                <option value="">Pilih...</option>
                                                @foreach ($mataKuliah as $k)
                                                    <option value="{{ $k->id }}" data-sks="{{ $k->sks }}">
                                                        {{ $k->mata_kuliah }}</option>
                                                @endforeach
                                            </select>
                                            <p id="error-mata_kuliah" class="mt-2 text-sm text-red-500 hidden">Mata
                                                kuliah wajib dipilih.</p>
                                        </div>
                                        <div class="lg:mb-5 w-9/13">
                                            <label for="sks"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SKS</label>
                                            <input type="text" id="sks" name="sks"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Masukan SKS disini ..." value="{{ old('sks') }}"
                                                readonly />
                                        </div>
                                        <div id="dynamic-sesi" class="w-full flex gap-5"></div>
                                    </div>
                                </div>
                                <div class="flex flex-col lg:flex-row w-full gap-5">
                                    <div class="lg:mb-5 w-full">
                                        <label for="hari"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Dosen <span class="text-red-500">*</span>
                                        </label>
                                        <select id="dosen"
                                            class="js-example-placeholder-single js-states form-control w-full m-6"
                                            name="dosen" data-placeholder="Pilih Dosen">
                                            <option value="">Pilih...</option>
                                            @foreach ($dosen as $k)
                                                <option value="{{ $k->id }}">{{ $k->dosen }}</option>
                                            @endforeach
                                        </select>
                                        <p id="error-dosen" class="mt-2 text-sm text-red-500 hidden">Dosen wajib
                                            dipilih.</p>
                                    </div>
                                    <div class="lg:mb-5 w-full">
                                        <label for="hari"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Kelas <span class="text-red-500">*</span>
                                        </label>
                                        <select id="kelas"
                                            class="js-example-placeholder-single js-states form-control w-full m-6"
                                            name="kelas" data-placeholder="Pilih Kelas">
                                            <option value="">Pilih...</option>
                                            @foreach ($kelas as $k)
                                                <option value="{{ $k->id }}">{{ $k->kelas }}</option>
                                            @endforeach
                                        </select>
                                        <p id="error-kelas" class="mt-2 text-sm text-red-500 hidden">Kelas wajib
                                            dipilih.</p>
                                    </div>
                                    <div class="lg:mb-5 w-full">
                                        <label for="ruang"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Ruang <span class="text-red-500">*</span>
                                        </label>
                                        <select id="ruang"
                                            class="js-example-placeholder-single js-states form-control w-full m-6"
                                            name="ruang" data-placeholder="Pilih Ruang">
                                            <option value="">Pilih...</option>
                                            @foreach ($ruang as $k)
                                                <option value="{{ $k->id }}">{{ $k->ruang }}</option>
                                            @endforeach
                                        </select>
                                        <p id="error-ruang" class="mt-2 text-sm text-red-500 hidden">Ruang wajib
                                            dipilih.</p>
                                    </div>
                                    @php
                                        $hariTranslation = [
                                            'SUNDAY' => 'MINGGU',
                                            'MONDAY' => 'SENIN',
                                            'TUESDAY' => 'SELASA',
                                            'WEDNESDAY' => 'RABU',
                                            'THURSDAY' => 'KAMIS',
                                            'FRIDAY' => 'JUMAT',
                                            'SATURDAY' => 'SABTU',
                                        ];
                                    @endphp
                                    <div class="lg:mb-5 w-full">
                                        <label for="hari"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Hari <span class="text-red-500">*</span>
                                        </label>
                                        <select id="hari"
                                            class="js-example-placeholder-single js-states form-control w-full m-6"
                                            name="hari" data-placeholder="Pilih Hari">
                                            <option value="">Pilih...</option>
                                            @foreach ($hari as $k)
                                                <option value="{{ $k->id }}">
                                                    {{ $hariTranslation[strtoupper($k->hari)] ?? $k->hari }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <p id="error-hari" class="mt-2 text-sm text-red-500 hidden">Hari wajib dipilih.
                                        </p>
                                    </div>
                                </div>
                                <div class="lg:mb-2 mb-4 mt-4 lg:mt-0">
                                    <div class="font-bold">Note : <span class="text-red-500 font-bold">*) Wajib di
                                            isi</span></div>
                                </div>
                                <button type="submit"
                                    class="text-blue-500 w-10 bg-blue-50 hover:bg-blue-100 border-2 border-blue-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-md sm:w-auto px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i
                                        class="fi fi-rr-disk "></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const getMataKuliah = async () => {
            var selectedOption = document.querySelector('[name="mata_kuliah"] option:checked');
            var matakuliahId = selectedOption.value;

            if (matakuliahId) {
                await axios.get(`/api/mataKuliah/${matakuliahId}`)
                    .then((response) => {
                        console.log(response.data.mataKuliah);
                        const data = response.data;

                        if (data && data.mataKuliah.sks) {
                            // Update nilai SKS
                            document.getElementById('sks').value = data.mataKuliah.sks;

                            // Update dropdown sesi berdasarkan nilai SKS
                            const dynamicSesiContainer = document.getElementById('dynamic-sesi');
                            let content = '';

                            if (data.mataKuliah.sks == 2) {
                                // Jika SKS = 2, tampilkan satu dropdown
                                content = `
                            <div class="mb-5 w-full">
                                <label for="sesi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Sesi <span class="text-red-500">*</span>
                                </label>
                                <select id="sesi" class="js-example-placeholder-single js-states form-control w-full m-6"
                                        name="sesi" data-placeholder="Pilih Sesi">
                                    <option value="">Pilih...</option>
                                    @foreach ($sesi as $k)
                                        <option value="{{ $k->id }}">{{ $k->sesi }} || {{ $k->waktu_sesi }}</option>
                                    @endforeach
                                </select>
                                <p id="error-sesi" class="mt-2 text-sm text-red-500 hidden">Sesi wajib dipilih.</p>
                            </div>
                        `;
                            } else if (data.mataKuliah.sks == 3 || data.mataKuliah.sks == 4) {
                                // Jika SKS = 3 atau 4, tampilkan dua dropdown
                                content = `

                                <div class="mb-5 w-full">
                                    <label for="sesi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Sesi <span class="text-red-500">*</span>
                                    </label>
                                    <select id="sesi_dua" class="js-example-placeholder-single js-states form-control w-full m-6"
                                            name="sesi_dua" data-placeholder="Pilih Sesi">
                                        <option value="">Pilih...</option>
                                        @foreach ($sesi as $k)
                                            <option value="{{ $k->id }}">{{ $k->sesi }} || {{ $k->waktu_sesi }}</option>
                                        @endforeach
                                    </select>
                                    <p id="error-sesi_dua" class="mt-2 text-sm text-red-500 hidden">Sesi wajib dipilih.</p>
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="sesi_selanjutnya" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Sesi Selanjutnya <span class="text-red-500">*</span>
                                    </label>
                                    <select id="sesi_selanjutnya" class="js-example-placeholder-single js-states form-control w-full m-6"
                                            name="sesi_selanjutnya" data-placeholder="Pilih Sesi Selanjutnya">
                                        <option value="">Pilih...</option>
                                        @foreach ($sesi as $k)
                                            <option value="{{ $k->id }}">{{ $k->sesi }} || {{ $k->waktu_sesi }}</option>
                                        @endforeach
                                    </select>
                                    <p id="error-sesi_selanjutnya" class="mt-2 text-sm text-red-500 hidden">Sesi kedua wajib dipilih.</p>
                                </div>

                        `;
                            }

                            // Masukkan konten dinamis ke dalam container
                            dynamicSesiContainer.innerHTML = content;

                            // Re-inisialisasi Select2
                            initializeSelect2();
                        }
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            } else {
                // Jika tidak ada mata kuliah yang dipilih, kosongkan input SKS dan sesi
                document.getElementById('sks').value = '';
                document.getElementById('dynamic-sesi').innerHTML = '';
            }
        };

        const form = document.getElementById("bookingForm");
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

            const errorDosen = document.getElementById('error-dosen');
            if (dosen.value === '') {
                errorDosen.classList.remove('hidden');
                isValid = false;
            } else {
                errorDosen.classList.add('hidden');
            }

            const errorKelas = document.getElementById('error-kelas');
            if (kelas.value === '') {
                errorKelas.classList.remove('hidden');
                isValid = false;
            } else {
                errorKelas.classList.add('hidden');
            }

            const errorRuang = document.getElementById('error-ruang');
            if (ruang.value === '') {
                errorRuang.classList.remove('hidden');
                isValid = false;
            } else {
                errorRuang.classList.add('hidden');
            }

            const errorHari = document.getElementById('error-hari');
            if (hari.value === '') {
                errorHari.classList.remove('hidden');
                isValid = false;
            } else {
                errorHari.classList.add('hidden');
            }

            const sesi = document.getElementById('sesi'); // Sesi pertama (untuk SKS = 2)
            const sesiDua = document.getElementById('sesi_dua'); // Sesi kedua (untuk SKS > 2)
            const sesiSelanjutnya = document.getElementById('sesi_selanjutnya'); // Sesi selanjutnya (untuk SKS > 2)

            const errorSesi = document.getElementById('error-sesi');
            const errorSesiDua = document.getElementById('error-sesi_dua');
            const errorSesiSelanjutnya = document.getElementById('error-sesi_selanjutnya');

            // Pastikan nilai SKS valid
            const sks = parseInt(document.getElementById('sks').value, 10);

            if (sks === 2) {
                // Jika SKS = 2, hanya sesi pertama yang wajib diisi
                if (!sesi || sesi.value === '') {
                    errorSesi.classList.remove('hidden');
                    isValid = false;
                } else {
                    errorSesi.classList.add('hidden');
                }
            } else if (sks > 2) {
                // Jika SKS > 2, sesi kedua dan sesi selanjutnya wajib diisi
                if (!sesiDua || sesiDua.value === '') {
                    errorSesiDua.classList.remove('hidden');
                    isValid = false;
                } else {
                    errorSesiDua.classList.add('hidden');
                }

                if (!sesiSelanjutnya || sesiSelanjutnya.value === '') {
                    errorSesiSelanjutnya.classList.remove('hidden');
                    isValid = false;
                } else {
                    errorSesiSelanjutnya.classList.add('hidden');
                }
            }

            // Jika validasi lolos, kirim form
            if (isValid) {
                form.submit();
            }
        });

        // Fungsi untuk menginisialisasi Select2
        const initializeSelect2 = () => {
            $('.js-example-placeholder-single').select2({
                placeholder: "Pilih...",
                allowClear: true,
            });
        };
    </script>

</x-app-layout>
