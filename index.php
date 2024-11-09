<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Aurore tour</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
      
        <div class="item a"> <h3>Coded by</h3>
         <ion-icon name="person-outline"></ion-icon>  NACIB Rayane<br> 
         <ion-icon name="pricetag-outline"></ion-icon>  18213106732<br><br> 
         <ion-icon name="person-outline"></ion-icon> AMRANI Amine<br> 
         <ion-icon name="pricetag-outline"></ion-icon>  212131030352<br> <br> <br> 
          <div class="bg"> <ion-icon name="logo-css3"></ion-icon> <ion-icon name="logo-html5"></ion-icon> <ion-icon name="logo-javascript"></ion-icon></div> 
         
    

          <div class="test">  <hr> <br> <ion-icon name="add-outline"></ion-icon> <a href= "VILLE.php" target="_blank"> Ajouter ville </a>  </div>

        </div>

      <div class="item b"> <div class="ze9zou9">Aurore tour</div></div>

      <div class="item c">
        
         <section>
            <div class="form-box">
                
                <div class="form-box">

                    <form action="" method="get">
                     <h2>Prenez votre envol</h2> 
                     <div class="input-box">
                        <ion-icon name="earth-outline"></ion-icon>
                        <input type="text" name="Continent" required>
                        <label for="">Continent</label>
                    
                     </div>
                     <div class="input-box">
                        <ion-icon name="location-outline"></ion-icon>
                        <input type="text" name="Pays" required>
             
                        <label for="">Pays</label>
                     </div>
                     <div class="input-box">
                        <ion-icon name="location-outline"></ion-icon>
                        <input type="text" name="Ville" required>
                        <label for="">Ville</label>
                     </div>
                     <div class="input-box">
                        <ion-icon name="airplane-outline"></ion-icon>
                        <input type="text" name="Site" required>
                        <label for="">Site</label>
                    </div>
                    <button>Recherche</button>  
                </form>
                </div>

            </div>
         </section>
         <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
         <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

      <center> <h3>Resultats</h3> </center><br> 
      <?php
      // Connexion à la base de données
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "voyage";

      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
          die("Erreur de connexion à la base de données : " . $conn->connect_error);
      }

      // Vérification des paramètres de recherche
      $continent = isset($_GET["Continent"]) ? $_GET["Continent"] : "";
      $pays = isset($_GET["Pays"]) ? $_GET["Pays"] : "";
      $ville = isset($_GET["Ville"]) ? $_GET["Ville"] : "";
      $site = isset($_GET["Site"]) ? $_GET["Site"] : "";

      // Construction de la requête de recherche
      $sql = "SELECT * FROM ville WHERE nomvil LIKE '%$ville%'";
      if (!empty($continent)) {
          $sql .= " AND idpay IN (SELECT idpay FROM pays WHERE idcon IN (SELECT idcon FROM continent WHERE nomcon LIKE '%$continent%'))";
      }
      if (!empty($pays)) {
          $sql .= " AND idpay IN (SELECT idpay FROM pays WHERE nompay LIKE '%$pays%')";
      }
      if (!empty($site)) {
          $sql .= " AND idvil IN (SELECT idvil FROM site WHERE nomsit LIKE '%$site%')";
      }

      $result = $conn->query($sql);

      // Affichage des résultats
      if ($result->num_rows > 0) {
          echo "<ul>";
          while ($row = $result->fetch_assoc()) {
              echo "<li><a href='AjouterVille.php?id=" . $row['idvil'] . "'>" . $row['nomvil'] . "</a>";
              echo "<span><a href='AjouterVille.php?id=" . $row['idvil'] . "'><img src='modifier.png' alt='Modifier'></a></span>";
              echo "<span><a href='supprimerVille.php?id=" . $row['idvil'] . "'><img src='supprimer.png' alt='Supprimer'></a></span></li>";
          }
          echo "</ul>";
      } else {
          echo "Aucun résultat trouvé.";
      }
      

      // Fermeture de la connexion à la base de données
      $conn->close();
      ?>
      </div>
  
   
</body>
</html>