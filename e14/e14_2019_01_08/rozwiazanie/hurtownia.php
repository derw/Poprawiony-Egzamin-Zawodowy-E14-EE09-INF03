<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Hurtownia komputerowa</title>
	<link rel="stylesheet" href="styl2.css">
</head>

<body>
	<div id="lista">
		<ul>
			<li>Producenci
				<ol>
					<li>Intel</li>
					<li>AMD</li>
					<li>Motorola</li>
					<li>Corsair</li>
					<li>ADATA</li>
					<li>WD</li>
					<li>Kingstone</li>
					<li>Patriot</li>
					<li>Asus</li>
				</ol>
			</li>
		</ul>
	</div>
	<div id="formularz">
		<h1>Dystrybucja sprzętu komputerowego</h1>
		<form action="hurtownia.php" method="post">
			<label>
				Wybierz producenta<br>
				<select name="producent">
					<option value="1">Intel</option>
					<option value="2">AMD</option>
					<option value="3">Motorola</option>
					<option value="4">Corsair</option>
					<option value="5">ADATA</option>
					<option value="6">WD</option>
					<option value="7">Kingstone</option>
					<option value="8">Patriot</option>
					<option value="9">Asus</option>
				</select>
			</label>
			<button type="submit">WYŚWIETL</button>
		</form>
	</div>
	<div id="logo">
		<img src="sprzet.png" alt="Sprzedajemy komputery">
	</div>
	<div id="glowny">
		<h2>Podzespoły wybranego producenta</h2>
		<?php
		$id_polaczenia = mysqli_connect('localhost', 'root', '', 'sklep');
		if (!empty($_POST['producent'])) {
			$producent = $_POST['producent'];
			$zapytanie = <<<KONIEC
			SELECT
				podzespoly.nazwa,
				podzespoly.dostepnosc,
				podzespoly.cena
			FROM
				podzespoly
			WHERE
				podzespoly.producenci_id = $producent;
			KONIEC;
			$wynik = mysqli_query($id_polaczenia, $zapytanie);
			while ($row = mysqli_fetch_array($wynik)) {
				$nazwa = $row['nazwa'];
				$cena = $row['cena'];
				if (1 == $row['dostepnosc']) {
					echo <<<KONIEC
					<p>$nazwa CENA: $cena $dostepnosc DOSTĘPNY</p>
					KONIEC;
				} else {
					echo <<<KONIEC
					<p>$nazwa CENA: $cena $dostepnosc NIEDOSTĘPNY</p>
					KONIEC;
				}
			}
		}
		mysqli_close($id_polaczenia);
		?>
	</div>
	<div id="stopka">
		<h4>Zapraszamy od poniedziałku do soboty w godzinach 7<sup>30</sup>-16<sup>30</sup></h4>
		Strony partnerów:
		<a href="http://adata.pl/" target="_blank">ADATA</a>
		<a href="http://patriot.pl/" target="_blank">Patriot</a>
		<a href="mailto:biuro@hurt.pl">Napisz</a>
		<p>Stronę wykonał: PESEL</p>
	</div>
</body>

</html>