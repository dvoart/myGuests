<?php

if(!isset($_POST['deleteguest'])) {
// redirect to form
header("Location: index.php");
exit;
}

include 'db.php';

// sql to delete a record
$sql = "DELETE FROM MyGuests WHERE id='{$_POST['id']}'";

if (mysqli_query($conn, $sql)) {
header("Location: index.php?message=guestdeleted");
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

?>