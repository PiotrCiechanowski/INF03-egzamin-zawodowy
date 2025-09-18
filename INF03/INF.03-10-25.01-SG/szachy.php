<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOŁO SZACHOWE</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <em><h2>Koło szachowe gambit piona</h2></em>
    </header>
    <section id="lewy">
        <h4>Polecane linki</h4>
        <ul>
            <li><a href="kw1.png">kwerenda1</a></li>
            <li><a href="kw2.png">kwerenda2</a></li>
            <li><a href="kw3.png">kwerenda3</a></li>
            <li><a href="kw4.png">kwerenda4</a></li>
        </ul>
        <img src="logo.png" alt="LOGO koła">
    </section>
    <section id="prawy">
        <h3>Najlepsi gracze naszego koła</h3>
        <table>
            <tr>
                <th>Pozycja</th>
                <th>Pseudonim</th>
                <th>Tytuł</th>
                <th>Ranking</th>
                <th>Klasa</th>
            </tr>
            <?php
                $conn = mysqli_connect('localhost', 'root', '', 'szachy') or die("Błąd");
                $sql = "SELECT pseudonim, tytul, ranking, klasa FROM zawodnicy WHERE ranking >= '2787' ORDER BY ranking DESC; ";
                $result = mysqli_query($conn, $sql);
                $i = 1;
                while($row = mysqli_fetch_assoc($result)){
                    echo '<tr>';
                    echo '<td>'.$i++.'</td>';
                    echo '<td>'.$row['pseudonim'].'</td>';
                    echo '<td>'.$row['tytul'].'</td>';
                    echo '<td>'.$row['ranking'].'</td>';
                    echo '<td>'.$row['klasa'].'</td>';
                    echo '</tr>';
                }
            ?>
        </table>

        <form action="szachy.php" method="POST">
                <input type="submit" value="Losuj nową parę graczy"><br>
                <?php
                    $sql2 = "SELECT pseudonim, klasa FROM zawodnicy ORDER BY RAND() LIMIT 2;";
                    $result2 = mysqli_query($conn, $sql2);
                    while($row = mysqli_fetch_assoc($result2)){
                        echo $row['pseudonim'].' ';
                        echo $row['klasa'].' ';
                    }
                    mysqli_close($conn);
                ?>
        </form>
        <p>Legenda: AM - Absolutny Mistrz, SM - Szkolny Mistrz, PM - Mistrz Poziomu, KM - Mistrz Klasowy</p>
    </section>
    <footer>
        <p>Stronę wykonał: XXXX</p>
    </footer>
</body>
</html>