function confirmDelete() {
    // Display a confirmation dialog
    var result = confirm("Are you sure you want to delete this user?");

    // Check the result of the confirmation dialog
    if (result) {
        // If user clicks OK, redirect to delete user script
        window.location.href = "delete_user.php";
    } else {
        // If user clicks Cancel, do nothing
    }
}