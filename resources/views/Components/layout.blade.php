
<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calculator</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/js/app.js'])
    @vite(['public/images'])

</head>
<body class="h-full">
    <div class="min-h-full">
        <nav class="bg-gray-800">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex h-16 items-center justify-between">
                        
                        <!-- Header with navigations -->
                        <div class="flex items-center space-x-10">
                            <div class="shrink-0">
                                <img src="{{ asset('images/calcLogo.png') }}" alt="Logo" class="h-10 w-auto">
                            </div>

                            <div class="hidden md:flex space-x-4">
                                <a href="/" class="rounded-md px-3 py-2 text-sm font-medium {{ Request::is('/') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">Home</a>
                                <a href="/about" class="rounded-md px-3 py-2 text-sm font-medium {{ Request::is('about') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">About</a>
                                <a href="/calc" class="rounded-md px-3 py-2 text-sm font-medium {{ Request::is('calc') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">Calculator</a>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <button type="button"
                                class="relative flex items-center rounded-full bg-gray-800 p-1 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-gray-800"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <img src="{{ asset('images/man.png') }}" alt="User Avatar" class="h-10 w-10 rounded-full">
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Layout if browser is minimized -->
                <div class="md:hidden" id="mobile-menu">
                    <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
                        <a href="/" class="block rounded-md px-3 py-2 text-base font-medium {{ Request::is('/') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">Home</a>
                        <a href="/about" class="block rounded-md px-3 py-2 text-base font-medium {{ Request::is('about') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">About</a>
                        <a href="/calc" class="block rounded-md px-3 py-2 text-base font-medium {{ Request::is('calc') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">Calculator</a>
                    </div>

                <div class="border-t border-gray-700 pt-4 pb-3">
                    <div class="flex items-center px-5">

                        <div class="shrink-0">
                            <img class="size-10 rounded-full" src="{{ asset('images/man.png') }}" alt="" />
                        </div>

                        <div class="ml-3">
                            <div class="text-base/5 font-medium text-white">Naqeb Sariff</div>
                            <div class="text-sm font-medium text-gray-400">naqebsariff22@gmail.com</div>
                        </div>

                    </div>
                </div>
            </div>
        </nav>

        <header class="bg-white shadow-sm">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $heading }}</h1>
            </div>
        </header>

        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            {{  $slot }}
            </div>
        </main>
</div>
</body>
</html>