<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ isset($title) ? $title . ' | MAD HZ' : 'MAD HZ' }}</title>
    {{-- Vite Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    {{-- Navbar --}}
    <x-shared.navigation :items="[
        ['label' => 'Home', 'url' => route('home'), 'active' => 'home'],
        ['label' => 'Dashboard', 'url' => route('dashboard'), 'active' => 'dashboard'],
        ['label' => 'Profile', 'url' => route('profile'), 'active' => 'profile'],
        ['label' => 'FAQ', 'url' => route('faqs.index'), 'active' => 'faqs.index'],
        ['label' => 'Blog', 'url' => route('posts.index'), 'active' => 'posts.index'],
        ['label' => 'Contact', 'url' => route('contact'), 'active' => 'contact'],
    ]"></x-shared.navigation>

    {{-- Content --}}
    {{ $slot }}

    {{-- Footer --}}
    <x-shared.footer></x-shared.footer>

    {{-- Toast message --}}
    @if (session('message'))
        <div id="toast"
            class="fixed top-0 left-1/2 transform -translate-x-1/2 -translate-y-full bg-white text-black px-4 py-3 rounded-lg shadow-lg mt-4 flex items-center space-x-4 transition-transform duration-500 ease-out">
            <span>{{ session('message') }}</span>
        </div>
    @endif

    {{-- Toast script --}}
    <script src="{{ asset('assets/js/toast.js') }}"></script>
</body>

</html>
