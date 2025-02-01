<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Laporan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-4">
            <div class="flex flex-col md:flex-row justify-center text-center text-wrap">
                <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg px-4 py-4 text-center">
                    <div class="lg:p-2 p-2 lg:pl-4 text-sm lg:text-lg text-center bg-amber-100 lg:bg-amber-50 rounded-xl font-bold">
                        @php
                            $title =
                                'TAHUN AKADEMIK <span class="text-red-500 font-bold">' .
                                $ta->tahun_akademik .
                                '</span>';

                            if ($semester === null) {
                                $title .=
                                    ' PERIODE <span class="text-red-500 font-bold">' .
                                    $dari .
                                    ' - ' .
                                    $sampai .
                                    '</span>';
                            } else {
                                $title .=
                                    ' SEMESTER <span class="text-red-500 font-bold">' .
                                    $semester .
                                    '</span> PERIODE <span class="text-red-500 font-bold">' .
                                    $dari .
                                    ' - ' .
                                    $sampai .
                                    '</span>';
                            }
                        @endphp

                        LAPORAN AKTIVITAS RUANGAN
                        <div>{!! $title !!}</div>

                    </div>
                    <input type="hidden" name="tahun_akademik" id="tahun_akademik" value="{{ $tahunAkademik }}">
                    <input type="hidden" name="semester" id="semester" value="{{ $semester }}">
                    <input type="hidden" name="dari" id="dari" value="{{ $dari }}">
                    <input type="hidden" name="sampai" id="sampai" value="{{ $sampai }}">
                    <div class="p-12" style="width:100%;  overflow-x:auto;">
                        <table class="table table-bordered" id="laporan-datatable">
                            <thead>
                                <tr>
                                    <th class="w-7">NO.</th>
                                    <th>RUANG</th>
                                    <th>MATA KULIAH</th>
                                    <th>DOSEN</th>
                                    <th>KELAS</th>
                                    <th>SESI</th>
                                    <th>SEMESTER</th>
                                    <th>VERIFIKASI</th>
                                    <th>TANGGAL PAKAI</th>
                                    <th>HARI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
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
                                @foreach ($data as $d)
                                    <tr>
                                        <td>{{ $no++ }}.</td>
                                        <td>{{ $d->ruang->ruang }}</td>
                                        <td>{{ $d->mataKuliah->mata_kuliah }}</td>
                                        <td>{{ $d->dosen->dosen }}</td>
                                        <td>{{ $d->kelas->kelas }}</td>
                                        <td>{{ $d->sesi->sesi }}</td>
                                        <td>{{ $d->semester }}</td>
                                        <td>{{ $d->verifikasi }}</td>
                                        <td>{{ $d->tgl_pakai }}</td>
                                        <td>{{ $hariTranslation[strtoupper($d->hari->hari)] ?? $d->hari->hari }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg mt-6 p-12">
                DIAGRAM AKTIFITAS RUANGAN
                <div class="lg:h-[500px] h-[300px] w-[300px] lg:w-[500px] flex items-center justify-center content-center lg:ml-80 lg:mt-12 mt-6">
                    <canvas id="myBarChart" width="20" height="20"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"
        integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(document).ready(function() {
            $('#laporan-datatable').DataTable();
        });
    </script>
    {{-- <script>
        const labels = @json($labels); // Convert PHP array to JavaScript array
        const totals = @json($totals); // Convert PHP array to JavaScript array

        const ctx = document.getElementById('myPolarAreaChart').getContext('2d');
        const chartData = {
            labels: labels, // Room names
            datasets: [{
                label: 'Aktivitas Ruangan',
                data: totals, // Activity totals
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        };

        const config = {
            type: 'polarArea',
            data: chartData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
            },
        };

        new Chart(ctx, config);
    </script> --}}
    <script>
        const labels = @json($labels);  // Labels from PHP
        const totals = @json($totals);  // Totals from PHP

        const ctx = document.getElementById('myBarChart').getContext('2d');  // Get canvas context

        const data = {
            labels: labels,  // Room names as labels
            datasets: [{
                label: 'Aktivitas Ruangan',  // Label for the dataset
                data: totals,  // Totals for each room
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        };

        const config = {
            type: 'bar',  // Bar chart type
            data: data,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true  // Start y-axis at 0
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
            },
        };

        new Chart(ctx, config);  // Create chart
    </script>
    </x-app-layout>
