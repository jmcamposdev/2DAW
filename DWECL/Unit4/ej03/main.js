// Declare all the constants
const HIDDEN_TEXT = "Ocultar contenido"; // This is the text that will be shown when the content is hidden
const SHOW_TEXT = "Mostrar contenido"; // This is the text that will be shown when the content is shown
const CONTENT_BASE = "contenido_"; // This is the base of the content id
const ANCHOR_BASE = "enlace_"; // This is the base of the anchor id

// Get all the anchors and content containers using the base of the id and the querySelectorAll
const anchors = Array.from(document.querySelectorAll(`[id^=${ANCHOR_BASE}]`));
const contentContainer = Array.from(document.querySelectorAll(`[id^=${CONTENT_BASE}]`));

// Add the event listener to all the anchors
anchors.forEach((anchor, index) =>{
    anchor.addEventListener("click", () => {
        // If the text is hidden then show it and change the text to show text
        if (anchor.textContent.trim() === HIDDEN_TEXT) {
            anchor.textContent = SHOW_TEXT;
        } else { // If the text is shown then hide it and change the text to hidden text
            anchor.textContent = HIDDEN_TEXT;
        }
        // Toggle the hidden class to the content container
        contentContainer[index].classList.toggle("hidden");
    })

})


