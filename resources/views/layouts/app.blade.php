<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- Favicon --}}
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
  <link rel="manifest" href="{{ asset('site.webmanifest') }}">
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

  {{-- Meta SEO dinámico --}}
  {!! SEOMeta::generate() !!}
  {!! OpenGraph::generate() !!}
  {!! Twitter::generate() !!}

  {{-- Schema.org JSON‑LD dinamizado (example LocalBusiness) --}}
  @hasSection('jsonld')
    @yield('jsonld')
  @else
  <script type="application/ld+json">
  {
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "PublienRed",
  "url": "{{ url('/') }}",
  "logo": "{{ asset('images/logo.png') }}",
  "description": "PublienRed: Soluciones digitales y marketing para tu negocio",
  "address": {
    "@type": "PostalAddress",
    "addressLocality": "Mérida",
    "addressRegion": "Mérida",
    "addressCountry": "VE"
  },
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "+58-424-744-7443",
    "contactType": "customer service"
  }
}
  </script>
  @endif

  {{-- FontAwesome --}}
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-pb3Xr6ScCnCIWmD1QWiPv9UlFoEJf1E+efbacR+MVx1f60j+9bykNwOlGNHsCefHeIF3Ge3SOXBsKuXIUHM6Yw=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />

  {{-- Vite (TailwindCSS + JS) --}}
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex flex-col">
  {{-- Navbar + Topbar --}}
  @include('partials.navbar')

  {{-- Splash SOLO en la ruta 'home' --}}
  @if(request()->routeIs('home'))
    @include('partials.splash')
  @endif

  {{-- Contenido principal --}}
  <main id="main" class="flex-grow">
    @yield('content')
  </main>

  {{-- Divider impactante entre Contact y Footer --}}
  <div class="w-full h-6 bg-gradient-to-r from-primary via-secondary to-primary"></div>

  {{-- Footer --}}
  @include('partials.footer')
</body>
</html>
