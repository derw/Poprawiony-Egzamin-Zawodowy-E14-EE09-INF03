<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" >
	<title>Restauracja Kulinaria.pl</title>
	<link rel="stylesheet" href="styl4.css" >
</head>
<body>
	<div id="baner">
		<h2>Restauracja Kulinaria.pl Zaprasza!</h2>
	</div>
	<div id="lewy">
		<?php
		$id_polaczenia = mysqli_connect('localhost', 'root', '', 'baza');
		$zapytanie = <<<KONIEC
		SELECT MIN(cena) AS min FROM dania WHERE typ = 2
		KONIEC;
		$wynik = mysqli_query($id_polaczenia, $zapytanie);
		$row = mysqli_fetch_array($wynik);
		echo <<<KONIEC
		<p>Dania mięsne zamówiesz już od $row[min] złotych</p>
		KONIEC;
		?>
		 <img src="menu.jpg" alt="Pyszne spaghetti" >
		 <br>
		 <a href="menu.jpg">Pobierz obraz</a>
	</div>
	<div id="srodkowy">
		<h3>Przekąski</h3>
		<?php
		$zapytanie = <<<KONIEC
		SELECT
			id,
			nazwa,
			cena
		FROM
			dania
		WHERE
			typ = 3
		KONIEC;
		$res2 = mysqli_query($id_polaczenia, $zapytanie);
		while($row = mysqli_fetch_array($res2)) {
			$id = $row['id'];
			$nazwa = $row['nazwa'];
			$cena = $row['cena'];

			echo "<p>$id $nazwa $cena</p>";
		}
		?>
	</div>
	<div id="prawy">
		<h3>Napoje</h3>
		<?php
		$zapytanie = <<<KONIEC
		SELECT
			id,
			nazwa,
			cena
		FROM
			dania
		WHERE
			typ = 4
		KONIEC;
		$wynik = mysqli_query($id_polaczenia, $zapytanie);
		while($row = mysqli_fetch_array($wynik)) {
			$id = $row['id'];
			$nazwa = $row['nazwa'];
			$cena = $row['cena'];

			echo "<p>$id $nazwa $cena</p>";
		}
		mysqli_close($id_polaczenia);
		?>
	</div>
	<div id="stopka">
		Stronę internetową opracował: <i>PESEL</i>
	</div>
</body>
</html>