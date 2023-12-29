export default function navActive() {
  // Get all sections
  let section = document.querySelectorAll("section");
  // Get all list items
  let lists = document.querySelectorAll(".nav__item");
  /**
   * Add active class to the list item
   * @param {HTMLLIElement} li The list item to be active
   */
  function activeLink(li) {
    // Remove active class from all list items
    lists.forEach((item) => item.classList.remove("nav__item--active"));
    // Add active class to the list item
    if (li) {
      li.classList.add("nav__item--active");
    }
  }

  // Add click event to all list items
  lists.forEach((item) =>
    // Call to activeLink function
    item.addEventListener("click", function () {
      activeLink(this);
    })
  );

  /**
   * Add active class to the list item when the section is in the viewport
   */
  window.onscroll = () => {
    // Get the current scroll position
    section.forEach((sec) => {
      // Get the top offset of the section
      let top = window.scrollY;
      let offset = sec.offsetTop;
      let height = sec.offsetHeight;
      let id = sec.dataset.id;

      // Check if the section is in the viewport
      if (top >= offset && top < offset + height) {
        const target = document.querySelector(`a[href='#${id}']`);
        if (target) {
          // Call to activeLink function
          activeLink(target.parentElement);
        } else {
          // Call to activeLink function
          activeLink();
        }
      }
    });
  };
}