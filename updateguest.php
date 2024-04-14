<?php
session_start();
if(!isset($_POST['updateguest'])){
header("Location: index.php");exit; // sometimes it will run code below, so to make sure it doesn't, use exit;
}

include 'db.php';

// sql to update a record
$sql = "UPDATE MyGuests SET firstname = '{$_POST['firstname']}', lastname = '{$_POST['lastname']}', email = '{$_POST['email']}' WHERE id='{$_POST['id']}'";

if (mysqli_query($conn, $sql)) {
    $_SESSION['message'] = "guestupdated";
    header("Location: index.php?message=guestupdated");
} else {
  echo "Error updating guest: " . mysqli_error($conn);
}

?>


