<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>My Guests</title>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <!--Font Awsome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
<nav class="navbar navbar-expand-sm bg-light justify-content-between">
        <div class="container">
            <div class="">
                <a href="../" class="btn btn-lg"><i class="fa-sharp fa-solid fa-arrow-left fa-beat"></i></i> Back</a>
            </div>
            <div>
                <ul class="navbar-nav bold">
                    <li class="nav-item">
                        <a href="./" class="nav-link active">v1</a>
                    </li>
                    <li class="nav-item">
                        <a href="v2/" class="nav-link">v2</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<div class="container">
<div class="row">
<div class="col-md-12">

<h1>My Guests</h1>

<?php

if(isset($_GET['message'])) {

	if($_GET['message'] == "addguest") {
	echo '<div class="alert alert-success">
	<strong>Success!</strong> Guest Added.
	</div>';
	}

	if($_GET['message'] == "guestdeleted") {
	echo '<div class="alert alert-danger">
	<strong>Success!</strong> Guest Deleted.
	</div>';
	}
  
	if($_GET['message'] == "guestupdated") {
    echo '<div class="alert alert-info">
    <strong>Success!</strong> Guest Updated.
    </div>';
  }



} // end of isset
if(isset($_POST['id'])) {
  echo '<form action="updateguest.php" method="POST">';
  echo '<input type="hidden" name ="id" value="'.$_POST['id'].'">';
}else {
  echo '<form action="addguest.php" method="POST">';
}

?>

<form action="index.php" method="POST">
First: <input type="text" name="firstname" value="<?=$_POST['firstname']?>" required><br>
Last: <input type="text" name="lastname" value="<?=$_POST['lastname']?>" required><br>
Email: <input type="email" name="email" value="<?=$_POST['email']?>" required><br><br>
<?php

if(isset($_POST['id'])){
echo '<button type="submit" name="updateguest" class="btn btn-warning">Update Guest</button>';
} else {
echo '<button type="submit" name="addguest" class="btn btn-info">Add Guest</button>';
}
?>

</form>


<br><br>
<div class="table-responsive">
<table class="table table-hover table-striped table-bordered">
<tr>
<th>ID</th>
<th>First</th>
<th>Last</th>
<th>Email</th>
<th>Reg Date</th>
<th></th>
<th></th>
</tr>
<?php
include 'db.php';

$sql = "SELECT * FROM MyGuests";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
?>
<tr>
<td><?=$row['id']?></td>
<td><?=$row['firstname']?></td>
<td><?=$row['lastname']?></td>
<td><?=$row['email']?></td>
<td><?=$row['reg_date']?></td>
<td>
<form action="index.php" method="post">
<input type="hidden" name="id" value="<?=$row['id']?>">
<input type="hidden" name="firstname" value="<?=$row['firstname']?>">
<input type="hidden" name="lastname" value="<?=$row['lastname']?>">
<input type="hidden" name="email" value="<?=$row['email']?>">
<button type="submit" name="editguest" class="btn btn-success btn-xs">edit</button>
</form>
</td>
<td>
<form action="deleteguest.php" method="post">
<input type="hidden" name="id" value="<?=$row['id']?>">
<button type="submit" name="deleteguest" class="btn btn-danger btn-xs">X</button>
</form>
</td>
</tr>

<?php
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
?>
</table>

</div>
</div></div></div>
<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>