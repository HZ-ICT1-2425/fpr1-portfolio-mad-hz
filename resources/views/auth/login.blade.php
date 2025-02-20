<x-layouts.app>
    <div class="max-w-[30rem] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mt-7 bg-white border border-gray-200 rounded-xl shadow-sm">
            <div class="p-4 sm:p-7">
                <div class="text-center">
                    <h1 class="block text-2xl font-bold text-gray-800">Sign in</h1>
                </div>

                <div class="mt-5">
                    <form method="POST" action="{{ route('auth.login') }}">
                        @csrf
                        <div class="grid gap-y-4">

                            <x-forms.input-field type="email" name="email" label="Email address"
                                value="{{ old('email') }}" />

                            <x-forms.input-field type="password" name="password" label="Password" />

                            <x-forms.button type="submit" text="Sign in" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
