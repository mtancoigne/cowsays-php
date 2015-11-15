<?php
include('inc.cowsay.php');
if (isset($_POST['CowMustSpeak'])){
	echo '<div style="font-size:8pt;">';
	echo cowsay($_POST['text'], 'ptits_projets/cowsays/cows/', $_POST['though_style'], $_POST['eyes'], $_POST['cowFile']);
	echo '</div><hr>';
}
echo cowform('test.php', 'cows/');
?>
