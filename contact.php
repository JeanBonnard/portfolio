<?php
/*
	********************************************************************************************
	CONFIGURATION
	********************************************************************************************
*/
// destinataire est votre adresse mail. Pour envoyer à plusieurs à la fois, séparez-les par une virgule
$destinataire = 'j.bonnard42@gmail.com';

// copie ? (envoie une copie au visiteur)
$copie = 'non';

// Action du formulaire (si votre page a des paramètres dans l'URL)
// si cette page est index.php?page=contact alors mettez index.php?page=contact
// sinon, laissez vide
$form_action = 'index.php?page=contact';

// Messages de confirmation du mail
$message_envoye = "Votre message nous est bien parvenu !";
$message_non_envoye = "L'envoi du mail a échoué, veuillez réessayer SVP.";

// Message d'erreur du formulaire
$message_formulaire_invalide = "Vérifiez que tous les champs soient bien remplis et que l'email soit sans erreur.";

/*
	********************************************************************************************
	FIN DE LA CONFIGURATION
	********************************************************************************************
*/

/*
 * cette fonction sert à nettoyer et enregistrer un texte
 */
function Rec($text)
{
	$text = htmlspecialchars(trim($text), ENT_QUOTES);
	if (1 === get_magic_quotes_gpc())
	{
		$text = stripslashes($text);
	}

	$text = nl2br($text);
	return $text;
};

/*
 * Cette fonction sert à vérifier la syntaxe d'un email
 */
function IsEmail($email)
{
	$value = preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $email);
	return (($value === 0) || ($value === false)) ? false : true;
}

// formulaire envoyé, on récupère tous les champs.
$nom     = (isset($_POST['nom']))     ? Rec($_POST['nom'])     : '';
$prenom  = (isset($_POST['prenom']))  ? Rec($_POST['prenom'])  : '';
$email   = (isset($_POST['email']))   ? Rec($_POST['email'])   : '';
$objet   = (isset($_POST['objet']))   ? Rec($_POST['objet'])   : '';
$message = (isset($_POST['message'])) ? Rec($_POST['message']) : '';

// On va vérifier les variables et l'email ...
$email = (IsEmail($email)) ? $email : ''; // soit l'email est vide si erroné, soit il vaut l'email entré
$err_formulaire = false; // sert pour remplir le formulaire en cas d'erreur si besoin

if (isset($_POST['envoi']))
{
	if (($nom != '') && ($email != '') && ($objet != '') && ($message != '')&& ($prenom != ''))
	{
		// les 4 variables sont remplies, on génère puis envoie le mail

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'From:'.$_POST['nom'].' <'.$_POST['email'].'>' . "\r\n" .
            'Reply-To:'.$email. "\r\n" .
            'Content-Type: text/plain; charset="utf-8"; DelSp="Yes"; format=flowed '."\r\n" .
            'Content-Disposition: inline'. "\r\n" .
            'Content-Transfer-Encoding: 7bit'." \r\n" .
            'X-Mailer:PHP/'.phpversion();

		// envoyer une copie au visiteur ?
		if ($copie == 'oui')
		{
			$cible = $destinataire.';'.$email;
		}
		else
		{
			$cible = $destinataire;
		};

		// Remplacement de certains caractères spéciaux
		$message = str_replace("&#039;","'",$message);
		$message = str_replace("&#8217;","'",$message);
		$message = str_replace("&quot;",'"',$message);
		$message = str_replace('&lt;br&gt;','',$message);
		$message = str_replace('&lt;br /&gt;','',$message);
		$message = str_replace("&lt;","&lt;",$message);
		$message = str_replace("&gt;","&gt;",$message);
		$message = str_replace("&amp;","&",$message);

		// Envoi du mail
		$num_emails = 0;
		$tmp = explode(';', $cible);

		foreach($tmp as $email_destinataire)

		{
			if (mail($email_destinataire, $objet, $message, $headers))
				$num_emails++;

		}

		if ((($copie == 'oui') && ($num_emails == 2)) || (($copie == 'non') && ($num_emails == 1)))
		{

			/*echo '<p>'.$message_envoye.'</p>';*/

            header('Location: http://jb-mon-site.projets.simplon-roanne.com/index.php?page=contact&mail=message_envoyé');

		}
		else
		{
			echo '<p>'.$message_non_envoye.'</p>';
		};
	}
	else
	{
		// une des 3 variables (ou plus) est vide ...
		echo '<p>'.$message_formulaire_invalide.'</p>';
		$err_formulaire = true;
	};
}; // fin du if (!isset($_POST['envoi']))

if (isset($_GET['mail']) && !empty($_GET['mail'])){
    echo '<h2 style="background-color: green; margin-top: 10rem">votre message nous est bien parvenu</h2>';
}

if (($err_formulaire) || (!isset($_POST['envoi'])))
{
	?>
	<div class="flex">
<form method="post" class="ui form" action="<?=$form_action?>">
  <h4 class="ui dividing header formcontact">Formulaire de contact</h4>
  <div class="field">
    <label>Nom</label>
    <div class="two fields">
      <div class="field">
        <input type="text" name="prenom" placeholder="Prénom">
      </div>
      <div class="field">
        <input type="text" name="nom" placeholder="Nom">
      </div>
    </div>
  </div>
	<label>E-mail</label>
	<div class="one field">
		<div class="field">
			<input type="email" placeholder="joe@schmoe.com", name="email">
		</div>
	</div>
    <label>Objet</label>
    <div class="one field">
        <div class="field">
            <input type="text" name="objet">
        </div>
    </div>
	<label>Text</label>
	<div class="one field">
		<div class="field">
			<textarea name="message"></textarea>
		</div>
	</div>
  <button class="ui button" type="submit" tabindex="0" name="envoi">Envoyer</button>
</form>
	</div>
<?php
}
?>
