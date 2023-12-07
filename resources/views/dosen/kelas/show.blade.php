@extends('layouts.dosen')
@section('title', 'Kelas ' . $subject->subject_name)
@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    Daftar Mahasiswa

                </tr>
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        photo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        NIM
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Gender
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Asal
                    </th>
                </tr>
            </thead>
            <tbody>
                {{-- @dd($data->mahsiswa) --}}
                <tr
                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $detailSubject->mahasiswa->user->name }}
                    </th>
                    <td class="px-6 py-4">

                        <img class="w-10 h-10 rounded-full" src="{{ $detailSubject->mahasiswa->photo }}"
                            alt="Rounded avatar">
                        <img class="w-10 h-10 rounded" src="" alt="Default avatar">

                    </td>
                    <td class="px-6 py-4">
                        {{ $detailSubject->mahasiswa->nim }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $detailSubject->mahasiswa->user->email }}
                    </td>
                    <td class="px-6 py-4">
                        @if ($detailSubject->mahasiswa->gender == 'laki-laki')
                            <span
                                class="bg-indigo-100 text-indigo-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">Pria</span>
                        @else
                            <span
                                class="bg-pink-100 text-pink-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-pink-900 dark:text-pink-300">Wanita</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        {{ $detailSubject->mahasiswa->asal }}
                    </td>
                </tr>
            </tbody>
        @endsection
