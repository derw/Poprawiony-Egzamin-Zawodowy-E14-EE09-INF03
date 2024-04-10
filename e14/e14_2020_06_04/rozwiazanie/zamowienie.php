<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Sklep</title>
	<link rel="stylesheet" href="styl.css">
</head>

<body>
	<div id="baner">
		<h1>Ozdoby - sklep</h1>
	</div>
	<div id="lewy">
		<h2>OZDOBY</h2>
		<a href="galeria.html">Galeria</a><br>
		<a href="zamowienie.php">Zamówienie</a>
	</div>
	<div id="srodkowy">
		<p>Dodaj użytkownika</p>
		<form action="zamowienie.php" method="post">
			<label>
				Imię:
				<input type="text" name="imie"><br>
			</label>
			<label>
				Nazwisko:
				<input type="text" name="nazwisko"><br>
			</label>
			<label>
				e-mail:
				<input type="email" name="email"><br>
			</label>
			<button>WYŚLIJ</button>
		</form>
		<?php
		$id_polaczenia = mysqli_connect('localhost', 'root', '', 'sklep');
		if (!empty($_POST['imie']) && !empty($_POST['nazwisko']) && !empty($_POST['email'])) {
			$imie = $_POST['imie'];
			$nazwisko = $_POST['nazwisko'];
			$email = $_POST['email'];
			$zapytanie = <<<KONIEC
			INSERT INTO `zamowienia`(
				`id`,
				`imie`,
				`nazwisko`,
				`adres_email`
			)
			VALUES(
				NULL,
				'$id',
				'$nazwisko',
				'$email'
			)
			KONIEC;
			mysqli_query($id_polaczenia, $zapytanie);
		}
		mysqli_close($id_polaczenia)
		?>
	</div>
	<div id="prawy">
		<img src="animacja.gif">
	</div>
	<div id="stopka">
		<h3>Autor strony: PESEL</h3>
	</div>
</body>

</html>