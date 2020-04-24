<html>
<LINK rel= "STYLESHEET" href="NantflixCSS.css" type="text/css">    
<title>AccueilUtilisateur.php</title>   


<body>
<?php
/*cette page va vérifier si les champs rentrés par l'utilisateur existent bien dans la BD.
Si oui, il est authentifié, sinon, il est redirigé vers la page d'authentification*/
ini_set('display_errors','on');
error_reporting(E_ALL);
 //On recupère les champs//
if(isset($_POST['Identifiant'])) $mail=$_POST['Identifiant'];
else $mail="";

if(isset($_POST['motdepasse'])) $mdp=$_POST['motdepasse'];
else $mdp="";

include("NantflixConnexionBd.php");
global $conn;

//Voici la requête qui va permettre de vérifier si les champs rentrés par l'utilisateur existent dans la BD//
$query="SELECT `adresse_mail`, `mdp`,`prenom` FROM `utilisateur` WHERE `adresse_mail` ='$mail' and `mdp`='$mdp'";

$result = mysqli_query($conn,$query);
$result2 = mysqli_query($conn,$query);

if(!mysqli_query($conn,$query)){//On vérifie si la requête est correcte//
    echo"Erreur de requête <br>";
}
else{
    if(mysqli_fetch_assoc($result)==NULL){//Cette fonction vaut NULL si aucun résultat n'a été retourné, càd que les champs rentrés sont incorrects//
        echo'<h1>mot de passe ou identifiant inconnu , redirection dans 5 secondes vers la page de connexion</h1>';
        echo "<script type='text/javascript'>function redir(){
            self.location.href='http://projetnantflix/NantflixConnexion.php'
            }
            setTimeout(redir,5000)</script>";
    }
    else{//Sinon, l'utilisateur a bien rentré son Id et son mdp, on l'autorise donc à avoir accès à son espace membre//
        session_start();//on débute une session//
        $prenom=mysqli_fetch_assoc($result2);
        //pour le moment, on enregistre dans la session son prénom, son ID et son mot de passe//
        $_SESSION['prenom']=$prenom['prenom'];
        $_SESSION['adresse_mail'] = $mail;
        $_SESSION['mdp'] = $mdp;
        print_r($_SESSION);
        echo'<h1>Connexion réussie! redirection...</h1>';//redirection vers la page des séries//
        echo "<script type='text/javascript'>function redir(){
            self.location.href='http://projetnantflix/Series.php'
            }
            setTimeout(redir,3000)</script>";
    }
    
}
?> 


</body>
</html>