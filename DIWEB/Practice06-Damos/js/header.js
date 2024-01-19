const header = document.getElementById('header');
// When the user scrolls down 200px from the top of the document, show the button
window.addEventListener('scroll', () => {
  if (window.scrollY > 30) {
    console.log("scrollY > 30");
    header.classList.remove("wow");
  }
  if (window.scrollY > 200) { // 200px from top
      // Show the header background
      header.classList.add('header--active');
  } else {
      // Change the background color of the header
      header.classList.remove('header--active');
  }
});