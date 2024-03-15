<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<title>Portal społecznościowy</title>
	<link rel="stylesheet" href="styl5.css" />
</head>

<body>
	<div id="baner1">
		<h2>Nasze osiedle</h2>
	</div>
	<div id="baner2">
		<?php
		$id_polaczenia = mysqli_connect('localhost', 'root', '', 'portal');
		$zapytanie = <<<KONIEC
	SELECT COUNT(*) AS liczba FROM dane;
	KONIEC;
		$wynik = mysqli_query($id_polaczenia, $zapytanie);
		while ($row = mysqli_fetch_array($wynik)) {
			$liczba = $row['liczba'];
			echo <<<KONIEC
		<h5>Liczba użytkowników portalu: $liczba</h5>
		KONIEC;
		}
		?>
	</div>
	<div id="lewy">
		<h3>Logowanie</h3>
		<form action="uzytkownicy.php" method="post">
			<label>
				login:<br />
				<input type="text" name="login" /><br />
			</label>
			<label>
				hasło:<br />
				<input type="password" name="haslo" /><br />
			</label>
			<button>Zaloguj</button>
		</form>
	</div>
	<div id="prawy">
		<h3>Wizytówka</h3>
		<?php
		if (!empty($_POST['login']) && !empty($_POST['haslo'])) {
			$login = $_POST['login'];
			$haslo = $_POST['haslo'];
			$zapytanie = <<<KONIEC
			SELECT
				login
			FROM
				uzytkownicy
			WHERE
				login = '$login';
			KONIEC;
			$wynik = mysqli_query($id_polaczenia, $zapytanie);
			if (mysqli_num_rows($wynik) == 1) {
				$zapytanie = <<<KONIEC
				SELECT haslo FROM uzytkownicy WHERE login = '$login';
				KONIEC;
				$wynik = mysqli_query($id_polaczenia, $zapytanie);
				while ($row = mysqli_fetch_array($wynik)) {
					$szyfr = sha1($haslo);
					if ($szyfr == $row['haslo']) {
						$zapytanie = <<<KONIEC
						SELECT
							u.login,
							d.rok_urodz,
							d.przyjaciol,
							d.hobby,
							d.zdjecie
						FROM
							uzytkownicy AS u
						INNER JOIN dane AS d
						ON
							u.id = d.id
						WHERE
							u.login = '$login';
						KONIEC;
						$wynik = mysqli_query($id_polaczenia, $zapytanie);
						while ($tab = mysqli_fetch_row($wynik)) {
							echo <<<KONIEC
							<div class="wizytowka">
								<img src="$zdjecie" alt="osoba">
								<h4>$login ($wiek)</h4>
								<p>hobby: $hobby</p>
								<h1><img src="icon-on.png" alt="">$przyjaciol</h1>
								<a href="dane.html"><button>Więcej informacji</button></a>
							</div>
							KONIEC;
						}
					} else echo "hasło nieprawidłowe";
				}
			} else echo "login nie istnieje";
		}
		mysqli_close($id_polaczenia);
		?>
	</div>
	<div id="stopka">
		Stronę wykonał: Chriskyy#0181
	</div>
</body>

</html>