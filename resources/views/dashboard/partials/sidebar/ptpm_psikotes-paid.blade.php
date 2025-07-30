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

<!-- sidebar manage division  -->
<li class="my-5 rounded-lg p-2">
    <a href="{{ route('dashboard.tools.index') }}" class="{{ isRouteNameStartWith('dashboard.tools') }} flex flex-row items-center text-gray-700 duration-700 hover:text-primary">
        <i class="fi fi-br-database mr-2 text-lg text-gray-700"></i>
        <span class="ml-4 text-base font-bold leading-5">Alat Psikotes</span>
    </a>
</li>

<!-- sidebar manage division  -->
<li class="my-5 rounded-lg p-2">
    <a href="{{ route('dashboard.test-categories.index') }}" class="{{ isRouteNameStartWith('dashboard.test-categories') }} flex flex-row items-center text-gray-700 duration-700 hover:text-primary">
        <i class="bx bxs-purchase-tag mr-2 text-lg text-gray-700"></i>
        <span class="ml-4 text-base font-bold leading-5">Price List</span>
    </a>
</li>

<!-- sidebar manage division  -->
<li class="my-5 rounded-lg p-2">
    <a href="{{ route('dashboard.testimonial.index') }}" class="{{ isRouteNameStartWith('dashboard.testimonial') }} flex flex-row items-center text-gray-700 duration-700 hover:text-primary">
        <i class="fi fi-bs-feedback-alt mr-2 text-lg text-gray-700"></i>
        <span class="ml-4 text-base font-bold leading-5">Testimoni</span>
    </a>
</li>
