<?
$host = "localhost";
$username = "root";
$pass = "";
$database = "shop13";

$conn = mysqli_connect($host, $username, $pass, $database);

if(!$conn)
{
    die("Connection Failed: ". mysqli_connect_error());
}else{
    echo "Connected succesfully";
}

?>