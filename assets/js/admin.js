function validatePassword() {
    var oPassword = document.getElementById("o-pass").value;
    var cPassword = document.getElementById("c-pass").value;
    var password = document.getElementById("n-pass").value;
    var conPassword = document.getElementById("con-pass").value;
    var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/;

    if (cPassword !== oPassword) {
        document.getElementById("cpass-error").textContent = "Password is incorrect!";
        return false;
    } else {
        document.getElementById("cpass-error").textContent = ""; // Clear error message if passwords match
    }

    if (conPassword !== password) {
        document.getElementById("conpass-error").textContent = "Passwords do not match!";
        return false;
    } else {
        document.getElementById("conpass-error").textContent = ""; // Clear error message if passwords match
    }

    if (!regex.test(password)) {
        document.getElementById("pass-error").textContent = "Password must contain at least one uppercase letter, one lowercase letter, and one number.";
        return false;
    } else {
        document.getElementById("pass-error").textContent = ""; // Clear error message if password is valid
    }

    return true; // If all checks pass, return true
}