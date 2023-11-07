import Student from "../ej02/student.js";

export default class Students { 
  #studentsList;

  constructor() {
    this.#studentsList = [];
  }

  /**
   * Get a deep copy of the students list
   * @returns {Array} A deep copy of the students list
   */
  get studentsList() {
    const copy = []; // Create a new set
    // Add a deep copy of each student to the new set
    this.#studentsList.forEach(student => copy.push(Student.deepCopy(student)));
    return copy; // Return the new set
  }

  /**
   * Add a student to the students list
   * @param {Student} student The student to add
   * @throws {TypeError} If the student is not a Student object
   * @returns {void}
   */
  addStudent(student) {
    if (!(student instanceof Student)) {
      throw new TypeError("Student must be a Student object");
    } 
    this.#studentsList.push(student);
  }

  /**
   * Find a student by dni using sequential search if isn't found returns null
   * @param {String} dni The dni to search
   * @return {Student} The student found or null if isn't found
   */
  searchByDNISecuencial(dni) {
    let isFound = false;
    let studentFound = null;
    console.time("Secuencial");
    for (const student of this.#studentsList) {
      if (student.dni === dni) {
        isFound = true;
        studentFound = Student.deepCopy(student);
        break;
      }
    }
    console.timeEnd("Secuencial");
    return studentFound;
  }

  searchByDNIBinary(dni) {
    //console.time("Binary");
    let studentsArray = this.#studentsList;
    studentsArray.sort(Student.compareDNI);
    let isFound = false;
    let studentFound = null;
    let min = 0;
    let max = studentsArray.length - 1;
    let middle = Math.floor((max + min) / 2);
    console.time("Binary");
    while (min <= max && !isFound) {
      if (studentsArray[middle].dni === dni) {
        isFound = true;
        studentFound = Student.deepCopy(studentsArray[middle]);
      } else if (Students.compareDNIString(studentsArray[middle].dni, dni) < 0) {
        min = middle + 1;
      } else {
        max = middle - 1;
      }
      middle = Math.floor((max + min) / 2);
    }
    console.timeEnd("Binary");
    return studentFound;
  }

  static compareDNIString (dni1, dni2) {
    const dni1Numbers = parseInt(dni1.slice(0, -1));
    const dni2Numbers = parseInt(dni2.slice(0, -1));

    return dni1Numbers - dni2Numbers;
  }




  // //////////////////////////
  // COMPARISON METHODS
  // //////////////////////////

  /**
   * Use it with .sort() to sort the students by dni
   * @param {Student} a The first student to compare
   * @param {Student} b The second student to compare
   * @return {Number} A negative number if a < b, a positive number if a > b, 0 if a == b
   */
  static compareDNI(a,b) {
    const dniANumbers = parseInt(a.dni.slice(0, -1));
    const dniBNumbers = parseInt(b.dni.slice(0, -1));

    return dniANumbers - dniBNumbers;
  }

  /**
   * Use it with .sort() to sort the students by Birthday
   * @param {Student} a The first student to compare
   * @param {Student} b The second student to compare
   * @return {Number} A negative number if a < b, a positive number if a > b, 0 if a == b
   */
  static compareBirthday(a,b) {
    return a.birthday.getTime() - b.birthday.getTime();
  }

  /**
   * Use it with .sort() to sort the students by average grade
   * @param {Student} a The first student to compare
   * @param {Student} b The second student to compare
   * @return {Number} A negative number if a < b, a positive number if a > b, 0 if a == b
   */
  static compareAverageGrade(a,b) {
    return a.calculateAverageGrade() - b.calculateAverageGrade();
  }
}