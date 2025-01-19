
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

// Check for errors in the query
if (!$result) {
    die("Database query failed: " . mysqli_error($conn));
}

// Fetch all the rows into an array
$dogs = [];
if (mysqli_num_rows($result) > 0) {
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
            <img alt="Logo" class="h-12 w-12 rounded-full" src="../Assets/images/Dog Adoption logo.png"/>
            <h1 class="text-xl font-bold">Dog Adoption</h1>
        </div>
        <div class="flex items-center space-x-4">
            <a class="hover:text-orange-500 text-lg" href="./index.php">Home</a>
            <a class="hover:text-orange-500 text-lg" href="./viewdogs.php">Adopt</a>
            <a class="hover:text-orange-500 text-lg" href="donate.php">Donate</a>
            <a class="hover:text-orange-500 text-lg" href="./#contact">Contact</a>
            <a class="bg-orange-500 text-white px-4 py-2 rounded-full" href="logout.php">Sign Out</a>
        </div>
    </div>
</nav>

<!-- Main content section -->
<div class="container mx-auto py-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <?php if (count($dogs) > 0): ?>
            <?php foreach ($dogs as $row): ?>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img alt="Image of <?= htmlspecialchars($row['name']) ?>" class="w-full h-48 object-cover" src="../Uploads/<?= htmlspecialchars($row['image']) ?>"/>
                    <div class="p-4">
                        <h3 class="text-xl font-bold"><?= htmlspecialchars($row['name']) ?></h3>
                        <p>Age: <?= htmlspecialchars($row['age']) ?></p>
                        <p>Breed: <?= htmlspecialchars($row['breed']) ?></p>
                        <button 
                            class="bg-green-500 text-white px-4 py-2 rounded-full mt-4 inline-block" 
                            onclick="openAdoptForm(<?= $row['id'] ?>, '<?= htmlspecialchars($row['name']) ?>', '<?= htmlspecialchars($row['age']) ?>', '<?= htmlspecialchars($row['breed']) ?>', '<?= htmlspecialchars($row['image']) ?>')">
                            Adopt
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="col-span-4 text-center text-gray-600">No dogs available for adoption at the moment.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Modal for Dog Adoption Form -->
<div id="adoptModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white rounded-lg p-6 w-11/12 max-w-4xl max-h-[90vh] overflow-y-auto">
        <div>
            <button class="bg-red-500 text-white px-4 py-2 rounded-full mt-4" onclick="closeAdoptForm()">Close</button>
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Dog Adoption Application Form</h2>

            <!-- Dog details displayed on top of the form -->
            <div class="bg-gray-100 p-4 rounded-lg mb-6">
                <h3 class="text-xl font-bold" id="dog_name_display"></h3>
                <p>Age: <span id="dog_age_display"></span></p>
                <p>Breed: <span id="dog_breed_display"></span></p>
                <img id="dog_image_display" class="w-full h-48 object-cover mt-4">
            </div>

            <!-- Form for adoption request -->
            <form action="manage_request.php" method="POST" class="mx-auto max-w-lg">
                <input type="hidden" id="dog_id" name="dog_id">
                <input type="hidden" id="dog_name" name="dog_name">
                <input type="hidden" id="dog_age" name="dog_age">
                <input type="hidden" id="dog_breed" name="dog_breed">
                <input type="hidden" id="dog_image" name="dog_image">

                <label class="block text-gray-600 mb-2" for="name">Full Name:</label>
                <input class="w-full p-2 border border-gray-300 rounded mb-4" id="name" name="name" required type="text">

                <label class="block text-gray-600 mb-2" for="age">Age:</label>
                <input class="w-full p-2 border border-gray-300 rounded mb-4" id="age" name="age" required type="number">

                <label class="block text-gray-600 mb-2" for="email">Email:</label>
                <input class="w-full p-2 border border-gray-300 rounded mb-4" id="email" name="email" required type="email">

                <label class="block text-gray-600 mb-2" for="phone">Phone Number:</label>
                <input class="w-full p-2 border border-gray-300 rounded mb-4" id="phone" name="phone" required type="tel">

                <label class="block text-gray-600 mb-2" for="address">Home Address:</label>
                <textarea class="w-full p-2 border border-gray-300 rounded mb-4" id="address" name="address" required rows="3"></textarea>

                <label class="block text-gray-600 mb-2" for="reason">Why do you want to adopt this dog?</label>
                <textarea class="w-full p-2 border border-gray-300 rounded mb-4" id="reason" name="reason" required rows="4"></textarea>

                <label class="block text-gray-600 mb-2" for="commitment">Are you ready to commit to the dog's long-term care?</label>
                <select class="w-full p-2 border border-gray-300 rounded mb-4" id="commitment" name="commitment" required>
                    <option value="">Select an option</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>

                <button class="w-full p-3 bg-green-500 text-white rounded hover:bg-green-600" type="submit">Submit Application</button>
            </form>
        </div>
    </div>
</div>

<script>
    function openAdoptForm(dogId, dogName, dogAge, dogBreed, dogImage) {
        // Set dog details in the form
        document.getElementById('dog_id').value = dogId;
        document.getElementById('dog_name').value = dogName;
        document.getElementById('dog_age').value
        document.getElementById('dog_age').value = dogAge;
        document.getElementById('dog_breed').value = dogBreed;
        document.getElementById('dog_image').value = dogImage;

        // Display dog details on top of the form
        document.getElementById('dog_name_display').textContent = dogName;
        document.getElementById('dog_age_display').textContent = dogAge;
        document.getElementById('dog_breed_display').textContent = dogBreed;
        document.getElementById('dog_image_display').src = '../Uploads/' + dogImage;

        // Show the modal
        document.getElementById('adoptModal').classList.remove('hidden');
        document.getElementById('adoptModal').style.display = 'flex';
    }

    function closeAdoptForm() {
        document.getElementById('adoptModal').classList.add('hidden');
        document.getElementById('adoptModal').style.display = 'none';
    }
</script>
</body>
</html>