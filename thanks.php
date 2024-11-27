<?php
// Vérifie si les données ont bien été envoyées en POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sécurisation et récupération des données du formulaire
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $sujet = htmlspecialchars($_POST['sujet']);
    $message = htmlspecialchars($_POST['message']);

    // Affichage du message de remerciement avec les informations fournies
    echo "<h1>Merci $prenom $nom de nous avoir contacté à propos de \"$sujet\".</h1>";
    echo "<p>Un de nos conseillers vous contactera soit à l’adresse <strong>$email</strong> ou par téléphone au <strong>$telephone</strong> dans les plus brefs délais pour traiter votre demande :</p>";
    echo "<p><em>\"$message\"</em></p>";
} else {
    echo "Aucune donnée n'a été soumise.";
}
?>
