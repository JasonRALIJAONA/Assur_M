<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer Profil</title>
</head>
<body>
    <form action="<?php echo site_url('utilisateur/creer'); ?>" method="post">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br>
        <label for="prenoms">Prénoms:</label>
        <input type="text" id="prenoms" name="prenoms" required><br>
        <label for="adresse">Adresse:</label>
        <input type="text" id="adresse" name="adresse" required><br>
        <label for="date_naissance">Date de Naissance:</label>
        <input type="date" id="date_naissance" name="date_naissance" required><br>
        <label for="numero_telephone">Numéro de Téléphone:</label>
        <input type="text" id="numero_telephone" name="numero_telephone" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="mot_de_passe">Mot de Passe:</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required><br>
        <label for="mot_de_passe2">Confirmez le Mot de Passe:</label>
        <input type="password" id="mot_de_passe2" name="mot_de_passe2" required><br>
        <input type="submit" value="Créer Profil">
    </form>
</body>
</html>
