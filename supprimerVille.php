<?php
// Vérifiez si l'identifiant de la ville à supprimer est passé en paramètre
if (isset($_GET['id'])) {
    // Récupérez l'identifiant de la ville à supprimer
    $idVille = $_GET['id'];

    // Établissez la connexion à la base de données
    $conn = new mysqli('localhost', 'root', '', 'voyage');

    // Vérifiez si la connexion à la base de données a réussi
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }

    // Écrivez la requête SQL pour supprimer la ville correspondante dans la base de données
    $sql = "DELETE FROM ville WHERE idvil = $idVille";

    // Exécutez la requête SQL
    if ($conn->query($sql) === TRUE) {
        echo "La ville a été supprimée avec succès.";
    } else {
        echo "Erreur lors de la suppression de la ville : " . $conn->error;
    }

    // Fermez la connexion à la base de données
    $conn->close();
} else {
    echo "Identifiant de la ville non spécifié.";
}
?>
