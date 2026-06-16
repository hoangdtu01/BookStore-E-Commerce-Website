document
    .getElementById("registerForm")
    .addEventListener("submit", function (event) {
        var password = document.getElementById("password").value;
        var passwordConfirmation = document.getElementById(
            "password_confirmation"
        ).value;
        var errorMessage = document.getElementById("passwordError");

        if (password !== passwordConfirmation) {
            event.preventDefault(); // Ngừng việc gửi form
            errorMessage.style.display = "block";
        }
    });

// Lắng nghe sự kiện 'input' trên password_confirmation
document
    .getElementById("password_confirmation")
    .addEventListener("input", function () {
        var password = document.getElementById("password").value;
        var passwordConfirmation = this.value;
        var errorMessage = document.getElementById("passwordError");

        if (password === passwordConfirmation) {
            errorMessage.style.display = "none";
        } else {
            errorMessage.style.display = "block";
        }
    });
