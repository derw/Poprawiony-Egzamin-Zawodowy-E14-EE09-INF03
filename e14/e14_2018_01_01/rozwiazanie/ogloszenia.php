<!DOCTYPE html>
<html>
<head>
	<meta charset="ITF-8" >
	<title>Portal ogłoszeniowy</title>
	<link rel="stylesheet" href="styl1.css" >
</head>
<body>
	<div id="baner">
		<h1>Portal Ogłoszeniowy</h1>
	</div>
	<div id="lewy">
		<h2>Kategorie ogłoszeń</h2>
		<ol>
			<li>Książki</li>
			<li>Muzyka</li>
			<li>Filmy</li>
		</ol>
		<img src="ksiazki.jpg" alt="Kupię / sprzedam książkę" >
		<table>
			<tr>
				<td>Liczba ogłoszeń</td>
				<td>Cena ogłoszenia</td>
				<td>Bonus</td>
			</tr>
			<tr>
				<td>1 - 10</td>
				<td>1 PLN</td>
				<td rowspan="3">Subskrypcja newstellera to upust 0,20 PLN na ogłoszenie</td>
			</tr>
			<tr>
				<td>11 - 50</td>
				<td>0,80 PLN</td>
			</tr>
			<tr>
				<td>51 i więcej</td>
				<td>0,60 PLN</td>
			</tr>
		</table>
	</div>
	<div id="prawy">
		<h2>Ogłoszenia kategorii książka</h2>
		<?php
		$id_polaczenia = mysqli_connect('localhost', 'root', '', 'ogloszenia');
		$zapytanie = <<<KONIEC
		SELECT
			id,
			tytul,
			tresc
		FROM
			ogloszenie
		WHERE
			kategoria=1
		KONIEC;
		$wynik = mysqli_query($id_polaczenia, $zapytanie);
		while($row = mysqli_fetch_array($wynik)) {
			$id_ogloszenia = $row['id'];
			$tytul = $row['tytul'];
			$tresc = $row['tresc'];
			$zapytanie = <<<KONIEC
			SELECT
				u.telefon
			FROM
				ogloszenie AS o
			JOIN
				uzytkownik AS u
			ON
				o.uzytkownik_id = u.id
			WHERE
				o.id = $id_ogloszenia;
			KONIEC;

			$wynik2 = mysqli_query($id_polaczenia, $zapytanie);
			$row = mysqli_fetch_array($wynik2);
			$telefon = $row['telefon'];
			echo <<<KONIEC
			<h3>$id_ogloszenia $tytul</h3>
			<p>$tresc</p>
			<p>telefon kontaktowy: $telefon</p>
			KONIEC;
		}
		mysqli_close($id_polaczenia);
		?>
	</div>
	<div id="stopka">
		Portal ogłoszeniowy opracował: PESEL
	</div>
</body>
</html>