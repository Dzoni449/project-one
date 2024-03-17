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
    .center-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Da bi se centrirao vertikalno */
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
                    <a class="nav-link" href="parts.php#parts" id="LBH">Rezervni delovi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="parts.php#parts" id="LBH">Automobili</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#about11" id="LBH">O Nama</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="LBH">Kontakt</a>
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

<section class="about container mt-4 pt-2" id="about">
       <div class="about-img">
            <h1>KONTAKT</h1>
            <h1>EURO-018 DOO</h1>
            <p>OBILICEV VENAC 79 , NIS</p>
            <p>MOB-PRODAVNICA: 064/14 31 779</p>
            <p>TEL-PRODAVNICA: 018/4265625</p>
            <p>MOB-SERVIS: 064/1431779</p>
            <p>TEL-SERVIS: 018/4265625</p>
            <p>MAIL:  euro-018@hotmail.com</p>
       </div>
       <div class="about-text" id="servisid">
        <h3>Gde se nalazimo?</h3>
        <h4>Prodavnica:</h4>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d725.7325023274979!2d21.886886369584793!3d43.31572457396223!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b0ad14a276eb%3A0x801205fa387da90c!2zT2JpbGnEh2V2IFZlbmFjIDc5LCBOacWh!5e0!3m2!1shr!2srs!4v1709833349975!5m2!1shr!2srs" width="400" height="200" style="border:0;" allowfullscreen="" id="cursor" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                                                     
        <h4>Servis:</h4>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d606.0756736294227!2d21.84459763814204!3d43.28023655374339!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b982e6046c1f%3A0x9d95ef1e3ae56bd4!2z0JLQu9Cw0LTQuNC80LjRgNCwINCS0YPQutCw0LTQuNC90L7QstC40ZvQsCAxOCwgR29ybmplIE1lxJF1cm92bw!5e1!3m2!1shr!2srs!4v1710427649679!5m2!1shr!2srs" width="400" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>            
        </div>       
</section>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php include('includes/footer.php');?>
<script src="main.js"></script>
</body>
</html>