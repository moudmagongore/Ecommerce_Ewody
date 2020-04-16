<?php 

/*Pour pouvoir utiliser cette function partout dans notre application on vas devoir dire a laravel et pour cela c'est dans le fichier composer.json*/

	function getprixminimumhelpers($prixEnDecimal)
	{
		//floatVal Pour convertir une chaine de caractère en float
		// car la function number_format n'accepte que les float ou entier chaine de caractere non 
		$prix = floatVal($prixEnDecimal) / 1000;

		return number_format($prix, 3, ' ', ' '). ' GNF';
	}

 ?>