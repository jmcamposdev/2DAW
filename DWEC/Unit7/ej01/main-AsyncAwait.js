window.onload = function () {
  // Get the buttons
  const getDogButton = document.getElementById('get-dog-button');
  const getCatButton = document.getElementById('get-cat-button');

  // Add the event listeners to show the images
  getDogButton.addEventListener('click', displayDogImage);
  getCatButton.addEventListener('click', displayCatImage);

  // Show the images when the page is loaded
  displayDogImage();
  displayCatImage();
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
 */
function removeImageLoading(image) {
  image.src = '';
}

/**
 * Displays a random dog image in the page
 */
async function displayDogImage() {
  // Get the image element
  const image = document.getElementById('dog-image');
  // Show the loading image
  showImageLoading(image);

  try {
    // Get the random image from the API
    const response = await fetch('https://dog.ceo/api/breeds/image/random');
    const data = await response.json();

    // Check if the image exists pass the callback function
    const exists = await checkIfImageExists(data.message);
    if (exists) {
      // If the image exists remove the loading and set the image
      removeImageLoading(image);
      image.src = data.message;
    } else {
      // If the image doesn't exist, call the function again
      displayDogImage();
    }
  } catch (error) {
    console.error('Error fetching dog image:', error);
  }
}

/**
 * Displays a random cat image in the page
 */
async function displayCatImage() {
  // Get the image element
  const image = document.getElementById('cat-image');
  // Show the loading image
  showImageLoading(image);

  try {
    // Get the random image from the API
    const response = await fetch('https://api.thecatapi.com/v1/images/search');
    const data = await response.json();

    // Check if the image exists pass the callback function
    const exists = await checkIfImageExists(data[0].url);
    if (exists) {
      // If the image exists remove the loading and set the image
      removeImageLoading(image);
      image.src = data[0].url;
    } else {
      // If the image doesn't exist, call the function again
      displayCatImage();
    }
  } catch (error) {
    console.error('Error fetching cat image:', error);
  }
}

/**
 * Verifies if an image exists
 * @param {String} url The url of the image
 * @returns {Boolean} true if the image exists, false otherwise
 */
async function checkIfImageExists(url) {
  return new Promise((resolve) => {
    const img = new Image(); // Create a new image
    img.src = url; // Set the url to the image

    // Check if the image is loaded
    if (img.complete) {
      resolve(true); // If the image is loaded, resolve with true
    } else {
      // If the image is not loaded, add the event listeners
      img.onload = () => {
        resolve(true);
      };
      img.onerror = () => {
        resolve(false);
      };
    }
  });
}
