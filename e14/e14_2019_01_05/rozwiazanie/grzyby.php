<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Grzybobranie</title>
	<link rel="stylesheet" href="styl5.css">
</head>

<body>
	<div id="miniatura">
		<a href="borowik.jpg"><img src="borowik-miniatura.jpg" alt="Grzybobranie"></a>
	</div>
	<div id="tytulowy">
		<h1>Idziemy na grzyby</h1>
	</div>
	<div id="lewy">
		<?php
		$id_polaczenia = mysqli_connect('localhost', 'root', '', 'dane2');
		$zapytanie = <<<KONIEC
		SELECT
			`potoczna`,
			`nazwa_pliku`
		FROM
			`grzyby`
		KONIEC;
		$wynik = mysqli_query($id_polaczenia, $zapytanie);
		while ($row = mysqli_fetch_array($wynik)) {
			$potoczna = $row['potoczna'];
			$obrazek = $row['nazwa_pliku'];
			echo <<<KONIEC
			<img src='$obrazek' title='$potoczna'>
			KONIEC;
		}
		?>
	</div>
	<div id="prawy">
		<h2>Grzyby jadalne</h2>
		<?php
		$zapytanie = <<<KONIEC
		SELECT
			nazwa,
			potoczna
		FROM
			grzyby
		WHERE
			jadalny = 1;
		KONIEC;
		$wynik = mysqli_query($id_polaczenia, $zapytanie);
		while ($row = mysqli_fetch_array($wynik)) {
			$nazwa = $row['nazwa'];
			$potoczna = $row['potoczna'];
			echo <<<KONIEC
			<p>$nazwa ($potoczna)</p>
			KONIEC;
		}
		?>
		<h2>Polecamy do sosów</h2>
		<?php
		$zapytanie = <<<KONIEC
		SELECT
			grzyby.nazwa,
			`potoczna`,
			rodzina.nazwa
		FROM
			`grzyby`
			JOIN
			rodzina
			ON grzyby.rodzina_id=rodzina.id
		WHERE
			grzyby.potrawy_id = 1
		KONIEC;
		$wynik = mysqli_query($id_polaczenia, $zapytanie);
		echo "<ol>";
		while ($row = mysqli_fetch_array($wynik)) {
			$nazwa = $row['nazwa'];
			$potoczna = $row['potoczna'];
			$rodzina = $row['nazwa'];
			echo <<<KONIEC
			<li>$nazwa ($potoczna), rodzina: $rodzina</li>
			KONIEC;
		}
		echo "</ol>";
		mysqli_close($id_polaczenia);
		?>
	</div>
	<div id="stopka">
		<p>Autor: PESEL</p>
	</div>
</body>

</html>