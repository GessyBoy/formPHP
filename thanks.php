<?php
// Vérifie si les données ont bien été envoyées en POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: confirmation.php");
    exit;
}

// Initialisation du tableau d'erreurs
$errors = [];

// Traitement des données envoyées par le formulaire
$contact = array_map('trim', $_POST);

    // Vérification des champs obligatoires
    if (empty($contact['prenom'])) {
        $errors[] = 'Le prénom est obligatoire.';
    }
    
    if (empty($contact['nom'])) {
        $errors[] = 'Le nom est obligatoire.';
    }

    if (empty($contact['email'])) {
        $errors[] = 'L\'email est obligatoire.';
    } elseif (!filter_var($contact['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'L\'adresse e-mail n\'est pas valide.';
    }

    if (empty($contact['telephone'])) {
        $errors[] = 'Le numéro de téléphone est obligatoire.';
    }

    if (empty($contact['sujet'])) {
        $errors[] = 'Le sujet est obligatoire.';
    }

    if (empty($contact['message'])) {
        $errors[] = 'Le message est obligatoire.';
    }

     // Vérification de la longueur du mot de passe
     if (isset($contact['password']) && strlen($contact['password']) < 8) {
        $errors[] = 'Le mot de passe doit faire au moins 8 caractères.';
    }

    // S'il y a des erreurs, on les affiche
    if (!empty($errors)) {
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul>";
    } else {

    // Si aucune erreur, on affiche le message de remerciement    $prenom = htmlspecialchars($_POST['prenom']);
    $prenom = htmlspecialchars($contact['prenom']);
    $nom = htmlspecialchars($contact['nom']);
    $email = htmlspecialchars($contact['email']);
    $telephone = htmlspecialchars($contact['telephone']);
    $sujet = htmlspecialchars($contact['sujet']);
    $message = htmlspecialchars($contact['message']);

    // Affichage du message de remerciement avec les informations fournies
    echo "<h1>Merci $prenom $nom de nous avoir contacté à propos de \"$sujet\".</h1>";
    echo "<p>Un de nos conseillers vous contactera soit à l’adresse <strong>$email</strong> ou par téléphone au <strong>$telephone</strong> dans les plus brefs délais pour traiter votre demande :</p>";
    echo "<p><em>\"$message\"</em></p>";
}
?>
