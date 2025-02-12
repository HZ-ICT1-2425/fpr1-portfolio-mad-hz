<x-layouts.app>
    {{-- Page title --}}
    <x-slot:title>
        FAQ
    </x-slot>

    <div class="relative overflow-hidden">
        <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-10">
            {{-- Header title --}}
            <x-shared.header title="Your questions, answered" text="Answers to the most frequently asked questions." />

            <div class="max-w-2xl mx-auto">
                {{-- Create a faq link --}}
                <div class="flex justify-between mb-2">
                    <span class="ml-5">Showing {{ $faqs->lastItem() ?? 0 }} out of {{ $faqs->total() }} faqs</span>
                    @auth
                        <x-forms.create-link title="Create a faq" link="{{ route('faqs.create') }}" />
                    @endauth
                </div>

                @if ($faqs->count() <= 0)
                    <div class="text-center font-medium text-xl mt-2">There are no faqs yet.</div>
                @else
                    <div class="hs-accordion-group">
                        {{-- FAQ List --}}
                        @foreach ($faqs as $faq)
                            <x-faqs.faq-item :faq="$faq" />
                        @endforeach

                        <div class="flex justify-center mt-10">
                            {{ $faqs->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layouts.app>
