<html>
<LINK rel= "STYLESHEET" href="NantflixCSS.css" type="text/css">    
<title>Nantflixmembre.php</title>   


<!--Cette page va récupérer les champs du formulaire de la page d'inscription, 
pour les inscrire dans la BDD.-->

<body>
<?php

ini_set('display_errors','on');
error_reporting(E_ALL);

// On commence par récupérer les champs
if(isset($_POST['Identifiant'])) $mail=$_POST['Identifiant'];
else $mail="";

if(isset($_POST['motdepasse'])) $mdp=$_POST['motdepasse'];
else $mdp="";

if(isset($_POST['prenom'])) $prenom=$_POST['prenom'];
else $prenom="";

if(isset($_POST['nom'])) $nom=$_POST['nom'];
else $nom="";

if(isset($_POST['date'])) $naissance=$_POST['date'];
else $naissance="";

if(isset($_POST['sexe'])) $sexe=$_POST['sexe'];
else $sexe="";

if(isset($_POST['telephone'])) $tel=$_POST['telephone'];
else $tel="";

if(empty($mail) OR empty($mdp) OR empty($prenom) OR empty($nom))
{
echo '<center>Attention, les champs adresse mail, mot de passe, prénom et nom ne peuvent pas rester
vide !</center>';
}
else{
include("NantflixConnexionBd.php");
global $conn;
//C'est la requête qui va inscrire l'utilisateur à la BDD//
$query ="INSERT INTO `utilisateur`(adresse_mail,mdp,nom,prenom,sexe,date_naissance,tel) VALUES('$mail','$mdp','$nom','$prenom','$sexe','$naissance','$tel')";

if(mysqli_query($conn,$query)){
    echo"<h1>Felicitations! Vous êtes inscris! Redirection vers l'accueil dans 5 secondes</h1>";//On redirige l'utilisateur vers la page d'accueil, où il pourra s'authentifier//
    echo "<script type='text/javascript'>function redir(){
     self.location.href='http://projetnantflix/Nantflix%20Accueil.html'
     }
     setTimeout(redir,5000)</script>";
}
    else{
        echo"<h1>erreur d'insertion des donnees à la base</h1>";

    }
}

?>
</body>
</html>