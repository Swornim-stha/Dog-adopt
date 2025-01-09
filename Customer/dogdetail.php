<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Dog Adoption Dashboard
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet"/>
  <script src="https://cdn.tailwindcss.com">
  </script>
 </head>
 <body class="bg-gray-100 font-roboto">
  <div class="fixed top-0 left-0 h-full w-0 bg-white z-50 overflow-x-hidden transition-width duration-500" id="mySidebar">
   <a class="absolute top-0 right-4 text-3xl" href="javascript:void(0)" onclick="closeNav()">
    X
   </a>
   <a class="block py-4 px-4 text-lg text-black hover:text-green-500" href="#">
    Manage Requests
   </a>
   <a class="block py-4 px-4 text-lg text-black hover:text-green-500" href="#">
    Manage Dogs
   </a>
  </div>
  <div class="transition-margin duration-500" id="main">
   <div class="bg-green-500 text-white p-4 flex justify-between items-center">
    <div class="flex items-center">
     <button class="openbtn text-2xl" onclick="openNav()">
      <i class="fas fa-bars">
      </i>
     </button>
     <img alt="Dog Adoption Logo" class="h-12 w-12 ml-3 mr-3 rounded-full border-2" height="40" src="https://storage.googleapis.com/a1aa/image/lahAfMZfsKhaiUXBrXYexiKyTZdEJZ4qdH4bmcD79ZVJlkDoA.jpg" width="40"/>
     <h1 class="text-xl font-bold">
      Dog Adoption
     </h1>
    </div>
    <div class="flex items-center">
     <img alt="Profile Picture of the logged-in user" class="h-10 w-10 rounded-full ml-3" height="40" id="profile-picture" src="https://storage.googleapis.com/a1aa/image/i2KBU1xXbvIcAhHnVM3xZmP7fLNrGcak2oAfaZMnafIRlkDoA.jpg" width="40"/>
     <button class="bg-red-500 text-white px-4 py-2 rounded ml-3" onclick="signOut()">
      Sign Out
     </button>
    </div>
   </div>
   <div class="container mx-auto p-4">
    <!-- Quick Actions -->
    <div class="mb-4 flex space-x-2">
     <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600" onclick="showAddForm()">
      Add New Dog
     </button>
     <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600" onclick="bulkDelete()">
      Delete Selected
     </button>
    </div>
    <!-- Dog List Table -->
    <div class="overflow-x-auto">
     <table class="min-w-full bg-white border border-gray-200">
      <thead>
       <tr class="bg-green-500 text-white">
        <th class="p-2 text-left">
         <input onclick="selectAll(this)" type="checkbox"/>
        </th>
        <th class="p-2 text-left">
         ID
        </th>
        <th class="p-2 text-left">
         Name
        </th>
        <th class="p-2 text-left">
         Breed
        </th>
        <th class="p-2 text-left">
         Age
        </th>
        <th class="p-2 text-left">
         Status
        </th>
        <th class="p-2 text-left">
         Image
        </th>
        <th class="p-2 text-left">
         Actions
        </th>
       </tr>
      </thead>
      <tbody id="dogTable">
       <tr class="border-t border-gray-200" data-id="001">
        <td class="p-2">
         <input name="dog-select" type="checkbox"/>
        </td>
        <td class="p-2 text-left">
         001
        </td>
        <td class="p-2 text-left">
         Bella
        </td>
        <td class="p-2 text-left">
         Labrador
        </td>
        <td class="p-2 text-left">
         2
        </td>
        <td class="p-2 text-left">
         Adopted
        </td>
        <td class="p-2 text-left">
         <img alt="Image of Bella, a 2-year-old Labrador" class="h-10 w-10 rounded-full" height="40" src="https://storage.googleapis.com/a1aa/image/eWPMPq0cf9mEk0IHcQwdJnlivxLrefPBmyqkLR6ofc10USOgC.jpg" width="40"/>
        </td>
        <td class="p-2 text-left">
         <button class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600" onclick="editDog(this)">
          Edit
         </button>
         <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600" onclick="deleteDog(this)">
          Delete
         </button>
        </td>
       </tr>
       <tr class="border-t border-gray-200" data-id="002">
        <td class="p-2">
         <input name="dog-select" type="checkbox"/>
        </td>
        <td class="p-2 text-left">
         002
        </td>
        <td class="p-2 text-left">
         Max
        </td>
        <td class="p-2 text-left">
         Golden Retriever
        </td>
        <td class="p-2 text-left">
         3
        </td>
        <td class="p-2 text-left">
         Available
        </td>
        <td class="p-2 text-left">
         <img alt="Image of Max, a 3-year-old Golden Retriever" class="h-10 w-10 rounded-full" height="40" src="https://storage.googleapis.com/a1aa/image/8IuLvdOrzApACl3gjAXsJM1JJZLUtezpqUhkEEG7V1MRJ5AKA.jpg" width="40"/>
        </td>
        <td class="p-2 text-left">
         <button class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600" onclick="editDog(this)">
          Edit
         </button>
         <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600" onclick="deleteDog(this)">
          Delete
         </button>
        </td>
       </tr>
      </tbody>
     </table>
    </div>
   </div>
  </div>
  <!-- Add/Edit Dog Form -->
  <div class="fixed inset-0 bg-black bg-opacity-50 hidden" id="overlay">
  </div>
  <div class="fixed inset-0 flex items-center justify-center hidden" id="dogForm">
   <div class="bg-white p-6 rounded shadow-lg w-96">
    <h2 class="text-xl mb-4" id="formTitle">
     Add New Dog
    </h2>
    <form id="dogFormContent">
     <input id="dogId" type="hidden"/>
     <input class="w-full mb-2 p-2 border rounded" id="dogName" placeholder="Name" required="" type="text"/>
     <input class="w-full mb-2 p-2 border rounded" id="dogBreed" placeholder="Breed" required="" type="text"/>
     <input class="w-full mb-2 p-2 border rounded" id="dogAge" placeholder="Age" required="" type="number"/>
     <select class="w-full mb-2 p-2 border rounded" id="dogStatus" required="">
      <option disabled="" selected="" value="">
       Status
      </option>
      <option value="Available">
       Available
      </option>
      <option value="Adopted">
       Adopted
      </option>
     </select>
     <input class="w-full mb-2 p-2 border rounded" id="dogImage" placeholder="Image URL" type="text"/>
     <input class="w-full mb-2 p-2 border rounded" id="dogImageFile" type="file" accept="image/*" onchange="previewImage(event)"/>
     <img id="imagePreview" class="h-20 w-20 rounded-full mb-2 hidden" alt="Image Preview"/>
     <button class="bg-green-500 text-white w-full py-2 rounded hover:bg-green-600" id="saveButton" type="submit">
      Save
     </button>
     <button class="bg-red-500 text-white w-full py-2 rounded mt-2 hover:bg-red-600" onclick="closeForm()" type="button">
      Cancel
     </button>
    </form>
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
   const dogForm = document.getElementById('dogForm');
   const overlay = document.getElementById('overlay');
   const dogTable = document.getElementById('dogTable');
   function showAddForm() {
    document.getElementById('formTitle').textContent = 'Add New Dog';
    document.getElementById('dogId').value = '';
    document.getElementById('dogName').value = '';
    document.getElementById('dogBreed').value = '';
    document.getElementById('dogAge').value = '';
    document.getElementById('dogStatus').value = '';
    document.getElementById('dogImage').value = '';
    document.getElementById('dogImageFile').value = '';
    document.getElementById('imagePreview').classList.add('hidden');
    dogForm.classList.remove('hidden');
    overlay.classList.remove('hidden');
   }
   function closeForm() {
    dogForm.classList.add('hidden');
    overlay.classList.add('hidden');
   }
   function editDog(button) {
    const row = button.closest('tr');
    const id = row.dataset.id;
    const name = row.children[2].textContent;
    const breed = row.children[3].textContent;
    const age = row.children[4].textContent;
    const status = row.children[5].textContent;
    const image = row.children[6].children[0].src;
    document.getElementById('formTitle').textContent = 'Edit Dog';
    document.getElementById('dogId').value = id;
    document.getElementById('dogName').value = name;
    document.getElementById('dogBreed').value = breed;
    document.getElementById('dogAge').value = age;
    document.getElementById('dogStatus').value = status;
    document.getElementById('dogImage').value = image;
    document.getElementById('dogImageFile').value = '';
    document.getElementById('imagePreview').src = image;
    document.getElementById('imagePreview').classList.remove('hidden');
    dogForm.classList.remove('hidden');
    overlay.classList.remove('hidden');
   }
   function deleteDog(button) {
    const row = button.closest('tr');
    const id = row.dataset.id;
    if (confirm(`Are you sure you want to delete dog with ID: ${id}?`)) {
     row.remove();
    }
   }
   document.getElementById('dogFormContent').addEventListener('submit', function(event) {
    event.preventDefault();
    const id = document.getElementById('dogId').value || new Date().getTime().toString();
    const name = document.getElementById('dogName').value;
    const breed = document.getElementById('dogBreed').value;
    const age = document.getElementById('dogAge').value;
    const status = document.getElementById('dogStatus').value;
    const image = document.getElementById('dogImage').value || document.getElementById('imagePreview').src;
    if (document.getElementById('formTitle').textContent === 'Edit Dog') {
     const row = dogTable.querySelector(`tr[data-id='${id}']`);
     row.children[2].textContent = name;
     row.children[3].textContent = breed;
     row.children[4].textContent = age;
     row.children[5].textContent = status;
     row.children[6].children[0].src = image;
    } else {
     const newRow = document.createElement('tr');
     newRow.dataset.id = id;
     newRow.innerHTML = `
            <td class="p-2"><input type="checkbox" name="dog-select"></td>
            <td class="p-2 text-left">${id}</td>
            <td class="p-2 text-left">${name}</td>
            <td class="p-2 text-left">${breed}</td>
            <td class="p-2 text-left">${age}</td>
            <td class="p-2 text-left">${status}</td>
            <td class="p-2 text-left"><img src="${image}" alt="Image of ${name}, a ${age}-year-old ${breed}" class="h-10 w-10 rounded-full" height="40" width="40"></td>
            <td class="p-2 text-left">
                <button onclick="editDog(this)" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">Edit</button>
                <button onclick="deleteDog(this)" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Delete</button>
            </td>
        `;
     dogTable.appendChild(newRow);
    }
    closeForm();
   });
   function bulkDelete() {
    const checkboxes = document.querySelectorAll("input[name='dog-select']:checked");
    checkboxes.forEach(checkbox => {
     const row = checkbox.closest('tr');
     row.remove();
    });
   }
   function selectAll(checkbox) {
    const checkboxes = document.querySelectorAll("input[name='dog-select']");
    checkboxes.forEach(cb => cb.checked = checkbox.checked);
   }
   function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function() {
     const output = document.getElementById('imagePreview');
     output.src = reader.result;
     output.classList.remove('hidden');
    };
    reader.readAsDataURL(event.target.files[0]);
   }
   // Example user data (Replace this with dynamic data from your backend)
   const userProfilePicture = "https://placehold.co/40x40"; // Replace with actual user profile picture URL
   // Update the profile picture dynamically
   document.getElementById('profile-picture').src = userProfilePicture;
   // Example data (Replace this with dynamic data from backend)
   const dogsLeft = 10; // Replace with actual data
   const requestsPending = 5; // Replace with actual data
   // Update the counts dynamically
   document.getElementById('dogs-left').textContent = dogsLeft;
   document.getElementById('requests-pending').textContent = requestsPending;
  </script>
 </body>
</html>