  <?php
 $ch = fopen("students.csv", "r");
$header_row = fgetcsv($ch);

/* This will loop through all the rows until it reaches the end */
while($row = fgetcsv($ch)) {
    if (in_array("4", $row)) {
	echo "<br><br><b> The Searched Student:</b>";
        echo '<div>' . implode(' | ', $row) . ' </div>';
    }
}    
echo "<br><br>";
$link_address1='home.php';
echo "<h5><a href='".$link_address1."'>Return to Home Page</a></h5>";  
?>
