const nav = document.getElementById('nav'); // Get the nav element
const crossNavIcon = document.getElementById('cross-nav-icon'); // Get the cross icon
const burgerNavIcon = document.getElementById('burger-nav-icon'); // Get the burger icon

// Add event listeners to the icons
burgerNavIcon.addEventListener('click', () => nav.classList.toggle('nav-active'));
crossNavIcon.addEventListener('click', () => nav.classList.toggle('nav-active'));