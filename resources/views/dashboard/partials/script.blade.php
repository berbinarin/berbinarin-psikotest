@vite("resources/js/app.js")

<script src="{{ asset("assets/dashboard/js/jquery.js") }}"></script>
<script src="{{ asset("assets/dashboard/js/jquery.datables.min.js") }}"></script>

{{-- Sweetalert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    let successMessage = @json(session('success'));
    let errorMessage = @json(session('error'));

    if (successMessage) {
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: successMessage,
            showConfirmButton: false,
            timer: 3000
        });
    }

    if (errorMessage) {
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            title: errorMessage,
            showConfirmButton: false,
            timer: 3000
        });
    }
</script>

<script>
    document.querySelectorAll('.delete-button').forEach((button) => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const formId = this.getAttribute('data-id');
            Swal.fire({
                title: 'Hapus Data',
                text: 'Apakah anda yakin menghapusnya?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm-' + formId).submit();
                    // Swal.fire({
                    //     title: 'Terhapus',
                    //     text: 'Data responden telah dihapus',
                    //     icon: 'success',
                    //     confirmButtonColor: '#3085d6',
                    //     confirmButtonText: 'Oke',
                    // });
                }
            });
        });
    });
</script>
