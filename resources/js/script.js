// Navbar/Header
window.onscroll = function () {
    const header = document.querySelector('header');
    const fixedNav = header.offsetTop;
    if (window.pageYOffset > fixedNav) {
        header.classList.add("navbar-fixed");
    } else {
        header.classList.remove('navbar-fixed');
    }

};


// Mobile Nav
const bgOffcanvas = document.querySelector('.background-offcanvas');
const mobileNav = document.querySelector('.mnav');
const openBtn = document.querySelector('#hamburger');
const closeBtn = document.querySelector('.btnNav');
const navOpenClass = 'left-0';
const bgOff = 'hidden';

function toggleNav() {
    mobileNav.classList.toggle(navOpenClass);
    bgOffcanvas.classList.toggle(bgOff);
}
openBtn.addEventListener('click', toggleNav);
closeBtn.addEventListener('click', toggleNav);

// Filter game.html
const btnFilter = document.querySelector('#filter-btn');
const filter = document.querySelector('#filterNav');
const closeFilter = document.querySelector('#close-btn-filter');
const filterSwap = '-left-full';
function toggleFilter(){
   filter.classList.toggle(filterSwap);
}
btnFilter.addEventListener('click', toggleFilter);
closeFilter.addEventListener('click', toggleFilter);


