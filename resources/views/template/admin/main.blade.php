<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title') - Inventory</title>
    <!-- CSS files -->
    <link href="{{ asset('dist/css/tabler.min.css') }}" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
    @livewireStyles
</head>

<body>
    <div class="page">
        @include('template.admin.header')
        <div class="page-wrapper">
            <div class="page-body">
                <div class="container-xl">
                    {{ $slot }}
                </div>
            </div>
            @include('template.admin.footer')
        </div>
    </div>
    <script src="{{ asset('dist/js/tabler.min.js') }}" defer></script>
    @livewireScripts
</body>

</html>
