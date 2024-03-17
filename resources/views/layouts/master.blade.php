<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="_token" content="{{ csrf_token() }}">
    <title>{{ $title . ' | ' ?? '' }} 0xGPU</title>

    <link rel="icon" href="{{ asset('images/favicon.png') }}">
    <x-head.tinymce-config />

    @vite('resources/css/app.css')

    <script src="https://cdn.ethers.io/lib/ethers-5.2.umd.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function csrfToken() {
            const csrf = document.querySelector('meta[name="_token"]').content;
            return csrf;
        }
    </script>
</head>

<body>
    @include('sweetalert::alert')

    <div class="drawer lg:drawer-open">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content">
            @include('components.navbar')
            <div class="px-5 py-3">
                @yield('content')
            </div>
        </div>
        @include('components.sidebar')
    </div>

    <script src="{{ asset('js/web3.js') }}"></script>
    @yield('script')
</body>

</html>
