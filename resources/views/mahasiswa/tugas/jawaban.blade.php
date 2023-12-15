@extends('layouts.mahasiswa')
@section('title', 'Submit Tugas')
@section('content')
    <div>
        <label class="block mb-2 mt-2 text-sm font-medium text-gray-800 " for="file_input">Upload file</label>
        <input
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none"
            id="file_input" type="file" name="content">
    </div>
@endsection
