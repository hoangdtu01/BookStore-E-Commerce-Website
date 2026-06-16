// Select QL-Book link
const Book = document.getElementById("Book");

// Add event listener for click event
Book.addEventListener("click", function (event) {
    event.preventDefault(); // Prevent default link behavior

    // Toggle the 'active' class on the clicked item
    Book.classList.toggle("active");
});
