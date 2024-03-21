<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Dane o zwierzętach</title>
	<link rel="stylesheet" href="styl3.css">
</head>
<body>
	<div id="baner">
		<h1>ATLAS ZWIERZĄT</h1>
	</div>
	<div id="formularz">
		<h2>Gromady:</h2>
		<ol>
			<li>Ryby</li>
			<li>Płazy</li>
			<li>Gady</li>
			<li>Ptaki</li>
			<li>Ssaki</li>
		</ol>
		<form action="index.php" method="post">
			<label>
				Wybierz gromadę:
				<input type="number" name="nr">
			</label>
			<button type="submit">Wyświetl</button>
		</form>
	</div>
	<div id="lewy">
		<img src="zwierzeta.jpg" alt="dzikie zwierzeta">
	</div>
	<div id="srodkowy">
		<?php
		$id_polaczenia = mysqli_connect('localhost', 'root', '', 'baza');
		if(!empty($_POST['nr'])) {
			$nr = $_POST['nr'];
			if ($nr == 1) echo "<h2>RYBY</h2>";
			if ($nr == 2) echo "<h2>PŁAZY</h2>";
			if ($nr == 3) echo "<h2>GADY</h2>";
			if ($nr == 4) echo "<h2>PTAKI</h2>";
			if ($nr == 5) echo "<h2>SSAKI</h2>";
			$zapytanie = <<<KONIEC
			SELECT
				gatunek,
				wystepowanie
			FROM
				zwierzeta
			WHERE
				Gromady_id = $nr;
			KONIEC;
			$wynik = mysqli_query($id_polaczenia, $zapytanie);
			while($row = mysqli_fetch_array($wynik)) {
				echo "$row[gatunek], $row[wystepowanie]<br>";
			}
		}
		?>
	</div>
	<div id="prawy">
		<h2>Wszystkie zwierzęta w bazie</h2>
		<?php
			$zapytanie = <<<KONIEC
			SELECT
				zwierzeta.id,
				zwierzeta.gatunek,
				gromady.nazwa
			FROM
				zwierzeta
			JOIN
				gromady
			ON zwierzeta.Gromady_id = gromady.id
			KONIEC;
			$wynik = mysqli_query($id_polaczenia, $zapytanie);
			while($row = mysqli_fetch_array($wynik)) {
				$id = $row['id'];
				$gatunek = $row['gatunek'];
				$nazwa = $row['nazwa'];
				echo "$id. $gatunek, $nazwa<br>";
			}
		?>
	</div>
	<div id="stopka">
		<a href="http://altas-zwierzat.pl" target="_blank">Poznaj inne strony o zwierzętach</a>
		autor Atlasu zwierząt: PESEL
	</div>
</body>
</html>