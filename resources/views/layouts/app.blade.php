<!doctype html>
<html @php(language_attributes()) x-data="{ menuOpen: false }" :class="{ 'overflow-hidden': menuOpen }" class="2xl:text-lg">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php(do_action('get_header'))
    @php(wp_head())

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <meta property="og:description" content="{!! $og['description'] !!}" />
    <meta property="og:image" content="{!! $og['image'] !!}" />

    @includeWhen($analytics ?? false, 'partials.analytics')

</head>

<body @php(body_class('font-sans text-black'))>
    @php(wp_body_open())

    <div id="app">
        <a class="sr-only focus:not-sr-only" href="#main">
            {{ __('Skip to content', 'sage') }}
        </a>
        @include('svg')
        @include('sections.header')

        <main id="main" class="main">
            @yield('content')
        </main>

        @hasSection('sidebar')
            <aside class="sidebar">
                @yield('sidebar')
            </aside>
        @endif

        @include('sections.footer')
    </div>

    @php(do_action('get_footer'))
    @include('partials.cookies')

    @php(wp_footer())
</body>

</html>
