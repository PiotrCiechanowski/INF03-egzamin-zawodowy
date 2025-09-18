<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WOLONTARIAT SZKOLNY</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>KONKURS - WOLONTARIAT SZKOLNY</h1>
    </header>
    <section id="lewy">
        <h3>Konkursowe nagrody</h3>
        <form method="GET">
        <input type="submit" value="Losuj nowe nagrody">
        </form>
        <table>
            <tr>
                <th>Nr</th>
                <th>Nazwa</th>
                <th>Opis</th>
                <th>Wartość</th>
            </tr>
            <ol>
                <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'konkurs') or die("blad");
                $sql = "SELECT nazwa, opis, cena FROM nagrody ORDER BY RAND() LIMIT 5;";
                $result = mysqli_query($polaczenie, $sql);
                $i = 1;
                while($row = mysqli_fetch_assoc($result)){
                    echo '<tr>';
                    echo '<td>'.$i++.'</td>';
                    echo '<td>'.$row['nazwa'].'</td>';
                    echo '<td>'.$row['opis'].'</td>';
                    echo '<td>'.$row['cena'].'</td>';
                    echo '<tr>';
                }
                mysqli_close($polaczenie);
                ?>
            </ol>
        </table>
    </section>
    <section id="prawy">
        <img src="puchar.png" alt="Puchar dla wolontariusza">
        <h4>Polecane link</h4>
        <ul>
            <li><a href="kw1.png">Kwerenda1</a></li>
            <li><a href="kw2.png">Kwerenda2</a></li>
            <li><a href="kw3.png">Kwerenda3</a></li>
            <li><a href="kw4.png">Kwerenda4</a></li>
        </ul>
    </section>
    <footer>
        <p>Numer Zdającego: XXXXX</p>
    </footer>
</body>
</html>