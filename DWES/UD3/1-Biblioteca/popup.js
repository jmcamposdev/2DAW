const crossIcon = document.querySelector('.close__button');
const popup = document.querySelector('.popup__container');

if (popup) {
  crossIcon.addEventListener('click', () => {
    popup.classList.toggle('popup__container--active');
  });
}
