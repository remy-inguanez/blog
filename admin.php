
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blog-Admin</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

		<nav id="menu">
                <ul>
                 <?php include('header.php');

                 if (isset($_SESSION['login']))
                {
                    $login=$_SESSION['login'];
                    $sql = "SELECT * FROM utilisateurs WHERE login = '$login'";  
                    $req = mysqli_query($connexion,$sql);
                    $data = mysqli_fetch_array($req);
                    if($data['id_droits'] == 1337 )
                    {

                    }
                    else{
                        header('Location: index.php');
                    }
                }
                else
                {
                    header('Location: index.php');
                }
                    ?>

                </ul>				
		</header>

        <main>
            <section>
            <h2>admin</h2>
                <form  class="forme"method="post">
                    <fieldset>
                        <legend>Nouvelle catégorie</legend>
                        <input  required type="text" name="titre" size="50" placeholder="titre"/> 
                        <input type="submit" name="go" value="Poster"/>

                    </fieldset>
	            </form>
            <?php

            if(isset($_POST["go"]))
            {
                $titre=$_POST["titre"];
                $connexion = mysqli_connect("localhost", "root", "", "blog");
	            $requete = "INSERT INTO `categories` (`id`,`nom`) VALUES (NULL,'".$titre."')";  
                $query = mysqli_query($connexion, $requete);

            }	
            ?>

            </section>
            <section>
                <form class="forme" method="post" action="">
                    <fieldset>
                        <legend>Supprimer une categorie</legend>                 
                            <input type="text" name="ctg"/>
                            <input type="submit" name="sup" value="supprimer"/>
                    </fieldset>
                </form>
                        <?php

                        if(isset($_POST['sup']))
                    {
						$base = mysqli_connect("localhost", "root", "", "blog");
						$ctg=$_POST['ctg'];
						$delete="DELETE FROM `categories` WHERE nom='$ctg'";
						$quer= mysqli_query($base,$delete);
						echo "<p class='bug'>$ctg supprimée avec succès !</p>";
					}
                        ?>
					    
			    <form class="forme" method="post" action="">
                    <fieldset>
                        <legend>Supprimer un article</legend>
                            <input type="text" name="article"/>
                            <input type="submit" name="suppu" value="supprimer"/>
                    </fieldset>

                </form>
                    <?php

                    if(isset($_POST['suppu']))
                    {
						$base = mysqli_connect("localhost", "root", "", "blog");
						$article=$_POST['article'];
						$delet="DELETE FROM `articles` WHERE titre='$article'";
						$quer= mysqli_query($base,$delet);
                        echo "<p class='bug'>$article supprimée avec succès !</p>";

                    }
                    ?>

            </section>

                    <h2>Utilisateurs</h2>
            <section>    
                <form class="forme" method="post" action="">
                    <fieldset>
                        <legend>Supprimer un utilisateur</legend>
                            <input type="text" name="utilisateur"/>
                            <input type="submit" name="supp" value="supprimer"/>
                    </fieldset>
                </form>

                <?php

                    if(isset($_POST['supp']))
                    {
						$base = mysqli_connect("localhost", "root", "", "blog");
						$utilisateur=$_POST['utilisateur'];
						$dele="DELETE FROM `utilisateurs` WHERE login='$utilisateur'";
						$quer= mysqli_query($base,$dele);
                        echo "<p class='bug'>$utilisateur supprimée avec succès !</p>";

                    }
                    ?>

                <form class="forme" method="post" action="">
                    <fieldset>
                        <legend>Gestion des droits</legend>
                            <input type="text" name="login" placeholder="login"/>
                            <input type="text" name="id" placeholder="id"/>
                            <input type="submit" name="modif" value="modifier"/>
                    </fieldset>
                </form>  

                    <?php 

                      if(isset($_POST['modif']))
                        {
                            $id=$_POST['id'];
                            $login=$_POST['login'];
                            $base = mysqli_connect("localhost", "root", "", "blog");
                            $insert="UPDATE utilisateurs SET id_droits = '$id' WHERE login = '$login'";
                            $result= mysqli_query($connexion, $insert);
                            echo'<p class="bug">modifier avec succés</p>';

                        }
                        ?>

            </section>
        </main> 

    <footer>
        <?php include('footer.php') ?>     
    </footer>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/velodrome.png')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>

</html>
