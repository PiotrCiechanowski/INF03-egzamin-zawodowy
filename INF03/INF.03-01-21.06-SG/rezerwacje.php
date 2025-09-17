
<?php
    $date = $_POST['date'];
    $number = $_POST['number'];
    $text = $_POST['text'];
    $checkbox = $_POST['checkbox'];
    $con = mysqli_connect('localhost', 'root', '', 'baza') or die("error");
    $result = mysqli_query($con, "INSERT INTO rezerwacje (nr_stolika, data_rez, liczba_osob, telefon) VALUES (1, '$date', $number, '$text')");

    print "Dodano rezerwację do bazy";
    mysqli_close($con);
        
?>
