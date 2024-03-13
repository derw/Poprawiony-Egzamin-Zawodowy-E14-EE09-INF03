<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8" >
	<title>Ogłoszenia drobne</title>
	<link rel="stylesheet" href="styl2.css" >
</head>
<body>
	<div id="baner">
		<h1>Ogłoszenia drobne</h1>
	</div>
	<div id="lewy">
		<h2>Ogłoszeniodawcy</h2>
		<?php
		$id_polaczenia = mysqli_connect('localhost', 'root', '', 'ogloszenia');
		$zapytanie =<<<KONIEC
		SELECT
			id,
			imie,
			nazwisko,
			email
		FROM
			uzytkownik
		WHERE
			id < 4;
		KONIEC;
		$wynik = mysqli_query($id_polaczenia, $zapytanie);
		while($row = mysqli_fetch_array($wynik)) {
			$id = $row['id'];
			$imie = $row['imie'];
			$nazwisko = $row['nazwisko'];
			$email = $row['email'];
			$zapytanie = <<<KONIEC
			SELECT tytul FROM ogloszenie WHERE id = $id LIMIT 1;
			KONIEC;
			$wynik1 = mysqli_query($id_polaczenia, $zapytanie);
			$row = mysqli_fetch_array($wynik1);
			$tytul = $row['tytul'];
			echo <<<KONIEC
			<h3>$id $imie $nazwisko</h3>
			<p>$email</p>
			<p>Ogłoszenie: $tytul</p>
			KONIEC;
		}
		mysqli_close($id_polaczenia);
		?>
	</div>
	<div id="prawy">
		<h2>Nasze kategorie</h2>
		<ul>
			<li>Książki</li>
			<li>Muzyka</li>
			<li>Multimedia</li>
		</ul>
		<img src="ksiazki.jpg" alt="uwolnij swoją książkę" >
		<table>
			<tr>
				<td>Ile?</td>
				<td>Koszt</td>
				<td>Promocja</td>
			</tr>
			<tr>
				<td>1 - 40</td>
				<td>1,20 PLN</td>
				<td rowspan="2">Subskrybuj newsteller upust 0,30 PLN na ogłoszenie</td>
			</tr>
			<tr>
				<td>41 i więcej</td>
				<td>0,70 PLN</td>
			</tr>
		</table>
	</div>
	<div id="stopka">
		Portal ogłoszenia drobne opracował: PESEL
	</div>
</body>
</html>
