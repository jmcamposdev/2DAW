/**
 * Represent a slider
 * @class Slider
 */
export default class Slider {
    // Private properties
    #slider // The slider element
    #slidesContainer // The container of the slides
    #slides // The slides
    #autoPlayDelay; // The delay of the auto play

    /**
     * Create a slider
     * @param sliderClass The class of the slider
     * @param autoPlayDelay The delay of the autoplay
     */
    constructor(sliderClass, autoPlayDelay = null) {
        // Set the autoplay delay
        this.#autoPlayDelay = autoPlayDelay;

        // Set the slider
        this.#slider = document.getElementsByClassName(sliderClass)[0];
        // Check if the slider exists if not throw an error
        if (this.#slider === undefined) {
            throw Error("Don't exist any slider")
        }
        // Set the slides container and the slides
        this.#slidesContainer = this.#slider.querySelector(".slider-slides");
        this.#slides = this.#slidesContainer.querySelectorAll(".slider-slide");


        // Set the Window event to resize the slides
        this.setWindowEvent();
        // Set the slides width
        this.setSlidesContainerWidth(this.#slider.offsetWidth);
        this.setSlidesWidth(this.#slider.offsetWidth);
        // Set the arrows events
        this.setArrowsEvents();
        // Set the autoplay
        this.setAutoPlay();
    }

    /**
     * Set the window event to resize the slides when the window is resized
     */
    setWindowEvent() {
        window.addEventListener("resize" , (e) => {
            this.setSlidesWidth(this.#slider.offsetWidth);
            this.setSlidesContainerWidth(this.#slider.offsetWidth)
        })
    }

    /**
     * Set the width of the slides
     * @param width The width of the slides
     */
    setSlidesWidth(width) {
        this.#slides.forEach(slide => {
            slide.style.width = width + "px"
        })
    }

    /**
     * Set the width of the slides container
     * @param windowsWidth
     */
    setSlidesContainerWidth(windowsWidth) {
        this.#slidesContainer.style.width = (windowsWidth * this.#slides.length) + "px"
    }

    /**
     * Set the arrows events to pass the slides
     */
    setArrowsEvents() {
        // The regex to get the number of the translateX in the transform
        const transformRegex = /\d+/
        // Get the arrows
        const rightArrow = this.#slider.querySelector(".slider__arrow--right");
        const leftArrow = this.#slider.querySelector(".slider__arrow--left");

        // Set the events to the arrows when the user click on the arrows
        rightArrow.addEventListener("click", () => {
            this.passSlideToRight()
        })

        leftArrow.addEventListener("click", () => {
            this.passSlideToLeft();
        })
    }

    /**
     * Pass the slide to the right
     */
    passSlideToRight() {
        // The regex to get the number of the translateX in the transform
        const transformRegex = /\d+/

        // The translate pixel to pass the slide
        let translatePixel = this.#slider.offsetWidth;

        // Get the current translate of the slides container
        const currentTranslate = Number((this.#slidesContainer.style.transform.match(transformRegex) || [0])[0]);
        // Get the max translate width
        const maxTranslateWidth = (this.#slides.length-1) * this.#slider.offsetWidth;
        // If the current translate is the max translate width set the translate pixel to 0
        if (currentTranslate === maxTranslateWidth) {
            translatePixel = 0;
        } else { // If the current translate is not the max translate width
            translatePixel += currentTranslate;
        }

        // Set the translate of the slides container
        this.#slidesContainer.style.transform = `translateX(-${translatePixel}px)`;
    }

    /**
     * Pass the slide to the left
     */
    passSlideToLeft() {
        // The regex to get the number of the translateX in the transform
        const transformRegex = /\d+/

        // The translate pixel to pass the slide
        let translatePixel = this.#slider.offsetWidth;
        // Get the current translate of the slides container
        const currentTranslate = Number((this.#slidesContainer.style.transform.match(transformRegex) || [0])[0]);
        // Get the max translate width
        const maxTranslateWidth = (this.#slides.length-1) * this.#slider.offsetWidth;
        // If the current translate is 0 set the translate pixel to the max translate width
        if (currentTranslate === 0) { // Si esta en la primera
            translatePixel = maxTranslateWidth;
        } else { // If the current translate is not 0
            translatePixel -= currentTranslate;
        }
        // Set the translate of the slides container
        this.#slidesContainer.style.transform = `translateX(-${Math.abs(translatePixel)}px)`;
    }

    /**
     * Set the autoplay of the slider with the delay and when the mouse is over the slider stop the autoplay
     */
    setAutoPlay() {
        if (this.#autoPlayDelay === null) {
            return;
        }
        // The function to pass the slide to the right
        const autoPlayIntervalFunction = () => {this.passSlideToRight()}
        // Set the autoplay interval
        let autoPlayInterval = setInterval(autoPlayIntervalFunction, this.#autoPlayDelay);
        // Set the events to the slider when the mouse is over the slider stop the autoplay clear the interval
        this.#slider.addEventListener("mouseover", () => {
            clearInterval(autoPlayInterval);
        })
        // Set the events to the slider when the mouse is out of the slider start the autoplay
        this.#slider.addEventListener("mouseout", () => {
            autoPlayInterval = setInterval(autoPlayIntervalFunction, this.#autoPlayDelay);
        })
    }
}