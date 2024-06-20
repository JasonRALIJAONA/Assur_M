<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?= base_url('form_controller/send_email') ?>" method="get">
        <input type="text" name="nom" placeholder="nom">
        <input type="text" name="prenoms" placeholder="prenom">
        <input type="text" name="adresse" placeholder="adresse">
        <input type="date" name="naissance" placeholder="adresse">
        <input type="number" name="numero" placeholder="numero">
        <input type="email" name="email" placeholder="email">
        <input type="password" name="password" placeholder="password">
        <input type="submit" value="valider">
    </form>
</body>
</html>