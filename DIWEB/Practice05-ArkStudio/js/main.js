import accordion from "./accordion.js";
import NavCollapse from "./navCollapse.js";
import Slider from "./slider.js";

window.addEventListener('load', function() {
  new Slider("slider");
  new NavCollapse("nav", "burger-nav-icon", ["cross-icon", "nav__item"]);
  accordion();
});