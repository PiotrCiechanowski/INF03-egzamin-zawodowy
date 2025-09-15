<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ważenie samochodów ciężarowych</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <section id="baner1">
        <h1>Waenie pojazdów we Wrocławiu</h1>
    </section>
    <section id="baner2">
        <img src="obraz1.png" alt="waga">
    </section>
    <section id="lewy">
        <h2>Lokalizacje wag</h2>
        <?php
            $con = mysqli_connect('localhost', 'root', '', 'wazenietirow') or die("error");
            $sql = "SELECT ulica FROM lokalizacje;";
            $result = mysqli_query($con, $sql);

            echo '<ol>'; // otwarcie listy przed pętlą
            while($row = mysqli_fetch_assoc($result)){
                echo '<li>ulica '.$row['ulica'].'</li>'; // tylko element li w pętli
            }
            echo '</ol>'; // zamknięcie listy po pętli
        ?>

        <h2>Kontakt</h2>
        <a href="wazenie@wroclaw.pl">napisz</a>
    </section>
    <section id="srodkowy">
        <h2>Alerty</h2>
        <table>
            <tr>
                <th>rejestarcja</th>
                <th>ulica</th>
                <th>waga</th>
                <th>dzień</th>
                <th>czas</th>
            </tr>
            <?php
                //scr 2
                $sql1 = "SELECT wagi.rejestracja, wagi.waga, wagi.dzien, wagi.czas, lokalizacje.ulica FROM wagi INNER JOIN lokalizacje ON wagi.lokalizacje_id = lokalizacje.id WHERE wagi.waga <= 5;";
                $result1 = mysqli_query($con, $sql1);
                while($row = mysqli_fetch_assoc($result1)){
                    echo '<tr>';
                    echo '<td>'.$row['rejestracja'].'</td>';
                    echo '<td>'.$row['ulica'].'</td>';
                    echo '<td>'.$row['waga'].'</td>';
                    echo '<td>'.$row['dzien'].'</td>';
                    echo '<td>'.$row['czas'].'</td>';
                    echo '</tr>';
                }
            ?>
        </table>
        <?php
            //scr 3
            $sql2 = "INSERT INTO wagi(lokalizacje_id, waga, rejestracja, dzien, czas) VALUES (5, FLOOR(1 + RAND() * 10), 'DW12345', CURRENT_DATE(), CURRENT_TIME());";
            $result2 = mysqli_query($con, $sql2);
            header("Refresh: 10");
            
            
            mysqli_close($con);
        ?>
    </section>
    <section id="prawy">
        <img src="obraz2.jpg" alt="tir" id="obraz2">
    </section>
    <footer>
        <p>Stronę wykonał: 00000000000000</p>
    </footer>

</body>
</html>