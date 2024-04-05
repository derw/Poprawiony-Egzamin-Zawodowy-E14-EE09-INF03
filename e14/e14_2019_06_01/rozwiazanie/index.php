<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<title>Sklep papierniczy</title>
	<link rel="stylesheet" href="styl.css" />
</head>

<body>
	<div id="baner">
		<h1>W naszym sklepie internetowym kupisz najtaniej</h1>
	</div>
	<div id="lewy">
		<h3>Promocja 15% obejmuje artykuły</h3>
		<ul>
			<?php
			$id_polaczenia = mysqli_connect('localhost', 'root', '', 'sklep');
			$zapytanie = <<<KONIEC
				SELECT
					nazwa
				FROM
					`towary`
				WHERE
					promocja = 1;
				KONIEC;
			$wynik = mysqli_query($id_polaczenia, $zapytanie);
			while ($row = mysqli_fetch_array($wynik)) {
				$nazwa = $row['nazwa'];
				echo <<<KONIEC
					<li>$nazwa</li>";
				KONIEC;
			}
			?>
		</ul>
	</div>
	<div id="srodkowy">
		<h3>Cena wybranego artykułu w promocji</h3>
		<form action="index.php" method="post">
			<select name="lista">
				<option value="Gumka do mazania">Gumka do mazania</option>
				<option value="Cienkopis">Cienkopis</option>
				<option value="Pisaki 60 szt.">Pisaki 60 szt.</option>
				<option value="Markery 4 szt.">Markery 4 szt.</option>
			</select>
			<button type="submit">WYBIERZ</button>
		</form>
		<?php
		if (!empty($_POST['lista'])) {
			$produkt = $_POST['lista'];
			$zapytanie = <<<KONIEC
				SELECT
					cena
				FROM
					towary
				WHERE
					nazwa = $produkty;
				KONIEC;
			$wynik = mysqli_query($id_polaczenia, $zapytanie);
			while ($row = mysqli_fetch_array($wynik)) {
				echo ROUND($row['cena'] * 0.85, 2);
			}
		}
		mysqli_close($id_polaczenia);
		?>
	</div>
	<div id="prawy">
		<h3>Kontakt</h3>
		<p>
			telefon:123123123<br />
			e-mail: <a href="mailto:bok@sklep.pl">bok@sklep.pl</a>
		</p>
		<img src="promocja2.png" alt="promocja" />
	</div>
	<div id="stopka">
		<h4>Autor strony PESEL</h4>
	</div>
</body>

</html>