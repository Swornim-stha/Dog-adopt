<?php
// Include database connection
include '../database/db_connection.php';

// Handle form submissions for adding or updating dogs
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['dogId'] ?? null;
    $name = $_POST['dogName'];
    $breed = $_POST['dogBreed'];
    $age = $_POST['dogAge'];
    $isAdopted = $_POST['dogStatus'] === 'Adopted' ? 1 : 0;
    $description = $_POST['dogDescription'] ?? '';

    // Handle file upload
    $imagePath = '';
    if ($_FILES['dogImageFile']['name']) {
        $targetDir = '../Assets/images/';
        $targetFile = $targetDir . basename($_FILES['dogImageFile']['name']);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if the file is an image
        $check = getimagesize($_FILES['dogImageFile']['tmp_name']);
        if ($check === false) {
            die("Error: File is not an image");
        }

        // Check file size
        if ($_FILES['dogImageFile']['size'] > 500000) {
            die("Error: File is too large");
        }

        // Allow only certain file formats
        if ($imageFileType !== 'jpg' && $imageFileType !== 'png' && $imageFileType !== 'jpeg') {
            die("Error: Only JPG, JPEG, and PNG files are allowed");
        }

        // Move the file to the target directory
        if (!move_uploaded_file($_FILES['dogImageFile']['tmp_name'], $targetFile)) {
            die("Error: Failed to upload file");
        }

        $imagePath = 'Assets/images/' . basename($_FILES['dogImageFile']['name']);
    }

    // Add or update the dog in the database
    if ($id) {
        // Update existing dog
        if ($imagePath) {
            $sql = "UPDATE dogs SET name = ?, breed = ?, age = ?, image = ?, description = ?, is_adopted = ? WHERE id = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, 'ssissii', $name, $breed, $age, $imagePath, $description, $isAdopted, $id);
        } else {
            $sql = "UPDATE dogs SET name = ?, breed = ?, age = ?, description = ?, is_adopted = ? WHERE id = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, 'ssissi', $name, $breed, $age, $description, $isAdopted, $id);
        }
        mysqli_stmt_execute($stmt);
    } else {
        // Add new dog
        $sql = "INSERT INTO dogs (name, breed, age, image, description, is_adopted) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'ssissi', $name, $breed, $age, $imagePath, $description, $isAdopted);
        mysqli_stmt_execute($stmt);
    }

    // Redirect to manage dogs page
    header("Location: manage_dog.php");
    exit;
}

// Handle delete requests
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];

    $sql = "DELETE FROM dogs WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $deleteId);
    mysqli_stmt_execute($stmt);
    
    $resetAutoIncrement = "ALTER TABLE dogs AUTO_INCREMENT = 1";
    mysqli_query($conn, $resetAutoIncrement);
    // Redirect to manage dogs page
    header("Location: manage_dog.php");
    exit;
}

// Fetch dogs from the database
$sql = "SELECT * FROM dogs";
$result = mysqli_query($conn, $sql);

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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Dogs</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet"/>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-roboto">
  <!-- Sidebar and Navigation -->
  <div class="fixed top-0 left-0 h-full w-0 bg-white overflow-x-hidden transition-width duration-500 z-10" id="mySidebar">
    <a class="absolute top-0 right-6 text-3xl" href="javascript:void(0)" onclick="closeNav()">×</a>
    <a class="block py-4 px-8 text-lg text-black hover:text-green-500" href="./dashboard.php">Dashboard</a>
    <a class="block py-4 px-8 text-lg text-black hover:text-green-500" href="./manage_dog.php">Manage Dogs</a>
    <a class="block py-4 px-8 text-lg text-black hover:text-green-500" href="./manage_request.php">Manage Requests</a>
  </div>
  <div class="transition-margin-left duration-500" id="main">
    <div class="bg-gray-800 text-white p-4 flex justify-between items-center">
      <div class="flex items-center">
        <button class="text-2xl" onclick="openNav()">
          <i class="fas fa-bars"></i>
        </button>
        <img alt="Dog Adoption Logo" class="h-12 w-12 ml-3 mr-3 rounded-full border-2" height="40" src="../Assets/images/Dog Adoption logo.png" width="40"/>
        <h1 class="text-xl font-bold">Manage Dogs</h1>
      </div>
      <div class="flex items-center">
        <button class="bg-red-500 text-white px-4 py-2 rounded ml-3" onclick="signOut()">Sign Out</button>
      </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto p-4">
      <button onclick="showAddForm()" class="bg-green-500 text-white px-4 py-2 rounded">Add New Dog</button>
      <table class="min-w-full mt-4 bg-white border border-gray-200">
        <thead>
          <tr class="bg-gray-800 text-white">
            <th class="p-2">ID</th>
            <th class="p-2">Name</th>
            <th class="p-2">Breed</th>
            <th class="p-2">Age</th>
            <th class="p-2">Image</th>
            <th class="p-2">Status</th>
            <th class="p-2">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($dogs as $dog): ?>
            <tr>
              <td class="p-2"><?= htmlspecialchars($dog['id']) ?></td>
              <td class="p-2"><?= htmlspecialchars($dog['name']) ?></td>
              <td class="p-2"><?= htmlspecialchars($dog['breed']) ?></td>
              <td class="p-2"><?= htmlspecialchars($dog['age']) ?></td>
              <td class="p-2">
                <?php if ($dog['image']): ?>
                  <img src="<?= htmlspecialchars($dog['image']) ?>" alt="Dog Image" class="h-12 w-12 rounded-full">
                <?php endif; ?>
              </td>
              <td class="p-2"><?= $dog['is_adopted'] ? 'Adopted' : 'Available' ?></td>
              <td class="p-2">
                <button onclick='editDog(<?= json_encode($dog) ?>)' class="bg-blue-500 text-white px-2 py-1 rounded">Edit</button>
                <a href="?deleteId=<?= $dog['id'] ?>" class="bg-red-500 text-white px-2 py-1 rounded" onclick="return confirm('Are you sure?')">Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <!-- Dog Form Modal -->
    <div id="dogForm" class="fixed inset-0 bg-black bg-opacity-50 hidden">
      <div class="bg-white p-6 rounded shadow-lg max-w-md mx-auto mt-20">
        <h2 class="text-xl mb-4" id="formTitle">Add New Dog</h2>
        <form id="dogFormContent" method="POST" action="" enctype="multipart/form-data">
          <input type="hidden" id="dogId" name="dogId">
          <input type="text" id="dogName" name="dogName" placeholder="Name" required class="w-full p-2 mb-2 border rounded">
          <input type="text" id="dogBreed" name="dogBreed" placeholder="Breed" required class="w-full p-2 mb-2 border rounded">
          <input type="number" id="dogAge" name="dogAge" placeholder="Age" required class="w-full p-2 mb-2 border rounded">
          <textarea id="dogDescription" name="dogDescription" placeholder="Description" class="w-full p-2 mb-2 border rounded"></textarea>
          <select id="dogStatus" name="dogStatus" required class="w-full p-2 mb-2 border rounded">
            <option value="Available">Available</option>
            <option value="Adopted">Adopted</option>
          </select>
          <input type="file" id="dogImageFile" name="dogImageFile" accept="image/*" class="w-full p-2 mb-2 border rounded">
          <button type="submit" class=" text-xl bg-green-500 text-white px-4 py-2 rounded w-full">Save</button>
     
        </form>
        <div class="flex justify-between space-x-4 mt-4">
  <button type="button" class="bg-yellow-500 text-white px-4 py-2 rounded w-full" onclick="confirmReset()">Reset</button>
  <button onclick="closeForm()" class="bg-red-500 text-white px-4 py-2 rounded w-full">Cancel</button>
</div>
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
      document.getElementById("main").style.marginLeft = "0";
    }
    function signOut() {
      alert("You have been signed out.");
      window.location.href = "../Customer/login.php";
    }
    const dogForm = document.getElementById('dogForm');
    function showAddForm() {
      dogForm.classList.remove('hidden');
    }
    function closeForm() {
      dogForm.classList.add('hidden');
    }
    function editDog(dog) {
      dogForm.classList.remove('hidden');
      document.getElementById('dogId').value = dog.id;
      document.getElementById('dogName').value = dog.name;
      document.getElementById('dogBreed').value = dog.breed;
      document.getElementById('dogAge').value = dog.age;
      document.getElementById('dogStatus').value = dog.is_adopted ? 'Adopted' : 'Available';
    }
    function confirmReset() {
    if (confirm("Are you sure you want to reset the form? All entered data will be lost.")) {
      document.getElementById("dogFormContent").reset(); // Reset the form
    }
  }
  </script>
</body>
</html>

