<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Hurtownia papeirnicza</title>
	<link rel="stylesheet" href="styl.css">
</head>

<body>
	<div id="baner">
		<h1>W naszej hurtowni kupisz najtaniej</h1>
	</div>
	<div id="lewy">
		<h3>Ceny wybranych artykułów w hurtowni:</h3>
		<table>
			<?php
			$id_polaczenia = mysqli_connect('localhost', 'root', '', 'sklep');
			$zapytanie = <<<KONIEC
				SELECT
					`nazwa`,
					`cena`
				FROM
					`towary`
				LIMIT 4;
			KONIEC;
			$wynik = mysqli_query($id_polaczenia, $zapytanie);
			while ($row = mysqli_fetch_array($wynik)) {
				$nazwa = $row['nazwa'];
				$cena = $row['cena'];
				echo <<<KONIEC
				<tr>
					<td>$nazwa</td>
					<td>$cena zł</td>
				</tr>
				KONIEC;
			}
			?>
		</table>
	</div>
	<div id="srodkowy">
		<h3>Ile będą kosztować Twoje zakupy?</h3>
		<form action="index.php" method="post">
			<label>
				wybierz artykuł
				<select name="lista">
					<option value="Zeszyt 60 kartek">Zeszyt 60 kartek</option>
					<option value="Zeszyt 32 kartki">Zeszyt 32 kartki</option>
					<option value="Cyrkiel">Cyrkiel</option>
					<option value="Linijka 30 cm">Linijka 30 cm</option>
					<option value="Ekierka">Ekierka</option>
					<option value="Linijka 50 cm">Linijka 50 cm</option>
				</select><br>
			</label>
			<label>
				liczba sztuk:
				<input type="number" name="liczba" value="1" />
			</label>
			<br>
			<button type="submit">OBLICZ</button>
		</form>
		<?php
		if (!empty($_POST['lista']) && !empty($_POST['liczba'])) {
			$produkt = $_POST['lista'];
			$liczba = $_POST['liczba'];
			$zapytanie = <<<KONIEC
			SELECT
				`cena`
			FROM
				`towary`
			WHERE
				nazwa = '$produkt';
			KONIEC;
			$wynik = mysqli_query($id_polaczenia, $zapytanie);
			$row = mysqli_fetch_array($wynik);
			echo ROUND($row['cena'] * $liczba, 1);
		}
		mysqli_close($id_polaczenia);
		?>
	</div>
	<div id="prawy">
		<img src="zakupy2.png" alt="hurtownia">
		<h3>Kontakt</h3>
		<p>
			telefon: <br>
			111222333<br>
			e-mail: <br>
			<a href="mailto:hurt@wp.pl">hurt@wp.pl</a>
		</p>
	</div>
	<div id="stopka">
		<h4>Witrynę wykonał PESEL</h4>
	</div>
</body>

</html>