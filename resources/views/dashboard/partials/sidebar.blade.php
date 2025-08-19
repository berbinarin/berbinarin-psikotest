<nav class="flex w-56 flex-col items-center bg-white py-8 pl-10 pr-6">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.6.0/uicons-thin-rounded/css/uicons-thin-rounded.css" />
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-rounded/css/uicons-bold-rounded.css" />
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-rounded/css/uicons-bold-rounded.css" />
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-straight/css/uicons-bold-straight.css" />
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css" />
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css" />
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />

    {{-- LOGO BERBINAR --}}
    <div>
        <img src="{{ asset("/assets/dashboard/images/logo/logo-berbinar.png") }}" alt="Logo Berbinar Insightful Indonesia" title="Logo Berbinar Insightful Indonesia" class="w-14" />
    </div>

    @php
        $role = Auth()
            ->user()
            ->getRoleNames()
            ->first();

        if (! function_exists("isRouteActive")) {
            function isRouteActive($routePattern)
            {
                return request()->is($routePattern) ? "rounded-xl bg-[#3986A3]" : "";
            }
        }
    @endphp

    {{-- LIST MENU --}}
    <ul class="mt-10 text-gray-700 dark:text-gray-400">
        <!-- Dashboard Link -->
        <li class="{{ isRouteActive("dashboard") }} mt-1 rounded-lg p-2">
            <a href="{{ route("dashboard.index") }}" class="{{ request()->is("dashboard") ? "text-white" : "text-gray-700 hover:text-primary" }} flex flex-row items-center duration-700">
                <i class="bx bx-category {{ request()->is("dashboard") ? "text-white" : "text-gray-700" }} mr-2 text-xl"></i>
                <span class="ml-4 text-lg font-bold leading-5">Dashboard</span>
            </a>
        </li>

        @if (View::exists("dashboard.partials.sidebar." . $role))
            @include("dashboard.partials.sidebar." . $role)
        @else
            <p>Menu belum tersedia untuk role ini.</p>
        @endif

        <li class="mt-20 rounded-lg p-2">
            <form id="logout-form" action="{{ route("auth.logout") }}" method="POST">
                @csrf
                <button type="button" id="logout-button" class="fixed bottom-5 left-14 items-center gap-2 rounded-full bg-blue-500 px-6 py-2 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                    <i class="bx bx-log-out text-lg"></i>
                    <span class="text-center text-base">Keluar</span>
                </button>
            </form>
        </li>
    </ul>
</nav>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById("logout-button").addEventListener("click", function () {
        Swal.fire({
            title: 'Apakah Anda yakin ingin keluar?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Keluar',
            cancelButtonText: 'Batal',
            customClass: {
                popup: 'rounded-xl px-6 pt-6 pb-6',
                confirmButton: 'mt-4 rounded-md bg-[#3986A3] px-6 py-2 text-[15px] font-extrabold text-white',
                cancelButton: 'mt-4 rounded-md bg-gray-400 px-6 py-2 text-[15px] font-semibold text-white'
            },
            reverseButtons: true,
            backdrop: 'rgba(0,0,0,0.5)',
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("logout-form").submit();
            }
        });
    });
</script>
