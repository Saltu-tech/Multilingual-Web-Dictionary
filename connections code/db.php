
<?php
$servername = "localhost:3306";
$username = "root";
$password = "Perfect@";
try {
$conn = new PDO("mysql:host=$servername;dbname=project", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
echo "Connection failed: " . $e->getMessage();
}
?>