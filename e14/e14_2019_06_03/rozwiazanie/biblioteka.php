<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Biblioteka miejska</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div id="baner">
		<h2>Miejska Biblioteka Publiczna w Książkowicach</h2>
	</div>
	<div id="lewy">
		<h3>W naszych zbiorach znajdziesz dzieła następujących autorów:</h3>
		<ul>
		<?php
		$id_polaczenia = mysqli_connect('localhost', 'root', '', 'biblioteka');
		$zapytanie = <<<KONIEC
		SELECT
			`imie`,
			`nazwisko`
		FROM
			`autorzy`;
		KONIEC;
		$wynik = mysqli_query($id_polaczenia, $zapytanie);
		while($row = mysqli_fetch_array($wynik)) {
			$imie = $row['imie'];
			$nazwisko = $row['nazwisko'];
			echo <<<KONIEC
			<li>$imie $nazwisko</li>
			KONIEC;
		}
		?>
		</ul>
	</div>
	<div id="srodkowy">
		<h3>Dodaj nowego czytelnika</h3>
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
		if(!empty($_POST['imie']) && !empty($_POST['nazwisko']) && !empty($_POST['rok'])) {
			$imie = $_POST['imie'];
			$nazwisko = $_POST['nazwisko'];
			$rok = $_POST['rok'];
			$kod = $imie[0].$imie[1].$nazwisko[0].$nazwisko[1];
			$kod = strtoupper($kod).$rok[-2].$rok[-1];
			$zapytanie = <<<KONIEC
			INSERT INTO `czytelnicy`(`imie`, `nazwisko`, `kod`)
				VALUES('$imie', '$nazwisko', '$kod');
			KONIEC;
			mysqli_query($id_polaczenia, $zapytanie);
			echo "Czytelnik: $imie $nazwisko został dodany do bazy danych";
		}
		mysqli_close($id_polaczenia);
		?>
	</div>
	<div id="prawy">
		<img src="biblioteka.png" alt="książki">
		<h4>
			ul. Czytelnicza 25<br>
			12-120 Książkowice<br>
			tel.: 123123123<br>
			e-mail: <a href="mailto:biuro@biblioteka.pl">biuro@biblioteka.pl</a>
		</h4>
	</div>
	<div id="stopka">
		<p>Projekt strony: PESEL</p>
	</div>
</body>
</html>