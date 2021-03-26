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
<a style='text-decoration:none; background-color: rgb(230, 230, 230); color: black; border: solid 2px black; border-radius: 5px; padding: 2px;' href="index.html">Etusivulle</a>

<?php

    if (isset($_POST["submit"])) {

        if (empty($_POST["name"]) && empty($_POST["email"])) {
            echo "<script>alert('Nimi ja sähköposti puuttuu')</script>";
            echo "<script>location.href='index.html'</script>";
            return false;
        }
    
        else if (empty($_POST["name"])) {
            echo "<script>alert('Nimi puuttuu')</script>";
            echo "<script>location.href='index.html'</script>";
            return false;
        }
    
        else if (empty($_POST["email"])) {
            echo "<script>alert('Sähköposti puuttuu')</script>";
            echo "<script>location.href='index.html'</script>";
            return false;
        }

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
        $xml = simplexml_load_file("data.xml");
        foreach ($xml->guest as $guest) {
        echo "<h3>$guest->name</h3>";
        echo "<p>$guest->email<p>";
        echo "<p>$guest->message<p>";
        }
?>

<h2>Hallintapaneeli</h2>
<form action="control_panel.php" method="POST">
    <input type="text" placeholder="Nimi" name="username">
    <br><br>
    <input type="password" placeholder="Salasana" name="password">
    <br><br>
    <input type="submit" value="Kirjaudu" name="login">
</form>

</body>
</html>