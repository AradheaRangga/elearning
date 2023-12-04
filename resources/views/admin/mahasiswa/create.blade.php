<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0 md:h-screen lg:py-0">
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Create and account
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('tambah_mahasiswa_action') }}" method="post">
                        @csrf
                        <div>
                            {{-- <div class="mb-5">
                                <label for="large-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User ID</label>
                                <input type="text" name="user_id" id="disabled-input" aria-label="disabled input"
                                    class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $getUser->id }}" readonly>
                            </div> --}}
                            <label for="nim"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIM</label>
                            <input type="text" name="nim" id="nim"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="3121600077" required>
                        </div>
                        <div>
                            <label for="tanggal_lahir"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                Lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name" required>
                        </div>
                        <div>
                            <label for="asal"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">asal</label>
                            <input type="text" name="asal" id="asal"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Surabaya" required>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                <input id="bordered-radio-1" type="radio" value="laki-laki" name="gender"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="bordered-radio-1"
                                    class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Laki -
                                    Laki
                                </label>
                            </div>
                            <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                <input checked id="bordered-radio-2" type="radio" value="perempuan" name="gender"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="bordered-radio-2"
                                    class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Perempuan
                                </label>
                            </div>
                        </div>
                        <div>
                            <input type="hidden" name="user_id" value="{{ $user->id }}"hidden>
                        </div>
                        <div class="flex justify-center">
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Sign
                                Up
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
