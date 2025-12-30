<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wizytówki</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <header class="baner">
        <h1>Wizytówki pracowników</h1>
        <form action="index.php" method="post">
            <input type="number" name="numer" id="" value="1" min="1" max="9">
            <input type="submit" value="WYŚWIETL">
        </form>
    </header>
    
    <main class="wizytowki">
        <?php
            //skrypt1 
            $polaczenie = mysqli_connect('localhost', 'root', '', 'firma') or die("Błąd połączenia z bazą danych");
            
            $numer = $_POST['numer'];
            if(!isset($_POST['numer'])){
                $numer = 1;
            }
            $sql1 = "SELECT id, imie, nazwisko, adres, miasto FROM `pracownicy` WHERE id = '$numer';";
            $result1 = mysqli_query($polaczenie, $sql1);
            while($row = mysqli_fetch_row($result1)){
                echo "<img src='".$row[0].".jpg' alt='pracownik'>";
                echo "<h2>".$row[1]." ".$row[2]."</h2>";
                echo "<h4>Adres:</h4>";
                echo "<p>".$row[3].", ".$row[4]."</p>";
            }
        ?>
    </main>
    <footer class="stopka1">    
        <img src="obraz.jpg" alt="pracownicy firmy">
    </footer>
    <footer class="stopka2">
        <p>Autorem wizytowki jest: 00000000000</p>
        <a href="http://agencjareklamowa543.pl/" target="_blink">Zobacz nasze realizacje</a>
    </footer>
    <footer class="stopka3">
        <p>Osoby proszone o podpisanie dokumentu RODO:</p>
        <ol>
            <?php
                //skrypt2
                $sql2 = "SELECT imie, nazwisko FROM `pracownicy` WHERE czyRODO = 0;";
                $result2 = mysqli_query($polaczenie, $sql2);
                while($row = mysqli_fetch_row($result2)){
                    echo "<li>".$row[0]." ".$row[1]."</li>";
                }


                mysqli_close($polaczenie);
            ?>
        </ol>
    </footer>
</body>
</html>