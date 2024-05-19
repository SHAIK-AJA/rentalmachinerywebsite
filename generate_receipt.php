<?php
// Establish a database connection
error_reporting(E_ALL);
ini_set('display_errors', 1);
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "user_authentication";

// Create connection
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to extract query parameters from the URL
function getQueryVariable($variable) {
    if (isset($_GET[$variable])) {
        return $_GET[$variable];
    }
    return null;
}

// Extract values from URL parameters
$machineName = getQueryVariable("machineName");
$machinePrice = getQueryVariable("machinePrice");
$userName = getQueryVariable("userName");
$userEmail = getQueryVariable("userEmail");
$userDob = getQueryVariable("userDob");
$userPhone = getQueryVariable("userPhone");
$gender = getQueryVariable("gender");
$userAddress = getQueryVariable("userAddress");
$userCity = getQueryVariable("userCity");
$userDistrict = getQueryVariable("userDistrict");
$userState = getQueryVariable("userState");
$days = getQueryVariable("days");

// Insert receipt details into the database
$sql = "INSERT INTO receipt_details (machine_name, machine_price, user_name, user_email, user_dob, user_phone, gender, user_address, user_city, user_district, user_state, days)
        VALUES ('$machineName', '$machinePrice', '$userName', '$userEmail', '$userDob', '$userPhone', '$gender', '$userAddress', '$userCity', '$userDistrict', '$userState', '$days')";

if ($conn->query($sql) === TRUE) {
    // Receipt details saved successfully
} else {
    // Error handling
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <style>

        #receipt-content {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <h1>Receipt</h1>

    <div id="receipt-content">
        <!-- The receipt content will be dynamically generated here -->
    </div>

    <button id="printButton">Print Receipt</button>

    <script>
        // Function to extract query parameters from the URL
        function getQueryVariable(variable) {
            const query = window.location.search.substring(1);
            const vars = query.split('&');
            for (let i = 0; i < vars.length; i++) {
                const pair = vars[i].split('=');
                if (decodeURIComponent(pair[0]) === variable) {
                    return decodeURIComponent(pair[1]);
                }
            }
            return null;
        }


        async function generateReceipt() {
            const machineName = getQueryVariable("machineName");
            const machineRating = getQueryVariable("machineRating");
            const machinePrice = getQueryVariable("machinePrice");
            const userName = getQueryVariable("userName");
            const userEmail = getQueryVariable("userEmail");
            const userDob = getQueryVariable("userDob");
            const userPhone = getQueryVariable("userPhone");
            const gender = getQueryVariable("gender");
            const userAddress = getQueryVariable("userAddress");
            const userCity = getQueryVariable("userCity");
            const userDistrict = getQueryVariable("userDistrict");
            const userState = getQueryVariable("userState");
            const days = getQueryVariable("days");
            const machinePricePerDay = parseFloat(machinePrice.replace("per%20day", "").replace("$", ""));
            const totalAmount = machinePricePerDay * parseFloat(days);

            const receiptContent = `
                <h2>Machine Details</h2>
                <p>Name: ${machineName}</p>
                <p>Rating: ${machineRating}</p>
                <p>Price per day: ${machinePrice}</p>

                <h2>User Details</h2>
                <p>Name: ${userName}</p>
                <p>Email: ${userEmail}</p>
                <p>Date of birth: ${userDob}</p>
                <p>Phone Number: ${userPhone}</p>
                <p>Gender: ${gender}</p>
                <p>Address: ${userAddress}</p>
                <p>City: ${userCity}</p>
                <p>District: ${userDistrict}</p>
                <p>state: ${userState}</p>
                <p>Number of Days: ${days}</p>

                <h2>Total Bill</h2>
                <p>Total Amount: $${totalAmount.toFixed(2)}</p>
            `;

            
            document.getElementById("receipt-content").innerHTML = receiptContent;
        }

        // Function to print the receipt
        const printReceipt = () => {
            document.getElementById("printButton").style.display = "none";

            window.print();

         
            document.getElementById("printButton").style.display = "inline-block";
        };

        generateReceipt();

  
        document.getElementById("printButton").addEventListener("click", printReceipt);
    </script>
</body>
</html>