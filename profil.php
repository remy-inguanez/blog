
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="index.css"/>
		<title>Profil</title>
	</head>

	<body>
		<header class="topnav">
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
		    <section>
		   Tout droit réservé . Remy.I Adam.T 2020
		    </section>
		</footer>

	</body>

</html>
