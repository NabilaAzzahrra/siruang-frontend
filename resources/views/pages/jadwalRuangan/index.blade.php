<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Jadwal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-xl p-4 mb-4 -mt-6 ml-3 mr-3">
                <div class="font-bold text-xl text-amber-950 mb-2">IMPORT DATA DARI EXCEL</div>
                <form action="{{ route('jadwal.importExcel') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        name="file" accept=".xls,.xlsx">
                    <div class="flex gap-4">
                        <button type="submit"
                            class="mb-3 p-2 text-sm lg:mb-2 lg:p-2 bg-sky-100 text-sky-400 hover:bg-sky-200 border-2 border-sky-200 rounded-xl mt-4">
                            SUBMIT
                        </button>
                        <a href="{{ asset('contohExport/contoh.xlsx') }}" download
                            class="mb-3 p-2 text-sm lg:mb-2 lg:p-2 bg-emerald-100 text-emerald-400 hover:bg-emerald-200 border-2 border-emerald-200 rounded-xl mt-4">
                            DOWNLOAD FORMAT
                        </a>
                    </div>
                </form>
            </div>
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div
                                class="lg:p-2 p-2 lg:pl-4 text-sm lg:text-lg text-center lg:text-left bg-amber-100 lg:bg-amber-50 rounded-xl font-bold flex items-center justify-between">
                                <div> DATA JADWAL</div>
                                <div>
                                    <a href="{{ route('jadwal.create') }}" title="Add Data"
                                        class="href bg-sky-100 hover:bg-sky-200 px-[9px] pb-[3px] rounded-xl h-10 w-10 text-md pt-[11px] text-sky-400 border-2 border-sky-200"><i
                                            class="fi fi-ss-add"></i></a>
                                    <button
                                        onclick="return dataSterilkan('{{ $idTahunAkademik }}','{{ $semester }}')"
                                        title="Data Sterilize"
                                        class="bg-emerald-100 hover:bg-emerald-200 px-3 py-1 rounded-xl h-10 w-10 text-md pt-2 text-emerald-400 border-2 border-emerald-200"><i
                                            class="fi fi-ss-back-up"></i></button>
                                </div>
                            </div>
                            <div class="flex justify-center">
                                <div class="p-12" style="width:100%;  overflow-x:auto;">
                                    <table class="table table-bordered" id="jadwal-datatable">
                                        <thead>
                                            <tr>
                                                <th class="w-7">No.</th>
                                                <th>Mata Kuliah</th>
                                                <th>SKS</th>
                                                <th>Dosen</th>
                                                <th>Kelas</th>
                                                <th>Sesi</th>
                                                <th>Waktu</th>
                                                <th>Ruang</th>
                                                <th>Tahun Akademik</th>
                                                <th>Hari</th>
                                                <th>Semester</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($data as $d)
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
                                                <tr>
                                                    <td>{{ $no++ }}.</td>
                                                    <td>{{ $d->mataKuliah->mata_kuliah }}</td>
                                                    <td>{{ $d->mataKuliah->sks }}</td>
                                                    <td>{{ $d->dosen->dosen }}</td>
                                                    <td>{{ $d->kelas->kelas }}</td>
                                                    <td>{{ $d->sesi->sesi }}</td>
                                                    <td>{{ $d->sesi->waktu_sesi }} WIB</td>
                                                    <td>{{ $d->ruang->ruang }}</td>
                                                    <td>{{ $d->tahun_akademik->tahun_akademik }}</td>
                                                    <td>{{ $hariTranslation[strtoupper($d->hari->hari)] ?? $d->hari->hari }}
                                                    </td>
                                                    <td>{{ $d->semester }}</td>
                                                    <td>{{ $d->status }}</td>
                                                    <td>
                                                        <button type="button" data-id="{{ $d->id }}"
                                                            data-modal-target="sourceModal"
                                                            data-id_sesi="{{ $d->id_sesi }}"
                                                            data-id_ruang="{{ $d->id_ruang }}"
                                                            data-id_hari="{{ $d->id_hari }}"
                                                            onclick="editSourceModal(this)"
                                                            class="bg-amber-50 hover:bg-amber-100 text-amber-950 px-3 py-1 rounded-xl h-10 w-10 text-xs border-2 border-amber-100">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button
                                                            onclick="return dataStatus('{{ $d->id }}','{{ $d->mataKuliah->mata_kuliah }}')"
                                                            class="bg-amber-50 hover:bg-amber-100 text-amber-950 px-3 py-1 rounded-xl h-10 w-10 text-xs border-2 border-amber-100">
                                                            <i class="fa-solid fa-gear"></i>
                                                        </button>
                                                        <button
                                                            onclick="return dataDelete('{{ $d->id }}','{{ $d->mataKuliah->mata_kuliah }}')"
                                                            class="bg-red-50 hover:bg-red-100 px-3 py-1 text-amber-950 rounded-xl h-10 w-10 text-xs border-2 border-red-100"><i
                                                                class="fas fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModal">
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <div class="fixed inset-0 flex items-center justify-center">
            <div class="w-full md:w-1/4 relative bg-white rounded-lg shadow mx-5">
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900" id="title_source">
                        Tambah Sumber Database
                    </h3>
                    <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModal"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="defaultModal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form method="POST" id="formSourceModal">
                    @csrf
                    <div class="flex flex-col p-4 space-y-6">
                        <div class="">
                            <label for="id_sesi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sesi
                                <span class="text-red-500">*</span></label>
                            <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                name="id_sesi" data-placeholder="Sesi">
                                <option value="">Pilih...</option>
                                @foreach ($sesi as $t)
                                    <option value="{{ $t->id }}">{{ $t->sesi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="">
                            <label for="id_ruang"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ruang
                                <span class="text-red-500">*</span></label>
                            <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                name="id_ruang" data-placeholder="Ruang">
                                <option value="">Pilih...</option>
                                @foreach ($ruang as $t)
                                    <option value="{{ $t->id }}">{{ $t->ruang }}</option>
                                @endforeach
                            </select>
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
                        <div class="">
                            <label for="id_hari"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hari
                                <span class="text-red-500">*</span></label>
                            <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                name="id_hari" data-placeholder="Hari">
                                <option value="">Pilih...</option>
                                @foreach ($hari as $t)
                                    <option value="{{ $t->id }}">{{ $hariTranslation[strtoupper($t->hari)] ?? $t->hari }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                        <button type="submit" id="formSourceButton"
                            class="bg-emerald-50 m-2 w-40 h-10 rounded-xl hover:bg-emerald-100 border-2 border-emerald-100">Simpan</button>
                        <button type="button" data-modal-target="sourceModal" onclick="sourceModalClose(this)"
                            class="bg-red-50 m-2 w-40 h-10 rounded-xl hover:shadow-lg hover:bg-red-100 border-2 border-red-100">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.socket.io/4.8.1/socket.io.min.js"></script>
    <script>
        const socket = io("https://siruang-api.politekniklp3i-tasikmalaya.ac.id/");

        socket.on('connect', () => {
            console.log('connected');
        });
        socket.on('connect_error', () => {
            console.log('not connected');
        });

        function getRooms() {
            socket.emit("getRooms", 'sopyan');
        }
        getRooms();
    </script>
    <script>
        $(document).ready(function() {
            $('#jadwal-datatable').DataTable(); // Inisialisasi sederhana
        });
    </script>
    <script>
        const editSourceModal = (button) => {
            const formModal = document.getElementById('formSourceModal');
            const modalTarget = button.dataset.modalTarget;
            const id = button.dataset.id;
            const id_sesi = button.dataset.id_sesi;
            const id_ruang = button.dataset.id_ruang;
            const id_hari = button.dataset.id_hari;
            let url = "{{ route('jadwal.up', ':id') }}".replace(':id', id);
            console.log(url);
            let status = document.getElementById(modalTarget);
            document.getElementById('title_source').innerText = `UPDATE JADWAL`;

            let event = new Event('change');
            document.querySelector('[name="id_sesi"]').value = id_sesi;
            document.querySelector('[name="id_sesi"]').dispatchEvent(event);

            document.querySelector('[name="id_ruang"]').value = id_ruang;
            document.querySelector('[name="id_ruang"]').dispatchEvent(event);

            document.querySelector('[name="id_hari"]').value = id_hari;
            document.querySelector('[name="id_hari"]').dispatchEvent(event);

            document.getElementById('formSourceButton').innerText = 'Simpan';
            document.getElementById('formSourceModal').setAttribute('action', url);
            let csrfToken = document.createElement('input');
            csrfToken.setAttribute('type', 'hidden');
            csrfToken.setAttribute('value', '{{ csrf_token() }}');
            formModal.appendChild(csrfToken);

            let methodInput = document.createElement('input');
            methodInput.setAttribute('type', 'hidden');
            methodInput.setAttribute('name', '_method');
            methodInput.setAttribute('value', 'PATCH');
            formModal.appendChild(methodInput);

            status.classList.toggle('hidden');
        }
        const sourceModalClose = (button) => {
            const modalTarget = button.dataset.modalTarget;
            let status = document.getElementById(modalTarget);
            status.classList.toggle('hidden');
        }
        const dataSterilkan = async (id, mata_kuliah) => {
            let tanya = confirm(`Sterilkan jadwal`);
            if (tanya) {
                await axios.post(`/sterilkan/${id}`, {
                        '_method': 'PATCH',
                        '_token': $('meta[name="csrf-token"]').attr('content')
                    })
                    .then(function(response) {
                        // Handle success
                        location.reload();
                    })
                    .catch(function(error) {
                        // Handle error
                        alert('Error deleting record');
                        console.log(error);
                    });
            }
        }
        const dataStatus = async (id, mata_kuliah) => {
            let tanya = confirm(`Ubah status jadwal`);
            if (tanya) {
                await axios.post(`/jadwal/${id}`, {
                        '_method': 'PATCH',
                        '_token': $('meta[name="csrf-token"]').attr('content')
                    })
                    .then(function(response) {
                        // Handle success
                        location.reload();
                    })
                    .catch(function(error) {
                        // Handle error
                        alert('Error deleting record');
                        console.log(error);
                    });
            }
        }
        const dataDelete = async (id, mata_kuliah) => {
            let tanya = confirm(`Apakah anda yakin untuk menghapus jadwal ${mata_kuliah} ?`);
            if (tanya) {
                await axios.post(`/jadwal/${id}`, {
                        '_method': 'DELETE',
                        '_token': $('meta[name="csrf-token"]').attr('content')
                    })
                    .then(function(response) {
                        Swal.fire({
                            title: "Data Berhasil dihapus",
                            text: "Klik OK untuk memuat ulang halaman",
                            icon: "error",
                            confirmButtonText: "OK"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    })
                    .catch(function(error) {
                        // Handle error
                        alert('Error deleting record');
                        console.log(error);
                    });
            }
        }
    </script>
</x-app-layout>
