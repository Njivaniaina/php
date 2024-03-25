<?php 
    $input = $_POST["input"];
    $command_input = "sudo iptables -P INPUT " . $input;
    exec($command_input);

    $forward = $_POST["forward"];
    $command_forward = "sudo iptables -P FORWARD " . $forward;
    exec($command_forward);

    $output = $_POST["output"];
    $command_output = "sudo iptables -P OUTPUT " . $output;
    exec($command_output);

    header("location:http://www.iptables.mg/policy.php");
?>