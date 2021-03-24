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
    <form action="guest.php" method="POST">
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
</body>
</html>