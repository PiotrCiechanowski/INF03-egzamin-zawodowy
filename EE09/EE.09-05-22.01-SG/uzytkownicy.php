<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal społecznościowy</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <header class="baner1">
        <h2>Nasze osiedle</h2>
    </header>
    <header class="baner2">
        <?php
            //skrypt1
            $polaczenie = mysqli_connect('localhost', 'root', '', 'portal') or die("Błąd połączenia z bazą danych");
            $result1 = mysqli_query($polaczenie, $sql1 = "SELECT COUNT(*) FROM `dane`;");
            $row = mysqli_fetch_row($result1);
            echo "Liczba użytkowników portalu: ".$row[0];
        ?>
    </header>
    <aside class="lewy">
        <h3>Logowanie</h3>
        <form action="" method="post">
            <label for="login">login </label><br>
            <input type="text" name="login" id="login"> <br>
            <label for="haslo">hasło</label> <br>
            <input type="password" name="haslo" id="haslo"> <br>
            <input type="submit" value="Zaloguj">
        </form>
    </aside>
    <main class="prawy">
        <h3>Wizytówka</h3>
        
        <section id="wizytowka">
            <?php
                //skrypt2
                if(!empty($_POST['login'])){
                    $login = $_POST['login'];
                    $sql2 = "SELECT haslo FROM `uzytkownicy` WHERE login = '$login';";
                    $result2 = mysqli_query($polaczenie, $sql2);
                    
                    if(mysqli_num_rows($result2) > 0 ){
                        $row = mysqli_fetch_row($result2);
                        $str = $_POST['haslo'];
                        if(sha1($str) === $row[0]){
                            
                            
                            $sql3 = "SELECT uzytkownicy.login, dane.rok_urodz, dane.przyjaciol, dane.hobby, dane.zdjecie FROM uzytkownicy JOIN dane ON uzytkownicy.id = dane.id WHERE login = '$login';";
                            $result3 = mysqli_query($polaczenie, $sql3);
                           
                            while($row = mysqli_fetch_row($result3)){
                                $wiek = 2025 - $row[1];
                                echo "<img src='".$row[4]."' alt='osoba'> <br>";
                                echo "<h4>".$row[0]." (".$wiek.")</h4> <br>";
                                echo "<p>hobby: ".$row[3]."</p>";
                                echo "<h1><img src='icon-on.png' alt=''> ".$row[2]."</h1>";
                                echo "<a href='dane.html'><input type='submit' value='Więcej informacji'></a>";
                            }

                        }else{
                            print("hasło nieprawidłowe");
                        }
                        
                    }else{
                        print("login nie istnieje");
                    }

                }

                mysqli_close($polaczenie);
            ?>
        </section>
    </main>
    <footer>
        Stronę wykonał: 00000000000
    </footer>
</body>
</html>