<?php
    $polaczenie = mysqli_connect('localhost', 'root', '', 'wedkarstwo') or die("blad polaczenia");
    $lowisko = $_POST['lowisko'];
    $data = $_POST['data'];
    $sedzia = $_POST['sedzia'];


    $sql1 = "INSERT INTO `zawody_wedkarskie`(`Karty_wedkarskie_id`, `Lowisko_id`, `data_zawodow`, `sedzia`) VALUES (0,'$lowisko','$data','$sedzia');";
    $result = mysqli_query($polaczenie, $sql1);


    mysqli_close($polaczenie);
?>