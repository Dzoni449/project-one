<?php
session_start();

// Uključivanje konekcije sa bazom podataka
include('includes/header.php');
include('database/connection.php');

// Provera da li je korisnik već ulogovan kao admin
if (isset($_SESSION['auth']) && $_SESSION['role_as'] == 1) {
    header('Location: dashboard.php'); // Ako je već ulogovan, preusmerava ga na admin panel
}

// Provera da li je korisnik poslao zahtev za registraciju
if (isset($_POST['register_btn'])) {
    // Čišćenje i validacija unetih podataka
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

    // Provera da li je email već registrovan
    $check_email_query = "SELECT email FROM users WHERE email='$email' ";
    $check_email_query_run = mysqli_query($con, $check_email_query);
    
    if (mysqli_num_rows($check_email_query_run) > 0) {
        $_SESSION['message'] = "Email already registered!";
        header('Location: admin_register.php'); // Ako je email već registrovan, vraća ga na stranicu za registraciju
    } else {
        // Provera da li se lozinke poklapaju
        if ($password == $cpassword) {
            // Ubacivanje admina u bazu podataka
            $insert_query= "INSERT INTO users (name, email, password, role_as) VALUES ('$name', '$email', '$password', 0)";
            $insert_query_run = mysqli_query($con, $insert_query);
    
            if ($insert_query_run) {
                $_SESSION['message'] = "Admin registered successfully!";
                header('Location: admin_login.php'); // Ako je registracija uspešna, preusmerava ga na stranicu za prijavljivanje
            } else {
                $_SESSION['message'] = "Something went wrong!";
                header('Location: admin_register.php'); // Ako se desi greška prilikom ubacivanja u bazu, vraća ga na stranicu za registraciju
            }
        } else {
            $_SESSION['message'] = "Passwords do not match!";
            header('Location: admin_register.php'); // Ako se lozinke ne poklapaju, vraća ga na stranicu za registraciju
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"> <!-- Prilagodite putanju prema vašim potrebama -->
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
                        <h4>Admin Registration</h4>
                    </div>
                    <div class="card-body">
                        <form action="admin_register.php" method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="cpassword" class="form-label">Confirm Password</label>
                                <input type="password" name="cpassword" class="form-control" id="cpassword" required>
                            </div>
                            <button type="submit" name="register_btn" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>   
</body>
</html>
