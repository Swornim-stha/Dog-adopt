
<!DOCTYPE html>
<html>
 <head>
  <title>Sign In</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet" />
 </head>
 <body class="bg-gray-100 flex items-center justify-center min-h-screen">
  <div class="container mx-auto p-4 max-w-md bg-white shadow-md rounded-lg">
   <div class="mb-4">
    <a class="text-blue-500 hover:underline" href="./index.php">
     <i class="fas fa-arrow-left"></i> Back
    </a>
   </div>
   <div class="flex justify-center mb-6">
    <img alt="Logo of a dog" class="h-32 w-32" src="../Assets/images/Dog Adoption logo.png" />
   </div>
   <h2 class="text-2xl font-bold text-center mb-6">Sign in to your account</h2>
   <?php
   // Start session
   session_start();

   // Database connection
   $conn = new mysqli("localhost", "root", "", "dog_adoption");

   // Check connection
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }

   // Handle login
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       $email = $_POST['email'];
       $password = $_POST['password'];

       // Validate input
       if (!empty($email) && !empty($password)) {
           $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
           $stmt->bind_param("s", $email);
           $stmt->execute();
           $result = $stmt->get_result();

           if ($result->num_rows > 0) {
               $user = $result->fetch_assoc();
               // Verify password
               if (password_verify($password, $user['password'])) {
                   $_SESSION['user_id'] = $user['id'];
                   $_SESSION['user_role'] = $user['role']; // Optional, if roles are implemented
                   header("Location: index.php"); // Redirect to dashboard
                   exit;
               } else {
                   $error = "Invalid password.";
               }
           } else {
               $error = "No account found with that email.";
           }
           $stmt->close();
       } else {
           $error = "Please fill in all fields.";
       }
   }
   if ($loginSuccessful) {
    // Check for redirect parameter
    $redirect = isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php';
    header("Location: $redirect");
    exit;
}
   ?>
   <?php if (isset($error)): ?>
   <div class="text-red-500 text-center mb-4"><?php echo htmlspecialchars($error); ?></div>
   <?php endif; ?>
   <form method="POST" action="">
    <div class="mb-6">
     <input class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" name="email" placeholder="Enter email" type="email" required />
    </div>
    <div class="mb-6">
     <input class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" name="password" placeholder="Enter password" type="password" required />
    </div>
    <div class="mb-6">
     <button class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500" type="submit">LOGIN</button>
    </div>
   </form>
   <div class="text-center">
    No account?
    <a class="text-blue-500 hover:underline" href="Signup.php">Sign up</a>
   </div>
  </div>
 </body>
</html>
