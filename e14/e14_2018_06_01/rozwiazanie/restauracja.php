<?php
if (!empty($_POST['data']) && !empty($_POST['osob']) && !empty($_POST['telefon'])) {
	$id_polaczenia = mysqli_connect('localhost', 'root', '', 'baza');
	$data = $_POST['data'];
	$osob = $_POST['osob'];
	$telefon = $_POST['telefon'];
	$insert = <<<KONIEC
	INSERT INTO rezerwacje(
			id,
			data_rez,
			liczba_osob,
			telefon
		)
		VALUES(NULL, '$data', $osob, '$telefon');
	KONIEC;
	mysqli_query($id_polaczenia, $insert);
	echo "Dodano rezerwacje do bazy";
	mysqli_close($id_polaczenia);
}
