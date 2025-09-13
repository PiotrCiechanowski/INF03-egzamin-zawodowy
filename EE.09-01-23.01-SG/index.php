<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sekretariat</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <section id="lewy">
        <h1>Akta Pracownicze</h1>
        <?php
            $con = mysqli_connect('localhost', 'root', '', 'firma') or die("blad");
            $sql = "SELECT imie, nazwisko, adres, miasto, czyRODO, czyBadania FROM pracownicy WHERE id LIKE '2';";
            $result = mysqli_query($con, $sql);
            while($row = mysqli_fetch_assoc($result)){
                echo '<h3>dane</h3>';
                echo '<p>'.$row['imie'].$row['nazwisko'].'</p>';
                echo '<hr>';
                echo '<h3>adres</h3>';
                echo '<p>'.$row['adres'].'</p>';
                echo '<p>'.$row['miasto'].'</p>';
                echo '<hr>';
                if($row['czyRodo']=='0'){
                    echo '<p>RODO: niepodpisano</p>';
                }else{
                    echo '<p>RODO: podpisano</p>';
                }
                if($row['czyBadania']=='1'){
                    echo '<p>Badania: aktualne</p>';
                }else{
                    echo '<p>Badania: nieaktualne</p>';
                }
            }
            
        ?>
        <hr>
        <h3>Dokumenty pracownika</h3>
        <a href="cv.txt" dowload>Pobierz</a>
        <h1>Liczba zatrudnionych pracowników</h1>
        <p>
        <?php
            $sql2 = "SELECT COUNT(id) FROM pracownicy;";
            $result2 = mysqli_query($con, $sql2);
            while($row = mysqli_fetch_assoc($result2)){
                echo $row['COUNT(id)'];
            }
        ?>
        </p>
    </section>
    <section id="prawy">
        <?php
            $sql3 = "SELECT id, imie, nazwisko FROM pracownicy WHERE id LIKE '2';";
            $result3 = mysqli_query($con, $sql3);
            while($row = mysqli_fetch_assoc($result3)){
                echo '<img src="'.$row['id'].'.jpg'.'" alt="pracownik">';
                echo '<h2>'.$row['imie'].' '.$row['nazwisko'].'</h2>';
            }
            $sql4 = "SELECT pracownicy.id, stanowiska.nazwa, stanowiska.opis FROM pracownicy INNER JOIN stanowiska ON pracownicy.stanowiska_id = stanowiska.id WHERE pracownicy.id = 2;";
            $result4 = mysqli_query($con, $sql4);
            while($row = mysqli_fetch_assoc($result4)){
                echo '<h4>'.$row['nazwa'].'</h4>';
                echo '<h5>'.$row['opis'].'</h5>';
            }
            mysqli_close($con);
        ?>
    </section>
    <footer>
        Autorem aplikacji jest: XXXX
        <ul>
            <li>skontaktuj się</li>
            <li>poznaj naszą firmę</li>
        </ul>
    </footer>
</body>
</html>