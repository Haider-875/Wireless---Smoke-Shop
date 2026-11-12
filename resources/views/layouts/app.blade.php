<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#0a0a0b">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
    <title>@yield('title', 'Bugs Wireless & Smoke Shop — St. Louis, MO')</title>
    <meta name="description" content="@yield('meta_description', 'Bugs Wireless & Smoke Shop on Halls Ferry Rd, St. Louis. Phone repair, screen replacement, vapes, glass, hookah, and phone accessories. Walk-ins welcome.')">
    <link rel="canonical" href="@yield('canonical', url()->current())">
    <meta name="robots" content="@yield('meta_robots', 'index, follow')">

    <!-- OpenGraph / Facebook -->
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:title" content="@yield('og_title', 'Bugs Wireless & Smoke Shop — St. Louis, MO')">
    <meta property="og:description" content="@yield('meta_description', 'Bugs Wireless & Smoke Shop on Halls Ferry Rd, St. Louis. Phone repair, screen replacement, vapes, glass, hookah, and phone accessories. Walk-ins welcome.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="Bugs Wireless & Smoke Shop">
    <meta property="og:image" content="@yield('og_image', asset('assets/images/lifestyle/hero-display.png'))">

    <!-- Twitter / X -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', 'Bugs Wireless & Smoke Shop — St. Louis, MO')">
    <meta name="twitter:description" content="@yield('meta_description', 'Bugs Wireless & Smoke Shop on Halls Ferry Rd, St. Louis. Phone repair, screen replacement, vapes, glass, hookah, and phone accessories.')">
    <meta name="twitter:image" content="@yield('og_image', asset('assets/images/lifestyle/hero-display.png'))">

    <!-- Schema.org LocalBusiness / ElectronicsStore JSON-LD -->
    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'ElectronicsStore',
        'name' => 'Bugs Wireless & Smoke Shop',
        'image' => asset('assets/images/lifestyle/hero-display.png'),
        'telephone' => '+1-314-441-2851',
        'priceRange' => '$$',
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => '10010 Halls Ferry Rd',
            'addressLocality' => 'St. Louis',
            'addressRegion' => 'MO',
            'postalCode' => '63136',
            'addressCountry' => 'US',
        ],
        'geo' => [
            '@type' => 'GeoCoordinates',
            'latitude' => 38.7490,
            'longitude' => -90.2315,
        ],
        'openingHoursSpecification' => [
            [
                '@type' => 'OpeningHoursSpecification',
                'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                'opens' => '10:00',
                'closes' => '20:00',
            ],
        ],
        'url' => url('/'),
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
    @stack('schema')

    <!-- Performance & DNS Hints -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
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
