// Charge the accordion when the page is loaded
window.addEventListener('load', function() {
  accordion();
});


/**
 * Add event listener to all accordion items
 */
function accordion() {
  const accordionItems = document.querySelectorAll('.faq__item');
  accordionItems.forEach(item => {

    item.addEventListener('click', () => {
      // Get the open item
      const openItem = document.querySelector('.faq__item--open');
      // If there is an open item close it
      if (openItem && openItem !== item) {
        openItem.querySelector('.faq__item--open .faq__text').style.height = 0;
        openItem.classList.remove('faq__item--open');
      }

      // If the item is already open close it
      if (item.classList.contains('faq__item--open')) {
        item.querySelector('.faq__text').style.height = 0;
        item.classList.remove('faq__item--open');
      } else {
        // Open the item
        item.querySelector('.faq__text').style.height =  (item.querySelector('.faq__text').scrollHeight + 14) + 'px';
        item.classList.add('faq__item--open');
      }
    });
  });
}