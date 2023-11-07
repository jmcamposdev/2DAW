import Student from "./student.js";
import Students from "./students.js";


const LETTERS = "TRWAGMYFPDXBNJZSQVHLCKE"; // Letters of the DNI
const NUM_STUDENTS = 30; // Number of students to generate
const MODULE_NAMES = ["Math", "Science", "History", "English", "Art", "Music", "Physical Education"];
  const MIN_GRADE = 0;
  const MAX_GRADE = 10;

function generateRandomDNI() {
  let dni = "";
  for (let i = 0; i < 8; i++) {
    dni += Math.floor(Math.random() * 10);
  }
  let letterIndex = parseInt(dni) % 23;
  dni += LETTERS.charAt(letterIndex);
  return dni;
}


function generateRandomModules() {
  const allModules = MODULE_NAMES.map(name => ({ name, grade: 0 }));
  allModules.forEach((module) => {
    module.grade = Math.floor(Math.random() * (MAX_GRADE - MIN_GRADE + 1)) + MIN_GRADE;
  });
  return allModules;
}

let students = [];
for (let i = 0; i < NUM_STUDENTS; i++) {
  let dni = generateRandomDNI();
  let student = new Student(dni, "Name" + i, "Surname" + i, "M", new Date(2004-i, 1, 1));
  let numModules = Math.random() < 0.5 ? 1 : 5;
  let studentModules = generateRandomModules(numModules);
  studentModules.forEach((module) => {
    student.addModule(module.name, module.grade);
  });
  students.push(student);
}

let studentsList = new Students();
students.forEach((student) => {
  studentsList.addStudent(student);
});

// //////////////////////////
// TEST
// //////////////////////////

console.log(`// //////////////////////////\n// SORTED BY DNI\n// //////////////////////////`);
console.log(studentsList.studentsList.sort(Students.compareDNI));

console.log(`// //////////////////////////\n// SORTED BY BIRTHDAY\n// //////////////////////////`);
console.log(studentsList.studentsList.sort(Students.compareBirthday));

console.log(`// //////////////////////////\n// SORTED BY GRADE AVERAGE\n// //////////////////////////`);
console.log(studentsList.studentsList.sort(Students.compareAverageGrade));


export {generateRandomDNI, generateRandomModules};


