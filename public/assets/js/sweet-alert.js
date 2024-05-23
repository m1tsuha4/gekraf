// sweet-alert.js
document.querySelectorAll('[data-confirm-delete="true"]').forEach((button) => {
    button.addEventListener("click", function (event) {
        event.preventDefault();

        Swal.fire({
            title: "Konfirmasi Hapus",
            text: "Anda yakin ingin menghapus data ini?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText:
                '{{ env("SWEET_ALERT_CONFIRM_DELETE_CONFIRM_BUTTON_TEXT", "Hapus Data") }}',
            cancelButtonText:
                '{{ env("SWEET_ALERT_CONFIRM_DELETE_CANCEL_BUTTON_TEXT", "Kembali") }}',
            showCancelButton:
                '{{ env("SWEET_ALERT_CONFIRM_DELETE_SHOW_CANCEL_BUTTON", "true") }}',
            showCloseButton:
                '{{ env("SWEET_ALERT_CONFIRM_DELETE_SHOW_CLOSE_BUTTON", "false") }}',
            icon: '{{ env("SWEET_ALERT_CONFIRM_DELETE_ICON", "warning") }}',
            showLoaderOnConfirm:
                '{{ env("SWEET_ALERT_CONFIRM_DELETE_SHOW_LOADER_ON_CONFIRM", "true") }}',
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika pengguna mengklik 'Hapus', lakukan pengiriman form ke URL delete
                const url = button.getAttribute(
                    "localhost:8000/admin-kategori"
                );
                if (url) {
                    window.location.href = url;
                }
            }
        });
    });
});
