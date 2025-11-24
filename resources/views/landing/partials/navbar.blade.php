@php
    // Desktop
    if (! function_exists("isNavbarActive")) {
        function isNavbarActive($routeName)
        {
            return Str::startsWith(Route::currentRouteName(), $routeName)
                ? "border-b-2 border-[#3886A3] font-semibold text-[#3886A3]"
                : "font-semibold text-gray-600";
        }
    }

    // Mobile
    if (! function_exists("isNavbarActiveMobile")) {
        function isNavbarActiveMobile($routeName)
        {
            return Str::startsWith(Route::currentRouteName(), $routeName)
                ? "block py-4 text-2xl font-medium text-[#3886A3]"
                : "block py-4 text-2xl font-medium text-gray-600";
        }
    }
@endphp

<!-- Navbar -->
<nav class="fixed left-0 right-0 top-0 z-30 mx-14 mt-7 flex items-center rounded-3xl bg-white bg-opacity-90 px-4 py-2.5 shadow-md backdrop-blur-sm max-sm:mx-4 max-sm:px-4 max-sm:py-2">
    <!-- Logo -->
    <div class="flex items-center">
        <img src="{{ asset("assets/landing/logo/logo-berbinar.webp") }}" alt="Logo" class="h-12 w-auto max-sm:h-8" />
    </div>

    <!-- Burger Menu -->
    <div class="ml-auto flex md:hidden">
        <button id="burgerMenu" class="text-[#3986A3] focus:outline-none">
            <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                <line x1="4" y1="6" x2="20" y2="6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <line x1="4" y1="12" x2="20" y2="12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <line x1="4" y1="18" x2="20" y2="18" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
    </div>

    <!-- Navigasi Link -->
    <div id="navLinks" class="ml-auto hidden items-center space-x-14 max-lg:space-x-7 md:flex">
        <a href="https://berbinar.in/" class="{{ isNavbarActive("product") }}">Beranda</a>
        <a href="https://berbinar.in/tentang-kami" class="{{ isNavbarActive("about-us") }}">Tentang Kami</a>
        <a href="https://berbinar.in/produk" class="border-b-2 border-[#3886A3] font-semibold text-[#3886A3]">Produk</a>
        <a href="https://berbinar.in/karier" class="{{ isNavbarActive("career") }}">Karier</a>
        <a href="https://berbinar.in/arteri" class="{{ isNavbarActive("arteri") }}">ArteRi</a>
        <div>
            <a href="https://linktr.ee/berbinarinsight" target="_blank">
                <button class="rounded-full bg-gradient-to-r from-[#F7B23B] to-[#AD7D29] px-6 py-2 font-medium text-black">Ajukan Kolaborasi</button>
            </a>
        </div>
    </div>
</nav>

<!-- Screen Mobile Menu -->
<div id="mobileMenu" class="fixed inset-0 z-40 flex hidden flex-col items-center justify-center bg-white bg-opacity-90">
    <a href="" class="{{ isNavbarActiveMobile("home") }}">Beranda</a>
    <a href="" class="{{ isNavbarActiveMobile("about-us") }}">Tentang Kami</a>
    <a href="" class="{{ isNavbarActiveMobile("product") }}">Produk</a>
    <a href="" class="{{ isNavbarActiveMobile("career") }}">Karier</a>
    <a href="" class="{{ isNavbarActiveMobile("arteri") }}">ArteRi</a>
    <a href="https://linktr.ee/berbinarinsight" target="_blank">
        <button class="mt-8 rounded-full bg-gradient-to-r from-[#F7B23B] to-[#AD7D29] px-6 py-2 font-medium text-black">Ajukan Kolaborasi</button>
    </a>
    <button id="closeMenu" class="absolute right-4 top-4 text-gray-600 focus:outline-none">
        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>
</div>

<script>
    document.getElementById('burgerMenu').addEventListener('click', function () {
        const mobileMenu = document.getElementById('mobileMenu');
        mobileMenu.classList.remove('hidden');
    });

    document.getElementById('closeMenu').addEventListener('click', function () {
        const mobileMenu = document.getElementById('mobileMenu');
        mobileMenu.classList.add('hidden');
    });
</script>
