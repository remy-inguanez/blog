
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blog-Connexion</title>

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

  <!-- Page Header -->
        <header class="masthead" style="background-image: url('img/giphy.gif')">
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

<nav id="menu">
				<ul> <?php include('header.php') ?></ul>				
		</header>

        <main>
            <?php
            if(isset($_SESSION['login']))
            {
				header('Location: index.php');
			} 
			
            ?>

            <section> 
                <article class="box">
                    <form class="forme" method="post">
                        <h1>Connexion</h1>
                        <fieldset>
                             <legend>Connecte toi </legend>
                             <label for="pseudo">Pseudo :</label>
                             <input type="text" name="login"  placeholder="login"required/>
                             <label for="password">Mot de passe :</label>
                             <input type="password" name="pass"  placeholder="mot de passe"required/>
						     <input type="submit" value="Connexion" name="Connexion"required/>
					    </fieldset>

			        </form>

			    </article>
            </section>	
            
            <section>
                <?php

                if(isset($_POST["Connexion"]))
                {
                    $login=$_POST["login"];
                    $password=($_POST["pass"]);
                    $password = sha1($password);
                    $connexion = mysqli_connect("localhost", "root", "", "blog");
                    $requete = "SELECT * FROM utilisateurs WHERE login='$login'";
                    $query=mysqli_query($connexion,$requete);
                    $resultat = mysqli_fetch_array($query);

                    if ($login == $resultat["login"] && $password == $resultat["password"])
                    {
                        $_SESSION["id"]=$resultat["id"];
                        $_SESSION['login']=$resultat["login"];
                        mysqli_close($connexion);
                        header('Location: index.php');
                    }

                    else
                    {
                        echo '<p class="bug">*Login ou Mot de passe incorrect</p>';
                    }
                }
                    ?>

            </section>
        </main>
        
        <footer>
		<?php include('footer.php') ?>
		</footer>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>

</html>
