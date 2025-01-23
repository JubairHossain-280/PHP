<?php 
    echo "<h1>Hello PHP</h1>";

    // if else
    $num1 = 29;
    $isEven = ($num1 % 2 == 0) ? "Even" : "Odd";   // condition ? true_value : false_value
    echo "<h3>".$num1 . " is an " . $isEven . " number"."</h3>";

    // while loop 
    $i = 1;    // Initialization
    while($i <= 10) {   // Condition
        echo $i . " ";  // Operation
        $i++;  //Increment/Decrement
    }
    
?>


