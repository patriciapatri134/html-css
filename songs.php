<?php
echo file_get_contents("html/header.html");

$file = fopen("songs.html", "r");

echo "<select>";
while(! feof($file)) {
	$line = fgets($file);
	echo "<option>$line</option>";
}
echo "</select>";

echo file_get_contents("html/footer.html");
	