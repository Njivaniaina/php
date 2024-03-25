<?php
  function do_table_csv(): void
  {
    $command = "sudo iptables -L > iptables.txt";
    $passwd = "";
    //exec($command) or die("Erreur  de l'execution du commande: sudo -kS iptables -L > iptables.txt");
  
    $process = proc_open($command, array(0 => array("pipe", "r"), 1 => array("pipe", "w"), 2 => array("pipe", "w")), $pipes);
    if(is_resource($process))
    {
      //fwrite($pipes[0], $passwd . "\n");
      fclose($pipes[0]);

      $output = stream_get_contents($pipes[1]);
      fclose($pipes[1]);

      $error = stream_get_contents($pipes[2]);
      fclose($pipes[2]);

      $retour = proc_close($process);
      if($retour !== 0)
      {
        echo "Une erreur s'est produit lors de l'execution du commande.\n";
        echo "Erreur : " . $error;
      }
    }

    $lignes = array_filter(file("iptables.txt"));
    file_put_contents("iptables.csv", "");
    foreach($lignes as $ligne) {
      if(strlen($ligne) > 0){
        $mot = explode(" ", trim($ligne));
        $mot = array_filter($mot);
          
        if(count($mot)>0)
        {
          if($mot[0] == "Chain"){
            unset($mot[0]);
            unset($mot[2]);
            $mot[3] = substr($mot[3], 0, strlen($mot[3])-1);
            file_put_contents("iptables.csv", $mot[1] . "," . $mot[3] . "\n", FILE_APPEND);
          }

          if(isset($mot[0]) && $mot[0] != "target") 
          {
            foreach ($mot as $k => $m) 
            {
              file_put_contents("iptables.csv", $m . ",", FILE_APPEND);
            }
            file_put_contents("iptables.csv", "\n", FILE_APPEND);    
          }
        }

      }
    }
    exec("rm iptables.txt");
  }

  function get_table_csv(): array 
  {
    $file = fopen("./iptables.csv", "r") or die("Erreur de l'ouverture du fichier ./iptables.csv");
    $result = array();

    while(($lines = fgetcsv($file, 1000, ",")))
    {
      if(count($lines) == 2)
      {
        $c = $lines[0];
        $chain[] = $lines;
      }
      else
      {
        $result[$c][] = $lines;  
      }
    }
    fclose($file);
    return array("chain" => $chain, "rules" => $result);
  }
?>
