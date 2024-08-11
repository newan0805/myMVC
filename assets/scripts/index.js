document.addEventListener('DOMContentLoaded', function () {
    // Function to populate the edit modal with user data
    window.populateEditModal = function (id, username, email, type) {
        document.getElementById('user_id').value = id;
        document.getElementById('username').value = username;
        document.getElementById('email').value = email;
        document.getElementById('type').value = type;
    };

    // Function to handle the submit action for the edit form
    window.submitEditForm = function () {
        var form = document.getElementById('editUserForm');
        var formData = new FormData(form);

        fetch('index.php?action=update_profile', {
            method: 'POST',
            body: formData
        })
            .then(response => response.text())
            .then(result => {
                console.log(result); // Handle success or error messages here
                location.reload(); // Reload page to reflect changes
            })
            .catch(error => console.error('Error:', error));
    };

    // Function to open the delete confirmation modal
    window.confirmDelete = function (userId) {
        document.getElementById('delete_user_id').value = userId;
        var deleteModal = new bootstrap.Modal(document.getElementById('deleteUserModal'));
        deleteModal.show();
    };

    // Function to handle the submit action for the delete form
    window.submitDeleteForm = function () {
        var form = document.getElementById('deleteUserForm');
        var formData = new FormData(form);

        // console.log(form);

        fetch('index.php?action=delete_user', {
            method: 'POST',
            body: formData
        })
            .then(response => response.text())
            .then(result => {
                location.reload(); // Reload page to reflect changes
                console.log(result); // Handle success or error messages here
            })
            .catch(error => console.error('Error:', error));
    };
});