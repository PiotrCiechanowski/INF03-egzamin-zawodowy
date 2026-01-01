<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel administratora</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <header class="baner"> 
        <h3>Portal Społecznościowy - panel administratora</h3>
    </header>
    <aside class="lewy">
        <h4>Uzytkownicy</h4>
        <?php
            //skrypt1
            $polaczenie = mysqli_connect('localhost', 'root', '', 'dane4') or die("Błąd połączenia z bazą danych");

            $sql1 = "SELECT id, imie, nazwisko, rok_urodzenia, zdjecie FROM `osoby` LIMIT 30;";
            $result1 = mysqli_query($polaczenie, $sql1);
            while($row = mysqli_fetch_row($result1)){
                $wiek = 2025 - $row[3];
                echo $row[0].". ".$row[1]." ".$row[2].", ".$wiek." lat<br>";
            }

        ?>
        <a href="settings.html">Inne ustawienia</a>
    </aside>
    <main class="prawy">
        <h4>Podaj id uzytkownika</h4>
        <form action="users.php" method="post">
            <input type="number" name="numer" id="numer">
            <input type="submit" value="ZOBACZ">
            <hr>
            <?php
                //skrypt2
                if(isset($_POST['numer'])){
                    if(!empty($_POST['numer'])){
                        $id = $_POST['numer'];
        
                        $sql2 = "SELECT osoby.imie, osoby.nazwisko, osoby.rok_urodzenia, osoby.opis, osoby.zdjecie, hobby.nazwa FROM osoby JOIN hobby ON osoby.Hobby_id = hobby.id WHERE osoby.id = '$id';";

                        $result2 = mysqli_query($polaczenie, $sql2);

                        while($row = mysqli_fetch_row($result2)){
                            echo "<h2>".$id." ".$row[0]." ".$row[1]."</h2>";
                            echo "<img src='".$row[4]."' alt='".$id."'>";
                            echo "<p>Rok urodzenia: ".$row[2]."</p>";
                            echo "<p>Opis: ".$row[3]."</p>";
                            echo "<p>Hobby: ".$row[5]."</p>";
                        }
                    }
                }
                mysqli_close($polaczenie);
            ?>
        </form>
    </main>
    <footer>
        Stronę wykonał: 00000000000
    </footer>
</body>
</html>