<?php
  // for ($i=0; $i <= 3; $i++) {
    $line = readline("Enter Command: ");
    readline_add_history(($line));
  // }

  // dump history
  print_r(readline_list_history());

  // dump variables
  print_r(readline_info());

?>