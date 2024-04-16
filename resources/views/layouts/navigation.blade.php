<nav class="bg-black border-b border-gray-800">
    <!-- <div class="pt-1 flex justify-center text-gray-300 uppercase text-[12px] gap-8">
        <div>
            <h1>spicevids</h1>
        </div>
        <div>
            <h1>uviu</h1>
        </div>
        <div>
            <h1>sexual wellness</h1>
        </div>
        <div>
            <h1>insights</h1>
        </div>
        <div>
            <h1>sites</h1>
        </div>
        <div>
            <h1>shop</h1>
        </div>
        <div>
            <h1>trust & safety</h1>
        </div>
        <div>
            <h1>NL</h1>
        </div>
    </div> -->

    <div class="lg:mx-12 sm:mx-6 px-2 sm:px-4 lg:px-6 pt-2 gap-2">
        <div class="grid grid-cols-4">
            <div class="shrink-0 flex items-center">
                <div class="text-orange-500 font-bold cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </div>

                <a href="/">
                    <x-application-logo class="block h-14 w-auto fill-current text-gray-800" />
                </a>
            </div>

            <div class="col-span-2">
                <div class="hidden space-x-8 w-full sm:-my-px sm:flex sm:justify-center">
                    <div class="relative flex items-center mt-4 md:mt-0 w-full">
                        <span class="absolute">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-5 h-5 mx-3 text-white"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
                                />
                            </svg>
                        </span>
                        <input
                            type="text"
                            placeholder="Search..."
                            class="block w-full py-1.5 pr-5 text-white bg-gray-300/10 border-2 border-gray-700 rounded-full md:w-full placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 focus:outline-none"
                        />
                    </div>


                    <div class="flex text-gray-300">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                            </svg>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 0 1 0 .656l-5.603 3.113a.375.375 0 0 1-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112Z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end col-span-1 text-gray-300">
            <div class="sm:hidden items-center mt-3 text-white cursor-pointer">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-8 h-8 mx-3 text-white"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
                        />
                    </svg>
                </div>
                @if (auth()->user() == null)
                <div class="cursor-pointer" id="loginIcon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </div>
                @else
                <div class="cursor-pointer">
                    <a href="/user/{{ auth()->user()->id }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </a>
                </div>
                @endif


                <div id="loginModal" class="hidden fixed inset-0 z-10 overflow-y-auto">
                    <div class="flex items-center justify-center min-h-screen">
                        <div class="absolute inset-0 bg-gray-900 bg-opacity-50 backdrop-filter backdrop-blur-sm"></div> <!-- Background blur effect -->
                        <div class="w-96 rounded-lg shadow-lg p-6 bg-black border-2 border-gray-900 relative z-10"> <!-- Increase z-index to appear on top of the blurred background -->
                            <div class="flex flex-col justify-center items-center h-full">
                                <x-application-logo class="block w-24 h-24 fill-current text-gray-800" />
                                <h2 class="text-3xl text-white font-semibold">Member Sign In</h2>
                                <p class="text-gray-300">Access your WallyHub account</p>
                            </div>
                            
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="mt-8">
                                    <input placeholder="E-mail" id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 bg-white/10 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                                </div>
                                <div class="mt-2">
                                    <input placeholder="Password" id="password" name="password" type="password" autocomplete="password" required class="block w-full rounded-md border-0 bg-white/10 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                                </div>

                                <div class="flex items-center mt-4">
                                    <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 rounded border-0 text-white bg-white/10 focus:ring-indigo-500">
                                    <div class="ml-3 mt-2">
                                        <label for="remember-me" class="block text-sm leading-6 text-white">Remember me on this computer</label>
                                        <p class="text-sm text-gray-400">(Not recommended)</p>
                                    </div>
                                </div>

                                <div class="mt-10 flex justify-center">
                                    <button type="submit" class="px-8 py-3 bg-orange-500 hover:bg-orange-400 text-white font-bold">Sign in</button>
                                </div>
                            </form>

                            <div class="mt-4 text-center">
                                <p class="text-sm text-white">Don't have an account yet? <a class="cursor-pointer font-bold text-orange-500 hover:text-orange-600">Sign Up</a> here</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-4 gap-2 md:grid-cols-8 uppercase text-white text-[11px] text-center">
            <div class="border-b-2 pt-2 pb-2 border-orange-500 hover:bg-gray-300/15 cursor-pointer">
                <h1 class="font-bold">Home</h1>
            </div>
            <div class="hidden md:block pt-2 pb-2 hover:bg-gray-300/15 cursor-pointer">
                <h1 class="font-bold">video's</h1>
            </div>
            <div class="hidden md:block pt-2 pb-2 hover:bg-gray-300/15 cursor-pointer">
                <h1 class="font-bold">categorieen</h1>
            </div>
            <div class="pt-2 pb-2 hover:bg-gray-300/15 cursor-pointer">
                <h1 class="font-bold">live cams</h1>
            </div>

            <!-- These will only be visible on screens larger than md (768px) -->
            <div class="hidden md:block pt-2 pb-2 hover:bg-gray-300/15 cursor-pointer">
                <h1 class="font-bold">pornosterren</h1>
            </div>

            <div class="pt-2 pb-2 hover:bg-gray-300/15 cursor-pointer">
                <h1 class="font-bold">neuk nu</h1>
            </div>

            <div class="pt-2 pb-2 hover:bg-gray-300/15 cursor-pointer">
                <h1 class="font-bold">community</h1>
            </div>

            <div class="hidden md:block pt-2 pb-2 hover:bg-gray-300/15 cursor-pointer">
                <h1 class="font-bold">foto's & gif's</h1>
            </div>
        </div>

</nav>

<script>
    // fix dit!
    document.addEventListener('DOMContentLoaded', function () {
        const loginIcon = document.getElementById('loginIcon');
        const loginModal = document.getElementById('loginModal');

        const closeModal = () => {
            loginModal.classList.add('hidden');
        };

        loginIcon.addEventListener('click', function(event) {
            loginModal.classList.toggle('hidden');
            event.stopPropagation();
        });

        document.body.addEventListener('click', function(event) {
            const isOutsideModal = !loginModal.contains(event.target);
            const isOutsideIcon = event.target !== loginIcon;

            if (isOutsideModal && isOutsideIcon) {
                closeModal();
            }
        });

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape' && !loginModal.classList.contains('hidden')) {
                closeModal();
            }
        });
    });
</script>
