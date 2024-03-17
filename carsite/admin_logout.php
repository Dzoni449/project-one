<?php
session_start();
include('includes/header.php');

// Provera da li je korisnik ulogovan
if (!isset($_SESSION['auth'])) {
    header('Location: admin_login.php'); // Ako nije ulogovan, preusmerava ga na stranicu za prijavljivanje
}

// Odjava korisnika
if (isset($_POST['logout_btn'])) {
    session_unset(); // Brisanje svih podataka sesije
    session_destroy(); // Uništavanje sesije
    header('Location: admin_login.php'); // Preusmerava ga na stranicu za prijavljivanje nakon odjavljivanja
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Logout</title>
    <link rel="stylesheet" href="../css/style.css"> <!-- Prilagodite putanju prema vašim potrebama -->
</head>
<body>
    <div class="mt-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Admin Logout</h4>
                    </div>
                    <div class="card-body">
                        <form action="admin_logout.php" method="POST">
                            <p>Are you sure you want to logout?</p>
                            <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    
</body>
</html>
