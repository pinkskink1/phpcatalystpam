#!/usr/local/bin/php -q
<?php

/*
* PRINT OUT HELP MANUAL
*/
function print_help(){
$message = <<<MES
    This program requires at least one of the following arguments:
    --file [csv file name] - the name of the file with firstname, surname and email
    --create_table - this creates the MySQL table and no other action is take
    --dry_run - this is used with the --file directive and runs the script
        but does not insert into the DB
    -u - the MySQL user
    -p - the MySQL password
    -h - the MySQL host
    --help - prints out this manual

MES;
echo $message;
}
/*
*CREATE DATABASE TABLE
*/
function create_table($user,$password,$host,$sid){
try {
  $conn = new PDO("mysql:host=$host;dbname=$sid", $user, $password);
    // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   //create table sql
  $sql = "CREATE TABLE C_USERS (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          firstname VARCHAR(30) NOT NULL,
          lastname VARCHAR(30) NOT NULL,
          email VARCHAR(50)
                      )";

    $conn->exec($sql);
    echo "Table MyGuests created successfully";
   } catch(PDOException $e) {
                  echo $sql . "<br>" . $e->getMessage();
   }

  $conn = null;
}
/*
* REMOVE DATBASE TABLE
*/

function drop_table($user,$password,$host,$sid){
try {
  $conn = new PDO("mysql:host=$host;dbname=$sid", $user, $password);
    // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   //create table sql
  $sql = "DROP TABLE C_USERS";

    $conn->exec($sql);
    echo "Table MyGuests created successfully";
   } catch(PDOException $e) {
                  echo $sql . "<br>" . $e->getMessage();
   }

  $conn = null;
}
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
$dbusr = "";
$dbpwd = "";
$dbhost = "";
$filename = "";
$createtable = false;
$dryrun = false;
$help = false;
$dbopts = "u:p:h:";
$otheropts = array("file:","create_table","dry_run","help");
$otherrslt = getopt($dbopts,$otheropts);
var_dump($otherrslt);
    if(empty($otherrslt)) exit("Please use --help to find what parameters to use\n");
foreach ($otherrslt as $option => $value) {

        echo "{$option} => {$value} ";
        switch ($option) {
            case "file":
                $filename = $value;
                break;
            case "u":
                $dbusr = $value;
                break;
            case "p":
                $dbpwd = $value;
                break;
            case "h":
                $dbhost = $value;
                break;
            case "create_table":
                $createtable = true;
                break;
            case "dry_run":
                $dryrun = true;
                break;
            case "help":
                print_help();
                exit();
                break;
            default:    //couldn't find any instance of this being used but left it in
                exit();
                break;
        }
    }

//Drop and Create the Database Table



//Open the file and add to database line by line ( rather than having a big array in memory)


?>

