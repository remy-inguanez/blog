
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blog-Inscription</title>

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
                <ul> <?php include('header.php');
                if(isset($_SESSION['login']) || isset($_SESSION['pass']))
                {
                    header('Location: index.php');
                }
                ?>

                </ul>				
		</header>

		<main>
			<section>
				<form class="forme" action="inscription.php" method="post">
					<h1>Inscription</h1>
                    
					<fieldset>
						<legend>Identifiants</legend>
						<label>login :
                            <input type="text" name="login" maxlength="8"  required placeholder="login"/></label>
                        <label>email: 
				            <input type="email" name="email"  size="30" pattern=".+@gmail.com" placeholder="ex:toto@gmail.com"/></label>
				        <label>mot de passe :
					        <input type="password" name="passe" minlength="4" required placeholder="password"/></label>
				        <label>confirmation :
                            <input type="password" minlength="4"  name="passe2" required placeholder="confirmation"/></label>	
                            <input type="hidden"	value="1" name="droits"/>
                        <label>
			                <input type="checkbox" name="condition" required placeholder="condition"/> <a href="">J'accepte les conditions générales d'utilisation.</a></label>
                            <input type="submit" value="inscription" name="inscription"/> 
                    </fieldset>   

                </form>
            </section>    

            <section>

            <?php

            if(isset($_POST["inscription"]))
            {
                $login=$_POST['login'];
                $connexion = mysqli_connect("localhost", "root", "", "blog");
                $sql = "SELECT * FROM utilisateurs WHERE login='$login'";
                $req = mysqli_query($connexion, $sql);
                $req2 = mysqli_num_rows($req); 

                if(($_POST['passe']!=$_POST['passe2']))
                {
                    echo"<p class='bug'>Mots de passes rentrés différents</p>";
                }

                else if($req2==1)
                {
                echo "<p class='bug'>*Login existant</p>";
                }

                else
                {
                $droits=$_POST["droits"];
                $login=$_POST["login"];
                $pass=$_POST["passe"];
                $email = $_POST["email"];
                $pass= sha1($pass);
                $pass2=$_POST["passe2"];
                $requete = "INSERT INTO utilisateurs(login, password, email, id_droits)
                values ('$login','$pass','$email','$droits')";
                $query = mysqli_query($connexion, $requete);
                mysqli_close($connexion);
                header('Location: connexion.php');
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
