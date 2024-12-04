<div 
    x-data="{ open: false }" 
    x-show="open"
    @sweet-alert.window="
        Swal.fire({
            title: event.detail.title,
            icon: event.detail.icon 
            })
    "
>
</div>

