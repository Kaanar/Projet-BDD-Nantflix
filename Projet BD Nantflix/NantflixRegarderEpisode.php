<?php session_start();?>
<html>
<LINK rel= "STYLESHEET" href="NantflixCSS.css" type="text/css">    
<title>NantflixRegarderEpisode.php</title> 

<!--Cette page va utiliser les données de Session pour enregistrer dans la BDD
l'épisode d'une série que l'utilisateur à regardé en dernier.-->

<body>
<?php
ini_set('display_errors','on');
error_reporting(E_ALL);
include("NantflixConnexionBd.php");
global $conn;
$mail=$_SESSION['adresse_mail'];
if(isset($_SESSION['DernierEpisodeVu'])){//On vérifie si cette donnée(importante) est bien sur cette page//
    
    if($_SESSION['DernierEpisodeVu'] == "NULL"){//si elle vaut NULL, c'est que l'utilisateur n'a pas encore regardé d'épisodes de la série en question//
        echo '<h1> Episode '.$_SESSION['N°Episode'].'</h1>';
        $IdEpisode=$_SESSION['Id_Episode'];
        /*On crée donc une entité "regarde" avec la référence de l'épisode 1 et celle de L'ID de l'utilisateur 
        pour sauvegarder le fait que l'utilisateur regarder l'épisode 1*/
        $query="INSERT INTO `regarde`(RefEpisode, RefUtilisateur) VALUES($IdEpisode,'$mail')";
        if(!mysqli_query($conn,$query))echo"<h2>erreur de requête SQL</h2>";
    }
    else{//Sinon, c'est qu'il a déjà au moins regardé le premier épisode//
        $NumEpisode=$_SESSION['N°Episode']+1;//on stocke dans une variable Le numéro "incrémenté" de 1 pour l'afficher//
        echo '<h1> Episode '.$NumEpisode.'</h1>';
        $IdEpisode=$_SESSION['Id_Episode']+1;//On fait de même pour l'ID de l'épisode//
        /*Cette requête va modifier l'entité qui indiquait le dernier épisode regardé par l'utilisateur.
          En effet, on va modifier l'attribut RefEpisode en l'augmentant 1*/
        $query="UPDATE `regarde` SET `RefEpisode`=`RefEpisode`+1 WHERE `RefEpisode`=`RefEpisode` AND `RefUtilisateur`='$mail'";
        if(!mysqli_query($conn,$query))echo"<h2>erreur de requête SQL</h2>";
    
    }
}
else echo"<h2>erreur</h2>";
?>
<video controls class="ep1" width=800></video>
<!--on affiche ici un champ vidéo sans source, pour montrer que l'on est bien sur la page de visionnage-->
<br><br>
<input type="button"  onclick=window.location.href='http://projetnantflix/Series.php' class="ListeSerie" value="Liste des séries"></button>
</html>