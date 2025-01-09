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
 <body class="bg-gray-100">
  <!-- Navigation section -->
  <nav class="bg-gray-800 text-white py-2">
   <div class="container mx-auto flex justify-between items-center">
    <div class="flex items-center space-x-4">
     <img alt="Placeholder for logo" class="h-12 w-12 rounded-full border-08" height="50" src="../Assets/images/Dog Adoption logo.png" width="50"/>
     <h1 class="text-xl font-bold">
      Dog Adoption
     </h1>
    </div>
    <div class="flex items-center space-x-4">
     <a class="hover:text-orange-500 text-lg" href="./index.php">
      Home
     </a>
     <a class="hover:text-orange-500 text-lg" href="./viewdogs.php">
      Adopt
     </a>
     <a class="hover:text-orange-500 text-lg" href="donate.php">
      Donate
     </a>
     <a class="hover:text-orange-500 text-lg" href="./#contact">
      Contact
     </a>
     <a class="bg-orange-500 text-white px-4 py-2 rounded-full" href="index.php" style="border-radius: 50px;">
      Sign Out
     </a>
    </div>
   </div>
  </nav>
  <!-- Main content section -->
  <div class="container mx-auto py-8">
   <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
     <img alt="A happy Labrador Retriever named Buddy standing in a grassy field" class="w-full h-48 object-cover" height="200" src="https://storage.googleapis.com/a1aa/image/GBqe0c1nrXVvSyWPfW5EC0la3JfqwTuNe5mWl0hx66OrzHHQB.jpg" width="300"/>
     <div class="p-4">
      <h3 class="text-xl font-bold">
       Buddy
      </h3>
      <p>
       Age: 2 years
      </p>
      <p>
       Breed: Labrador Retriever
      </p>
      <a class="bg-green-500 text-white px-4 py-2 rounded-full mt-4 inline-block" href="/adoption-request.php?dog_id=1">
       Adopt
      </a>
     </div>
    </div>
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
     <img alt="A German Shepherd named Max sitting attentively on a porch" class="w-full h-48 object-cover" height="200" src="https://storage.googleapis.com/a1aa/image/1fEfm4DpKDrq1kJNtMLJdSBoMrSrf7l9jiPE2r3pRcOM6jDoA.jpg" width="300"/>
     <div class="p-4">
      <h3 class="text-xl font-bold">
       Max
      </h3>
      <p>
       Age: 3 years
      </p>
      <p>
       Breed: German Shepherd
      </p>
      <a class="bg-green-500 text-white px-4 py-2 rounded-full mt-4 inline-block" href="/adoption-request.php?dog_id=2">
       Adopt
      </a>
     </div>
    </div>
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
     <img alt="A playful Golden Retriever puppy named Bella running in a park" class="w-full h-48 object-cover" height="200" src="https://storage.googleapis.com/a1aa/image/yBxOY98OHYZ2BVqCVxWyyPRHfpsWfrGe2tIxEktU2KCZ6jDoA.jpg" width="300"/>
     <div class="p-4">
      <h3 class="text-xl font-bold">
       Bella
      </h3>
      <p>
       Age: 1 year
      </p>
      <p>
       Breed: Golden Retriever
      </p>
      <a class="bg-green-500 text-white px-4 py-2 rounded-full mt-4 inline-block" href="/adoption-request.php?dog_id=3">
       Adopt
      </a>
     </div>
    </div>
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
     <img alt="A Beagle named Daisy sniffing around in a garden" class="w-full h-48 object-cover" height="200" src="https://storage.googleapis.com/a1aa/image/g0tscRJO0l6BP1ZxuTZqdXkjohesempk3qSIl1yg0pHP9xBUA.jpg" width="300"/>
     <div class="p-4">
      <h3 class="text-xl font-bold">
       Daisy
      </h3>
      <p>
       Age: 4 years
      </p>
      <p>
       Breed: Beagle
      </p>
      <a class="bg-green-500 text-white px-4 py-2 rounded-full mt-4 inline-block" href="/adoption-request.php?dog_id=4">
       Adopt
      </a>
     </div>
    </div>
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
     <img alt="A friendly Bulldog named Rocky lying on a couch" class="w-full h-48 object-cover" height="200" src="https://storage.googleapis.com/a1aa/image/JPC9XoU5a7atE9V1hfKihjMlXQ1VvGrVe0PuI7L6XSVN9xBUA.jpg" width="300"/>
     <div class="p-4">
      <h3 class="text-xl font-bold">
       Rocky
      </h3>
      <p>
       Age: 5 years
      </p>
      <p>
       Breed: Bulldog
      </p>
      <a class="bg-green-500 text-white px-4 py-2 rounded-full mt-4 inline-block" href="/adoption-request.php?dog_id=5">
       Adopt
      </a>
     </div>
    </div>
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
     <img alt="A Poodle named Coco standing elegantly in a garden" class="w-full h-48 object-cover" height="200" src="https://storage.googleapis.com/a1aa/image/LsAQSwMPkJrLL9F0agc5Pw9ujSF8Uk38qRNt4iR6rFIOf4AKA.jpg" width="300"/>
     <div class="p-4">
      <h3 class="text-xl font-bold">
       Coco
      </h3>
      <p>
       Age: 3 years
      </p>
      <p>
       Breed: Poodle
      </p>
      <a class="bg-green-500 text-white px-4 py-2 rounded-full mt-4 inline-block" href="/adoption-request.php?dog_id=6">
       Adopt
      </a>
     </div>
    </div>
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
     <img alt="A Shih Tzu named Luna sitting on a colorful blanket" class="w-full h-48 object-cover" height="200" src="https://storage.googleapis.com/a1aa/image/n6TJpq96stqhAJZyvXL3nxIyq0ZZwQZK9QV0IKwDi4GRf4AKA.jpg" width="300"/>
     <div class="p-4">
      <h3 class="text-xl font-bold">
       Luna
      </h3>
      <p>
       Age: 2 years
      </p>
      <p>
       Breed: Shih Tzu
      </p>
      <a class="bg-green-500 text-white px-4 py-2 rounded-full mt-4 inline-block" href="/adoption-request.php?dog_id=7">
       Adopt
      </a>
     </div>
    </div>
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
     <img alt="A Border Collie named Jack playing with a frisbee in a park" class="w-full h-48 object-cover" height="200" src="https://storage.googleapis.com/a1aa/image/henAtFButwW8NiBqfGHEUvp9pGrZKl14NiNsuRJx3qIR9xBUA.jpg" width="300"/>
     <div class="p-4">
      <h3 class="text-xl font-bold">
       Jack
      </h3>
      <p>
       Age: 4 years
      </p>
      <p>
       Breed: Border Collie
      </p>
      <a class="bg-green-500 text-white px-4 py-2 rounded-full mt-4 inline-block" href="/adoption-request.php?dog_id=8">
       Adopt
      </a>
     </div>
    </div>
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
     <img alt="A Dachshund named Oscar peeking out from under a blanket" class="w-full h-48 object-cover" height="200" src="https://storage.googleapis.com/a1aa/image/lMOuxGfQ1PQtIaNopde5Ryfd8cikESlHNQhcf4A4vVcxzHHQB.jpg" width="300"/>
     <div class="p-4">
      <h3 class="text-xl font-bold">
       Oscar
      </h3>
      <p>
       Age: 3 years
      </p>
      <p>
       Breed: Dachshund
      </p>
      <a class="bg-green-500 text-white px-4 py-2 rounded-full mt-4 inline-block" href="/adoption-request.php?dog_id=9">
       Adopt
      </a>
     </div>
    </div>
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
     <img alt="A Siberian Husky named Shadow running through snow" class="w-full h-48 object-cover" height="200" src="https://storage.googleapis.com/a1aa/image/fqKavDkc4QxkFyoSSfSSAGDee1fvePRoyeRroQFO6Nuke8xBUA.jpg" width="300"/>
     <div class="p-4">
      <h3 class="text-xl font-bold">
       Shadow
      </h3>
      <p>
       Age: 2 years
      </p>
      <p>
       Breed: Siberian Husky
      </p>
      <a class="bg-green-500 text-white px-4 py-2 rounded-full mt-4 inline-block" href="/adoption-request.php?dog_id=10">
       Adopt
      </a>
     </div>
    </div>
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
     <img alt="A Cocker Spaniel named Charlie sitting on a porch" class="w-full h-48 object-cover" height="200" src="https://storage.googleapis.com/a1aa/image/RKBlmOXVjuqdMdCrB831gjCq5ZEvabrOQneRkeW1Nm4B9xBUA.jpg" width="300"/>
     <div class="p-4">
      <h3 class="text-xl font-bold">
       Charlie
      </h3>
      <p>
       Age: 4 years
      </p>
      <p>
       Breed: Cocker Spaniel
      </p>
      <a class="bg-green-500 text-white px-4 py-2 rounded-full mt-4 inline-block" href="/adoption-request.php?dog_id=11">
       Adopt
      </a>
     </div>
    </div>
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
     <img alt="A Chihuahua named Peanut standing on a table" class="w-full h-48 object-cover" height="200" src="https://storage.googleapis.com/a1aa/image/zA4Uea9Uv12eM0Ysnc6BK0BRcy1Wq9qYEKaSv8D155t28xBUA.jpg" width="300"/>
     <div class="p-4">
      <h3 class="text-xl font-bold">
       Peanut
      </h3>
      <p>
       Age: 1 year
      </p>
      <p>
       Breed: Chihuahua
      </p>
      <a class="bg-green-500 text-white px-4 py-2 rounded-full mt-4 inline-block" href="/adoption-request.php?dog_id=12">
       Adopt
      </a>
     </div>
    </div>
    </div>  
    </div>
   </div>
  </div>
 </body>
</html>