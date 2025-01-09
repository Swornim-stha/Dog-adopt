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

    document.getElementById('formTitle').textContent = 'Edit Dog';
    document.getElementById('dogId').value = id;
    document.getElementById('dogName').value = name;
    document.getElementById('dogBreed').value = breed;
    document.getElementById('dogAge').value = age;
    document.getElementById('dogStatus').value = status;

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

    if (document.getElementById('formTitle').textContent === 'Edit Dog') {
        const row = dogTable.querySelector(`tr[data-id='${id}']`);
        row.children[2].textContent = name;
        row.children[3].textContent = breed;
        row.children[4].textContent = age;
        row.children[5].textContent = status;
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