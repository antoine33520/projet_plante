<?php

session_start();

if (!isset($_SESSION['user'])) { 
        header('Location: connexion.php');
} else {
    ?> 
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
    ?>
    <!Doctype html>
            <html>
                <head>
                    <title> Page membre </title>
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
                    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
                    crossorigin="anonymous">
                    <style>
                    body {
                        background-color: #8FBC8F;
                    }
                    h1 {
                        font-family: 'Ranga', cursive;
                        text-align:center;
                    }
                    h2 {
                        margin-left:25px;
                    }
                    #deco {
                        float:right;
                        margin-right: 15px;
                    }
                    .card {
                        margin-left:50px;
                        margin-top: 30px;
                    }
                    label,
                    footer {
                        font-family: sans-serif;
                    }

                    label {
                        margin-left: 20px;
                        font-size: 1rem;
                        padding-right: 10px;
                    }

                    select {
                        font-size: .9rem;
                        padding: 2px 5px;
                    }
                    label, #ajj, #deco {
                        display: inline-block;;
                    }
                    #plante, #info, #donnee {
                        display: inline-block;
                        vertical-align: top;
                    }
                    #info {
                        text-align: center;
                        width:30%;
                    }
                    #donnee {
                        margin-top: 30px;
                        text-align: center;
                        width:30%;
                    }
                    #modif {
                    	margin-top: 5px;
                    	margin-left: 20px;
                    }
                    #ajoutbdd {
                    	margin-left: 20px;
                    	margin-top: 20px;
                    }
                    </style>
                </head>
                <body class="body">
                    <h1> Bienvenue <?php echo $_SESSION['user']['user_username']; ?> </h1>
                    <hr>
                    <?php 
	                    if (isset($_POST['deco'])) {
                            session_unset();
                            session_destroy();
                            header('Location: index.php');
                            exit();
                        }
                    ?>
    		        <label for="pet-select"> Choisissez une plante à ajouter : </label>
                        <form method="post" id="ajj">
                            <fieldset>
                                <select name="select">
                                    <optgroup label="Arbres">
                                    <?php 
                                        $req = $dbh->query("SELECT * FROM plants WHERE plant_category = 'Arbre' ");
                                        $plants = $req->fetchAll();
                                        foreach ($plants as $plant) : ?>

                                        <option value="<?= $plant['plant_id']?>"> <?= $plant['plant_name']?> </option>

                                    <?php endforeach  ?> 
                                    </optgroup>
                                    <optgroup label="Arbuste">
                                    <?php 
                                        $req = $dbh->query("SELECT * FROM plants WHERE plant_category = 'Arbuste' ");
                                        $plants = $req->fetchAll();
                                        foreach ($plants as $plant) : ?>
                                        <option value="<?= $plant['plant_id']?>"> <?= $plant['plant_name']?> </option>
                                    <?php endforeach  ?> 
                                    </optgroup>
                                    <optgroup label="Plantes grasses">
                                    <?php 
                                        $req = $dbh->query("SELECT * FROM plants WHERE plant_category = 'Plantes grasses' ");
                                        $plants = $req->fetchAll();
                                        foreach ($plants as $plant) : ?>
                                        <option value="<?= $plant['plant_id']?>"> <?= $plant['plant_name']?> </option>
                                    <?php endforeach  ?> 
                                    </optgroup>
                                    <optgroup label="Plantes exotiques">
                                    <?php 
                                        $req = $dbh->query("SELECT * FROM plants WHERE plant_category = 'Plantes exotiques' ");
                                        $plants = $req->fetchAll();
                                        foreach ($plants as $plant) : ?>
                                        <option value="<?= $plant['plant_id']?>"> <?= $plant['plant_name']?> </option>
                                    <?php endforeach  ?> 
                                    </optgroup>
                                    <optgroup label="Plantes aquatiques">
                                    <?php 
                                        $req = $dbh->query("SELECT * FROM plants WHERE plant_category = 'Plantes aquatiques' ");
                                        $plants = $req->fetchAll();
                                        foreach ($plants as $plant) : ?>
                                        <option value="<?= $plant['plant_id']?>"> <?= $plant['plant_name']?> </option>
                                    <?php endforeach  ?> 
                                    </optgroup>
                                </select>
                                <input type="text" placeholder=" Surnommez votre plante" name="surnom" />
                                <input type="submit" value="Choisir" name="submit" />
                            </fieldset>
                        </form>
                        <div id="deco">
                        	<form method="post">
                                <input type="submit" value="Déconnexion" name="deco">
                            </form>
                        </div>
                        <br>
                         <div id="ajoutbdd">
                        	<form method="post">
                                <input type="submit" value="Ajouter une plante dans la sélection" name="ajoutbdd">
                            </form>
                        </div>
                        <?php if(isset($_POST['ajoutbdd'])){ ?>
                                    	<form action="membre.php" method="post">
                                        	<input type="text" placeholder="Nom de la plante" name="nameplant">
                                        	<input type="text" placeholder="Catégorie" name="namecategory">
                                        	<input type="text" placeholder="URL de la photo" name="namephoto">
                                        	<input type="text" placeholder="Description" name="namedescription">
                                        	<input type="text" placeholder="Luminosité minimale" name="namelum">
                                        	<input type="text" placeholder="Luminosité maximale" name="namelummax">
                                        	<input type="text" placeholder="Température minimale" name="nametemp">
                                        	<input type="text" placeholder="Température maximale" name="nametempmax">
                                        	<input type="text" placeholder="Humidité minimale" name="namehum">
                                        	<input type="text" placeholder="Humidité maximale" name="namehummax">
                                        	<button type="submit" name="ajouterbdd"> Ajouter </button>
                                    	</form>    
							<?php } 
								if (isset($_POST['ajouterbdd'])) {
                    			$req = $dbh->prepare("INSERT INTO plants (plant_name, plant_category, plant_photo, plant_description, plant_luminosity_min, plant_luminosity_max, plant_humidity_min, plant_humidity_max, plant_temperature_min, plant_temperature_max) 
                    				VALUES (:plant_name, :plant_category, :plant_photo, :plant_description, :plant_luminosity_min, :plant_luminosity_max, :plant_humidity_min, :plant_humidity_max, :plant_temperature_min, :plant_temperature_max)");
                                $req->bindParam(':plant_name', $_POST['nameplant'], PDO::PARAM_INT);
                                $req->bindParam(':plant_category', $_POST['namecategory'], PDO::PARAM_INT);
                                $req->bindParam(':plant_photo', $_POST['namephoto'], PDO::PARAM_INT);
                                $req->bindParam(':plant_description', $_POST['namedescription'], PDO::PARAM_INT);
                                $req->bindParam(':plant_luminosity_min', $_POST['namelum'], PDO::PARAM_INT);
                                $req->bindParam(':plant_luminosity_max', $_POST['namelummax'], PDO::PARAM_INT);
                                $req->bindParam(':plant_humidity_min', $_POST['namehum'], PDO::PARAM_INT);
                                $req->bindParam(':plant_humidity_max', $_POST['namehummax'], PDO::PARAM_INT);
                                $req->bindParam(':plant_temperature_min', $_POST['nametemp'], PDO::PARAM_INT);
                                $req->bindParam(':plant_temperature_max', $_POST['nametempmax'], PDO::PARAM_INT);
                                $req->execute();
                            } 
                            if (isset($_POST['submit'])) {
                    			$req = $dbh->prepare("INSERT INTO uplants (uplant_name, user_id, plant_id) VALUES (:uplant_name, :user_id, :plant_id)");
                                $req->bindParam(':uplant_name', $_POST['surnom'], PDO::PARAM_INT);
                                $req->bindParam(':user_id', $_SESSION['user']['user_id'], PDO::PARAM_INT);
                                $req->bindParam(':plant_id', $_POST['select'], PDO::PARAM_INT);
                                $req->execute();
                            } ?>
                        <br>
                        <form id="modif" method="post">
                        	<input type="submit" name="modif" value="Modifier le nom de votre plante">
                        </form>
                        <?php 
	                	if(isset($_POST['modifier'])) {
                            $query = $dbh->prepare("UPDATE uplants SET uplant_name=:uplant_name WHERE uplant_id=:uplant_id");
                            $query->bindParam(':uplant_name', $_POST['upname'], PDO::PARAM_STR);
                            $query->bindParam(':uplant_id', $_POST['upid'], PDO::PARAM_INT);
                            $query->execute();
                        } ?>
                        <hr>
                    <h2> Mes plantes </h2>
                     <?php 
                        $req= $dbh->prepare("SELECT * FROM uplants up JOIN plants p ON up.plant_id = p.plant_id
                            WHERE up.user_id = :uid");
                        $req->bindParam(':uid', $_SESSION['user']['user_id'], PDO::PARAM_INT);
                        $req->execute();
                        $uplants = $req->fetchAll();
                        foreach($uplants as $uplant) : ?>
                    <section>
                    	<div id="plante" class="card" style="width: 18rem;">
                      		<img class="card-img-top" src="<?= $uplant['plant_photo']?>" alt="Image de la plante">
                      		<div class="card-body">
                        		<h5 class="card-title"> <?= $uplant['plant_name'].' - '.$uplant['uplant_name'] ?></h5>
                      		</div>
                      		<?php 
                            	if(isset($_POST['suppr'])) { ?>
                            		<form action="membre.php" method="post">
                            			<button id="buttonsuppr" type="submit" name="supprimer"> Supprimer </button>
                                		<input type="text" value="<?= $uplant['uplant_id'] ?>" name="upid" readonly>
                            		</form>
                        	<?php } if(isset($_POST['modif'])){ ?>
                                    	<form action="membre.php" method="post">
                                        	<th width="10px" scope="row"><input type="text" value="<?= $uplant['uplant_id'] ?>" name="upid" readonly></th>
                                        	<td><input type="text" value="<?= $uplant['uplant_name'] ?>" name="upname"></td>
                                        	<button type="submit" name="modifier"> Modifier </button>
                                    	</form>                                
                        	<?php } ?>
                    	</div>
                    	<div id="info" class="card" style="width: 19rem;">
                      		<ul class="list-group list-group-flush">
                      			<li class="list-group-item"> Conditions optimales : </li>
                        		<li class="list-group-item"> <?= 'Luminosité entre : '.$uplant['plant_luminosity_min'].' % et '.$uplant['plant_luminosity_max'].' %'?> </li>
                        		<li class="list-group-item"> <?= 'Humidité entre : '.$uplant['plant_humidity_min'].' % et '.$uplant['plant_humidity_max'].' %'?> </li>
                        		<li class="list-group-item"> <?= 'Température entre : '.$uplant['plant_temperature_min'].' °C et '.$uplant['plant_temperature_max'].' °C'?> </li>
                      		</ul>
                    	</div>
                    	<div id="donnee" class="card" style="width: 19rem;">
                    	 	<?php 
                            	$req = $dbh->prepare("SELECT * FROM datas WHERE uplant_id=1");
                            	$req->execute();
                            	$donnees = $req->fetchAll();
                            	foreach ($donnees as $donnee) : ?>
		                      		<ul class="list-group list-group-flush">
		                      			<li class="list-group-item"> Informations sur votre plante : </li>
		                        		<li class="list-group-item"> (f5 pour recharger les données) </li>
		                        		<li class="list-group-item"> Température : <?= $donnee['data_temperature'] ?>  °C  </li>
		                        		<li class="list-group-item"> Humidité : <?= $donnee['data_humidity'] ?> % </li>
		                        		<li class="list-group-item"> Luminosité : <?= $donnee['data_luminosity'] ?> % </li>
		                      		</ul>
                    		<?php endforeach ?>
                    	</div>
                      	<hr>
                    </section>
                    <?php endforeach ?>

                    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                </body>
        	</html>
<?php
    }

?>
