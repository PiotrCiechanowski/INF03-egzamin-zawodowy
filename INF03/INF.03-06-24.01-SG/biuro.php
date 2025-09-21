<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poznaj Europę</title>
    <link rel="stylesheet" href="styl9.css">
</head>
<body>
    <header class="baner">
        <h1>BIURO PODRÓŻY</h1>
    </header>
    <section class="lewy">
        <h2>Promocje</h2>
        <table>
            <tr>
                <td>Warszawa</td> <td>od 600zł</td>
            </tr>
            <tr>
                <td>Wenecja</td> <td>od 1200zł</td>
            </tr>
            <tr>
                <td>Paryz</td> <td>od 1200zł</td>
            </tr>
        </table>
    </section>
    <main class="srodkowy"> 
        <h2>W tym roku jedziemy do...</h2>
        
        <?php
            // skrypt 1
            $con =  mysqli_connect('localhost', 'root', '', 'podroze') or die('error');
            $result = mysqli_query($con, $sql = "SELECT nazwaPliku, podpis FROM zdjecia ORDER BY podpis ASC;");
            while($row = mysqli_fetch_assoc($result)){
                echo "<img src='".$row['nazwaPliku']."' alt='".$row['podpis']."' title='".$row['podpis']."'>";
            }

        ?>
    </main>
    <section class="prawy">
        <h2>Kontakt</h2>
        <a href="biuro@wycieczki.pl">napisz do nas</a>
        <p>telefon: 444555666</p>
    </section>
    <aside class="dane">
        <h3>W poprzednich latach byliśmy...</h3>
        <ol>
            <?php
                //skrypt 2
                $result2 = mysqli_query($con, $sql2="SELECT cel, dataWyjazdu FROM wycieczki WHERE dostepna = 1;");
                while($row = mysqli_fetch_assoc($result2)){
                    echo "<li>";
                    echo "Dnia ".$row['dataWyjazdu']." pojechaliśmy do ".$row['cel'];
                    echo "</li>";
                }
                mysqli_close($con);
            ?>
        </ol>
    </aside>
    <footer>
        <p>Stronę wykonał: 0000000000000000</p>
    </footer>
</body>
</html>