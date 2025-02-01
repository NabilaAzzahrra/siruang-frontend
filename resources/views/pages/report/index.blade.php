<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Laporan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg p-6">
                <div class="lg:p-2 p-2 lg:pl-4 text-sm lg:text-lg text-center lg:text-left bg-amber-100 lg:bg-amber-50 rounded-xl font-bold">LAPORAN RUANGAN</div>
                <div class="mt-6">
                    <form class="" action="{{ route('report.store') }}" method="POST">
                        @csrf
                        <div class="flex flex-col lg:flex-row gap-5">
                            <div class="mb-5 w-full">
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun
                                    Akademik <span class="text-red-500">*</span></label>
                                <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                    name="tahun_akademik" data-placeholder="Tahun Akademik">
                                    <option value="">Pilih...</option>
                                    @foreach ($tahunAkademik as $t)
                                        <option value="{{ $t->id }}">{{ $t->tahun_akademik }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-5 w-full">
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Semester</label>
                                <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                    name="semester" data-placeholder="Semester">
                                    <option value="">Pilih...</option>
                                    <option value="GANJIL">GANJIL</option>
                                    <option value="GENAP">GENAP</option>
                                </select>
                            </div>
                            <div class="mb-5 w-full">
                                <label for="password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dari
                                    <span class="text-red-500">*</span></label>
                                <input type="date" id="dari" name="dari"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required />
                            </div>
                            <div class="mb-5 w-full">
                                <label for="password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sampai
                                    <span class="text-red-500">*</span></label>
                                <input type="date" id="sampai" name="sampai"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required />
                            </div>
                        </div>
                        <button type="submit"
                            class="text-blue-500 bg-blue-50 hover:bg-blue-100 border-2 border-blue-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-md sm:w-auto px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
