<?php



$dbhost='localhost';
$dbdatabase='healthcare_provider';
$dbuser='root';
$dbpwd='';

$conn = mysqli_connect($dbhost,$dbuser,$dbpwd,$dbdatabase);
if(!$conn)
{
    echo "Database not Connected<br>",mysqli_connect_error();
}
?>