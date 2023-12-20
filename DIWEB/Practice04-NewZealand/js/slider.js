let glides = document.getElementsByClassName('glide');
  for (let i = 0; i < glides.length; i++) {
    new Glide(glides[i], {
      slidesToShow: 1,
      dots: '.glider-dots',
    }).mount()
  }
  new Glide('.glide', {
    slidesToShow: 1,
    dots: '.glider-dots',
  }).mount()