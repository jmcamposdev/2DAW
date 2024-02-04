import {generateRandomDNI, generateRandomModules} from '../ej02/test.js';
import Students from "../ej03/students.js";
import Student from "../ej02/student.js";

const NUM_STUDENTS = 30000; // Number of students to generate

let students = [];
for (let i = 0; i < NUM_STUDENTS; i++) {
  let dni = generateRandomDNI();
  let student = new Student(dni, "Name" + i, "Surname" + i, "M", new Date(1950, 1, 1));
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
const studentListDNISorted = studentsList.studentsList.sort(Students.compareDNI);
const biggestDNI = studentListDNISorted[studentListDNISorted.length - 1].dni;
const smallestDNI = studentListDNISorted[0].dni;

// Tomando el Mayor DNI 
console.log("Mayor DNI");
// Suele rondar los 1000 ms
studentsList.searchByDNISecuencial(biggestDNI);
// Suele rondar los 163 ms sin contar el tiempo de ordenación contando el tiempo de ordenación suele rondar los 2500ms
studentsList.searchByDNIBinary(biggestDNI);
console.log("Menor DNI");
// Tomando el menor DNI
// Suele rondar los 12 ms
studentsList.searchByDNISecuencial(smallestDNI);
// Suele rondar los 160 ms
studentsList.searchByDNIBinary(smallestDNI);

// En general la búsqueda del DNI mayor suele ser más rápida la binaria que la secuencial, en cambio,
//  la búsqueda del DNI menor suele ser más rápida la secuencial que la binaria
// porque la secuencial en la primera iteración lo encuentra, en cambio, la binaria no.