<?php

exec("pkexec sudo iptables --list-rules > rules.txt");
$lignes = file("rules.txt");

foreach ($lignes as  $ligne) {
  $mot = explode(" ", trim($ligne));

  if($mot[0] === "-P")
  {
    file_put_contents($mot[1] . ".csv", $mot[1] . "," . $mot[2] . "\n");
  }
  else if( $mot[0] === "-A" )
  {
    foreach ($mot as $m) 
    {
      file_put_contents($mot[1] . ".csv", $m . ",", FILE_APPEND);
    }
    file_put_contents($mot[1] . ".csv", "\n", FILE_APPEND);
  }
}

exec("rm rules.txt");

?>
