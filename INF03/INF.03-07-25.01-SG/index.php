<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wyszukiwarka miast</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="fav.png" type="image/x-icon">
</head>
<body>
    <div id="container">
        <header>
            <img src="baner.jpg" alt="Polska">
        </header>
        <section id="lewy">
            <h4>Podaj początek nazwy miasta</h4>
            <form action="" method="POST">
            <input type="text" id="miasto" name="miasto" required>
            <input type="submit" value="Szukaj">
            </form>
        </section>
        <section id="lewy1">
            <p>Egzamin INF.03</p>
            <p>Autor: XXXXXXX</p>
        </section>
        <section id="prawy">
            <h1>Wyniki wyszukiwania miast z uwzględnieniem filtra:</h1>
            <table>
                <tr>
                    <th>Miasto</th>
                    <th>Wojewodztwo</th>
                </tr>
                <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $miasto = $_POST['miasto'];
                        $conn = mysqli_connect('localhost', 'root', '', 'wykaz');
                        $sql = "SELECT miasta.nazwa AS miasto, wojewodztwa.nazwa AS wojewodztwo FROM miasta INNER JOIN wojewodztwa ON miasta.id_wojewodztwa = wojewodztwa.id WHERE miasta.nazwa LIKE '$miasto%'";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                                echo "<td>".$row['miasto']."</td>";
                                echo "<td>".$row['wojewodztwo']."</td>";
                            echo "</tr>";
                        }
                    }
                ?>
            </table>
            
        </section>
    </div>
</body>
</html>