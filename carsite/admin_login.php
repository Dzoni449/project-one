<?php
session_start();

// Uključivanje konekcije sa bazom podataka
include('includes/header.php');
include('database/connection.php');

// Provera da li je korisnik već ulogovan
if (isset($_SESSION['auth'])) {
    if ($_SESSION['role_as'] == 1) {
        header('Location: dashboard.php'); // Ako je već ulogovan kao admin, preusmerava ga na admin dashboard
    } else {
        header('Location: index.php'); // Ako je već ulogovan, ali nije admin, preusmerava ga na početnu stranicu
    }
}

// Provera da li je korisnik poslao zahtev za prijavljivanje
if (isset($_POST['login_btn'])) {
    // Čišćenje unetih podataka
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Provera korisničkih podataka u bazi podataka
    $login_query = "SELECT * FROM users WHERE email='$email' AND password='$password' AND role_as = 1";
    $login_query_run = mysqli_query($con, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {
        // Ako su korisnički podaci tačni i korisnik je admin
        $_SESSION['auth'] = true;

        $userdata = mysqli_fetch_array($login_query_run);
        $username = $userdata['name'];
        $useremail = $userdata['email'];

        $_SESSION['auth_user'] = [
            'name' => $username,
            'email' => $useremail
        ];

        $_SESSION['role_as'] = $userdata['role_as'];

        $_SESSION['message'] = "Logged in Successfully";
        header('Location: dashboard.php'); // Preusmerava ga na admin dashboard
    } else {
        $_SESSION['message'] = "Invalid Credentials";
        header('Location: admin_login.php'); // Ako su korisnički podaci nevažeći, vraća ga na stranicu za prijavljivanje
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/style.css"> <!-- Prilagodite putanju prema vašim potrebama -->
</head>
<body>

<div class="mt-4">
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if(isset($_SESSION['message'])) { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong> <?= $_SESSION['message']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php 
                    unset($_SESSION['message']);
                }
                ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Admin Login</h4>
                    </div>
                    <div class="card-body">
                        <form action="admin_login.php" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" required>
                            </div>
                            <button type="submit" name="login_btn" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
   
</body>
</html>
