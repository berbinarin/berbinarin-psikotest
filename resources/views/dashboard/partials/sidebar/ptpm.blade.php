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
<li class="{{ isRouteNameStartWith("dashboard.registrants") }} my-5 rounded-lg p-2">
    <a href="{{ route("dashboard.registrants.index") }}" class="{{ Str::startsWith(Route::currentRouteName(), "dashboard.registrants") ? "text-white" : "text-gray-700 hover:text-primary" }} flex flex-row items-center duration-700">
        <i class="fi fi-br-ballot {{ Str::startsWith(Route::currentRouteName(), "dashboard.registrants") ? "text-white" : "text-gray-700" }} mr-2 text-lg"></i>
        <span class="ml-4 text-base font-bold leading-5">Data Pendaftar</span>
    </a>
</li>

<!-- sidebar manage division  -->
<li class="{{ isRouteNameStartWith("dashboard.tools") }} my-5 rounded-lg p-2">
    <a href="{{ route("dashboard.tools.index") }}" class="{{ Str::startsWith(Route::currentRouteName(), "dashboard.tools") ? "text-white" : "text-gray-700 hover:text-primary" }} flex flex-row items-center duration-700">
        <i class="fi fi-br-database {{ Str::startsWith(Route::currentRouteName(), "dashboard.tools") ? "text-white" : "text-gray-700" }} mr-2 text-lg"></i>
        <span class="ml-4 text-base font-bold leading-5">Data Test</span>
    </a>
</li>

<!-- sidebar manage division  -->
<li class="{{ isRouteNameStartWith("dashboard.test-categories") }} my-5 rounded-lg p-2">
    <a href="{{ route("dashboard.test-categories.index") }}" class="{{ Str::startsWith(Route::currentRouteName(), "dashboard.test-categories") ? "text-white" : "text-gray-700 hover:text-primary" }} flex flex-row items-center duration-700">
        <i class="bx bxs-purchase-tag {{ Str::startsWith(Route::currentRouteName(), "dashboard.test-categories") ? "text-white" : "text-gray-700" }} mr-2 text-lg"></i>
        <span class="ml-4 text-base font-bold leading-5">Price List</span>
    </a>
</li>

<!-- sidebar manage division  -->
<li class="{{ isRouteNameStartWith("dashboard.testimoni") }} my-5 rounded-lg p-2">
    <a href="{{ route("dashboard.testimoni.index") }}" class="{{ Str::startsWith(Route::currentRouteName(), "dashboard.testimoni") ? "text-white" : "text-gray-700 hover:text-primary" }} flex flex-row items-center duration-700">
        <i class="fi fi-bs-feedback-alt {{ Str::startsWith(Route::currentRouteName(), "dashboard.testimoni") ? "text-white" : "text-gray-700" }} mr-2 text-lg"></i>
        <span class="ml-4 text-base font-bold leading-5">Testimoni</span>
    </a>
</li>
