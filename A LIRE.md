# ProjetSQL
YAN SOUETRE &amp; JULES LADEIRO &amp;

Dans PHPMyAdmin, créer la base de donnée "todo" en utf8_general_ci, puis importez le fichier sql/todo.sql dedans.
Le fichier index.php est le fichier principal du site, tout fonctionne depuis celui-ci.

Pour les lignes de création de la BDD, rendez-vous dans le ficier sql/bddtodo.txt


-------


CHANGEMENTS EFFECTUES :

$date1 = strtotime(date("Y-m-d H:i:s")); $date2 = strtotime($reminds->date);
if (($date2 - $date1) <= 0) { 
Ces lignes qui avaient pour but de calculer la différence de jours en PHP, ont étés retransmises en SQL
TIMEDIFF(date,NOW()) a donc été ajouté dans la requette de l'accueil pour pouvoir calculer la différence de jours
et si elle est nagativé, la date est passé et on peut afficher le texte "NOW" sur l'évènement en question