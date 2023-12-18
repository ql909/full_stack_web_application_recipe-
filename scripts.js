// java for account.php page login and register
var x = document.getElementById("login");
var y = document.getElementById("register");
var z = document.getElementById("btn");
// Use the URLSearchParams interface to check for query parameters
const urlParams = new URLSearchParams(window.location.search);

// function for the register toggle button position
function register() {
    x.style.left = "-400px";
    y.style.left = "50px";
    z.style.left = "110px";
}

// function for the login toggle button position
function login() {
    x.style.left = "50px";
    y.style.left = "450px";
    z.style.left = "0px";
}

// Function to show the registration form
function showRegisterForm() {
    x.style.left = "-400px";
    y.style.left = "50px";
    z.style.left = "110px";
}

// Function to show the login form
function showLoginForm() {
    x.style.left = "50px";
    y.style.left = "450px";
    z.style.left = "0px";
}

// Call the appropriate function based on the query parameter
if (urlParams.has('error') && urlParams.get('error') === 'signup') {
    showRegisterForm();
}

// Event listeners for the buttons
document.querySelector(".toggle-btn[onclick='register()']").addEventListener('click', showRegisterForm);
document.querySelector(".toggle-btn[onclick='login()']").addEventListener('click', showLoginForm);

function updateSaveButtonStatus() {
    var saveButton = document.getElementById('saveButton');
    if (!saveButton) return; // Exit if button not found

    var saveStatus = saveButton.getAttribute('data-save-status');
    if (saveStatus === 'saved') {
        saveButton.value = 'Saved!';
        saveButton.style.backgroundColor = 'green';
    } else if (saveStatus === 'already_saved') {
        saveButton.value = 'Already Saved';
        saveButton.style.backgroundColor = 'green';
    }
}

window.onload = updateSaveButtonStatus;

