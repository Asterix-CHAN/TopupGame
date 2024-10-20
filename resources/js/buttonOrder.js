const offcanvas = document.getElementById('offcanvas');
const openOffcanvasButton = document.getElementById('open-offcanvas');
const closeOffcanvasButton = document.getElementById('close-offcanvas');

openOffcanvasButton.addEventListener('click', () => {
    offcanvas.classList.remove('translate-y-full');
});

closeOffcanvasButton.addEventListener('click', () => {
    offcanvas.classList.add('translate-y-full');
});


const buttonBuy = document.querySelectorAll('#btn-buy-1, #btn-buy-2, #btn-buy-3');
const buyMobile = document.getElementById('buy-mobile');

buttonBuy.forEach(button => {
    button.addEventListener('click', () => {
        buyMobile.classList.remove('invisible');
    });
});