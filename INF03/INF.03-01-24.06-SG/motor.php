<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motocykle</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <img src="motor.png" alt="motocykl">
    <header id="baner">
        <h1>Motocykle - moja pasja</h1>
    </header>
    <section id="lewy">
        <h2>Gdzie pojechać?</h2>
        <dl>
            <?php
                //skrypt1
                $con = mysqli_connect('localhost', 'root', '', 'motory') or die("error");
                $sql1 = "SELECT wycieczki.nazwa, wycieczki.opis, wycieczki.poczatek, zdjecia.zrodlo FROM wycieczki INNER JOIN zdjecia ON wycieczki.zdjecia_id = zdjecia.id;";
                $result1 = mysqli_query($con, $sql1);
                while($row = mysqli_fetch_assoc($result1)){
                    echo '<dt>'.$row['nazwa'].', rozpoczyna się w '.$row['poczatek'].', <a href="'.$row['zrodlo'].'.jpg">zobacz zdjęcie</a>'.'</dt>';
                    echo '<dd>'.$row['opis'].'</dd>';
                }
            ?>

        </dl>
    </section>
    <aside>
        <section id="prawy1">
            <h2>Co kupić?</h2>
            <ol>
                <li>Honda CBR125R</li>
                <li>Yamaha YBR125</li>
                <li>„Honda VFR800</li>
                <li>Honda CBR1100XX</li>
                <li>BMW R1200GS LC</li>
            </ol>
        </section>
        <section id="prawy2">
            <h2>Statystyki</h2>
            
            <?php
                //skrypt2
                $sql2 = "SELECT COUNT(nazwa) FROM wycieczki;";
                $result2 = mysqli_query($con, $sql2);
                while($row = mysqli_fetch_assoc($result2)){
                    echo '<p>Wpisanych wycieczek: </p>'.$row['COUNT(nazwa)'];
                }
                mysqli_close($con);
            ?>
            <p>Użytkowników forum: 200</p>
            <p>Przesłanych zdjęć: 1300</p>
        </section>
    </aside>
    <footer>
        <p>Stronę wykonał: XXXXX</p>
    </footer>
</body>
</html>