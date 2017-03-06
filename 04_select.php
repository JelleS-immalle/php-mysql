<?php

include 'db_credentials.php';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT inhoud, tijdstip
        FROM messages;
    )";

    $result = $conn->query($sql);

    echo "<table>";
    echo "<tr><th>Inhoud</th><th>Tijdstip</th>";

    for($i=0; $i<$result->rowCount(); $i++) {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        echo "<tr>";
        print_r($row);
        // VUL AAN zodat alle inhouden en tijdstippen worden getoond
        echo "</tr>";
    }

    echo "</table>"; 
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

?>
