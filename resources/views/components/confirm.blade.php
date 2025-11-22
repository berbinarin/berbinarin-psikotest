<!-- Confirmation Modal -->
<div id="{{ $type === "delete" ? "deleteModal" : "logoutModal" }}" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black/40">
    <div
        class="relative w-[560px] rounded-[20px] bg-white p-6 font-plusJakartaSans shadow-lg"
        style="
            background:
                linear-gradient(to right, #74aabf, #3986a3) top/100% 6px no-repeat,
                white;
            border-radius: 20px;
            background-clip: padding-box, border-box;
        "
    >
        <!-- Warning Icon -->
        <img src="{{ asset("/assets/dashboard/images/warning.webp") }}" alt="Warning Icon" class="mx-auto h-[83px] w-[83px]" />

        <!-- Title -->
        <h2 class="mt-4 text-center font-plusJakartaSans text-2xl font-bold text-stone-900">
            {{ $type === "delete" ? "Konfirmasi Hapus Data" : "Konfirmasi Logout" }}
        </h2>

        <!-- Message -->
        <p class="mt-2 text-center text-base font-medium text-black">
            {{
                $type === "delete" ? "Apakah Anda yakin ingin menghapus data ini?" : "Apakah Anda yakin ingin keluar dari akun?"
            }}
        </p>

        <!-- Actions -->
        <div class="mt-6 flex justify-center gap-3">
            <button type="button" id="{{ $type === "delete" ? "cancelDelete" : "cancelLogout" }}" class="rounded-lg border border-stone-300 px-[62px] py-[6px] text-stone-700">Tidak</button>
            <button type="button" id="{{ $type === "delete" ? "confirmDelete" : "confirmLogout" }}" class="rounded-[5px] bg-gradient-to-r from-[#74AABF] to-[#3986A3] px-[62px] py-[6px] font-medium text-white">Ya</button>
        </div>
    </div>
</div>

<script>
    function showLogoutConfirm() {
        document.getElementById("logoutModal").classList.remove("hidden");
    }

    document.getElementById("cancelLogout")?.addEventListener("click", function () {
        document.getElementById("logoutModal").classList.add("hidden");
    });

    document.getElementById("confirmLogout")?.addEventListener("click", function () {
        document.getElementById("logout-form").submit();
    });
</script>

