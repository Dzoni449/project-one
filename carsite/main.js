$(document).ready(function(){
  var isMenuOpen = false;

  // Klik na bilo koje mesto na dokumentu
  $(document).on('click', function(event) { 
      // Provera da li je kliknuto na navbar-toggler ikonu
      if (!$(event.target).closest('.navbar-toggler').length) { 
          // Ako meni nije otvoren, zatvorite ga
          if (isMenuOpen) {
              $('.navbar .collapse').collapse('hide');
              isMenuOpen = false;
          }
      }
  });

  // Klik na navbar-toggler ikonu
  $('.navbar-toggler').on('click', function() {
      // Ako je meni otvoren, zatvorite ga; inače ga otvorite
      if (isMenuOpen) {
          isMenuOpen = false;
      } else {
          isMenuOpen = true;
      }
  });
});




document.addEventListener('DOMContentLoaded', function() {
    // Dodavanje event listenera na kategorije
    document.getElementById('kategorije').addEventListener('click', function(e) {
      if (e.target.tagName === 'LI') {
        // Dohvatanje naziva kategorije
        let kategorija = e.target.textContent.trim();
        
        // Slanje AJAX zahteva na server
        let xhr = new XMLHttpRequest();
        xhr.open('GET', 'get_products.php?kategorija=' + kategorija, true);
        xhr.onload = function() {
          if (this.status == 200) {
            let proizvodi = JSON.parse(this.responseText);
            // Prikaz proizvoda
            prikaziProizvode(proizvodi);
          }
        };
        xhr.send();
      }
    });
  });
  
  // Funkcija za prikaz proizvoda
  function prikaziProizvode(proizvodi) {
    let proizvodiContainer = document.getElementById('proizvodi');
    // Brisanje prethodnih proizvoda
    proizvodiContainer.innerHTML = '';
    // Dodavanje novih proizvoda
    proizvodi.forEach(function(proizvod) {
      let li = document.createElement('li');
      li.textContent = proizvod;
      proizvodiContainer.appendChild(li);
    });
  }
  


    document.addEventListener("DOMContentLoaded", function() {
        // Selektujemo sve linkove ka delovima stranice
        var partLinks = document.querySelectorAll('a[href^="#"]');
        
        // Iteriramo kroz svaki link
        partLinks.forEach(function(link) {
            // Dodajemo event listener za klik na link
            link.addEventListener("click", function(event) {
                // Preventivno preusmeravanje na početak stranice
                event.preventDefault();
                
                // Dobijamo ciljani element (deo sa delovima automobila)
                var targetId = this.getAttribute("href").substring(1);
                var targetElement = document.getElementById(targetId);
                
                // Skrolujemo do ciljanog elementa
                targetElement.scrollIntoView({ behavior: 'smooth' });
            });
        });
    });



