<?php
// Start the session
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?redirect=viewdogs.php");
    exit;
}

// Database connection
require_once '../Database/db_connection.php'; // Ensure you have a db_connection.php file for DB connection

// Fetch dogs from the database
$sql = "SELECT * FROM dogs WHERE is_adopted = 0"; // Only show dogs that are not adopted
$result = mysqli_query($conn, $sql);

// Fetch all the rows into an array
$dogs = [];
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $dogs[] = $row;
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Pet Adoption Website</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
<!-- Navigation section -->
<nav class="bg-gray-800 text-white py-2">
    <div class="container mx-auto flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <img alt="Logo" class="h-12 w-12 rounded-full border-08" height="50" src="../Assets/images/Dog Adoption logo.png" width="50"/>
            <h1 class="text-xl font-bold">Dog Adoption</h1>
        </div>
        <div class="flex items-center space-x-4">
            <a class="hover:text-orange-500 text-lg" href="./index.php">Home</a>
            <a class="hover:text-orange-500 text-lg" href="./viewdogs.php">Adopt</a>
            <a class="hover:text-orange-500 text-lg" href="donate.php">Donate</a>
            <a class="hover:text-orange-500 text-lg" href="./#contact">Contact</a>
            <a class="bg-orange-500 text-white px-4 py-2 rounded-full" href="logout.php" style="border-radius: 50px;">Sign Out</a>
        </div>
    </div>
</nav>

<!-- Main content section -->
<div class="container mx-auto py-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <?php
        if (count($dogs) > 0) {
            foreach ($dogs as $row) {
                echo '
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img alt="Image of ' . htmlspecialchars($row['name']) . '" class="w-full h-48 object-cover" src="../Uploads/' . htmlspecialchars($row['image']) . '" />
                    <div class="p-4">
                        <h3 class="text-xl font-bold">' . htmlspecialchars($row['name']) . '</h3>
                        <p>Age: ' . htmlspecialchars($row['age']) . '</p>
                        <p>Breed: ' . htmlspecialchars($row['breed']) . '</p>
                        <a class="bg-green-500 text-white px-4 py-2 rounded-full mt-4 inline-block" href="adoption_request.php?dog_id=' . htmlspecialchars($row['id']) . '">Adopt</a>
                    </div>
                </div>';
            }
        } else {
            echo '<p class="col-span-4 text-center text-gray-600">No dogs available for adoption at the moment.</p>';
        }
        ?>
    </div>
</div>
</body>
</html>
