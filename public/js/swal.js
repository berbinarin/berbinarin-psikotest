// Success Alert
function showSuccess(message = "Berhasil!", title = "Sukses") {
    Swal.fire({
        title: title,
        text: message,
        imageUrl: "/assets/dashboard/images/success.png",
        imageWidth: 83,
        imageHeight: 83,
        confirmButtonText: "OK",
        confirmButtonColor: "#16a34a", // hijau (Tailwind green-600)
        customClass: {
            popup: "rounded-2xl shadow-lg",
            title: "text-xl font-bold text-green-600",
            confirmButton: "rounded-lg px-5 py-2 text-white",
        },
    });
}

// Error Alert
function showError(message = "Terjadi kesalahan!", title = "Error") {
    Swal.fire({
        title: title,
        text: message,
        imageUrl: "/assets/dashboard/images/error.png",
        imageWidth: 83,
        imageHeight: 83,
        confirmButtonText: "OK",
        confirmButtonColor: "#dc2626", // merah (Tailwind red-600)
        customClass: {
            popup: "rounded-2xl shadow-lg",
            title: "text-xl font-bold text-red-600",
            confirmButton: "rounded-lg px-5 py-2 text-white",
        },
    });
}

// Confirm Alert
function showConfirm(message = "Apakah kamu yakin?", title = "Konfirmasi", callback = null) {
    Swal.fire({
        title: title,
        text: message,
        imageUrl: "/assets/dashboard/images/warning.png",
        imageWidth: 83,
        imageHeight: 83,
        showCancelButton: true,
        confirmButtonText: "Ya",
        cancelButtonText: "Batal",
        confirmButtonColor: "#0284c7", // biru (Tailwind cyan-700)
        cancelButtonColor: "#6b7280", // abu (Tailwind gray-500)
        customClass: {
            popup: "rounded-2xl shadow-lg",
            title: "text-xl font-bold text-cyan-700",
            confirmButton: "rounded-lg px-5 py-2 text-white",
            cancelButton: "rounded-lg px-5 py-2 text-white",
        },
    }).then((result) => {
        if (result.isConfirmed && typeof callback === "function") {
            callback();
        }
    });
}
