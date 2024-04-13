<?php

if(!isset($_POST['addguest'])) {
// redirect to form
header("Location: index.php");
exit;
}


// Put the data in the db table MyGuests

include 'db.php';

$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('{$_POST['firstname']}', '{$_POST['lastname']}', '{$_POST['email']}')";

if (mysqli_query($conn, $sql)) {
// Redirect back to my index page
header("Location: index.php?message=addguest");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}







?>