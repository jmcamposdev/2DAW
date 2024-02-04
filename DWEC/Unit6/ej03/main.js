/**
 * 3. Crea una lista con diferentes elementos de tipo checkbox. Determina los elementos
 * pulsados mediante un mensaje de información.
 */

// Main Entry
$(() => {
  // Add submit event to form
  $('#form').submit((ev) => {
    // Prevent default event
    ev.preventDefault();

    // Get the checkbox values
    const checked = $('input[name="options[]"]:checked').length;
    // Show the Result
    $('.result').text(`You have selected ${checked} options`);
  });
})