<?php
setcookie("Vuser", "Besucher", time()+3600);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<title>Ladislaus Blog v.1.0.1</title>
		<link rel="stylesheet" type="text/css" href="Blog.css">
	</head>
<body>
<div class="header">
<h2><a href="http://www.laszlojaeger.com/index.php">[insert blog title here]</a></h2>
</div>
<div class="content">
<!-- Hier wird eingesetzt -->

</div>
<div class="footer">
<p>Dieser Blog ist in HTML5 und PHP von mir geschrieben.&nbsp;<br>Dies war der  
<?php
$datei = fopen("counter.txt","r+");
$counterstand = fgets($datei, 10);
if($counterstand == ""){
  $counterstand = XX;
}
$counterstand++;
echo "<b>$counterstand</b>";
rewind($datei);
fwrite($datei, $counterstand);
fclose($datei);
?>. Seitenaufruf. <small>(Seit dem XX.XX.XXXX)</small>&nbsp;<br>Und bisher hatte dieser Blog 
<?php
if (isset($_COOKIE["Vuser"])) {
$Vdatei = fopen("visitors.txt","r+");
$Vcounterstand = fgets($Vdatei, 10);
echo "<b>$Vcounterstand</b>";
fclose($Vdatei);
}

else {
$Vdatei = fopen("visitors.txt","r+");
$Vcounterstand = fgets($Vdatei, 10);
$Vcounterstand++;
echo "<b>$Vcounterstand</b>";
rewind($Vdatei);
fwrite($Vdatei, $Vcounterstand);
fclose($Vdatei);
}
?>
 Besucher<small> (Seit dem XX.XX.XXXX)</small>&nbsp;<br>
Dieses Script ist von <a href="http://www.laszlojaeger.com/" style="color : #009933;"> Laszlo J&auml;ger</a> geschrieben, und steht unter der GNU GPL auf <a href="https://github.com/Ladislaus/insert-blog-title-here/" style="color : #009933;">github.com</a> kostenfrei zum download bereit.&nbsp;</p>
</div>
</body>
</html>
