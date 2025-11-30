<!DOCTYPE html>
<html lang="php">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hodowla świnek morskich</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header class="baner">
        <h1>Hodowla świnek morskich - zamów świnkowe maluszki</h1>
    </header>
    <nav class="lewy1">
        <a href="peruwianka.php">Rasa Peruwianka</a>
        <a href="american.php">Rasa American</a>
        <a href="crested.php">Rasa Crested</a>
    </nav>
    <article class="prawy1">
        <h3>Poznaj wszystkie rasy świnek morskich</h3>
        <ol>
            <?php
                //skrypt1
                $polaczenie = mysqli_connect('localhost', 'root', '', 'hodowla') or die("blad polaczenia z baza");
                $sql1 = "SELECT rasa FROM rasy;";
                $result1 = mysqli_query($polaczenie, $sql1);
                while($row = mysqli_fetch_assoc($result1)){
                    echo "<li>".$row['rasa']."</li>";
                }

            ?>
        </ol>
    </article>
    <main class="lewy2">
        <img src="american.jpg" alt="Świnka morska rasy american">
        
        <?php
            //skrypt 2
            $sql2 = "SELECT DISTINCT swinki.data_ur, swinki.miot, rasy.rasa FROM swinki JOIN rasy ON swinki.rasy_id = rasy.id WHERE rasy.id = 6;";
            $result2 = mysqli_query($polaczenie, $sql2);
            while($row = mysqli_fetch_assoc($result2)){
                echo "<h2>Rasa: ".$row['rasa']."</h2>";
                echo "<p>Data urodzenia: ".$row['data_ur']."</p>";
                echo "<p>Oznaczenie miotu: ".$row['miot']."</p>";
            }
        ?>
        <hr>
        <h2>Świnki w tym miocie</h2>
        <?php
            //skrypt 3
            $sql3 = "SELECT imie, cena, opis FROM swinki WHERE rasy_id = 6;";
            $result3 = mysqli_query($polaczenie, $sql3);
            while($row = mysqli_fetch_assoc($result3)){
                echo "<h3>".$row['imie']." - ".$row['cena']." zł</h3>";
                echo "<p>".$row['opis']."</p>";
            }

            mysqli_close($polaczenie);
        ?>
    </main>
    <footer>
        <p>Stronę wykonał: 000000</p>
    </footer>
</body>
</html>