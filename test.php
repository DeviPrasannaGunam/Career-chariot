document.getElementById("loginForm").addEventListener("submit", function(event) {
        var loginUsername = document.getElementById("loginUsername").value;
        var loginPassword = document.getElementById("loginPassword").value;

        if (!loginUsername || !loginPassword) {
            event.preventDefault(); // Prevent form submission

            var loginError = document.getElementById("loginError");
            loginError.innerHTML = "<span class='error-text'>Please enter username and password.";
            loginError.style.display = "block";
        }
    
    });

  // Validate signup form
document.getElementById("signupForm").addEventListener("submit", function(event) {
    var signupName = document.getElementById("signupName").value;
    var signupUsername = document.getElementById("signupUsername").value;
    var signupPhoneNumber = document.getElementById("signupPhoneNumber").value;
    var signupEmail = document.getElementById("signupEmail").value;
    var signupPassword = document.getElementById("signupPassword").value;
    var signupConfirmPassword = document.getElementById("signupConfirmPassword").value;

    var signupError = document.getElementById("signupError");
    signupError.innerHTML = ""; // Clear previous error messages

    var hasError = false; // Flag to track if there are any errors

    // Regular expression to validate phone number (10 digits)
    var phoneRegex = /^\d{10}$/;
    var passwordRegex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,}$/;

    // Regular expression to validate email address
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (signupName.trim() === "") {
        signupError.innerHTML = "<span class='error-text'>Please enter your name.</span>";
        hasError = true;
    } else if (signupUsername.trim() === "") {
        signupError.innerHTML = "<span class='error-text'>Please enter a username.</span>";
        hasError = true;
    } else if (signupPhoneNumber.trim() === "") {
        signupError.innerHTML = "<span class='error-text'>Please enter your phone number.</span>";
        hasError = true;
    } else if (!phoneRegex.test(signupPhoneNumber)) {
        signupError.innerHTML = "<span class='error-text'>Please enter a valid phone number.</span>";
        hasError = true;
    } else if (signupEmail.trim() === "") {
        signupError.innerHTML = "<span class='error-text'>Please enter your email address.</span>";
        hasError = true;
    } else if (!emailRegex.test(signupEmail)) {
        signupError.innerHTML = "<span class='error-text'>Please enter a valid email address.</span>";
        hasError = true;
    } else if (signupPassword.trim() === "") {
        signupError.innerHTML = "<span class='error-text'>Please enter a password.</span>";
        hasError = true;
    } else if (signupPassword.length <script 6) {
        signupError.innerHTML = "<span class='error-text'>Password should be at least 6 characters long.</span>";
        hasError = true;
    } 
    else if (!passwordRegex.test(signupPassword)) {
    signupError.innerHTML = "<span class='error-text'>Password should contain at least one special character and one number.</span>";
    hasError = true;
}else if (signupConfirmPassword.trim() === "") {
        signupError.innerHTML = "<span class='error-text'>Please confirm your password.</span>";
        hasError = true;
    } else if (signupPassword !== signupConfirmPassword) {
        signupError.innerHTML = "<span class='error-text'>Passwords do not match.</span>";
        hasError = true;
    }

    if (hasError) {
        signupError.style.display = "block";
        event.preventDefault(); // Prevent form submission
    }
});

