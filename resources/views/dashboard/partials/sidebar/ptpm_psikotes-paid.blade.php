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
        <span class="ml-4 text-base font-bold leading-5">Data Tes</span>
    </a>
</li>

<!-- sidebar manage division  -->
<li class="{{ isRouteNameStartWith("dashboard.price-list.") }} my-5 rounded-lg p-2">
    <a href="{{ route("dashboard.price-list.test-category.index") }}" class="{{ Str::startsWith(Route::currentRouteName(), "dashboard.price-list") ? "text-white" : "text-gray-700 hover:text-primary" }} flex flex-row items-center duration-700">
        <i class="bx bxs-purchase-tag {{ Str::startsWith(Route::currentRouteName(), "dashboard.price-list") ? "text-white" : "text-gray-700" }} mr-2 text-lg"></i>
        <span class="ml-4 text-base font-bold leading-5">Daftar Harga</span>
    </a>
</li>

<!-- sidebar manage division  -->
<li class="{{ isRouteNameStartWith("dashboard.testimonial") }} my-5 rounded-lg p-2">
    <a href="{{ route("dashboard.testimonial.index") }}" class="{{ Str::startsWith(Route::currentRouteName(), "dashboard.testimoni") ? "text-white" : "text-gray-700 hover:text-primary" }} flex flex-row items-center duration-700">
        <i class="fi fi-bs-feedback-alt {{ Str::startsWith(Route::currentRouteName(), "dashboard.testimoni") ? "text-white" : "text-gray-700" }} mr-2 text-lg"></i>
        <span class="ml-4 text-base font-bold leading-5">Testimoni</span>
    </a>
</li>

<li class="{{ isRouteNameStartWith("dashboard.kode_voucher") }} my-5 rounded-lg p-2">
    <a href="{{ route("dashboard.kode_voucher.index") }}" class="{{ Str::startsWith(Route::currentRouteName(), "dashboard.kode_voucher") ? "text-white" : "text-gray-700 hover:text-primary" }} flex flex-row items-center duration-700">
        <i class="bx bxs-purchase-tag {{ Str::startsWith(Route::currentRouteName(), "dashboard.kode_voucher") ? "text-white" : "text-gray-700" }} mr-2 text-lg"></i>
        <span class="ml-4 text-base font-bold leading-5">Kode Voucher</span>
    </a>
</li>

<li class="{{ isRouteNameStartWith("dashboard.checkpoint") }} my-5 rounded-lg p-2">
    <a href="{{ route("dashboard.checkpoint.index") }}" class="{{ Str::startsWith(Route::currentRouteName(), "dashboard.checkpoint") ? "text-white" : "text-gray-700 hover:text-primary" }} flex flex-row items-center duration-700">
        <i class="bx bx-book {{ Str::startsWith(Route::currentRouteName(), "dashboard.checkpoint") ? "text-white" : "text-gray-700" }} mr-2 text-lg"></i>
        <span class="ml-4 text-base font-bold leading-5">Respon</span>
    </a>
</li>
