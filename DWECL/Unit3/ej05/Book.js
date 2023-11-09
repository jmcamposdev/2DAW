import Media from "./Media.js";

export default class Book extends Media {
  #author; // The author of the book
  #pages; // The number of pages of the book

  constructor(title, author, pages) {
    super(title);
    this.author = author;
    this.pages = pages;
  }

  /**
   * Returns the book's author
   * @returns {String} The book's author
   */
  get author() {
    return this.#author;
  }

  /**
   * Set the author of the book
   * @param {String} author The author of the book
   * @throws {TypeError} If the author is not a string or is empty or blank
   */
  set author(author) {
    if (!Media.isValidString(author)) {
      throw new TypeError("Author must be a string");
    }
    this.#author = author; // If everything is ok, set the author
  }

  /**
   * Returns the book's pages
   * @returns {Number} The book's pages
   */
  get pages() {
    return this.#pages;
  }

  /**
   * Set the pages of the book
   * @param {Number} pages The pages of the book
   * @throws {TypeError} If the pages is not a number or is not positive
   */
  set pages(pages) {
    if (!Media.isValidNumber(pages)) {
      throw new TypeError("Pages must be a number");
    }
    this.#pages = pages; // If everything is ok, set the pages
  }

  toString() {
    return `${super.toString()}\nAuthor: ${this.author}\nPages: ${this.pages}`;
  }
}