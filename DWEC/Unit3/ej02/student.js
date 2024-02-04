import Person from './person.js';
export default class Student extends Person {
  // Private properties
  #listModules;

  /**
   * Create a student
   * @param {String} name The name of the student
   * @param {String} surname The surname of the student
   * @param {String} genere The genere of the student (M or F)
   * @param {Date} birthday The birthday of the student
   * @throws {TypeError} If the name, surname, genere or birthday is not a string, string, string or Date object
   * @returns {Student} The new student
   */
  constructor (dni, name, surname, genere, birthday) {
    super(dni, name, surname, genere, birthday);
    // Create an empty map - Key: name of the module, Value: grade of the module
    this.#listModules = new Map(); 
  }

  /**
   * Add a module to the student
   * @param {String} name The name of the module
   * @param {Number} grade The grade of the module
   * @throws {TypeError} If the name is not a string or the grade is not a number
   * @throws {RangeError} If the name is empty or blank
   * @throws {RangeError} If the grade is not between 0 and 10
   * @throws {RangeError} If the student already has this module
   */
  addModule (name, grade) {
    if (!Person.isValidString(name)) { // If the name is not valid
      throw new TypeError('Name must be a string or not empty')
    } else if (!this.#isValidGrade(grade)) { // If the grade is not valid
      throw new TypeError('Grade must be a number between 0 and 10')
    } else if (this.#listModules.has(name)) { // If the student already has this module
      throw new RangeError('Student already has this module')
    }

    // If everything is ok, add the module
    this.#listModules.set(name, grade);
  }

  /**
   * Get the grade of a module
   * @param {String} name The name of the module
   * @throws {TypeError} If the name is not a string or is empty or blank
   * @throws {RangeError} If the student doesn't have this module
   * @returns The grade of the module
   */
  getGrade (name) {
    if (!Person.isValidString(name)) { // If the name is not valid
      throw new TypeError('Name must be a string or not empty')
    } else if (!this.#listModules.has(name)) { // If the student doesn't have this module
      throw new RangeError('Student doesn\'t have this module')
    }

    // If everything is ok, return the grade
    return this.#listModules.get(name);
  }

  /**
   * Update the grade of a module 
   * @param {String} name The name of the module
   * @param {Number} grade The new grade of the module
   * @throws {TypeError} If the name is not a string or the grade is not a number
   * @throws {RangeError} If the student doesn't have this module
   */
  updateGrade (name, grade) {
    if (!Person.isValidString(name)) { // If the name is not valid
      throw new TypeError('Name must be a string or not empty')
    } else if (!this.#isValidGrade(grade)) { // If the grade is not valid
      throw new TypeError('Grade must be a number between 0 and 10')
    } else if (!this.#listModules.has(name)) { // If the student doesn't have this module
      throw new RangeError('Student doesn\'t have this module')
    }

    // If everything is ok, update the grade
    this.#listModules.set(name, grade);
  }

  /**
   * Calculate the average grade of all the modules of the student
   * @returns {Number} The average grade of the student
   */
  calculateAverageGrade () {
    let sum = 0;
    this.#listModules.forEach((grade) => {
      sum += grade;
    });
    // If the student doesn't have modules, return 0 (to avoid NaN)
    return this.#listModules.size === 0 ? 0 : (sum / this.#listModules.size);
  }

  /**
   * Print the student
   * @returns {String} The student as a string
   */
  toString () {
    let result = super.toString() + '\n';
    if (this.#listModules.size === 0) {
      result += 'No modules';
    } else {
      this.#listModules.forEach((grade, name) => {
        result += `${name}: ${grade}\n`;
      });
    }
    return result;
  }

  equals(student) {
    return this.dni === student.dni;
  }

  /**
   * Get a deep copy of the student
   * @param {Student} student The student to copy
   * @return {Student} A deep copy of the student
   */
  static deepCopy(student) {
    // Create a new student with the same data
    let newStudent = new Student(student.dni, student.name, student.surname, student.genere, student.birthday);
    // Add all the modules to the new
    student.#listModules.forEach((grade, name) => {
      newStudent.addModule(name, grade);
    });
    return newStudent;
  }

  // ///////////////////////////////////////////
  // Validations
  // ///////////////////////////////////////////

  /**
   * Check if the grade is valid (between 0 and 10)
   * @param {Number} grade The grade to check
   * @return {Boolean} True if the grade is valid, false otherwise
   */
  #isValidGrade (grade) {
    return typeof grade === 'number' && grade >= 0 && grade <= 10;
  }



}