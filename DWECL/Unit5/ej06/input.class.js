export default class Input {
    #inputId;
    #inputElement;
    #validateFunction;

    /**
     * Create a new Input instance
     * @param inputId {string} id of the input
     * @param validateFunction {function} function to validate the input value
     */
    constructor(inputId, validateFunction = () => true) {
        this.#inputId = inputId;
        this.#inputElement = document.getElementById(this.#inputId);
        this.#validateFunction = validateFunction;
        // Validate if the input exists
        if (!this.#inputElement) {
            throw new Error(`The input with id ${this.#inputId} does not exist`)
        }

        // Add event listener to the input
        this.inputFocusOutEvent();
    }

    /**
     * Add event listener to the input to validate it when the user leaves the input
     */
    inputFocusOutEvent() {
        this.#inputElement.addEventListener("focusout", () => {
            if (this.isValid()) {
                this.setIsValid(); // Add is-valid class to input
            } else {
                this.setIsInvalid(); // Add is-invalid class to input
            }
        });
    }

    /**
     * Validate the input value
     * @returns {boolean} True if the input value is valid, false otherwise
     */
    isValid() {
        return this.#validateFunction(this.#inputElement.value);
    }

    /**
     * Add is-valid class to input and remove is-invalid class
     * @param input {HTMLInputElement} input to add is-valid class
     */
    setIsValid() {
        this.#inputElement.classList.remove("is-invalid")
        this.#inputElement.classList.add("is-valid")
    }

    /**
     * Add is-invalid class to input and remove is-valid class
     * @param input {HTMLInputElement} input to add is-invalid class
     */
    setIsInvalid() {
        this.#inputElement.classList.remove("is-valid")
        this.#inputElement.classList.add("is-invalid")
    }


    /**
     * Reset the input
     */
    reset() {
        this.#inputElement.value = "";
        this.#inputElement.classList.remove("is-valid");
        this.#inputElement.classList.remove("is-invalid");
    }

}