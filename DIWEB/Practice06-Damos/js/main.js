import NavCollapse from "./navCollapse.js";

window.addEventListener('load', function() {
  // Create a new instance of NavCollapse class
  new NavCollapse("nav", "burger-nav-icon", ["cross-icon", "nav__item"]);
  imagesInit();
  gridInit();
});

/**
 * Initialize Isotope grid
 */
function gridInit() {
  // Init Isotope
  const items = document.querySelector('.articles__items');
  const itemsGrid = new Isotope(items, {
    itemSelector: '.article',
    masonry: {
      fitWidth: true,
      gutter: 20
    }
  })

  // Add event listener for filter
  const filters = document.querySelectorAll('.filter-articles__item');

  // Add event listener for each filter
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