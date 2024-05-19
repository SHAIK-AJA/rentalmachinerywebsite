<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register form </title>

  <!-- CSS -->
  <link rel="stylesheet" href="style.css">
  </link>

  <!-- Boxicons CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script>
    function validateRegistrationForm() {
      var email = document.forms["registerForm"]["email"].value;
      var password1 = document.forms["registerForm"]["password_1"].value;
      var password2 = document.forms["registerForm"]["password_2"].value;

      if (!isValidEmail(email)) {
        alert("Please enter a valid email address.");
        return false;
      }

      if (password1.length < 6) {
        alert("Password must be at least 6 characters long.");
        return false;
      }

      if (password1 !== password2) {
        alert("Passwords do not match.");
        return false;
      }
    }

    function isValidEmail(email) {
      var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailPattern.test(email);
    }
  </script>

</head>

<body>
  <h1>Registration Form</h1>
  <p>Please fill out the form with the required information</p>

  <form name="registerForm" action="register.php" method="post" onsubmit="return validateRegistrationForm()">
    <div class="error-message">
      <?php
      if (isset($_GET['error'])) {
        echo $_GET['error'];
      }
      ?>
    </div>
    <fieldset>

      <label>Enter Valid Email
        <input type="email" name="email" placeholder="email" required></label>


      <label>Enter Strong password
        <input type="password" name="password_1" placeholder="Enter password" required></label>


      <label>Repeat the password
        <input type="password" name="password_2" placeholder="Reenter passowrd" required></label>
      </div>
    </fieldset>

    <button type="submit" value="Submit" class="btn" name="reg_user">Register</button>
    </div>
    <p>
      Already have an account? <a href="log.php">Sign in</a>
    </p>


  </form>
  <section class="additional-info">
        <h3>Why Register?</h3>
        <p>By registering an account with us, you gain access to exclusive features and benefits:</p>
        <ul>
            <li>Save your favorite machines for easy access</li>
            <li>Track your rental history</li>
            <li>Receive special offers and discounts</li>
        </ul>
        <p>Don't miss out on these advantages, sign up now!</p>
    </section>

    <footer>
        <div class="footer-content">
            <div class="footer-section about">
                <h2>About Us</h2>
                <p>At Rent Machines, we provide convenient and affordable solutions for your equipment needs.</p>
            </div>
            <div class="footer-section contact">
                <h2>Contact Us</h2>
                <ul>
                    <li><i class="fas fa-map-marker-alt"></i> 19/34-1 Rythu Bazaar, Main Street, King Koti Road, Hyderabad</li>
                    <li><i class="fas fa-phone"></i> +919876543210</li>
                    <li><i class="fas fa-envelope"></i> rentmachines@service.com</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; 2024 Rent Machines. All rights reserved.
        </div>
    </footer>
</body>

</html>