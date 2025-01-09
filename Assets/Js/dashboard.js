function openNav() {
    document.getElementById("mySidebar").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.marginLeft = "0";
}
function signOut() {
    alert("You have been signed out.");
    // Add your sign-out logic here, e.g., redirect to login page
    window.location.href = "../Customer/login.php"; // Example redirect
}

//(Replace this with dynamic data from backend)
const dogsLeft = 10; // Replace with actual data
const requestsPending = 5; // Replace with actual data

// Update the counts dynamically
document.getElementById('dogs-left').textContent = dogsLeft;
document.getElementById('requests-pending').textContent = requestsPending;

    // Example user data (Replace this with dynamic data from your backend)
    const userProfilePicture = "https://storage.googleapis.com/a1aa/image/BRaPn4LDzY6dOtAzj8ece06iY7AETnlanX4WBLrU7ID6EuBUA.jpg"; // Replace with actual user profile picture URL

    // Update the profile picture dynamically
    document.getElementById('profile-picture').src = userProfilePicture;
