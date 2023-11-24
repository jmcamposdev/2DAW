// Regex for telephone and email
const TELEPHONE_REGEX = /^((\+\d{2})|00\d{2})?\d{9}$/;
const EMAIL_REGEX = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;

// Get form
const form = document.getElementById("form");

// Get all inputs from form
const nameInput = document.getElementById("name");
const ageInput = document.getElementById("age");
const genreInput = document.getElementById("genre");
const telephoneInput = document.getElementById("telephone");
const emailInput = document.getElementById("email");

form.addEventListener("submit", (e) => {
    if (!customValidation()) {
        e.preventDefault()
        e.stopPropagation()
    }
})




function customValidation() {
    let isValidForm = true;

    // Validate that the name input is not empty and is a string
    if (isValidName(nameInput.value)) {
        addIsValidInput(nameInput); // Add is-valid class to input
    } else {
        addIsInvalidInput(nameInput); // Add is-invalid class to input
        isValidForm = false; // The form is not valid
    }


    // Validate that the age entered is not empty and that it is a number over 18 years old.
    if (isValidAge(ageInput.value)) {
        addIsValidInput(ageInput); // Add is-valid class to input
    } else {
        addIsInvalidInput(ageInput); // Add is-invalid class to input
        isValidForm = false;
    }

    // Validate that the genre is not empty and is a string
    if (isValidGenre(genreInput.value)) {
        addIsValidInput(genreInput); // Add is-valid class to input
    } else {
        addIsInvalidInput(genreInput); // Add is-invalid class to input
        isValidForm = false;
    }

    // Validate that the telephone is not empty and is a number
    if (isValidTelephone(telephoneInput.value)) {
        addIsValidInput(telephoneInput); // Add is-valid class to input
    } else {
        addIsInvalidInput(telephoneInput); // Add is-invalid class to input
        isValidForm = false;
    }

    // Validate that the email is not empty and is a valid email
    if (isValidEmail(emailInput.value)) {
        addIsValidInput(emailInput); // Add is-valid class to input
    } else {
        addIsInvalidInput(emailInput); // Add is-invalid class to input
        isValidForm = false;
    }

    return isValidForm;
}


// INPUTS EVENTS
// Add event listener to inputs to validate them
nameInput.addEventListener("keyup", () => {
    if (isValidName(nameInput.value)) {
        addIsValidInput(nameInput); // Add is-valid class to input
    } else {
        addIsInvalidInput(nameInput); // Add is-invalid class to input
    }
});

ageInput.addEventListener("keyup", () => {
    if (isValidAge(ageInput.value)) {
        addIsValidInput(ageInput); // Add is-valid class to input
    } else {
        addIsInvalidInput(ageInput); // Add is-invalid class to input
    }
});

genreInput.addEventListener("change", () => {
    if (isValidGenre(genreInput.value)) {
        addIsValidInput(genreInput); // Add is-valid class to input
    } else {
        addIsInvalidInput(genreInput); // Add is-invalid class to input
    }
});

telephoneInput.addEventListener("keyup", () => {
    if (isValidTelephone(telephoneInput.value)) {
        addIsValidInput(telephoneInput); // Add is-valid class to input
    } else {
        addIsInvalidInput(telephoneInput); // Add is-invalid class to input
    }
});

emailInput.addEventListener("keyup", () => {
    if (isValidEmail(emailInput.value)) {
        addIsValidInput(emailInput); // Add is-valid class to input
    } else {
        addIsInvalidInput(emailInput); // Add is-invalid class to input
    }
});


// ////////////////////////////////
// VALIDATION FUNCTIONS
// ////////////////////////////////

/**
 * Validate name is not empty and is a string
 * @param name {string} name to validate
 * @returns {boolean} true if name is valid, false otherwise
 */
function isValidName(name) {
    return name.trim() !== "" && isNaN(name);
}

/**
 * Validate age is not empty and is a number over 18 years old.
 * @param age {number} age to validate
 * @returns {boolean} true if age is valid, false otherwise
 */
function isValidAge(age) {
    return age.trim() !== "" && !isNaN(age) && age >= 18;
}

/**
 * Validate genre is not empty and is a string
 * @param genre {string} genre to validate
 * @returns {boolean} true if genre is valid, false otherwise
 */
function isValidGenre(genre) {
    return genre.trim() !== "" && isNaN(genre) &&  genre === "male" || genre === "female";
}

/**
 * Validate telephone with regex
 * @param telephone {string} telephone to validate
 * @returns {boolean} true if telephone is valid, false otherwise
 */
function isValidTelephone(telephone) {
    return telephone.trim() !== "" && telephone.match(TELEPHONE_REGEX)
}

/**
 * Validate email with regex
 * @param email {string} email to validate
 * @returns {boolean} true if email is valid, false otherwise
 */
function isValidEmail(email) {
    return email.trim() !== "" && email.match(EMAIL_REGEX);
}


// ////////////////////////////////
// INPUTS FUNCTIONS
// ////////////////////////////////

/**
 * Add is-valid class to input and remove is-invalid class
 * @param input {HTMLInputElement} input to add is-valid class
 */
function addIsValidInput(input) {
    input.classList.remove("is-invalid")
    input.classList.add("is-valid")
}

/**
 * Add is-invalid class to input and remove is-valid class
 * @param input {HTMLInputElement} input to add is-invalid class
 */
function addIsInvalidInput(input) {
    input.classList.remove("is-valid")
    input.classList.add("is-invalid")
}