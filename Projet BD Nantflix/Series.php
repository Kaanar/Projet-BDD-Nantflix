<html>
<LINK rel= "STYLESHEET" href="NantflixCSS.css" type="text/css">    
<title>Séries.php</title>   

<!--Cette page va afficher sous forme de tableau l'ensemble des séries disponibles
sur le site Nantflix. L'utilisateur pourra choisir de regarder l'une d'entre elles
en cliquant sur le bouton "Regarder" correspondant à chaque série-->

<body>
<?php
ini_set('display_errors','on');
error_reporting(E_ALL);

session_start();/*Pour le choix de série, j'ai ici opté pour un formulaire. Or je me suis rendu compte que
ce n'était pas comme cela que fonctionnait les choix de série pour des sites comme Netflix.
Je pense que j'aurais du faire en sorte de créer des répertoires pour chaque série,
puis créer des pages propres à chaque page d'accueil et à chaque épisode par série .
Faute de temps, je laisse le projet comme ceci et essaierai de le remodifier pendant les vacances*/

echo '<h1>Bienvenue ' . $_SESSION['prenom'] . '</h1><br>';
echo'<h2> Liste des séries</h2>';

/*J'avais fais un formulaire de tri permettant de trier les séries pas ordre alphabétique ou par réalisateur
de manière croissante ou décroissante, cependant la query que je rentre en argument dans mysqli_fetch_assoc
sur cette page dépend des variables $ordre et $tri, pour lesquelles je n'arrrive pas à déplacer
leurs valeurs sur ma page NantflixRegarderSérie.php.
En effet, supposons que sur cette page je trie les séries par nom dans l'ordre décroissant, et que je clique
sur The Walking Dead(Le premier résultat retourné par la query), la page NantflixRegarderSérie
m'affichera quand même "Game of Thrones" car la query sur cette page ne suit pas la partie
"order by" de la query sur la page Séries.php*/


/*?> 
<form method="post" class="a" action="Series.php">
Trier par <SELECT name="tri" size="1" required>
<OPTION>Nom
<OPTION>Année de sortie
</SELECT>
Ordre <SELECT name="ordre" size="1" required>
<OPTION>Croissant
<OPTION>Décroissant
</SELECT>
<input type="submit" value="Valider" class='Regarder'>
</form>
*/

?>
<!--Ceci est un formulaire de recherche permettant de rechercher une série par un nom ou un réalisateur-->
<form method="post" class="a" action="Series.php">
<input type="text" name="recherche" placeholder="Rechercher">
<input type="submit" value="Ok" class='Regarder'>
</form>

<?php
/*
if(!empty($_POST['tri']) AND $_POST['tri']=='Nom')$tri='intitule'; 
else $tri='intitule';
if(!empty($_POST['tri']) AND $_POST['tri']=='Année de sortie')$tri='Annee_sortie'; 
else $tri='intitule';
if(!empty($_POST['ordre']) AND $_POST['ordre']=='Croissant')$ordre='ASC';
else $ordre='ASC';
if(!empty($_POST['ordre']) AND $_POST['ordre']=='Décroissant')$ordre='DESC';
else $ordre='ASC';
*/

if(!empty($_POST['recherche'])){/*C'est le cas où le formulaire a été rempli. J'ai décidé de faire 2 cas distincts
    car le fait de rechercher ou non avait un impact sur la query*/
    $recherche=$_POST['recherche'];

    include("NantflixConnexionBd.php");
    global $conn;

    //Cette query va sélectionner la, ou les séries où le titre ou le réalisateur correspond à ce qu'a recherché l'utilisateur//
    $query="SELECT `intitule`,`Nb_Episodes`,`Annee_sortie`,`realisateur` FROM `serie`  where `intitule`='$recherche'or `realisateur`='$recherche' ";

    mysqli_query($conn,$query); 
    $result = mysqli_query($conn,$query);
    $result2 = mysqli_query($conn,$query);
    $result3 = mysqli_query($conn,$query);
    $result4 = mysqli_query($conn,$query);    
    if(!mysqli_query($conn,$query)){
        echo"Erreur de requête <br>";
    }
    else{ /*C'est l'affichage du tableau. Je voulais afficher les caractéristiques des séries
        en colonnes et je n'ai pu réussir qu'en écrivant ce long code... Je pense sincérement que j'aurais pu
        trouver plus court*/
        echo'<table>
        <tr>
        <th>Titre</th>';

        while($row = mysqli_fetch_assoc($result)){//Boucle qui va s'exécuter autant de fois qu'il y a de séries grâce à la fonction mysqli_fetch_assoc//
            
            $nom=$row['intitule'];
            echo"<td>
            <form method='post' class='Regarder' action='NantflixRegarderSérie.php'>
            <br><input type='submit' name='voir'  class='Regarder' value='$nom'></form>
            </td>";
        
        
        }
        echo'</tr>
            <tr>
        <th>Total épisodes</th>';
        while($row = mysqli_fetch_assoc($result2)){
            echo'<td>'.$row['Nb_Episodes'].'</td>';
        }
        echo"</tr>
            <tr>
            <th>Année de sortie</th>";
        while($row = mysqli_fetch_assoc($result3)){
            echo'<td>'.$row['Annee_sortie'].'</td>';
        }
        echo'</tr>
        <tr>
            <th>Réalisateur</th>';
            while($row = mysqli_fetch_assoc($result4)){
                echo'<td>'.$row['realisateur'].'</td>';
            }
            echo '</tr>
        </table>';
    
    }
}
   
else{/*C'est donc le cas où le formulaire n'a pas été rempli, on affiche donc simplement 
    l'ensemble des séries disponibles sur Nantflix*/
    include("NantflixConnexionBd.php");
    global $conn;

    $query="SELECT `intitule`,`Nb_Episodes`,`Annee_sortie`,`realisateur` FROM `serie`";

    mysqli_query($conn,$query); 
    $result = mysqli_query($conn,$query);
    $result2 = mysqli_query($conn,$query);
    $result3 = mysqli_query($conn,$query);
    $result4 = mysqli_query($conn,$query);
    if(!mysqli_query($conn,$query)){
        echo"Erreur de requête <br>";
    }
    else{
        echo'<table>
        <tr>
        <th>Titre</th>';

        while($row = mysqli_fetch_assoc($result)){
            $nom=$row['intitule'];
            echo"<td>
            <form method='post' class='Regarder' action='NantflixRegarderSérie.php'>
            <br><input type='submit' name='voir'  class='Regarder' value='$nom'></form>
            </td>";
        }
        echo'</tr>
            <tr>
            <th>Total épisodes</th>';
        while($row = mysqli_fetch_assoc($result2)){
            echo'<td>'.$row['Nb_Episodes'].'</td>';
        }
        echo'</tr>
            <tr>
            <th>Année de sortie</th>';
        while($row = mysqli_fetch_assoc($result3)){
            echo'<td>'.$row['Annee_sortie'].'</td>';
        }
        echo'</tr>
            <tr>
            <th>Réalisateur</th>';
        while($row = mysqli_fetch_assoc($result4)){
            echo'<td>'.$row['realisateur'].'</td>';
        }
        echo '</tr>
            </table>';
     
    }
}

?>    
<br>
<!--C'est un bouton de déconnexion à la session qui va renvoyer vers la page d'accueil-->
<input type="button" class='Logout' onclick=self.location.href="http://projetnantflix/Nantflix%20Accueil.html"   value="Se déconnecter"'></button>
</body>
</html>
