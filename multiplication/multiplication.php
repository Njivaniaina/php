<?php
// Pour la valeur a et b
    $b = $_GET["b"];
    $n = $_GET["n"];

    if(!empty($b) && !empty($n))
    {
    // Pour le tableau d'indice a
        $tableau_indice_a = unserialize(urldecode($_GET['tableauIndiceA']));
        if(empty($tableau_indice_a))
        {
            for($i=1;$i<=$n;$i++)
            {
                $tableau_a[$i]=$i;
            }
        }
        else
        {
            for($i=1;$i<=$n;$i++)
            {
                $tableau_a[$i]= intval($tableau_indice_a[$i]);
            }
        }

    // Pour le tableau d'indice b
        $tableau_indice_b = unserialize(urldecode($_GET['tableauIndiceB']));
        if(empty($tableau_indice_b))
        {
            for($i=1;$i<=$n;$i++)
            {
                $tableau_b[$i]=$b;
            }
        }
        else
        {
            for($i=1;$i<=$n;$i++)
            {
                $tableau_b[$i]= intval($tableau_indice_b[$i]);
            }
        }
        
    // Pour le resultat si il n'est déjà définie
        $r = unserialize(urldecode($_GET["r"]));
        if(empty($r))
        {
            for($i=1;$i<=$n;$i++)
            {
                $r_i[$i] = $tableau_a[$i]*$b;
            }
        }
        else
        {
            for($i=1;$i<=$n;$i++)
            {
                $r_i[$i]= intval($r[$i]);
            }
        }
        

    // Pour l'affichage s'il n'est encore définie
        $print = unserialize(urldecode($_GET["tableau"]));
        $indice = $_GET["indice"];
        if(empty($print))
        {   
            for($i=1;$i<=$n;$i++)
            {
                $print_i[$i] = 1;
            }
        }
        else
        {
            for($i=1;$i<=$n;$i++)
            {
                $print_i[$i] = intval($print[$i]);
            }
            $print_i[$indice] = 2;
            
        }
       
    // Pour le changement des variables
        $A = $_GET["A"];
        $B = $_GET["B"];
        $C = $_GET["C"];
        if(!empty($A) && !empty($B) && !empty($C))
        {
            $tableau_a[$C] = $A;
            $tableau_b[$C] = $B;
            $r_i[$C] = $A*$B;
        }

    // Compression des données utiliser
        $print_code = urlencode(serialize($print_i));
        $r_code = urlencode(serialize($r_i));
        $tableau_indice_b_code = urlencode(serialize($tableau_b));
        $tableau_indice_a_code = urlencode(serialize($tableau_a));
    }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Table de multiplication</title>
        <link rel="stylesheet" href="http://www.multiplication.mg/styles.css">
    </head>

    <body>
        <div class="container_formulaire">
            <div class="formulaire">
                <h1>Enter ici les données</h1>
                <form action="http://www.multiplication.mg/multiplication.php" method="GET" >
                    <div class="entrer">
                        <label for="b">A : </label><input type="number" name="b" id="b" />
                        <label for="n">B : </label><input type="number" name="n" id="n" /><br>
                    </div>
                    <input type="submit" value="Calcluler" class="calculer" />
                </form>
            </div>
        </div>

        <div class="container_tableau">
            <?php  
                if(!empty($b) && !empty($n)): 
            ?>
                <div class="tableau">
                    <table>
                    <tr class="titre"><td>A</td><td>X</td><td>B</td><td>=</td><td>Résultat</td><td>Modification</td><td>Supprimer</td></tr>
                    <?php
                        for($i=1;$i<=$n;$i++)
                        {
                            if($print_i[$i] == 1)
                            {
                                $url_suppression = "http://www.multiplication.mg/multiplication.php?b=$b&n=$n&tableauIndiceA=$tableau_indice_a_code&tableauIndiceB=$tableau_indice_b_code&r=$r_code&tableau=$print_code&indice=$i";
                                $url_changement = "http://www.multiplication.mg/changement.php?b=$b&n=$n&tableauIndiceA=$tableau_indice_a_code&tableauIndiceB=$tableau_indice_b_code&r=$r_code&tableau=$print_code&indice=$i";
                                if($i%2 == 0)
                                {
                                    echo "<tr class=\"impaire\"><td>$tableau_a[$i]</td><td>X</td><td>$tableau_b[$i]</td><td>=</td><td>$r_i[$i]</td><td class=\"modifier\"><a href=\"$url_changement\" >Modifier</a></td><td class=\"supprimer\"><a href=\"$url_suppression\" >Supprimer</a></td></tr>";
                                }
                                else
                                {
                                    echo "<tr class=\"paire\"><td>$tableau_a[$i]</td><td>X</td><td>$tableau_b[$i]</td><td>=</td><td>$r_i[$i]</td><td class=\"modifier\"><a href=\"$url_changement\" >Modifier</a></td><td class=\"supprimer\"><a href=\"$url_suppression\" >Supprimer</a></td></tr>";
                                }
                            }
                        }
                    ?>
                    </table> 
            
            <?php  
                else:
            ?>
                <h1>Aucun donnée</h1>
            <?php  
                endif
            ?>
        </div>
    </body>
</html>