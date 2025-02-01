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
                            class="lg:p-6 p-2 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold">
                            FORM INPUT JADWAL
                        </div>
                        <form action="{{ route('pemesanan.store') }}" method="post">
                            @csrf
                            <div class="p-4 rounded-xl">
                                <div class="flex flex-col lg:flex-row gap-5">
                                    <div class="flex w-full gap-5">
                                        <div class="lg:mb-5 w-full">
                                            <label for="hari"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Mata Kuliah <span class="text-red-500">*</span>
                                            </label>
                                            <select
                                                class="js-example-placeholder-single js-states form-control w-full m-6"
                                                name="mata_kuliah" data-placeholder="Pilih Mata Kuliah"
                                                onchange="getMataKuliah()">
                                                <option value="">Pilih...</option>
                                                @foreach ($mataKuliah as $k)
                                                    <option value="{{ $k->id }}" data-sks="{{ $k->sks }}">
                                                        {{ $k->mata_kuliah }}</option>
                                                @endforeach
                                            </select>
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
                                <div class="flex w-full gap-5">
                                    <div class="lg:mb-5 w-full">
                                        <label for="hari"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Dosen <span class="text-red-500">*</span>
                                        </label>
                                        <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                            name="dosen" data-placeholder="Pilih Dosen">
                                            <option value="">Pilih...</option>
                                            @foreach ($dosen as $k)
                                                <option value="{{ $k->id }}">{{ $k->dosen }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="lg:mb-5 w-full">
                                        <label for="hari"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Kelas <span class="text-red-500">*</span>
                                        </label>
                                        <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                            name="kelas" data-placeholder="Pilih Kelas">
                                            <option value="">Pilih...</option>
                                            @foreach ($kelas as $k)
                                                <option value="{{ $k->id }}">{{ $k->kelas }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="lg:mb-5 w-full">
                                        <label for="ruang"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Ruang <span class="text-red-500">*</span>
                                        </label>
                                        <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                            name="ruang" data-placeholder="Pilih Ruang">
                                            <option value="">Pilih...</option>
                                            @foreach ($ruang as $k)
                                                <option value="{{ $k->id }}">{{ $k->ruang }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="flex w-full gap-5">
                                    <div class="lg:mb-5 w-full">
                                        <label for="hari"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Jenis Kegiatan <span class="text-red-500">*</span>
                                        </label>
                                        <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                            name="jenis_kegiatan" data-placeholder="Pilih Jenis Kegiatan">
                                            <option value="">Pilih...</option>
                                            @foreach ($jenisKegiatan as $k)
                                                <option value="{{ $k->id }}">{{ $k->kegiatan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="lg:mb-5 w-full">
                                        <label for="tgl_pakai"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                            Pakai</label>
                                        <input type="date" id="tgl_pakai" name="tgl_pakai"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Masukan Tanggal Pakai disini ..." />
                                    </div>
                                    <div class="lg:mb-5 w-full">
                                        <label for="no_hp"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No
                                            HP</label>
                                        <input type="number" id="no_hp" name="no_hp"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Masukan No HP disini ..." />
                                    </div>
                                </div>
                                <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i
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
                            <div class="lg:mb-5 w-full">
                                <label for="sesi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Sesi <span class="text-red-500">*</span>
                                </label>
                                <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                        name="sesi" data-placeholder="Pilih Sesi">
                                    <option value="">Pilih...</option>
                                    @foreach ($sesi as $k)
                                        <option value="{{ $k->id }}">{{ $k->sesi }} || {{ $k->waktu_sesi }}</option>
                                    @endforeach
                                </select>
                            </div>
                        `;
                            } else if (data.mataKuliah.sks == 3 || data.mataKuliah.sks == 4) {
                                // Jika SKS = 3 atau 4, tampilkan dua dropdown
                                content = `

                                <div class="lg:mb-5 w-full">
                                    <label for="sesi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Sesi <span class="text-red-500">*</span>
                                    </label>
                                    <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                            name="sesi_dua" data-placeholder="Pilih Sesi">
                                        <option value="">Pilih...</option>
                                        @foreach ($sesi as $k)
                                            <option value="{{ $k->id }}">{{ $k->sesi }} || {{ $k->waktu_sesi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="lg:mb-5 w-full">
                                    <label for="sesi_selanjutnya" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Sesi Selanjutnya <span class="text-red-500">*</span>
                                    </label>
                                    <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                            name="sesi_selanjutnya" data-placeholder="Pilih Sesi Selanjutnya">
                                        <option value="">Pilih...</option>
                                        @foreach ($sesi as $k)
                                            <option value="{{ $k->id }}">{{ $k->sesi }} || {{ $k->waktu_sesi }}</option>
                                        @endforeach
                                    </select>
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

        // Fungsi untuk menginisialisasi Select2
        const initializeSelect2 = () => {
            $('.js-example-placeholder-single').select2({
                placeholder: "Pilih...",
                allowClear: true,
            });
        };
    </script>
    <script>
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
    </script>
</x-app-layout>
