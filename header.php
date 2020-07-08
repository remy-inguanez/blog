
<ul>
    <?php
        session_start();
        $connexion = mysqli_connect("localhost", "root", "", "blog");
        
        if (isset($_SESSION['login'])):
            $login=$_SESSION['login'];
            $sql = "SELECT * FROM utilisateurs WHERE login = '$login'";  
            $req = mysqli_query($connexion,$sql);

  ?>
  
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.php">Blog</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="inscription.php">Inscription</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="connexion.php">Connexion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="article.php">Categorie</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

    <?php
        $sql2 = "SELECT * FROM categories ";  
        $req2 = mysqli_query($connexion,$sql2);
        
        while ($dataa = mysqli_fetch_array($req2))
        {
            echo'<li><a href="index.php?ctg=' , $dataa['id'] , '">'.$dataa['nom'].'</a></li>';
        }
    ?>

    </ul>
    </li> 
  
    <?php
        while ($data = mysqli_fetch_array($req))
        {
            if($data['id_droits'] == 42 )
            {
                echo '<li><a href="creer-article.php">Article</a></li>';
            }
            
            elseif($data['id_droits'] == 1337 )
            {
                echo '<li><a href="admin.php">Admin</a></li>';
                echo '<li><a href="creer-article.php">Article</a></li>';
            }
        }    
?>

<li>
        <form action="index.php" class='head' method="post">
            <input type="submit" name='deconnexion' class="deco" value="deconnexion">
        </form>

<?php if (isset($_POST['deconnexion'])) {
                session_unset();
                session_destroy();
                header('Location:index.php');
            }
            ?>
          
</li>

 <?php else:?>     
 
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.php">Blog</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="inscription.php">Inscription</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="connexion.php">Connexion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="article.php">Categorie</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

    <?php
        $sql2 = "SELECT * FROM categories ";  
        $req2 = mysqli_query($connexion,$sql2);
        
        while ($dataa = mysqli_fetch_array($req2))
        {
            echo'<li><a href="index.php?ctg=' , $dataa['id'] , '">'.$dataa['nom'].'</a></li>';
        }
    ?>

</ul>
</li> 
 
<?php endif;?>             
</ul>
