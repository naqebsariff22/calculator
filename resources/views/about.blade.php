<x-layout>
    <x-slot:heading>
        About
    </x-slot:heading>

     <!-- About view -->
<div class="relative overflow-hidden bg-gray-900 bg-[url('/images/aboutbg.jpg')] bg-cover bg-center bg-no-repeat">
  <div class="absolute inset-0 bg-black/40"></div>
    <div class="relative z-10 h-[500px] flex items-center justify-start px-6 lg:px-12">
        <div class="ml-auto mr-24 max-w-xl space-y-6">
            <h1 class="text-4xl sm:text-5xl font-semibold tracking-tight text-white">Basic PHP Calculator</h1>
            <p class="text-lg sm:text-xl text-gray-300">Simple calculations for your daily needs!</p>
            <a href="/calc"
                class="inline-block rounded-md bg-white px-4 py-2 text-sm font-semibold text-gray-900 shadow hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white transition">
                Get started
            </a>
        </div>
    </div>
</div>
 
</x-layout>