// Start when the document is loaded
window.addEventListener("load", () => {
    // Get the boxes
    const helloBox = document.getElementById("hola");
    const byeBox = document.getElementById("adios");

    // Set the event to the document when a key is pressed
    document.addEventListener("keydown", (e) => {
        // Get the max values to move the box
        const maxTop = 0;
        const maxDown = helloBox.offsetHeight - byeBox.offsetHeight;
        const maxLeft = 0;
        const maxRight = helloBox.offsetWidth - byeBox.offsetWidth;

        // Move the box depending on the key pressed and the max values
        if (e.key === "ArrowUp" && byeBox.offsetTop !== maxTop) { // Move up
            byeBox.style.top = (byeBox.offsetTop - 5) + "px";
        } else if (e.key === "ArrowDown" && byeBox.offsetTop !== maxDown) { // Move down
            byeBox.style.top = (byeBox.offsetTop + 5) + "px";
        } else if (e.key === "ArrowLeft" && byeBox.offsetLeft !== maxLeft) { // Move left
            byeBox.style.left = (byeBox.offsetLeft - 5) + "px";
        } else if (e.key === "ArrowRight" && byeBox.offsetLeft !== maxRight) { // Move right
            byeBox.style.left = (byeBox.offsetLeft + 5) + "px";
        }
    })
})