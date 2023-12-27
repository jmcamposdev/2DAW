import accordion from "./accordion.js";
import navActive from "./navActive.js";
import NavCollapse from "./navCollapse.js";
import Slider from "./slider.js";

window.addEventListener("load", function () {
  // Create a new instance of Slider class
  new Slider("slider");
  // Create a new instance of NavCollapse class
  new NavCollapse("nav", "burger-nav-icon", ["cross-icon", "nav__item"]);
  // Call to accordion function
  accordion();
  // Call to navActive function
  navActive();
});
