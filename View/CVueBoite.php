<?php
class CVueBoite extends AVueModele
{
	
	public function afficherBoites()
	{
		echo "<ul class=\"boites\">\n";
		foreach($this->modele->boites as $boite)
		{
			$l = explode($boite->delimiter,utf7_to_utf8($boite->name));

			$description = htmlspecialchars(implode(' : ',array_slice($l,1)));
			
			if ($description === '')
			{
				$description = "Groaw";
			}

			$lien = rawurlencode(preg_replace('/^\{.+?\}/','',$boite->name));

			echo "\t<li>\n\t<h3>$description</h3>\n\t<a href=\"Courriels.php?EX=liste&amp;boite=$lien\"><p>",
				'Vous avez <strong>', $boite->nb_non_vus,'</strong> messages à lire :D',
				"</p></a>\n</li>\n";
		}
		echo "</ul>";
	}
	
	public function afficherBoitesAcceuil()
	{
		echo "<ul class=\"boites\">\n";
		foreach($this->modele->boites as $boite => $infos)
		{
			$action = ($boite === 'livraison') ? 'afficher' : 'liste';
			
			echo "\t<li class=\"$boite\">\n\t\t<h3>$infos->titre</h3>\n\t\t<a href=\"Courriels.php?EX=$action&boite=",
				 rawurlencode($infos->nom),"\"><p>",
				'Vous avez <strong>', $infos->messages,'</strong> messages à trier :D',
				"</p></a>\n\t</li>\n";
		}
		echo "\t<li class=\"archives\">\n\t\t<h3>Archives</h3>\n\t\t<a href=\"?EX=boites\"><p>Accédez aux courriels classifiés</p></a>\n\t</li>\n</ul>";
	}

	public function afficherBoitesSuppression()
	{

		echo "<select name=\"supprimer_boites[]\" multiple>\n";
		foreach(array_reverse($this->modele->boites) as $boite)
		{
			$l = explode($boite->delimiter,utf7_to_utf8($boite->name));

			$description = htmlspecialchars(implode(' : ',array_slice($l,1)));
			
			if ($description === '')
			{
				$description = "Groaw";
			}

			$lien = rawurlencode(preg_replace('/^\{.+?\}/','',$boite->name));

			echo "\t<option value=\"$lien\">$description (",$boite->nb_messages," messages)</option>\n";
		}
		echo "</select>";
	}

	public function afficherBoitesDeplacement()
	{
		echo "<ul class=\"boites_deplacement\">\n";

		foreach($this->modele->boites as $boite)
		{
			$l = explode($boite->delimiter,utf7_to_utf8($boite->name));

			$t = array('RSS', 'Trash','Interesting','Normal','Unexciting');
			if (isset($l[1]) && in_array($l[1], $t))
			{
				continue;
			}

			$description = htmlspecialchars(implode(' : ',array_slice($l,1)));
			
			if ($description === '')
			{
				$description = "Groaw";
			}

			$lien = rawurlencode(preg_replace('/^\{.+?\}/','',$boite->name));

			echo "\t<li><a href=\"Courriels.php?EX=deplacer&amp;destination=$lien\">$description</a></li>\n";
		}
		echo "</ul></div>";
	}
}
?>
