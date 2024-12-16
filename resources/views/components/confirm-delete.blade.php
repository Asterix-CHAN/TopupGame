<div 
    x-data="{ open: false }" 
    x-show="open"
    @confirm.window="
        Swal.fire({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.icon,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: event.detail.confirmButtonText,
            cancelButtonText: event.detail.cancelButtonText,
        }).then((result) => {
            if (result.isConfirmed) {
                $wire.deleteConfirmed(event.detail.id);
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                    'Cancelled',
                    'Your data is safe.',
                    'info'
                );
            }
        });
    "
></div>
