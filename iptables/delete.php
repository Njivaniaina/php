<?php 
    session_start();
    $chain = $_GET["delete"];
    $numero = $_GET["line"]+1;

    $command = "sudo iptables -D " . $chain . " " . $numero;
    exec($command);

    session_destroy();
    header("location:http://www.iptables.mg/list.php");
?>