<?php
/**
 * Created by PhpStorm.
 * User: jibba_000
 * Date: 24-11-2017
 * Time: 09:01
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/style.css" rel="stylesheet">

</head>
<body>

<h1>Ordre Tabel</h1>

<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "progexam_1";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//opretter tabel

echo "<div>
    <br>
    <table>
        <thead>
        <tr>
        <th>Ordre_ID</th>
            <th>Ordre_Dato</th>
            <th>Beskrivelse</th>
            <th>Beløb</th>
            </tr>
        </thead>
        <tr>";

$sql = "SELECT * FROM  orders";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    //viser data fra hver række
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['ORD_ID'] . "</td>";
        echo "<td>" . $row['ORD_DATE'] . "</td>";
        echo "<td>" . $row['ORD_DESCRIPTION'] . "</td>";
        echo "<td>" . $row['ADVANCE_AMOUNT'] . "</td>";
        echo "</tr>";

    }}else {
    echo "0 results";
}

echo"
        </tr>
    </table>
</div>";
?>



</body>
<?php include 'footer.php';?>
</html>