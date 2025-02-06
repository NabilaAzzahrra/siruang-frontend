<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pemesanan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div
                                class="lg:p-6 p-2 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold flex justify-between">
                                <div> DATA PEMESANAN</div>
                            </div>
                            <div class="flex justify-center">
                                <div class="p-12" style="width:100%;  overflow-x:auto;">
                                    <table class="table table-bordered" id="jadwal-datatable">
                                        <thead>
                                            <tr>
                                                <th class="w-7">No.</th>
                                                <th>Tanggal Pakai</th>
                                                <th>Mata Kuliah</th>
                                                <th>Dosen</th>
                                                <th>Kelas</th>
                                                <th>Sesi</th>
                                                <th>Waktu</th>
                                                <th>Ruang</th>
                                                <th>Hari</th>
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

                                                    if ($d->status === 'AKTIF') {
                                                        $status = 'AKTIF';
                                                    } else {
                                                        $status = 'DITOLAK';
                                                    }

                                                @endphp
                                                <tr>
                                                    <td>{{ $no++ }}.</td>
                                                    <td>{{ $d->tgl_pakai }}</td>
                                                    <td>{{ $d->mataKuliah->mata_kuliah }}</td>
                                                    <td>{{ $d->dosen->dosen }}</td>
                                                    <td>{{ $d->kelas->kelas }}</td>
                                                    <td>{{ $d->sesi->sesi }}</td>
                                                    <td>{{ $d->sesi->waktu_sesi }} WIB</td>
                                                    <td>{{ $d->ruang->ruang }}</td>
                                                    <td>{{ $hariTranslation[strtoupper($d->hari->hari)] ?? $d->hari->hari }}
                                                    </td>
                                                    <td>{{ $status }}</td>
                                                    <td>
                                                        <button
                                                            onclick="return dataDelete('{{ $d->id }}','{{ $d->mataKuliah->mata_kuliah }}')"
                                                            class="bg-red-500 hover:bg-bg-red-300 px-3 py-1 rounded-xl h-10 w-10 text-xs text-white"><i
                                                                class="fas fa-trash"></i></button>
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
        const dataDelete = async (id, mata_kuliah) => {
            let tanya = confirm(`Apakah anda yakin untuk menghapus pemesanan ${mata_kuliah} ?`);
            if (tanya) {
                await axios.post(`/pemesanan/${id}`, {
                        '_method': 'DELETE',
                        '_token': $('meta[name="csrf-token"]').attr('content')
                    })
                    .then(function(response) {
                        // Handle success
                        // location.reload();
                        Swal.fire({
                            title: 'Data Berhasil Dihapus!',
                            text: "{{ session('message_delete') }}",
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
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
                await axios.post(`/pemesanan/${id}`, {
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
    </script>
    {{-- @if (session('message_delete'))
        <script>
            Swal.fire({
                title: 'Berhasil!',
                text: "{{ session('message_delete') }}",
                icon: 'error',
                confirmButtonText: 'OK'
            });
        </script>
    @endif --}}
</x-app-layout>
