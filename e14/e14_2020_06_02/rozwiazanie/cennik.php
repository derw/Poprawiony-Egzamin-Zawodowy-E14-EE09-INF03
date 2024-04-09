<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Pokoje</title>
    <link rel="stylesheet" href="./styl.css">
</head>

<body>
    <header>
        <h2>WYNAJEM POKOI</h2>
    </header>
    <nav>
        <section id="menuOne">
            <a href="./index.html">POKOJE</a>
        </section>
        <section id="menuTwo">
            <a href="./cennik.php">CENNIK</a>
        </section>
        <section id="menuThree">
            <a href="./kalkulator.html">KALKULATOR</a>
        </section>
    </nav>
    <section id="bannerTwo"></section>
    <main>
        <section id="panelLewy">
        </section>
        <section id="panelSrodkowy">
            <h1>Cennik</h1>
            <table>
                <?php
                $id_polaczenia = mysqli_connect('localhost', 'root', '', 'wynajem');
                $zapytanie = <<<KONIEC
                SELECT
                    `id`,
                    `nazwa`,
                    `cena`
                FROM
                    `pokoje`
                WHERE
                    1
                KONIEC;
                $wynik = mysqli_query($id_polaczenia, $zapytanie);
                while ($row = mysqli_fetch_array($wynik)) {
                    $id = $row['id'];
                    $nazwa = $row['nazwa'];
                    $cena = $row['cena'];
                    echo <<<KONIEC
                    <tr>
                        <td>$id</td>
                        <td>$nazwa</td>
                        <td>$cena</td>
                    </tr>
                    KONIEC;
                }
                mysqli_close($id_polaczenia);
                ?>
            </table>
        </section>
        <section id="panelPrawy">
        </section>
    </main>
    <footer>
        <p>Stronę opracował: Chriskyy#0181</p>
    </footer>
</body>

</html>