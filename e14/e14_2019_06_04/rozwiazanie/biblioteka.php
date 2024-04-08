<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Biblioteka publiczna</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div id="baner">
		<h3>Miejska Biblioteka Publiczna w Książkowicach</h2>
	</div>
	<div id="lewy">
		<h2>Dodaj czytelnika</h2>
		<form action="biblioteka.php" method="post">
			<label>
				imię:
				<input type="text" name="imie"><br>
			</label>
			<label>
				nazwisko:
				<input type="text" name="nazwisko"><br>
			</label>
			<label>
				rok urodzenia:
				<input type="number" name="rok"><br>
			</label>
			<button>DODAJ</button>
		</form>
		<?php
		$id_polaczenia = mysqli_connect('localhost', 'root', '', 'biblioteka');
		if(!empty($_POST['imie']) && !empty($_POST['nazwisko']) && !empty($_POST['rok'])) {
			$imie = $_POST['imie'];
			$nazwisko = $_POST['nazwisko'];
			$rok = $_POST['rok'];
			$kod = $imie[0].$imie[1].$rok[-2].$rok[-1].$nazwisko[0].$nazwisko[1];
			$kod = strtolower($kod);
			$zapytanie = <<<KONIEC
			INSERT INTO `czytelnicy`(`imie`, `nazwisko`, `kod`)
			VALUES('$imie', '$nazwisko', '$kod')
			KONIEC;
			mysqli_query($id_polaczenia, $zapytanie);
			echo "Czytelnik: $imie $nazwisko został dodany do bazy danych";
		}
		?>
	</div>
	<div id="srodkowy">
		<img src="biblioteka.png" alt="biblioteka">
		<h4>
			ul. Czytelnicza 25<br>
			12-120 Książkowice<br>
			tel.: 123123123<br>
			e-mail: <a href="mailto:biuro@bib.pl">biuro@bib.pl</a>
		</h4>
	</div>
	<div id="prawy">
		<h3>Nasi czytelnicy</h3>
		<ul>
		<?php
		$zapytanie = <<<KONIEC
		SELECT
			`imie`,
			`nazwisko`
		FROM
			`czytelnicy`
		KONIEC;
		$wynik = mysqli_query($id_polaczenia, $zapytanie);
		while($row = mysqli_fetch_array($wynik)) {
			$imie = $row['imie'];
			$nazwisko = $row['nazwisko'];
			echo <<<KONIEC
			<li>$imie $nazwisko</li>
			KONIEC;
		}
		mysqli_close($id_polaczenia);
		?>
		</ul>
	</div>
	<div id="stopka">
		<p>Projekt witryny: PESEL</p>
	</div>
</body>
</html>