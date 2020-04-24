<html>
<LINK rel= "STYLESHEET" href="NantflixCSS.css" type="text/css"> 

<title>Liste Series</title>   
<body>

<!--C'est la page qui permet de récupérer les données du formulaire d'ajout de série
et de l'inscrire à la BDD-->

<?php
ini_set('display_errors','on');
error_reporting(E_ALL);

// On commence par récupérer les champs
if(isset($_POST['Intitulé'])) $intitule=$_POST['Intitulé'];
else $intitule="";

if(isset($_POST['NbEpisodes'])) $nb=$_POST['NbEpisodes'];
else $nb="";

if(isset($_POST['date'])) $date=$_POST['date'];
else $date="";

if(isset($_POST['Réalisateur'])) $Real=$_POST['Réalisateur'];
else $Real="";

if(isset($_POST['Acteurs_principaux'])) $acteurs=$_POST['Acteurs_principaux'];
else $acteurs="";

if(empty($intitule) OR empty($nb) OR empty($date) OR empty($Real) OR empty($acteurs))
{
echo '<center><h1>Attention, les champs ne peuvent pas rester vide !</h1></center>';
}
else{
include("NantflixConnexionBd.php");
global $conn;

$query = "INSERT INTO `serie`(intitule,Nb_Episodes,Annee_sortie,realisateur,acteurs_principaux) VALUES('$intitule','$nb','$date','$Real','$acteurs')";

/*Dans les dépôts précédents, j'avais indiqué que mysqli_query retournait false et que les données n'étaient ps envoyées.
J'ai résolu ce problème. Tout cela venait d'un problème d'interclassement...La page envoyait les informations
en UTF-8, tandis que la BD les reçevait avec un autre interclassement, ce qui faisait que l'accent aigu de "série" n'était pas bien interprêté.
Pour éviter ce genre de problèmes, j'ai supprimé l'accent de la table "serie"*/

if(mysqli_query($conn,$query)){
    echo"<h1>La série a bien été ajoutée, redirection...</h1>";//On redirige l'utilisateur vers la page de séries//
    echo "<script type='text/javascript'>function redir(){
     self.location.href='http://projetnantflix/Series.php'
     }
     setTimeout(redir,3000)</script>";
}
else{
    echo"<h1>erreur d'insertion des donnees à la base</h1>";

   
   }
}
?>
</body>
</html>
