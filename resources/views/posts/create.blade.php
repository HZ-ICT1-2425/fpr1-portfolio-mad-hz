<x-layouts.app>
    {{-- Page title --}}
    <x-slot:title>
        Create post
    </x-slot>

    <div class="max-w-[75rem] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mt-7 bg-white border border-gray-200 rounded-xl shadow-sm">
            <div class="p-4 sm:p-7">
                {{-- Form title --}}
                <x-forms.form-title title="Create Post" />

                <div class="mt-5">
                    {{-- Create a post form --}}
                    <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="grid gap-y-4">
                            {{-- Title --}}
                            <x-forms.input-field type="text" name="title" label="Title"
                                placeholder="Why AI is important?" value="{{ old('title') }}" />

                            {{-- Body --}}
                            <x-forms.text-area name="body" label="Body"
                                placeholder="AI is the reason why..." value="{{ old('body') }}"></x-forms.text-area>

                            {{-- Source --}}
                            <x-forms.input-field type="text" name="source_url" label="Source URL"
                                placeholder="https://madnl.nl/example-article" value="{{ old('source_url') }}" />

                            {{-- Image --}}
                            <x-forms.file-input type="file" name="image_path" label="Image"></x-forms.file-input>

                            {{-- Submit button --}}
                            <x-forms.button type="submit" text="Create post" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
