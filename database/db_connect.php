<?php
$hostname="localhost";
$username="root";
$password="";
$db_name="tohaeco_db";

$db_connection=mysqli_connect($hostname,$username,$password,$db_name);

if(!$db_connection)
{
    echo "something Wrong";
}

 ?>