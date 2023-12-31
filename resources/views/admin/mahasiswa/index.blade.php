@extends('layouts.admin')
@section('title', 'Mahasiswa')
@section('content')
    <div class="flex flex-row-reverse mb-4">
        <button type="button" onclick="window.location='{{ route('register') }}'"
            class="text-white bg-green-500 hover:bg-green-700 focus:ring-2 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-green-500">
            <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 8h6m-3 3V5m-6-.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z" />
            </svg>
            Tambah Pengguna
        </button>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama
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
                        Tanggal Lahir
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Asal
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
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
                        <td class="flex gap-2 px-6 py-4">
                            <a href="{{ route('edit_mahasiswa', $data) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('delete_mahasiswa', $data) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
