<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka publiczna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="baner">
        <h1>Biblioteka w Książkowicach Wielkich</h1>
    </header>
    <main class="lewy">
        <h3>Polecamy dzieła autorów:</h3>
        <ol>
            <?php
                //skrypt1
                $polaczenie = mysqli_connect('localhost', 'root', '', 'biblioteka') or die("blad polaczenia");
                $sql1 = "SELECT imie, nazwisko FROM autorzy ORDER BY nazwisko ASC;";
                $result1 = mysqli_query($polaczenie, $sql1);
                while($row = mysqli_fetch_assoc($result1)){
                    echo "<li>".$row['imie']." ".$row['nazwisko']."</li>";
                }

            ?>
        </ol>
    </main>
    <article class="glowny">
        <h3>ul. Czytelnicza 25, <br> Książkowice Wielkie</h3>
        <p><a href="sekretariat@biblioteka.pl">Napisz do nas</a></p>
        <img src="biblioteka.png" alt="książki">
    </article>
    <aside class="prawy1">
        <h3>Dodaj czytelnika</h3>
        <form action="biblioteka.php" method="post">
            <label for="imie">imię: </label>
            <input type="text" name="imie" id="imie"> <br>

            <label for="nazwisko">nazwisko: </label>
            <input type="text" name="nazwisko" id="nazwisko"> <br>

            <label for="symbol">symbol: </label>
            <input type="number" name="symbol" id="symbol"> <br>

            <input type="submit" value="DODAJ">
        </form>
    </aside>
    <section class="prawy2">
        <?php
            //skrypt2 
            
            if(isset($_POST['imie']) && isset($_POST['nazwisko']) && isset($_POST['symbol'])){
                $imie = $_POST['imie'];
                $nazwisko = $_POST['nazwisko'];
                $symbol = $_POST['symbol'];
                echo "Czytelnik $imie $nazwisko został(a) dodany do bazy danych";

                $sql2 = "INSERT INTO `czytelnicy`(`imie`, `nazwisko`, `kod`) VALUES ('$imie','$nazwisko','$symbol');";
                $result2 = mysqli_query($polaczenie, $sql2);
            }


            mysqli_close($polaczenie);
        ?>
    </section>
    <footer>
        <p>Projekt strony: 0000000</p>
    </footer>
</body>
</html>