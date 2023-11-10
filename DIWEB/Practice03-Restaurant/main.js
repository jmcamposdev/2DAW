// Get the scroll button
const scrollBtn = document.querySelector('.scrollBtn');

// When the user scrolls down 200px from the top of the document, show the button
window.addEventListener('scroll', () => {
    if (window.scrollY > 200) { // 200px from top
        // Add the class active to the scroll button
        scrollBtn.classList.add('scrollBtn--active');
        // Remove the class inactive from the scroll button
        scrollBtn.classList.remove('scrollBtn--inactive');
        // Set aria-hidden to false
        scrollBtn.setAttribute('aria-hidden', 'false');
    } else {
        // Add the class inactive to the scroll button
        scrollBtn.classList.add('scrollBtn--inactive');
        //
        scrollBtn.classList.remove('scrollBtn--active');
    }

    // When the animation ends, toggle aria-hidden
    scrollBtn.addEventListener("animationend", () => {
        const ariaStatus = scrollBtn.getAttribute('aria-hidden');
        scrollBtn.setAttribute('aria-hidden', !ariaStatus);
    });
});


const nav = document.getElementsByClassName('header__nav')[0]; // Get the nav element
const crossNavIcon = document.getElementById('cross-nav-icon'); // Get the cross icon
const burgerNavIcon = document.getElementById('burger-nav-icon'); // Get the burger icon

// Add event listeners to the icons
burgerNavIcon.addEventListener('click', () => nav.classList.toggle('nav-active'));
crossNavIcon.addEventListener('click', () => nav.classList.toggle('nav-active'));