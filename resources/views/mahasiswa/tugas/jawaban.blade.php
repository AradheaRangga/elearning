@extends('layouts.mahasiswa')
@section('title', 'Detail Tugas ')
@section('content')
    <div class="p-6 bg-gray-50 text-medium text-gray-500 dark:text-gray-400 dark:bg-gray-800 rounded-lg w-full mb-5">
        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">
            {{ $assignment->title }}
        </h3>
        <p class="mb-2">
            {{ $assignment->description }}
        </p>
        <p>
            Deadline : {{ $assignment->deadline }}
        </p>
    </div>
    {{-- @dd($assignment->subject); --}}
    <form class="space-y-4 md:space-y-6" action="{{ route('mahasiswa_upload_tugas_action', $assignment) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        <div class="p-6 bg-gray-50 text-medium text-gray-500 dark:text-gray-400 dark:bg-gray-800 rounded-lg w-full">
            <label class="text-lg font-bold text-gray-900 dark:text-white mb-2 mt-2" for="file_input">Upload file</label>
            <input
                class="block w-full text-sm text-gray-900 border border-gray-300 cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none mt-3"
                id="file_input" type="file" name="file">
            <div class="flex flex-row-reverse">
                <button type="submit"
                    class=" mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-full py-2 text-center dark:bg-gray-700 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </div>
        </div>
    </form>
@endsection
