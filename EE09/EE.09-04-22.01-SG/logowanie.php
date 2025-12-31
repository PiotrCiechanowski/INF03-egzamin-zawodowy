<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <header class="baner">
        <h1>Forum wielbicieli psów</h1>
    </header>
    <aside class="lewy"> 
        <img src="obraz.jpg" alt="foksterier">
    </aside>
    <nav class="prawy1">
        <h2>Zapisz się</h2>
        <form action="logowanie.php" method="post">
            <label for="login">login: </label> <input type="text" name="login" id="login"> <br>
            <label for="haslo">hasło: </label> <input type="password" name="haslo" id="haslo"> <br>
            <label for="haslo2">powtórz hasło: </label> <input type="password" name="haslo2" id="haslo2"> <br>
            <input type="submit" value="Zapisz">
        </form>
        <?php
            //skrypt1
            $polaczenie = mysqli_connect('localhost', 'root', '', 'psy') or die("Blad polaczenia z baza");

            if((empty($_POST['login'])) || (empty($_POST['haslo'])) || (empty($_POST['haslo2']))){
                echo "wypełnij wszystkie pola";
                
            }else {
                $login = $_POST['login'];
                $sql1 = "SELECT login FROM `uzytkownicy`;";
                $result1 = mysqli_query($polaczenie, $sql1);
                while($row = mysqli_fetch_row($result1)){
                    for($i = 0; $i < 100; $i++){
                        if($row[$i] == $login){
                            echo "login występuje w bazie danych, konto nie zostało dodane";
                        }
                    }
                    
                }
                $haslo1 = $_POST['haslo'];
                $haslo2 = $_POST['haslo2'];
                if($haslo1 !== $haslo2){
                    echo "hasła nie są takie same, konto nie zostało dodane";
                }

                $hasloZaszyfrowane = sha1($haslo1);
                if(isset($hasloZaszyfrowane)){
                    $sql2 = "INSERT INTO `uzytkownicy`(`login`, `haslo`) VALUES ('$login','$hasloZaszyfrowane');";
                    $result2 = mysqli_query($polaczenie, $sql2);
                    echo "Konto zostało dodane";
                }
            }

            mysqli_close($polaczenie);
        ?>
    </nav>
    <main class="prawy2">
        <h2>Zapraszamy wszystkich</h2>
        <ol>
            <li>właścicieli psów</li>
            <li>weterynarzy</li>
            <li>tych, co chcą kupić psa</li>
            <li>tych, co lubią psy</li>
        </ol>
        <a href="regulamin.html">Przeczytaj regulamin forum</a>
    </main>
    <footer>
        Stronę wykonał: 00000000000
    </footer>
</body>
</html>