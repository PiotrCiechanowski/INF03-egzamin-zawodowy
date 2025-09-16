<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obuwie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Obuwie męskie</h1>
    </header>
    <main>
        <h2>Zamówienie</h2>
        <?php
            $con2 = mysqli_connect('localhost', 'root', '', 'obuwie') or die("error");

            $modelButa = $_POST['Model'];
            $rozmiarButa= $_POST['Rozmiar'];
            $liczbaPar = $_POST['pary'];
            
            $sql3 = "SELECT buty.nazwa, buty.cena, produkt.kolor, produkt.kod_produktu, produkt.material, produkt.nazwa_pliku FROM buty JOIN produkt ON buty.model = produkt.model WHERE produkt.model = '$modelButa';";

            $result3 = mysqli_query($con2, $sql3);
            $wartośćCałkowita = 0;
            while($row = mysqli_fetch_assoc($result3)){
                echo "<img src=".$row['nazwa_pliku']." alt='but męski'>";
                $wartośćCałkowita += $row['cena']*$liczbaPar;
                echo "<p>cena za $liczbaPar par: $wartośćCałkowita</p>";
                echo "<p>Szczegóły produktu: " . $row['kolor'] . ", " . $row['material'] . "</p>";
                echo "<p>Rozmiar: ".$row['kod_produktu']."</p>";
            }
            mysqli_close($con2);
        ?>
        <br><br>
        <a href="index.php">Strona główna</a>
    </main>
    <footer>
        <p>Autor strony: 0000000</p>
    </footer>
</body>
</html>