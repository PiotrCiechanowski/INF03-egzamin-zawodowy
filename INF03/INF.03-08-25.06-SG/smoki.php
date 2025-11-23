<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smoki</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h2>Poznaj smoki!</h2>
    </header>
    <nav>
        <section class="blok1" id="blok11">Baza</section>
        <section class="blok2" id="blok22">Opisy</section>
        <section class="blok3" id="blok33">Galeria</section>
    </nav>
    <main>
        <section class="sekcja1">
            <h3>Baza Smoków</h3>
            <form action="smoki.php" method="post">
                <select name="lista" id="lista">
                    
                    <?php
                        //skrypt1 option 
                        $con = mysqli_connect('localhost', 'root', '', 'smoki') or die("error");
                        $sql1 = "SELECT DISTINCT(pochodzenie) FROM smok ORDER BY pochodzenie ASC;";
                        $result1 = mysqli_query($con, $sql1);
                        while($row = mysqli_fetch_assoc($result1)){
                            echo "<option value='".$row['pochodzenie']."'>".$row['pochodzenie']."</option>";
                        }

                    ?>
                </select>
                <input type="submit" value="Szukaj">
            </form>
            <table>
                <tr>
                    <th>Nazwa</th>
                    <th>Długość</th>
                    <th>Szerokość</th>
                </tr>
                <?php
                    // skrypt 2
                    if(isset($_POST['lista'])){
                        $kraj = $_POST['lista'];
                        $sql2 = "SELECT nazwa, dlugosc, szerokosc FROM smok WHERE pochodzenie = '$kraj';";
                        $result2 = mysqli_query($con, $sql2);
                        while($row = mysqli_fetch_assoc($result2)){
                            echo "<tr>";
                            echo "<td>".$row['nazwa']."</td>";
                            echo "<td>".$row['dlugosc']."</td>";
                            echo "<td>".$row['szerokosc']."</td>";
                            echo "</tr>";
                        }

                    }

                    mysqli_close($con);
                ?>
            </table>
        </section>
        <section class="sekcja2">
            <h3>Opisy smoków</h3>
            <dl>
                <dt>Smok czerwony</dt>
                <dd>Pochodzi z Chin. Ma 1000 lat. Żywi się mniejszymi zwierzętami. Posiada łuski cenne na rynkach wschodnich do wyrabiania lekarstw. Jest dziki i groźny.</dd>

                <dt>Smok zielony</dt>
                <dd>Pochodzi z Bułgarii. Ma 10000 lat. Żywi się mniejszymi zwierzętami, ale tylko w kolorze zielonym. Jest kosmaty. Z sierści zgubionej przez niego, tka się najdroższe materiały.</dd>

                <dt>Smok niebieski </dt>
                <dd>Pochodzi z Francji. Ma 100 lat. Żywi się owocami morza. Jest natchnieniem dla najlepszych malarzy. Często im pozuje. Smok ten jest przyjacielem ludzi i czasami im pomaga. Jest jednak próżny i nie lubi się przepracowywać.</dd>
            </dl>
        </section>
        <section class="sekcja3">
            <h3>Galeria</h3>
            <img src="smok1.jpg" alt="Smok czerwony">
            <img src="smok2.jpg" alt="Smok wielki">
            <img src="smok3.jpg" alt="Skrzydlaty łaciaty">
        </section>
    </main>
    <footer>
        <p>Stronę opracował: 00000000</p>
    </footer>

    <script>
        document.getElementById('blok11').addEventListener("click", function(){
            document.getElementById('blok11').style.backgroundColor = 'MistyRose';
            document.getElementById('blok22').style.backgroundColor = '#FFAEA5';
            document.getElementById('blok33').style.backgroundColor = '#FFAEA5';   
            
            document.querySelector('.sekcja1').style.display = 'block';
            document.querySelector('.sekcja2').style.display = 'none';
            document.querySelector('.sekcja3').style.display = 'none';

        });
        document.getElementById('blok22').addEventListener("click", function(){
            document.getElementById('blok11').style.backgroundColor = '#FFAEA5';
            document.getElementById('blok22').style.backgroundColor = 'MistyRose';
            document.getElementById('blok33').style.backgroundColor = '#FFAEA5';

            document.querySelector('.sekcja1').style.display = 'none';
            document.querySelector('.sekcja2').style.display = 'block';
            document.querySelector('.sekcja3').style.display = 'none';
        });
        document.getElementById('blok33').addEventListener("click", function(){
            document.getElementById('blok11').style.backgroundColor = '#FFAEA5';
            document.getElementById('blok22').style.backgroundColor = '#FFAEA5';
            document.getElementById('blok33').style.backgroundColor = 'MistyRose';

            document.querySelector('.sekcja1').style.display = 'none';
            document.querySelector('.sekcja2').style.display = 'none';
            document.querySelector('.sekcja3').style.display = 'block';
        });
    </script>
</body>
</html>