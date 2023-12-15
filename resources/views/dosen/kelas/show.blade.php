@extends('layouts.dosen')
@if ($subject != null)
    @section('title', 'Kelas ' . $subject->subject_name)
@else
    @section('title', 'Belum Terdaftar Dalam Kelas')
@endif
@section('content')
    <div class="flex flex-row-reverse mb-4">
        @if ($subject != null)
            <button type="button" onclick="window.location='{{ route('dosen_tugas_tambah', $subject) }}'"
                class="text-white bg-green-500 hover:bg-green-700 focus:ring-2 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-green-500">
                <svg class="w-4 h-4 me-2 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 18 18">
                    <path
                        d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10ZM17 13h-2v-2a1 1 0 0 0-2 0v2h-2a1 1 0 0 0 0 2h2v2a1 1 0 0 0 2 0v-2h2a1 1 0 0 0 0-2Z" />
                </svg>
                Buat Tugas
            </button>
        @else
            <button type="button" onclick="window.location='#'"
                class="text-white bg-gray-500 hover:bg-gray-700 focus:ring-2 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:grey">
                <svg class="w-4 h-4 me-2 text-gray-800 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                    <path
                        d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10ZM17 13h-2v-2a1 1 0 0 0-2 0v2h-2a1 1 0 0 0 0 2h2v2a1 1 0 0 0 2 0v-2h2a1 1 0 0 0 0-2Z" />
                </svg>
                Buat Tugas
            </button>
        @endif
    </div>

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
                @foreach ($subject as $detailSubject)
                    @if ($subject != null)
                        @dd($detailSubject->mahasiswa)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $detailSubject->mahasiswa->user->name }}
                            </th>
                            <td class="px-6 py-4">

                                <img class="w-10 h-10 rounded-full"
                                    src={{ Storage::url($detailSubject->mahasiswa->user->photo) }} alt="Rounded avatar">

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
                    @endif
                @endforeach
            </tbody>
        @endsection
