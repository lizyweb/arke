document.addEventListener("DOMContentLoaded", function () {
    // Create a new button element
    var closeButton = document.createElement("button");
    closeButton.type = "button";
    closeButton.className = "close d-flex align-items-center justify-content-center";
    closeButton.setAttribute("data-dismiss", "modal");
    closeButton.setAttribute("aria-label", "Close");

    // Create an icon element for the close button
    var closeIcon = document.createElement("i");
    closeIcon.className = "bx bx-window-close";
    closeIcon.setAttribute("aria-hidden", "true");

    // Set the color of the icon to white
    closeIcon.style.color = "#4c33d5";

    // Append the icon to the button
    closeButton.appendChild(closeIcon);

    // Find the modal content and append the close button
    var modalContent = document.querySelector("#exampleModalTwo .modal-content");
    if (modalContent) {
        modalContent.insertBefore(closeButton, modalContent.firstChild);

        // Attach a click event listener to close the modal
        closeButton.addEventListener("click", function () {
            $('#exampleModalTwo').modal('hide');
        });
    }
});