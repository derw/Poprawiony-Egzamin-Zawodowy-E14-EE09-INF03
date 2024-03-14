<?php
if(!empty($_POST['imie']) && !empty($_POST['nazwisko']) && !empty($_POST['telefon']) && !empty($_POST['email'])) {
	$id_polaczenia = mysqli_connect('localhost', 'root', '', 'ogloszenia');
	$imie = $_POST['imie'];
	$nazwisko = $_POST['nazwisko'];
	$telefon = $_POST['telefon'];
	$email = $_POST['email'];
	$insert = <<<KONIEC
	INSERT INTO `uzytkownik`(
		`id`,
		`imie`,
		`nazwisko`,
		`telefon`,
		`email`
	)
	VALUES
	(NULL, '$imie', '$nazwisko', '$telefon', '$email');
	KONIEC;
	mysqli_query($id_polaczenia, $insert);
	mysqli_close($id_polaczenia);
}
?>