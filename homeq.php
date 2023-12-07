<?php include('log.php'); ?>


<body>
<div id="loginModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <!-- Modal content -->
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Login form -->
                <form method="post" action="login.php" id="loginForm">
                    <div class="form-group">
                        <label style="color:black;" for="loginUsername">Username<span class="required">*</span></label>
                        <input type="text" class="form-control" id="loginUsername" name="loginUsername">
                    </div>
                    <div class="form-group">
                        <label style="color:black;" for="loginPassword">Password<span class="required">*</span></label>
                        <input type="password" class="form-control" id="loginPassword" name="loginPassword">
                    </div>
                    <button type="submit"  class="btn btn-primary" name="loginSubmit">Login</button>
                    <a href="#" id="forgotPasswordLink" class="ml-auto">Forgot Password?</a>
                </form>
                <div id="loginError" class="required"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-link ml-auto" data-dismiss="modal" data-toggle="modal" data-target="#signupModal">Signup</button>
            </div>
        </div>
    </div>
</div>

<!-- Signup modal -->
<div id="signupModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
    <!-- Modal content -->
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Signup</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Signup form -->
                <form method="post" action="signup.php" id="signupForm">
                    <div class="form-group">
                        <label for="signupName">Name<span class="required">*</span></label>
                        <input type="text" class="form-control" id="signupName" name="signupName">
                    </div>
                    <div class="form-group">
                        <label style="color:black;"or="signupUsername">Username<span class="required">*</span></label>
                        <input type="text" class="form-control" id="signupUsername" name="signupUsername">
                    </div>
                    <div class="form-group">
                        <label style="color:black;" for="signupPhoneNumber">Phone Number<span class="required">*</span></label>
                        <input type="text" class="form-control" id="signupPhoneNumber" name="signupPhoneNumber">
                    </div>
                    <div class="form-group">
                        <label style="color:black;" for="signupEmail">Email<span class="required">*</span></label>
                        <input type="email" class="form-control" id="signupEmail" name="signupEmail">
                    </div>
                    <div class="form-group">
                        <label style="color:black; for="signupPassword">Password<span class="required">*</span></label>
                        <input type="password" class="form-control" id="signupPassword" name="signupPassword">
                    </div>
                    <div class="form-group">
                        <label style="color:black;for="signupConfirmPassword">Confirm Password<span class="required">*</span></label>
                        <input type="password" class="form-control" id="signupConfirmPassword" name="signupConfirmPassword">
                    </div>
                    <button type="submit" class="btn btn-primary"
                     name="signupSubmit" >Signup</button>
                </form>
                <div id="signupError" class="required" ></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-link ml-auto" data-dismiss="modal" data-toggle="modal" data-target="#loginModal">Login</button>
            </div>
        </div>
    </div>
</div>
<!-- Include jQuery library -->
<!-- ...Your HTML code... -->

<!-- Include jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="path/to/bootstrap.js"></script>

<script>
$(document).ready(function() {
    // Phone number validation
    function validatePhoneNumber(phoneNumber) {
        // Regular expression to match a valid phone number format
        var phoneRegex = /^\d{10}$/;
        return phoneRegex.test(phoneNumber);
    }

    // Email validation
    function validateEmail(email) {
        // Regular expression to match a valid email format
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // Password validation
    function validatePassword(password) {
        // Password must be at least 8 characters long
        return password.length >= 8;
    }

    // Login form submission
    $('#loginForm').submit(function(e) {
        e.preventDefault(); // Prevent form from submitting
        // Perform client-side validation
        var username = $('#loginUsername').val();
        var password = $('#loginPassword').val();
        if (username === '' || password === '') {
            $('#loginError').text('Please enter username and password');
            return;
        }
        // Clear previous error messages
        $('#loginError').text('');
        // Perform AJAX request to handle login
        $.ajax({
            type: 'POST',
            url: 'login.php', // Replace with the actual PHP file handling login
            data: $(this).serialize(),
            success: function(response) {
                // Handle the response from the server
                if (response === 'success') {
                    window.location.href = 'home.php';
                    exit();
                } else {
                    // Login failed
                    $('#loginError').text(response);
                }
            }
        });
    });
  
    $('#loginModal').on('hidden.bs.modal', function() {
        // Clear the login form fields when the modal is closed
        $('#loginForm').trigger('reset');
        $('#loginError').text('');
    });

    // Signup form submission
    $('#signupForm').submit(function(e) {
        e.preventDefault(); // Prevent form from submitting
        // Perform client-side validation
        var name = $('#signupName').val();
        var username = $('#signupUsername').val();
        var phoneNumber = $('#signupPhoneNumber').val();
        var email = $('#signupEmail').val();
        var password = $('#signupPassword').val();
        var confirmPassword = $('#signupConfirmPassword').val();
        if (name === '' || username === '' || phoneNumber === '' || email === '' || password === '' || confirmPassword === '') {
            $('#signupError').text('Please fill in all the fields');
            return;
        }
        if (!validatePhoneNumber(phoneNumber)) {
            $('#signupError').text('Please enter a valid phone number');
            return;
        }
        if (!validateEmail(email)) {
            $('#signupError').text('Please enter a valid email address');
            return;
        }
        if (!validatePassword(password)) {
            $('#signupError').text('Password must be at least 8 characters long');
            return;
        }
        if (password !== confirmPassword) {
            $('#signupError').text('Passwords do not match');
            return;
        }
        // Clear previous error messages
        $('#signupError').text('');
        $.ajax({
            type: 'POST',
            url: 'signup.php',
            data: $(this).serialize(),
            success: function(response) {
                if (response === 'success') {
                    // Signup successful
                    window.location.href = 'home.php';
                
                    exit();
                } else {
                    // Signup failed
                    $('#signupError').text(response);
                }
            }
        });
    });

    $('#signupModal').on('hidden.bs.modal', function() {
        // Clear the signup form fields when the modal is closed
        $('#signupForm').trigger('reset');
        $('#signupError').text('');
    });
});
</script>
