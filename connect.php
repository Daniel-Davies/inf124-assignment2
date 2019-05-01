
<?php
$servername = "localhost";
$username = "root";
$password = "Danio123";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=world", $username, $password);
    $stmt = $pdo->query("SELECT * FROM city");
    echo '<table border="1">'."\n";
    while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
        echo "<tr><td>";
        echo($row['Name']);
        echo("</td><td>");
        echo($row['District']);
        echo("</td><tr>");
    }
    echo ("</table>\n");
}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>