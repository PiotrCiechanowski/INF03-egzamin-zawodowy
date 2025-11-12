<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka miejska</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <?php
        $con = mysqli_connect('localhost', 'root', '', 'biblioteka') or die("error");
        $numer_zdajacego = "00000000000"; 
    ?>

    <header>
        <?php
            for($i=1; $i<=20; $i++){
                echo "<img src='obraz.png' alt='obraz'>";
            };
        ?>
    </header>
    
    <section id="s1">
        <h2>Liryka</h2>
        <form action="biblioteka.php" method="post">
            <select name="liryka" id="liryka">
                <?php
                    // Skrypt 2 
                    $sql1 = "SELECT id, tytul FROM ksiazka WHERE gatunek = 'liryka'; ";
                    $result1 = mysqli_query($con, $sql1);
                    while($row = mysqli_fetch_assoc($result1)){
                        echo "<option value='".$row['id']."'>".$row['tytul']."</option>";
                    }
                ?>
            </select>
            <input type="submit" value="Rezerwuj">
        </form>
        <?php
            // Skrypt 3 
            if (isset($_POST['liryka'])) {
                $ksiazka_id = $_POST['liryka'];
                
                $sql_tytul = "SELECT tytul FROM ksiazka WHERE id = '$ksiazka_id';";
                $result_tytul = mysqli_query($con, $sql_tytul);
                
                if ($row = mysqli_fetch_assoc($result_tytul)){
                    echo "<p>Książka ".$row['tytul']." została zarezerwowana</p>";
                    
                    $sql_update = "UPDATE ksiazka SET rezerwacja = 1 WHERE id = '$ksiazka_id';";
                    mysqli_query($con, $sql_update);
                }
            }
        ?>
    </section>
    
    <section id="s1">
        <h2>Epika</h2>
        <form action="biblioteka.php" method="post">
            <select name="epika" id="epika">
                <?php
                    // Skrypt 2 
                    $sql2 = "SELECT id, tytul FROM ksiazka WHERE gatunek = 'epika'; ";
                    $result2 = mysqli_query($con, $sql2);
                    while($row = mysqli_fetch_assoc($result2)){
                        echo "<option value='".$row['id']."'>".$row['tytul']."</option>";
                    }
                ?>
            </select>
            <input type="submit" value="Rezerwuj">
        </form>
        <?php
            // Skrypt 3 
            if (isset($_POST['epika'])) {
                $ksiazka_id = $_POST['epika'];
                
                $sql_tytul = "SELECT tytul FROM ksiazka WHERE id = '$ksiazka_id';";
                $result_tytul = mysqli_query($con, $sql_tytul);
                
                if ($row = mysqli_fetch_assoc($result_tytul)){
                    echo "<p>Książka ".$row['tytul']." została zarezerwowana</p>";
                    
                    $sql_update = "UPDATE ksiazka SET rezerwacja = 1 WHERE id = '$ksiazka_id';";
                    mysqli_query($con, $sql_update);
                }
            }
        ?>
    </section>
    
    <section id="s1">
        <h2>Dramat</h2>
        <form action="biblioteka.php" method="post">
            <select name="dramat" id="dramat">
                <?php
                    // Skrypt 2 
                    $sql3 = "SELECT id, tytul FROM ksiazka WHERE gatunek = 'dramat'; ";
                    $result3 = mysqli_query($con, $sql3);
                    while($row = mysqli_fetch_assoc($result3)){
                        echo "<option value='".$row['id']."'>".$row['tytul']."</option>";
                    }
                ?>
            </select>
            <input type="submit" value="Rezerwuj">
        </form>
        <?php
            // Skrypt 3 
            if (isset($_POST['dramat'])) {
                $ksiazka_id = $_POST['dramat'];
                
                $sql_tytul = "SELECT tytul FROM ksiazka WHERE id = '$ksiazka_id';";
                $result_tytul = mysqli_query($con, $sql_tytul);
                
                if ($row = mysqli_fetch_assoc($result_tytul)){
                    echo "<p>Książka ".$row['tytul']." została zarezerwowana</p>";
                    
                    $sql_update = "UPDATE ksiazka SET rezerwacja = 1 WHERE id = '$ksiazka_id';";
                    mysqli_query($con, $sql_update);
                }
            }
        ?>
    </section>
    
    <section id="s1">
        <h2>Zaległe książki</h2>
        <ul>
            <?php
                // Skrypt 4 
                $sql6 = "SELECT ksiazka.tytul, wypozyczenia.id_cz, wypozyczenia.data_odd FROM ksiazka JOIN wypozyczenia ON ksiazka.id = wypozyczenia.id_ks ORDER BY wypozyczenia.data_odd LIMIT 15;";
                $result6 = mysqli_query($con, $sql6);
                while($row = mysqli_fetch_assoc($result6)){
                    echo "<li>".$row['tytul']." ".$row['id_cz']." ".$row['data_odd']."</li>";
                }

                mysqli_close($con); 
            ?>
        </ul>
    </section>
    
    <footer>
        <p><strong>Autor: <?php echo $numer_zdajacego; ?></strong></p>
    </footer>
</body>
</html>