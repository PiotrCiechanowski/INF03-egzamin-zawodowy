<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZDOBYWCY GÓR</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Klub zdobywców gór polskic</h1>
    </header>
    <nav>
        <a href="kw1.png">kwerenda1</a>
        <a href="kw2.png">kwerenda2</a>
        <a href="kw3.png">kwerenda3</a>
        <a href="kw4.png">kwerenda4</a>
    </nav>
    <section id="lewy">
        <img src="logo.png" alt="logo zdobywcy">
        <h3>razem z nami:</h3>
        <ul>
            <li>wyjazdy</li>
            <li>szkolenia</li>
            <li>rekreacja</li>
            <li>wypoczynek</li>
            <li>wyzwania</li>
        </ul>
    </section>
    <section id="prawy">
        <h2>Dołącz do naszego zespołu!</h2>
        <p>Wpisz swoje dane do formularza</p>
        <form action="zdobywcy.php" method="POST">
            Nazwisko: 
            <input type="text" name="nazwisko">
            Imię: 
            <input type="text" name="imie">
            Funkcja:
            <select name="lista" id="lista">
                <option value="uczestnik">uczestnik</option>
                <option value="przewodnik">przewodnik</option>
                <option value="zaopatrzeniowiec">zaopatrzeniowiec</option>
                <option value="organizator">organizator</option>
                <option value="ratownik">ratownik</option>
            </select>
            Email:
            <input type="text" name="email">
            <input type="submit" value ="Dodaj">
            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {   
                    $nazwisko = $_POST['nazwisko'];
                    $imie = $_POST['imie'];
                    $lista = $_POST['lista'];
                    $email = $_POST['email'];
                    

                    $con = mysqli_connect('localhost', 'root', '', 'zdobywcy') or die("error");
                    $sql = "INSERT INTO osoby(nazwisko, imie, funkcja, email) VALUES ('$nazwisko', '$imie', '$lista', '$email');";
                    $result = mysqli_query($con, $sql); 
                }
            ?>


            <table>
                <tr>
                    <th>Nazwisko</th>
                    <th>Imię</th>
                    <th>Funkcja</th>
                    <th>Email</th>
                </tr>

                <?php
                    $sql2 = "SELECT nazwisko, imie, funkcja, email FROM osoby;";
                    $result2 = mysqli_query($con, $sql2);
                    while($row = mysqli_fetch_assoc($result2)){
                        echo '<tr>';
                        echo '<td>'.$row['nazwisko'].'</td>';
                        echo '<td>'.$row['imie'].'</td>';
                        echo '<td>'.$row['funkcja'].'</td>';
                        echo '<td>'.$row['email'].'</td>';
                        echo '</tr>';
                    }
                    mysqli_close($con);
                ?>
                
            </table>
        </form>
    </section>
    <footer>
        Stronę wykonał: XXXXXX
    </footer>
</body>
</html>