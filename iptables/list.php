<?php 
    require_once("./get_table.php");

    session_start();
   
    do_table_csv();
    $rules = get_table_csv();
    $_SESSION["rules"] = $rules;

    $chain = $rules["chain"];
    $rule = $rules["rules"];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://www.iptables.mg/list.css">
    <title>Tables des règles</title>
</head>
<body>
    <header>
        <a href="" class="title">FIRE WALL</a>
        <div class="navigator">
            <div class="navigator-items">
                <a href="http://www.iptables.mg/index.html">Home</a>
                <a href="http://www.iptables.mg/list.html">List</a>
                <a href="http://www.iptables.mg/formulaire_add.php">Add</a>
                <a href="http://www.iptables.mg/policy.php">Policy</a>
            </div>
        </div>
    </header>

    <div class="content">
        <div class="content-item">
            <h1>List of the rules</h1>
            <div class="element">
                <?php foreach($chain as $c): ?>
                    <h2><?php echo $c[0]; ?></h2>
                    <table class="tab" >
                        <tr class="title_line">
                            <td class="target_tab">Target</td>
                            <td class="protocole_tab">Protocole</td>
                            <td class="opt_tab">Opt</td>
                            <td class="source_tab">Source</td>
                            <td class="destination_tab">Destination</td>
                            <td class="descritpiton_tab">Descripition</td>
                            <td class="supprimer_tab">Suppression</td>
                        </tr>
                        <?php foreach($rule[$c[0]] as $k => $r): ?>
                            <tr class=<?php if($k%2==0) echo "pair";else echo "impair"; ?> >
                                <td class="target_tab"><?php echo $r[0];?></td>
                                <td class="protocole_tab"><?php echo $r[1];?></td>
                                <td class="opt_tab"><?php echo $r[2];?></td>
                                <td class="source_tab"><?php echo $r[3];?></td>
                                <td class="destination_tab"><?php echo $r[4];?></td>
                                <td class="descriptiton_tab"><?php if(isset($r[5])) echo $r[5]; else echo ""; ?></td>
                                <td class="supprimer_tab"><a href=<?php echo "http://www.iptables.mg/delete.php?delete=$c[0]&line=$k"; ?>><button>Supprimer</button></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endforeach; ?>
        </div>
    </div>

</body>
</html>