<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gry komputerowe</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Ranking gier komputerowych</h1>
    </header>
    <article class="lewy">
        <h3>Top 5 gier w tym miesiącu</h3> <br>
        <ul>
            <?php
                //skrypt 1
                $polaczenie = mysqli_connect('localhost', 'root', '', 'gry') or die("blad");
                $result = mysqli_query($polaczenie, $sql="SELECT nazwa, punkty FROM gry ORDER BY punkty DESC LIMIT 5;");
                while($row = mysqli_fetch_assoc($result)){
                    echo"<li>".$row['nazwa']."<a class='kolor'>".$row['punkty']."</a></li>";
                }

            ?>
        </ul>
        <h3>Nasz sklep</h3> <br>
        <a href="http://sklep.gry.pl">Tu kupisz gry</a> <br>
        <h3>Stronę wykonał</h3> <br>
        <p>00000000000</p>
    </article>
    <main>
        
        <?php
            //skrypt 2
            $result1 = mysqli_query($polaczenie, $sql1 = "SELECT id, nazwa, zdjecie FROM gry;");
            while($row = mysqli_fetch_assoc($result1)){
                echo "<section><img src='".$row['zdjecie']."' alt='".$row['nazwa']."' title='".$row['id']."'><p>".$row['nazwa']."</p></section>";
            }
        ?>
    </main>
    <aside class = "prawy">
        <h3>Dodaj nową grę</h3>
        <form action="gry.php" method="post">
            <label for="nazwa">nazwa</label>
            <input type="text" name="nazwa" id="nazwa"> <br>
            <label for="opis">opis</label>
            <input type="text" name="opis" id="opis"> <br>
            <label for="cena">cena</label>
            <input type="text" name="cena" id="cena"> <br>
            <label for="zdjecie">zdjęcie</label>
            <input type="text" name="zdjecie" id="zdjecie">
            <input type="submit" value="DODAJ   ">
        </form>
        <?php
            //skrypt 4
            if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['nazwa'])) {
                $nazwa1 = $_POST['nazwa'];
                $opis1 = $_POST['opis'];
                $cena1 = $_POST['cena'];
                $zdjecie1 = $_POST['zdjecie'];

                if (isset($nazwa1) && !empty($nazwa1)) {
                    $sql3 = "INSERT INTO `gry`(`nazwa`, `opis`, `punkty`, `cena`, `zdjecie`) 
                            VALUES ('$nazwa1','$opis1', 0, '$cena1', '$zdjecie1');";
                    $result3 = mysqli_query($polaczenie, $sql3);
                }
            }
        ?>
    </aside>
    <footer>
        <form action="gry.php" method="post">
            <input type="text" name="text" id="text">
            <input type="submit" value="Pokaż opis">
            <?php
                //skrypt 3
                $numer = $_POST['text'];
                $result2 = mysqli_query($polaczenie, $sql2 = "SELECT nazwa, LEFT(opis, 100), punkty, cena FROM gry WHERE id = $numer;");
                while($row = mysqli_fetch_assoc($result2)){
                    echo "<h2>".$row['nazwa'].", ".$row['punkty']." punktów, ".$row['cena']." zł</h2>";
                    echo "<p>".$row['LEFT(opis, 100)']."</p>";
                }
                mysqli_close($polaczenie);
            ?>
        </form>
    </footer>
</body>
</html>