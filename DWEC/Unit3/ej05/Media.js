export default class Media {
  // Private properties
  #title // The title of the media
  #borrowed // If the media is borrowed
  #ratings // List of ratings

  constructor (title) {
    // Set the properties using the setters
    this.title = title;
    this.#borrowed = false;
    this.#ratings = [];
  }

  /**
   * Returns the media's title
   * @returns {String} The media's title
   */
  get title() {
    return this.#title;
  }

  /**
   * Set the title of the media
   * @param {String} title The title of the media
   * @throws {TypeError} If the title is not a string or is empty or blank
   */
  set title(title) {
    if (!Media.isValidString(title)) {
      throw new TypeError("Title must be a string");
    }
    this.#title = title; // If everything is ok, set the title
  }

  /**
   * Returns the media's borrowed
   * @returns {Boolean} The media's borrowed
   */
  get borrowed() {
    return this.#borrowed;
  }

  /**
   * Set the borrowed of the media
   * @param {Boolean} borrowed The borrowed of the media
   * @throws {TypeError} If the borrowed is not a boolean
   */
  changeBorrowedStage(borrowed) {
    if (typeof borrowed !== "boolean") {
      throw new TypeError("Borrowed must be a boolean");
    }
    this.#borrowed = borrowed; // If everything is ok, set the borrowed
  }

  /**
   * Returns the media's ratings
   * @returns {Array} The media's ratings
   */
  getMediaRatings() {
    return this.#ratings.slice();
  }

  /**
   * Add a rating to the media
   * @param {Number} rating The rating to add between 0 and 10
   * @throws {TypeError} If the rating is not a number or is not between 0 and 10
   */
  addRating(rating) {
    if (!Media.isValidNumber(rating) || rating < 0 || rating > 10) {
      throw new TypeError("Rating must be a number between 0 and 10");
    }
    this.#ratings.push(rating);
  }

  
  // ///////////////////
  // VALIDATION METHODS
  // ///////////////////

  /**
   * Validate a string (not empty or blank)
   * @param {String} string The string to validate
   * @return {Boolean} True if the string is valid, false otherwise
   */
  static isValidString(string) {
    return typeof string === "string" && string.trim() !== "";
  }

  /**
   * Validate a number (not NaN)
   * @param {Number} number The number to validate
   * @return {Boolean} True if the number is valid, false otherwise
   */
  static isValidNumber(number) {
    return typeof number === "number" && !isNaN(number);
  }

  toString() {
    return `Title: ${this.title}\nBorrowed: ${this.borrowed ? "Yes" : "No"}\nRatings: ${this.#ratings.length > 0 ? this.#ratings.join(", ") : "No ratings"}`;
  }

}