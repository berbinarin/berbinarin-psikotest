<!DOCTYPE html>
<html lang="en">
    <head>
        {{-- Header --}}
        @include("landing.partials.header")

        {{-- Additional Style --}}
        @yield("style")
    </head>
    <body class="font-plusJakartaSans">
        {{-- Navbar --}}
        {{-- @include("landing.partials.navbar") --}}

        <main>
            {{-- Main Content --}}
            @yield("content")
        </main>

        {{-- Footer --}}
        {{-- @include('landing.partials.footer') --}}

        {{-- Script --}}
        @include("landing.partials.script")

        {{-- Additional Script --}}
        @yield("script")
    </body>
</html>
