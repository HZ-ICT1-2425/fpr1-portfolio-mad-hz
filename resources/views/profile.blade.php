<x-layouts.app>
    {{-- Page title --}}
    <x-slot:title>
        Profile
    </x-slot>

    <div class="relative overflow-hidden">
        <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <!-- Header content -->
            <div class="max-w-2xl text-center mx-auto mb-10">
                <h2
                    class="block text-3xl font-bold text-gray-800 sm:text-4xl md:text-5xl bg-clip-text bg-gradient-to-tl from-blue-500 to-lime-400 text-transparent">
                    Who Am
                    I
                </h2>
                <p class="mt-3 text-lg text-gray-800">Once again, good morning to everyone except people who hate PHP.
                </p>
            </div>

            <!-- Header HZ Video -->
            <div class="mt-10 relative max-w-5xl mx-auto">
                <div class="w-full h-96 sm:h-[480px] rounded-xl overflow-hidden">
                    <div class="w-full h-full"><iframe
                            src="https://player.vimeo.com/video/1006493567?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479"
                            frameborder="0" allow="autoplay; fullscreen; picture-in-picture; clipboard-write"
                            style="position:absolute;top:0;left:0;width:100%;height:100%;"
                            title="Ontdek de nieuwe opleiding HBO-ICT in deeltijd | HZ University of Applied Sciences"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Who am I --}}
    <x-profile.who-am-i></x-profile.who-am-i>

    {{-- Tools I use --}}
    <x-profile.tools></x-profile.tools>

    {{-- A projects I have made --}}
    <x-profile.projects></x-profile.projects>

    {{-- Clients of mine --}}
    <x-profile.clients></x-profile.clients>
</x-layouts.app>
