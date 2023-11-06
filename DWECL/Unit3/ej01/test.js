import Person from "./Person.js";
import Student from "./Student.js";


const person = new Person('Jose', 'Campos', 'M', new Date(1990, 2, 20));

// Change the name
person.name = 'Pepe';
console.log(`Name Change from Jose to Pepe, current name: ${person.name}`); // Jane

// Change the surname
person.surname = 'Trujillo';
console.log(`Change of Surname from Campos to Trujillo, current: ${person.surname}`); // Doe

// Change the genre
person.genre = 'F';
console.log(`Change of gender from M to F, current: ${person.genre}`); // F

// Change the birthday
person.birthday = new Date(2004, 1, 4);
console.log(`Cambio de Cumpleaños del 20/3/1990 al 4/2/2004, actual: ${person.birthday.toLocaleDateString()}`); 

// Print the person
console.log(`All data: ${person.toString()}`); // Jane Doe (F, 29 years)

// //////////////////////////////////////////////////////////
// Student Test
// //////////////////////////////////////////////////////////
console.log("//////////////////////////////");
console.log("Student Test");
console.log("//////////////////////////////");
// Create a student
const student = new Student('Jose', 'Campos', 'M', new Date(1990, 2, 20));

// Add a modules
student.addModule('Maths', 7);
student.addModule('English', 5);
student.addModule('Science', 8);
student.addModule('History', 6);

// Print the student
console.log(`Actual student:\n${student.toString()}`); // Jane Doe (F, 29 years)

// Print the grade of a module
console.log("The grade of Match is: " + student.getGrade('Maths')); // 7

// Print the average grade
console.log("The average grade is: " + student.calculateAverageGrade()); // 6.5

// Update the grade of a module
console.log("Update the Math grade to 9");
student.updateGrade('Maths', 9);

// Print the grade of a module
console.log("The grade of Match is: " + student.getGrade('Maths')); // 9

// Change the name
student.name = 'Ana';
console.log(`Name Change from Jose to Ana, current name: ${student.name}`); // Jane

// Change the surname
student.surname = 'Perez';
console.log(`Change of Surname from Campos to Perez, current: ${student.surname}`); // Trujillo

// Change the genre
student.genre = 'F';
console.log(`Change of gender from M to F, current: ${student.genre}`); // F

// Change the birthday
student.birthday = new Date(2004, 1, 4);
console.log(`Cambio de Cumpleaños del 20/3/1990 al 4/2/2004, actual: ${student.birthday.toLocaleDateString()}`); 

// Print the student
console.log(`Final Data:\n${student.toString()}`); // Jane Doe (F, 29 years)
