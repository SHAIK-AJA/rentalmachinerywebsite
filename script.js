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
function populateMachineDetails() {
    const machineName = getQueryVariable("machineName");
    const machineRating = getQueryVariable("machineRating");
    const machinePrice = getQueryVariable("machinePrice");

    // Populate machine details in HTML
    document.getElementById("machineName").textContent = machineName;
    document.getElementById("machineRating").textContent = machineRating;
    document.getElementById("machinePrice").textContent = machinePrice;
}

// Call the function to populate machine details
//populateMachineDetails();
// Function to update the total amount based on the number of days
function updateTotalAmount() {
    const machinePricePerDay = parseFloat(getQueryVariable("machinePrice").replace("$", "").replace("per day", ""));
    const days = parseFloat(document.getElementById("days").value);

    // Calculate the total amount
    const totalAmount = machinePricePerDay * days;

    // Update the total amount in the HTML
    document.getElementById("total").textContent = "$" + totalAmount.toFixed(2);
}

// Call the function to update the total amount when the page loads and whenever the number of days changesPopulate machine details as before
updateTotalAmount();
// Calculate and display the initial total amount
populateMachineDetails(); // Populate machine details as before
// Add an event listener to the "days" input field to update the total amount when the user changes the number of days
document.getElementById("days").addEventListener("input", updateTotalAmount);

function handleFormSubmission(event) {
    event.preventDefault();

    // Get user-entered details
    const userName = document.getElementById("userName").value;
    const userEmail = document.getElementById("userEmail").value;
    const userDob = document.getElementById("userDob").value;
    const userPhone = document.getElementById("userPhone").value;
    const gender = document.getElementById("gender").value;
    const userAddress = document.getElementById("userAddress").value;
    const userCity = document.getElementById("userCity").value;
    const userDistrict = document.getElementById("userDistrict").value;
    const userState = document.getElementById("userState").value;
    const days = document.getElementById("days").value;
    //const totalAmount = document.getElementById("totalAmount").value;

    // Get machine details
    const machineName = getQueryVariable("machineName");
    const machineRating = getQueryVariable("machineRating");
    const machinePrice = getQueryVariable("machinePrice");

    // Redirect to generate_receipt.html with query parameters
    const redirectURL = `generate_receipt.php?machineName=${encodeURIComponent(machineName)}&machineRating=${encodeURIComponent(machineRating)}&machinePrice=${encodeURIComponent(machinePrice)}&userName=${encodeURIComponent(userName)}&userEmail=${encodeURIComponent(userEmail)}&userDob=${encodeURIComponent(userDob)}&userPhone=${encodeURIComponent(userPhone)}&gender=${encodeURIComponent(gender)}&userAddress=${encodeURIComponent(userAddress)}&userCity=${encodeURIComponent(userCity)}&userDistrict=${encodeURIComponent(userDistrict)}&userState=${encodeURIComponent(userState)}&days=${encodeURIComponent(days)}`;

    window.location.href = redirectURL;
}

// Add an event listener to the payment form for form submission
document.getElementById("paymentForm").addEventListener("submit", handleFormSubmission);



