<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">

                <div
                    class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-end px-4 pt-4">
                        <button id="dropdownButton" data-dropdown-toggle="dropdown"
                            class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                            type="button">
                            <span class="sr-only">Open dropdown</span>
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 16 3">
                                <path
                                    d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdown"
                            class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2" aria-labelledby="dropdownButton">
                                <li>
                                    <a href="{{ route('edit_profile', $user) }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                                </li>
                                <li>
                                    @if ($user->role == 'dosen')
                                        @if ($user->dosen->is_admin)
                                            <a href="{{ route('admin_dashboard') }}"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                                        @else
                                            <a href="{{ route('dosen_dashboard') }}"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                                        @endif
                                    @else
                                        <a href="{{ route('mahasiswa_dashboard') }}"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                                    @endif
                            </ul>
                        </div>
                    </div>
                    <div class="flex flex-col items-center pb-10">
                        @if ($user->photo == null)
                            <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src={{ url('/profile.png') }}
                                alt="" />
                        @else
                            <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src={{ Storage::url($user->photo) }}
                                alt={{ $user->name }}>
                        @endif
                        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $user->name }}</h5>
                        <span class="text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</span>
                        @if ($user->dosen)
                            <span class="text-sm text-gray-500 dark:text-gray-400">{{ $user->dosen->nip }}</span>
                            <span class="text-sm text-gray-500 dark:text-gray-400">{{ $user->dosen->gender }}</span>
                        @elseif ($user->mahasiswa)
                            <span class="text-sm text-gray-500 dark:text-gray-400">{{ $user->mahasiswa->nim }}</span>
                            <span
                                class="text-sm text-gray-500 dark:text-gray-400">{{ $user->mahasiswa->gender }}</span>
                        @endif
                        <span class="text-sm text-gray-500 dark:text-gray-400">{{ $user->nim }}</span>
                    </div>
                </div>
            </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>

</html>
