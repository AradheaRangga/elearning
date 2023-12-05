@extends('layouts.dosen')
@section('title', 'Dashboard')
@section('content')
    <div class="grid grid-cols-3 gap-4 mb-4">
        <a href="#"
            class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy
                technology acquisitions 2021</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology
                acquisitions of 2021 so far, in reverse chronological order.</p>
        </a>
        <a href="#"
            class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy
                technology acquisitions 2021</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology
                acquisitions of 2021 so far, in reverse chronological order.</p>
        </a>
        <a href="#"
            class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy
                technology acquisitions 2021</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology
                acquisitions of 2021 so far, in reverse chronological order.</p>
        </a>
    </div>
    <div class="flex flex-row-reverse mb-4">
        {{-- <button type="button" onclick="window.location='{{ route('user_create') }}'"
                    class="text-white bg-green-500 hover:bg-green-700 focus:ring-2 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-green-500">
                    <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 8h6m-3 3V5m-6-.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z" />
                    </svg>
                    Tambah Pengguna
                </button> --}}
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        NIP/NIM
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Gender
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal lahir
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Asal
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswa as $data)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $data->user->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $data->nim }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->user->email }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($data->gender == 'laki-laki')
                                <span
                                    class="bg-indigo-100 text-indigo-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">Pria</span>
                            @else
                                <span
                                    class="bg-pink-100 text-pink-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-pink-900 dark:text-pink-300">Wanita</span>
                            @endif
                        </td>

                        <td class="px-6 py-4">
                            {{ $data->tanggal_lahir }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->asal }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    </main>
@endsection
