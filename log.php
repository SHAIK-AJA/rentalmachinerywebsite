<?php
?>
<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form </title>

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script>
        function validateForm() {
            var email = document.forms["loginForm"]["email"].value;
            var password = document.forms["loginForm"]["password"].value;

            if (!isValidEmail(email)) {
                alert("Please enter a valid email address.");
                return false;
            }

            if (password.length < 6) {
                alert("Password must be at least 6 characters long.");
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

    
        <h1>Login form</h1>
        <p>Hey, you can login now!!</p>
        <form name="loginForm" action="login.php" method="post" onsubmit="return validateForm()">
    <div class="error-message">
      <?php
      if (isset($_GET['error'])) {
        echo $_GET['error'];
      }
      ?>
    </div>
    <fieldset>

      <label>Enter Email
        <input type="email" name="email" placeholder="email" required></label>


      <label>Enter Password
        <input type="password" name="password" placeholder="enter password" required></label>

    </fieldset>

    <button type="submit" value="Submit" class="btn" name="login_user">Login</button>
    </div>
    <p>
      Already have an account? <a href="reg.php">Sign Up</a>
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