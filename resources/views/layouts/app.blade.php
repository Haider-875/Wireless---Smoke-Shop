<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#0a0a0b">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
    <title>@yield('title', 'Bugs Wireless & Smoke Shop — St. Louis, MO')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;1,400;1,500;1,600&family=JetBrains+Mono:wght@400;500&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3.3 CSS (Local) -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Bootstrap Icons (Local) -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-icons.min.css') }}">
    <!-- BUGS Custom Design Tokens & Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bugs-theme.css') }}">

    @stack('styles')
</head>
<body class="d-flex flex-column min-vh-100">
    <!-- Master Header & Sticky Navbar -->
    @include('components.navbar')

    <!-- Main Content Area -->
    <main class="flex-grow-1">
        @yield('content')
    </main>

    <!-- Master Footer -->
    @include('components.footer')

    <!-- Slide-Out Cart Bag Offcanvas Drawer -->
    @include('components.cart-drawer')

    <!-- 21+ Age Verification Gate Modal -->
    @include('components.age-modal')

    <!-- Bootstrap 5.3.3 JS Bundle (Local) -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Custom Vanilla JS (Scroll Blur, Cart Offcanvas, Age Persistence) -->
    <script src="{{ asset('assets/js/bugs-app.js') }}"></script>

    @stack('scripts')
</body>
</html>
