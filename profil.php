
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blog-Profil</title>

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

	<nav id="menu">
				<ul> <?php include('header.php') ;
					if(!isset($_SESSION['login']))
					{
						header('Location: index.php');

					}
                    ?>
                    
                </ul>				
		</header>

		<main>
			    <h1>Modification profil</h1>
            <section>
                <form class="forme" action="" method="post">
                    <fieldset>
                        <legend>Identifiants</legend>
                        <label>Login :
                            <input type="text" disabled  value="<?php echo $_SESSION['login']  ?>" name="login" maxlength="8"  required placeholder="login"/></label>
						<label>Email :
                            <input type="email" name="email"  size="30" value="" : 
                             placeholder="ex:toto@gmail.com"/></label>
						<label>Mot de passe :
                            <input type="password" name="passe" minlength="4"  placeholder=" new password"/></label>
                        <label>Confirmation :
                            <input type="password" minlength="4"  name="passe2"  placeholder="confirmation"/></label>
                    </fieldset>
				     	<label>
                            <input type="checkbox" name="condition" required placeholder="condition"/> <a href="">J'accepte les conditions générales d'utilisation.*</a>
                        </label>
                            <input type="submit" value="modif" name="modifier"/>
                </form>
            </section>

            <?php
            
			$login=$_SESSION['login'];
			$connexion = mysqli_connect("localhost", "root", "", "blog");
			$sql = "SELECT * FROM utilisateurs WHERE login = '$login'";
			$query = mysqli_query($connexion, $sql);
			$data = mysqli_fetch_array($query);

			if(!empty($_POST['modifier']))
                        {   
                            $pass= $_POST["passe"];
                            $pass= sha1($pass);
                            $pass2= $_POST["passe2"];
							$pass2= sha1($pass2);
							$mail=$_POST["email"];
                          
                            
                            if(($_POST['passe']!=$_POST['passe2']))
                            {
                                echo"<p class='bug'>Mots de passes rentrés différents</p>";
                            }
                            else
                            {
                                $insert="UPDATE utilisateurs SET password = '$pass', email='$mail'
                                WHERE login = '".$_SESSION['login']."'";
                                $result= mysqli_query($connexion, $insert);
                                echo'<p class="bug">modifier avec succés</p>';
                            }
                        }
                        ?>

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
