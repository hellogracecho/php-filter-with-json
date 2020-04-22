<?php
$data = file_get_contents ("file.json");
$json = json_decode($data, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="style.css">
    <title>Table Mockup</title>
</head>
<body>
<h1>Test Page | PHP json object | Table</h1>

<select name="gender" class="filters">
    <option value="" disabled selected hidden>Select Gender</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
</select>

<select name="company" class="filters">
    <option value="" disabled selected hidden>Select Company</option>
    <option value="A">Company A</option>
    <option value="B">Company B</option>
    <option value="C">Company C</option>
    <option value="D">Company D</option>
    <option value="E">Company E</option>
</select>
  
<?php
if ($json === null) { // Data Validation if statement
    // There is no data to be decoded
    echo '<p>Error: Data cannot get fetched...</p>';
} else {
    echo '<table>';
    foreach ($json as $key => $value) {
        if (!is_array($value) ) {
            // Error: Array not defined
        } else {
            if($key == 0) {
                echo '<thead><tr>';
                foreach ($value as $key => $val) {
                    if ($key == 'id') {
                        continue; // Skip to display ID
                    }
                    echo '<th>' . $key . '</th>';
                }
                echo '</tr></thead>';
            }

            // Add class on tr element so that filters.js can detect
            $addClassName = "";
            foreach ($value as $key => $val) {
                $addClassName .= " $val";
            } 
        //    echo '<h1>' . $json[$key][$val] . '</h1>';
            echo '<tr class="single-item ' . $addClassName .'">';
            foreach ($value as $key => $val) {
                if ($key == 'id') {
                    continue;
                }
                echo '<td>' . $val . '</td>';
            }
            echo '</tr>';
        }
    }
    echo '</table>';
} // Data Validation
?>
<div id="filter-message-container">
	<p id="filter-message"></p>
</div>

<script
  src="https://code.jquery.com/jquery-3.5.0.min.js"
  integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
  crossorigin="anonymous"></script>
<script src="./filters.js"></script>
</body>
</html>