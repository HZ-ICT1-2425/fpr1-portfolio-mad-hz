<x-layouts.app>
    {{-- Page title --}}
    <x-slot:title>
        Home
    </x-slot>

    <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-4 md:gap-8 xl:gap-20 md:items-center">
            {{-- Header content --}}
            <div>
                <h1 class="block text-3xl font-bold text-gray-800 sm:text-4xl lg:text-6xl lg:leading-tight"><span
                        class="bg-clip-text bg-gradient-to-tl from-blue-500 to-lime-400 text-transparent">Mohamad
                        Aldalati</span>
                </h1>
                <p class="mt-3 text-lg text-gray-800">Good morning to everyone except people who hate PHP.</p>

                <div class="mt-7 grid gap-3 w-full sm:inline-flex">
                    <a class="py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-lime-500 text-white hover:bg-lime-600 focus:outline-none focus:bg-lime-600 disabled:opacity-50 disabled:pointer-events-none"
                        href="/profile">
                        My profile
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </a>
                    <a class="py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                        href="{{ route('contact') }}">
                        Contact me
                    </a>
                </div>
            </div>

            {{-- Header image --}}
            <div class="relative ms-4">
                <img class="w-full rounded-md" src="{{ asset('assets/images/general/pc_foto.png') }}"
                    alt="PC Photo Page">
                <div
                    class="absolute inset-0 -z-[1] bg-gradient-to-tr from-gray-200 via-white/0 to-white/0 size-full rounded-md mt-4 -mb-4 me-4 -ms-4 lg:mt-6 lg:-mb-6 lg:me-6 lg:-ms-6">
                </div>
            </div>
        </div>

        {{-- Vision details --}}
        <x-home.vision></x-home.vision>

        {{-- Work experience list --}}
        <x-home.work-experience-list></x-home.work-experience-list>

        {{-- HZ menu --}}
        <x-home.hz-menu></x-home.hz-menu>

        {{-- Feedback of personal clients --}}
        <x-home.feedback></x-home.feedback>
    </div>
</x-layouts.app>
