<?php
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////
//// CowsayPHP est basé sur le programme Cowsay, développé par Tony Monroe
//// http://www.nog.net/~tony/warez/cowsay.shtml
////
//// Je me suis servi des sources perl pour créer le code PHP.
//// Pour toute info : <old_email_adress>
//// ~~<old nick>~~
////
////------------------------------------------------------------------------------------------------
//// 
//// CowsayPHP is based on the Tony Monroe's sowtfare Cowsay.
//// http://www.nog.net/~tony/warez/cowsay.shtml
////  
//// I just used the Perl sources to write the PHP code.
//// For any information : <old_email_adress>
//// ~~<old nick>~~
////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
//// 
//// VOUS DEVEZ INCLURE CE FICHIER DANS LES PAGES UTILISANT COWSAY
////------------------------------------------------------------------------------------------------
//// YOU MUST INCLUDE THIS FILE IN PAGES WHO USE COWSAY
////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////

function cowsay($string, $cowsDir, $thoughts_style='default', $eyes_style='default', $cowFile='default.php' )
{
	//
	// Définition des éléments de la vache
	// Cow elements definition
	//
	
	// style de bulle
	// ballon style
	switch ($thoughts_style)
	{
		case "default":
			$thoughts= "\\"; $borderL="| ";$borderR=" |\n";
		break;
		case "think":
			$thoughts= "o"; $borderL="( ";$borderR=" )\n";
		break;
		default:
			$thoughts= "\\"; $borderL="| ";$borderR=" |\n";
	}
	
	// style des yeux et de la langue
	// eyes and tongue style
	switch ($eyes_style)
	{
		case 'default':
			$eyes='oo'; $tongue='  ';
		break;
		case 'borg':
			$eyes='=='; $tongue='  ';
		break;
		case 'dead':
			$eyes='xx'; $tongue='U ';
		break;
		case 'greedy':
			$eyes='\$\$'; $tongue='  ';
		break;
		case 'paranoid':
			$eyes='@@'; $tongue='  ';
		break;
		case 'stoned':
			$eyes='**'; $tongue='U ';
		break;
		case 'tired':
			$eyes='--'; $tongue='  ';
		break;
		case 'wired':
			$eyes='OO'; $tongue='  ';
		break;
		case 'young':
			$eyes='..'; $tongue='  ';
		break;
		default:
			$eyes='oo'; $tongue='  ';
	}
	
	//
	// Couper la chaine à tous les sauts de ligne
	//
	// Cut the string at each linebreak
	//
	$ii=explode("\n",(stripslashes($string)));
	// Déterminer la longueur de la chaine la plus grande
	// To know the longuer string lenght
	$maxLen=0;
	foreach($ii as $tmp)
	{
		if ($maxLen<strlen($tmp)){$maxLen=strlen($tmp);}
	}
	
	//
	// Création du haut et du bas de la bulle
	//
	// Creating the top and bottom, for the baloon
	//
	$SborderL="/";				// Haut gauche
	$SborderR="\\\n";			// Haut droite
	$EborderL="\\";				// Bas gauche
	$EborderR="/";				// Bas droite
	$fill="";
	$i=($maxLen)+2;
	while($i>0){$i--;$fill.="-";}
	$hautBulle=$SborderL.$fill.$SborderR;
	$basBulle=$EborderL.$fill.$EborderR;
	
	
	//
	// Création du contenu de la bulle, avec les bords
	//
	// Creating ballon content, with borders
	//
	$texte="";
	foreach($ii as $tmp)
	{
		// Suppression des sauts de ligne
		// Deleting linebreaks
		$tmp=preg_replace("@([\r\n])+@","",$tmp);
		$i=$maxLen-(strlen($tmp));
		$tmp2=$tmp;
		// remplissage des lignes avec des espaces
		// Filling lines with spaces
		while($i>0){$i--;$tmp2.=" ";}
		// création de la ligne
		// Line creation
		$texte .= $borderL.htmlentities(stripslashes($tmp2)).$borderR;
	}
	// Définition de la bulle
	// complete ballon creation
	$Bulle=$hautBulle.$texte.$basBulle;
	include('cows/'.$cowFile);
	// Définition finale de la vache avec les balises <pre>
	// Final string return, with <pre> element
	return ("<pre style='border:1px groove #CCC; background-color:#AAA;'><br>$Bulle".$the_cow."<br><br></pre>");
}


//
// Affiche le formulaire pour afficher le texte
// $target correspond àla page qui devra traiter les infos du formulaire.
// $cowDir correspond au répertoire dans lequel sont stockés les fichiers de vaches.(ex : php/cowsays/cows/)
//
// Shows the form to print the text
// $target is the target file of the form
// $cowDir is the directory in which the cow files are stored. (ex : php/cowsays/cows/)
//
function cowForm($target, $cowsDir)
{
	$form="<form action='$target' method='POST' name='CowForm'><center>
			Message &agrave; afficher :<br>
			<textarea name='text' cols='35' rows='5'></textarea><br>
			[OPTIONS : <select name='though_style'>
										<option value='default'>Je dis...</option>
										<option value='think'>Je pense...</option>
								</select> | <select name='eyes'>
										<option value='default'>D&eacute;faut</option>
										<option value='borg'>Borg (?)</option>
										<option value='dead'>Morte</option>
										<option value='greedy'>Avare</option>
										<option value='paranoid'>Parano</option>
										<option value='stoned'>D&eacute;fonc&eacute;e</option>
										<option value='tired'>Fatigu&eacute;e</option>
										<option value='wired'>Abus&eacute;e</option>
										<option value='young'>Jeune</option>
								</select> | <select name='cowFile'>";
	// récupération de la liste de fichiers :
	$dh=opendir($cowsDir);
	while ($file = readdir($dh))
	{
		if (ereg(".*\.php$", $file))
		{
			//echo "$file'>".preg_replace("@\.php$@", '', $file)."</option>";
			$files[preg_replace("@\.php$@", '', $file)]=$file;
		}
	}
	closedir($dh);
	ksort($files);
	foreach ($files as $key=>$tmp)
	{
		$form.= "<option value='$tmp'";
		if ($key=='default'){$form.="selected='selected'";}
		$form.= ">$key</option>";
	}
	//global $page;
	$form.= "</select><input type='submit' value='test' name='CowMustSpeak'> ]</center></form>";
	return $form;
}
?>
