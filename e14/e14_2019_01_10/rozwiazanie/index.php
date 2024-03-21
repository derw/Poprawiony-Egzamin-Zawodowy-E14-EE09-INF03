<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Odżywianie zwierząt</title>
	<link rel="stylesheet" href="styl4.css">
</head>
<body>
	<div id="baner">
		<h2>DRAPIEŻNIKI I INNE</h2>
	</div>
	<div id="formularz">
		<h3>Wybierz styl życia:</h2>
		<form action="index.php" method="post">
			<select name="lista">
				<option value="1">Drapieżniki</option>
				<option value="2">Roślinożerne</option>
				<option value="3">Padlinożerne</option>
				<option value="4">Wszystkożerne</option>
			</select>
			<button type="submit">Zobacz</button>
		</form>
	</div>
	<div id="lewy">
		<h3>Lista zwierząt</h3>
		<ul>
		<?php
		$id_polaczenia = mysqli_connect('localhost', 'root', '', 'baza');
		$zapytanie = <<<KONIEC
		SELECT
			zwierzeta.gatunek,
			odzywianie.rodzaj
		FROM
			zwierzeta
		JOIN
			odzywianie
		ON
			zwierzeta.Odzywianie_id=odzywianie.id;
		KONIEC;
		$wynik = mysqli_query($id_polaczenia, $zapytanie);
		while($row = mysqli_fetch_array($wynik)) {
			$gatunek = $row['gatunek'];
			$odzywianie = $row['rodzaj'];
			echo "<li>$gatunek -> $odzywianie</li>";
		}
		?>
		</ul>
	</div>
	<div id="srodkowy">
		<?php
		if(!empty($_POST['lista'])) {
			$nr = $_POST['lista'];
			if ($nr == 1) echo "<h3>Drapieżniki</h3>";
			if ($nr == 2) echo "<h3>Roślinożerne</h3>";
			if ($nr == 3) echo "<h3>Padlinożerne</h3>";
			if ($nr == 4) echo "<h3>Wszystkożerne</h3>";
			$zapytanie = <<<KONIEC
			SELECT
				`id`,
				`gatunek`,
				`wystepowanie`
			FROM
				`zwierzeta`
			WHERE
				`Odzywianie_id` = $nr;
			KONIEC;
			$wynik = mysqli_query($id_polaczenia, $zapytanie);
			while($row = mysqli_fetch_array($wynik)) {
				$id = $row['id'];
				$gatunek = $row['gatunek'];
				$wystepowanie = $row['wystepowanie'];
				echo "$id. $gatunek, $wystepowanie<br>";
			}
		}
		mysqli_close($id_polaczenia);
		?>
	</div>
	<div id="prawy">
		<img src="drapieznik.jpg" alt="Wilki">
	</div>
	<div id="stopka">
		<a href="http://pl.wikipedia.org" target="_blank">Poczytaj o zwierzętach na WIkipedii</a>,
		autor strony: PESEL
	</div>
</body>
</html>