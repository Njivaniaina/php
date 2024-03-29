<?php 
    require_once("./get_interface.php");

    do_interface_csv();
    $interface = get_interface_csv();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://www.iptables.mg/formulaire_add.css">
    <title>Tables des règles</title>
</head>
<body>
    <header>
        <a href="" class="title">FIRE WALL</a>
        <div class="navigator">
            <div class="navigator-items">
                <a href="http://www.iptables.mg/index.html">Home</a>
                <a href="http://www.iptables.mg/list.php">List</a>
                <a href="http://www.iptables.mg/formulaire_add.php">Add</a>
                <a href="http://www.iptables.mg/policy.php">Policy</a>
            </div>
        </div>
    </header>

    <div class="content">
        <div class="content-item">
            <h1>Add one rules</h1>
            <div class="formulaire">
                <form action="http://www.iptables.mg/add.php" method="post">
                    <label for="chain" class="subhead">Chain</label><br>
                    <select name="chain" id="chain">
                        <option value="INPUT">INPUT</option>
                        <option value="OUTPUT">OUTPUT</option>
                        <option value="FORWARD">FORWARD</option>
                    </select><br>

                    <label for="target" class="subhead">Target</label><br>
                    <select name="target" id="target">
                        <option value="ACCEPT">ACCEPT</option>
                        <option value="DROP">DROP</option>
                        <option value="REJECT">REJECT</option>
                    </select><br>

                    <input type="checkbox" name="protocole" id="check_protocole" class="checkbox" /><label for="check_protocole">Protocole</label><br>
                    <div class="protocole">
                        <select name="prot" id="prot">
                            <option value="tcp">tcp</option>
                            <option value="udp">udp</option>
                            <option value="ucmp">ucmp</option>
                        </select>
                    </div>

                    <input type="checkbox" name="port" id="check_port" class="checkbox"/><label for="check_port">Port</label><br>
                    <div class="port">
                        <input type="text" name="p" id="p" class="input" placeholder="80,443..."/>
                    </div>

                    <input type="checkbox" name="check_mac" id="check_mac" class="checkbox"/><label for="check_mac">Mac</label><br>
                    <div class="mac">
                        <input type="text" name="mac" id="mac" class="input" placeholder="xx:xx:xx:xx:xx:xx"/><br>
                    </div>

                    <input type="checkbox" name="check_source" id="check_source" class="checkbox"/><label for="check_source">Source</label><br>
                    <div class="source">
                        <input type="text" name="source" class="input" placeholder="www.google.com ou X.X.X.X(IP)"/><br>
                    </div>

                    <input type="checkbox" name="check_destination" id="check_destination" class="checkbox"/><label for="check_destination">Déstionation</label><br>
                    <div class="destination">
                        <input type="text" name="destination" class="input" placeholder="www.google.com ou X.X.X.X(IP)"/><br>
                    </div>

                    <input type="checkbox" name="check_interface_source" id="check_interface_source" class="checkbox"/><label for="check_interface_source">Interface Source</label><br>
                    <div class="interface_source">
                        <select name="interface_source" id="interface_source">
                            <?php foreach($interface as $line): ?>
                                <?php if($line[1] !== "DOWN"):?>
                                    <option value=<?php echo $line[0];?>><?php echo $line[0];?></option>
                                <?php endif;?>
                            <?php endforeach;?>
                        </select><br>
                    </div>

                    <input type="checkbox" name="check_interface_destination" id="check_interface_destination" class="checkbox"/><label for="check_interface_destination">Interface Déstination</label><br>
                    <div class="interface_destination">
                        <select name="interface_destination" id="interface_destination">
                            <?php foreach($interface as $line): ?>
                                <?php if($line[1] !== "DOWN"):?>
                                    <option value=<?php echo $line[0];?>><?php echo $line[0];?></option>
                                <?php endif;?>
                            <?php endforeach;?>
                        </select><br>
                    </div>

                    <input type="submit" value="Add" class="button_add"/>
                </form>
            </div>
        </div>
    </div>

    <script>
        const check_protocole = document.querySelector("#check_protocole");
        const protocole= document.querySelector(".protocole");
        check_protocole.addEventListener("change", ()=>{
            check_protocole.checked ? (protocole.style.display="block"):(protocole.style.display="none")
        });

        const check_port = document.querySelector("#check_port");
        const port = document.querySelector(".port");
        check_port.addEventListener("change", ()=>{
            check_port.checked ? (port.style.display="block"):(port.style.display="none")
        });

        const check_mac = document.querySelector("#check_mac");
        const mac = document.querySelector(".mac");
        check_mac.addEventListener("change", ()=>{
            check_mac.checked ? (mac.style.display="block"):(mac.style.display="none")
        });

        const check_source = document.querySelector("#check_source");
        const source = document.querySelector(".source");
        check_source.addEventListener("change", ()=>{
            check_source.checked ? (source.style.display="block"):(source.style.display="none")
        });

        const check_destination = document.querySelector("#check_destination");
        const destination = document.querySelector(".destination");
        check_destination.addEventListener("change", ()=>{
            check_destination.checked ? (destination.style.display="block"):(destination.style.display="none")
        });

        const check_interface_source = document.querySelector("#check_interface_source");
        const interface_source = document.querySelector(".interface_source");
        check_interface_source.addEventListener("change", ()=>{
            check_interface_source.checked ? (interface_source.style.display="block"):(interface_source.style.display="none")
        });

        const check_interface_destination = document.querySelector("#check_interface_destination");
        const interface_destination = document.querySelector(".interface_destination");
        check_interface_destination.addEventListener("change", ()=>{
            check_interface_destination.checked ? (interface_destination.style.display="block"):(interface_destination.style.display="none")
        });

    </script>

</body>
</html>