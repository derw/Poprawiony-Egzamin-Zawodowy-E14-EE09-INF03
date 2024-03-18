<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Filmoteka</title>
	<link rel="stylesheet" href="styl3.css">
</head>

<body>
	<div id="pierwszy">
		<img src="klaps.png" alt="Nasze filmy">
	</div>
	<div id="drugi">
		<h1>BAZA FILMÓW</h1>
	</div>
	<div id="trzeci">
		<form action="index.php" method="post">
			<select name="wybor">
				<option value="1">Sci-Fi</option>
				<option value="2">animacja</option>
				<option value="3">dramat</option>
				<option value="4">horror</option>
				<option value="5">komedia</option>
			</select>
			<button type="submit">Filmy</button>
		</form>
	</div>
	<div id="czwarty">
		<img src="gwiezdneWojny.jpg" alt="szturmowcy">
	</div>
	<div id="glowny1">
		<h2>Wybrano filmy:</h2>
		<?php
		$id_polaczenia = mysqli_connect('localhost', 'root', '', 'dane');
		if (isset($_POST['wybor'])) {
			$wybor = $_POST['wybor'];
			$zapytanie = <<<KONIEC
			SELECT
				`tytul`,
				`rok`,
				`ocena`
			FROM
				`filmy`
			WHERE
				`gatunki_id` = $wybor
			KONIEC;
			$wynik = mysqli_query($id_polaczenia, $zapytanie);
			while ($row = mysqli_fetch_array($wynik)) {
				$tytul = $row['tytul'];
				$rok = $row['rok'];
				$ocena = $row['ocena'];
				echo <<<KONIEC
				<p>Tytuł: $tytul, Rok produkcji: $rok, Ocena: $ocena</p>
				KONIEC;
			}
		}
		?>
	</div>
	<div id="glowny2">
		<h2>Wybrano filmy:</h2>
		<?php
		$zapytanie = <<<KONIEC
		/var/www/html/egzamin/Poprawiony-Egzamin-Zawodowy-E14-EE09-INF03/e14/e14_2019_01_03/rozwiazanie/index.php		SELECT
			f.id,
			f.tytul,
			r.imie,
			r.nazwisko
		FROM
			filmy AS f
		JOIN rezyserzy AS r
		ON
			f.rezyserzy_id = r.id;
		KONIEC;
		$wynik = mysqli_query($id_polaczenia, $zapytanie);
		while ($row = mysqli_fetch_array($wynik)) {
			$id = $row['id'];
			$tytul = $row['tytul'];
			$imie = $row['imie'];
			$nazwisko = $row['nazwisko'];
			echo <<<KONIEC
				<p>$id.$tytul, reżyseria: $imie $nazwisko</p>
			KONIEC;
		}
		mysqli_close($id_polaczenia);
		?>
	</div>
	<div id="stopka">
		<p>Autor: PESEL</p>
		<a href="kwerendy.txt">Zapytania do bazy</a>
		<a href="http://filmy.pl">Przejdź do filmy.pl</a>
	</div>
</body>

</html>