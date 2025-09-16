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
        <form action="zamow.php" method="post">
            Model:
            <select name="Model" id="Model" class="kontrolki">
                <?php
                    $con = mysqli_connect('localhost', 'root', '', 'obuwie') or die("error");
                    $sql = "SELECT model FROM produkt;";
                    $result = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<option value='".$row['model']."'>".$row['model']."</option>";
                    }
                ?>
            </select>
            Rozmiar: 
            <select name="Rozmiar" id="Rozmiar" class="kontrolki">
                <option value="40">40</option>
                <option value="41">41</option>
                <option value="42">42</option>
                <option value="42">42</option>
                <option value="43">43</option>
            </select>
            Liczba par: 
            <input type="number" id="pary" name="pary" class="kontrolki">
            <input type="submit" value="Zamów" class="kontrolki">
        </form>
        
        <?php
            
            $sql2 = "SELECT buty.model, buty.nazwa, buty.cena, produkt.nazwa_pliku FROM buty JOIN  produkt ON buty.model = produkt.model; ";
            $result2 = mysqli_query($con, $sql2);
            while($row = mysqli_fetch_assoc($result2)){
                echo "<section class='buty'>";
                echo "<img src='".$row['nazwa_pliku']."' alt='but męski'>";
                echo "<h2>".$row['nazwa']."</h2>";
                echo "<h5>Model: ".$row['model']."</h5>";
                echo "<h4>Cena: ".$row['cena']."</h4>";
                echo "</section>";
            }
            mysqli_close($con);
            ?>
    </main>
    <footer>
        <p>Autor strony: 0000000</p>
    </footer>
</body>
</html>