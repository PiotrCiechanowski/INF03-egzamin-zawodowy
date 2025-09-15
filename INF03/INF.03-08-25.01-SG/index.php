<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mieszalnia farb</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="fav.png" type="image/x-icon">
</head>
<body>
    <header>
        <img src="baner.png" alt="Mieszalnia farb">

    </header>
    <form action="index.php" method="POST">
        <label>Data odbioru od: <input type="date" name="data_odbioru"></label>
        <label>do: <input type="date" name="data_do"></label>
        <input type="submit" value="Wyszukaj">

    </form>
    <main>
        <table>
            <tr>
                <th>Nr zamówienia</th>
                <th>Nazwisko</th>
                <th>Imię</th>
                <th>Kolor</th>
                <th>Pojemność[ml]</th>
                <th>Data odbioru</th>
            </tr>
            <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $con = mysqli_connect('localhost', 'root', '', 'mieszalnia') or die("error");

                    $data1 = $_POST['data_odbioru'];
                    $data2 = $_POST['data_do'];
                    $sql = "SELECT zamowienia.id, klienci.nazwisko, klienci.imie, zamowienia.kod_koloru, zamowienia.pojemnosc, zamowienia.data_odbioru FROM klienci INNER JOIN zamowienia ON klienci.Id = zamowienia.id WHERE zamowienia.data_odbioru BETWEEN '$data1' AND '$data2' ORDER BY zamowienia.data_odbioru ASC;";
                    $result = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<tr>';
                        echo '<td>'.$row['id'].'</td>';
                        echo '<td>'.$row['nazwisko'].'</td>';
                        echo '<td>'.$row['imie'].'</td>';
                        echo '<td style="background-color: #'.$row['kod_koloru'].';">'.$row['kod_koloru'].'</td>';
                        echo '<td>'.$row['pojemnosc'].'</td>';
                        echo '<td>'.$row['data_odbioru'].'</td>';
                        echo '</tr>';
                    }
                    mysqli_close($con);
                }

            ?>
        </table>
        
    </main>
    <footer>
        <h3>Egzamin INF.03</h3>
        <p>Autor: XXXXXX</p>
    </footer>

</body>
</html>