@extends('layouts.mahasiswa')
@section('Lihat Tugas')
@section('content')
    <div>
        <label for="subjects" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
            Pilih Kelas
        </label>
        <select id="subjects" name="subject_id"
            class="bg-gray-50 border border-gray-300 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="" disabled selected>Pilih KELAS</option>
            @foreach ($mahasiswaSubjects as $data)
                <option value="{{ $data->subject->id }}">{{ $data->subject->subject_name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Container untuk menampilkan assignment -->
    <div id="assignment-container" class="mt-4">
        <!-- Konten assignment akan ditempatkan di sini -->
    </div>

    <script>
        // Ambil elemen dropdown dan container assignment
        const subjectsDropdown = document.getElementById('subjects');
        const assignmentContainer = document.getElementById('assignment-container');

        // Event listener untuk perubahan pada dropdown
        subjectsDropdown.addEventListener('change', function() {
            // Bersihkan container assignment
            assignmentContainer.innerHTML = '';

            // Ambil nilai subject_id yang dipilih
            const selectedSubjectId = this.value;

            // Temukan subjek yang sesuai di dalam mahasiswaSubjects
            const selectedSubject = {!! $subjects !!}.find(subject => subject.id ==
                selectedSubjectId);

            // Tampilkan setiap assignment dalam kartu
            selectedSubject.assignments.forEach(assignment => {

                // Tambahkan kartu ke dalam container assignment
                const route =
                    `{{ route('mahasiswa_upload_tugas', ['assignment' => ' ']) }}${assignment.id}`;
                assignmentContainer.innerHTML += `
                    <a href="${route}" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">${assignment.id}</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">${assignment.description}</p>
                        <p class="card-text text-gray-800 dark:text-gray-400"><strong>Deadline:</strong> ${assignment.deadline}</p>
                    </a>
                `;
            });
        });
    </script>
@endsection
