<?php

include 'db_credentials.php';


try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("INSERT INTO messages(inhoud, tijdstip) VALUES(:inhoud, now())");
    
    //Variabele gebonden aan de inhoud van :inhoud
    $stmt->bindParam(":inhoud", $inhoudBericht);

    //Eerste bericht
    $inhoudBericht = 'Hey';
    $stmt->exec();

    //Tweede bericht
    $inhoudBericht = 'ik ben';
    $stmt->exec();


    //Derde bericht
    $inhoudBericht = 'een test bericht.';
    $stmt->execute();


    // vervolledig de code om 3 testberichten toe te voegen
    // m.b.v. bovenstaand prepared statement


    echo "3 testberichten toegevoegd...";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

?>
