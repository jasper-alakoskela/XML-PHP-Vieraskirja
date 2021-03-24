<?php
if (!isset($_GET["index"])) {
    header("Location: guest.php");
    die();
}

$index = intval($_GET["index"]);

$xml = simplexml_load_file("data.xml");

unset($xml->guest[$index]);

// Tallennetaan muokattu objekti tiedostoon
$dom = new DOMDocument("1.0");
$dom -> preserveWhiteSpace = false;
$dom -> formatOutput = true;
$dom -> loadXML($xml->asXML());
$dom -> save("data.xml");

header("Location: guest.php");

