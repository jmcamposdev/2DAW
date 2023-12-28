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

  window.onscroll = () => {
    section.forEach((sec) => {
      let top = window.scrollY;
      let offset = sec.offsetTop;
      let height = sec.offsetHeight;
      let id = sec.dataset.id;

      if (top >= offset && top < offset + height) {
        const target = document.querySelector(`a[href='#${id}']`);
        if (target) {
          activeLink(target.parentElement);
        } else {
          activeLink();
        }
      }
    });
  };
}