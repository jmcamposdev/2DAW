export default function navActive() {
  let section = document.querySelectorAll("section");
  let lists = document.querySelectorAll(".nav__item");
  function activeLink(li) {
    lists.forEach((item) => item.classList.remove("nav__item--active"));
    if (li) {
      li.classList.add("nav__item--active");
    }
  }

  lists.forEach((item) =>
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