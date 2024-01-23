$(document).ready(function() {
  // Get the buttons
  const getDogButton = $('#get-dog-button');
  const getCatButton = $('#get-cat-button');

  // Add the event listeners to show the images
  getDogButton.on('click', displayDogImage);
  getCatButton.on('click', displayGatImage);

  // Show the images when the page is loaded
  displayDogImage();
  displayGatImage();
});

/**
 * Shows the loading image
 * @param {HTMLImageElement} image the image to show the loading
 */
function showImageLoading(image) {
  image.attr('src', 'img/loading.gif');
}

/**
 * Removes the loading image
 * @param {HTMLImageElement} image the image to remove the loading
 * 
 */
function removeImageLoasing(image) {
  image.attr('src', '');
}

/**
 * Displays a random dog image in the page
 */
function displayDogImage() {
  // Get the image element
  const image = $('#dog-image');
  // Show the loading image
  showImageLoading(image);

  // Get the random image from the API
  $.ajax({
    url: 'https://dog.ceo/api/breeds/image/random',
    dataType: 'json',
    success: function(data) {
      // Check if the image exists pass the callback function
      checkIfImageExists(data.message, function(exists) {
        if (exists) { // If the image exists remove the loading and set the image
          removeImageLoasing(image);
          image.attr('src', data.message);
        } else { // If the image doesn't exists call the function again
          displayDogImage();
        }
      });
    }
  });
}

/**
 * Displays a random cat image in the page
 */
function displayGatImage() {
  // Get the image element
  const image = $('#cat-image');
  // Show the loading image
  showImageLoading(image);

  // Get the random image from the API
  $.ajax({
    url: 'https://api.thecatapi.com/v1/images/search',
    dataType: 'json',
    success: function(data) {
      // Check if the image exists pass the callback function
      checkIfImageExists(data[0].url, function(exists) {
        if (exists) { // If the image exists remove the loading and set the image
          removeImageLoasing(image);
          image.attr('src', data[0].url);
        } else { // If the image doesn't exists call the function again
          displayGatImage();
        }
      });
    }
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
    img.onload = function() {
      callback(true);
    };
    // When the image is not loaded call the callback function
    img.onerror = function() {
      callback(false);
    };
  }
}
