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

<!-- Registrant Profiles  -->
<li class="{{ isRouteNameStartWith("dashboard.registrants") }} my-5 rounded-lg p-2">
    <a href="{{ route("dashboard.registrants.index") }}" class="{{ Str::startsWith(Route::currentRouteName(), "dashboard.registrants") ? "text-white" : "text-gray-700 hover:text-primary" }} flex flex-row items-center duration-700">
        <i class="fi fi-br-ballot {{ Str::startsWith(Route::currentRouteName(), "dashboard.registrants") ? "text-white" : "text-gray-700" }} mr-2 text-lg"></i>
        <span class="ml-4 text-base font-bold leading-5">Data Pendaftar</span>
    </a>
</li>

<!-- Tools  -->
<li class="{{ isRouteNameStartWith("dashboard.tools") }} my-5 rounded-lg p-2">
    <a href="{{ route("dashboard.tools.index") }}" class="{{ Str::startsWith(Route::currentRouteName(), "dashboard.tools") ? "text-white" : "text-gray-700 hover:text-primary" }} flex flex-row items-center duration-700">
        <i class="fi fi-br-database {{ Str::startsWith(Route::currentRouteName(), "dashboard.tools") ? "text-white" : "text-gray-700" }} mr-2 text-lg"></i>
        <span class="ml-4 text-base font-bold leading-5">Data Tes</span>
    </a>
</li>

<!-- Price Lists  -->
<li class="{{ isRouteNameStartWith("dashboard.price-list.") }} my-5 rounded-lg p-2">
    <a href="{{ route("dashboard.price-list.test-category.index") }}" class="{{ Str::startsWith(Route::currentRouteName(), "dashboard.price-list") ? "text-white" : "text-gray-700 hover:text-primary" }} flex flex-row items-center duration-700">
        <i class="bx bxs-purchase-tag {{ Str::startsWith(Route::currentRouteName(), "dashboard.price-list") ? "text-white" : "text-gray-700" }} mr-2 text-lg"></i>
        <span class="ml-4 text-base font-bold leading-5">Daftar Harga</span>
    </a>
</li>

<!-- Testimonials  -->
<li class="{{ isRouteNameStartWith("dashboard.testimonial") }} my-5 rounded-lg p-2">
    <a href="{{ route("dashboard.testimonial.index") }}" class="{{ Str::startsWith(Route::currentRouteName(), "dashboard.testimoni") ? "text-white" : "text-gray-700 hover:text-primary" }} flex flex-row items-center duration-700">
        <i class="fi fi-bs-feedback-alt {{ Str::startsWith(Route::currentRouteName(), "dashboard.testimoni") ? "text-white" : "text-gray-700" }} mr-2 text-lg"></i>
        <span class="ml-4 text-base font-bold leading-5">Testimoni</span>
    </a>
</li>

{{-- Voucher Codes --}}
<li class="{{ isRouteNameStartWith("dashboard.voucher-code") }} my-5 rounded-lg p-2">
    <a href="{{ route("dashboard.voucher-code.index") }}" class="{{ Str::startsWith(Route::currentRouteName(), "dashboard.voucher-code") ? "text-white" : "text-gray-700 hover:text-primary" }} flex flex-row items-center duration-700">
        <i class="bx bxs-purchase-tag {{ Str::startsWith(Route::currentRouteName(), "dashboard.voucher-code") ? "text-white" : "text-gray-700" }} mr-2 text-lg"></i>
        <span class="ml-4 text-base font-bold leading-5">Kode Voucher</span>
    </a>
</li>

{{-- Checkpoints --}}
<li class="{{ isRouteNameStartWith("dashboard.checkpoint") }} my-5 rounded-lg p-2">
    <a href="{{ route("dashboard.checkpoint.index") }}" class="{{ Str::startsWith(Route::currentRouteName(), "dashboard.checkpoint") ? "text-white" : "text-gray-700 hover:text-primary" }} flex flex-row items-center duration-700">
        <i class="bx bx-book {{ Str::startsWith(Route::currentRouteName(), "dashboard.checkpoint") ? "text-white" : "text-gray-700" }} mr-2 text-lg"></i>
        <span class="ml-4 text-base font-bold leading-5">Checkpoint</span>
    </a>
</li>
