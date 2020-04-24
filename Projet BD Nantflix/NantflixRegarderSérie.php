<?php session_start();?>
<html>
<LINK rel= "STYLESHEET" href="NantflixCSS.css" type="text/css">    
<title>NantflixRegarderSérie.php</title> 

<!--Cette page est celle qui va permettre à l'utilisateur de regarder le premier épisode 
d'une série qu'il a choisit dans la page Séries.php, ou alors de continuer son visionnage-->

<body>
<?php
ini_set('display_errors','on');
error_reporting(E_ALL);
include("NantflixConnexionBd.php");
global $conn;
$mail=$_SESSION['adresse_mail'];
if(isset($_POST['voir']))$nomSerie=$_POST['voir'];//On récupère ici la valeur du champ envoyé par le formulaire de la page Séries.php pour pouvoir l'afficher en tête de page// 
 echo"<h1>$nomSerie</h1>";
 echo"<h2>Liste des épisodes</h2>";

 $query="SELECT * FROM `épisode` where `Refserie`='$nomSerie'"; //On sélectionnne tout les épisodes de la série que l'on a choisi//
 $result=mysqli_query($conn,$query);//on exécute la requête et stocke le résultat dans une variable//
 $row=mysqli_fetch_assoc($result);


//Requête permettant de sélectionner l'entité qui a "sauvegardé" le dernier épisode de la série que l'utilisateur a regardé, retourne NULL si il l'utilisateur n'a jamais regardé la série//
$query2="SELECT * FROM `épisode` INNER JOIN `regarde` ON `épisode`.`Id_Episode`=`regarde`.`RefEpisode` and `épisode`.`Refserie`='$nomSerie'";
$result2=mysqli_query($conn,$query2);
$row2=mysqli_fetch_assoc($result2);

if($row2==NULL){//Si l'utilisateur n'a encore jamais regardé d'épisode de cette série, on rentre dans des $_SESSION l'ID et le numéro de l'épisode 1 de la série//
    $_SESSION['Id_Episode']=$row['Id_Episode'];
    $_SESSION['N°Episode']=$row['N°Episode'];
    $_SESSION['DernierEpisodeVu']="NULL";
}

else{//Sinon, les $_SESSION prennent en valeur L'ID et le numéro de l'épisode qui a été retourné dans la query2, càd le dernier épisode vu par l'utilisateur//
    $_SESSION['Id_Episode']=$row2['Id_Episode'];
    $_SESSION['N°Episode']=$row2['N°Episode'];
    $_SESSION['DernierEpisodeVu']=$row2['Id_Episode'];  
    
    $NumEpisode=$_SESSION['N°Episode']+1;//Cette variable sert juste pour l'affichage// 
    $query3='SELECT `N°Episode` FROM `épisode` WHERE `Id_Episode`='.$_SESSION['DernierEpisodeVu'].'';
    echo'<h3><a href="http://projetnantflix/NantflixRegarderEpisode.php">Cher '.$_SESSION['prenom'].', vous avez commencé la lecture de la série ‘'.$row2['Refserie'].'’, le prochain épisode à
    consulter est l’épisode '.$NumEpisode.'</a></h3>';
} 

if($_SESSION['DernierEpisodeVu']=="NULL"){/*Affiche l'épisode 1 uniquement lors de la première visite. Initialement
                                            Cette partie de code n'était pas sous condition "if" et se trouvait au dessus de la $query2.
                                            Le problème est qu'une fois que l'utiisateur avait cliqué sur l'épisode 1, quand il retournait sur cette page,
                                            qu'il rappuyait sur épisode 1 ou sur l'épisode suivant, il n'y avait aucune différenciation de cas et comprenait que 
                                            l'utilisateur regardait l'épisode suivant à chaque fois. J'ai donc agi ainsi car je n'ai pas trouvé de solution*/

    
    echo"<br><ul>";
    /*On affiche le premier épisode, je sais comment afficher tout les épisodes mais je n'ai pas réussi à transporter l'information de l'épisode choisi
    sur l'autre page NantflixRegarderEpisode*/
    echo'<li type=""><a href="http://projetnantflix/NantflixRegarderEpisode.php">épisode '.$row['N°Episode'].'</a></li>';
    echo"</ul>";
}


?>
</body>
</html>