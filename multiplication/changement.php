<?php
// Pour la valeur a et b
    $n = $_GET["n"];

    $tableau_indice_a = unserialize(urldecode($_GET['tableauIndiceA']));
    for($i=1;$i<=$n;$i++)
    {
        $tableau_a[$i]= intval($tableau_indice_a[$i]);
    }

    
    $tableau_indice_b = unserialize(urldecode($_GET['tableauIndiceB']));
    for($i=1;$i<=$n;$i++)
    {
        $tableau_b[$i]= intval($tableau_indice_b[$i]);
    }
    
    $indice = $_GET["indice"];
?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Changement d'une valeur</title>
        <link rel="stylesheet" href="http://www.multiplication.mg/styles.css">
    </head>
    <body>
        <div class="container_formulaire">
            <div class="formulaire">
                <h1>Changement des données</h1>
                <form action="http://www.multiplication.mg/multiplication.php" method="GET" >
                    <div class="entrer">
                        <input type="hidden" name="b" value="<?php echo $_GET["b"]; ?>" />
                        <input type="hidden" name="n" value="<?php echo $n; ?>" />
                        <input type="hidden" name="tableauIndiceA" value="<?php echo $_GET['tableauIndiceA']; ?>" />
                        <input type="hidden" name="tableauIndiceB" value="<?php echo $_GET['tableauIndiceB']; ?>" />
                        <input type="hidden" name="r" value="<?php echo $_GET['r']; ?>" />
                        <input type="hidden" name="tableau" value="<?php echo $_GET['tableau']; ?>" />
                        <label for="a"></label><input type="number" name="A" id="a" value="<?php echo $tableau_a[$indice]; ?>" />
                        <label for="b"> X </label><input type="number" name="B" id="b" value="<?php echo $tableau_b[$indice]; ?>" /><br>
                        <input type="hidden" name="C" value="<?php echo $indice; ?>" />
                    </div>
                    <input type="submit" value="Changer" class="changer" />
                </form>
            </div>
        </div>
    </body>
</html>