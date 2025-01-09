<html>
 <head>
  <title>
   Sign In
  </title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
 </head>
 <body class="bg-gray-100 flex items-center justify-center min-h-screen">
  <div class="container mx-auto p-4 max-w-md bg-white shadow-md rounded-lg">
   <div class="mb-4">
    <a class="text-blue-500 hover:underline" href="./index.php">
     <i class="fas fa-arrow-left">
     </i>
     Back
    </a>
   </div>
   <div class="flex justify-center mb-6">
    <img alt="Logo of a dog" class="h-32 w-32" height="100" src="../Assets/images/Dog Adoption logo.png" width="100"/>
   </div>
   <h2 class="text-2xl font-bold text-center mb-6">
    Sign in to your account
   </h2>
   <form>
    <div class="mb-6">
     <input class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter email" type="email"/>
    </div>
    <div class="mb-6">
     <input class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter password" type="password"/>
    </div>
    <div class="mb-6">
     <button class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500" type="submit">
      LOGIN
     </button>
    </div>
   </form>
   <div class="text-center">
    No account?
    <a class="text-blue-500 hover:underline" href="Signup.php">
     Sign up
    </a>
   </div>
  </div>
 </body>
</html>
