<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <style>
            .scrollbar-hide::-webkit-scrollbar {
                display: none;
            }

            .scrollbar-hide {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-black">
            @include('layouts.navigation')

            <!-- Page Content -->
            <main class="relative">
                <div class="banner h-60 bg-cover bg-center relative" style="background-image: url('https://www.phdmedia.com/latam/wp-content/uploads/sites/85/2017/06/Banner-2.gif');">
                    <div class="absolute bottom-0 left-0 p-4">
                        <div class="flex items-end justify-between">
                            <div class="flex items-center">
                                <div class="mr-4">
                                    <img class="h-32 w-32 object-cover rounded-md" src="https://i.pinimg.com/736x/c0/74/9b/c0749b7cc401421662ae901ec8f9f660.jpg" alt="{{ $user->name }}" />
                                </div>
                                <div class="">
                                    <p class="text-sm text-white font-semibold">{{ $user->name }}</p>
                                    <p class="text-sm text-white font-semibold">{{ $user->email }}</p>

                                    <div class="flex text-white gap-4 font-semibold">
                                        <p>{{ $user->userData->videos_watched ?? "1" }} <span class="text-gray-300">Videos Watched</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative z-10 bg-white/10 bg-black">
                    <div class="grid grid-cols-4 gap-2 md:grid-cols-8 text-gray-300 text-[14px] text-center">
                        <div class="border-b-2 pt-3 border-orange-500 hover:bg-gray-300/15 cursor-pointer">
                            <h1 class="font-bold">Stream</h1>
                        </div>
                        <div class="pt-3 hover:bg-gray-300/15 cursor-pointer">
                            <h1 class="">Videos</h1>
                        </div>
                        <div class="pt-3 pb-2 hover:bg-gray-300/15 cursor-pointer">
                            <h1 class="">Playlists</h1>
                        </div>
                        <div class="pt-3 hover:bg-gray-300/15 cursor-pointer">
                            <h1 class="">Photos</h1>
                        </div>

                        @if ($user !== null && auth()->user() && auth()->user()->id == $user->id)
                        <div class="hidden md:block col-span-4 md:col-span-4 md:justify-end md:m-2 md:gap-4 md:font-semibold">
                            <button class="py-1 px-2 bg-gray-700 rounded-sm">Inbox</button>
                            <button class="py-1 px-2 bg-gray-700 rounded-sm" onclick="window.location.href='/profile'">Edit profile</button>
                            <button class="py-1 px-2 bg-gray-700 rounded-sm">Share</button>
                        </div>
                        @endif
                    </div>

                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 pb-10">
                    <div class="col-span-2 ml-4 mr-4 mt-4">
                        <div class="border-2 border-gray-700 rounded-md border-gray-700/50 flex justify-center bg-gray-500/10 px-8 py-6">
                            <h1 class="text-orange-500 font-bold">Post to your stream</h1>
                        </div>

                        <div class="bg-gray-800/50 mt-4 rounded-md px-2 text-gray-300 flex justify-start items-center">
                            <div class="pt-3 pr-4 pl-4 hover:bg-gray-300/15 border-r-2 border-gray-700 cursor-pointer text-center">
                                <h1 class="font-bold">All posts</h1>
                            </div>
                            <div class="ml-4 pt-3 hover:bg-gray-300/15 cursor-pointer">
                                <h1 class="font-bold">View all</h1>
                            </div>
                        </div>

                        <div class="bg-gray-500/20 rounded-md border-2 border-gray-700 border-gray-700/50 mt-6 text-white w-full max-w-full flex flex-col items-start">
                            <div class="mr-4 ml-4 flex flex-row items-start">
                                <img src="https://i.pinimg.com/736x/c0/74/9b/c0749b7cc401421662ae901ec8f9f660.jpg" alt="Profile" class="w-16 h-16 mr-4 rounded-md">
                                <div>
                                    <div class="text-xl font-medium"><span class="text-orange-500 font-bold">John Doe</span> wrote a post on <span class="text-orange-500 font-bold">Jane</span>'s stream!</div>
                                    <div class="text-sm flex items-center space-x-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <span>6 months ago</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 ml-2 md:ml-4 mb-2">Hey ... everything good?</div>

                            <div class="flex items-center space-x-4 border-t pb-2 border-gray-600 bg-black/20 pt-2 w-full text-gray-400">
                                <div class="flex items-center space-x-2 ml-2">
                                    <span class="text-green-600">100</span>
                                </div>

                                <div class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                        <path d="M7.493 18.5c-.425 0-.82-.236-.975-.632A7.48 7.48 0 0 1 6 15.125c0-1.75.599-3.358 1.602-4.634.151-.192.373-.309.6-.397.473-.183.89-.514 1.212-.924a9.042 9.042 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75A.75.75 0 0 1 15 2a2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H14.23c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23h-.777ZM2.331 10.727a11.969 11.969 0 0 0-.831 4.398 12 12 0 0 0 .52 3.507C2.28 19.482 3.105 20 3.994 20H4.9c.445 0 .72-.498.523-.898a8.963 8.963 0 0 1-.924-3.977c0-1.708.476-3.305 1.302-4.666.245-.403-.028-.959-.5-.959H4.25c-.832 0-1.612.453-1.918 1.227Z" />
                                    </svg>
                                </div>

                                <div class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                        <path d="M15.73 5.5h1.035A7.465 7.465 0 0 1 18 9.625a7.465 7.465 0 0 1-1.235 4.125h-.148c-.806 0-1.534.446-2.031 1.08a9.04 9.04 0 0 1-2.861 2.4c-.723.384-1.35.956-1.653 1.715a4.499 4.499 0 0 0-.322 1.672v.633A.75.75 0 0 1 9 22a2.25 2.25 0 0 1-2.25-2.25c0-1.152.26-2.243.723-3.218.266-.558-.107-1.282-.725-1.282H3.622c-1.026 0-1.945-.694-2.054-1.715A12.137 12.137 0 0 1 1.5 12.25c0-2.848.992-5.464 2.649-7.521C4.537 4.247 5.136 4 5.754 4H9.77a4.5 4.5 0 0 1 1.423.23l3.114 1.04a4.5 4.5 0 0 0 1.423.23ZM21.669 14.023c.536-1.362.831-2.845.831-4.398 0-1.22-.182-2.398-.52-3.507-.26-.85-1.084-1.368-1.973-1.368H19.1c-.445 0-.72.498-.523.898.591 1.2.924 2.55.924 3.977a8.958 8.958 0 0 1-1.302 4.666c-.245.403.028.959.5.959h1.053c.832 0 1.612-.453 1.918-1.227Z" />
                                    </svg>
                                </div>
                                
                                <button class="hidden sm:flex items-center space-x-2">
                                    <span>Comment</span>
                                </button>
                                <button class="hidden sm:flex items-center space-x-2">
                                    <span>Share</span>
                                </button>

                                <div class="ml-auto mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:text-gray-300">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                </div>
                            </div>
                    </div>

                    <div class="bg-gray-500/20 rounded-md border-2 border-gray-700 border-gray-700/50 mt-6 text-white w-full max-w-full flex flex-col items-start">
                            <div class="m-4 flex flex-row items-start">
                                <img src="https://i.pinimg.com/736x/c0/74/9b/c0749b7cc401421662ae901ec8f9f660.jpg" alt="Profile" class="w-16 h-16 mr-4 rounded-md">
                                <div>
                                    <div class="text-xl font-medium"><span class="text-orange-500 font-bold">John Doe</span> wrote a post on <span class="text-orange-500 font-bold">Jane</span>'s stream!</div>
                                    <div class="text-sm flex items-center space-x-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <span>6 months ago</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 ml-2 md:ml-4 mb-2">Hey ... everything good?</div>

                            <div class="flex items-center space-x-4 border-t pb-2 border-gray-600 bg-black/20 pt-2 w-full text-gray-400">
                                <div class="flex items-center space-x-2 ml-2">
                                    <span class="text-green-600">100</span>
                                </div>

                                <div class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                        <path d="M7.493 18.5c-.425 0-.82-.236-.975-.632A7.48 7.48 0 0 1 6 15.125c0-1.75.599-3.358 1.602-4.634.151-.192.373-.309.6-.397.473-.183.89-.514 1.212-.924a9.042 9.042 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75A.75.75 0 0 1 15 2a2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H14.23c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23h-.777ZM2.331 10.727a11.969 11.969 0 0 0-.831 4.398 12 12 0 0 0 .52 3.507C2.28 19.482 3.105 20 3.994 20H4.9c.445 0 .72-.498.523-.898a8.963 8.963 0 0 1-.924-3.977c0-1.708.476-3.305 1.302-4.666.245-.403-.028-.959-.5-.959H4.25c-.832 0-1.612.453-1.918 1.227Z" />
                                    </svg>
                                </div>

                                <div class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                        <path d="M15.73 5.5h1.035A7.465 7.465 0 0 1 18 9.625a7.465 7.465 0 0 1-1.235 4.125h-.148c-.806 0-1.534.446-2.031 1.08a9.04 9.04 0 0 1-2.861 2.4c-.723.384-1.35.956-1.653 1.715a4.499 4.499 0 0 0-.322 1.672v.633A.75.75 0 0 1 9 22a2.25 2.25 0 0 1-2.25-2.25c0-1.152.26-2.243.723-3.218.266-.558-.107-1.282-.725-1.282H3.622c-1.026 0-1.945-.694-2.054-1.715A12.137 12.137 0 0 1 1.5 12.25c0-2.848.992-5.464 2.649-7.521C4.537 4.247 5.136 4 5.754 4H9.77a4.5 4.5 0 0 1 1.423.23l3.114 1.04a4.5 4.5 0 0 0 1.423.23ZM21.669 14.023c.536-1.362.831-2.845.831-4.398 0-1.22-.182-2.398-.52-3.507-.26-.85-1.084-1.368-1.973-1.368H19.1c-.445 0-.72.498-.523.898.591 1.2.924 2.55.924 3.977a8.958 8.958 0 0 1-1.302 4.666c-.245.403.028.959.5.959h1.053c.832 0 1.612-.453 1.918-1.227Z" />
                                    </svg>
                                </div>
                                
                                <button class="hidden sm:flex items-center space-x-2">
                                    <span>Comment</span>
                                </button>
                                <button class="hidden sm:flex items-center space-x-2">
                                    <span>Share</span>
                                </button>

                                <div class="ml-auto mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:text-gray-300">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                </div>
                            </div>
                    </div>
                </div>

                    <div class="mx-4 border-2 bg-gray-500/20 border-gray-700 border-gray-700/50 rounded-md mt-4">
                        <div class="mx-2 flex justify-between">
                            <div>
                                <h1 class="text-white mt-4">About</h1>
                            </div>

                            <div class="items-center gap-2 hidden md:flex">
                                <div class="h-4 w-4 bg-green-500 rounded-full shadow-md"></div>
                                <h3 class="uppercase font-semibold text-white">online</h3>
                            </div>
                        </div>

                        <div class="mt-2 md:mt-4 lg:mt-6 border-t-2 border-gray-500/40 w-full"></div>

                        <div class="flex ml-2 mt-2 md:mt-4 lg:mt-6 justify-start items-center text-orange-500 font-bold text-center cursor-pointer" onclick="window.location.href='/profile';">
                            <h1 class=""><span class="">+</span> Tell us about yourself</h1>
                        </div>

                        <div class="mt-2 md:mt-4 lg:mt-6 border-t-2 border-gray-500/40 w-full"></div>

                        <div class="mx-2 mt-2 md:mt-4 lg:mt-6 flex flex-col">
                            <ul class="text-gray-300 space-y-4">
                                <li><span class="font-bold">Gender:</span> {{ $user->userData->country ?? "Not set" }}</li>
                                <li><span class="font-bold">Relationship Status:</span> {{ $user->userData->relationship ?? "Not set" }}</li>
                                <li><span class="font-bold">Interested in:</span> {{ $user->userData->interested_in ?? "Not set" }}</li>
                                <li><span class="font-bold">Country:</span> {{ $user->userData->country ?? "Not set" }}</li>
                                <li><span class="font-bold">Profile Views:</span> {{ $user->userData->profile_views ?? "1" }}</li>
                                <li><span class="font-bold">Videos Wacthed:</span> {{ $user->userData->videos_watched ?? "1" }}</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </main>
        </div>

        @if ($errors->any())
            <div id="error-message" class="fixed bottom-0 right-0 mr-4 mb-4 rounded-md bg-red-50 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">There were {{ $errors->count() }} errors with your submission</h3>
                        <div class="mt-2 text-sm text-red-700">
                            <ul role="list" class="list-disc space-y-1 pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <script>
            setTimeout(function() {
                document.getElementById('error-message').remove();
            }, 8000);
        </script>
    </body>
</html>
