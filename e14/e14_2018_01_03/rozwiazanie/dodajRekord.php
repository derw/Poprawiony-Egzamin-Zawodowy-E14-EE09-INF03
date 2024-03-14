<?php
if (
	!(empty($_POST['kategoria'])
		|| empty($_POST['podkategoria'])
		|| empty($_POST['tytul'])
		|| empty($_POST['tresc'])
	)
) {
	$id_polaczenia = mysqli_connect('localhost', 'root', '', 'ogloszenia');
	$kategoria = $_POST['kategoria'];
	$podkategoria = $_POST['podkategoria'];
	$tytul = $_POST['tytul'];
	$tresc = $_POST['tresc'];
	$insert = <<<KONIEC
	INSERT INTO `ogloszenie`(
		`id`,
		`uzytkownik_id`,
		`kategoria`,
		`podkategoria`,
		`tytul`,
		`tresc`
	)
	VALUES(
		NULL,
		1,
		$kategoria,
		$podkategoria,
		'$tytul',
		'$tresc'
	)
	KONIEC;
	mysqli_query($id_polaczenia, $insert);
	mysqli_close($id_polaczenia);
}
