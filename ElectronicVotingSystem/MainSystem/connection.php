<?php 

$dbhost = 'localhost';
$dbuser = 'root';

$dbpass = '';
$databaseName='evoting_db';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$databaseName);

if(! $conn ){
    echo"not conneted";
}
else{
    
}

?>