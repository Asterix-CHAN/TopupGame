import './bootstrap';

// import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
import focus from '@alpinejs/focus';
import Swal from 'sweetalert2'

// Tambahkan plugin ke instans global Alpine
Alpine.plugin(focus);
Alpine.plugin(collapse);

// window.Alpine = Alpine;
window.Swal = Swal;
// // Mulai Alpine.js
// Alpine.start();

window.addEventListener('confirmAlert',(e) => {
    Swal.fire({
        title: e.detail.title,
        text: e.detail.text,
        icon: e.detail.type,
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: e.detail.confirmButtonText,
        cancelButtonText: e.detail.cancelButtonText
      }).then((result) => {
        if (result.isConfirmed) {
                Livewire.dispatch('delete', e.detail.id); 
        }
      });
});







