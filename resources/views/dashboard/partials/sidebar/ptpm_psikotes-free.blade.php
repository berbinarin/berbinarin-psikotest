@php
    if (! function_exists("isRouteNameStartWith")) {
        function isRouteNameStartWith($routeName)
        {
            return Str::startsWith(Route::currentRouteName(), $routeName)
                ? "rounded-xl bg-[#3986A3]"
                : "";
        }
    }
@endphp

<!-- sidebar keluarga berbinar  -->
<li class="{{ isRouteNameStartWith('dashboard.free-profiles.data') }} my-5 rounded-lg p-2">
    <a href="{{ route('dashboard.free-profiles.data.show') }}" class="{{ Str::startsWith(Route::currentRouteName(), 'dashboard.free-profiles.data') ? 'text-white' : 'text-gray-700 hover:text-primary' }} flex flex-row items-center duration-700">
        <i class="fi fi-br-ballot {{ Str::startsWith(Route::currentRouteName(), 'dashboard.free-profiles.data') ? 'text-white' : 'text-gray-700' }} mr-2 text-lg"></i>
        <span class="ml-4 text-base font-bold leading-5">Data</span>
    </a>
</li>
