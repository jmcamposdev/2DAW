import Input from "./input.class.js";

window.addEventListener("load", () => {
    const inputs = [];
    inputs.push(new Input("name", isValidName));
    inputs.push(new Input("age", isValidAge));
    inputs.push(new Input("genre", isValidGenre));
    inputs.push(new Input("telephone", isValidTelephone));
    inputs.push(new Input("country"));
    inputs.push(new Input("city")); // If the input does not have a validation function, it is not validated
    inputs.push(new Input("email", isValidEmail));
    inputs.push(new Input("password", isValidPassword))
    inputs.push(new Input("repeatPassword", isValidRepeatPassword));
    generateVerificationInput();
    inputs.push(new Input("verification", isValidVerificationCode));

    const form = document.getElementById("form");
    form.addEventListener("submit", (e) => {
        e.preventDefault();
        let isValidForm = true;
        inputs.forEach(input => {
            if (!input.isValid()) {
                input.setIsInvalid();
                isValidForm = false;
            } else {
                input.setIsValid();
            }
        });

        if (isValidForm) {
            alert("Form is valid")
        }
    });

    const resetButton = document.getElementById("reset");
    resetButton.addEventListener("click", () => {
        inputs.forEach(input => {
            input.reset();
        });
        generateVerificationInput();
    });

    const termsRadio = document.getElementById("terms");
    termsRadio.addEventListener("change", () => {
        if (termsRadio.checked) {
            document.querySelector("#form button[type=submit]").removeAttribute("disabled");
        } else {
            document.querySelector("#form button[type=submit]").setAttribute("disabled", "disabled");
        }
    });
});




function generateVerificationInput() {
    const code1 = generateRandomNumber(0, 9);
    const code2 = generateRandomNumber(0, 9);
    const code1Element = document.getElementById("code1");
    const code2Element = document.getElementById("code2");

    code1Element.textContent = code1;
    code2Element.textContent = code2;
}

function isValidVerificationCode(result) {
    const code1 = Number(document.getElementById("code1").textContent);
    const code2 = Number(document.getElementById("code2").textContent);
    return code1 + code2 === Number(result);
}

function generateRandomNumber(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
}

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
    const TELEPHONE_REGEX = /^((\+\d{2})|00\d{2})?\d{9}$/;
    return telephone.trim() !== "" && telephone.match(TELEPHONE_REGEX)
}

/**
 * Validate email with regex
 * @param email {string} email to validate
 * @returns {boolean} true if email is valid, false otherwise
 */
function isValidEmail(email) {
    const EMAIL_REGEX = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;
    return email.trim() !== "" && email.match(EMAIL_REGEX);
}

/**
 * Validate password with regex and length
 * The password must have at least 6 characters and maximum 15 characters
 * The password must have at least one uppercase letter
 * The password must have at least one lowercase letter
 * The password mast only have letters, numbers and underscore
 * @param password {string} password to validate
 * @returns {boolean} true if password is valid, false otherwise
 */
function isValidPassword(password) {
    let isValid = false;
    const PASSWORD_REGEX = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z0-9_]{6,15}$/;
    if (PASSWORD_REGEX.test(password) && password.length >= 6 && password.length <= 15) {
        isValid = true;
    }

    return isValid;
}

function isValidRepeatPassword(repeatPassword) {
    const password = document.getElementById("password").value;
    return password === repeatPassword && password.trim() !== "";
}
