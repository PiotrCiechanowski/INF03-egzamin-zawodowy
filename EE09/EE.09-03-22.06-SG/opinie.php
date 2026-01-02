<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opinie klientów</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <header class="baner">
        <h1>Hurtownia spozywcza</h1>
    </header>
    
    <main  class="glowny">
        <h2>Opinie naszych klientów</h2>
        <?php
            //skrypt1
            $polaczenie = mysqli_connect('localhost', 'root', '', 'hurtownia') or die("Blad polaczenia z baza danych");
            $sql1 = "SELECT klienci.zdjecie, klienci.imie, opinie.opinia FROM `klienci` JOIN opinie ON klienci.id = opinie.Klienci_id WHERE klienci.Typy_id = 2 OR klienci.Typy_id = 3;";
            $result1 = mysqli_query($polaczenie, $sql1);
            while($row = mysqli_fetch_row($result1)){
                echo "<section>";
                echo "<img src='".$row[0]."' alt='klient'>";
                echo "<blockquote>".$row[2]."</blockquote>";
                echo "<h4>".$row[1]."</h4>";
                echo "</section>";
            }


        ?>
    </main>
    <footer class="stopka1">
        <h3>Współpracują z nami</h3>
        <a href="http://sklep.pl/">Sklep 1</a>
    </footer>
    <footer class="stopka2">
        <h3>Nasi top klienci</h3>
        <ol>
            <?php
                //skrypt2
                $sql2 = "SELECT imie, nazwisko, punkty FROM `klienci` ORDER BY punkty DESC LIMIT 3;";
                $result2 = mysqli_query($polaczenie, $sql2);
                while($row = mysqli_fetch_row($result2)){
                    echo "<li>".$row[0]." ".$row[1].", ".$row[2]."pkt.</li>";
                }

                mysqli_close($polaczenie);
            ?>
        </ol>
    </footer>
    <footer class="stopka3">
        <h3>Skontaktuj się</h3>
        <p>telefon: 111222333</p>
    </footer>
    <footer class="stopka4">
        <h3>Autor: 00000000000</h3>
    </footer>
</body>
</html>