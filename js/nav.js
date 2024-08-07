let menu = document.querySelector("#menu-btn");
let nav = document.querySelector("nav");
menu.addEventListener('click', function () {
    menu.classList.toggle("fa-xmark");
    nav.classList.toggle("show");
});