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
                SELECT * FROM pokoje";
                KONIEC;
                $res = mysqli_query($id_polaczenia, $zapytanie);
                while ($row = mysqli_fetch_array($res)) {
                    echo "<tr>
                            <td>$row[0]</td>
                            <td>$row[1]</td>
                            <td>$row[2]</td>
                        </tr>";
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