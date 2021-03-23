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
    <h1>Vieraskirja</h1>
    <form action="" method="POST">
            <label for="name">Nimi</label>
            <br><br>
            <input type="text" name="name">
            <br><br>
            <label for="email">Sähköposti</label>
            <br><br>
            <input type="email" name="email">
            <br><br>
            <label for="message">Viesti</label>
            <br><br>
            <textarea name="message" cols="25" rows="3"></textarea>
            <br><br>
            <input type="submit" name="submit">
    </form>
    <?php
        if (isset($_POST["name"]) && isset($_POST["email"])) {

            // Muokataan objekti
            $xml = simplexml_load_file("data.xml");
            $message = str_replace(PHP_EOL, "<br>", $_POST["message"]);
            $form = [$_POST["name"], $_POST["email"], $message];
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

        
    ?>
</body>
</html>