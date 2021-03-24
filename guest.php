<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Vieraskirja</title>
</head>
<body>
<h1>Vierailijat</h1>
<a href="index.php">Etusivulle</a>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Muokataan objekti
        $xml = simplexml_load_file("data.xml");
        $form = [$_POST["name"], $_POST["email"], $_POST["message"]];
        $newGuest = $xml -> addChild("guest");
        $newGuest -> addChild("name", $form[0]);
        $newGuest -> addChild("email", $form[1]);
        $newGuest -> addChild("message", $form[2]);

        // Tallennetaan muokattu objekti tiedostoon
        $dom = new DOMDocument("1.0");
        $dom -> preserveWhiteSpace = false;
        $dom -> formatOutput = true;
        $dom -> loadXML($xml->asXML());
        $dom -> save("data.xml");
    }

    // Näytetään XML objekti sivulla
    if (!isset($_GET["index"])) {
        header("Location: guest.php");
        die();
    }
    $index = intval($_GET["index"]);
    $xml = simplexml_load_file("data.xml");
    foreach ($xml->guest as $guest) {
        echo "<h3>$guest->name</h3>";
        echo "<p>$guest->email<p>";
        echo "<p>$guest->message<p>";
        echo "<a href='delete.php?index=".$index."'>Poista</a>";
    }
    $index++;
?>
</body>
</html>