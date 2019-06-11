<?php
session_start();
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
if (!isset($_POST['pseudo'])) 
{
	?> 
    <!Doctype html>
    <html>
        <head>
            <title> Connexion </title>
            <style>
                body {
                    background-color: #8FBC8F;
                }
                #lab {  
                    display: flex; 
                    justify-content:center; 
                    align-items: center; 
                    margin-top:50px;
                }
                #connexion {
                    margin-top : 40px;
                    text-align:center;
                }
                .h2 { 
                    font-size: 22px;
                    font-style: italic;
                    line-height: 22px;
                    font-family: 'Droid Serif',-apple-system,BlinkMacSystemFont,'Segoe UI',
                    Roboto,'Helvetica Neue',Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji',
                    'Segoe UI Symbol','Noto Color Emoji';
                    text-align : center;
                    margin-top : 200px;
                }
                .espace {
                    margin-right:10px;
                }
            </style>
        </head>
        <body class="body">
            <form method="post" action="connexion.php">
            <p class="h2"> Connexion </p>
                <div id="lab">
                    <input class="espace" name="pseudo" type="text" id="pseudo" placeholder=" Pseudo ">
                    <input type="password" name="password" id="password" placeholder=" Mot de passe ">
                </div>
                <div id="connexion">
                    <input class="connexion" type="submit" value="Connexion">
                </div>
            </form>
        </body>
	</html>
    <?php 
}
else
{
    $message='';
    if (empty($_POST['pseudo']) || empty($_POST['password']) ) 
    {
        $message = '<p>une erreur s\'est produite pendant votre identification.
	Vous devez remplir tous les champs</p>
	<p>Cliquez <a href="connexion.php">ici</a> pour revenir</p>';
    }
    else 
    {
        $query=$dbh->prepare('SELECT *
        FROM users WHERE user_username = :user_username');
        $query->bindValue(':user_username',$_POST['pseudo'], PDO::PARAM_STR);
        $query->execute();
        $data=$query->fetch();
	if ($data['user_password'] == md5($_POST['password'])) // Acces OK !
	{ 
        $_SESSION['user'] = $data;
        //var_dump($_SESSION['user']['user_id']);
        //die();
        header('Location: membre.php');
        exit();
	}
	else 
	{
	    $message = '<p>Une erreur s\'est produite 
	    pendant votre identification.<br /> Le mot de passe ou le pseudo 
            entré n\'est pas correct.</p><p>Cliquez <a href="connexion.php">ici</a> 
	    pour revenir à la page précédente </p>';
	}
    $query->CloseCursor();
    }
    echo $message.'</div></body></html>';

}
?>
