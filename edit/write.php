<?php
if($_POST[blog] != ""){
$text = $_POST[blog]; // Dateiinhalt
    $umlaute = array(
        'Ä' => '&Auml;',
        'ä' => '&auml;',
        'Ö' => '&Ouml;',
        'ö' => '&ouml;',
        'Ü' => '&Uuml;',
        'ü' => '&uuml;',
        'ß' => '&szlig;', );
    $text = str_replace(array_keys($umlaute),
        array_values($umlaute), $text);

$Nr_tag = fopen("Nr-tag.txt","r+");
$NRcounter = fgets($Nr_tag);
$NRcounter = $NRcounter+1;

$DATE = date("j-M-Y H:i, l");

$text = "\n<a name=\"$NRcounter\"><div class=\"titel\"><a href=\"#$NRcounter\">#$NRcounter</a> $DATE</div></a>\n<p>$text</p>\n\n"; // Zeilen hinzufuegen  

$array = file("../index.php"); // Datei in ein Array einlesen
// Zeile 17 wird geaendert
// (das Array faengt mit dem Zaehlen bei 0 an)
array_splice($array, 18, 1, $text);
// Array-Elemente zu einem String (Zeichenkette) verbinden
$string = implode("", $array);
// Text in Datei schreiben und speichern
file_put_contents("../index.php", $string);
file_put_contents("Backup/Post-$NRcounter.php", $string);

rewind($Nr_tag);
fwrite($Nr_tag, $NRcounter);
fclose($Nr_tag);

echo "<h1>Gut gemacht!</h1>";
}
else echo "Diese Seite ist nichts f&uuml;r dich!"
?>

<HTML>
<HEAD>
<meta http-equiv="refresh" content="5; URL=../">
<Title>--X--</Title>
</HEAD>
<BODY>
</BODY>
</HTML>