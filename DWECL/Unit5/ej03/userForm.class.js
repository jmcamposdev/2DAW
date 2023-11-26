/**
 * Class to manage the user form
 * @property {String} #formId - The id of the form
 * @property {HTMLElement} #formElement - The form element
 * @method setInputData - Set the data of the form inputs
 * @method setFormSubmitEvent - Set the submit event of the form
 * @method getFormData - Get the data of the form inputs
 * @method clearFormInputs - Clear the data of the form inputs
 * @throws {Error} - If the form id is not found
 */
export default class UserForm {
    #formId
    #formElement

    /**
     * Create a UserForm object
     * @param {String} formId - The id of the form
     */
    constructor(formId) {
        this.#formId = formId; // Set the form id
        this.#formElement = document.getElementById(this.#formId); // Get the form element
        if (this.#formElement === null) { // If the form element is null throw an error
            throw Error("Don't exits any form with the id provided")
        }
    }

    /**
     * Set the data of the form inputs passed as parameter using destructuring
     * @param {Object} param0 - The data of the form inputs 
     */
    setInputData({firstName, lastName, age}) {
        // Get the inputs
        const firstNameInput = this.#formElement.querySelector('#firstNameInput');
        const lastNameInput = this.#formElement.querySelector('#lastNameInput');
        const ageInput = this.#formElement.querySelector('#ageInput');
        // Set the inputs values
        firstNameInput.value = firstName;
        lastNameInput.value = lastName;
        ageInput.value = age;
    }

    /**
     * Set the submit event of the form
     * @param {Function} callback - The callback function to execute when the form is submitted
     */
    setFormSubmitEvent(callback) {
        this.#formElement.addEventListener("submit", callback);
    }

    /**
     * Get the data of the form inputs
     * @returns {Object} - The data of the form inputs
     */
    getFormData() {
        // Create the object to return
        const formData = {};
        // Get the inputs
        const inputs = this.#formElement.querySelectorAll("input");
        // Iterate the inputs and add the data to the object
        inputs.forEach(input => {
            // Get the type of the input
            const type = input.getAttribute("data-type");
            // Add the data to the object
            formData[type] = input.value;
        })

        return formData;
    }

    /**
     * Clear the data of the form inputs
     */
    clearFormInputs() {
        // Get the inputs
        const inputs = this.#formElement.querySelectorAll("input");
        // Iterate the inputs and clear the data
        inputs.forEach(input => {
            input.value = "";
        })
    }


}