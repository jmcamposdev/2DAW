/**
 * Class that represents a person
 * Properties:
 * - name (String) - The name of the person
 * - surname (String) - The surname of the person
 * - genere (String) - The genere of the person (M or F)
 * - birthday (Date) - The birthday of the person
 */
class Person {
  // Private properties
  #dni
  #name;
  #surname;
  #genere;
  #birthday;
  /**
   * Create a new person
   * @param {String} name The name of the person
   * @param {String} surname The surname of the person
   * @param {String} genere The genere of the person (M or F)
   * @param {Date} birthday The birthday of the person
   * @throws {TypeError} If the name, surname, genere or birthday are not the correct type
   * @returns {Person} The new person
   */
  constructor(dni, name, surname, genere, birthday) {
    // Set the properties using the setters
    this.dni = dni;
    this.name = name;
    this.surname = surname;
    this.genere = genere;
    this.birthday = birthday;
  }

  /**
   * Returns the person's dni
   * @returns {String} The person's dni
   */
  get dni() {
    return this.#dni;
  }

  set dni(dni) {
    if (!Person.isValidDNI(dni)) {
      throw new TypeError("Dni must be a string or not empty and must be a valid dni");
    }
    this.#dni = dni; // If everything is ok, set the dni
  }

  /**
   * Returns the person's name
   * @returns {String} The person's name
   */
  get name() {
    return this.#name;
  }

  /**
   * Set the name of the person
   * @param {String} name The name of the person
   * @throws {TypeError} If the name is not a string or is empty or blank
   * @returns {void}
   */
  set name(name) {
    if (!Person.isValidString(name)) {
      throw new TypeError("Name must be a string or not empty");
    }
    this.#name = name; // If everything is ok, set the name
  }

  /**
   * Returns the person's surname
   * @returns {String} The person's surname
   */
  get surname() {
    return this.#surname;
  }

  /**
   * Set the surname of the person
   * @param {String} surname The surname of the person
   * @throws {TypeError} If the surname is not a string or is empty or blank
   * @returns {void}
   */
  set surname(surname) {
    if (!Person.isValidString(surname)) {
      throw new TypeError("Surname must be a string");
    }
    this.#surname = surname; // If everything is ok, set the surname
  }

  /**
   * Returns the person's genere (M or F)
   * @returns {String} The person's genere
   */
  get genere() {
    return this.#genere;
  }

  /**
   * Set the genere of the person
   * @param {String} genere The genere of the person (M or F)
   * @throws {TypeError} If the genere is not a string or is not M or F
   * @returns {void}
   */
  set genere(genere) {
    if (!Person.isValidGenere(genere)) {
      throw new TypeError("Genere must be a string and must be M or F");
    }
    this.#genere = genere; // If everything is ok, set the genere
  }

  /**
   * Returns the person's birthday
   * @returns {Date} The person's birthday
   */
  get birthday() {
    return this.#birthday;
  }

  /**
   * Set the birthday of the person
   * @param {Date} birthday The birthday of the person
   * @throws {TypeError} If the birthday is not a Date object or is not before the current date
   * @returns {void}
   */
  set birthday(birthday) {
    if (!Person.isValidBirthday(birthday)) {
      throw new TypeError("Birthday must be a Date object before the current date");
    }
    this.#birthday = birthday; // If everything is ok, set the birthday
  }

  /**
   * Returns the person's name, surname, genere and birthday
   * @returns {String} The person's name, surname, genere and birthday
   */
  toString() {
    return `${this.#dni} - ${this.#name} ${this.#surname} - (${this.#genere}) - ${this.#birthday.toLocaleDateString()}`;
  }

  // ///////////////////////////
  // STATIC VALIDATION METHODS
  // ///////////////////////////

  /**
   * Validate a string (not empty or blank)
   * @param {String} string The string to validate
   * @return {Boolean} True if the string is valid, false otherwise
   */
  static isValidString(string) {
    return typeof string === "string" && string.trim() !== "";
  }

  /**
   * Validate a genere (M or F)
   * @param {String} genere The genere to validate
   * @return {Boolean} True if the genere is valid, false otherwise
   */
  static isValidGenere(genere) {
    return (
      typeof genere === "string" && genere.length === 1 && "MF".includes(genere)
    );
  }

  /**
   * Validate a birthday (before the current date) 
   * @param {Date} birthday The birthday to validate
   * @return {Boolean} True if the birthday is valid, false otherwise
   */
  static isValidBirthday(birthday) {
    return (
      birthday instanceof Date &&
      birthday.getTime() < Date.now()
    );
  }

  /**
   * Validate a dni (not empty and valid dni)
   * @param {String} dni The dni to validate
   * @return {Boolean} True if the dni is valid, false otherwise
   */
  static isValidDNI(dni) {
    let valid = false;
    let dniNumber = dni.substring(0, dni.length - 1);
    let dniLetter = dni.substring(dni.length - 1, dni.length);
    let dniLetterCalc = dniNumber % 23;
    let letter = "TRWAGMYFPDXBNJZSQVHLCKET";
    letter = letter.substring(dniLetterCalc, dniLetterCalc + 1);
    if (letter === dniLetter.toUpperCase()) {
      valid = true;
    }
    return valid;
  }
}

export default Person;
