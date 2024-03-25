<?php
  function do_interface_csv(): void 
  {
    exec("ip a > interface.txt");

    $lignes = file("interface.txt");
    file_put_contents("interface.csv", "");
    if($lignes)
    {
      foreach ($lignes as $ligne) 
      {
        if(str_contains($ligne, "UP"))
        {
          if(str_contains($ligne, "state"))
          {
            $mot = explode(" ", trim($ligne));
            $mot = array_filter($mot);

            $interface = substr($mot[1], 0, strlen($mot[1])-1);
            if($mot[7] === "state")
            {
              $status = $mot[8];
            }
            else {
              $status = $mot[7];
            }

            file_put_contents("interface.csv", $interface . "," . $status . "\n", FILE_APPEND);
          }
        }
      }
    }

    exec("rm interface.txt");
  }

  function get_interface_csv(): array
  {
    $file = fopen("./interface.csv", "r") or die("Impossible d'ouvrir le fichier interface.csv\n");

    while($line = fgetcsv($file, 1000, ","))
    {
      $result[] = $line;
    }
    fclose($file);

    return $result;
  }
?>
