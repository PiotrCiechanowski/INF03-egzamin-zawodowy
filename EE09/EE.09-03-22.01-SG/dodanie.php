<?php
    if(isset($_POST['numerKaretki']) || isset($_POST['ratownik1']) || isset($_POST['ratownik2']) || isset($_POST['ratownik3'])){
        $polaczenie = mysqli_connect('localhost', 'root', '', 'ee09') or die("Błąd połączenia z bazą danych");

        $numerKaretki = $_POST['numerKaretki'];
        $ratownik1 = $_POST['ratownik1'];
        $ratownik2 = $_POST['ratownik2'];
        $ratownik3 = $_POST['ratownik3'];
        
        $sql1 = "INSERT INTO `ratownicy`(`nrKaretki`, `ratownik1`, `ratownik2`, `ratownik3`) VALUES ('$numerKaretki','$ratownik1','$ratownik2','$ratownik3');";
        $result1 = mysqli_query($polaczenie, $sql1);
        echo "Do bazy zostało wysłane zapytanie: ".$sql1;
        
        mysqli_close($polaczenie);
    }
    

?>