import Media from "./Media.js";

export default class Movie extends Media {
  #director; // The director of the movie
  #duration; // The duration of the movie

  constructor(title, director, duration) {
    super(title);
    this.director = director;
    this.duration = duration;
  }

  /**
   * Returns the movie's director
   * @returns {String} The movie's director
   */
  get director() {
    return this.#director;
  }

  /**
   * Set the director of the movie
   * @param {String} director The director of the movie
   * @throws {TypeError} If the director is not a string or is empty or blank
   */
  set director(director) {
    if (!Media.isValidString(director)) {
      throw new TypeError("Director must be a string");
    }
    this.#director = director; // If everything is ok, set the director
  }

  /**
   * Returns the movie's duration
   * @returns {Number} The movie's duration
   */
  get duration() {
    return this.#duration;
  }

  /**
   * Set the duration of the movie
   * @param {Number} duration The duration of the movie
   * @throws {TypeError} If the duration is not a number or is not positive
   */
  set duration(duration) {
    if (!Media.isValidNumber(duration)) {
      throw new TypeError("Duration must be a number");
    }
    this.#duration = duration; // If everything is ok, set the duration
  }

  toString() {
    return `${super.toString()}\nDirector: ${this.director}\nDuration: ${this.duration}`;
  }
}