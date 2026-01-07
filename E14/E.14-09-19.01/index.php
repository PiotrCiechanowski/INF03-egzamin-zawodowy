<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dane o zwierzętach</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <header class="baner">
        <h2>ATLAS ZWIERZĄT</h2>
    </header>
    <nav class="formularz">
        <h2>Gromady</h2>
        <ol>
            <li>Ryby</li>
            <li>Płazy</li>
            <li>Gady</li>
            <li>Ptaki</li>
            <li>Ssaki</li>
        </ol>
        <form action="index.php" method="post">
            <label for="gromada">Wybierz gromadę: </label>
            <input type="number" name="gromada" id="gromada">
            <input type="submit" value="Wyświetl">
        </form>
    </nav>
    <aside class="glowny_lewy">
        <img src="zwierzeta.jpg" alt="dzikie zwierzęta">
    </aside>
    
    <main class="glowny_srodkowy">
        <?php
            //skrypt1
            $polaczenie = mysqli_connect('localhost', 'root', '', 'baza') or die("Błąd połaczenia z bazą danych");
            if(isset($_POST['gromada'])){
                $numer = $_POST['gromada'];
                if($numer == 1){
                    echo "<h2>RYBY</h2>";
                }else if($numer == 2){
                    echo "<h2>PŁAZY</h2>";
                }else if($numer == 3){
                    echo "<h2>GADY</h2>";
                }else if($numer == 4){
                    echo "<h2>PTAKI</h2>";
                }else if($numer == 5){
                    echo "<h2>SSAKI</h2>";
                }
                $sql1 = "SELECT gatunek, wystepowanie FROM `zwierzeta` WHERE Gromady_id = '$numer';";
                $result1 = mysqli_query($polaczenie, $sql1);
                while($row = mysqli_fetch_row($result1)){
                    echo $row[0].", ".$row[1]."<br>";
                }
            }


        ?>
    </main>
    <article class="glowny_prawy">
        <h2>Wszystkie zwierzęta w bazie</h2>
        <?php
            //skrypt2
            $sql2 = "SELECT zwierzeta.id, zwierzeta.gatunek, gromady.nazwa FROM zwierzeta JOIN gromady ON zwierzeta.Gromady_id = gromady.id;";
            $result2 = mysqli_query($polaczenie, $sql2);
            while($row = mysqli_fetch_row($result2)){
                echo $row[0].". ".$row[1].", ".$row[2]."<br>";
            }


            mysqli_close($polaczenie);
        ?>
    </article>
    <footer>
        <a href="atlas-zwierzat.pl" target="_blank">Poznaj inne strony o zwierzętach</a>
        autor Atlasu zwierząt: 00000000000
    </footer>
</body>
</html>