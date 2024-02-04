window.onload = function() {
  // Get the buttons 
  const getDogButton = document.getElementById('get-dog-button');
  const getCatButton = document.getElementById('get-cat-button');

  // Add the event listeners to show the images
  getDogButton.addEventListener('click', displayDogImage);
  getCatButton.addEventListener('click', displayGatImage);

  // Show the images when the page is loaded
  displayDogImage();
  displayGatImage();
};

/**
 * Shows the loading image
 * @param {HTMLImageElement} image the image to show the loading
 */
function showImageLoading(image) {
  image.src = 'img/loading.gif';
}

/**
 * Removes the loading image
 * @param {HTMLImageElement} image the image to remove the loading
 * 
 */
function removeImageLoasing(image) {
  image.src = '';
}



/**
 * Displays a random dog image in the page
 */
function displayDogImage() {
  // Get the image element
  const image = document.getElementById('dog-image');
  // Show the loading image
  showImageLoading(image);

  // Get the random image from the API
  fetch('https://dog.ceo/api/breeds/image/random')
    .then(response => response.json()) // Convert the response to JSON
    .then(data => { // Get the data
      // Check if the image exists pass the callback function
      checkIfImageExists(data.message, exists => {
        if (exists) { // If the image exists remove the loading and set the image
          removeImageLoasing(image);
          image.src = data.message;
        } else { // If the image doesn't exists call the function again
          displayDogImage();
        }
      });
    });
}

/**
 * Displays a random cat image in the page
 */
function displayGatImage() {
  // Get the image element
  const image = document.getElementById('cat-image');
  // Show the loading image
  showImageLoading(image);

  // Get the random image from the API
  fetch('https://api.thecatapi.com/v1/images/search')
    .then(response => response.json()) // Convert the response to JSON
    .then(data => { // Get the data
      // Check if the image exists pass the callback function
      checkIfImageExists(data[0].url, exists => {
        if (exists) { // If the image exists remove the loading and set the image
          removeImageLoasing(image);
          image.src = data[0].url;
        } else { // If the image doesn't exists call the function again
          displayGatImage();
        }
      });
    
    });
}

/**
 * Verifies if an image exists
 * @param {String} url The url of the image
 * @param {Function(Boolean)} callback The callback function to call when the image is checked
 */
function checkIfImageExists(url, callback) {
  const img = new Image(); // Create a new image
  img.src = url; // Set the url to the image

  // Check if the image is loaded
  if (img.complete) {
    callback(true); // If the image is loaded call the callback function
  } else { // If the image is not loaded add the event listeners
    // When the image is loaded call the callback function
    img.onload = () => { 
      callback(true);
    };
    // When the image is not loaded call the callback function
    img.onerror = () => {
      callback(false);
    };
  }
}
