<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIEKARNIA</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <img src="wypieki.png" alt="Produkty naszej piekarni">
    <nav>
        <a href="kw11.png">KWERENDA1</a>
        <a href="kw22.png">KWERENDA2</a>
        <a href="kw33.png">KWERENDA3</a>
        <a href="kw44.png">KWERENDA4</a>
    </nav>
    <header>
        <h1>WITAMY</h1>
        <h4>NA STRONIE PIEKARNI</h4>
        <p>Od 31 lat oferujemy najwyższej jakości pieczywo. Naturalnie świeże, naturalnie smaczne. Pieczemy wyłącznie wypieki na naturalnym zakwasie bez polepszaczy i zagęstników. Korzystamy wyłącznie z najlepszych ziaren pochodzących z ekologicznych upraw położonych w rejonach zgierskim i ozorkowskim.</p>
    </header>
    <main>
        <h4>Wybierz rodzaj wypieków:</h4>
        <form method="POST">
        <select name="lista" id="lista">
            <?php
                $con1 = mysqli_connect('localhost', 'root', '', 'piekarnia');
                $query = "SELECT DISTINCT Rodzaj FROM wyroby ORDER BY Rodzaj DESC;";
                $result = mysqli_query($con1, $query);
                while($row = mysqli_fetch_assoc($result)){
                    echo '<option value="'.$row['Rodzaj'].'">'.$row['Rodzaj'].'</option>';
                }
            
            ?>
        </select>
            <input type="submit" value="Wybierz">                  
        </form>
        <table>
        <th>
            <td>Rodzaj</td>
            <td>Nazwa</td>
            <td>Gramatura</td>
            <td>Cena</td>
        </th>

        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['lista'])) {
                $wybranyRodzaj = $_POST['lista'];
                $query2 = "SELECT Rodzaj, Nazwa, Gramatura, Cena FROM wyroby WHERE Rodzaj='$wybranyRodzaj';";
                $result2 = mysqli_query($con1, $query2);
                while($row = mysqli_fetch_assoc($result2)){
                    echo '<tr>';
                        echo '<td>'.$row['Rodzaj'].'</td>';
                        echo '<td>'.$row['Nazwa'].'</td>';
                        echo '<td>'.$row['Gramatura'].'</td>';
                        echo '<td>'.$row['Cena'].'</td>';
                    echo '</tr>';
                }
            }
        mysqli_close($con1);
            
        ?>
        </table>
    </main>
    <footer>
        <p>AUTOR: XXXXXX</p>
        <p>Data: data egzaminu</p>
    </footer>
</body>
</html>