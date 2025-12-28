<?php
    if(isset($_POST['numerZespolu'])){
        $polaczenie = mysqli_connect('localhost', 'root', '', 'ratownictwo') or die("Błąd połączenia z bazą");
        $numerZespolu = $_POST['numerZespolu'];
        $numerDys = $_POST['numerDys'];
        $adres = $_POST['adres'];

        $sql = "INSERT INTO `zgloszenia`(`ratownicy_id`, `dyspozytorzy_id`, `adres`, `pilne`, `czas_zgloszenia`) VALUES ('$numerZespolu','$numerDys','$adres',0,CURTIME());";
        $result = mysqli_query($polaczenie, $sql);
        
        mysqli_close($polaczenie);
    }


?>