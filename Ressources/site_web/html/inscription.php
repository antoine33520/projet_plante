<?php
$host_name = 'localhost';
$database = 'plant_uf';
$user_name = 'emmadrd912';
$password = 'manonemma33';
$dbh = null;

try {
  $dbh = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
} catch (PDOException $e) {
  echo "Erreur!: " . $e->getMessage() . "<br/>";
  die();
}

if (!isset($_POST['inscription'])) {
  ?> 
  <!Doctype html>
  <html>
      <head>
          <title> PlanteConnecté - Inscription </title>
      </head>
      <body class="body">
          <form method="post">
          <p> Inscription </p>
                  <input name="pseudo" type="text" placeholder=" Pseudo ">
                  <input type="password" name="password" id="password" placeholder=" Mot de passe ">
                  <input name="inscription" type="submit" value="S'inscrire">
         </form>
      </body>
  </html>

<?php 
} else {

  if (empty($_POST['pseudo']) || empty($_POST['password']) ) 
    {
        echo "Une erreur s'est produite pendant votre inscription, vous devez remplir tous les champs";
    } else {
        $query = $dbh->prepare("INSERT INTO users VALUES (:user_username,:user_password)");
        $query->bindParam(':user_username',$_POST['pseudo'], PDO::PARAM_INT);
        $query->bindParam(':user_password',$_POST['password'], PDO::PARAM_INT);
        $query->execute();
        echo "ok";
    }
}
?>
