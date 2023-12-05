@extends('layouts.admin')
@section('title', 'Edit Kelas')
@section('content')
    <section>
        <form class="max-w-md" action="{{ route('update_kelas_action', $subject) }}" method="post">
            @csrf
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" value="{{ $subject->subject_name }}" name="subject_name" id="floating_subject_name"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-grey-400 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="floating_subject_name"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Mata
                    Kuliah</label>
            </div>
            <div>
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Pilih
                    Dosen</label>
                <select id="countries" value="{{ $subject->dosen_id }}" name="dosen_id"
                    class="bg-gray-50 border border-gray-300 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($dosen as $dosen)
                        <option value="{{ $dosen->id }}">{{ $dosen->user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit"
                    class="mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-700 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </div>
        </form>
    </section>
@endsection
