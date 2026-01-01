<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twój wskaźnik BMI</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <header class="baner">  
        <h2>Oblicz wskaźnik BMI</h2>
    </header>
    <header class="logo">
        <img src="wzor.png" alt="liczymy BMI">
    </header>
    <aside class="lewy">
        <img src="rys1.png" alt="zrzuć kalorie!">
    </aside>
    <article class="prawy">
        <h1>Podaj dane</h1>
        <form action="waga.php" method="post">
            <label for="waga">Waga: </label><input type="number" name="waga" id="waga"> <br>
            <label for="wzrost">Wzrost [cm]:</label> <input type="number" name="wzrost" id="wzrost"> <br>
            <input type="submit" value="Licz BMI i zapisz wynik">
        </form>
        <?php
            #skrypt1
            $polaczenie = mysqli_connect('localhost', 'root', '', 'egzamin') or die("Błąd połączenia z bazą danych");

            $waga = $_POST['waga'];
            $wzrost = $_POST['wzrost'];
            
            if(empty($waga) || empty($wzrost)){

            }else{
                $bmi = $waga/($wzrost*$wzrost)*10000;
                echo "Twoja waga: ".$waga;
                echo " Twój wzrost: ".$wzrost."<br>";
                echo "BMI wynosi: ".$bmi;
                $wynik = $bmi;
                if($bmi<19){
                    $bmi = 1;
                }else if($bmi > 18 && $bmi < 26){
                    $bmi = 2;
                }else if($bmi > 25 && $bmi < 31){
                    $bmi = 3; 
                }else if($bmi > 30){
                    $bmi = 4;
                }
                
                $sql1 = "INSERT INTO `wynik`(`bmi_id`, `data_pomiaru`, `wynik`) VALUES ('$bmi',CURRENT_DATE(),'$wynik');";
                $result1 = mysqli_query($polaczenie, $sql1);
            }

        ?>
    </article>
    <main class="glowny">
        <table>
            <tr>
                <th>lp.</th>
                <th>Interpretacja</th>
                <th>zaczyna się od…</th>
            </tr>
            <?php
                #skrypt2
                $sql2 = "SELECT id, informacja, wart_min FROM `bmi`;";
                $result2 = mysqli_query($polaczenie, $sql2);
                while($row = mysqli_fetch_row($result2)){
                    echo "<tr>";
                    echo "<td>".$row[0]."</td>";
                    echo "<td>".$row[1]."</td>";
                    echo "<td>".$row[2]."</td>";
                    echo "</tr>";
                }



                mysqli_close($polaczenie);
            ?>
        </table>
    </main>
    <footer>
        Autor: 00000000000
        <a href="kw2.jpg">Wynik działania kwerendy 2</a>
    </footer>
</body>
</html>