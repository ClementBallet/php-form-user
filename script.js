let deleteUserButtons = document.querySelectorAll("#delete-user-button");

for (const deleteUserButton of deleteUserButtons) {
    let username = deleteUserButton.dataset.username;
    let deleteUserUrl = deleteUserButton.dataset.deleteUserUrl;

    deleteUserButton.addEventListener("click", function () {
        let isConfirmed = window.confirm(`Etes-vous sûr de vouloir supprimer l'utilisateur ${ username } ?`);

        if (isConfirmed) {
            window.location.href = deleteUserUrl;
        } else {
            window.location.href = "/dashboard.php";
        }
    });
}
