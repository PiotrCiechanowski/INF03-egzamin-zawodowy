<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalendarz</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Dni, miesiące, lata..</h1>
    </header>
    <nav>
        <?php
            $dzienMiesiac = date("m-d");
            $polaczenie = mysqli_connect('localhost', 'root', '', 'kalendarz') or die("Błąd połączenia");
            $dni_tygodnia = array(
                'Monday'    => 'poniedziałek',
                'Tuesday'   => 'wtorek',
                'Wednesday' => 'środa',
                'Thursday'  => 'czwartek',
                'Friday'    => 'piątek',
                'Saturday'  => 'sobota',
                'Sunday'    => 'niedziela'
            );

            $dzien_ang = date('l');
            $dzien_pl = $dni_tygodnia[$dzien_ang];

            $sql = "SELECT imiona FROM imieniny WHERE data = '$dzienMiesiac'";
            $query = mysqli_query($polaczenie, $sql);

            while($row = mysqli_fetch_assoc($query)){
                echo "<p>Dzisiaj jest $dzien_pl, ".date("d-m-Y").", imieniny: ".$row['imiona']."</p>";
            }

        ?>   
    </nav>
    <aside>
        <table>
            <tr>      
                <th>liczba dni</th>    
                <th>miesiąc</th>           
            </tr>
            <tr>
                <td rowspan="7">31</td>                
                <td>styczeń</td>      
            </tr>
            <tr>
                <td>marzec</td>
            </tr>
            <tr>
                <td>maj</td>
            </tr>
            <tr>
                <td>lipiec</td>
            </tr>
            <tr>
                <td>sierpień</td>
            </tr>
            <tr>
                <td>pazdziernik</td>
            </tr>
            <tr>
                <td>grudzien</td>
            </tr>
            <tr>
                <td rowspan="4">30</td>
                <td>kwiecien</td>
            </tr>
            <tr>
                <td>czerwiec</td>
            </tr>
            <tr>
                <td>wrzesien</td>
            </tr>
            <tr>
                <td>listopad</td>
            </tr>
            <tr>
                <td>18 lub 29</td>
                <td>luty</td>
            </tr>

        </table>
    </aside>
    <main>
        <h2>Sprawdź kto ma urodziny</h2>
        <form action="kalendarz.php" method="post">
            <input type="date" name="data" id="date" min="2024-01-01" max="2024-12-31" value="2024-01-01" required>
            <input type="submit">
        
            <?php
                if(isset($_POST["data"])) {
    	            $data = $_POST["data"];
                    $format = date("m-d", strtotime($_POST["data"]));
                    $sql2 = "SELECT imiona FROM imieniny WHERE data = '$format'";
                    $result = mysqli_query($polaczenie, $sql2);
                    while($row = mysqli_fetch_assoc($result)){
                        $swieto = $row['imiona'];
                    }
                    echo "$data sa imieniny: $swieto";
                
                }
                mysqli_close($polaczenie);
            ?>
        </form>
    </main>
    <article>
        <a href="https://pl.wikipedia.org/wiki/Kalendarz_Majów"><img src="kalendarz.gif" alt="Kalendarz Majów" target="_blank" ></a>
        <h2>Rodzaje kalendarzy</h2>
        <ol>
            <li>słoneczny
                <ul>
                    <li>kalendarz Majów</li>
                    <li>juliański</li>
                    <li>gregoriański</li>
                </ul>
            </li>
            <li>księzycowy
                <ul>
                    <li>starogrecki</li>
                    <li>babiloński</li>
                </ul>
            </li>
        </ol>
    </article>
    <footer>
        <p>Stronę opracował(a): 000000000</p>
    </footer>
</body>
</html>