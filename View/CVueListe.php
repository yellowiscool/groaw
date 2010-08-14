<?php
class CVueListe extends AVueModele
{
	
	public function afficherMessages()
	{
		echo "<table>\n";	

		foreach ($this->modele->messages as $message)
		{
			echo "\t<tr><td>",
				$message->msgno,
				"</td><td>",
				htmlspecialchars($this->mime_to_utf8($message->subject)),
				"</td><td>",
				htmlspecialchars($this->mime_to_utf8($message->from)),
				"</td><td>",
				htmlspecialchars($message->date),
				"</td></tr>\n";
		}

		echo "</table>";
	}

	public function afficherBoites()
	{
		require_once '../Inc/utf7.php';
		echo "<ul>\n";
		foreach($this->modele->boites as $boite)
		{
			//var_dump($boite->delimiter);
			$l = explode($boite->delimiter,utf7_to_utf8($boite->name));

			$op = implode(':',array_slice($l,1));

			echo "\t<li>",
				 htmlspecialchars($op),
				"</li>\n";
		}
		echo "</ul>";
	}
}
?>
