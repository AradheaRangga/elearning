@extends('layouts.dosen')
@section('title', 'Tambah Tugas')
@section('content')
    <form class="space-y-4 md:space-y-6" action="{{ route('dosen_tugas_tambah_action', $subject) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        <div>
            <label for="small-input" class="block mb-2 text-sm font-medium text-gray-800 ">Judul Tugas</label>
            <input type="text" id="small-input" name="title"
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div>
            <label for="small-input" class="block mb-2 mt-2 text-sm font-medium text-gray-800 ">Deskripsi</label>
            <input type="text" id="small-input" name="description"
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div>
            <label class="block mb-2 mt-2 text-sm font-medium text-gray-800 " for="file_input">Upload file</label>
            <input
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none"
                id="file_input" type="file" name="content">
        </div>
        <div>
            <label for="large-input" class="block mb-2 mt-2 text-sm font-medium text-gray-800 ">Deadline</label>
            <div class="relative max-w-sm">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                    </svg>
                </div>
                <input datepicker datepicker-autohide type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                    placeholder="Select date" name="deadline">
            </div>
        </div>
        <div>
            <button type="submit"
                class="mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-700 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </div>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/datepicker.min.js"></script>
@endsection
