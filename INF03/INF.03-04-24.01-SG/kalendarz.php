<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DoZadania na lipieccument</title>
    <link rel="stylesheet" href="styl6.css">
</head>
<body>
    <header>
        <section class="blokBanera1">
            <img src="logo1.png" alt="lipiec">
        </section>
        <section class="blokBanera2">
            <h1>TERMINARZ</h1>
            <p>najbliższe zadania:
            <?php
                //skrypt 1
                $con = mysqli_connect('localhost', 'root', '', 'terminarz') or die ("error 404");

                $sql1 = "SELECT DISTINCT wpis FROM zadania WHERE dataZadania BETWEEN '2020-07-01' AND '2020-07-07' AND wpis IS NOT NULL AND wpis <> '';";
                $result1 = mysqli_query($con, $sql1);
                while($row = mysqli_fetch_assoc($result1)){
                    echo $row['wpis']."; ";
                }
            ?>
            </p>
        </section>
    </header>
    <main>
        
        <?php
                //skrypt 2
                $result2 = mysqli_query($con, $sql2 = "SELECT dataZadania, wpis FROM zadania WHERE miesiac = 'lipiec';");
                while($row = mysqli_fetch_assoc($result2)){
                    echo "<article>";
                    echo "<h6>".$row['dataZadania']."</h6>";
                    echo "<p>".$row['wpis']."</p>";
                    echo "</article>";
                }
                mysqli_close($con);
        ?>
    </main>
    <footer>
        <a href="sierpien.html">Terminarz na sierpień</a>
        <p>Stronę wykonał: 0000000</p>
    </footer>
</body>
</html>