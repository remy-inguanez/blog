
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="index.css"/>
		<title>Creer-article</title>
	</head>

	<body>
    <header class="topnav">
			<nav id="menu">
                <ul> 
                <?php include('header.php') ;

                if (isset($_SESSION['login']))
                {
                    $login=$_SESSION['login'];
                    $sql = "SELECT * FROM utilisateurs WHERE login = '$login'";  
                    $req = mysqli_query($connexion,$sql);
                    $data = mysqli_fetch_array($req);
                    if($data['id_droits'] == 1337 OR $data['id_droits'] == 42 )
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
                <form  class="forme"method="post">
                    <h1>Nouveau article</h1>
                    <fieldset>
                        <legend>article</legend>
                        <input  required type="text" name="titre" size="50" placeholder="titre"/>
                        <input type="texte" name="image" value="blog.jpg" placeholder="lien dossier image"/>
                        <textarea row="500" cols="100" required placeholder="article"   name="article"></textarea>
                        <select name="ctg">
                        <legend>Catégories ?</legend>

                           <?php

                           $login=$_SESSION["login"];
                           $connexion = mysqli_connect("localhost", "root", "", "blog");
                           $uti = "SELECT * FROM utilisateurs WHERE login = '$login'"; 
                           $uti2 = mysqli_query($connexion,$uti);
                           $resultat = mysqli_fetch_array($uti2);
                           $id=$resultat["id"];

                           $categories = "SELECT * FROM categories ";  
                           $quer = mysqli_query($connexion,$categories);
                           while ($data = mysqli_fetch_array($quer))
                           {
                               echo'<option>'.$data['nom'].'</option>';
                           }
                           ?>

                        </select>
                        <input type="submit" name="go" value="Poster"/>
                    </fieldset>

                </form>

                    <?php
                    
                    if(isset($_POST["go"]))
                    {
                        $nom=$_POST['ctg'];

                        $ctg = "SELECT * FROM categories WHERE nom = '$nom'"; 
                        $ctg2 = mysqli_query($connexion,$ctg);
                        $fetch = mysqli_fetch_array($ctg2);

                        $article=$_POST["article"];
                        $titre=$_POST["titre"];
                        $categori=$fetch["id"];
                        $image=$_POST["image"];
                        $inser = "INSERT INTO `articles` (id,titre,article,image,id_utilisateur,id_categorie,date) 
                        VALUES (NULL,'".$titre."','".$article."','".$image."','".$id."','".$categori."', now())"; 
                        $query = mysqli_query($connexion, $inser);
                        header('Location: index.php');

                    }
                    ?>

        </section>
        </main>

        <footer>
		    <?php include('footer.php') ?>
		    <section>
		    Tout droit réservé . Remy.I Adam.T 2020
		    </section>
		</footer>
       
    </body>

</html>
