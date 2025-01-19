<?php
// Include the database connection file
include('../database/db_connection.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);
// Query to get the count of dogs left for adoption
$dogsQuery = "SELECT COUNT(*) AS dogs_count FROM dogs WHERE is_adopted = 0"; 
$resultDogs = $conn->query($dogsQuery);
$dogsLeft = 0;
if ($resultDogs->num_rows > 0) {
    $row = $resultDogs->fetch_assoc();
    $dogsLeft = $row['dogs_count'];
}

// Query to get the count of pending adoption requests
// $requestsQuery = "SELECT COUNT(*) AS requests_count FROM adoption_request WHERE status = 'pending'";
// $resultRequests = $conn->query($requestsQuery);
// $requestsPending = 0;
// if ($resultRequests->num_rows > 0) {
//     $row = $resultRequests->fetch_assoc();
//     $requestsPending = $row['requests_count'];
// }
?>

<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Dog Adoption
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet"/>
  <script src="https://cdn.tailwindcss.com"></script>
 </head>
 <body class="font-roboto bg-gray-100">
  <div class="fixed top-0 left-0 h-full w-0 bg-white overflow-x-hidden transition-width duration-500 z-10" id="mySidebar">
   <a class="absolute top-0 right-6 text-3xl" href="javascript:void(0)" onclick="closeNav()">
    ×
   </a>
   <a class="block py-4 px-8 text-lg text-black hover:text-green-500" href="./dashboard.php">
    Dashboard
   </a>
   <a class="block py-4 px-8 text-lg text-black hover:text-green-500" href="./manage_dog.php">
    Manage Dogs
   </a>
   <a class="block py-4 px-8 text-lg text-black hover:text-green-500" href="./manage_request.php">
    Manage Requests
   </a>
  </div>
  <div class="transition-margin-left duration-500" id="main">
   <div class="bg-gray-800 text-white p-4 flex justify-between items-center">
    <div class="flex items-center">
     <button class="text-2xl" onclick="openNav()">
      <i class="fas fa-bars">
      </i>
     </button>
     <img alt="Dog Adoption Logo" class="h-12 w-12 ml-3 mr-3 rounded-full border-2" height="40" src="../Assets/images/Dog Adoption logo.png" width="40"/>
     <h1 class="text-xl font-bold">
      Dog Adoption Dashboard
     </h1>
    </div>
    <div class="flex items-center">
     <img alt="Profile Picture of the logged-in user" class="h-10 w-10 rounded-full ml-3" height="40" id="profile-picture" src="https://storage.googleapis.com/a1aa/image/4cTvfKBlHWWxVSYhhIQlE7e5fYcL8Joku80WaccZBZdhv3EoA.jpg" width="40"/>
     <button class="bg-red-500 text-white px-4 py-2 rounded ml-3" onclick="signOut()">
      Sign Out
     </button>
    </div>
   </div>
   <div class="container mx-auto p-4 flex flex-wrap justify-around items-center">
    <div class="card bg-white p-6 rounded-lg shadow-md text-center m-4">
     <h1 class="text-4xl font-bold" id="dogs-left">
      <?php echo $dogsLeft; ?>
     </h1>
     <p class="text-lg">
      Dogs Left for Adoption
     </p>
    </div>
    <div class="card bg-white p-6 rounded-lg shadow-md text-center m-4">
     <h1 class="text-4xl font-bold" id="requests-pending">
      <?php echo $requestsPending; ?>
     </h1>
     <p class="text-lg">
      Adoption Requests Pending
     </p>
    </div>
   </div>
  </div>
  <script>
   function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft= "0";
        }

        function signOut() {
            alert("You have been signed out.");
            window.location.href = "../Customer/login.php";
        }

        // Example user data (Replace this with dynamic data from your backend)
        const userProfilePicture = "https://storage.googleapis.com/a1aa/image/BRaPn4LDzY6dOtAzj8ece06iY7AETnlanX4WBLrU7ID6EuBUA.jpg"; // Replace with actual user profile picture URL

        // Update the profile picture dynamically
        document.getElementById('profile-picture').src = userProfilePicture;
  </script>
 </body>
</html>

<?php
// Close the database connection
$conn->close();
?>
