$(() => {
  $('#form').submit((ev) => {
    ev.preventDefault();
    // Get the checkbox value
    const checked = $('input[name="options[]"]:checked').length;
    // Show the Result
    $('.result').text(`Has marcado ${checked} opciones`);
  });
})