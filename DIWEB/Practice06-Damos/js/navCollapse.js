export default class NavCollapse {
  constructor(navId, burgerId, closeId) {
      this.nav = document.getElementById(navId)
      this.burger = document.getElementById(burgerId)

      // Add events
      this.burger.addEventListener('click', () => this.collapse())

      // Add events to close elements
      closeId.forEach(id => {
          const close = document.querySelectorAll(`.${id}`)
          close.forEach(element => {
              element.addEventListener('click', () => this.collapse())
          })
      })
  }

  collapse() {
      this.nav.classList.toggle('nav-active')
  }
}