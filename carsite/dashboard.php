<?php
session_start();

// Provera da li je korisnik prijavljen kao admin
if (!isset($_SESSION['auth']) || $_SESSION['role_as'] != 1) {
    header('Location: index.php'); // Ako nije, preusmeravamo na početnu stranicu
    exit;
}
include('includes/header.php');
require_once "database/connection.php";

// Brisanje kategorije
if (isset($_GET['delete_category'])) {
    $category_id_to_delete = $_GET['delete_category'];

    // Provera da li postoji proizvod koji koristi datu kategoriju
    $check_product_query = "SELECT * FROM products WHERE category_id = $category_id_to_delete";
    $check_product_result = mysqli_query($con, $check_product_query);

    if (mysqli_num_rows($check_product_result) > 0) {
        // Ako postoji proizvod koji koristi datu kategoriju, ispiši odgovarajuću poruku
        echo "<strong style='color: red;'>Nije moguće obrisati kategoriju jer se koristi u nekom proizvodu,obrisite prvo proizvod u kojem se javlja</strong>";
    } else {
        // Ako ne postoji proizvod koji koristi datu kategoriju, obrišite kategoriju
        $delete_category_query = "DELETE FROM categories WHERE category_id = $category_id_to_delete";
        $delete_category_result = mysqli_query($con, $delete_category_query);

        if ($delete_category_result) {
            echo "<strong> Kategorija je uspešno obrisana.</strong>";
        } else {
            echo "<strong style='color: red;'>Došlo je do greške prilikom brisanja kategorije.</strong>";
        }
    }
}

// Brisanje proizvoda
if (isset($_GET['delete_product'])) {
    $product_id = $_GET['delete_product'];
    $delete_product_query = "DELETE FROM products WHERE id = $product_id";
    mysqli_query($con, $delete_product_query);
    header("Location: dashboard.php"); // Redirekcija nakon brisanja
    exit;
}

// Dodavanje kategorije
if (isset($_POST['add_category'])) {
    $category_name = $_POST['category_name'];
    $insert_category_query = "INSERT INTO categories (name) VALUES ('$category_name')";
    mysqli_query($con, $insert_category_query);
    header("Location: dashboard.php"); // Redirekcija nakon dodavanja
    exit;
}

// Dodavanje proizvoda
if (isset($_POST['add_product'])) {
    // Ostatak koda za prikupljanje informacija o proizvodu

    // Prikupljanje informacija o slici
    $product_name = $_POST['product_name'];
    $category_id = $_POST['category_id'];
    $sifra = $_POST['sifra'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $product_image = $_FILES['product_image'];
    

    // Provera da li je slika uspešno učitana
    if ($product_image['error'] == UPLOAD_ERR_OK) {
        // Odredište na serveru za čuvanje slika
        $upload_directory = "slike/";
        // Generisanje jedinstvenog imena za sliku
        $image_name = uniqid() . "_" . $product_image['name'];
        // Putanja do slike na serveru
        $image_path = $upload_directory . $image_name;

        // Čuvanje slike na serveru
        if (move_uploaded_file($product_image['tmp_name'], $image_path)) {
            // Ažuriranje reda u bazi podataka sa putanjom do slike
            $insert_product_query = "INSERT INTO products (name, category_id, sifra, cena, image_path, description) 
                         VALUES ('$product_name', '$category_id', '$sifra', '$price', '$image_path', '$description')";
            mysqli_query($con, $insert_product_query);

            header("Location: dashboard.php"); // Redirekcija nakon dodavanja
            exit;
        } else {
            echo "Došlo je do greške prilikom čuvanja slike.";
        }
    } else {
        echo "Greška prilikom učitavanja slike.";
    }
}
if (isset($_POST['add_car'])) {
    $car_name = $_POST['car_name'];
    $car_description = $_POST['car_description'];
    $car_image = $_FILES['car_image'];
    
    // Provera da li je slika uspešno učitana
    if ($car_image['error'] == UPLOAD_ERR_OK) {
        // Odredište na serveru za čuvanje slika
        $upload_directory = "slike/";
        // Generisanje jedinstvenog imena za sliku
        $image_name = uniqid() . "_" . $car_image['name'];
        // Putanja do slike na serveru
        $image_path = $upload_directory . $image_name;

        // Čuvanje slike na serveru
        if (move_uploaded_file($car_image['tmp_name'], $image_path)) {
            // Ažuriranje reda u bazi podataka sa putanjom do slike
            $insert_car_query = "INSERT INTO cars (name, image, description) VALUES ('$car_name', '$image_path', '$car_description')";
            mysqli_query($con, $insert_car_query);

            header("Location: dashboard.php"); // Redirekcija nakon dodavanja
            exit;
        } else {
            echo "Došlo je do greške prilikom čuvanja slike automobila.";
        }
    } else {
        echo "Greška prilikom učitavanja slike automobila.";
    }
}
// Brisanje automobila
if (isset($_GET['delete_car'])) {
    $car_id = $_GET['delete_car'];
    $delete_car_query = "DELETE FROM cars WHERE id = $car_id";
    mysqli_query($con, $delete_car_query);
    header("Location: dashboard.php"); // Redirekcija nakon brisanja
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
        <div class="mt-4">
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
            <div class="mb-3">
                <header>
                <h1>Welcome Admin</h1>
                </header>
            </div>          
                <section>
                <h2>Dodaj Kategoriju</h2>
                <form action="" method="POST">
            <div class="mb-3">
                <input type="text" class="form-control" name="category_name" placeholder="Ime Kategorije" required>
            </div>
                <button type="submit" name="add_category" class="btn btn-success">Dodaj Kategoriju</button>
                </form>
                </section>
          
  
            <div class="mb-3">
                <section>
                <h2>Dodaj Proizvod</h2>
            </div> 
                <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="text" class="form-control mb-3" name="product_name" placeholder="Product Name" required>
                <h3>Odaberi sliku:</h3>
                <input type="file" class="form-control mb-3" name="product_image" accept="image/*" required >
                <input type="text" class="form-control mb-3" name="price" placeholder="Cena" required>
                <textarea class="form-control mb-3" name="description" placeholder="Opis proizvoda" required></textarea>
                <select name="category_id" class="form-select mb-3" aria-label="Default select example" required>               
                <option value="">Odaberi Kategoriju</option>
                <?php
                $category_query = "SELECT * FROM categories";
                $category_result = mysqli_query($con, $category_query);
                while ($row = mysqli_fetch_assoc($category_result)) {
                    echo "<option value='" . $row['category_id'] . "'>" . $row['name'] . "</option>";
                }
                ?>
                </select>
                <input type="text" class="form-control mb-3" name="sifra" placeholder="Sifra" required>
            </div>
                <button type="submit" name="add_product" class="btn btn-success mb-3">Dodaj Proizvod</button>
                </form>
                </section>

            <div class="mb-3">
            <section>
                <h2>Categories</h2>
                
            </div>
            <div class="mb-3">
                <ul>                     
                <?php
                $category_query = "SELECT * FROM categories";
                $category_result = mysqli_query($con, $category_query);
                while ($row = mysqli_fetch_assoc($category_result)) {
                echo "<li>" . $row['name'] . " <a href='?delete_category=" . $row['category_id'] . "' class='btn btn-danger mt-2'>Obrisi kategoriju</a></li>";
                }
                ?>
                </ul>
            </div>
                </section>

            <div class="mb-3">
                <section>
                <h2>Products</h2>
            </div>
            <div class="mb-3">
                <ul>
                <?php
                $product_query = "SELECT * FROM products";
                $product_result = mysqli_query($con, $product_query);
                while ($row = mysqli_fetch_assoc($product_result)) {
                echo "<li>" . $row['name'] . " - Sifra: " . $row['sifra'] . " <a href='?delete_product=" . $row['id'] . "' class='btn btn-danger mt-2'>Obrisi proizvod</a></li>";
                }
                ?>
                </ul>
            </div>
                </section>
            </div>      
            </div> 
             <!-- Forma za dodavanje automobila -->
             <section class="mb-6">
                        <h2>Dodaj Automobil</h2>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <input type="text" class="form-control mb-3" name="car_name" placeholder="Ime Automobila" required>
                                <h3>Odaberi sliku:</h3>
                                <input type="file" class="form-control mb-3" name="car_image" accept="image/*" required >
                                <textarea class="form-control mb-3" name="car_description" placeholder="Opis automobila" required></textarea>
                            </div>
                            <button type="submit" name="add_car" class="btn btn-success mb-3">Dodaj Automobil</button>
                        </form>

                        <ul>
                        <?php
                            $product_query = "SELECT * FROM cars";
                            $product_result = mysqli_query($con, $product_query);
                             while ($row = mysqli_fetch_assoc($product_result)) {
                            echo "<li>" . $row['name'] . ""  . " <a href='?delete_car=" . $row['id'] . "' class='btn btn-danger mt-2'>Obrisi automobil</a></li>";
                                }
                         ?>
                        </ul>

                    </section>

                    <!-- Prikaz automobila -->
                    
                    </div>
                </div>   
            </div> 
        </div>
        
    
</body>
</html>
<?php include('includes/footer.php');?>
