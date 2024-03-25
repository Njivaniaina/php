<?php 
    $command = "sudo iptables -A ";

    $chain = $_POST["chain"];
    if(isset($chain))
        $command = $command . $chain . " ";

    $target = $_POST["target"];
    if(isset($target))
        $command = $command  . "-j " . $target . " ";

    $protocole = $_POST["protocole"];
    if(isset($protocole))
    {
        $p = $_POST["prot"];
        if(isset($p))
            $command = $command  . "-p " . $p . " ";
    }

    $port = $_POST["port"];
    if(isset($port))
    {
        $po = $_POST["p"];
        if(isset($po))
            $command = $command  . "-m multiport --ports " . $po . " ";
    }

    $check_mac = $_POST["check_mac"];
    if(isset($check_mac))
    {
        $mac = $_POST["mac"];
        if(isset($mac))
            $command = $command  . "-m mac --source-mac " . $mac . " ";
    }

    $check_source = $_POST["check_source"];
    if(isset($check_source))
    {
        $source = $_POST["source"];
        if(isset($source))
            $command = $command  . "-s " . $source . " ";
    }

    $check_destination = $_POST["check_destination"];
    if(isset($check_destination))
    {
        $destination = $_POST["destination"];
        if(isset($destination))
            $command = $command  . "-d " . $destination . " ";
    }

    $check_interface_source = $_POST["check_interface_source"];
    if(isset($check_interface_source))
    {
        $interface_source = $_POST["interface_source"];
        if(isset($interface_source))
            $command = $command  . "-i " . $interface_source . " ";
    }

    $check_interface_destination = $_POST["check_interface_destination"];
    if(isset($check_interface_destination))
    {
        $interface_destination = $_POST["interface_destination"];
        if(isset($interface_destination))
            $command = $command  . "-o " . $interface_destination . " ";
    }

    exec($command);
    header("location:http://www.iptables.mg/list.php");
?>