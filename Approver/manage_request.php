<html>
 <head>
  <title>
   Dog Adoption Management
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
      font-family: 'Roboto', sans-serif;
    }
  </style>
 </head>
 <body class="bg-gray-100 font-roboto">
  <!-- Sidebar Menu -->
  <div class="fixed top-0 left-0 h-full w-0 bg-white z-50 overflow-x-hidden transition-width duration-500" id="mySidebar">
   <a class="absolute top-0 right-4 text-3xl" href="javascript:void(0)" onclick="closeNav()">
   ×
   </a>
   <a class="block py-4 px-4 text-lg text-black hover:text-gray-500" href="./dashboard.php">
    Dashboard
   </a>
   <a class="block py-4 px-4 text-lg text-black hover:text-gray-500" href="./manage_dog.php">
    Manage Dogs
   </a>
   <a class="block py-4 px-4 text-lg text-black hover:text-gray-500" href="./manage_request.php">
    Manage Requests
   </a>
  </div>
  <!-- Main content area -->
  <div class="transition-margin duration-500" id="main">
   <!-- Top Nav Bar -->
   <div class="bg-gray-800 text-white p-4 flex justify-between items-center">
    <div class="flex items-center">
     <button class="openbtn text-2xl" onclick="openNav()">
      <i class="fas fa-bars">
      </i>
     </button>
     <img alt="Dog Adoption Logo" class="h-12 w-12 ml-3 mr-3 rounded-full border-2" height="40" src="../Assets/images/Dog Adoption logo.png" width="40"/>
     <h1 class="text-xl font-bold">
      Dog Adoption
     </h1>
    </div>
    <div class="flex items-center">
     <img alt="Profile Picture of the logged-in user" class="h-10 w-10 rounded-full ml-3" height="40" id="profile-picture" src="https://storage.googleapis.com/a1aa/image/CoIeUvRLtAwHSapzyIJCDQLBCgFafotes3WQAkZ0jiR802EoA.jpg" width="40"/>
     <button class="bg-red-500 text-white px-4 py-2 rounded ml-3" onclick="signOut()">
      Sign Out
     </button>
    </div>
   </div>
   <!-- Main content -->
   <table class="w-3/4 border border-gray-200 mx-auto mt-10 p-6 shadow-lg rounded-lg">
    <thead>
     <tr>
      <th class="py-2 px-4 border-b bg-green-500 text-white">
       #
      </th>
      <th class="py-2 px-4 border-b bg-green-500 text-white">
       Dog Name
      </th>
      <th class="py-2 px-4 border-b bg-green-500 text-white">
       Customer Name
      </th>
      <th class="py-2 px-4 border-b bg-green-500 text-white">
       Date Requested
      </th>
      <th class="py-2 px-4 border-b bg-green-500 text-white">
       Status
      </th>
      <th class="py-2 px-4 border-b bg-green-500 text-white">
       Actions
      </th>
     </tr>
    </thead>
    <tbody id="requestTable">
     <!-- Example Requests -->
     <tr class="bg-gray-50">
      <td class="py-2 px-4 border-b text-center">
       1
      </td>
      <td class="py-2 px-4 border-b text-center">
       Max
      </td>
      <td class="py-2 px-4 border-b text-center">
       John Doe
      </td>
      <td class="py-2 px-4 border-b text-center">
       2025-01-05
      </td>
      <td class="py-2 px-4 border-b text-center">
       <span class="status status-pending text-yellow-500 font-bold">
        Pending
       </span>
      </td>
      <td class="py-2 px-4 border-b text-center">
       <button class="btn btn-view bg-teal-500 text-white py-1 px-3 rounded hover:bg-teal-600" onclick="viewDetails('John Doe', 'New York', 'Software Engineer', '123-456-7890', 'john.doe@example.com')">
        View
       </button>
       <button class="btn btn-approve bg-green-500 text-white py-1 px-3 rounded hover:bg-green-600" onclick="confirmAction(this, 'Approve')">
        Approve
       </button>
       <button class="btn btn-reject bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600" onclick="confirmAction(this, 'Reject')">
        Reject
       </button>
      </td>
     </tr>
     <tr>
      <td class="py-2 px-4 border-b text-center">
       2
      </td>
      <td class="py-2 px-4 border-b text-center">
       Bella
      </td>
      <td class="py-2 px-4 border-b text-center">
       Jane Smith
      </td>
      <td class="py-2 px-4 border-b text-center">
       2025-01-04
      </td>
      <td class="py-2 px-4 border-b text-center">
       <span class="status status-pending text-yellow-500 font-bold">
        Pending
       </span>
      </td>
      <td class="py-2 px-4 border-b text-center">
       <button class="btn btn-view bg-teal-500 text-white py-1 px-3 rounded hover:bg-teal-600" onclick="viewDetails('Jane Smith', 'Los Angeles', 'Teacher', '987-654-3210', 'jane.smith@example.com')">
        View
       </button>
       <button class="btn btn-approve bg-green-500 text-white py-1 px-3 rounded hover:bg-green-600" onclick="confirmAction(this, 'Approve')">
        Approve
       </button>
       <button class="btn btn-reject bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600" onclick="confirmAction(this, 'Reject')">
        Reject
       </button>
      </td>
     </tr>
    </tbody>
   </table>
  </div>
  <!-- Popup for confirmation -->
  <div class="popup fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden" id="confirmPopup">
   <div class="popup-content bg-white p-6 rounded-lg shadow-lg text-center">
    <p class="mb-4 text-lg" id="popupMessage">
    </p>
    <button class="btn btn-approve bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600" id="confirmYes">
     Yes
    </button>
    <button class="btn btn-reject bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600" id="confirmNo">
     No
    </button>
   </div>
  </div>
  <!-- Popup for client details -->
  <div class="popup fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden" id="detailsPopup">
   <div class="popup-content bg-white p-6 rounded-lg shadow-lg text-center">
    <h3 class="text-xl font-bold mb-4">
     Client Details
    </h3>
    <p class="mb-2" id="clientName">
    </p>
    <p class="mb-2" id="clientPlace">
    </p>
    <p class="mb-2" id="clientWork">
    </p>
    <p class="mb-2" id="clientContact">
    </p>
    <p class="mb-4" id="clientEmail">
    </p>
    <button class="btn btn-view bg-teal-500 text-white py-2 px-4 rounded hover:bg-teal-600" onclick="closeDetails()">
     Close
    </button>
   </div>
  </div>
  <script>
   let actionButton; 
    let actionType;   

    // Show confirmation popup
    function confirmAction(button, action) {
      actionButton = button;
      actionType = action;

      const message = `Are you sure you want to ${action} this request?`;
      document.getElementById('popupMessage').textContent = message;

      document.getElementById('confirmPopup').classList.remove('hidden');
    }

    // Confirm action
    document.getElementById('confirmYes').addEventListener('click', () => {
      updateStatus(actionButton, actionType);
      document.getElementById('confirmPopup').classList.add('hidden');
    });

    // Cancel action
    document.getElementById('confirmNo').addEventListener('click', () => {
      document.getElementById('confirmPopup').classList.add('hidden');
    });

    // Update status
    function updateStatus(button, newStatus) {
      const row = button.closest('tr');
      const statusCell = row.querySelector('.status');
      
      statusCell.textContent = newStatus;
      statusCell.className = 'status'; // Reset classes

      if (newStatus === 'Approved') {
        statusCell.classList.add('status-approved', 'text-green-500');
      } else if (newStatus === 'Rejected') {
        statusCell.classList.add('status-rejected', 'text-red-500');
      }

      // Disable buttons
      const buttons = row.querySelectorAll('.btn');
      buttons.forEach(btn => btn.disabled = true);
    }

    // Show client details
    function viewDetails(name, place, work, contact, email) {
      document.getElementById('clientName').textContent = `Name: ${name}`;
      document.getElementById('clientPlace').textContent = `Place: ${place}`;
      document.getElementById('clientWork').textContent = `Work: ${work}`;
      document.getElementById('clientContact').textContent = `Contact: ${contact}`;
      document.getElementById('clientEmail').textContent = `Email: ${email}`;
      document.getElementById('detailsPopup').classList.remove('hidden');
    }

    // Close client details popup
    function closeDetails() {
      document.getElementById('detailsPopup').classList.add('hidden');
    }

    // Open sidebar navigation
    function openNav() {
      document.getElementById("mySidebar").style.width = "250px";
      document.getElementById("main").style.marginLeft = "250px";
    }

    // Close sidebar navigation
    function closeNav() {
      document.getElementById("mySidebar").style.width = "0";
      document.getElementById("main").style.marginLeft = "0";
    }
  </script>
 </body>
</html>