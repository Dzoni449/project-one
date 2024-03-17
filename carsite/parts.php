<?php
    include('database/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Euro-018</title>

    <link rel="stylesheet" href="style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<style>
    .logo-image {
        width: 170px;
        height:auto; /* Promenite dimenzije slike prema potrebi */
        margin-left: 8%; /* Dodajte levu marginu od 10% */
    }
    .border-right {
    border-right: 10px solid #ccc; /* Promenite boju granice prema vašim potrebama */
    }
    .purple-icon {
    color: #9966cc;
    }
    #boja11{
        border-bottom: 5px solid #9966cc;    
        padding-bottom:0%;          
    }
    .collapse{
    margin-right: 8%; 
   
    }
    .navbar-brand{
    margin-left: 8%; 
    }
    .navbar-text{
    margin-right: 8%; 
    }
    .navbar-text {
    margin-left: 8%;
    border-left: 4px solid #9966cc; /* Dodajte boju koja vam odgovara */
    padding-left: 10px; /* Opciono: dodajte razmak između teksta i ivice */
    }
    #textic {
    color:#9966cc;
    font-size: 30px;
    font-weight: bold; /* Boldiranje teksta */
    }   

    #textic span {
    color: #9966cc; /* Boja teksta za span unutar #textic */
     /* Povećavanje fonta za span unutar #textic */
    }
    .phone-number:hover {
    color: #9966cc;
    cursor:pointer;
    }
    .navbar-nav{
        padding-bottom:0%;
    }
    #textic,
    .navbar-nav {
    margin-bottom: 0;
    }

    #active{
        background-color: #9966cc;
        color:white;
       
    }
    #LBH{
        border-right:1px solid #E0E0E0;
    }
    #LBH:hover{
        background-color: #9966cc;
        color:white;
    }
    #naprvih{
        color:white;
    }
    #naprvih:hover{
        color:#9966cc;
    }
    #naprvih i:hover{
        color:white;
    }
    #idi{
        border-top: 5px solid #9966cc;
        padding-top: 20px;
    }
    #dugme{
        color:white;
        background-color: #9966cc;
    }
    #dugme:hover{
        border:1px solid #9966cc;
        background-color:white;
        color:#9966cc;
    }

    .col-md-4:hover {
    transform: translateY(-10px); /* Pomeri div 5 piksela na gore kada je hoverovan */
    cursor:pointer;
    }
    #aizmeni{
        text-decoration: none;
        color:black;
    }
    #paddingb{
        padding-bottom:20px;
    }
    #cursor:hover{
        cursor: pointer;
    }
    #mtTop{
        padding-bottom:0%;
        margin-bottom:0%;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid mt-auto">
             <!-- Logo na levoj strani -->
        <a class="navbar-brand mt-auto" href="index.php">
            <img src="slike/Euro 128.png" alt="Logo" class="logo-image">
        </a>
        
        <div class="navbar-text ml-auto">
        <span class="border-right pr-3">
        <i class='bx bxs-phone purple-icon'></i> 
        <span class="phone-number">+381 (0) 18 4265 625</span>
        </span>
        <span class="ml-3">
        <i class='bx bxs-envelope purple-icon'></i>  euro-018@hotmail.com
        </span>
</div>

    </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-light bg-body-tertiary" id="boja11">
    <div class="container-fluid">
        <!-- Hamburger ikonica za mobilnu verziju -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <span class="navbar-text" id="textic">Euro<span>-018 DOO</span></span>
        <!-- Ostale stavke -->
        <div class="collapse navbar-collapse mt-auto align-items-end" id="navbarTogglerDemo02">
          
            <ul class="navbar-nav ml-auto border border-bottom-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php" id="active">POCETNA STRANA</a>
                </li>                
                <li class="nav-item">
                    <a class="nav-link" href="index.php#cars" id="LBH">Servis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#parts" id="LBH">Rezervni delovi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#parts" id="LBH">Automobili</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#about11" id="LBH">O Nama</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kontakt.php#servisid" id="LBH">Kontakt</a>
                </li>
            </ul>
        </div>
    </div>
</nav>






    <section class="home" id="home">
        <div class="home-text">
            <p>
                <h1> Prodavnica </h1>
                    EURO-018 DOO<br>
                 OBILICEV VENAC 79 , NIS , 018/4265625
                <h1>Servis</h1>
                EURO-018 DOO<br>
            GORNJE MEDJUROVO <br> VLADIMIRA VUKADINOVICA 18 <br> 064/1431779
            </p>
            
        </div>
    </section>

    
</div>


<div class="container-fluid parts mt-4 mb-4" id="parts">
  <div class="row">
    <!-- Side Menu -->
    <nav id="sidebar" class="col-md-3 col-lg-2 bg-dark d-md-block sidebar" >
    <div class="sidebar-sticky">
        <ul class="nav flex-column" >
            <li class="nav-item">
            <a class="nav-link active font-weight-bold text-uppercase" href="#" id="active">
                Kategorije
            </a>
            </li>
            
            <?php
            // Prvo, izvršimo upit za brojanje automobila
            $count_cars_query = "SELECT COUNT(*) AS total_cars FROM cars";
            $count_cars_result = mysqli_query($con, $count_cars_query);
            $total_cars = mysqli_fetch_assoc($count_cars_result)['total_cars'];

            // Zatim, dodajmo kategoriju "Automobili" na početak liste
            echo '<li class="nav-item">';
            echo '<a class="nav-link border-bottom" id="naprvih" href="?category=Automobili#parts">';
            echo '<i class="bx bxs-right-arrow"></i>';
            echo 'Automobili (' . $total_cars . ')';
            echo '</a>';
            echo '</li>';
?>
            
            <?php
            $sql = "SELECT category_id, name FROM categories";
            $result = mysqli_query($con, $sql);
            
            // Provera da li ima rezultata
            if (mysqli_num_rows($result) > 0) {
                // Iteriranje kroz rezultate i ispisivanje svake kategorije u meniju
                while ($row = mysqli_fetch_assoc($result)) {
                    // Dobijanje naziva kategorije i ID-a
                    $category_name = $row['name'];
                    $category_id = $row['category_id'];
                    
                    // Izvršavanje upita za brojanje proizvoda u trenutnoj kategoriji
                    $count_query = "SELECT COUNT(*) AS total FROM products WHERE category_id = '$category_id'";
                    $count_result = mysqli_query($con, $count_query);
                    
                    // Provera da li je upit uspeo
                    if ($count_result) {
                        // Dobijanje broja proizvoda u trenutnoj kategoriji
                        $count_row = mysqli_fetch_assoc($count_result);
                        $product_count = $count_row['total'];
                        
                        // Ispisivanje stavke menija sa nazivom kategorije i brojem proizvoda
                        echo '<li class="nav-item">';
                        echo '<a class="nav-link border-bottom" id="naprvih" href="?category=' . urlencode($category_name) . '#parts">';
                        echo '<i class="bx bxs-right-arrow"></i>';
                        echo $category_name . ' (' . $product_count . ')';
                        echo '</a>';
                        echo '</li>';
                        
                        // Oslobađanje resursa nakon svakog upita
                        mysqli_free_result($count_result);
                    } else {
                        // Ukoliko upit nije uspeo, ispisati odgovarajuću poruku o grešci
                        echo '<li class="nav-item">Greška pri brojanju proizvoda u kategoriji ' . $category_name . '.</li>';
                    }
                }
            } else {
                // Ukoliko nema dostupnih kategorija, ispisati odgovarajuću poruku
                echo '<li class="nav-item">Nema dostupnih kategorija.</li>';
            }
            
            // Oslobađanje resursa
            mysqli_free_result($result);
            
            ?>
        </ul>
    </div>
</nav>


    <!-- Main Content -->
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">
            <?php

if (!isset($_GET['category'])) {
    // Izvršavanje upita za dobijanje automobila
    $cars_query = "SELECT * FROM cars";
    $cars_result = mysqli_query($con, $cars_query);

    // Provera da li postoji rezultat upita za automobile
    if (mysqli_num_rows($cars_result) > 0) {
        while ($car_row = mysqli_fetch_assoc($cars_result)) {
            // Kreiranje Bootstrap kolona za svaki automobil
            echo '<div id="idi" class="col-xs-12 col-sm-6 col-md-4 mb-4">';
            // Stavljanje automobila u kutiju
            echo '<div class="card">';
            echo '<div class="card-body nav-link">';
            // Ispisivanje naziva automobila
            echo '<h5 class="card-title">' . $car_row['name'] . '</h5>';
            // Ispisivanje slike automobila ako postoji
            if (!empty($car_row['image'])) {
                echo '<img src="' . $car_row['image'] . '" class="card-img-top" alt="Car Image">';
            } else {
                // Ako slika nije dostupna, prikaži neku podrazumevanu sliku ili poruku
                echo '<p>Slika nije dostupna</p>';
            }
            // Ispisivanje opisa automobila
            echo '<p class="card-text">' . $car_row['description'] . '</p>';

            echo '</div>'; // Zatvaranje card-body div-a
            echo '</div>'; // Zatvaranje card div-a
            echo '</div>'; // Zatvaranje col-md-4 div-a
        }
    } else {
        echo '<div class="col">';
        echo "Nema automobila.";
        echo '</div>';
    }
}


            if (isset($_GET['category'])) {
                $selectedCategory = $_GET['category'];
                if ($selectedCategory === "Automobili") {
                    // Izvršavanje upita za dobijanje automobila
                    $cars_query = "SELECT * FROM cars";
                    $cars_result = mysqli_query($con, $cars_query);

                    // Provera da li postoji rezultat upita za automobile
                    if (mysqli_num_rows($cars_result) > 0) {
                        while ($car_row = mysqli_fetch_assoc($cars_result)) {
                            // Kreiranje Bootstrap kolona za svaki automobil
                            echo '<div id="idi" class="col-xs-12 col-sm-6 col-md-4 mb-4">';
                            // Stavljanje automobila u kutiju
                            echo '<div class="card">';
                            echo '<div class="card-body nav-link">';
                            // Ispisivanje naziva automobila
                            echo '<h5 class="card-title">' . $car_row['name'] . '</h5>';
                            // Ispisivanje slike automobila ako postoji
                            if (!empty($car_row['image'])) {
                                echo '<img src="' . $car_row['image'] . '" class="card-img-top" alt="Car Image">';
                            } else {
                                // Ako slika nije dostupna, prikaži neku podrazumevanu sliku ili poruku
                                echo '<p>Slika nije dostupna</p>';
                            }
                            // Ispisivanje opisa automobila
                            echo '<p class="card-text">' . $car_row['description'] . '</p>';

                            echo '</div>'; // Zatvaranje card-body div-a
                            echo '</div>'; // Zatvaranje card div-a
                            echo '</div>'; // Zatvaranje col-md-4 div-a
                        }
                    } else {
                        echo '<div class="col">';
                        echo "Nema automobila.";
                        echo '</div>';
                    }
                } else {
                    // Izvršavanje upita za dobijanje ID-ja kategorije
                    $category_id_query = "SELECT category_id FROM categories WHERE name = '$selectedCategory'";
                    $category_id_result = mysqli_query($con, $category_id_query);

                    // Provera da li postoji rezultat upita
                    if ($category_id_result) {
                        // Provera da li postoji bar jedan redak u rezultatu upita
                        if (mysqli_num_rows($category_id_result) > 0) {
                            // Izdvajanje rezultata upita kao asocijativni niz
                            $row = mysqli_fetch_assoc($category_id_result);
                            // Izdvajanje ID-ja kategorije iz asocijativnog niza
                            $category_id = $row['category_id'];

                            // Izvršavanje upita za dobijanje proizvoda određene kategorije
                            $products_query = "SELECT * FROM products WHERE category_id = '$category_id'";
                            $products_result = mysqli_query($con, $products_query);

                            // Provera da li postoji rezultat upita za proizvode
                            if (mysqli_num_rows($products_result) > 0) {
                                while ($product_row = mysqli_fetch_assoc($products_result)) {
                                    // Kreiranje Bootstrap kolona za svaki proizvod
                                    echo '<div id="idi" class="col-xs-12 col-sm-6 col-md-4 mb-4">';
                                    // Stavljanje proizvoda u kutiju
                                    echo '<div class="card">';
                                    echo '<div class="card-body nav-link">';
                                    // Ispisivanje naziva proizvoda
                                    echo '<h5 class="card-title">' . $product_row['name'] . '</h5>';
                                    // Ispisivanje slike proizvoda ako postoji
                                    if (!empty($product_row['image_path'])) {
                                        echo '<img src="' . $product_row['image_path'] . '" class="card-img-top" alt="Product Image">';
                                    } else {
                                        // Ako slika nije dostupna, prikaži neku podrazumevanu sliku ili poruku
                                        echo '<p>Slika nije dostupna</p>';
                                    }
                                    // Ispisivanje šifre proizvoda
                                    echo '<p class="card-text">Šifra: ' . $product_row['sifra'] . '</p>';
                                    // Ispisivanje opisa proizvoda
                                    echo '<p class="card-text">' . $product_row['description'] . '</p>';
                                    // Ispisivanje cene proizvoda
                                    echo '<p class="card-text text-success">Cena: ' . $product_row['cena'] . ',00 din</p>';
                                    // Dodavanje kontakta
                                    echo '<button id="dugme" type="button" class="btn">Kontakt-></button>';
                                    echo '<span class="">+1233123123</span>';

                                    echo '</div>'; // Zatvaranje card-body div-a
                                    echo '</div>'; // Zatvaranje card div-a
                                    echo '</div>'; // Zatvaranje col-md-4 div-a
                                }
                            } else {
                                echo '<div class="col">';
                                echo "Nema proizvoda u ovoj kategoriji!";
                                echo '</div>';
                            }
                        }
                    }
                }
            }
            ?>
        </div>
    </div>
</main>

  </div>
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php include('includes/footer.php');?>
<script src="main.js"></script>
</body>
</html>