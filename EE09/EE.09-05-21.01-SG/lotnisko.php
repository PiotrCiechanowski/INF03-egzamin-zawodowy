<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Port Lotniczy</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <header class="baner1">
        <img src="zad5.png" alt="logo lotnisko">
    </header>
    <header class="baner2">
        <h1>Przyloty</h1>
    </header>
    <header class="baner3">
        <h3>przydatne linki</h3>
        <a href="kwerendy.txt" target="_blink" >Pobierz...</a>
    </header>
    <main class="glowny">  
        <table>
            <tr>
                <th>czas</th>
                <th>kierunek</th>
                <th>numer rejsu</th>
                <th>status</th>
            </tr>
            <?php
                //skrypt1
                $polaczenie = mysqli_connect('localhost', 'root', '', 'egzamin') or die("Błąd połączenia z bazą danych");
                $sql1 = "SELECT czas, kierunek, nr_rejsu, status_lotu FROM `przyloty` ORDER BY czas ASC;";
                $result = mysqli_query($polaczenie, $sql1);
                while($row = mysqli_fetch_row($result)){
                    echo "<tr>";
                    echo "<td>".$row[0]."</td>";
                    echo "<td>".$row[1]."</td>";
                    echo "<td>".$row[2]."</td>";
                    echo "<td>".$row[3]."</td>";
                    echo "</tr>";
                }

                mysqli_close($polaczenie);
            ?>
        </table>
        
    </main>
    <footer class="stopka1"> 
        <?php
            //skrypt2
            if(!isset($_COOKIE['Cookie1'])){
                setcookie("Cookie1", "powitanie", time()+2*3600);
                echo "<p><b>Dzień dobry! Strona lotniska używa ciasteczek</b></p>";
            } else{
                echo "<p><em>Witaj ponownie na stronie lotniska</em></p>";
            }
        ?>
    </footer>
    <footer class="stopka2"> 
        Autor: 00000000000
    </footer>
</body>
</html>