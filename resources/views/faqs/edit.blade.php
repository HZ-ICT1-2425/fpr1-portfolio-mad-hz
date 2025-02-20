<x-layouts.app>
    {{-- Page title --}}
    <x-slot:title>
        {{ $faq->question }}
    </x-slot>

    <div class="max-w-[75rem] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mt-7 bg-white border border-gray-200 rounded-xl shadow-sm">
            <div class="p-4 sm:p-7">
                {{-- Form title --}}
                <x-forms.form-title title="Update FAQ" />

                <div class="mt-5">
                    {{-- Create a post form --}}
                    <form method="post" action="{{ route('faqs.update', $faq) }}">
                        @csrf
                        @method('PUT')

                        <div class="grid gap-y-4">
                            {{-- Question --}}
                            <x-forms.input-field type="text" name="question" label="Question"
                                placeholder="Why AI is important?" value="{{ old('question', $faq->question) }}" />

                            {{-- Answer --}}
                            <x-forms.text-area name="answer" label="Answer" value="{{ old('answer', $faq->answer) }}"
                                placeholder="AI is the reason why..."></x-forms.text-area>

                            {{-- Source --}}
                            <x-forms.input-field type="text" name="source_url" label="Source URL"
                                placeholder="https://madnl.nl/example-article" value="{{ old('source_url', $faq->source_url) }}" />

                            {{-- Submit button --}}
                            <x-forms.button type="submit" text="Create faq" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
