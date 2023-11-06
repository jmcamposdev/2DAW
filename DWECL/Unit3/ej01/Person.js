/**
 * Class that represents a person
 * Properties:
 * - name (String) - The name of the person
 * - surname (String) - The surname of the person
 * - genre (String) - The genre of the person (M or F)
 * - birthday (Date) - The birthday of the person
 */
class Person {
  // Private properties
  // I use the # symbol to indicate that the property is private instead of the _ symbol because the # is real private
  // and you can't access it from outside the class, while the _ is just a convention and you can access it from outside
  #name;
  #surname;
  #genre;
  #birthday;
  /**
   * Create a new person
   * @param {String} name The name of the person
   * @param {String} surname The surname of the person
   * @param {String} genre The genre of the person (M or F)
   * @param {Date} birthday The birthday of the person
   * @throws {TypeError} If the name, surname, genre or birthday are not the correct type
   * @returns {Person} The new person
   */
  constructor(name, surname, genre, birthday) {
    // Set the properties using the setters
    this.name = name;
    this.surname = surname;
    this.genre = genre;
    this.birthday = birthday;
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
   * Returns the person's genre (M or F)
   * @returns {String} The person's genre
   */
  get genre() {
    return this.#genre;
  }

  /**
   * Set the genre of the person
   * @param {String} genre The genre of the person (M or F)
   * @throws {TypeError} If the genre is not a string or is not M or F
   * @returns {void}
   */
  set genre(genre) {
    if (!Person.isValidGenre(genre)) {
      throw new TypeError("genre must be a string and must be M or F");
    }
    this.#genre = genre; // If everything is ok, set the genre
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
   * Returns the person's name, surname, genre and birthday
   * @returns {String} The person's name, surname, genre and birthday
   */
  toString() {
    return `${this.#name} ${this.#surname} - (${this.#genre}) - ${this.#birthday.toLocaleDateString()}`;
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
   * Validate a genre (M or F)
   * @param {String} genre The genre to validate
   * @return {Boolean} True if the genre is valid, false otherwise
   */
  static isValidGenre(genre) {
    return (
      typeof genre === "string" && genre.length === 1 && "MF".includes(genre)
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
}

export default Person;
