<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komis aut</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header id="baner">
        <h1><em>KupAuto!</em> Internetowy Komis Samochodowy</h1>
        
    </header>
    <section id="blok1">
        <?php
            //skrypt1
            $con = mysqli_connect('localhost', 'root', '', 'kupauto') or die("error");
            $sql1 = "SELECT model, rocznik, przebieg, paliwo, cena, zdjecie FROM samochody WHERE id = 10;";
            $result1 = mysqli_query($con, $sql1);
            while($row = mysqli_fetch_assoc($result1)){
                echo '<img src="'.$row['zdjecie'].'" alt="oferta dnia" id="img1" >';
                echo '<h4>Oferta Dnia: Toyota '.$row['model'].'</h4>';
                echo '<p>Rocznik: '.$row['rocznik'].', przebieg: '.$row['przebieg'].', rodzaj paliwa: '.$row['paliwo'].'</p>';
                echo '<h4>Cena: '.$row['cena'].'</h4>';
            }
        ?>

    </section>
    <section>
        <h2>Oferty Wyróżnione</h2>
        <?php
        
            //skrypt2
            $sql2 = "SELECT marki.nazwa, samochody.model, samochody.rocznik,
            samochody.cena, samochody.zdjecie FROM marki
            INNER JOIN samochody
            ON marki.id = samochody.marki_id WHERE wyrozniony = 1 LIMIT 4;";
            $result2 = mysqli_query($con, $sql2);
            while($row = mysqli_fetch_assoc($result2)){
                
                echo '<section class="blok2">';
                echo '<img src="'.$row['zdjecie'].'" alt="'.$row['model'].'">';
                echo '<h4>'.$row['marka'].' '.$row['model'].'</h4>';
                echo '<p>Rocznik: '.$row['rocznik'].'</p>';
                echo '<h4>Cena: '.$row['cena'].'</h4>';
                echo '</section>';
            }
        ?>       
    </section>
    <section id="blok3main">
        <h2>Wybierz markę</h2>
        <form action="KupAuto.php" method="POST">           
            <select name="lista" id="lista">
                <?php
                    //skrypt3
                    $sql3 = "SELECT nazwa FROM marki;";
                    $result3 = mysqli_query($con, $sql3);
                    while($row = mysqli_fetch_assoc($result3)){
                        echo '<option value="'.$row['nazwa'].'">'.$row['nazwa'].'</option>';
                    }
                ?>
            </select>
            <input type="submit" Value="Wyszukaj" name>           
        </form>
            <?php
                    //skrypt4
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    if(isset($_POST['lista'])){
                        $wybrany = $_POST['lista'];
                        $sql4 = "SELECT samochody.model, samochody.cena, samochody.zdjecie FROM samochody INNER JOIN marki ON samochody.marki_id = marki.id WHERE marki.nazwa = '$wybrany'; ";
                        $result4 = mysqli_query($con, $sql4);
                        while($row = mysqli_fetch_assoc($result4)){
                            echo '<section class="blok3">';
                            echo '<img src="'.$row['zdjecie'].'" alt="'.$row['model'].'">';
                            echo '<h4>'.$wybrany.' '.$row['model'].'</h4>';
                            echo '<h4>Cena: '.$row['cena'].'</h4>';
                            echo '</section>';
                        }
                    }                   
                }
                mysqli_close($con);
            ?>
    </section>
    <footer>
        <p>Stronę wykonał: 00000000</p>
        <p><a href=" http://firmy.pl/komis">Znajdź nas także</a></p>
    </footer>
</body>
</html>