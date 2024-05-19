<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link rel="stylesheet" href="paymentstyle.css">
    <!-- Include your CSS file for styling -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
</head>
<body>
    <h1>Payment Form</h1>
    <p>Ensure that the deatils are appropiate and correct for further information</p>
    <div class="container">
        
        <form id="paymentForm">
            <div class="form-row">
                <section class="machine-details">
                    <h2>Machine Details</h2>
                    <div class="form-group">
                        <label for="machineName">Name:</label>
                        <span id="machineName"></span>
                    </div>
                    <div class="form-group">
                        <label for="machineRating">Rating:</label>
                        <span id="machineRating"></span>
                    </div>
                    <div class="form-group">
                        <label for="machinePrice">Price per day:</label>
                        <span id="machinePrice"></span>
                    </div>
                </section>

                <section class="user-details">
                    <h2>User Details</h2>
                    <div class="form-group">
                        <label for="userName">Name:</label>
                        <input type="text" id="userName" required>
                    </div>
                    <div class="form-group">
                        <label for="userEmail">Email:</label>
                        <input type="email" id="userEmail" required>
                    </div>
                    <div class="form-group">
                        <label for="userDob">Date of Birth:</label>
                        <input type="date" id="userDob" name="userDob" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label><br>
                        <input type="radio" name="gender" value="Female">Female
                        <input type="radio" name="gender" value="Male">Male
                        <input type="radio" name="gender" value="Others">Other
                    </div>
                    <div class="form-group">
                        <label for="userPhone">Phone Number:</label>
                        <select name="countryCode">
                            <option value="+91">+91 (India)</option>
                            <option value="+1">+1 (United States)</option>
                            <option value="+44">+44 (United kingdom)</option>
                            <option value="+86">+86 (China)</option>
                            <option value="+92">+92 (Pakistan)</option>
                        </select>
                        <input type="tel" id="userPhone" name="userPhone" required>
                    </div>
                    <div class="form-group">
                        <label for="userAddress">Address:</label>
                        <input type="text" id="userAddress" name="userAddress" required>
                    </div>
                    <div class="form-group">
                        <label for="userCity">City:</label>
                        <input type="text" id="userCity" name="userCity" required>
                    </div>
                    <div class="form-group">
                        <label for="userDistrict">District:</label>
                        <input type="text" id="userDistrict" name="userDistrict" required>
                    </div>
                    <div class="form-group">
                        <label for="userState">State:</label>
                        <input type="text" id="userState" name="userState" required>
                    </div>
                    <div class="form-group">
                        <label for="days">Number of Days:</label>
                        <input type="number" id="days" min="1" required>
                    </div>
                </section>
            </div>

            <section class="total-bill">
                <h2>Total Bill</h2>
                <p>Total Amount: <span id="total"></span></p>
            </section>

            <div class="button-container">
    <button type="button" class="submit-button" onclick="redirectToReceipt()">Book Now</button>
</div>

        </form>
    </div>
   <!--  <script>
    function redirectToReceipt() {
        window.location.href = 'generate_receipt.php';
    }
</script> -->

    <script src="script.js"></script>
</body>
</html>

