const btnLogout = document.querySelector(".btnLogout-popup");
const logoutPopup = document.getElementById("logoutPopup");
const confirmLogout = document.getElementById("confirmLogout");
const cancelLogout = document.getElementById("cancelLogout");
const aboutLink = document.querySelector('.navigation a[href="#About"]');
const aboutPopup = document.querySelector(".about-popup");
const iconCloseAbout = document.querySelector(".icon-close-about");
const contactLink = document.querySelector('.navigation a[href="#Contact"]');
const contactPopup = document.querySelector(".contact-popup");
const iconCloseContact = document.querySelector(".icon-close-contact");

btnLogout.addEventListener("click", (e) => {
    e.preventDefault(); // Previene el comportamiento predeterminado
    logoutPopup.style.display = 'block'; // Muestra el pop-up
});


aboutLink.addEventListener("click", () => {
    aboutPopup.classList.add("active");
});

iconCloseAbout.addEventListener("click", () => {
    aboutPopup.classList.remove("active");
});

contactLink.addEventListener("click", () => {
    contactPopup.classList.add("active");
});

iconCloseContact.addEventListener("click", () => {
    contactPopup.classList.remove("active");
});

confirmLogout.addEventListener("click", () => {
    window.location.href = "../index.html"; // Redirige al directorio raíz
});


cancelLogout.addEventListener("click", () => {
    logoutPopup.style.display = 'none'; // Ocultar el pop-up
});