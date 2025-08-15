<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {{-- Header --}}
    @include('partials.admin.header')
</head>
<body>

    {{-- Sidebar (admin için ayrı partial dosya) --}}
    @include('partials.admin.sidebar')

    {{-- Ana içerik --}}
    <main class="main-content">
        @yield('content')
    </main>

    {{-- Footer (opsiyonel) --}}
    @includeIf('partials.admin.footer')

   {{-- Footer (opsiyonel) --}}
    @includeIf('partials.admin.footer')
    
</body>
</html>
