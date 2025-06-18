<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laundry | Login Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="w-full max-w-3/4 sm:max-w-2/4 lg:max-w-1/4 mx-auto h-screen flex justify-center items-center">

    <div
        class="w-full mt-7 bg-white border border-gray-200 rounded-xl shadow-2xs dark:bg-neutral-900 dark:border-neutral-700">
        <div class="p-4 sm:p-7">
            <div class="text-center">
                <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Sign in</h1>
                <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                    Don't have an account yet?
                    <a class="text-blue-600 decoration-2 hover:underline focus:outline-hidden focus:underline font-medium dark:text-blue-500"
                        href="../examples/html/signup.html">
                        Sign up here
                    </a>
                </p>
            </div>

            <div class="mt-5">
                @if (session('success'))
                    <div class="mt-2 bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500 mb-5"
                        role="alert" tabindex="-1" aria-labelledby="hs-soft-color-success-label">
                        <span id="hs-soft-color-success-label" class="font-bold">Success</span>
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="mt-2 bg-rose-100 border border-rose-200 text-sm text-rose-800 rounded-lg p-4 dark:bg-rose-800/10 dark:border-rose-900 dark:text-rose-500 mb-5"
                        role="alert" tabindex="-1" aria-labelledby="hs-soft-color-success-label">
                        <span id="hs-soft-color-success-label" class="font-bold">Error</span>
                        {{ session('error') }}
                    </div>
                @endif

                <button type="button"
                    class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                    <svg class="w-4 h-auto" width="46" height="47" viewBox="0 0 46 47" fill="none">
                        <path
                            d="M46 24.0287C46 22.09 45.8533 20.68 45.5013 19.2112H23.4694V27.9356H36.4069C36.1429 30.1094 34.7347 33.37 31.5957 35.5731L31.5663 35.8669L38.5191 41.2719L38.9885 41.3306C43.4477 37.2181 46 31.1669 46 24.0287Z"
                            fill="#4285F4" />
                        <path
                            d="M23.4694 47C29.8061 47 35.1161 44.9144 39.0179 41.3012L31.625 35.5437C29.6301 36.9244 26.9898 37.8937 23.4987 37.8937C17.2793 37.8937 12.0281 33.7812 10.1505 28.1412L9.88649 28.1706L2.61097 33.7812L2.52296 34.0456C6.36608 41.7125 14.287 47 23.4694 47Z"
                            fill="#34A853" />
                        <path
                            d="M10.1212 28.1413C9.62245 26.6725 9.32908 25.1156 9.32908 23.5C9.32908 21.8844 9.62245 20.3275 10.0918 18.8588V18.5356L2.75765 12.8369L2.52296 12.9544C0.909439 16.1269 0 19.7106 0 23.5C0 27.2894 0.909439 30.8731 2.49362 34.0456L10.1212 28.1413Z"
                            fill="#FBBC05" />
                        <path
                            d="M23.4694 9.07688C27.8699 9.07688 30.8622 10.9863 32.5344 12.5725L39.1645 6.11C35.0867 2.32063 29.8061 0 23.4694 0C14.287 0 6.36607 5.2875 2.49362 12.9544L10.0918 18.8588C11.9987 13.1894 17.25 9.07688 23.4694 9.07688Z"
                            fill="#EB4335" />
                    </svg>
                    Sign in with Google
                </button>

                <div
                    class="py-3 flex items-center text-xs text-gray-400 uppercase before:flex-1 before:border-t before:border-gray-200 before:me-6 after:flex-1 after:border-t after:border-gray-200 after:ms-6 dark:text-neutral-500 dark:before:border-neutral-600 dark:after:border-neutral-600">
                    Or</div>

                <!-- Form -->
                <form action={{ route('login.auth') }} method="POST">
                    @csrf
                    <div class="grid gap-y-4">
                        <!-- Form Group -->
                        <div>
                            <label for="email" class="block text-sm mb-2 dark:text-white">Email address</label>
                            <div class="relative">
                                <input type="email" id="email" name="email" value="{{ old('email') }}"
                                    class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 @error('email') border-red-500 @enderror"
                                    required aria-describedby="email-error" required>
                                <div class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                                    <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor"
                                        viewBox="0 0 16 16" aria-hidden="true">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                    </svg>
                                </div>
                            </div>
                            @error('email')
                                <p class="text-xs text-red-600 mt-2" id="email-error">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div>
                            <div>
                                <label for="password" class="block text-sm mb-2 dark:text-white">Password</label>
                                <div class="relative">
                                    <input type="password" id="password" name="password" value="{{ old('password') }}"
                                        class="py-2.5 sm:py-3 px-4 pe-11 block w-full border-gray-200 rounded-lg sm:text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 @error('password') border-red-500 @enderror"
                                        placeholder="xxxxxx" required>
                                    <div class="hs-tooltip absolute inset-y-0 end-0 flex items-center cursor-pointer z-20 pe-4"
                                        id="toggle-password">
                                        <div class="hs-tooltip-toggle" id="hs-password-tooltip">
                                            <svg id="passwordhide"
                                                class="shrink-0 size-6 text-gray-800 dark:text-neutral-500"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 512 512">
                                                <path fill="currentColor"
                                                    d="M432 448a15.92 15.92 0 0 1-11.31-4.69l-352-352a16 16 0 0 1 22.62-22.62l352 352A16 16 0 0 1 432 448M248 315.85l-51.79-51.79a2 2 0 0 0-3.39 1.69a64.11 64.11 0 0 0 53.49 53.49a2 2 0 0 0 1.69-3.39m16-119.7L315.87 248a2 2 0 0 0 3.4-1.69a64.13 64.13 0 0 0-53.55-53.55a2 2 0 0 0-1.72 3.39" />
                                                <path fill="currentColor"
                                                    d="M491 273.36a32.2 32.2 0 0 0-.1-34.76c-26.46-40.92-60.79-75.68-99.27-100.53C349 110.55 302 96 255.68 96a226.5 226.5 0 0 0-71.82 11.79a4 4 0 0 0-1.56 6.63l47.24 47.24a4 4 0 0 0 3.82 1.05a96 96 0 0 1 116 116a4 4 0 0 0 1.05 3.81l67.95 68a4 4 0 0 0 5.4.24a343.8 343.8 0 0 0 67.24-77.4M256 352a96 96 0 0 1-93.3-118.63a4 4 0 0 0-1.05-3.81l-66.84-66.87a4 4 0 0 0-5.41-.23c-24.39 20.81-47 46.13-67.67 75.72a31.92 31.92 0 0 0-.64 35.54c26.41 41.33 60.39 76.14 98.28 100.65C162.06 402 207.92 416 255.68 416a238.2 238.2 0 0 0 72.64-11.55a4 4 0 0 0 1.61-6.64l-47.47-47.46a4 4 0 0 0-3.81-1.05A96 96 0 0 1 256 352" />
                                            </svg>
                                            <svg id="passwordshow"
                                                class="hidden shrink-0 size-6 text-gray-800 dark:text-neutral-500"
                                                xmlns="http://www.w3.org/2000/svg" width="27" height="24"
                                                viewBox="0 0 576 512">
                                                <path fill="currentColor"
                                                    d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19M288 400a144 144 0 1 1 144-144a143.93 143.93 0 0 1-144 144m0-240a95.3 95.3 0 0 0-25.31 3.79a47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160" />
                                            </svg>
                                            <span
                                                class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-md shadow-2xs dark:bg-neutral-700"
                                                role="tooltip" id="tooltip-name">
                                                show
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @error('password')
                                <p class="text-xs text-red-600 mt-2" id="password-error">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- End Form Group -->

                        <!-- Checkbox -->
                        <div class="flex items-center">
                            <div class="flex">
                                <input id="remember-me" name="remember-me" type="checkbox"
                                    class="shrink-0 mt-0.5 border-gray-200 rounded-sm text-blue-600 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                            </div>
                            <div class="ms-3">
                                <label for="remember-me" class="text-sm dark:text-white">Remember me</label>
                            </div>
                        </div>
                        <!-- End Checkbox -->

                        <button type="submit"
                            class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Sign
                            in</button>
                    </div>
                </form>
                <!-- End Form -->
            </div>
        </div>
    </div>

    @livewireScripts
    <script>
        const showHidePassword = document.getElementById('toggle-password');
        showHidePassword.addEventListener('click', function() {
            const password = document.getElementById('password');
            const tooltipName = document.getElementById('tooltip-name')
            const iconShow = document.getElementById('passwordshow');
            const iconHide = document.getElementById('passwordhide');
            const type = password.getAttribute('type');
            if (type == 'password') {
                password.setAttribute('type', 'text');
                tooltipName.innerHTML = 'hide';
                iconShow.classList.remove('hidden');
                iconHide.classList.add('hidden');
            } else {
                password.setAttribute('type', 'password');
                tooltipName.innerHTML = 'show';
                iconShow.classList.add('hidden');
                iconHide.classList.remove('hidden');
            }


        })
    </script>
</body>

</html>
