@php
    if (! function_exists("isRouteNameStartWith")) {
        function isRouteNameStartWith($routeName)
        {
            return Str::startsWith(Route::currentRouteName(), $routeName) ? "text-primary" : "";
        }
    }
@endphp

<!-- sidebar keluarga berbinar  -->
<li class="my-5 rounded-lg p-2">
    <a href="{{ route('dashboard.registrants.index') }}" class="{{ isRouteNameStartWith('dashboard.registrants') }} flex flex-row items-center text-gray-700 duration-700 hover:text-primary">
        <i class="fi fi-br-ballot mr-2 text-lg text-gray-700"></i>
        <span class="ml-4 text-base font-bold leading-5">Data Pendaftar</span>
    </a>
</li>
