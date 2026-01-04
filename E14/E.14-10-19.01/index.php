<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odżywianie zwierząt</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <header class="baner"> 
        <h2>DRAPIEŻNIKI I INNE</h2>
    </header>
    <section class="blok_formularza">
        <h3>Wybierz styl życia:</h3>
        <form action="index.php" method="post">
            <select name="lista" id="lista">
                <option value="Drapiezniki">Drapieżniki</option>
                <option value="Roslinozerne">Roślinożerne</option>
                <option value="Padlinozerne">Padlinożerne</option>
                <option value="Wszystkozerne">Wszystkożerne</option>
            </select>
            <input type="submit" value="Zobacz">
        </form>
    </section>
    <aside class="lewy">
        <h3>Lista zwierząt</h3>
        <?php
            //skrypt1
            $polaczenie = mysqli_connect('localhost', 'root', '', 'baza') or die("Błąd połączenia z bazą danych");
            $sql1 = "SELECT zwierzeta.gatunek, odzywianie.rodzaj FROM zwierzeta JOIN odzywianie ON zwierzeta.Odzywianie_id = odzywianie.id;";
            $result1 = mysqli_query($polaczenie, $sql1);
            
            echo "<ul>";
            while($row = mysqli_fetch_row($result1)){
                echo "<li>".$row[0]." -> ".$row[1]."</li>";
            }
            echo "</ul>";


        ?>
    </aside>
    <main class="srodkowy">
        
        <?php
            //skrypt2
            if(isset($_POST['lista'])){
                $wybor = $_POST['lista'];
                if($wybor == 'Drapiezniki'){
                    echo "<h3>Drapieżniki</h3>";
                    $wybor = 1;
                }else if($wybor == 'Roslinozerne'){
                    echo "<h3>Roślinożerne</h3>";
                    $wybor = 2;
                }else if($wybor == 'Padlinozerne'){
                    echo "<h3>Padlinożerne</h3>";
                    $wybor = 3;
                }else if($wybor == 'Wszystkozerne'){
                    echo "<h3>Wszystkożerne</h3>";
                    $wybor = 4;
                }
                $sql2 = "SELECT id, gatunek, wystepowanie FROM `zwierzeta` WHERE Odzywianie_id = '$wybor';";
                $result2 = mysqli_query($polaczenie, $sql2);
                while($row = mysqli_fetch_row($result2)){
                    echo $row[0].". ".$row[1].", ".$row[2]."<br>";
                }

            }



            mysqli_close($polaczenie);
        ?>
    </main>
    <article class="prawy">
        <img src="drapieznik.jpg" alt="Wilki">
    </article>
    <footer>
        <a href="pl.wikipedia.org">Poczytaj o zwierzętach na Wikipedii</a>
        autor strony: 00000000000
    </footer>
</body>
</html>