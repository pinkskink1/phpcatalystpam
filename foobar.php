#!/usr/local/bin/php -q
<?php
# Print out numbers 1 to 100
# if divisible by 3 print foo
# if divisible by 5 print bar
# if divisible by both, print foobar

for ($i=0; $i<=100; $i++){
    if (($i%3 == 0) && ($i%5 == 0)){
        echo " foobar";
    }else if ($i%3 == 0){
        echo " foo";
    }else if ($i%5 == 0){
        echo " bar";
    }else{
        echo " $i";
    }
    //Don't want list to end with a comma
    //only print out if not the last number
    if ($i < 100) echo ",";
}
?>
