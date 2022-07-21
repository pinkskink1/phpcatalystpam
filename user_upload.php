#!/usr/local/bin/php -q
<?php
function read_user_table($filename, &$users)
{
    $row = 0;

    // read the data
    $handle = fopen($filename, 'r');
    if ($handle == 0)
    return -1;

    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $row++;
        $num = count($data);
        if (strlen($data[0]) != 0) {

            $users[]     = $data[0];
        }
    }

    fclose($handle);
    return (count($users));
}
//========================================================================
//  MAIN
//========================================================================

for($i = 1; $i < $argc; $i++) {
    echo  $argv[$i];
    }

?>

