<?php
require_once ('./connection.php');
//query to select from messages
$query = "SELECT * FROM messages";
$res = $con->query($query);

while($row = $res->fetch_assoc()) {
    echo '<b>' . $row['username'] . ': </b>' . $row['message'] . '<br>';
}
?>
