<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> VILLE </title>
<link rel="stylesheet" href="style2.css">
</head>
<body>

    <h1>AJOUTEZ UNE VILLE !</h1> 



   <center> <section>
        <div class="form-box">
            
            <div class="form-box">

                <form action="" method="post">
                 <h2>Entrez une ville</h2> 
                 <div class="input-box">
                    <ion-icon name="earth-outline"></ion-icon>
                    <input type="text" required>
                    <label for="">Continent</label>
                
                 </div>
                 <div class="input-box">
                    <ion-icon name="location-outline"></ion-icon>
                    <input type="text" required>
         
                    <label for="">Pays</label>
                 </div>
                 <div class="input-box">
                    <ion-icon name="location-outline"></ion-icon>
                    <input type="text" required>
                    <label for="">Ville</label>
                 </div>
                 <div class="input-box">
                    <ion-icon name="airplane-outline"></ion-icon>
                    <input type="text" required>
                    <label for="">Site</label>
                
                </div>
                <div class="input-box">
                    <ion-icon name="earth-outline"></ion-icon>
                    <input type="text" required>
                    <label for="">Descriptif</label>

                
                 </div>

                 <div class="input-box">
                    <ion-icon name="bed-outline"></ion-icon>
                    <input type="text" required>
                    <label for="">Hotel</label>
                
                 </div>

                 <div class="input-box">
                    <ion-icon name="fast-food-outline"></ion-icon>
                    <input type="text" required>
                    <label for="">Restaurant</label>
                
                 </div>

                <button>Ajouter !</button>  
            </form>
            </div>

        </div>
     </section> </center>
     <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
     <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
     <?php
// Configuration de la connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "Viktorreznov1";
$dbname = "voyage";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $ville = $_POST["ville"];
    $continent = $_POST["continent"];
    $pays = $_POST["pays"];
    $hotel = $_POST["hotel"];
    $restaurant = $_POST["restaurant"];
    $gare = $_POST["gare"];
    $aeroports = $_POST["aeroports"];
    $site = $_POST["site"];
    $description = $_POST["disc"];

    
    $sql = "INSERT INTO continent (nomcon) VALUES ('$continent')";
    $conn->query($sql);
   //  $idcon = $conn->insert_id;
   $req = mysqli_query($conn, "SELECT idcon FROM continent WHERE nomcon = $continent ");
   $idcon = mysqli_fetch_assoc($req)['idcon'];

    $sql = "INSERT INTO pays (nompay, idcon) VALUES ('$pays', '$idcon')";
    $conn->query($sql);

   $req = mysqli_query($conn, "SELECT idpay FROM pays WHERE nompay = $pays ");
   $idpay = mysqli_fetch_assoc($req)['idpay'];
   //  $idpay = $conn->insert_id;

    $sql = "INSERT INTO ville (nomvil, idpay, descvil) VALUES ('$ville', '$idpay', '$description')";
    $conn->query($sql);

    $req = mysqli_query($conn, "SELECT idvil FROM ville WHERE nomvil = $ville ");
    $idvil = mysqli_fetch_assoc($req)['idvil'];
   //  $idvil = $conn->insert_id;

    $sql = "INSERT INTO hotel (nomhotel, idvil) VALUES ('$hotel', '$idvil')";
    $conn->query($sql);

    $sql = "INSERT INTO restaurant (nomresto, idvil) VALUES ('$restaurant', '$idvil')";
    $conn->query($sql);

    $sql = "INSERT INTO gare (nomgare, idvil) VALUES ('$gare', '$idvil')";
    $conn->query($sql);

    $sql = "INSERT INTO aeroport (nomaeroport, idvil) VALUES ('$aeroports', '$idvil')";
    $conn->query($sql);

    $sql = "INSERT INTO site (nomsit, cheminphoto, idvil) VALUES ('$site', 'chemin/vers/image.jpg', '$idvil')";
    $conn->query($sql);

    echo "Les données ont été insérées avec succès dans la base de données.";
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
</body>
</html>