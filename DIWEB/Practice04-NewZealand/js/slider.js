// Get the glider elements
let glides = document.getElementsByClassName('glide');
// Create a new glider for each element
  for (let i = 0; i < glides.length; i++) {
    new Glide(glides[i], {
      slidesToShow: 1, // Show only one slide at a time
      dots: '.glider-dots', // Add the dots
    }).mount()
  }
  
  new Glide('.glide', {
    slidesToShow: 1,
    dots: '.glider-dots',
  }).mount()