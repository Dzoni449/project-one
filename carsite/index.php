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
        <a class="navbar-brand mt-auto" href="#">
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
                    <a class="nav-link" href="#home" id="active">POCETNA STRANA</a>
                </li>                
                <li class="nav-item">
                    <a class="nav-link" href="#cars" id="LBH">Servis</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="parts.php#parts" id="LBH">Rezervni delovi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="parts.php#parts" id="LBH">Automobili</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about11" id="LBH">O Nama</a>
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

    <div class="container p-5">
    <div class="row">
        <div class="col-md-4">
            <a href="#cars" id="aizmeni">
                <div class="card mb-3">
                    <img src="slike/servis.jpg" class="card-img-top" alt="Slika 1">
                        <div class="card-body text-center">
                        <h2 class="card-title">Servis</h2>
                        <p class="card-text" id="paddingb">Servis i odrzavanje vozila</p>
                        <a href="#cars" class="btn" id="dugme">Vise-></a>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="parts.php#parts" id="aizmeni">
            <div class="card mb-3">
                <img src="slike/rezervnidelovi.jpg" class="card-img-top" alt="Slika 2">
                <div class="card-body text-center">
                    <h2 class="card-title">Rezevni delovi</h2>
                    <p class="card-text" id="paddingb">Rezervni delovi za sve tipove vozila</p>
                    <a href="parts.php#parts" class="btn" id="dugme">Web shop-></a>
                </div>
            </div>
            </a>
        </div>
        <div class="col-md-4">
           <a href="parts.php#parts" id="aizmeni">
           <div class="card mb-3">
                <img src="slike/automobili.jpg" class="card-img-top" alt="Slika 3">
                <div class="card-body text-center">
                    <h2 class="card-title">Automobili</h2>
                    <p class="card-text" id="paddingb">Prodaja polovnih automobila</p>
                    <a href="parts.php#parts" class="btn" id="dugme">Kompletna ponuda-></a>
                </div>
            </div>
           </a>
        </div>
    </div>
</div>

    
    <section class="cars" id="cars">
    <div class="heading text-center">
    <span>SERVIS</span>
    <h2>SERVIS AUTOMOBILA</h2>
    <p>
        UBRZO NAKON OSNIVANJA FIRME EURO-018, OTVORILI SMO I SERVIS
        ZA POPRAVKU PUTNICKIH I LAKIH TERETNIH VOZILA. OBIM RADOVA KOJI SE ODVIJAJU U SERVIS EURO-018 SU:
    </p>
    <ul class="text-left">
        <li class="lista">MALI SERVIS (zamena ulja i svih filtera)</li>
        <li class="lista">VELIKI SERVIS (zamena kaiseva, spaner i remenica)</li>
        <li class="lista">ZAMENA SETA KVACILA I ZAMAJCA (servisiranje ili zamena menjaca)</li>
        <li class="lista">SERVISIRANJE TRAPA-VESANJA (krajevi spona, krajevi letve volana,
                            kugle,selen blokovi,homokineticki zglobovi,ramena,viljuske...)</li>
        <li class="lista">ZAMENA KOCIONOG SISTEMA (diskovi,plocice,paknovi...)</li>
        <li class="lista">GENERALNE POPRAVKE MOTORA</li>
        <li class="lista">DIJAGNOSTIKA</li>
    </ul>
    <p>
        UZ SVAKU POPRAVKU AUTOMOBILA KLIJENT DOBIJA BESPLATNU SERVISNU KNJIZICU SA EVIDENCIJOM ZAMENJENIH DELOVA.
    </p>
        </div>   
    </section>
    <section class="about container mt-0 pt-0" id="about">
       <div class="about-img">
        <img src="slike/servisslika.jpg" id="cursor" alt="OVDE TREBA DA IDE SLIKA SERVISA" class="img11">
       </div>
        <div class="about-text" id="servisid">                       
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d606.0756736294227!2d21.84459763814204!3d43.28023655374339!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b982e6046c1f%3A0x9d95ef1e3ae56bd4!2z0JLQu9Cw0LTQuNC80LjRgNCwINCS0YPQutCw0LTQuNC90L7QstC40ZvQsCAxOCwgR29ybmplIE1lxJF1cm92bw!5e1!3m2!1shr!2srs!4v1710427649679!5m2!1shr!2srs" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>


    <section class="container text-center" id="about11">
    <h2>O NAMA</h2>
    <p>FIRMA JE OSNOVANA 2005. GODINE I OSNOVNA DELATNOST NAM JE PRODAJA AUTO DELOVA SVIH RENOMIRANIH PROIZVODJACA. 
        U OKVIRU FIRME POSTOJI SERVIS ZA POPRAVKU AUTOMOBILA. KLIJENTIMA OBEZBEDJUJEMO POMOC PRI ODABIRU DELOVA.
        ROBU KOJU NUDIMO IMAMO NA LAGERU I GARANTUJEMO KVALITET DELOVA. ROBU MOZETE KUPITI U NASOJ PRODAVNICI ILI U SERVISU, 
        A POSTOJI MOGUCNOST ISPORUKE BRZOM POSTOM NA VASU ADRESU.
    </p>
    </section>
    <section class="about container mt-0 pt-0">
       <div class="about-img">
        <img src="slike/lokal.jpg" id="cursor" alt="nema slika1" class="img11">
       </div>
        <div class="about-text">                       
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d725.7325023274979!2d21.886886369584793!3d43.31572457396223!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b0ad14a276eb%3A0x801205fa387da90c!2zT2JpbGnEh2V2IFZlbmFjIDc5LCBOacWh!5e0!3m2!1shr!2srs!4v1709833349975!5m2!1shr!2srs" width="489" height="360" style="border:0;" allowfullscreen="" id="cursor" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>            </p>                   
        </div>
    </section>

    
    

  

   

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <?php include('includes/footer.php');?>
    <script src="main.js"></script>
</body>
</html>