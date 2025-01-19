<?php
session_start(); // Start the session
?>
<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Pet Adoption Website
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet"/>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <style>
   body {
            font-family: 'Roboto', sans-serif;
        }
  </style>
 </head>
 <!-- Navegation section -->
 <body class="bg-gray-100">
  <nav class="bg-gray-800 text-white py-2">
   <div class="container mx-auto flex justify-between items-center">
    <div class="flex items-center space-x-4">
     <img alt="Placeholder for logo" class="h-12 w-12 rounded-full border-08" height="50" src="../Assets/images/Dog Adoption logo.png" width="50"/>

     <h1 class="text-xl font-bold">
      Dog Adoption
     </h1>
    </div>
    <div class="flex items-center space-x-4">
     <a class="hover:text-orange-500 text-lg" href="#">
      Home
     </a>
     <a class="hover:text-orange-500 text-lg" href="./viewdogs.php">
      Adopt
     </a>
     <a class="hover:text-orange-500 text-lg" href="./donate.php">
      Donate
     </a>
     <a class="hover:text-orange-500 text-lg" href="#contact">
      Contact
     </a>
     <?php if (isset($_SESSION['user_id'])): ?>
        <!-- Show "Sign Out" if the user is logged in -->
        <a class="bg-orange-500 text-white px-4 py-2 rounded-lg" href="logout.php">Sign Out</a>
     <?php else: ?>
        <!-- Show "Sign In" if the user is logged out -->
        <a class="bg-orange-500 text-white px-4 py-2 rounded-lg" href="login.php">Sign In</a>
     <?php endif; ?>
    </div>
   </div>
  </nav>
 <!-- main screen section -->
    <div class="hero bg-cover bg-center h-screen flex items-center text-white justify-left " style="background-image: url('../Assets/images/mainimg.jpeg');">
   <h2 class="text-6xl font-bold py-4 pl-8">
    Find Your New Best Friend
   </h2>
  </div>
  <!-- mid section  -->
  <div class="container mx-auto my-8 px-4">
   <div class="flex flex-col md:flex-row items-center">
    <img alt="A group of street dogs in an urban environment" class="w-full md:w-2/4 h-full object-cover rounded-lg shadow-md" src="../Assets/images/streetdog image.jpeg"/>
    <div class="md:ml-8 mt-4 md:mt-0">
     <h2 class="text-4xl font-bold mb-4">
      Street Dogs are Resilient and Adaptable
     </h2>
     <p class="text-1xl">
      Street dogs, also known as community dogs or stray dogs, often have remarkable survival instincts. They are highly adaptable and learn how to navigate urban environments to find food and shelter. Despite facing harsh conditions, many street dogs develop strong social bonds with humans and other dogs, making them wonderful candidates for adoption.
     </p>
    </div>
   </div>
  </div>
  <div id= "contact" class="container mx-auto my-8 px-4">
   <h2 class="text-3xl font-bold mb-4">
    Contact Us
   </h2>
   <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    <div class="bg-white rounded-lg shadow-md p-4">
     <h3 class="text-xl font-bold mb-2">
      Our Office
     </h3>
     <p>
      New baneswor
     </p>
     <p>
      Kathmandu
     </p>
     <p>
      Phone: +977 9841234567
     </p>
     <p>
      Email: Demo@petadoptionwebsite.com
     </p>
     <iframe class="w-full h-80 object-cover mt-4" height="300" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2039.9086673891056!2d85.32859401861703!3d27.694575231808678!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19a35ae3bc27%3A0xe958e4fbbefbfc50!2sMADAN%20BHANDARI%20MEMORIAL%20COLLEGE!5e0!3m2!1sen!2snp!4v1736175828169!5m2!1sen!2snp" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="bg-white rounded-lg shadow-md p-4">
     <form>
      <div class="mb-4">
       <label class="block text-gray-700" for="name">
        Name
       </label>
       <input class="w-full px-3 py-2 border rounded-lg" id="name" placeholder="Your Name" type="text"/>
      </div>
      <div class="mb-4">
       <label class="block text-gray-700" for="email">
        Email
       </label>
       <input class="w-full px-3 py-2 border rounded-lg" id="email" placeholder="Your Email" type="email"/>
      </div>
      <div class="mb-4">
       <label class="block text-gray-700" for="phonenumber">
        Phone number
       </label>
       <input class="w-full px-3 py-2 border rounded-lg" id="email" placeholder="Your Number" type="Tel"/>
      </div>
      <div class="mb-4">
       <label class="block text-gray-700" for="message">
        Message
       </label>
       <textarea class="w-full px-3 py-2 border rounded-lg" id="message" placeholder="Your Message" rows="4">
       </textarea>
      </div>
      <button class="bg-orange-500 text-white px-4 py-2 rounded-lg" type="submit">
       Send Message
      </button>
     </form>
    </div>
   </div>
  </div>
  <footer class="bg-gray-800 text-white py-4">
   <div class="container mx-auto text-center">
    <p>
     © 2023 Pet Adoption Website. All rights reserved.
    </p>
   </div>
  </footer>
 </body>
</html>
<script>
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        target.scrollIntoView({ behavior: 'smooth' });
      }
    });
  });
</script>
