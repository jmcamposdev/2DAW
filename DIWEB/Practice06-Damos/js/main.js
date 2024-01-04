import NavCollapse from "./navCollapse.js";

window.addEventListener('load', function() {
  // Create a new instance of NavCollapse class
  new NavCollapse("nav", "burger-nav-icon", ["cross-icon", "nav__item"]);
  imagesInit();
  gridInit();
});

/**
 * Initialize Isotope grid
 * @see https://isotope.metafizzy.co/
 * @see https://isotope.metafizzy.co/filtering.html
 */
function gridInit() {
  // Get items
  const items = document.querySelector('.articles__items');
  // Create grid
  const itemsGrid = new Isotope(items, {
    itemSelector: '.article',
    masonry: { // Set masonry layout
      fitWidth: true, // Set width to container
      gutter: 20 // Set gutter between items
    }
  })

  // Add event listener for filter
  const filters = document.querySelectorAll('.filter-articles__item');

  filters.forEach(filter => {
    filter.addEventListener('click', function() {
      const filterActiveItem = document.querySelector('.filter-articles__item.active');
      // Remove active class
      filterActiveItem.classList.remove('active');
      // Add active class
      this.classList.add('active');

      // Filter
      const filterValue = 
        this.getAttribute('data-filter') === "*" ?
        '' :
        `[data-filter="${this.getAttribute('data-filter')}"]`;
      console.log(filterValue);
      itemsGrid.arrange({ filter:  filterValue});
    });
  });


}

function imagesInit() {
  const images = document.querySelectorAll('.article__image');
  if (images.length) {
    images.forEach(image => {
      const imageItem = image.querySelector('img');
      const padding = imageItem.naturalHeight / imageItem.naturalWidth * 100;
      image.style.paddingBottom = `${padding}%`;
      imageItem.classList.add('init');
    });
  }
}