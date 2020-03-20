<?php
//path to include files from connection
require_once ('./connection.php');
// requesting post method from server
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!empty($_POST['username'] && !empty($_POST['message']))) {
        //query to get values from table
        $query = "INSERT INTO messages VALUES (?,?)";
        $stmt = $con->prepare($query);
        $stmt->bind_param('ss', $user, $msg);
        $user = $_POST['username'];
        $msg = $_POST['message'];
        $stmt->execute();
    }
}

?>