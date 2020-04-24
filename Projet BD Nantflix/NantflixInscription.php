<html>
<LINK rel= "STYLESHEET" href="NantflixCSS.css" type="text/css"> 

<title>Inscription </title>   

<!--Cette page contient un formulaire d'inscription au site Nantflix.
L'utilisateur va devoir rentrer des informations, dont son ID, qui lui sera propre.
Si toutes les informations sont correctement renseignées, le formulaire envoie ses données
vers la page NantflixMembre.php-->

<body>
<h1>Inscrivez-vous</h1>

<form method="post" class="a"  action="NantflixMembre.php">
<br><br><br>

<input type="text" name="Identifiant" autocomplete="on" placeholder="Adresse mail"><br><br>
<input type="password" name="motdepasse" placeholder="Mot de passe" minlenght="8" title="Au moins 8 caractères"><br><br>
<input type="text" name="prenom" placeholder="Prénom" autocomplete="on"><br><br>
<input type="text" name="nom" placeholder="Nom" autocomplete="on"><br><br>
Année de naissance: <br>
<SELECT name="date" size="1">
            <OPTION>1990
            <OPTION>1991
            <OPTION>1992
            <OPTION>1993
            <OPTION>1994
            <OPTION>1995
            <OPTION>1996
            <OPTION>1997
            <OPTION>1998
            <OPTION>1999
            <OPTION>2000
            </SELECT><br><br>
<br>Sexe:<br>
<input type="radio" name="sexe" required>
        <label for="Homme">Homme</label>
        <input type="radio" name="sexe" >
        <label for="Femme">Femme</label><br>
<input type="text" name="telephone" placeholder="Téléphone"><br><br>
<input type="submit" value="Valider inscription">
</form>
</body>
</html>