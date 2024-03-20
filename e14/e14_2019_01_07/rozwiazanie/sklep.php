<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Hutrtownia</title>
	<link rel="stylesheet" href="styl1.css">
</head>

<body>
	<div id="logo">
		<img src="komputer.png" alt="hurtownia komputerowa">
	</div>
	<div id="lista">
		<ul>
			<li>Sprzęt
				<ol>
					<li>Procesory</li>
					<li>Pamięci RAM</li>
					<li>Monitory</li>
					<li>Obudowy</li>
					<li>Karty graficzne</li>
					<li>Dyski twarde</li>
				</ol>
			</li>
			<li>Oprogramowanie</li>
		</ul>
	</div>
	<div id="formularz">
		<h2>Hurtownia komputerowa</h2>
		<form action="sklep.php" method="post">
			<label>
				Wybierz kategorię sprzętu<br>
				<select name="kategoria" id="kategoria">
					<option value="1"> Procesory </option>
					<option value="2"> Pamięci RAM </option>
					<option value="3"> Monitory </option>
					<option value="4"> Obudowy </option>
					<option value="5"> Karty graficzne </option>
					<option value="6"> Dyski twarde </option>
				</select>
			</label>
			<button type="submit">SPRAWDŹ</button>
		</form>
	</div>
	<div id="glowny">
		<h1>Podzespoły we wskazanej kategorii</h1>
		<?php
		$id_polaczenia = mysqli_connect('localhost', 'root', '', 'sklep');
		if (!empty($_POST['kategoria'])) {
			$kategoria = $_POST['kategoria'];
			$zapytanie = <<<KONIEC
			SELECT
				podzespoly.nazwa,
				podzespoly.opis,
				podzespoly.cena
			FROM
				podzespoly
			JOIN typy 
			ON podzespoly.typy_id = typy.id
			WHERE
				typy.id = $kategoria;
			KONIEC;
			$wynik = mysqli_query($id_polaczenia, $zapytanie);
			while ($row = mysqli_fetch_array($wynik)) {
				$nazwa = $row['nazwa'];
				$opis = $row['opis'];
				$cena = $row['cena'];
				echo <<<KONIEC
				<p>$nazwa $opis CENA: $cena</p>
				KONIEC;
			}
		}
		mysqli_close($id_polaczenia);
		?>
	</div>
	<div id="stopka">
		<h3>Hurtownia działa od poniedziałku do soboty w godzinach 7<sup>00</sup>-16<sup>00</sup></h3>
		<a href="mailto:bok@hurtownia.pl">Napisz do nas</a>
		Partnerzy:
		<a href="http://intel.pl" target="_blank">Intel</a>
		<a href="http://amd.pl" target="_blank">AMD</a>
		<p>Stronę wykonał: PESEL</p>
	</div>
</body>

</html>