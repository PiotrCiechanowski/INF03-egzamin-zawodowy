<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video On Demand</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <header class="baner1">
        <h1>Internetowa wypożyczalnia filmów</h1>
    </header>
    <header class="baner2">
        <table>
            <tr>
                <th>Kryminał</th>
                <th>Horror</th>
                <th>Przygody</th>
            </tr>
            <tr>
                <td>20</td>
                <td>30</td>
                <td>20</td>
            </tr>
        </table>
    </header>
   
    <nav class="polecamy">
        <h3>Polecamy</h3>
        <?php
            //skrypt1
            $polaczenie = mysqli_connect('localhost', 'root', '', 'dane3') or die("Błąd połączenia z bazą danych");
            $sql1 = "SELECT id, nazwa, opis, zdjecie FROM produkty WHERE id IN(18, 22, 23, 25);";
            $result1 = mysqli_query($polaczenie, $sql1);
            while($row = mysqli_fetch_row($result1)){
                echo "<section style='float:left;'>";
                echo "<h4>".$row[0].". ".$row[1]."</h4>";
                echo "<img src='".$row[3]."' alt='film'>";
                echo "<p>".$row[2]."</p>";
                echo "</section>";
            }
            
        ?> 
    </nav>
    <main class="filmy_fantastyczne">
        <h3>Filmy fantastyczne</h3>
        <?php
            //skrypt2
            $sql2 = "SELECT id, nazwa, opis, zdjecie FROM produkty WHERE Rodzaje_id = 12;";
            $result2 = mysqli_query($polaczenie, $sql2);
            while($row = mysqli_fetch_row($result2)){
                echo "<section style='float:left;'>";
                echo "<h4>".$row[0].". ".$row[1]."</h4>";
                echo "<img src='".$row[3]."' alt='film'>";
                echo "<p>".$row[2]."</p>";
                echo "</section>";
            }
        ?>
    </main>
    <footer>
        <form action="video.php" method="post">
            <label for="numer">Usuń film nr.: </label> <input type="numer" name="numer" id="numer">
            <input type="submit" value="Usuń film">
        </form>
        <?php
            //skrypt3
            if(isset($_POST['numer'])){
                $numer = $_POST['numer'];
                $sql3 = "DELETE FROM `produkty` WHERE `produkty`.`id` = '$numer';";
                $result3 = mysqli_query($polaczenie, $sql3);

            }

            mysqli_close($polaczenie);
        ?>
            Stronę wykonał: <a href="ja@poczta.com">000000000</a>
    </footer>
</body>
</html>