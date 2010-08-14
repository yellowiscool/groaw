<?php
class CImap
{
	protected static $jeton_imap;

	public static function authentification($mail,$mdp)
	{
		self::$jeton_imap = imap_open(SERVEUR_IMAP.'INBOX', $mail, $mdp);
	}

	public static function __callStatic ($nom, $arguments)
	{
		$fonction = 'imap_'.$nom;
		
		if (function_exists($fonction))
		{
			//$fonction(self::$jeton_imap,$arguments);
			return call_user_func_array($fonction,
					array_merge(
						(array) self::$jeton_imap,
						$arguments));
		}
		else
		{
			throw new CException("Fonction imap n'existant pas");
		}
	}
}
?>
