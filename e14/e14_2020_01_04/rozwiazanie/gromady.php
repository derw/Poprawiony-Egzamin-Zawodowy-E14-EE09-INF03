<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Gromady kręgowców</title>
	<link rel="stylesheet" href="style12.css">
</head>
<body>
	<div id="menu">
		<a href="gromada-ryby.html">gromada ryb</a>
		<a href="gromada-ptaki.html">gromada ptaków</a>
		<a href="gromada-ssaki.html">gromada ssaków</a>
	</div>
	<div id="logo">
		<h2>GROMADY KRĘGOWCÓW</h2>
	</div>
	<div id="lewy">
		<?php
		$id_polaczenia = mysqli_connect('localhost', 'root', '', 'baza');
		$zapytanie = <<<KONIEC
		SELECT
			`id`,
			`Gromady_id`,
			`gatunek`,
			`wystepowanie`
		FROM
			`zwierzeta`
		WHERE
			Gromady_id IN(4, 5);
		KONIEC;
		$wynik = mysqli_query($id_polaczenia, $zapytanie);
		while($row = mysqli_fetch_array($wynik)) {
			$id = $row['id'];
			$gromady_id = $row['Gromady_id'];
			$gatuenk = $row['gatunek'];
			$wystepowanie = $row['wystepowanie'];
			if($gromady_id == 4) {
				echo <<<KONIEC
				<p>$id. $gatuenk</p>
				<p>Występowanie: $wystepowanie, gromada ptaki</p>
				<hr>
				KONIEC;
			}
			if($gromady_id == 5) {
				echo <<<KONIEC
				<p>$id. $gatuenk</p>
				<p>Występowanie: $wystepowanie, gromada ssaki</p>
				<hr>
				KONIEC;
			}
		}
		?>
	</div>
	<div id="prawy">
		<h1>PTAKI</h1>
		<ol>
		<?php
		$zapytanie = <<<KONIEC
		SELECT
			`gatunek`,
			`obraz`
		FROM
			`zwierzeta`
		WHERE
			`Gromady_id` = 4
		KONIEC;
		$wynik = mysqli_query($id_polaczenia, $zapytanie);
		while($row = mysqli_fetch_array($wynik)) {
			$gatunek = $row['gatunek'];
			$obraz = $row['obraz'];
			echo <<<KONIEC
			<li><a href='$obraz'>$gatunek</a></li>
			KONIEC;
		}
		mysqli_close($id_polaczenia);
		?>
		</ol>
		<img src="sroka.jpg" alt="Sroka zwyczajna, gromada ptaki">
	</div>
	<div id="stopka">
		Stronę o kręgowcach przygotował: PESEL
	</div>
</body>
</html>