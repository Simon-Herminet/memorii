const menuBurger = document.querySelector('.menu-burger');
const navLinks = document.getElementById("navNav");

menuBurger.addEventListener('click', () => {
    navLinks.style.display = navLinks.style.display === 'flex' ? 'none' : 'flex';
});

// Vérifier la taille de l'écran lors du chargement de la page
window.addEventListener('load', () => {
    if (window.innerWidth < 768) {
        navLinks.style.display = 'none';
    } else {
        navLinks.style.display = 'flex';
    }
});

// Vérifier la taille de l'écran lors du redimensionnement de la fenêtre
window.addEventListener('resize', () => {
    if (window.innerWidth < 768) {
        navLinks.style.display = 'none';
    } else {
        navLinks.style.display = 'flex';
    }
});