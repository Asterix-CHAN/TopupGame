const offcanvas = document.getElementById('offcanvas');
const openOffcanvasButton = document.getElementById('open-offcanvas');
const closeOffcanvasButton = document.getElementById('close-offcanvas');

openOffcanvasButton.addEventListener('click', () => {
    offcanvas.classList.remove('translate-y-full');
});

closeOffcanvasButton.addEventListener('click', () => {
    offcanvas.classList.add('translate-y-full');
});


const buttonBuy = document.querySelectorAll('.price-button');
const buyMobile = document.getElementById('buy-mobile');

buttonBuy.forEach(button => {
    button.addEventListener('click', () => {
        buyMobile.classList.remove('invisible');
    });
});