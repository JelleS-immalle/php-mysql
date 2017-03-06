<?php

include 'db_credentials.php';


try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("UPDATE `messages` SET inhoud='Testberichtje' WHERE id=4");

    //De lijn code bovenaan wordt uitgevoerd
    $stmt->execute();

    //Nakijken hoeveel rijen er zijn aangepast
    $aantal_aangepast = $conn->rowCount;
    
    // zorg dat de database ge-update wordt
    // en getoond wordt hoeveel rijen aangepast zijn
    
    echo $aantal_aangepast . " rijen aangepast...";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

?>
