<?php
echo "<html><body><table border=1>\n\n";
$f = fopen("students.csv", "r");
while (($line = fgetcsv($f)) !== false) {
        echo "<tr>";
        foreach ($line as $cell) {
                echo "<td>" . htmlspecialchars($cell) . "</td>";
        }
        echo "</tr>\n";
}
fclose($f);
echo "\n</table></body></html>";

$link_address1='home.php';
echo "<h5><a href='".$link_address1."'>Return to Home Page</a></h5>";
?>
