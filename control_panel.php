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
    <h2>Vierailijat</h2>
    <a style='text-decoration:none; background-color: rgb(230, 230, 230); color: black; border: solid 2px black; border-radius: 5px; padding: 2px;' href="index.html">Etusivulle</a>
    <?php
        if (isset($_POST["login"])) {

            if (empty($_POST["password"]) && empty($_POST["username"])) {
                echo "<script>alert('Salasana ja käyttäjänimi puuttuu')</script>";
                echo "<script>location.href='guest.php'</script>";
                return false;
            }

             else if (empty($_POST["password"])) {
                echo "<script>alert('Salasana puuttuu')</script>";
                echo "<script>location.href='guest.php'</script>";
                return false;
            }
        
            else if (empty($_POST["username"])) {
                echo "<script>alert('Käyttäjänimi puuttuu')</script>";
                echo "<script>location.href='guest.php'</script>";
                return false;
            }

            if ($_POST["password"] != "admin" && $_POST["username"] != "admin") {
                echo "<script>alert('Väärä salasana ja käyttäjänimi')</script>";
                echo "<script>location.href='guest.php'</script>";
                return false;
            }   

            else if ($_POST["password"] != "admin") {
                echo "<script>alert('Väärä salasana')</script>";
                echo "<script>location.href='guest.php'</script>";
                return false;
            }

            else if ($_POST["username"] != "admin") {
                echo "<script>alert('Väärä käyttäjänimi')</script>";
                echo "<script>location.href='guest.php'</script>";
                return false;
            }
        }

        // Näytetään XML objekti sivulla ja objektin poisto
    
        $index = 0;
        $xml = simplexml_load_file("data.xml");
        foreach ($xml->guest as $guest) {
        echo "<h3>$guest->name</h3>";
        echo "<p>$guest->email<p>";
        echo "<p>$guest->message<p>";
        echo "<a style='text-decoration:none; background-color: rgb(230, 230, 230); color: black; border: solid 2px black; border-radius: 5px; padding: 2px;' href='delete.php?index=".$index."'>Poista</a>";
        }
        $index++;
    ?>
</body>
</html>