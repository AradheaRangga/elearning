@extends('layouts.mahasiswa')
@section('title', 'Dashboard')
@section('content')

    <div id="scrollContainer" class="flex flex-no-wrap overflow-x-scroll scrolling-touch items-start mb-8">
        @if ($mahasiswaSubjects != null)
            @foreach ($mahasiswaSubjects as $item)
                <div
                    class="flex-none w-2/3 md:w-1/3 mb-4 mr-8 md:pb-4 border bg-gray-900 rounded-lg bg-grey-50  w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                    <div class="px-4 py-2 ">
                        <div
                            class="text-lg leading-6 font-medium space-y-1 w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <h3 class="font-bold text-white text-3xl mb-2">
                                {{ $item->subject->subject_name }}
                            </h3>
                        </div>
                        <div class="text-lg">
                            <p class="">
                                Dosen Pengampu : {{ $item->subject->dosen->user->name }}
                            </p>
                            <p class="font-medium text-sm text-indigo-600 mt-2">
                                Read more<span class="text-indigo-600">&hellip;</span>
                            </p>
                        </div>
                    </div>
                    </a>
                </div>
            @endforeach
        @endif
    </div>
    </div>
    <div class="flex flex-row-reverse mb-4">
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Mata Kuliah
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Dosen Pengampu
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subjectsAvailable as $data)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white capitalize">
                            {{ $data->subject_name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $data->dosen->user->name }}
                        </td>
                        <td>
                            <form action="{{ route('ambil_kelas_action', $data->id) }}" method="post">
                                @csrf
                                <button type="submit" class="font-medium  dark:text-green-500 hover:underline">Ambil
                                    Kelas</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection
