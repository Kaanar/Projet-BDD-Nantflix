<html>
<LINK rel= "STYLESHEET" href="NantflixCSS.css" type="text/css"> 

<title>Insertion de série </title>   


<!--Cette page est un formulaire d'ajout de série, elle n'est pas accessible par le site directement,
On ne peut la lancer uniquement qu'à partir du serveur local.-->

<body>
<h1>Quelle série voulez-vous insérer?</h1>

<form method="post" class="a" action="NantflixListeSéries.php">
<br><br>
<input type="text" name="Intitulé" autocomplete="off" placeholder="Intitulé de la série" required><br><br>
<input type="number" name="NbEpisodes" autocomplete="off" placeholder="Nombres d'épisodes" required><br><br>
Année de sortie<br>
<SELECT name="date" size="1" required>
            <OPTION>1970
            <OPTION>1971
            <OPTION>1972
            <OPTION>1973
            <OPTION>1974
            <OPTION>1975
            <OPTION>1976
            <OPTION>1977
            <OPTION>1978
            <OPTION>1979
            <OPTION>1980
            <OPTION>1981
            <OPTION>1982
            <OPTION>1983
            <OPTION>1984
            <OPTION>1985
            <OPTION>1986
            <OPTION>1987
            <OPTION>1988
            <OPTION>1989
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
            <OPTION>2001
            <OPTION>2002
            <OPTION>2003
            <OPTION>2004
            <OPTION>2005
            <OPTION>2006
            <OPTION>2007
            <OPTION>2008
            <OPTION>2009
            <OPTION>2010
            <OPTION>2011
            <OPTION>2012
            <OPTION>2013
            <OPTION>2014
            <OPTION>2015
            <OPTION>2016
            <OPTION>2017
            <OPTION>2018
            <OPTION>2019
            <OPTION>2020
            </SELECT><br><br>
<input type="text" name="Réalisateur" autocomplete="off" placeholder="Réalisateur" required><br><br>
<input type="text" name="Acteurs_principaux" autocomplete="off" placeholder="Acteurs_principaux" required><br><br>
<input type="submit" value="Valider" class="Regarder">
</form>



</body>
</html>
