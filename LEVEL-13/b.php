
<?php

$id = "1,0, ------";
if (True) {

  $tmp = explode(',',$id);

  for ($i = 0;
     $i < count($tmp); 
     $i++) {

    echo "\nLa i vale ".$i." mientras que lo otro ".count([$tmp])."\n";
    echo "> interize : ".$tmp[$i]."\n";
    $tmp[$i] = (int)$tmp[$i];
    var_dump($tmp);

    if( $tmp[$i] < 1 ) {
        echo ">>>>>>>>>>>>> I'm gonna unset " . $tmp[$i] . "\n";
        unset($tmp[$i]);
        var_dump($tmp);
    }

    if ($i < count($tmp)) {
      echo "oopise";    } else {
      echo "\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n$i vale" . $i . " y lo otro ".count($tmp)."\n";
    }
    
}
 
  //var_dump($tmp);

  $selector = implode(',', array_unique($tmp));

  //var_dump($selector);

  $query = "SELECT user_id, user_privileges, user_name
  FROM users
  WHERE (user_id in (" . $selector . "));";

  echo "\n\n\n\n\n\n\n\n" . $query;
  



}
?>