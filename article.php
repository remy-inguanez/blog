
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="index.css"/>
		<title>Article</title>
	</head>

	<body>
		<header class="topnav">
			<nav id="menu">
				<ul> <?php include('header.php') ?></ul>				
		</header>
		<main>

		 <?php
                $connexion = mysqli_connect("localhost", "root", "", "blog");
				$uti = 'SELECT * FROM articles WHERE id="'.$_GET['id'].'" ';
				$uti2 = mysqli_query($connexion,$uti);
				while ($data = mysqli_fetch_array($uti2))
                           {
							   echo'<h1 class="ha">'.$data["titre"].'</h1>';
			
							   echo'<aside class="imge"><img class="img" src="'.$data['image'].'"/></aside>'; 
							   echo'<section class="versement">';
							   echo'<article><p>'.nl2br($data["article"]).'</p>';
							   echo'<p>'.$data["date"].'</p></article>';
							   echo'</section>';
						   }
		?>

<div class="act">
                        
				<?php include('articles.php') ?>
				
</div>
</main>
		<footer>
   		<?php include('footer.php') ?>
		    <section>
		   Tout droit réservé . Remy.I Adam.T 2020
		    </section>
		</footer>
       
	   </body>

   </html>
