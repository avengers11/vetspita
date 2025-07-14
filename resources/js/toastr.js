document.addEventListener("DOMContentLoaded", function () {
    if (window.petSuccessMessage) {
        showToast(window.petSuccessMessage);
    }
});

function showToast(message) {
    const toast = document.getElementById("toast-message");
    const toastText = document.getElementById("toast-text");

    toastText.innerText = message;
    toast.classList.remove("hidden");
    toast.classList.add("opacity-100");

    // Hide the toast after 3 seconds
    setTimeout(() => {
        toast.classList.add("opacity-0");
        setTimeout(() => toast.classList.add("hidden"), 500); // Wait for fade-out transition
    }, 3000);
}
