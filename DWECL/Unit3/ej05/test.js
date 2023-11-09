import Book from "./Book.js";
import Movie from "./Movie.js";
// /////////////////////
// Books Tests
// /////////////////////

// Create a new book
let book = new Book("El Quijote", "Miguel de Cervantes", 2000);
console.log(book.toString());

// Change the book's title
book.title = "El Quijote de la Mancha";
console.log(`Changed title: ${book.title}`);

// Change the book's author
book.author = "Miguel de Cervantes Saavedra";
console.log(`Changed author: ${book.author}`);

// Change the book's pages
book.pages = 3000;
console.log(`Changed pages: ${book.pages}`);

// Change Borrowed status
book.changeBorrowedStage(true)
console.log(`Changed borrowed: ${book.borrowed}`);

// Add a rating
book.addRating(5);
book.addRating(10);
book.addRating(7);
console.log(`Ratings: ${book.getMediaRatings()}`);

// Show all the book's info
console.log(book.toString());

// /////////////////////
// Movie Tests
// /////////////////////

// Create a new movie
console.log("///////////////////////////\n Movie Tests\n///////////////////////////");
let movie = new Movie("El Padrino", "Francis Ford Coppola", 175);
console.log(movie.toString());

// Change the movie's title
movie.title = "El Padrino I";
console.log(`Changed title: ${movie.title}`);

// Change the movie's director
movie.director = "Francis Ford Coppola";
console.log(`Changed director: ${movie.director}`);

// Change the movie's duration
movie.duration = 180;
console.log(`Changed duration: ${movie.duration}`);

// Change Borrowed status
movie.changeBorrowedStage(true)
console.log(`Changed borrowed: ${movie.borrowed}`);

// Add a rating
movie.addRating(5);
movie.addRating(10);
movie.addRating(7);
console.log(`Ratings: ${movie.getMediaRatings()}`);

// Show all the movie's info
console.log(movie.toString());


