<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de contact</title>
</head>
<body>
    <h1>Contactez-nous</h1>

    <!-- Afficher les erreurs si elles existent -->
    <?php if (!empty($errors)) : ?>
        <h2>Merci de corriger les erreurs suivantes :</h2>
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <!-- Formulaire de contact -->
    <form action="index.php" method="POST">
        <label for="prenom">Prénom :</label><br>
        <input type="text" id="prenom" name="prenom" value="<?= $_POST['prenom'] ?? '' ?>" required><br><br>

        <label for="nom">Nom :</label><br>
        <input type="text" id="nom" name="nom" value="<?= $_POST['nom'] ?? '' ?>" required><br><br>

        <label for="email">E-mail :</label><br>
        <input type="email" id="email" name="email" value="<?= $_POST['email'] ?? '' ?>" required><br><br>

        <label for="telephone">Téléphone :</label><br>
        <input type="tel" id="telephone" name="telephone" value="<?= $_POST['telephone'] ?? '' ?>" required><br><br>

        <label for="sujet">Sujet :</label><br>
        <select id="sujet" name="sujet" required>
            <option value="Demande d'information" <?= ($_POST['sujet'] ?? '') === 'Demande d\'information' ? 'selected' : '' ?>>Demande d'information</option>
            <option value="Support technique" <?= ($_POST['sujet'] ?? '') === 'Support technique' ? 'selected' : '' ?>>Support technique</option>
            <option value="Réclamation" <?= ($_POST['sujet'] ?? '') === 'Réclamation' ? 'selected' : '' ?>>Réclamation</option>
            <option value="Autres" <?= ($_POST['sujet'] ?? '') === 'Autres' ? 'selected' : '' ?>>Autres</option>
        </select><br><br>

        <label for="message">Message :</label><br>
        <textarea id="message" name="message" rows="5" required><?= $_POST['message'] ?? '' ?></textarea><br><br>

        <input type="submit" value="Envoyer">
    </form>
</body>
</html>